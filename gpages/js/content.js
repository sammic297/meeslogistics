var g;
if(!window.__idm_init__){var w=function(){var a=window.self===window.top;a&&(this.K=!0,this.I=0);this.M=[];this.S=[];this.g={};this.B();window.__idm_connect__=this.B.bind(this,!0);this.b(1,window,"scroll",this.qa);this.b(1,window,"blur",this.ja);this.b(1,window,"keydown",this.N,!0);this.b(1,window,"keyup",this.N,!0);this.b(1,window,"mousedown",this.ka,!0);this.b(1,window,"mouseup",this.ma,!0);this.b(1,window,"mousemove",this.la,!0);this.b(1,document,"beforeload",this.ha,!0);this.b(1,document,"DOMContentLoaded",
this.ia);a&&this.b(1,window,"resize",this.pa)};window.__idm_init__=!0;"undefined"==typeof browser&&(browser=chrome);var x={16:!0,17:!0,18:!0,45:!0,46:!0},y=["video","audio","object","embed"],z=/(?:\bytplayer\.config\s*=|'PLAYER_CONFIG'\s*:)\s*\{/,E=/\"?videoData\"?\s*:\s*\[\{/,F=/"progressive":\s*\[/,G=Function.call.bind(Array.prototype.slice),H=Function.apply.bind(Array.prototype.push);g=w.prototype;g.c=0;g.v=-1;g.w=-1;g.Z=1;g.B=function(a){this.P(-1);this.a=a=browser.runtime.connect({name:(this.K?
"top":"sub")+(a?":retry":"")});this.l=a.id||a.portId_||this.l||Math.ceil(1048575*Math.random());this.b(-1,a,"onMessage",this.oa);this.b(-1,a,"onDisconnect",this.na)};g.na=function(){browser.runtime.lastError;this.P();this.a=this.l=null;window.__idm_init__=!1;window.__idm_connect__=null};g.oa=function(a){switch(a[0]){case 11:var b=a[2];if(b){this.I=b;try{window.frameElement&&window.frameElement.setAttribute("__idm_frm__",b)}catch(e){}}a[5]&&this.sa(a[5],a.slice(6));a[3]&&this.F();a[4]&&this.s();break;
case 17:this.aa();a[1]&&this.F();a[2]&&this.s(!0);break;case 12:var b=this.da(a[4]?new RegExp(a[4],"i"):null,a[2]),c=[27,a[1],this.I,b.length];a[3]||(c[4]=b,c[5]=window.location.href,this.K&&(c[6]=window.location.href,c[7]=document.title));this.a.postMessage(c);break;case 13:this.W=a[1];break;case 14:this.f(a[1]);break;case 15:this.fa(a);break;case 16:this.ga(a);break;case 18:this.ea(a)}};g.sa=function(a,b){this.X=a;1==a&&(this.u=b[0]?b[0].split("|").map(function(a){return parseInt(a)}):[],this.U=
b[1]?new RegExp(b[1]):null,this.m=b[2]?new RegExp(b[2]):null,this.Y=b[3]?new RegExp(b[3]):null,this.$=b[4]?new RegExp(b[4]):null)};g.A=function(){if(!this.V){this.V=!0;this.b(2,window,"message",this.ra);var a=document.createElement("script");a.src=browser.extension.getURL("document.js");a.onload=function(){a.parentNode.removeChild(a)};document.documentElement.appendChild(a)}};g.ra=function(a){var b=a.data,c=window.origin||document.origin||location.origin;if(Array.isArray(b)&&a.origin==c)switch(b[0]){case 1229212977:window.postMessage([1229212978,
"/watch\\?(?:.*?&)?pbj=1\\b"],"/");break;case 1229212979:this.a.postMessage([36,parseInt(b[1]),b[2]])}};g.H=function(){var a=window.devicePixelRatio,b=document.width,c=document.body.scrollWidth;b&&c&&(a=b==c?0:b/c);return a};g.o=function(a){try{var b=parseInt(a.getAttribute("__idm_id__"));b||(b=this.l<<10|this.Z++,a.setAttribute("__idm_id__",b));this.g[b]=a;return b}catch(c){return null}};g.ca=function(a,b,c,e){try{var d=document.activeElement,h=d&&0<=y.indexOf(d.localName)?d:null;h||(h=(d=document.elementFromPoint(this.v,
this.w))&&0<=y.indexOf(d.localName)?d:null);for(var m=0,n,p,q,l,k=0;k<y.length;k++){for(var f=document.getElementsByTagName(y[k]),r=0;r<f.length;r++)if(d=f[r],3!=k||"application/x-shockwave-flash"==d.type.toLowerCase()){var t=d.src||d.data;if(t&&(t==a||t==b)){n=d;break}if(!h&&!p)if(!t||t!=c&&t!=e){var v=d.clientWidth,u=d.clientHeight;if(v&&u){var A=d.getBoundingClientRect();if(!(0>=A.right+window.scrollX||0>=A.bottom+window.scrollY)){var B=window.getComputedStyle(d);if(!B||"hidden"!=B.visibility){var C=
v*u;C>m&&1.35*v>u&&v<3*u&&(m=C,q=d);l||(l=d)}}}}else p=d}if(n)break}a=n||h||p||q||l;if(!a)return null;if("embed"==a.localName&&!a.clientWidth&&!a.clientHeight){var D=a.parentElement;"object"==D.localName&&(a=D)}return this.o(a)}catch(I){}};g.ba=function(a,b,c){try{var e,d=[];H(d,document.getElementsByTagName("frame"));H(d,document.getElementsByTagName("iframe"));for(var h=0;h<d.length;h++){var m=d[h];if(parseInt(m.getAttribute("__idm_frm__"))==a){e=m;break}if(!e){var n=m.src;!n||n!=b&&n!=c||(e=m)}}return this.o(e)}catch(p){}};
g.D=function(a){try{var b=a.getBoundingClientRect(),c=Math.round(b.width),e=Math.round(b.height),d;switch(a.localName){case "video":if(15>c||10>e)return null;break;case "audio":if(!c&&!e)return null;d=!0}var h=document.documentElement,m=h.scrollHeight||h.clientHeight,n=Math.round(b.left)+a.clientLeft,p=Math.round(b.top)+a.clientTop;return n>=(h.scrollWidth||h.clientWidth)||p>=m||d&&!n&&!p?null:[n,p,n+c,p+e,this.H()]}catch(q){}};g.s=function(a){if(a){if(this.j(a)){var b=this.f(),c=[34,!1,b,-2,null];
this.a.postMessage(c)}}else if("loading"==document.readyState)this.J=!0;else if(this.j()){this.J=!1;a=1==this.X;var e,d;a&&document.getElementsByTagName("yt-network-manager").length&&this.A();for(var h=document.getElementsByTagName("script"),m=0;m<h.length;m++)if(c=h[m],a){if(c.src&&this.U&&this.U.test(c.src)?(e=c.src,b=1):!c.src&&z.test(c.innerText)&&(this.m&&this.u&&(b=(b=this.m.exec(c.innerText))&&parseInt(b[1]||b[2],10))&&0>this.u.indexOf(b)&&(d=!0),this.A(),b=this.f(),c=[34,!0,b,-2,c.outerHTML],
this.a.postMessage(c),b=2),3==b)break}else if(!c.src&&E.test(c.innerText)){b=this.f();c=[34,!0,b,-2,c.outerHTML];this.a.postMessage(c);break}else if(!c.src&&F.test(c.innerText)){b=this.f();c=[34,!0,b,-2,c.outerHTML];this.a.postMessage(c);break}e&&d&&this.G(e)}};g.G=function(a){if("string"==typeof a){var b=new XMLHttpRequest;b.responseType="text";b.timeout=1E4;b.onreadystatechange=this.G.bind(this);b.open("GET",a,!0);b.send()}else if((b=a.target)&&4==b.readyState&&(a=(a=this.m.exec(b.response))&&parseInt(a[1]||
a[2],10))&&0>this.u.indexOf(a)){var c=this.Y.exec(b.response),b=this.$.exec(b.response);c&&b&&c[2]==b[1]&&this.a.postMessage([37,1,1,{118:a,119:c[0],120:b[0]}])}};g.F=function(){this.a.postMessage([21,window.location.href])};g.ga=function(a){var b=a[2]||this.ba(a[3],a[4],a[5]),c=b&&this.g[b],c=c&&this.D(c);this.a.postMessage([22,a[1],a[3],b,c])};g.ea=function(a){for(var b=a[2],c,e,d=document.getElementsByTagName("a"),h=0;h<d.length;h++)try{var m=d[h];if(m.href==b){c=m.download||null;e=m.innerText.trim()||
m.title||null;break}}catch(n){}this.a.postMessage([35,a[1],c,e])};g.fa=function(a){if(this.j(a)){var b=!a[2],c=a[2]||this.ca(a[3],a[4],a[5],a[6]);a=[23,a[1],c,!1];var e=c&&this.g[c];if(e){var d=this.D(e);d&&(a[4]=d);b?(a[5]=e.localName,a[6]=e.src||e.data):d||document.contains(e)||(a[3]=!0,delete this.g[c])}b&&(a[7]=this.f());this.a.postMessage(a)}};g.f=function(a){if(!a||this.j(a)){var b;try{b=window.top.document.title}catch(c){}if(b)if(b=b.replace(/[ \t\r\n\u25B6]+/g," ").trim(),a)this.a.postMessage([24,
a,b]);else return b}};g.da=function(a,b){for(var c=this.C(document,a,b),e=document.getElementsByTagName("iframe"),d=0;d<e.length;d++)try{var h=e[d],m=h.contentDocument;m&&!h.src&&H(c,this.C(m,a,b))}catch(n){}return c};g.C=function(a,b,c){var e=[],d={},h="",m="",n=!c,p;if(c&&(p=a.getSelection(),!p||p.isCollapsed&&!p.toString().trim()))return e;var q=a.getElementsByTagName("a");if(q)for(var l=0;l<q.length;l++){var k=q[l];if(k&&(n||p.containsNode(k,!0)))try{var f=k.href;f&&!d[f]&&b.test(f)&&(d[f]=e.push([f,
2,k.download||null,k.innerText.trim()||k.title]));c&&d[f]&&(h+=k.innerText,h+="\n")}catch(u){}}if(q=a.getElementsByTagName("area"))for(l=0;l<q.length;l++)if((k=q[l])&&(n||p.containsNode(k,!0)))try{(f=k.href)&&!d[f]&&b.test(f)&&(d[f]=e.push([f,2,null,k.alt]))}catch(u){}if(q=n&&a.getElementsByTagName("iframe"))for(l=0;l<q.length;l++)if((k=q[l])&&(n||p.containsNode(k,!0)))try{(f=k.src)&&!d[f]&&b.test(f)&&(d[f]=e.push([f,4]))}catch(u){}if(l=c&&p.toString())for(var r=this.i(l),k=this.i(h),l=0;l<r.length;l++)(f=
r[l])&&!d[f]&&b.test(f)&&0>k.indexOf(f)&&(d[f]=e.push([f,1]));if(c=c&&a.getElementsByTagName("textarea"))for(l=0;l<c.length;l++){var k=c[l],h=k.selectionStart,q=k.selectionEnd,t=p.isCollapsed&&h<q;if(k&&(t||p.containsNode(k,!0)))try{for(var v=k.value,r=this.i(t?v.substring(h,q):v),k=0;k<r.length;k++)(f=r[k])&&!d[f]&&b.test(f)&&(d[f]=e.push([f,1]))}catch(u){}}if(r=(n||!e.length)&&a.getElementsByTagName("img"))for(l=0;l<r.length;l++)if((k=r[l])&&(n||p.containsNode(k,!0)))try{(f=k.src)&&!d[f]&&b.test(f)&&
(d[f]=e.push([f,3,null,"<<<=IDMTRANSMITIMGPREFIX=>>>"+k.alt])),n&&k.onclick&&(m+=k.onclick,m+="\n")}catch(u){}if(f=n&&a.getElementsByTagName("script")){for(l=0;l<f.length;l++)m+=f[l].innerText,m+="\n";for(m=this.i(m);m.length;)(f=m.shift())&&!d[f]&&b.test(f)&&(d[f]=e.push([f,5]))}return e};g.i=function(a){if(!this.L){var b="\\b\\w+://(?:[%T]*(?::[%T]*)?@)?[%H.]+\\.[%H]+(?::\\d+)?(?:/(?:(?: +(?!\\w+:))?[%T/~;])*)?(?:\\?[%Q]*)?(?:#[%T]*)?".replace(/%\w/g,function(a){return this[a]}.bind({"%H":"\\w\\-\u00a0-\ufeff",
"%T":"\\w\\-.+*()$!,%\u00a0-\ufeff","%Q":"^\\s\\[\\]{}()"}));this.L=new RegExp(b,"gi")}for(var c=[];b=this.L.exec(a);)c.push(b.shift());return c};g.j=function(a){if(this.h)return!0;a=G(arguments);a.unshift(arguments.callee.caller);this.S.push(a);return!1};g.aa=function(){this.R&&this.h&&(this.h=!1,this.T=window.setTimeout(this.O.bind(this,!1),3E3))};g.ia=function(){this.h=!0;var a;try{a=window.top.document.getElementsByTagName("title")[0]}catch(c){}if(a){var b=this.R;b||(this.R=b=new MutationObserver(this.O.bind(this)));
b.observe(a,{childList:!0})}this.J&&this.s()};g.O=function(a){this.h=!0;a&&(window.clearTimeout(this.T),this.T=null);a=this.S;for(var b;b=a.shift();)b.shift().apply(this,b)};g.ha=function(a){var b=a.target,c=b.localName;0<=y.indexOf(c)&&a.url&&(b=this.o(b),this.a.postMessage([25,b,c,a.url]))};g.N=function(a){x[a.keyCode]&&this.a.postMessage([31,a.keyCode,"keydown"==a.type])};g.ka=function(a){this.W&&this.a.postMessage([28]);if(0==a.button){var b=a.view.getSelection();b&&b.isCollapsed&&!b.toString().trim()&&
(this.c=1);this.a.postMessage([32,a.button,!0])}};g.ma=function(a){if(0==a.button){this.v=a.clientX;this.w=a.clientY;this.a.postMessage([32,a.button,!1]);var b=a.view.getSelection();b&&this.c&&(this.c=b.isCollapsed&&!b.toString().trim()?0:2)&&this.a.postMessage([26,a.clientX,a.clientY,this.H()])}};g.la=function(){2==this.c&&(this.c=0)};g.qa=function(){this.a.postMessage([29])};g.pa=function(a){a=a.target;this.a.postMessage([30,a.innerWidth,a.innerHeight])};g.ja=function(){this.c=0;this.a.postMessage([33])};
g.b=function(a,b,c,e){var d=G(arguments);d[3]=e.bind(this);this.M.push(d);0>a?(b=b[c],b.addListener.apply(b,d.slice(3))):b.addEventListener.apply(b,d.slice(2))};g.P=function(a){for(var b=this.M,c=0;c<b.length;c++){var e=b[c][0];if(!a||a==e){var d=b.splice(c--,1).pop(),h=d.splice(0,2).pop();0>e?(h=h[d.shift()],h.removeListener.apply(h,d)):h.removeEventListener.apply(h,d)}}};new w}!0;