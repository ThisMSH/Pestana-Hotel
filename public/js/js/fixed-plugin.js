var pageName = window.location.pathname.split("/").pop().split(".")[0];

var navbar = document.querySelector("[navbar-main]");

var sidenav = document.querySelector("aside");
var sidenav_icons = sidenav.querySelectorAll("li a div");

var sidenav_target = pageName + ".html";

var non_active_style = ["bg-none", "bg-transparent", "text-blue-500", "border-blue-500"];
var active_style = ["bg-gradient-to-tl", "from-blue-500", "to-violet-500", "bg-blue-500", "text-white", "border-transparent"];

var white_sidenav_classes = ["bg-white", "shadow-xl"];
// var white_sidenav_highlighted = ["shadow-xl"];
// var white_sidenav_icons = ["bg-white"];

var black_sidenav_classes = ["bg-zinc-800", "shadow-none"];
// var black_sidenav_highlighted = ["shadow-none"];
// var black_sidenav_icons = ["bg-gray-200"];

var sidenav_highlight = document.querySelector("a[href=" + CSS.escape(sidenav_target) + "]");

// color sidenav

function sidebarColor(a) {
  var color = a.getAttribute("data-color");
  var parent = a.parentElement.children;
  var activeColor;

  var activeSidenavIconColorClass;

  var checkedSidenavIconColor = "bg-" + color + "-500/30";

  var sidenavIcon = document.querySelector("a[href=" + CSS.escape(sidenav_target) + "]");

  for (var i = 0; i < parent.length; i++) {
    if (parent[i].hasAttribute("active-color")) {
      activeColor = parent[i].getAttribute("data-color");

      parent[i].classList.toggle("border-white");
      parent[i].classList.toggle("border-zinc-700");

      activeSidenavIconColorClass = "bg-" + activeColor + "-500/30";
    }
    parent[i].removeAttribute("active-color");
  }

  var att = document.createAttribute("active-color");

  a.setAttributeNode(att);
  a.classList.toggle("border-white");
  a.classList.toggle("border-zinc-700");

  //   remove active style

  sidenavIcon.classList.remove(activeSidenavIconColorClass);

  //   add new style

  sidenavIcon.classList.add(checkedSidenavIconColor);
}

var dark_mode_toggle = document.querySelector("input#dark-toggle");
var root_html = document.querySelector("html");

dark_mode_toggle.addEventListener("change", function () {
  dark_mode_toggle.setAttribute("manual", "true");
  if (this.checked) {
    root_html.classList.add("dark");
  } else {
    root_html.classList.remove("dark");
  }
});
