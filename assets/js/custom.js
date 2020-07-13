/*=============================================================
    Authour URI: www.binarytheme.com
    License: Commons Attribution 3.0

    http://creativecommons.org/licenses/by/3.0/

    100% To use For Personal And Commercial Use.
    IN EXCHANGE JUST GIVE US CREDITS AND TELL YOUR FRIENDS ABOUT US
   
    ========================================================  */

function firstLoad() {
  const btn = document.getElementById("update");
  btn.addEventListener("click", (evt) => {
    const trTag = document.querySelector(
      `tr[data-pid="${btn.getAttribute("data-pid")}"]`
    );
    const cst = ["tieude", "loai", "tomtat", "noidung", "gia"];
    const tdTag = trTag.childNodes;
    const data = [];
    const convert = [];
    for (const t of tdTag) {
      if (t.textContent.trim().length > 0) {
        convert.push(t.textContent.trim());
      }
    }
    convert.forEach((value, key) => {
      if (key <= cst.length - 1) {
        data[cst[key]] = value;
      }
    });
    createModal(evt.currentTarget.getAttribute("data-pid"), data);
  });
}
function createModal(id, data) {
  const body = document.body;
  body.style.zIndex = "-1";
  body.style.opacity = "0.5";

  const modal = document.createElement("div");
  modal.id = "modal";
  const mainModal = document.createElement("div");
  mainModal.id = "main-modal";
  const form = document.createElement("form");
  form.action = "update.php";
  form.method = "post";
  const input = [];
  for (const k of Object.keys(data)) {
    const tmp = document.createElement("input");
    tmp.name = k;
    k === "tomtat" || k === "noidung"
      ? (tmp.type = "textarea")
      : (tmp.type = "text");
    tmp.value = data[k];
    input.push(tmp);
  }
  const close = document.createElement("button");
  const save = document.createElement("input");
  const idTag = document.createElement("input");
  idTag.type = "hidden";
  idTag.name = "id";
  idTag.value = id;
  close.type = "button";
  close.append("Close");
  save.type = "submit";
  save.name = "save";
  save.value = "Save";

  input.push(idTag);
  input.push(close);
  input.push(save);

  for (const i of input) {
    form.append(i);
  }

  mainModal.append(form);
  modal.append(mainModal);
  body.append(modal);

  const head = document.head;
  const css = document.createElement("link");
  css.href = "assets/css/modal.css";
  css.rel = "stylesheet";
  head.append(css);
}

//firstLoad();

(function ($) {
  "use strict";
  var mainApp = {
    main_fun: function () {
      /*====================================
              LOAD APPROPRIATE MENU BAR
           ======================================*/
      $(window).bind("load resize", function () {
        if ($(this).width() < 768) {
          $("div.sidebar-collapse").addClass("collapse");
        } else {
          $("div.sidebar-collapse").removeClass("collapse");
        }
      });
    },

    initialization: function () {
      mainApp.main_fun();
    },
  };
  // Initializing ///

  $(document).ready(function () {
    mainApp.main_fun();
  });
})(jQuery);
