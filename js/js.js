// @prepros-prepend "jquery.js"
// @prepros-prepend "lightbox.js"
// @prepros-prepend "cookies.js"
// @prepros-prepend "ciasteczka.js"
// @prepros-prepend "slick.js"


/*******************
modernizr potrzebny do detekcji rozdzielczości ekranu 
********************/
// !function(e,n,t){function o(e,n){return typeof e===n}function a(){var e,n,t,a,s,i,r;for(var l in f)if(f.hasOwnProperty(l)){if(e=[],n=f[l],n.name&&(e.push(n.name.toLowerCase()),n.options&&n.options.aliases&&n.options.aliases.length))for(t=0;t<n.options.aliases.length;t++)e.push(n.options.aliases[t].toLowerCase());for(a=o(n.fn,"function")?n.fn():n.fn,s=0;s<e.length;s++)i=e[s],r=i.split("."),1===r.length?Modernizr[r[0]]=a:(!Modernizr[r[0]]||Modernizr[r[0]]instanceof Boolean||(Modernizr[r[0]]=new Boolean(Modernizr[r[0]])),Modernizr[r[0]][r[1]]=a),d.push((a?"":"no-")+r.join("-"))}}function s(e){var n=u.className,t=Modernizr._config.classPrefix||"";if(p&&(n=n.baseVal),Modernizr._config.enableJSClass){var o=new RegExp("(^|\\s)"+t+"no-js(\\s|$)");n=n.replace(o,"$1"+t+"js$2")}Modernizr._config.enableClasses&&(n+=" "+t+e.join(" "+t),p?u.className.baseVal=n:u.className=n)}function i(){return"function"!=typeof n.createElement?n.createElement(arguments[0]):p?n.createElementNS.call(n,"http://www.w3.org/2000/svg",arguments[0]):n.createElement.apply(n,arguments)}function r(){var e=n.body;return e||(e=i(p?"svg":"body"),e.fake=!0),e}function l(e,t,o,a){var s,l,d,f,c="modernizr",p=i("div"),m=r();if(parseInt(o,10))for(;o--;)d=i("div"),d.id=a?a[o]:c+(o+1),p.appendChild(d);return s=i("style"),s.type="text/css",s.id="s"+c,(m.fake?m:p).appendChild(s),m.appendChild(p),s.styleSheet?s.styleSheet.cssText=e:s.appendChild(n.createTextNode(e)),p.id=c,m.fake&&(m.style.background="",m.style.overflow="hidden",f=u.style.overflow,u.style.overflow="hidden",u.appendChild(m)),l=t(p,e),m.fake?(m.parentNode.removeChild(m),u.style.overflow=f,u.offsetHeight):p.parentNode.removeChild(p),!!l}var d=[],f=[],c={_version:"3.3.1",_config:{classPrefix:"",enableClasses:!0,enableJSClass:!0,usePrefixes:!0},_q:[],on:function(e,n){var t=this;setTimeout(function(){n(t[e])},0)},addTest:function(e,n,t){f.push({name:e,fn:n,options:t})},addAsyncTest:function(e){f.push({name:null,fn:e})}},Modernizr=function(){};Modernizr.prototype=c,Modernizr=new Modernizr;var u=n.documentElement,p="svg"===u.nodeName.toLowerCase(),m=function(){var n=e.matchMedia||e.msMatchMedia;return n?function(e){var t=n(e);return t&&t.matches||!1}:function(n){var t=!1;return l("@media "+n+" { #modernizr { position: absolute; } }",function(n){t="absolute"==(e.getComputedStyle?e.getComputedStyle(n,null):n.currentStyle).position}),t}}();c.mq=m,Modernizr.addTest("mediaqueries",m("only all")),a(),s(d),delete c.addTest,delete c.addAsyncTest;for(var h=0;h<Modernizr._q.length;h++)Modernizr._q[h]();e.Modernizr=Modernizr}(window,document);


/******************
Detekcja rozdzielczości ekranu 
*******************/
// var min_width;
// if (Modernizr.mq('(min-width: 0px)')) {
//   min_width = function (width) {
// 	return Modernizr.mq('(min-width: ' + width + 'px)');
//   };
// }
// else {
//   min_width = function (width) {
// 	return $(window).width() >= width;
//   };
// }
// var resize = function() {
//   if (min_width(1024)) {
// 	$('#header').css( { height:($('#header').width()), } );	
// 	$(document).scroll(function() {
// 		$('#topstrony').css({
// 			'top' : ($(document).scrollTop()/2)+"px"
// 		});		
// 	})	
//   }
// };
// $(window).resize(resize);
// resize();



/*******************
Dodanie klasy po przewinięciu strony 
********************/
// $(window).scroll(function() {    
// 	var scroll = $(window).scrollTop();
// 	if (scroll >= 150) {
// 		$("#header").addClass("przyklejone");
// 	} else {
// 		$("#header").removeClass("przyklejone");
// 	}
// 	if (scroll >= 300) {
// 		$("#header").addClass("widoczne");
// 	} else {
// 		$("#header").removeClass("widoczne");
// 	}
// });	

$(document).ready(function() {
	
	$(".otwieracz").click(function() {
		$("body").toggleClass('menu-otwarte');
//		$("body").removeClass('telefon-otwarte');
//		$("body").removeClass('user-otwarte');
	});
//	var nav = $('#powrot');
//	$(window).scroll(function () {
//		if ($(this).scrollTop() > 300) {
//			nav.addClass("wysun");
//		} else {
//			nav.removeClass("wysun");
//		}
//	});
//	
//	$(".imagePreview a").tosrus();//	
//	$("#pageDescription a").tosrus();//	
//	$(".imagesList a").tosrus({
//	   pagination : {
//		  add        : true,
//		  type       : "thumbnails"
//	   },
//		caption    : {
//		  add        : true
//	   }
//	});
	
});