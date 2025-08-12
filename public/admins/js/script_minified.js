/*! jQuery v3.2.1 | (c) JS Foundation and other contributors | jquery.org/license */
!function(a,b){"use strict";"object"==typeof module&&"object"==typeof module.exports?module.exports=a.document?b(a,!0):function(a){if(!a.document)throw new Error("jQuery requires a window with a document");return b(a)}:b(a)}("undefined"!=typeof window?window:this,function(a,b){"use strict";var c=[],d=a.document,e=Object.getPrototypeOf,f=c.slice,g=c.concat,h=c.push,i=c.indexOf,j={},k=j.toString,l=j.hasOwnProperty,m=l.toString,n=m.call(Object),o={};function p(a,b){b=b||d;var c=b.createElement("script");c.text=a,b.head.appendChild(c).parentNode.removeChild(c)}var q="3.2.1",r=function(a,b){return new r.fn.init(a,b)},s=/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,t=/^-ms-/,u=/-([a-z])/g,v=function(a,b){return b.toUpperCase()};r.fn=r.prototype={jquery:q,constructor:r,length:0,toArray:function(){return f.call(this)},get:function(a){return null==a?f.call(this):a<0?this[a+this.length]:this[a]},pushStack:function(a){var b=r.merge(this.constructor(),a);return b.prevObject=this,b},each:function(a){return r.each(this,a)},map:function(a){return this.pushStack(r.map(this,function(b,c){return a.call(b,c,b)}))},slice:function(){return this.pushStack(f.apply(this,arguments))},first:function(){return this.eq(0)},last:function(){return this.eq(-1)},eq:function(a){var b=this.length,c=+a+(a<0?b:0);return this.pushStack(c>=0&&c<b?[this[c]]:[])},end:function(){return this.prevObject||this.constructor()},push:h,sort:c.sort,splice:c.splice},r.extend=r.fn.extend=function(){var a,b,c,d,e,f,g=arguments[0]||{},h=1,i=arguments.length,j=!1;for("boolean"==typeof g&&(j=g,g=arguments[h]||{},h++),"object"==typeof g||r.isFunction(g)||(g={}),h===i&&(g=this,h--);h<i;h++)if(null!=(a=arguments[h]))for(b in a)c=g[b],d=a[b],g!==d&&(j&&d&&(r.isPlainObject(d)||(e=Array.isArray(d)))?(e?(e=!1,f=c&&Array.isArray(c)?c:[]):f=c&&r.isPlainObject(c)?c:{},g[b]=r.extend(j,f,d)):void 0!==d&&(g[b]=d));return g},r.extend({expando:"jQuery"+(q+Math.random()).replace(/\D/g,""),isReady:!0,error:function(a){throw new Error(a)},noop:function(){},isFunction:function(a){return"function"===r.type(a)},isWindow:function(a){return null!=a&&a===a.window},isNumeric:function(a){var b=r.type(a);return("number"===b||"string"===b)&&!isNaN(a-parseFloat(a))},isPlainObject:function(a){var b,c;return!(!a||"[object Object]"!==k.call(a))&&(!(b=e(a))||(c=l.call(b,"constructor")&&b.constructor,"function"==typeof c&&m.call(c)===n))},isEmptyObject:function(a){var b;for(b in a)return!1;return!0},type:function(a){return null==a?a+"":"object"==typeof a||"function"==typeof a?j[k.call(a)]||"object":typeof a},globalEval:function(a){p(a)},camelCase:function(a){return a.replace(t,"ms-").replace(u,v)},each:function(a,b){var c,d=0;if(w(a)){for(c=a.length;d<c;d++)if(b.call(a[d],d,a[d])===!1)break}else for(d in a)if(b.call(a[d],d,a[d])===!1)break;return a},trim:function(a){return null==a?"":(a+"").replace(s,"")},makeArray:function(a,b){var c=b||[];return null!=a&&(w(Object(a))?r.merge(c,"string"==typeof a?[a]:a):h.call(c,a)),c},inArray:function(a,b,c){return null==b?-1:i.call(b,a,c)},merge:function(a,b){for(var c=+b.length,d=0,e=a.length;d<c;d++)a[e++]=b[d];return a.length=e,a},grep:function(a,b,c){for(var d,e=[],f=0,g=a.length,h=!c;f<g;f++)d=!b(a[f],f),d!==h&&e.push(a[f]);return e},map:function(a,b,c){var d,e,f=0,h=[];if(w(a))for(d=a.length;f<d;f++)e=b(a[f],f,c),null!=e&&h.push(e);else for(f in a)e=b(a[f],f,c),null!=e&&h.push(e);return g.apply([],h)},guid:1,proxy:function(a,b){var c,d,e;if("string"==typeof b&&(c=a[b],b=a,a=c),r.isFunction(a))return d=f.call(arguments,2),e=function(){return a.apply(b||this,d.concat(f.call(arguments)))},e.guid=a.guid=a.guid||r.guid++,e},now:Date.now,support:o}),"function"==typeof Symbol&&(r.fn[Symbol.iterator]=c[Symbol.iterator]),r.each("Boolean Number String Function Array Date RegExp Object Error Symbol".split(" "),function(a,b){j["[object "+b+"]"]=b.toLowerCase()});function w(a){var b=!!a&&"length"in a&&a.length,c=r.type(a);return"function"!==c&&!r.isWindow(a)&&("array"===c||0===b||"number"==typeof b&&b>0&&b-1 in a)}var x=function(a){var b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u="sizzle"+1*new Date,v=a.document,w=0,x=0,y=ha(),z=ha(),A=ha(),B=function(a,b){return a===b&&(l=!0),0},C={}.hasOwnProperty,D=[],E=D.pop,F=D.push,G=D.push,H=D.slice,I=function(a,b){for(var c=0,d=a.length;c<d;c++)if(a[c]===b)return c;return-1},J="checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",K="[\\x20\\t\\r\\n\\f]",L="(?:\\\\.|[\\w-]|[^\0-\\xa0])+",M="\\["+K+"*("+L+")(?:"+K+"*([*^$|!~]?=)"+K+"*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|("+L+"))|)"+K+"*\\]",N=":("+L+")(?:\\((('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|((?:\\\\.|[^\\\\()[\\]]|"+M+")*)|.*)\\)|)",O=new RegExp(K+"+","g"),P=new RegExp("^"+K+"+|((?:^|[^\\\\])(?:\\\\.)*)"+K+"+$","g"),Q=new RegExp("^"+K+"*,"+K+"*"),R=new RegExp("^"+K+"*([>+~]|"+K+")"+K+"*"),S=new RegExp("="+K+"*([^\\]'\"]*?)"+K+"*\\]","g"),T=new RegExp(N),U=new RegExp("^"+L+"$"),V={ID:new RegExp("^#("+L+")"),CLASS:new RegExp("^\\.("+L+")"),TAG:new RegExp("^("+L+"|[*])"),ATTR:new RegExp("^"+M),PSEUDO:new RegExp("^"+N),CHILD:new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\("+K+"*(even|odd|(([+-]|)(\\d*)n|)"+K+"*(?:([+-]|)"+K+"*(\\d+)|))"+K+"*\\)|)","i"),bool:new RegExp("^(?:"+J+")$","i"),needsContext:new RegExp("^"+K+"*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\("+K+"*((?:-\\d)?\\d*)"+K+"*\\)|)(?=[^-]|$)","i")},W=/^(?:input|select|textarea|button)$/i,X=/^h\d$/i,Y=/^[^{]+\{\s*\[native \w/,Z=/^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,$=/[+~]/,_=new RegExp("\\\\([\\da-f]{1,6}"+K+"?|("+K+")|.)","ig"),aa=function(a,b,c){var d="0x"+b-65536;return d!==d||c?b:d<0?String.fromCharCode(d+65536):String.fromCharCode(d>>10|55296,1023&d|56320)},ba=/([\0-\x1f\x7f]|^-?\d)|^-$|[^\0-\x1f\x7f-\uFFFF\w-]/g,ca=function(a,b){return b?"\0"===a?"\ufffd":a.slice(0,-1)+"\\"+a.charCodeAt(a.length-1).toString(16)+" ":"\\"+a},da=function(){m()},ea=ta(function(a){return a.disabled===!0&&("form"in a||"label"in a)},{dir:"parentNode",next:"legend"});try{G.apply(D=H.call(v.childNodes),v.childNodes),D[v.childNodes.length].nodeType}catch(fa){G={apply:D.length?function(a,b){F.apply(a,H.call(b))}:function(a,b){var c=a.length,d=0;while(a[c++]=b[d++]);a.length=c-1}}}function ga(a,b,d,e){var f,h,j,k,l,o,r,s=b&&b.ownerDocument,w=b?b.nodeType:9;if(d=d||[],"string"!=typeof a||!a||1!==w&&9!==w&&11!==w)return d;if(!e&&((b?b.ownerDocument||b:v)!==n&&m(b),b=b||n,p)){if(11!==w&&(l=Z.exec(a)))if(f=l[1]){if(9===w){if(!(j=b.getElementById(f)))return d;if(j.id===f)return d.push(j),d}else if(s&&(j=s.getElementById(f))&&t(b,j)&&j.id===f)return d.push(j),d}else{if(l[2])return G.apply(d,b.getElementsByTagName(a)),d;if((f=l[3])&&c.getElementsByClassName&&b.getElementsByClassName)return G.apply(d,b.getElementsByClassName(f)),d}if(c.qsa&&!A[a+" "]&&(!q||!q.test(a))){if(1!==w)s=b,r=a;else if("object"!==b.nodeName.toLowerCase()){(k=b.getAttribute("id"))?k=k.replace(ba,ca):b.setAttribute("id",k=u),o=g(a),h=o.length;while(h--)o[h]="#"+k+" "+sa(o[h]);r=o.join(","),s=$.test(a)&&qa(b.parentNode)||b}if(r)try{return G.apply(d,s.querySelectorAll(r)),d}catch(x){}finally{k===u&&b.removeAttribute("id")}}}return i(a.replace(P,"$1"),b,d,e)}function ha(){var a=[];function b(c,e){return a.push(c+" ")>d.cacheLength&&delete b[a.shift()],b[c+" "]=e}return b}function ia(a){return a[u]=!0,a}function ja(a){var b=n.createElement("fieldset");try{return!!a(b)}catch(c){return!1}finally{b.parentNode&&b.parentNode.removeChild(b),b=null}}function ka(a,b){var c=a.split("|"),e=c.length;while(e--)d.attrHandle[c[e]]=b}function la(a,b){var c=b&&a,d=c&&1===a.nodeType&&1===b.nodeType&&a.sourceIndex-b.sourceIndex;if(d)return d;if(c)while(c=c.nextSibling)if(c===b)return-1;return a?1:-1}function ma(a){return function(b){var c=b.nodeName.toLowerCase();return"input"===c&&b.type===a}}function na(a){return function(b){var c=b.nodeName.toLowerCase();return("input"===c||"button"===c)&&b.type===a}}function oa(a){return function(b){return"form"in b?b.parentNode&&b.disabled===!1?"label"in b?"label"in b.parentNode?b.parentNode.disabled===a:b.disabled===a:b.isDisabled===a||b.isDisabled!==!a&&ea(b)===a:b.disabled===a:"label"in b&&b.disabled===a}}function pa(a){return ia(function(b){return b=+b,ia(function(c,d){var e,f=a([],c.length,b),g=f.length;while(g--)c[e=f[g]]&&(c[e]=!(d[e]=c[e]))})})}function qa(a){return a&&"undefined"!=typeof a.getElementsByTagName&&a}c=ga.support={},f=ga.isXML=function(a){var b=a&&(a.ownerDocument||a).documentElement;return!!b&&"HTML"!==b.nodeName},m=ga.setDocument=function(a){var b,e,g=a?a.ownerDocument||a:v;return g!==n&&9===g.nodeType&&g.documentElement?(n=g,o=n.documentElement,p=!f(n),v!==n&&(e=n.defaultView)&&e.top!==e&&(e.addEventListener?e.addEventListener("unload",da,!1):e.attachEvent&&e.attachEvent("onunload",da)),c.attributes=ja(function(a){return a.className="i",!a.getAttribute("className")}),c.getElementsByTagName=ja(function(a){return a.appendChild(n.createComment("")),!a.getElementsByTagName("*").length}),c.getElementsByClassName=Y.test(n.getElementsByClassName),c.getById=ja(function(a){return o.appendChild(a).id=u,!n.getElementsByName||!n.getElementsByName(u).length}),c.getById?(d.filter.ID=function(a){var b=a.replace(_,aa);return function(a){return a.getAttribute("id")===b}},d.find.ID=function(a,b){if("undefined"!=typeof b.getElementById&&p){var c=b.getElementById(a);return c?[c]:[]}}):(d.filter.ID=function(a){var b=a.replace(_,aa);return function(a){var c="undefined"!=typeof a.getAttributeNode&&a.getAttributeNode("id");return c&&c.value===b}},d.find.ID=function(a,b){if("undefined"!=typeof b.getElementById&&p){var c,d,e,f=b.getElementById(a);if(f){if(c=f.getAttributeNode("id"),c&&c.value===a)return[f];e=b.getElementsByName(a),d=0;while(f=e[d++])if(c=f.getAttributeNode("id"),c&&c.value===a)return[f]}return[]}}),d.find.TAG=c.getElementsByTagName?function(a,b){return"undefined"!=typeof b.getElementsByTagName?b.getElementsByTagName(a):c.qsa?b.querySelectorAll(a):void 0}:function(a,b){var c,d=[],e=0,f=b.getElementsByTagName(a);if("*"===a){while(c=f[e++])1===c.nodeType&&d.push(c);return d}return f},d.find.CLASS=c.getElementsByClassName&&function(a,b){if("undefined"!=typeof b.getElementsByClassName&&p)return b.getElementsByClassName(a)},r=[],q=[],(c.qsa=Y.test(n.querySelectorAll))&&(ja(function(a){o.appendChild(a).innerHTML="<a id='"+u+"'></a><select id='"+u+"-\r\\' msallowcapture=''><option selected=''></option></select>",a.querySelectorAll("[msallowcapture^='']").length&&q.push("[*^$]="+K+"*(?:''|\"\")"),a.querySelectorAll("[selected]").length||q.push("\\["+K+"*(?:value|"+J+")"),a.querySelectorAll("[id~="+u+"-]").length||q.push("~="),a.querySelectorAll(":checked").length||q.push(":checked"),a.querySelectorAll("a#"+u+"+*").length||q.push(".#.+[+~]")}),ja(function(a){a.innerHTML="<a href='' disabled='disabled'></a><select disabled='disabled'><option/></select>";var b=n.createElement("input");b.setAttribute("type","hidden"),a.appendChild(b).setAttribute("name","D"),a.querySelectorAll("[name=d]").length&&q.push("name"+K+"*[*^$|!~]?="),2!==a.querySelectorAll(":enabled").length&&q.push(":enabled",":disabled"),o.appendChild(a).disabled=!0,2!==a.querySelectorAll(":disabled").length&&q.push(":enabled",":disabled"),a.querySelectorAll("*,:x"),q.push(",.*:")})),(c.matchesSelector=Y.test(s=o.matches||o.webkitMatchesSelector||o.mozMatchesSelector||o.oMatchesSelector||o.msMatchesSelector))&&ja(function(a){c.disconnectedMatch=s.call(a,"*"),s.call(a,"[s!='']:x"),r.push("!=",N)}),q=q.length&&new RegExp(q.join("|")),r=r.length&&new RegExp(r.join("|")),b=Y.test(o.compareDocumentPosition),t=b||Y.test(o.contains)?function(a,b){var c=9===a.nodeType?a.documentElement:a,d=b&&b.parentNode;return a===d||!(!d||1!==d.nodeType||!(c.contains?c.contains(d):a.compareDocumentPosition&&16&a.compareDocumentPosition(d)))}:function(a,b){if(b)while(b=b.parentNode)if(b===a)return!0;return!1},B=b?function(a,b){if(a===b)return l=!0,0;var d=!a.compareDocumentPosition-!b.compareDocumentPosition;return d?d:(d=(a.ownerDocument||a)===(b.ownerDocument||b)?a.compareDocumentPosition(b):1,1&d||!c.sortDetached&&b.compareDocumentPosition(a)===d?a===n||a.ownerDocument===v&&t(v,a)?-1:b===n||b.ownerDocument===v&&t(v,b)?1:k?I(k,a)-I(k,b):0:4&d?-1:1)}:function(a,b){if(a===b)return l=!0,0;var c,d=0,e=a.parentNode,f=b.parentNode,g=[a],h=[b];if(!e||!f)return a===n?-1:b===n?1:e?-1:f?1:k?I(k,a)-I(k,b):0;if(e===f)return la(a,b);c=a;while(c=c.parentNode)g.unshift(c);c=b;while(c=c.parentNode)h.unshift(c);while(g[d]===h[d])d++;return d?la(g[d],h[d]):g[d]===v?-1:h[d]===v?1:0},n):n},ga.matches=function(a,b){return ga(a,null,null,b)},ga.matchesSelector=function(a,b){if((a.ownerDocument||a)!==n&&m(a),b=b.replace(S,"='$1']"),c.matchesSelector&&p&&!A[b+" "]&&(!r||!r.test(b))&&(!q||!q.test(b)))try{var d=s.call(a,b);if(d||c.disconnectedMatch||a.document&&11!==a.document.nodeType)return d}catch(e){}return ga(b,n,null,[a]).length>0},ga.contains=function(a,b){return(a.ownerDocument||a)!==n&&m(a),t(a,b)},ga.attr=function(a,b){(a.ownerDocument||a)!==n&&m(a);var e=d.attrHandle[b.toLowerCase()],f=e&&C.call(d.attrHandle,b.toLowerCase())?e(a,b,!p):void 0;return void 0!==f?f:c.attributes||!p?a.getAttribute(b):(f=a.getAttributeNode(b))&&f.specified?f.value:null},ga.escape=function(a){return(a+"").replace(ba,ca)},ga.error=function(a){throw new Error("Syntax error, unrecognized expression: "+a)},ga.uniqueSort=function(a){var b,d=[],e=0,f=0;if(l=!c.detectDuplicates,k=!c.sortStable&&a.slice(0),a.sort(B),l){while(b=a[f++])b===a[f]&&(e=d.push(f));while(e--)a.splice(d[e],1)}return k=null,a},e=ga.getText=function(a){var b,c="",d=0,f=a.nodeType;if(f){if(1===f||9===f||11===f){if("string"==typeof a.textContent)return a.textContent;for(a=a.firstChild;a;a=a.nextSibling)c+=e(a)}else if(3===f||4===f)return a.nodeValue}else while(b=a[d++])c+=e(b);return c},d=ga.selectors={cacheLength:50,createPseudo:ia,match:V,attrHandle:{},find:{},relative:{">":{dir:"parentNode",first:!0}," ":{dir:"parentNode"},"+":{dir:"previousSibling",first:!0},"~":{dir:"previousSibling"}},preFilter:{ATTR:function(a){return a[1]=a[1].replace(_,aa),a[3]=(a[3]||a[4]||a[5]||"").replace(_,aa),"~="===a[2]&&(a[3]=" "+a[3]+" "),a.slice(0,4)},CHILD:function(a){return a[1]=a[1].toLowerCase(),"nth"===a[1].slice(0,3)?(a[3]||ga.error(a[0]),a[4]=+(a[4]?a[5]+(a[6]||1):2*("even"===a[3]||"odd"===a[3])),a[5]=+(a[7]+a[8]||"odd"===a[3])):a[3]&&ga.error(a[0]),a},PSEUDO:function(a){var b,c=!a[6]&&a[2];return V.CHILD.test(a[0])?null:(a[3]?a[2]=a[4]||a[5]||"":c&&T.test(c)&&(b=g(c,!0))&&(b=c.indexOf(")",c.length-b)-c.length)&&(a[0]=a[0].slice(0,b),a[2]=c.slice(0,b)),a.slice(0,3))}},filter:{TAG:function(a){var b=a.replace(_,aa).toLowerCase();return"*"===a?function(){return!0}:function(a){return a.nodeName&&a.nodeName.toLowerCase()===b}},CLASS:function(a){var b=y[a+" "];return b||(b=new RegExp("(^|"+K+")"+a+"("+K+"|$)"))&&y(a,function(a){return b.test("string"==typeof a.className&&a.className||"undefined"!=typeof a.getAttribute&&a.getAttribute("class")||"")})},ATTR:function(a,b,c){return function(d){var e=ga.attr(d,a);return null==e?"!="===b:!b||(e+="","="===b?e===c:"!="===b?e!==c:"^="===b?c&&0===e.indexOf(c):"*="===b?c&&e.indexOf(c)>-1:"$="===b?c&&e.slice(-c.length)===c:"~="===b?(" "+e.replace(O," ")+" ").indexOf(c)>-1:"|="===b&&(e===c||e.slice(0,c.length+1)===c+"-"))}},CHILD:function(a,b,c,d,e){var f="nth"!==a.slice(0,3),g="last"!==a.slice(-4),h="of-type"===b;return 1===d&&0===e?function(a){return!!a.parentNode}:function(b,c,i){var j,k,l,m,n,o,p=f!==g?"nextSibling":"previousSibling",q=b.parentNode,r=h&&b.nodeName.toLowerCase(),s=!i&&!h,t=!1;if(q){if(f){while(p){m=b;while(m=m[p])if(h?m.nodeName.toLowerCase()===r:1===m.nodeType)return!1;o=p="only"===a&&!o&&"nextSibling"}return!0}if(o=[g?q.firstChild:q.lastChild],g&&s){m=q,l=m[u]||(m[u]={}),k=l[m.uniqueID]||(l[m.uniqueID]={}),j=k[a]||[],n=j[0]===w&&j[1],t=n&&j[2],m=n&&q.childNodes[n];while(m=++n&&m&&m[p]||(t=n=0)||o.pop())if(1===m.nodeType&&++t&&m===b){k[a]=[w,n,t];break}}else if(s&&(m=b,l=m[u]||(m[u]={}),k=l[m.uniqueID]||(l[m.uniqueID]={}),j=k[a]||[],n=j[0]===w&&j[1],t=n),t===!1)while(m=++n&&m&&m[p]||(t=n=0)||o.pop())if((h?m.nodeName.toLowerCase()===r:1===m.nodeType)&&++t&&(s&&(l=m[u]||(m[u]={}),k=l[m.uniqueID]||(l[m.uniqueID]={}),k[a]=[w,t]),m===b))break;return t-=e,t===d||t%d===0&&t/d>=0}}},PSEUDO:function(a,b){var c,e=d.pseudos[a]||d.setFilters[a.toLowerCase()]||ga.error("unsupported pseudo: "+a);return e[u]?e(b):e.length>1?(c=[a,a,"",b],d.setFilters.hasOwnProperty(a.toLowerCase())?ia(function(a,c){var d,f=e(a,b),g=f.length;while(g--)d=I(a,f[g]),a[d]=!(c[d]=f[g])}):function(a){return e(a,0,c)}):e}},pseudos:{not:ia(function(a){var b=[],c=[],d=h(a.replace(P,"$1"));return d[u]?ia(function(a,b,c,e){var f,g=d(a,null,e,[]),h=a.length;while(h--)(f=g[h])&&(a[h]=!(b[h]=f))}):function(a,e,f){return b[0]=a,d(b,null,f,c),b[0]=null,!c.pop()}}),has:ia(function(a){return function(b){return ga(a,b).length>0}}),contains:ia(function(a){return a=a.replace(_,aa),function(b){return(b.textContent||b.innerText||e(b)).indexOf(a)>-1}}),lang:ia(function(a){return U.test(a||"")||ga.error("unsupported lang: "+a),a=a.replace(_,aa).toLowerCase(),function(b){var c;do if(c=p?b.lang:b.getAttribute("xml:lang")||b.getAttribute("lang"))return c=c.toLowerCase(),c===a||0===c.indexOf(a+"-");while((b=b.parentNode)&&1===b.nodeType);return!1}}),target:function(b){var c=a.location&&a.location.hash;return c&&c.slice(1)===b.id},root:function(a){return a===o},focus:function(a){return a===n.activeElement&&(!n.hasFocus||n.hasFocus())&&!!(a.type||a.href||~a.tabIndex)},enabled:oa(!1),disabled:oa(!0),checked:function(a){var b=a.nodeName.toLowerCase();return"input"===b&&!!a.checked||"option"===b&&!!a.selected},selected:function(a){return a.parentNode&&a.parentNode.selectedIndex,a.selected===!0},empty:function(a){for(a=a.firstChild;a;a=a.nextSibling)if(a.nodeType<6)return!1;return!0},parent:function(a){return!d.pseudos.empty(a)},header:function(a){return X.test(a.nodeName)},input:function(a){return W.test(a.nodeName)},button:function(a){var b=a.nodeName.toLowerCase();return"input"===b&&"button"===a.type||"button"===b},text:function(a){var b;return"input"===a.nodeName.toLowerCase()&&"text"===a.type&&(null==(b=a.getAttribute("type"))||"text"===b.toLowerCase())},first:pa(function(){return[0]}),last:pa(function(a,b){return[b-1]}),eq:pa(function(a,b,c){return[c<0?c+b:c]}),even:pa(function(a,b){for(var c=0;c<b;c+=2)a.push(c);return a}),odd:pa(function(a,b){for(var c=1;c<b;c+=2)a.push(c);return a}),lt:pa(function(a,b,c){for(var d=c<0?c+b:c;--d>=0;)a.push(d);return a}),gt:pa(function(a,b,c){for(var d=c<0?c+b:c;++d<b;)a.push(d);return a})}},d.pseudos.nth=d.pseudos.eq;for(b in{radio:!0,checkbox:!0,file:!0,password:!0,image:!0})d.pseudos[b]=ma(b);for(b in{submit:!0,reset:!0})d.pseudos[b]=na(b);function ra(){}ra.prototype=d.filters=d.pseudos,d.setFilters=new ra,g=ga.tokenize=function(a,b){var c,e,f,g,h,i,j,k=z[a+" "];if(k)return b?0:k.slice(0);h=a,i=[],j=d.preFilter;while(h){c&&!(e=Q.exec(h))||(e&&(h=h.slice(e[0].length)||h),i.push(f=[])),c=!1,(e=R.exec(h))&&(c=e.shift(),f.push({value:c,type:e[0].replace(P," ")}),h=h.slice(c.length));for(g in d.filter)!(e=V[g].exec(h))||j[g]&&!(e=j[g](e))||(c=e.shift(),f.push({value:c,type:g,matches:e}),h=h.slice(c.length));if(!c)break}return b?h.length:h?ga.error(a):z(a,i).slice(0)};function sa(a){for(var b=0,c=a.length,d="";b<c;b++)d+=a[b].value;return d}function ta(a,b,c){var d=b.dir,e=b.next,f=e||d,g=c&&"parentNode"===f,h=x++;return b.first?function(b,c,e){while(b=b[d])if(1===b.nodeType||g)return a(b,c,e);return!1}:function(b,c,i){var j,k,l,m=[w,h];if(i){while(b=b[d])if((1===b.nodeType||g)&&a(b,c,i))return!0}else while(b=b[d])if(1===b.nodeType||g)if(l=b[u]||(b[u]={}),k=l[b.uniqueID]||(l[b.uniqueID]={}),e&&e===b.nodeName.toLowerCase())b=b[d]||b;else{if((j=k[f])&&j[0]===w&&j[1]===h)return m[2]=j[2];if(k[f]=m,m[2]=a(b,c,i))return!0}return!1}}function ua(a){return a.length>1?function(b,c,d){var e=a.length;while(e--)if(!a[e](b,c,d))return!1;return!0}:a[0]}function va(a,b,c){for(var d=0,e=b.length;d<e;d++)ga(a,b[d],c);return c}function wa(a,b,c,d,e){for(var f,g=[],h=0,i=a.length,j=null!=b;h<i;h++)(f=a[h])&&(c&&!c(f,d,e)||(g.push(f),j&&b.push(h)));return g}function xa(a,b,c,d,e,f){return d&&!d[u]&&(d=xa(d)),e&&!e[u]&&(e=xa(e,f)),ia(function(f,g,h,i){var j,k,l,m=[],n=[],o=g.length,p=f||va(b||"*",h.nodeType?[h]:h,[]),q=!a||!f&&b?p:wa(p,m,a,h,i),r=c?e||(f?a:o||d)?[]:g:q;if(c&&c(q,r,h,i),d){j=wa(r,n),d(j,[],h,i),k=j.length;while(k--)(l=j[k])&&(r[n[k]]=!(q[n[k]]=l))}if(f){if(e||a){if(e){j=[],k=r.length;while(k--)(l=r[k])&&j.push(q[k]=l);e(null,r=[],j,i)}k=r.length;while(k--)(l=r[k])&&(j=e?I(f,l):m[k])>-1&&(f[j]=!(g[j]=l))}}else r=wa(r===g?r.splice(o,r.length):r),e?e(null,g,r,i):G.apply(g,r)})}function ya(a){for(var b,c,e,f=a.length,g=d.relative[a[0].type],h=g||d.relative[" "],i=g?1:0,k=ta(function(a){return a===b},h,!0),l=ta(function(a){return I(b,a)>-1},h,!0),m=[function(a,c,d){var e=!g&&(d||c!==j)||((b=c).nodeType?k(a,c,d):l(a,c,d));return b=null,e}];i<f;i++)if(c=d.relative[a[i].type])m=[ta(ua(m),c)];else{if(c=d.filter[a[i].type].apply(null,a[i].matches),c[u]){for(e=++i;e<f;e++)if(d.relative[a[e].type])break;return xa(i>1&&ua(m),i>1&&sa(a.slice(0,i-1).concat({value:" "===a[i-2].type?"*":""})).replace(P,"$1"),c,i<e&&ya(a.slice(i,e)),e<f&&ya(a=a.slice(e)),e<f&&sa(a))}m.push(c)}return ua(m)}function za(a,b){var c=b.length>0,e=a.length>0,f=function(f,g,h,i,k){var l,o,q,r=0,s="0",t=f&&[],u=[],v=j,x=f||e&&d.find.TAG("*",k),y=w+=null==v?1:Math.random()||.1,z=x.length;for(k&&(j=g===n||g||k);s!==z&&null!=(l=x[s]);s++){if(e&&l){o=0,g||l.ownerDocument===n||(m(l),h=!p);while(q=a[o++])if(q(l,g||n,h)){i.push(l);break}k&&(w=y)}c&&((l=!q&&l)&&r--,f&&t.push(l))}if(r+=s,c&&s!==r){o=0;while(q=b[o++])q(t,u,g,h);if(f){if(r>0)while(s--)t[s]||u[s]||(u[s]=E.call(i));u=wa(u)}G.apply(i,u),k&&!f&&u.length>0&&r+b.length>1&&ga.uniqueSort(i)}return k&&(w=y,j=v),t};return c?ia(f):f}return h=ga.compile=function(a,b){var c,d=[],e=[],f=A[a+" "];if(!f){b||(b=g(a)),c=b.length;while(c--)f=ya(b[c]),f[u]?d.push(f):e.push(f);f=A(a,za(e,d)),f.selector=a}return f},i=ga.select=function(a,b,c,e){var f,i,j,k,l,m="function"==typeof a&&a,n=!e&&g(a=m.selector||a);if(c=c||[],1===n.length){if(i=n[0]=n[0].slice(0),i.length>2&&"ID"===(j=i[0]).type&&9===b.nodeType&&p&&d.relative[i[1].type]){if(b=(d.find.ID(j.matches[0].replace(_,aa),b)||[])[0],!b)return c;m&&(b=b.parentNode),a=a.slice(i.shift().value.length)}f=V.needsContext.test(a)?0:i.length;while(f--){if(j=i[f],d.relative[k=j.type])break;if((l=d.find[k])&&(e=l(j.matches[0].replace(_,aa),$.test(i[0].type)&&qa(b.parentNode)||b))){if(i.splice(f,1),a=e.length&&sa(i),!a)return G.apply(c,e),c;break}}}return(m||h(a,n))(e,b,!p,c,!b||$.test(a)&&qa(b.parentNode)||b),c},c.sortStable=u.split("").sort(B).join("")===u,c.detectDuplicates=!!l,m(),c.sortDetached=ja(function(a){return 1&a.compareDocumentPosition(n.createElement("fieldset"))}),ja(function(a){return a.innerHTML="<a href='#'></a>","#"===a.firstChild.getAttribute("href")})||ka("type|href|height|width",function(a,b,c){if(!c)return a.getAttribute(b,"type"===b.toLowerCase()?1:2)}),c.attributes&&ja(function(a){return a.innerHTML="<input/>",a.firstChild.setAttribute("value",""),""===a.firstChild.getAttribute("value")})||ka("value",function(a,b,c){if(!c&&"input"===a.nodeName.toLowerCase())return a.defaultValue}),ja(function(a){return null==a.getAttribute("disabled")})||ka(J,function(a,b,c){var d;if(!c)return a[b]===!0?b.toLowerCase():(d=a.getAttributeNode(b))&&d.specified?d.value:null}),ga}(a);r.find=x,r.expr=x.selectors,r.expr[":"]=r.expr.pseudos,r.uniqueSort=r.unique=x.uniqueSort,r.text=x.getText,r.isXMLDoc=x.isXML,r.contains=x.contains,r.escapeSelector=x.escape;var y=function(a,b,c){var d=[],e=void 0!==c;while((a=a[b])&&9!==a.nodeType)if(1===a.nodeType){if(e&&r(a).is(c))break;d.push(a)}return d},z=function(a,b){for(var c=[];a;a=a.nextSibling)1===a.nodeType&&a!==b&&c.push(a);return c},A=r.expr.match.needsContext;function B(a,b){return a.nodeName&&a.nodeName.toLowerCase()===b.toLowerCase()}var C=/^<([a-z][^\/\0>:\x20\t\r\n\f]*)[\x20\t\r\n\f]*\/?>(?:<\/\1>|)$/i,D=/^.[^:#\[\.,]*$/;function E(a,b,c){return r.isFunction(b)?r.grep(a,function(a,d){return!!b.call(a,d,a)!==c}):b.nodeType?r.grep(a,function(a){return a===b!==c}):"string"!=typeof b?r.grep(a,function(a){return i.call(b,a)>-1!==c}):D.test(b)?r.filter(b,a,c):(b=r.filter(b,a),r.grep(a,function(a){return i.call(b,a)>-1!==c&&1===a.nodeType}))}r.filter=function(a,b,c){var d=b[0];return c&&(a=":not("+a+")"),1===b.length&&1===d.nodeType?r.find.matchesSelector(d,a)?[d]:[]:r.find.matches(a,r.grep(b,function(a){return 1===a.nodeType}))},r.fn.extend({find:function(a){var b,c,d=this.length,e=this;if("string"!=typeof a)return this.pushStack(r(a).filter(function(){for(b=0;b<d;b++)if(r.contains(e[b],this))return!0}));for(c=this.pushStack([]),b=0;b<d;b++)r.find(a,e[b],c);return d>1?r.uniqueSort(c):c},filter:function(a){return this.pushStack(E(this,a||[],!1))},not:function(a){return this.pushStack(E(this,a||[],!0))},is:function(a){return!!E(this,"string"==typeof a&&A.test(a)?r(a):a||[],!1).length}});var F,G=/^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]+))$/,H=r.fn.init=function(a,b,c){var e,f;if(!a)return this;if(c=c||F,"string"==typeof a){if(e="<"===a[0]&&">"===a[a.length-1]&&a.length>=3?[null,a,null]:G.exec(a),!e||!e[1]&&b)return!b||b.jquery?(b||c).find(a):this.constructor(b).find(a);if(e[1]){if(b=b instanceof r?b[0]:b,r.merge(this,r.parseHTML(e[1],b&&b.nodeType?b.ownerDocument||b:d,!0)),C.test(e[1])&&r.isPlainObject(b))for(e in b)r.isFunction(this[e])?this[e](b[e]):this.attr(e,b[e]);return this}return f=d.getElementById(e[2]),f&&(this[0]=f,this.length=1),this}return a.nodeType?(this[0]=a,this.length=1,this):r.isFunction(a)?void 0!==c.ready?c.ready(a):a(r):r.makeArray(a,this)};H.prototype=r.fn,F=r(d);var I=/^(?:parents|prev(?:Until|All))/,J={children:!0,contents:!0,next:!0,prev:!0};r.fn.extend({has:function(a){var b=r(a,this),c=b.length;return this.filter(function(){for(var a=0;a<c;a++)if(r.contains(this,b[a]))return!0})},closest:function(a,b){var c,d=0,e=this.length,f=[],g="string"!=typeof a&&r(a);if(!A.test(a))for(;d<e;d++)for(c=this[d];c&&c!==b;c=c.parentNode)if(c.nodeType<11&&(g?g.index(c)>-1:1===c.nodeType&&r.find.matchesSelector(c,a))){f.push(c);break}return this.pushStack(f.length>1?r.uniqueSort(f):f)},index:function(a){return a?"string"==typeof a?i.call(r(a),this[0]):i.call(this,a.jquery?a[0]:a):this[0]&&this[0].parentNode?this.first().prevAll().length:-1},add:function(a,b){return this.pushStack(r.uniqueSort(r.merge(this.get(),r(a,b))))},addBack:function(a){return this.add(null==a?this.prevObject:this.prevObject.filter(a))}});function K(a,b){while((a=a[b])&&1!==a.nodeType);return a}r.each({parent:function(a){var b=a.parentNode;return b&&11!==b.nodeType?b:null},parents:function(a){return y(a,"parentNode")},parentsUntil:function(a,b,c){return y(a,"parentNode",c)},next:function(a){return K(a,"nextSibling")},prev:function(a){return K(a,"previousSibling")},nextAll:function(a){return y(a,"nextSibling")},prevAll:function(a){return y(a,"previousSibling")},nextUntil:function(a,b,c){return y(a,"nextSibling",c)},prevUntil:function(a,b,c){return y(a,"previousSibling",c)},siblings:function(a){return z((a.parentNode||{}).firstChild,a)},children:function(a){return z(a.firstChild)},contents:function(a){return B(a,"iframe")?a.contentDocument:(B(a,"template")&&(a=a.content||a),r.merge([],a.childNodes))}},function(a,b){r.fn[a]=function(c,d){var e=r.map(this,b,c);return"Until"!==a.slice(-5)&&(d=c),d&&"string"==typeof d&&(e=r.filter(d,e)),this.length>1&&(J[a]||r.uniqueSort(e),I.test(a)&&e.reverse()),this.pushStack(e)}});var L=/[^\x20\t\r\n\f]+/g;function M(a){var b={};return r.each(a.match(L)||[],function(a,c){b[c]=!0}),b}r.Callbacks=function(a){a="string"==typeof a?M(a):r.extend({},a);var b,c,d,e,f=[],g=[],h=-1,i=function(){for(e=e||a.once,d=b=!0;g.length;h=-1){c=g.shift();while(++h<f.length)f[h].apply(c[0],c[1])===!1&&a.stopOnFalse&&(h=f.length,c=!1)}a.memory||(c=!1),b=!1,e&&(f=c?[]:"")},j={add:function(){return f&&(c&&!b&&(h=f.length-1,g.push(c)),function d(b){r.each(b,function(b,c){r.isFunction(c)?a.unique&&j.has(c)||f.push(c):c&&c.length&&"string"!==r.type(c)&&d(c)})}(arguments),c&&!b&&i()),this},remove:function(){return r.each(arguments,function(a,b){var c;while((c=r.inArray(b,f,c))>-1)f.splice(c,1),c<=h&&h--}),this},has:function(a){return a?r.inArray(a,f)>-1:f.length>0},empty:function(){return f&&(f=[]),this},disable:function(){return e=g=[],f=c="",this},disabled:function(){return!f},lock:function(){return e=g=[],c||b||(f=c=""),this},locked:function(){return!!e},fireWith:function(a,c){return e||(c=c||[],c=[a,c.slice?c.slice():c],g.push(c),b||i()),this},fire:function(){return j.fireWith(this,arguments),this},fired:function(){return!!d}};return j};function N(a){return a}function O(a){throw a}function P(a,b,c,d){var e;try{a&&r.isFunction(e=a.promise)?e.call(a).done(b).fail(c):a&&r.isFunction(e=a.then)?e.call(a,b,c):b.apply(void 0,[a].slice(d))}catch(a){c.apply(void 0,[a])}}r.extend({Deferred:function(b){var c=[["notify","progress",r.Callbacks("memory"),r.Callbacks("memory"),2],["resolve","done",r.Callbacks("once memory"),r.Callbacks("once memory"),0,"resolved"],["reject","fail",r.Callbacks("once memory"),r.Callbacks("once memory"),1,"rejected"]],d="pending",e={state:function(){return d},always:function(){return f.done(arguments).fail(arguments),this},"catch":function(a){return e.then(null,a)},pipe:function(){var a=arguments;return r.Deferred(function(b){r.each(c,function(c,d){var e=r.isFunction(a[d[4]])&&a[d[4]];f[d[1]](function(){var a=e&&e.apply(this,arguments);a&&r.isFunction(a.promise)?a.promise().progress(b.notify).done(b.resolve).fail(b.reject):b[d[0]+"With"](this,e?[a]:arguments)})}),a=null}).promise()},then:function(b,d,e){var f=0;function g(b,c,d,e){return function(){var h=this,i=arguments,j=function(){var a,j;if(!(b<f)){if(a=d.apply(h,i),a===c.promise())throw new TypeError("Thenable self-resolution");j=a&&("object"==typeof a||"function"==typeof a)&&a.then,r.isFunction(j)?e?j.call(a,g(f,c,N,e),g(f,c,O,e)):(f++,j.call(a,g(f,c,N,e),g(f,c,O,e),g(f,c,N,c.notifyWith))):(d!==N&&(h=void 0,i=[a]),(e||c.resolveWith)(h,i))}},k=e?j:function(){try{j()}catch(a){r.Deferred.exceptionHook&&r.Deferred.exceptionHook(a,k.stackTrace),b+1>=f&&(d!==O&&(h=void 0,i=[a]),c.rejectWith(h,i))}};b?k():(r.Deferred.getStackHook&&(k.stackTrace=r.Deferred.getStackHook()),a.setTimeout(k))}}return r.Deferred(function(a){c[0][3].add(g(0,a,r.isFunction(e)?e:N,a.notifyWith)),c[1][3].add(g(0,a,r.isFunction(b)?b:N)),c[2][3].add(g(0,a,r.isFunction(d)?d:O))}).promise()},promise:function(a){return null!=a?r.extend(a,e):e}},f={};return r.each(c,function(a,b){var g=b[2],h=b[5];e[b[1]]=g.add,h&&g.add(function(){d=h},c[3-a][2].disable,c[0][2].lock),g.add(b[3].fire),f[b[0]]=function(){return f[b[0]+"With"](this===f?void 0:this,arguments),this},f[b[0]+"With"]=g.fireWith}),e.promise(f),b&&b.call(f,f),f},when:function(a){var b=arguments.length,c=b,d=Array(c),e=f.call(arguments),g=r.Deferred(),h=function(a){return function(c){d[a]=this,e[a]=arguments.length>1?f.call(arguments):c,--b||g.resolveWith(d,e)}};if(b<=1&&(P(a,g.done(h(c)).resolve,g.reject,!b),"pending"===g.state()||r.isFunction(e[c]&&e[c].then)))return g.then();while(c--)P(e[c],h(c),g.reject);return g.promise()}});var Q=/^(Eval|Internal|Range|Reference|Syntax|Type|URI)Error$/;r.Deferred.exceptionHook=function(b,c){a.console&&a.console.warn&&b&&Q.test(b.name)&&a.console.warn("jQuery.Deferred exception: "+b.message,b.stack,c)},r.readyException=function(b){a.setTimeout(function(){throw b})};var R=r.Deferred();r.fn.ready=function(a){return R.then(a)["catch"](function(a){r.readyException(a)}),this},r.extend({isReady:!1,readyWait:1,ready:function(a){(a===!0?--r.readyWait:r.isReady)||(r.isReady=!0,a!==!0&&--r.readyWait>0||R.resolveWith(d,[r]))}}),r.ready.then=R.then;function S(){d.removeEventListener("DOMContentLoaded",S),
    a.removeEventListener("load",S),r.ready()}"complete"===d.readyState||"loading"!==d.readyState&&!d.documentElement.doScroll?a.setTimeout(r.ready):(d.addEventListener("DOMContentLoaded",S),a.addEventListener("load",S));var T=function(a,b,c,d,e,f,g){var h=0,i=a.length,j=null==c;if("object"===r.type(c)){e=!0;for(h in c)T(a,b,h,c[h],!0,f,g)}else if(void 0!==d&&(e=!0,r.isFunction(d)||(g=!0),j&&(g?(b.call(a,d),b=null):(j=b,b=function(a,b,c){return j.call(r(a),c)})),b))for(;h<i;h++)b(a[h],c,g?d:d.call(a[h],h,b(a[h],c)));return e?a:j?b.call(a):i?b(a[0],c):f},U=function(a){return 1===a.nodeType||9===a.nodeType||!+a.nodeType};function V(){this.expando=r.expando+V.uid++}V.uid=1,V.prototype={cache:function(a){var b=a[this.expando];return b||(b={},U(a)&&(a.nodeType?a[this.expando]=b:Object.defineProperty(a,this.expando,{value:b,configurable:!0}))),b},set:function(a,b,c){var d,e=this.cache(a);if("string"==typeof b)e[r.camelCase(b)]=c;else for(d in b)e[r.camelCase(d)]=b[d];return e},get:function(a,b){return void 0===b?this.cache(a):a[this.expando]&&a[this.expando][r.camelCase(b)]},access:function(a,b,c){return void 0===b||b&&"string"==typeof b&&void 0===c?this.get(a,b):(this.set(a,b,c),void 0!==c?c:b)},remove:function(a,b){var c,d=a[this.expando];if(void 0!==d){if(void 0!==b){Array.isArray(b)?b=b.map(r.camelCase):(b=r.camelCase(b),b=b in d?[b]:b.match(L)||[]),c=b.length;while(c--)delete d[b[c]]}(void 0===b||r.isEmptyObject(d))&&(a.nodeType?a[this.expando]=void 0:delete a[this.expando])}},hasData:function(a){var b=a[this.expando];return void 0!==b&&!r.isEmptyObject(b)}};var W=new V,X=new V,Y=/^(?:\{[\w\W]*\}|\[[\w\W]*\])$/,Z=/[A-Z]/g;function $(a){return"true"===a||"false"!==a&&("null"===a?null:a===+a+""?+a:Y.test(a)?JSON.parse(a):a)}function _(a,b,c){var d;if(void 0===c&&1===a.nodeType)if(d="data-"+b.replace(Z,"-$&").toLowerCase(),c=a.getAttribute(d),"string"==typeof c){try{c=$(c)}catch(e){}X.set(a,b,c)}else c=void 0;return c}r.extend({hasData:function(a){return X.hasData(a)||W.hasData(a)},data:function(a,b,c){return X.access(a,b,c)},removeData:function(a,b){X.remove(a,b)},_data:function(a,b,c){return W.access(a,b,c)},_removeData:function(a,b){W.remove(a,b)}}),r.fn.extend({data:function(a,b){var c,d,e,f=this[0],g=f&&f.attributes;if(void 0===a){if(this.length&&(e=X.get(f),1===f.nodeType&&!W.get(f,"hasDataAttrs"))){c=g.length;while(c--)g[c]&&(d=g[c].name,0===d.indexOf("data-")&&(d=r.camelCase(d.slice(5)),_(f,d,e[d])));W.set(f,"hasDataAttrs",!0)}return e}return"object"==typeof a?this.each(function(){X.set(this,a)}):T(this,function(b){var c;if(f&&void 0===b){if(c=X.get(f,a),void 0!==c)return c;if(c=_(f,a),void 0!==c)return c}else this.each(function(){X.set(this,a,b)})},null,b,arguments.length>1,null,!0)},removeData:function(a){return this.each(function(){X.remove(this,a)})}}),r.extend({queue:function(a,b,c){var d;if(a)return b=(b||"fx")+"queue",d=W.get(a,b),c&&(!d||Array.isArray(c)?d=W.access(a,b,r.makeArray(c)):d.push(c)),d||[]},dequeue:function(a,b){b=b||"fx";var c=r.queue(a,b),d=c.length,e=c.shift(),f=r._queueHooks(a,b),g=function(){r.dequeue(a,b)};"inprogress"===e&&(e=c.shift(),d--),e&&("fx"===b&&c.unshift("inprogress"),delete f.stop,e.call(a,g,f)),!d&&f&&f.empty.fire()},_queueHooks:function(a,b){var c=b+"queueHooks";return W.get(a,c)||W.access(a,c,{empty:r.Callbacks("once memory").add(function(){W.remove(a,[b+"queue",c])})})}}),r.fn.extend({queue:function(a,b){var c=2;return"string"!=typeof a&&(b=a,a="fx",c--),arguments.length<c?r.queue(this[0],a):void 0===b?this:this.each(function(){var c=r.queue(this,a,b);r._queueHooks(this,a),"fx"===a&&"inprogress"!==c[0]&&r.dequeue(this,a)})},dequeue:function(a){return this.each(function(){r.dequeue(this,a)})},clearQueue:function(a){return this.queue(a||"fx",[])},promise:function(a,b){var c,d=1,e=r.Deferred(),f=this,g=this.length,h=function(){--d||e.resolveWith(f,[f])};"string"!=typeof a&&(b=a,a=void 0),a=a||"fx";while(g--)c=W.get(f[g],a+"queueHooks"),c&&c.empty&&(d++,c.empty.add(h));return h(),e.promise(b)}});var aa=/[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,ba=new RegExp("^(?:([+-])=|)("+aa+")([a-z%]*)$","i"),ca=["Top","Right","Bottom","Left"],da=function(a,b){return a=b||a,"none"===a.style.display||""===a.style.display&&r.contains(a.ownerDocument,a)&&"none"===r.css(a,"display")},ea=function(a,b,c,d){var e,f,g={};for(f in b)g[f]=a.style[f],a.style[f]=b[f];e=c.apply(a,d||[]);for(f in b)a.style[f]=g[f];return e};function fa(a,b,c,d){var e,f=1,g=20,h=d?function(){return d.cur()}:function(){return r.css(a,b,"")},i=h(),j=c&&c[3]||(r.cssNumber[b]?"":"px"),k=(r.cssNumber[b]||"px"!==j&&+i)&&ba.exec(r.css(a,b));if(k&&k[3]!==j){j=j||k[3],c=c||[],k=+i||1;do f=f||".5",k/=f,r.style(a,b,k+j);while(f!==(f=h()/i)&&1!==f&&--g)}return c&&(k=+k||+i||0,e=c[1]?k+(c[1]+1)*c[2]:+c[2],d&&(d.unit=j,d.start=k,d.end=e)),e}var ga={};function ha(a){var b,c=a.ownerDocument,d=a.nodeName,e=ga[d];return e?e:(b=c.body.appendChild(c.createElement(d)),e=r.css(b,"display"),b.parentNode.removeChild(b),"none"===e&&(e="block"),ga[d]=e,e)}function ia(a,b){for(var c,d,e=[],f=0,g=a.length;f<g;f++)d=a[f],d.style&&(c=d.style.display,b?("none"===c&&(e[f]=W.get(d,"display")||null,e[f]||(d.style.display="")),""===d.style.display&&da(d)&&(e[f]=ha(d))):"none"!==c&&(e[f]="none",W.set(d,"display",c)));for(f=0;f<g;f++)null!=e[f]&&(a[f].style.display=e[f]);return a}r.fn.extend({show:function(){return ia(this,!0)},hide:function(){return ia(this)},toggle:function(a){return"boolean"==typeof a?a?this.show():this.hide():this.each(function(){da(this)?r(this).show():r(this).hide()})}});var ja=/^(?:checkbox|radio)$/i,ka=/<([a-z][^\/\0>\x20\t\r\n\f]+)/i,la=/^$|\/(?:java|ecma)script/i,ma={option:[1,"<select multiple='multiple'>","</select>"],thead:[1,"<table>","</table>"],col:[2,"<table><colgroup>","</colgroup></table>"],tr:[2,"<table><tbody>","</tbody></table>"],td:[3,"<table><tbody><tr>","</tr></tbody></table>"],_default:[0,"",""]};ma.optgroup=ma.option,ma.tbody=ma.tfoot=ma.colgroup=ma.caption=ma.thead,ma.th=ma.td;function na(a,b){var c;return c="undefined"!=typeof a.getElementsByTagName?a.getElementsByTagName(b||"*"):"undefined"!=typeof a.querySelectorAll?a.querySelectorAll(b||"*"):[],void 0===b||b&&B(a,b)?r.merge([a],c):c}function oa(a,b){for(var c=0,d=a.length;c<d;c++)W.set(a[c],"globalEval",!b||W.get(b[c],"globalEval"))}var pa=/<|&#?\w+;/;function qa(a,b,c,d,e){for(var f,g,h,i,j,k,l=b.createDocumentFragment(),m=[],n=0,o=a.length;n<o;n++)if(f=a[n],f||0===f)if("object"===r.type(f))r.merge(m,f.nodeType?[f]:f);else if(pa.test(f)){g=g||l.appendChild(b.createElement("div")),h=(ka.exec(f)||["",""])[1].toLowerCase(),i=ma[h]||ma._default,g.innerHTML=i[1]+r.htmlPrefilter(f)+i[2],k=i[0];while(k--)g=g.lastChild;r.merge(m,g.childNodes),g=l.firstChild,g.textContent=""}else m.push(b.createTextNode(f));l.textContent="",n=0;while(f=m[n++])if(d&&r.inArray(f,d)>-1)e&&e.push(f);else if(j=r.contains(f.ownerDocument,f),g=na(l.appendChild(f),"script"),j&&oa(g),c){k=0;while(f=g[k++])la.test(f.type||"")&&c.push(f)}return l}!function(){var a=d.createDocumentFragment(),b=a.appendChild(d.createElement("div")),c=d.createElement("input");c.setAttribute("type","radio"),c.setAttribute("checked","checked"),c.setAttribute("name","t"),b.appendChild(c),o.checkClone=b.cloneNode(!0).cloneNode(!0).lastChild.checked,b.innerHTML="<textarea>x</textarea>",o.noCloneChecked=!!b.cloneNode(!0).lastChild.defaultValue}();var ra=d.documentElement,sa=/^key/,ta=/^(?:mouse|pointer|contextmenu|drag|drop)|click/,ua=/^([^.]*)(?:\.(.+)|)/;function va(){return!0}function wa(){return!1}function xa(){try{return d.activeElement}catch(a){}}function ya(a,b,c,d,e,f){var g,h;if("object"==typeof b){"string"!=typeof c&&(d=d||c,c=void 0);for(h in b)ya(a,h,c,d,b[h],f);return a}if(null==d&&null==e?(e=c,d=c=void 0):null==e&&("string"==typeof c?(e=d,d=void 0):(e=d,d=c,c=void 0)),e===!1)e=wa;else if(!e)return a;return 1===f&&(g=e,e=function(a){return r().off(a),g.apply(this,arguments)},e.guid=g.guid||(g.guid=r.guid++)),a.each(function(){r.event.add(this,b,e,d,c)})}r.event={global:{},add:function(a,b,c,d,e){var f,g,h,i,j,k,l,m,n,o,p,q=W.get(a);if(q){c.handler&&(f=c,c=f.handler,e=f.selector),e&&r.find.matchesSelector(ra,e),c.guid||(c.guid=r.guid++),(i=q.events)||(i=q.events={}),(g=q.handle)||(g=q.handle=function(b){return"undefined"!=typeof r&&r.event.triggered!==b.type?r.event.dispatch.apply(a,arguments):void 0}),b=(b||"").match(L)||[""],j=b.length;while(j--)h=ua.exec(b[j])||[],n=p=h[1],o=(h[2]||"").split(".").sort(),n&&(l=r.event.special[n]||{},n=(e?l.delegateType:l.bindType)||n,l=r.event.special[n]||{},k=r.extend({type:n,origType:p,data:d,handler:c,guid:c.guid,selector:e,needsContext:e&&r.expr.match.needsContext.test(e),namespace:o.join(".")},f),(m=i[n])||(m=i[n]=[],m.delegateCount=0,l.setup&&l.setup.call(a,d,o,g)!==!1||a.addEventListener&&a.addEventListener(n,g)),l.add&&(l.add.call(a,k),k.handler.guid||(k.handler.guid=c.guid)),e?m.splice(m.delegateCount++,0,k):m.push(k),r.event.global[n]=!0)}},remove:function(a,b,c,d,e){var f,g,h,i,j,k,l,m,n,o,p,q=W.hasData(a)&&W.get(a);if(q&&(i=q.events)){b=(b||"").match(L)||[""],j=b.length;while(j--)if(h=ua.exec(b[j])||[],n=p=h[1],o=(h[2]||"").split(".").sort(),n){l=r.event.special[n]||{},n=(d?l.delegateType:l.bindType)||n,m=i[n]||[],h=h[2]&&new RegExp("(^|\\.)"+o.join("\\.(?:.*\\.|)")+"(\\.|$)"),g=f=m.length;while(f--)k=m[f],!e&&p!==k.origType||c&&c.guid!==k.guid||h&&!h.test(k.namespace)||d&&d!==k.selector&&("**"!==d||!k.selector)||(m.splice(f,1),k.selector&&m.delegateCount--,l.remove&&l.remove.call(a,k));g&&!m.length&&(l.teardown&&l.teardown.call(a,o,q.handle)!==!1||r.removeEvent(a,n,q.handle),delete i[n])}else for(n in i)r.event.remove(a,n+b[j],c,d,!0);r.isEmptyObject(i)&&W.remove(a,"handle events")}},dispatch:function(a){var b=r.event.fix(a),c,d,e,f,g,h,i=new Array(arguments.length),j=(W.get(this,"events")||{})[b.type]||[],k=r.event.special[b.type]||{};for(i[0]=b,c=1;c<arguments.length;c++)i[c]=arguments[c];if(b.delegateTarget=this,!k.preDispatch||k.preDispatch.call(this,b)!==!1){h=r.event.handlers.call(this,b,j),c=0;while((f=h[c++])&&!b.isPropagationStopped()){b.currentTarget=f.elem,d=0;while((g=f.handlers[d++])&&!b.isImmediatePropagationStopped())b.rnamespace&&!b.rnamespace.test(g.namespace)||(b.handleObj=g,b.data=g.data,e=((r.event.special[g.origType]||{}).handle||g.handler).apply(f.elem,i),void 0!==e&&(b.result=e)===!1&&(b.preventDefault(),b.stopPropagation()))}return k.postDispatch&&k.postDispatch.call(this,b),b.result}},handlers:function(a,b){var c,d,e,f,g,h=[],i=b.delegateCount,j=a.target;if(i&&j.nodeType&&!("click"===a.type&&a.button>=1))for(;j!==this;j=j.parentNode||this)if(1===j.nodeType&&("click"!==a.type||j.disabled!==!0)){for(f=[],g={},c=0;c<i;c++)d=b[c],e=d.selector+" ",void 0===g[e]&&(g[e]=d.needsContext?r(e,this).index(j)>-1:r.find(e,this,null,[j]).length),g[e]&&f.push(d);f.length&&h.push({elem:j,handlers:f})}return j=this,i<b.length&&h.push({elem:j,handlers:b.slice(i)}),h},addProp:function(a,b){Object.defineProperty(r.Event.prototype,a,{enumerable:!0,configurable:!0,get:r.isFunction(b)?function(){if(this.originalEvent)return b(this.originalEvent)}:function(){if(this.originalEvent)return this.originalEvent[a]},set:function(b){Object.defineProperty(this,a,{enumerable:!0,configurable:!0,writable:!0,value:b})}})},fix:function(a){return a[r.expando]?a:new r.Event(a)},special:{load:{noBubble:!0},focus:{trigger:function(){if(this!==xa()&&this.focus)return this.focus(),!1},delegateType:"focusin"},blur:{trigger:function(){if(this===xa()&&this.blur)return this.blur(),!1},delegateType:"focusout"},click:{trigger:function(){if("checkbox"===this.type&&this.click&&B(this,"input"))return this.click(),!1},_default:function(a){return B(a.target,"a")}},beforeunload:{postDispatch:function(a){void 0!==a.result&&a.originalEvent&&(a.originalEvent.returnValue=a.result)}}}},r.removeEvent=function(a,b,c){a.removeEventListener&&a.removeEventListener(b,c)},r.Event=function(a,b){return this instanceof r.Event?(a&&a.type?(this.originalEvent=a,this.type=a.type,this.isDefaultPrevented=a.defaultPrevented||void 0===a.defaultPrevented&&a.returnValue===!1?va:wa,this.target=a.target&&3===a.target.nodeType?a.target.parentNode:a.target,this.currentTarget=a.currentTarget,this.relatedTarget=a.relatedTarget):this.type=a,b&&r.extend(this,b),this.timeStamp=a&&a.timeStamp||r.now(),void(this[r.expando]=!0)):new r.Event(a,b)},r.Event.prototype={constructor:r.Event,isDefaultPrevented:wa,isPropagationStopped:wa,isImmediatePropagationStopped:wa,isSimulated:!1,preventDefault:function(){var a=this.originalEvent;this.isDefaultPrevented=va,a&&!this.isSimulated&&a.preventDefault()},stopPropagation:function(){var a=this.originalEvent;this.isPropagationStopped=va,a&&!this.isSimulated&&a.stopPropagation()},stopImmediatePropagation:function(){var a=this.originalEvent;this.isImmediatePropagationStopped=va,a&&!this.isSimulated&&a.stopImmediatePropagation(),this.stopPropagation()}},r.each({altKey:!0,bubbles:!0,cancelable:!0,changedTouches:!0,ctrlKey:!0,detail:!0,eventPhase:!0,metaKey:!0,pageX:!0,pageY:!0,shiftKey:!0,view:!0,"char":!0,charCode:!0,key:!0,keyCode:!0,button:!0,buttons:!0,clientX:!0,clientY:!0,offsetX:!0,offsetY:!0,pointerId:!0,pointerType:!0,screenX:!0,screenY:!0,targetTouches:!0,toElement:!0,touches:!0,which:function(a){var b=a.button;return null==a.which&&sa.test(a.type)?null!=a.charCode?a.charCode:a.keyCode:!a.which&&void 0!==b&&ta.test(a.type)?1&b?1:2&b?3:4&b?2:0:a.which}},r.event.addProp),r.each({mouseenter:"mouseover",mouseleave:"mouseout",pointerenter:"pointerover",pointerleave:"pointerout"},function(a,b){r.event.special[a]={delegateType:b,bindType:b,handle:function(a){var c,d=this,e=a.relatedTarget,f=a.handleObj;return e&&(e===d||r.contains(d,e))||(a.type=f.origType,c=f.handler.apply(this,arguments),a.type=b),c}}}),r.fn.extend({on:function(a,b,c,d){return ya(this,a,b,c,d)},one:function(a,b,c,d){return ya(this,a,b,c,d,1)},off:function(a,b,c){var d,e;if(a&&a.preventDefault&&a.handleObj)return d=a.handleObj,r(a.delegateTarget).off(d.namespace?d.origType+"."+d.namespace:d.origType,d.selector,d.handler),this;if("object"==typeof a){for(e in a)this.off(e,b,a[e]);return this}return b!==!1&&"function"!=typeof b||(c=b,b=void 0),c===!1&&(c=wa),this.each(function(){r.event.remove(this,a,c,b)})}});var za=/<(?!area|br|col|embed|hr|img|input|link|meta|param)(([a-z][^\/\0>\x20\t\r\n\f]*)[^>]*)\/>/gi,Aa=/<script|<style|<link/i,Ba=/checked\s*(?:[^=]|=\s*.checked.)/i,Ca=/^true\/(.*)/,Da=/^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g;function Ea(a,b){return B(a,"table")&&B(11!==b.nodeType?b:b.firstChild,"tr")?r(">tbody",a)[0]||a:a}function Fa(a){return a.type=(null!==a.getAttribute("type"))+"/"+a.type,a}function Ga(a){var b=Ca.exec(a.type);return b?a.type=b[1]:a.removeAttribute("type"),a}function Ha(a,b){var c,d,e,f,g,h,i,j;if(1===b.nodeType){if(W.hasData(a)&&(f=W.access(a),g=W.set(b,f),j=f.events)){delete g.handle,g.events={};for(e in j)for(c=0,d=j[e].length;c<d;c++)r.event.add(b,e,j[e][c])}X.hasData(a)&&(h=X.access(a),i=r.extend({},h),X.set(b,i))}}function Ia(a,b){var c=b.nodeName.toLowerCase();"input"===c&&ja.test(a.type)?b.checked=a.checked:"input"!==c&&"textarea"!==c||(b.defaultValue=a.defaultValue)}function Ja(a,b,c,d){b=g.apply([],b);var e,f,h,i,j,k,l=0,m=a.length,n=m-1,q=b[0],s=r.isFunction(q);if(s||m>1&&"string"==typeof q&&!o.checkClone&&Ba.test(q))return a.each(function(e){var f=a.eq(e);s&&(b[0]=q.call(this,e,f.html())),Ja(f,b,c,d)});if(m&&(e=qa(b,a[0].ownerDocument,!1,a,d),f=e.firstChild,1===e.childNodes.length&&(e=f),f||d)){for(h=r.map(na(e,"script"),Fa),i=h.length;l<m;l++)j=e,l!==n&&(j=r.clone(j,!0,!0),i&&r.merge(h,na(j,"script"))),c.call(a[l],j,l);if(i)for(k=h[h.length-1].ownerDocument,r.map(h,Ga),l=0;l<i;l++)j=h[l],la.test(j.type||"")&&!W.access(j,"globalEval")&&r.contains(k,j)&&(j.src?r._evalUrl&&r._evalUrl(j.src):p(j.textContent.replace(Da,""),k))}return a}function Ka(a,b,c){for(var d,e=b?r.filter(b,a):a,f=0;null!=(d=e[f]);f++)c||1!==d.nodeType||r.cleanData(na(d)),d.parentNode&&(c&&r.contains(d.ownerDocument,d)&&oa(na(d,"script")),d.parentNode.removeChild(d));return a}r.extend({htmlPrefilter:function(a){return a.replace(za,"<$1></$2>")},clone:function(a,b,c){var d,e,f,g,h=a.cloneNode(!0),i=r.contains(a.ownerDocument,a);if(!(o.noCloneChecked||1!==a.nodeType&&11!==a.nodeType||r.isXMLDoc(a)))for(g=na(h),f=na(a),d=0,e=f.length;d<e;d++)Ia(f[d],g[d]);if(b)if(c)for(f=f||na(a),g=g||na(h),d=0,e=f.length;d<e;d++)Ha(f[d],g[d]);else Ha(a,h);return g=na(h,"script"),g.length>0&&oa(g,!i&&na(a,"script")),h},cleanData:function(a){for(var b,c,d,e=r.event.special,f=0;void 0!==(c=a[f]);f++)if(U(c)){if(b=c[W.expando]){if(b.events)for(d in b.events)e[d]?r.event.remove(c,d):r.removeEvent(c,d,b.handle);c[W.expando]=void 0}c[X.expando]&&(c[X.expando]=void 0)}}}),r.fn.extend({detach:function(a){return Ka(this,a,!0)},remove:function(a){return Ka(this,a)},text:function(a){return T(this,function(a){return void 0===a?r.text(this):this.empty().each(function(){1!==this.nodeType&&11!==this.nodeType&&9!==this.nodeType||(this.textContent=a)})},null,a,arguments.length)},append:function(){return Ja(this,arguments,function(a){if(1===this.nodeType||11===this.nodeType||9===this.nodeType){var b=Ea(this,a);b.appendChild(a)}})},prepend:function(){return Ja(this,arguments,function(a){if(1===this.nodeType||11===this.nodeType||9===this.nodeType){var b=Ea(this,a);b.insertBefore(a,b.firstChild)}})},before:function(){return Ja(this,arguments,function(a){this.parentNode&&this.parentNode.insertBefore(a,this)})},after:function(){return Ja(this,arguments,function(a){this.parentNode&&this.parentNode.insertBefore(a,this.nextSibling)})},empty:function(){for(var a,b=0;null!=(a=this[b]);b++)1===a.nodeType&&(r.cleanData(na(a,!1)),a.textContent="");return this},clone:function(a,b){return a=null!=a&&a,b=null==b?a:b,this.map(function(){return r.clone(this,a,b)})},html:function(a){return T(this,function(a){var b=this[0]||{},c=0,d=this.length;if(void 0===a&&1===b.nodeType)return b.innerHTML;if("string"==typeof a&&!Aa.test(a)&&!ma[(ka.exec(a)||["",""])[1].toLowerCase()]){a=r.htmlPrefilter(a);try{for(;c<d;c++)b=this[c]||{},1===b.nodeType&&(r.cleanData(na(b,!1)),b.innerHTML=a);b=0}catch(e){}}b&&this.empty().append(a)},null,a,arguments.length)},replaceWith:function(){var a=[];return Ja(this,arguments,function(b){var c=this.parentNode;r.inArray(this,a)<0&&(r.cleanData(na(this)),c&&c.replaceChild(b,this))},a)}}),r.each({appendTo:"append",prependTo:"prepend",insertBefore:"before",insertAfter:"after",replaceAll:"replaceWith"},function(a,b){r.fn[a]=function(a){for(var c,d=[],e=r(a),f=e.length-1,g=0;g<=f;g++)c=g===f?this:this.clone(!0),r(e[g])[b](c),h.apply(d,c.get());return this.pushStack(d)}});var La=/^margin/,Ma=new RegExp("^("+aa+")(?!px)[a-z%]+$","i"),Na=function(b){var c=b.ownerDocument.defaultView;return c&&c.opener||(c=a),c.getComputedStyle(b)};!function(){function b(){if(i){i.style.cssText="box-sizing:border-box;position:relative;display:block;margin:auto;border:1px;padding:1px;top:1%;width:50%",i.innerHTML="",ra.appendChild(h);var b=a.getComputedStyle(i);c="1%"!==b.top,g="2px"===b.marginLeft,e="4px"===b.width,i.style.marginRight="50%",f="4px"===b.marginRight,ra.removeChild(h),i=null}}var c,e,f,g,h=d.createElement("div"),i=d.createElement("div");i.style&&(i.style.backgroundClip="content-box",i.cloneNode(!0).style.backgroundClip="",o.clearCloneStyle="content-box"===i.style.backgroundClip,h.style.cssText="border:0;width:8px;height:0;top:0;left:-9999px;padding:0;margin-top:1px;position:absolute",h.appendChild(i),r.extend(o,{pixelPosition:function(){return b(),c},boxSizingReliable:function(){return b(),e},pixelMarginRight:function(){return b(),f},reliableMarginLeft:function(){return b(),g}}))}();function Oa(a,b,c){var d,e,f,g,h=a.style;return c=c||Na(a),c&&(g=c.getPropertyValue(b)||c[b],""!==g||r.contains(a.ownerDocument,a)||(g=r.style(a,b)),!o.pixelMarginRight()&&Ma.test(g)&&La.test(b)&&(d=h.width,e=h.minWidth,f=h.maxWidth,h.minWidth=h.maxWidth=h.width=g,g=c.width,h.width=d,h.minWidth=e,h.maxWidth=f)),void 0!==g?g+"":g}function Pa(a,b){return{get:function(){return a()?void delete this.get:(this.get=b).apply(this,arguments)}}}var Qa=/^(none|table(?!-c[ea]).+)/,Ra=/^--/,Sa={position:"absolute",visibility:"hidden",display:"block"},Ta={letterSpacing:"0",fontWeight:"400"},Ua=["Webkit","Moz","ms"],Va=d.createElement("div").style;function Wa(a){if(a in Va)return a;var b=a[0].toUpperCase()+a.slice(1),c=Ua.length;while(c--)if(a=Ua[c]+b,a in Va)return a}function Xa(a){var b=r.cssProps[a];return b||(b=r.cssProps[a]=Wa(a)||a),b}function Ya(a,b,c){var d=ba.exec(b);return d?Math.max(0,d[2]-(c||0))+(d[3]||"px"):b}function Za(a,b,c,d,e){var f,g=0;for(f=c===(d?"border":"content")?4:"width"===b?1:0;f<4;f+=2)"margin"===c&&(g+=r.css(a,c+ca[f],!0,e)),d?("content"===c&&(g-=r.css(a,"padding"+ca[f],!0,e)),"margin"!==c&&(g-=r.css(a,"border"+ca[f]+"Width",!0,e))):(g+=r.css(a,"padding"+ca[f],!0,e),"padding"!==c&&(g+=r.css(a,"border"+ca[f]+"Width",!0,e)));return g}function $a(a,b,c){var d,e=Na(a),f=Oa(a,b,e),g="border-box"===r.css(a,"boxSizing",!1,e);return Ma.test(f)?f:(d=g&&(o.boxSizingReliable()||f===a.style[b]),"auto"===f&&(f=a["offset"+b[0].toUpperCase()+b.slice(1)]),f=parseFloat(f)||0,f+Za(a,b,c||(g?"border":"content"),d,e)+"px")}r.extend({cssHooks:{opacity:{get:function(a,b){if(b){var c=Oa(a,"opacity");return""===c?"1":c}}}},cssNumber:{animationIterationCount:!0,columnCount:!0,fillOpacity:!0,flexGrow:!0,flexShrink:!0,fontWeight:!0,lineHeight:!0,opacity:!0,order:!0,orphans:!0,widows:!0,zIndex:!0,zoom:!0},cssProps:{"float":"cssFloat"},style:function(a,b,c,d){if(a&&3!==a.nodeType&&8!==a.nodeType&&a.style){var e,f,g,h=r.camelCase(b),i=Ra.test(b),j=a.style;return i||(b=Xa(h)),g=r.cssHooks[b]||r.cssHooks[h],void 0===c?g&&"get"in g&&void 0!==(e=g.get(a,!1,d))?e:j[b]:(f=typeof c,"string"===f&&(e=ba.exec(c))&&e[1]&&(c=fa(a,b,e),f="number"),null!=c&&c===c&&("number"===f&&(c+=e&&e[3]||(r.cssNumber[h]?"":"px")),o.clearCloneStyle||""!==c||0!==b.indexOf("background")||(j[b]="inherit"),g&&"set"in g&&void 0===(c=g.set(a,c,d))||(i?j.setProperty(b,c):j[b]=c)),void 0)}},css:function(a,b,c,d){var e,f,g,h=r.camelCase(b),i=Ra.test(b);return i||(b=Xa(h)),g=r.cssHooks[b]||r.cssHooks[h],g&&"get"in g&&(e=g.get(a,!0,c)),void 0===e&&(e=Oa(a,b,d)),"normal"===e&&b in Ta&&(e=Ta[b]),""===c||c?(f=parseFloat(e),c===!0||isFinite(f)?f||0:e):e}}),r.each(["height","width"],function(a,b){r.cssHooks[b]={get:function(a,c,d){if(c)return!Qa.test(r.css(a,"display"))||a.getClientRects().length&&a.getBoundingClientRect().width?$a(a,b,d):ea(a,Sa,function(){return $a(a,b,d)})},set:function(a,c,d){var e,f=d&&Na(a),g=d&&Za(a,b,d,"border-box"===r.css(a,"boxSizing",!1,f),f);return g&&(e=ba.exec(c))&&"px"!==(e[3]||"px")&&(a.style[b]=c,c=r.css(a,b)),Ya(a,c,g)}}}),r.cssHooks.marginLeft=Pa(o.reliableMarginLeft,function(a,b){if(b)return(parseFloat(Oa(a,"marginLeft"))||a.getBoundingClientRect().left-ea(a,{marginLeft:0},function(){return a.getBoundingClientRect().left}))+"px"}),r.each({margin:"",padding:"",border:"Width"},function(a,b){r.cssHooks[a+b]={expand:function(c){for(var d=0,e={},f="string"==typeof c?c.split(" "):[c];d<4;d++)e[a+ca[d]+b]=f[d]||f[d-2]||f[0];return e}},La.test(a)||(r.cssHooks[a+b].set=Ya)}),r.fn.extend({css:function(a,b){return T(this,function(a,b,c){var d,e,f={},g=0;if(Array.isArray(b)){for(d=Na(a),e=b.length;g<e;g++)f[b[g]]=r.css(a,b[g],!1,d);return f}return void 0!==c?r.style(a,b,c):r.css(a,b)},a,b,arguments.length>1)}});function _a(a,b,c,d,e){return new _a.prototype.init(a,b,c,d,e)}r.Tween=_a,_a.prototype={constructor:_a,init:function(a,b,c,d,e,f){this.elem=a,this.prop=c,this.easing=e||r.easing._default,this.options=b,this.start=this.now=this.cur(),this.end=d,this.unit=f||(r.cssNumber[c]?"":"px")},cur:function(){var a=_a.propHooks[this.prop];return a&&a.get?a.get(this):_a.propHooks._default.get(this)},run:function(a){var b,c=_a.propHooks[this.prop];return this.options.duration?this.pos=b=r.easing[this.easing](a,this.options.duration*a,0,1,this.options.duration):this.pos=b=a,this.now=(this.end-this.start)*b+this.start,this.options.step&&this.options.step.call(this.elem,this.now,this),c&&c.set?c.set(this):_a.propHooks._default.set(this),this}},_a.prototype.init.prototype=_a.prototype,_a.propHooks={_default:{get:function(a){var b;return 1!==a.elem.nodeType||null!=a.elem[a.prop]&&null==a.elem.style[a.prop]?a.elem[a.prop]:(b=r.css(a.elem,a.prop,""),b&&"auto"!==b?b:0)},set:function(a){r.fx.step[a.prop]?r.fx.step[a.prop](a):1!==a.elem.nodeType||null==a.elem.style[r.cssProps[a.prop]]&&!r.cssHooks[a.prop]?a.elem[a.prop]=a.now:r.style(a.elem,a.prop,a.now+a.unit)}}},_a.propHooks.scrollTop=_a.propHooks.scrollLeft={set:function(a){a.elem.nodeType&&a.elem.parentNode&&(a.elem[a.prop]=a.now)}},r.easing={linear:function(a){return a},swing:function(a){return.5-Math.cos(a*Math.PI)/2},_default:"swing"},r.fx=_a.prototype.init,r.fx.step={};var ab,bb,cb=/^(?:toggle|show|hide)$/,db=/queueHooks$/;function eb(){bb&&(d.hidden===!1&&a.requestAnimationFrame?a.requestAnimationFrame(eb):a.setTimeout(eb,r.fx.interval),r.fx.tick())}function fb(){return a.setTimeout(function(){ab=void 0}),ab=r.now()}function gb(a,b){var c,d=0,e={height:a};for(b=b?1:0;d<4;d+=2-b)c=ca[d],e["margin"+c]=e["padding"+c]=a;return b&&(e.opacity=e.width=a),e}function hb(a,b,c){for(var d,e=(kb.tweeners[b]||[]).concat(kb.tweeners["*"]),f=0,g=e.length;f<g;f++)if(d=e[f].call(c,b,a))return d}function ib(a,b,c){var d,e,f,g,h,i,j,k,l="width"in b||"height"in b,m=this,n={},o=a.style,p=a.nodeType&&da(a),q=W.get(a,"fxshow");c.queue||(g=r._queueHooks(a,"fx"),null==g.unqueued&&(g.unqueued=0,h=g.empty.fire,g.empty.fire=function(){g.unqueued||h()}),g.unqueued++,m.always(function(){m.always(function(){g.unqueued--,r.queue(a,"fx").length||g.empty.fire()})}));for(d in b)if(e=b[d],cb.test(e)){if(delete b[d],f=f||"toggle"===e,e===(p?"hide":"show")){if("show"!==e||!q||void 0===q[d])continue;p=!0}n[d]=q&&q[d]||r.style(a,d)}if(i=!r.isEmptyObject(b),i||!r.isEmptyObject(n)){l&&1===a.nodeType&&(c.overflow=[o.overflow,o.overflowX,o.overflowY],j=q&&q.display,null==j&&(j=W.get(a,"display")),k=r.css(a,"display"),"none"===k&&(j?k=j:(ia([a],!0),j=a.style.display||j,k=r.css(a,"display"),ia([a]))),("inline"===k||"inline-block"===k&&null!=j)&&"none"===r.css(a,"float")&&(i||(m.done(function(){o.display=j}),null==j&&(k=o.display,j="none"===k?"":k)),o.display="inline-block")),c.overflow&&(o.overflow="hidden",m.always(function(){o.overflow=c.overflow[0],o.overflowX=c.overflow[1],o.overflowY=c.overflow[2]})),i=!1;for(d in n)i||(q?"hidden"in q&&(p=q.hidden):q=W.access(a,"fxshow",{display:j}),f&&(q.hidden=!p),p&&ia([a],!0),m.done(function(){p||ia([a]),W.remove(a,"fxshow");for(d in n)r.style(a,d,n[d])})),i=hb(p?q[d]:0,d,m),d in q||(q[d]=i.start,p&&(i.end=i.start,i.start=0))}}function jb(a,b){var c,d,e,f,g;for(c in a)if(d=r.camelCase(c),e=b[d],f=a[c],Array.isArray(f)&&(e=f[1],f=a[c]=f[0]),c!==d&&(a[d]=f,delete a[c]),g=r.cssHooks[d],g&&"expand"in g){f=g.expand(f),delete a[d];for(c in f)c in a||(a[c]=f[c],b[c]=e)}else b[d]=e}function kb(a,b,c){var d,e,f=0,g=kb.prefilters.length,h=r.Deferred().always(function(){delete i.elem}),i=function(){if(e)return!1;for(var b=ab||fb(),c=Math.max(0,j.startTime+j.duration-b),d=c/j.duration||0,f=1-d,g=0,i=j.tweens.length;g<i;g++)j.tweens[g].run(f);return h.notifyWith(a,[j,f,c]),f<1&&i?c:(i||h.notifyWith(a,[j,1,0]),h.resolveWith(a,[j]),!1)},j=h.promise({elem:a,props:r.extend({},b),opts:r.extend(!0,{specialEasing:{},easing:r.easing._default},c),originalProperties:b,originalOptions:c,startTime:ab||fb(),duration:c.duration,tweens:[],createTween:function(b,c){var d=r.Tween(a,j.opts,b,c,j.opts.specialEasing[b]||j.opts.easing);return j.tweens.push(d),d},stop:function(b){var c=0,d=b?j.tweens.length:0;if(e)return this;for(e=!0;c<d;c++)j.tweens[c].run(1);return b?(h.notifyWith(a,[j,1,0]),h.resolveWith(a,[j,b])):h.rejectWith(a,[j,b]),this}}),k=j.props;for(jb(k,j.opts.specialEasing);f<g;f++)if(d=kb.prefilters[f].call(j,a,k,j.opts))return r.isFunction(d.stop)&&(r._queueHooks(j.elem,j.opts.queue).stop=r.proxy(d.stop,d)),d;return r.map(k,hb,j),r.isFunction(j.opts.start)&&j.opts.start.call(a,j),j.progress(j.opts.progress).done(j.opts.done,j.opts.complete).fail(j.opts.fail).always(j.opts.always),r.fx.timer(r.extend(i,{elem:a,anim:j,queue:j.opts.queue})),j}r.Animation=r.extend(kb,{tweeners:{"*":[function(a,b){var c=this.createTween(a,b);return fa(c.elem,a,ba.exec(b),c),c}]},tweener:function(a,b){r.isFunction(a)?(b=a,a=["*"]):a=a.match(L);for(var c,d=0,e=a.length;d<e;d++)c=a[d],kb.tweeners[c]=kb.tweeners[c]||[],kb.tweeners[c].unshift(b)},prefilters:[ib],prefilter:function(a,b){b?kb.prefilters.unshift(a):kb.prefilters.push(a)}}),r.speed=function(a,b,c){var d=a&&"object"==typeof a?r.extend({},a):{complete:c||!c&&b||r.isFunction(a)&&a,duration:a,easing:c&&b||b&&!r.isFunction(b)&&b};return r.fx.off?d.duration=0:"number"!=typeof d.duration&&(d.duration in r.fx.speeds?d.duration=r.fx.speeds[d.duration]:d.duration=r.fx.speeds._default),null!=d.queue&&d.queue!==!0||(d.queue="fx"),d.old=d.complete,d.complete=function(){r.isFunction(d.old)&&d.old.call(this),d.queue&&r.dequeue(this,d.queue)},d},r.fn.extend({fadeTo:function(a,b,c,d){return this.filter(da).css("opacity",0).show().end().animate({opacity:b},a,c,d)},animate:function(a,b,c,d){var e=r.isEmptyObject(a),f=r.speed(b,c,d),g=function(){var b=kb(this,r.extend({},a),f);(e||W.get(this,"finish"))&&b.stop(!0)};return g.finish=g,e||f.queue===!1?this.each(g):this.queue(f.queue,g)},stop:function(a,b,c){var d=function(a){var b=a.stop;delete a.stop,b(c)};return"string"!=typeof a&&(c=b,b=a,a=void 0),b&&a!==!1&&this.queue(a||"fx",[]),this.each(function(){var b=!0,e=null!=a&&a+"queueHooks",f=r.timers,g=W.get(this);if(e)g[e]&&g[e].stop&&d(g[e]);else for(e in g)g[e]&&g[e].stop&&db.test(e)&&d(g[e]);for(e=f.length;e--;)f[e].elem!==this||null!=a&&f[e].queue!==a||(f[e].anim.stop(c),b=!1,f.splice(e,1));!b&&c||r.dequeue(this,a)})},finish:function(a){return a!==!1&&(a=a||"fx"),this.each(function(){var b,c=W.get(this),d=c[a+"queue"],e=c[a+"queueHooks"],f=r.timers,g=d?d.length:0;for(c.finish=!0,r.queue(this,a,[]),e&&e.stop&&e.stop.call(this,!0),b=f.length;b--;)f[b].elem===this&&f[b].queue===a&&(f[b].anim.stop(!0),f.splice(b,1));for(b=0;b<g;b++)d[b]&&d[b].finish&&d[b].finish.call(this);delete c.finish})}}),r.each(["toggle","show","hide"],function(a,b){var c=r.fn[b];r.fn[b]=function(a,d,e){return null==a||"boolean"==typeof a?c.apply(this,arguments):this.animate(gb(b,!0),a,d,e)}}),r.each({slideDown:gb("show"),slideUp:gb("hide"),slideToggle:gb("toggle"),fadeIn:{opacity:"show"},fadeOut:{opacity:"hide"},fadeToggle:{opacity:"toggle"}},function(a,b){r.fn[a]=function(a,c,d){return this.animate(b,a,c,d)}}),r.timers=[],r.fx.tick=function(){var a,b=0,c=r.timers;for(ab=r.now();b<c.length;b++)a=c[b],a()||c[b]!==a||c.splice(b--,1);c.length||r.fx.stop(),ab=void 0},r.fx.timer=function(a){r.timers.push(a),r.fx.start()},r.fx.interval=13,r.fx.start=function(){bb||(bb=!0,eb())},r.fx.stop=function(){bb=null},r.fx.speeds={slow:600,fast:200,_default:400},r.fn.delay=function(b,c){return b=r.fx?r.fx.speeds[b]||b:b,c=c||"fx",this.queue(c,function(c,d){var e=a.setTimeout(c,b);d.stop=function(){a.clearTimeout(e)}})},function(){var a=d.createElement("input"),b=d.createElement("select"),c=b.appendChild(d.createElement("option"));a.type="checkbox",o.checkOn=""!==a.value,o.optSelected=c.selected,a=d.createElement("input"),a.value="t",a.type="radio",o.radioValue="t"===a.value}();var lb,mb=r.expr.attrHandle;r.fn.extend({attr:function(a,b){return T(this,r.attr,a,b,arguments.length>1)},removeAttr:function(a){return this.each(function(){r.removeAttr(this,a)})}}),r.extend({attr:function(a,b,c){var d,e,f=a.nodeType;if(3!==f&&8!==f&&2!==f)return"undefined"==typeof a.getAttribute?r.prop(a,b,c):(1===f&&r.isXMLDoc(a)||(e=r.attrHooks[b.toLowerCase()]||(r.expr.match.bool.test(b)?lb:void 0)),void 0!==c?null===c?void r.removeAttr(a,b):e&&"set"in e&&void 0!==(d=e.set(a,c,b))?d:(a.setAttribute(b,c+""),c):e&&"get"in e&&null!==(d=e.get(a,b))?d:(d=r.find.attr(a,b),
        null==d?void 0:d))},attrHooks:{type:{set:function(a,b){if(!o.radioValue&&"radio"===b&&B(a,"input")){var c=a.value;return a.setAttribute("type",b),c&&(a.value=c),b}}}},removeAttr:function(a,b){var c,d=0,e=b&&b.match(L);if(e&&1===a.nodeType)while(c=e[d++])a.removeAttribute(c)}}),lb={set:function(a,b,c){return b===!1?r.removeAttr(a,c):a.setAttribute(c,c),c}},r.each(r.expr.match.bool.source.match(/\w+/g),function(a,b){var c=mb[b]||r.find.attr;mb[b]=function(a,b,d){var e,f,g=b.toLowerCase();return d||(f=mb[g],mb[g]=e,e=null!=c(a,b,d)?g:null,mb[g]=f),e}});var nb=/^(?:input|select|textarea|button)$/i,ob=/^(?:a|area)$/i;r.fn.extend({prop:function(a,b){return T(this,r.prop,a,b,arguments.length>1)},removeProp:function(a){return this.each(function(){delete this[r.propFix[a]||a]})}}),r.extend({prop:function(a,b,c){var d,e,f=a.nodeType;if(3!==f&&8!==f&&2!==f)return 1===f&&r.isXMLDoc(a)||(b=r.propFix[b]||b,e=r.propHooks[b]),void 0!==c?e&&"set"in e&&void 0!==(d=e.set(a,c,b))?d:a[b]=c:e&&"get"in e&&null!==(d=e.get(a,b))?d:a[b]},propHooks:{tabIndex:{get:function(a){var b=r.find.attr(a,"tabindex");return b?parseInt(b,10):nb.test(a.nodeName)||ob.test(a.nodeName)&&a.href?0:-1}}},propFix:{"for":"htmlFor","class":"className"}}),o.optSelected||(r.propHooks.selected={get:function(a){var b=a.parentNode;return b&&b.parentNode&&b.parentNode.selectedIndex,null},set:function(a){var b=a.parentNode;b&&(b.selectedIndex,b.parentNode&&b.parentNode.selectedIndex)}}),r.each(["tabIndex","readOnly","maxLength","cellSpacing","cellPadding","rowSpan","colSpan","useMap","frameBorder","contentEditable"],function(){r.propFix[this.toLowerCase()]=this});function pb(a){var b=a.match(L)||[];return b.join(" ")}function qb(a){return a.getAttribute&&a.getAttribute("class")||""}r.fn.extend({addClass:function(a){var b,c,d,e,f,g,h,i=0;if(r.isFunction(a))return this.each(function(b){r(this).addClass(a.call(this,b,qb(this)))});if("string"==typeof a&&a){b=a.match(L)||[];while(c=this[i++])if(e=qb(c),d=1===c.nodeType&&" "+pb(e)+" "){g=0;while(f=b[g++])d.indexOf(" "+f+" ")<0&&(d+=f+" ");h=pb(d),e!==h&&c.setAttribute("class",h)}}return this},removeClass:function(a){var b,c,d,e,f,g,h,i=0;if(r.isFunction(a))return this.each(function(b){r(this).removeClass(a.call(this,b,qb(this)))});if(!arguments.length)return this.attr("class","");if("string"==typeof a&&a){b=a.match(L)||[];while(c=this[i++])if(e=qb(c),d=1===c.nodeType&&" "+pb(e)+" "){g=0;while(f=b[g++])while(d.indexOf(" "+f+" ")>-1)d=d.replace(" "+f+" "," ");h=pb(d),e!==h&&c.setAttribute("class",h)}}return this},toggleClass:function(a,b){var c=typeof a;return"boolean"==typeof b&&"string"===c?b?this.addClass(a):this.removeClass(a):r.isFunction(a)?this.each(function(c){r(this).toggleClass(a.call(this,c,qb(this),b),b)}):this.each(function(){var b,d,e,f;if("string"===c){d=0,e=r(this),f=a.match(L)||[];while(b=f[d++])e.hasClass(b)?e.removeClass(b):e.addClass(b)}else void 0!==a&&"boolean"!==c||(b=qb(this),b&&W.set(this,"__className__",b),this.setAttribute&&this.setAttribute("class",b||a===!1?"":W.get(this,"__className__")||""))})},hasClass:function(a){var b,c,d=0;b=" "+a+" ";while(c=this[d++])if(1===c.nodeType&&(" "+pb(qb(c))+" ").indexOf(b)>-1)return!0;return!1}});var rb=/\r/g;r.fn.extend({val:function(a){var b,c,d,e=this[0];{if(arguments.length)return d=r.isFunction(a),this.each(function(c){var e;1===this.nodeType&&(e=d?a.call(this,c,r(this).val()):a,null==e?e="":"number"==typeof e?e+="":Array.isArray(e)&&(e=r.map(e,function(a){return null==a?"":a+""})),b=r.valHooks[this.type]||r.valHooks[this.nodeName.toLowerCase()],b&&"set"in b&&void 0!==b.set(this,e,"value")||(this.value=e))});if(e)return b=r.valHooks[e.type]||r.valHooks[e.nodeName.toLowerCase()],b&&"get"in b&&void 0!==(c=b.get(e,"value"))?c:(c=e.value,"string"==typeof c?c.replace(rb,""):null==c?"":c)}}}),r.extend({valHooks:{option:{get:function(a){var b=r.find.attr(a,"value");return null!=b?b:pb(r.text(a))}},select:{get:function(a){var b,c,d,e=a.options,f=a.selectedIndex,g="select-one"===a.type,h=g?null:[],i=g?f+1:e.length;for(d=f<0?i:g?f:0;d<i;d++)if(c=e[d],(c.selected||d===f)&&!c.disabled&&(!c.parentNode.disabled||!B(c.parentNode,"optgroup"))){if(b=r(c).val(),g)return b;h.push(b)}return h},set:function(a,b){var c,d,e=a.options,f=r.makeArray(b),g=e.length;while(g--)d=e[g],(d.selected=r.inArray(r.valHooks.option.get(d),f)>-1)&&(c=!0);return c||(a.selectedIndex=-1),f}}}}),r.each(["radio","checkbox"],function(){r.valHooks[this]={set:function(a,b){if(Array.isArray(b))return a.checked=r.inArray(r(a).val(),b)>-1}},o.checkOn||(r.valHooks[this].get=function(a){return null===a.getAttribute("value")?"on":a.value})});var sb=/^(?:focusinfocus|focusoutblur)$/;r.extend(r.event,{trigger:function(b,c,e,f){var g,h,i,j,k,m,n,o=[e||d],p=l.call(b,"type")?b.type:b,q=l.call(b,"namespace")?b.namespace.split("."):[];if(h=i=e=e||d,3!==e.nodeType&&8!==e.nodeType&&!sb.test(p+r.event.triggered)&&(p.indexOf(".")>-1&&(q=p.split("."),p=q.shift(),q.sort()),k=p.indexOf(":")<0&&"on"+p,b=b[r.expando]?b:new r.Event(p,"object"==typeof b&&b),b.isTrigger=f?2:3,b.namespace=q.join("."),b.rnamespace=b.namespace?new RegExp("(^|\\.)"+q.join("\\.(?:.*\\.|)")+"(\\.|$)"):null,b.result=void 0,b.target||(b.target=e),c=null==c?[b]:r.makeArray(c,[b]),n=r.event.special[p]||{},f||!n.trigger||n.trigger.apply(e,c)!==!1)){if(!f&&!n.noBubble&&!r.isWindow(e)){for(j=n.delegateType||p,sb.test(j+p)||(h=h.parentNode);h;h=h.parentNode)o.push(h),i=h;i===(e.ownerDocument||d)&&o.push(i.defaultView||i.parentWindow||a)}g=0;while((h=o[g++])&&!b.isPropagationStopped())b.type=g>1?j:n.bindType||p,m=(W.get(h,"events")||{})[b.type]&&W.get(h,"handle"),m&&m.apply(h,c),m=k&&h[k],m&&m.apply&&U(h)&&(b.result=m.apply(h,c),b.result===!1&&b.preventDefault());return b.type=p,f||b.isDefaultPrevented()||n._default&&n._default.apply(o.pop(),c)!==!1||!U(e)||k&&r.isFunction(e[p])&&!r.isWindow(e)&&(i=e[k],i&&(e[k]=null),r.event.triggered=p,e[p](),r.event.triggered=void 0,i&&(e[k]=i)),b.result}},simulate:function(a,b,c){var d=r.extend(new r.Event,c,{type:a,isSimulated:!0});r.event.trigger(d,null,b)}}),r.fn.extend({trigger:function(a,b){return this.each(function(){r.event.trigger(a,b,this)})},triggerHandler:function(a,b){var c=this[0];if(c)return r.event.trigger(a,b,c,!0)}}),r.each("blur focus focusin focusout resize scroll click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup contextmenu".split(" "),function(a,b){r.fn[b]=function(a,c){return arguments.length>0?this.on(b,null,a,c):this.trigger(b)}}),r.fn.extend({hover:function(a,b){return this.mouseenter(a).mouseleave(b||a)}}),o.focusin="onfocusin"in a,o.focusin||r.each({focus:"focusin",blur:"focusout"},function(a,b){var c=function(a){r.event.simulate(b,a.target,r.event.fix(a))};r.event.special[b]={setup:function(){var d=this.ownerDocument||this,e=W.access(d,b);e||d.addEventListener(a,c,!0),W.access(d,b,(e||0)+1)},teardown:function(){var d=this.ownerDocument||this,e=W.access(d,b)-1;e?W.access(d,b,e):(d.removeEventListener(a,c,!0),W.remove(d,b))}}});var tb=a.location,ub=r.now(),vb=/\?/;r.parseXML=function(b){var c;if(!b||"string"!=typeof b)return null;try{c=(new a.DOMParser).parseFromString(b,"text/xml")}catch(d){c=void 0}return c&&!c.getElementsByTagName("parsererror").length||r.error("Invalid XML: "+b),c};var wb=/\[\]$/,xb=/\r?\n/g,yb=/^(?:submit|button|image|reset|file)$/i,zb=/^(?:input|select|textarea|keygen)/i;function Ab(a,b,c,d){var e;if(Array.isArray(b))r.each(b,function(b,e){c||wb.test(a)?d(a,e):Ab(a+"["+("object"==typeof e&&null!=e?b:"")+"]",e,c,d)});else if(c||"object"!==r.type(b))d(a,b);else for(e in b)Ab(a+"["+e+"]",b[e],c,d)}r.param=function(a,b){var c,d=[],e=function(a,b){var c=r.isFunction(b)?b():b;d[d.length]=encodeURIComponent(a)+"="+encodeURIComponent(null==c?"":c)};if(Array.isArray(a)||a.jquery&&!r.isPlainObject(a))r.each(a,function(){e(this.name,this.value)});else for(c in a)Ab(c,a[c],b,e);return d.join("&")},r.fn.extend({serialize:function(){return r.param(this.serializeArray())},serializeArray:function(){return this.map(function(){var a=r.prop(this,"elements");return a?r.makeArray(a):this}).filter(function(){var a=this.type;return this.name&&!r(this).is(":disabled")&&zb.test(this.nodeName)&&!yb.test(a)&&(this.checked||!ja.test(a))}).map(function(a,b){var c=r(this).val();return null==c?null:Array.isArray(c)?r.map(c,function(a){return{name:b.name,value:a.replace(xb,"\r\n")}}):{name:b.name,value:c.replace(xb,"\r\n")}}).get()}});var Bb=/%20/g,Cb=/#.*$/,Db=/([?&])_=[^&]*/,Eb=/^(.*?):[ \t]*([^\r\n]*)$/gm,Fb=/^(?:about|app|app-storage|.+-extension|file|res|widget):$/,Gb=/^(?:GET|HEAD)$/,Hb=/^\/\//,Ib={},Jb={},Kb="*/".concat("*"),Lb=d.createElement("a");Lb.href=tb.href;function Mb(a){return function(b,c){"string"!=typeof b&&(c=b,b="*");var d,e=0,f=b.toLowerCase().match(L)||[];if(r.isFunction(c))while(d=f[e++])"+"===d[0]?(d=d.slice(1)||"*",(a[d]=a[d]||[]).unshift(c)):(a[d]=a[d]||[]).push(c)}}function Nb(a,b,c,d){var e={},f=a===Jb;function g(h){var i;return e[h]=!0,r.each(a[h]||[],function(a,h){var j=h(b,c,d);return"string"!=typeof j||f||e[j]?f?!(i=j):void 0:(b.dataTypes.unshift(j),g(j),!1)}),i}return g(b.dataTypes[0])||!e["*"]&&g("*")}function Ob(a,b){var c,d,e=r.ajaxSettings.flatOptions||{};for(c in b)void 0!==b[c]&&((e[c]?a:d||(d={}))[c]=b[c]);return d&&r.extend(!0,a,d),a}function Pb(a,b,c){var d,e,f,g,h=a.contents,i=a.dataTypes;while("*"===i[0])i.shift(),void 0===d&&(d=a.mimeType||b.getResponseHeader("Content-Type"));if(d)for(e in h)if(h[e]&&h[e].test(d)){i.unshift(e);break}if(i[0]in c)f=i[0];else{for(e in c){if(!i[0]||a.converters[e+" "+i[0]]){f=e;break}g||(g=e)}f=f||g}if(f)return f!==i[0]&&i.unshift(f),c[f]}function Qb(a,b,c,d){var e,f,g,h,i,j={},k=a.dataTypes.slice();if(k[1])for(g in a.converters)j[g.toLowerCase()]=a.converters[g];f=k.shift();while(f)if(a.responseFields[f]&&(c[a.responseFields[f]]=b),!i&&d&&a.dataFilter&&(b=a.dataFilter(b,a.dataType)),i=f,f=k.shift())if("*"===f)f=i;else if("*"!==i&&i!==f){if(g=j[i+" "+f]||j["* "+f],!g)for(e in j)if(h=e.split(" "),h[1]===f&&(g=j[i+" "+h[0]]||j["* "+h[0]])){g===!0?g=j[e]:j[e]!==!0&&(f=h[0],k.unshift(h[1]));break}if(g!==!0)if(g&&a["throws"])b=g(b);else try{b=g(b)}catch(l){return{state:"parsererror",error:g?l:"No conversion from "+i+" to "+f}}}return{state:"success",data:b}}r.extend({active:0,lastModified:{},etag:{},ajaxSettings:{url:tb.href,type:"GET",isLocal:Fb.test(tb.protocol),global:!0,processData:!0,async:!0,contentType:"application/x-www-form-urlencoded; charset=UTF-8",accepts:{"*":Kb,text:"text/plain",html:"text/html",xml:"application/xml, text/xml",json:"application/json, text/javascript"},contents:{xml:/\bxml\b/,html:/\bhtml/,json:/\bjson\b/},responseFields:{xml:"responseXML",text:"responseText",json:"responseJSON"},converters:{"* text":String,"text html":!0,"text json":JSON.parse,"text xml":r.parseXML},flatOptions:{url:!0,context:!0}},ajaxSetup:function(a,b){return b?Ob(Ob(a,r.ajaxSettings),b):Ob(r.ajaxSettings,a)},ajaxPrefilter:Mb(Ib),ajaxTransport:Mb(Jb),ajax:function(b,c){"object"==typeof b&&(c=b,b=void 0),c=c||{};var e,f,g,h,i,j,k,l,m,n,o=r.ajaxSetup({},c),p=o.context||o,q=o.context&&(p.nodeType||p.jquery)?r(p):r.event,s=r.Deferred(),t=r.Callbacks("once memory"),u=o.statusCode||{},v={},w={},x="canceled",y={readyState:0,getResponseHeader:function(a){var b;if(k){if(!h){h={};while(b=Eb.exec(g))h[b[1].toLowerCase()]=b[2]}b=h[a.toLowerCase()]}return null==b?null:b},getAllResponseHeaders:function(){return k?g:null},setRequestHeader:function(a,b){return null==k&&(a=w[a.toLowerCase()]=w[a.toLowerCase()]||a,v[a]=b),this},overrideMimeType:function(a){return null==k&&(o.mimeType=a),this},statusCode:function(a){var b;if(a)if(k)y.always(a[y.status]);else for(b in a)u[b]=[u[b],a[b]];return this},abort:function(a){var b=a||x;return e&&e.abort(b),A(0,b),this}};if(s.promise(y),o.url=((b||o.url||tb.href)+"").replace(Hb,tb.protocol+"//"),o.type=c.method||c.type||o.method||o.type,o.dataTypes=(o.dataType||"*").toLowerCase().match(L)||[""],null==o.crossDomain){j=d.createElement("a");try{j.href=o.url,j.href=j.href,o.crossDomain=Lb.protocol+"//"+Lb.host!=j.protocol+"//"+j.host}catch(z){o.crossDomain=!0}}if(o.data&&o.processData&&"string"!=typeof o.data&&(o.data=r.param(o.data,o.traditional)),Nb(Ib,o,c,y),k)return y;l=r.event&&o.global,l&&0===r.active++&&r.event.trigger("ajaxStart"),o.type=o.type.toUpperCase(),o.hasContent=!Gb.test(o.type),f=o.url.replace(Cb,""),o.hasContent?o.data&&o.processData&&0===(o.contentType||"").indexOf("application/x-www-form-urlencoded")&&(o.data=o.data.replace(Bb,"+")):(n=o.url.slice(f.length),o.data&&(f+=(vb.test(f)?"&":"?")+o.data,delete o.data),o.cache===!1&&(f=f.replace(Db,"$1"),n=(vb.test(f)?"&":"?")+"_="+ub++ +n),o.url=f+n),o.ifModified&&(r.lastModified[f]&&y.setRequestHeader("If-Modified-Since",r.lastModified[f]),r.etag[f]&&y.setRequestHeader("If-None-Match",r.etag[f])),(o.data&&o.hasContent&&o.contentType!==!1||c.contentType)&&y.setRequestHeader("Content-Type",o.contentType),y.setRequestHeader("Accept",o.dataTypes[0]&&o.accepts[o.dataTypes[0]]?o.accepts[o.dataTypes[0]]+("*"!==o.dataTypes[0]?", "+Kb+"; q=0.01":""):o.accepts["*"]);for(m in o.headers)y.setRequestHeader(m,o.headers[m]);if(o.beforeSend&&(o.beforeSend.call(p,y,o)===!1||k))return y.abort();if(x="abort",t.add(o.complete),y.done(o.success),y.fail(o.error),e=Nb(Jb,o,c,y)){if(y.readyState=1,l&&q.trigger("ajaxSend",[y,o]),k)return y;o.async&&o.timeout>0&&(i=a.setTimeout(function(){y.abort("timeout")},o.timeout));try{k=!1,e.send(v,A)}catch(z){if(k)throw z;A(-1,z)}}else A(-1,"No Transport");function A(b,c,d,h){var j,m,n,v,w,x=c;k||(k=!0,i&&a.clearTimeout(i),e=void 0,g=h||"",y.readyState=b>0?4:0,j=b>=200&&b<300||304===b,d&&(v=Pb(o,y,d)),v=Qb(o,v,y,j),j?(o.ifModified&&(w=y.getResponseHeader("Last-Modified"),w&&(r.lastModified[f]=w),w=y.getResponseHeader("etag"),w&&(r.etag[f]=w)),204===b||"HEAD"===o.type?x="nocontent":304===b?x="notmodified":(x=v.state,m=v.data,n=v.error,j=!n)):(n=x,!b&&x||(x="error",b<0&&(b=0))),y.status=b,y.statusText=(c||x)+"",j?s.resolveWith(p,[m,x,y]):s.rejectWith(p,[y,x,n]),y.statusCode(u),u=void 0,l&&q.trigger(j?"ajaxSuccess":"ajaxError",[y,o,j?m:n]),t.fireWith(p,[y,x]),l&&(q.trigger("ajaxComplete",[y,o]),--r.active||r.event.trigger("ajaxStop")))}return y},getJSON:function(a,b,c){return r.get(a,b,c,"json")},getScript:function(a,b){return r.get(a,void 0,b,"script")}}),r.each(["get","post"],function(a,b){r[b]=function(a,c,d,e){return r.isFunction(c)&&(e=e||d,d=c,c=void 0),r.ajax(r.extend({url:a,type:b,dataType:e,data:c,success:d},r.isPlainObject(a)&&a))}}),r._evalUrl=function(a){return r.ajax({url:a,type:"GET",dataType:"script",cache:!0,async:!1,global:!1,"throws":!0})},r.fn.extend({wrapAll:function(a){var b;return this[0]&&(r.isFunction(a)&&(a=a.call(this[0])),b=r(a,this[0].ownerDocument).eq(0).clone(!0),this[0].parentNode&&b.insertBefore(this[0]),b.map(function(){var a=this;while(a.firstElementChild)a=a.firstElementChild;return a}).append(this)),this},wrapInner:function(a){return r.isFunction(a)?this.each(function(b){r(this).wrapInner(a.call(this,b))}):this.each(function(){var b=r(this),c=b.contents();c.length?c.wrapAll(a):b.append(a)})},wrap:function(a){var b=r.isFunction(a);return this.each(function(c){r(this).wrapAll(b?a.call(this,c):a)})},unwrap:function(a){return this.parent(a).not("body").each(function(){r(this).replaceWith(this.childNodes)}),this}}),r.expr.pseudos.hidden=function(a){return!r.expr.pseudos.visible(a)},r.expr.pseudos.visible=function(a){return!!(a.offsetWidth||a.offsetHeight||a.getClientRects().length)},r.ajaxSettings.xhr=function(){try{return new a.XMLHttpRequest}catch(b){}};var Rb={0:200,1223:204},Sb=r.ajaxSettings.xhr();o.cors=!!Sb&&"withCredentials"in Sb,o.ajax=Sb=!!Sb,r.ajaxTransport(function(b){var c,d;if(o.cors||Sb&&!b.crossDomain)return{send:function(e,f){var g,h=b.xhr();if(h.open(b.type,b.url,b.async,b.username,b.password),b.xhrFields)for(g in b.xhrFields)h[g]=b.xhrFields[g];b.mimeType&&h.overrideMimeType&&h.overrideMimeType(b.mimeType),b.crossDomain||e["X-Requested-With"]||(e["X-Requested-With"]="XMLHttpRequest");for(g in e)h.setRequestHeader(g,e[g]);c=function(a){return function(){c&&(c=d=h.onload=h.onerror=h.onabort=h.onreadystatechange=null,"abort"===a?h.abort():"error"===a?"number"!=typeof h.status?f(0,"error"):f(h.status,h.statusText):f(Rb[h.status]||h.status,h.statusText,"text"!==(h.responseType||"text")||"string"!=typeof h.responseText?{binary:h.response}:{text:h.responseText},h.getAllResponseHeaders()))}},h.onload=c(),d=h.onerror=c("error"),void 0!==h.onabort?h.onabort=d:h.onreadystatechange=function(){4===h.readyState&&a.setTimeout(function(){c&&d()})},c=c("abort");try{h.send(b.hasContent&&b.data||null)}catch(i){if(c)throw i}},abort:function(){c&&c()}}}),r.ajaxPrefilter(function(a){a.crossDomain&&(a.contents.script=!1)}),r.ajaxSetup({accepts:{script:"text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"},contents:{script:/\b(?:java|ecma)script\b/},converters:{"text script":function(a){return r.globalEval(a),a}}}),r.ajaxPrefilter("script",function(a){void 0===a.cache&&(a.cache=!1),a.crossDomain&&(a.type="GET")}),r.ajaxTransport("script",function(a){if(a.crossDomain){var b,c;return{send:function(e,f){b=r("<script>").prop({charset:a.scriptCharset,src:a.url}).on("load error",c=function(a){b.remove(),c=null,a&&f("error"===a.type?404:200,a.type)}),d.head.appendChild(b[0])},abort:function(){c&&c()}}}});var Tb=[],Ub=/(=)\?(?=&|$)|\?\?/;r.ajaxSetup({jsonp:"callback",jsonpCallback:function(){var a=Tb.pop()||r.expando+"_"+ub++;return this[a]=!0,a}}),r.ajaxPrefilter("json jsonp",function(b,c,d){var e,f,g,h=b.jsonp!==!1&&(Ub.test(b.url)?"url":"string"==typeof b.data&&0===(b.contentType||"").indexOf("application/x-www-form-urlencoded")&&Ub.test(b.data)&&"data");if(h||"jsonp"===b.dataTypes[0])return e=b.jsonpCallback=r.isFunction(b.jsonpCallback)?b.jsonpCallback():b.jsonpCallback,h?b[h]=b[h].replace(Ub,"$1"+e):b.jsonp!==!1&&(b.url+=(vb.test(b.url)?"&":"?")+b.jsonp+"="+e),b.converters["script json"]=function(){return g||r.error(e+" was not called"),g[0]},b.dataTypes[0]="json",f=a[e],a[e]=function(){g=arguments},d.always(function(){void 0===f?r(a).removeProp(e):a[e]=f,b[e]&&(b.jsonpCallback=c.jsonpCallback,Tb.push(e)),g&&r.isFunction(f)&&f(g[0]),g=f=void 0}),"script"}),o.createHTMLDocument=function(){var a=d.implementation.createHTMLDocument("").body;return a.innerHTML="<form></form><form></form>",2===a.childNodes.length}(),r.parseHTML=function(a,b,c){if("string"!=typeof a)return[];"boolean"==typeof b&&(c=b,b=!1);var e,f,g;return b||(o.createHTMLDocument?(b=d.implementation.createHTMLDocument(""),e=b.createElement("base"),e.href=d.location.href,b.head.appendChild(e)):b=d),f=C.exec(a),g=!c&&[],f?[b.createElement(f[1])]:(f=qa([a],b,g),g&&g.length&&r(g).remove(),r.merge([],f.childNodes))},r.fn.load=function(a,b,c){var d,e,f,g=this,h=a.indexOf(" ");return h>-1&&(d=pb(a.slice(h)),a=a.slice(0,h)),r.isFunction(b)?(c=b,b=void 0):b&&"object"==typeof b&&(e="POST"),g.length>0&&r.ajax({url:a,type:e||"GET",dataType:"html",data:b}).done(function(a){f=arguments,g.html(d?r("<div>").append(r.parseHTML(a)).find(d):a)}).always(c&&function(a,b){g.each(function(){c.apply(this,f||[a.responseText,b,a])})}),this},r.each(["ajaxStart","ajaxStop","ajaxComplete","ajaxError","ajaxSuccess","ajaxSend"],function(a,b){r.fn[b]=function(a){return this.on(b,a)}}),r.expr.pseudos.animated=function(a){return r.grep(r.timers,function(b){return a===b.elem}).length},r.offset={setOffset:function(a,b,c){var d,e,f,g,h,i,j,k=r.css(a,"position"),l=r(a),m={};"static"===k&&(a.style.position="relative"),h=l.offset(),f=r.css(a,"top"),i=r.css(a,"left"),j=("absolute"===k||"fixed"===k)&&(f+i).indexOf("auto")>-1,j?(d=l.position(),g=d.top,e=d.left):(g=parseFloat(f)||0,e=parseFloat(i)||0),r.isFunction(b)&&(b=b.call(a,c,r.extend({},h))),null!=b.top&&(m.top=b.top-h.top+g),null!=b.left&&(m.left=b.left-h.left+e),"using"in b?b.using.call(a,m):l.css(m)}},r.fn.extend({offset:function(a){if(arguments.length)return void 0===a?this:this.each(function(b){r.offset.setOffset(this,a,b)});var b,c,d,e,f=this[0];if(f)return f.getClientRects().length?(d=f.getBoundingClientRect(),b=f.ownerDocument,c=b.documentElement,e=b.defaultView,{top:d.top+e.pageYOffset-c.clientTop,left:d.left+e.pageXOffset-c.clientLeft}):{top:0,left:0}},position:function(){if(this[0]){var a,b,c=this[0],d={top:0,left:0};return"fixed"===r.css(c,"position")?b=c.getBoundingClientRect():(a=this.offsetParent(),b=this.offset(),B(a[0],"html")||(d=a.offset()),d={top:d.top+r.css(a[0],"borderTopWidth",!0),left:d.left+r.css(a[0],"borderLeftWidth",!0)}),{top:b.top-d.top-r.css(c,"marginTop",!0),left:b.left-d.left-r.css(c,"marginLeft",!0)}}},offsetParent:function(){return this.map(function(){var a=this.offsetParent;while(a&&"static"===r.css(a,"position"))a=a.offsetParent;return a||ra})}}),r.each({scrollLeft:"pageXOffset",scrollTop:"pageYOffset"},function(a,b){var c="pageYOffset"===b;r.fn[a]=function(d){return T(this,function(a,d,e){var f;return r.isWindow(a)?f=a:9===a.nodeType&&(f=a.defaultView),void 0===e?f?f[b]:a[d]:void(f?f.scrollTo(c?f.pageXOffset:e,c?e:f.pageYOffset):a[d]=e)},a,d,arguments.length)}}),r.each(["top","left"],function(a,b){r.cssHooks[b]=Pa(o.pixelPosition,function(a,c){if(c)return c=Oa(a,b),Ma.test(c)?r(a).position()[b]+"px":c})}),r.each({Height:"height",Width:"width"},function(a,b){r.each({padding:"inner"+a,content:b,"":"outer"+a},function(c,d){r.fn[d]=function(e,f){var g=arguments.length&&(c||"boolean"!=typeof e),h=c||(e===!0||f===!0?"margin":"border");return T(this,function(b,c,e){var f;return r.isWindow(b)?0===d.indexOf("outer")?b["inner"+a]:b.document.documentElement["client"+a]:9===b.nodeType?(f=b.documentElement,Math.max(b.body["scroll"+a],f["scroll"+a],b.body["offset"+a],f["offset"+a],f["client"+a])):void 0===e?r.css(b,c,h):r.style(b,c,e,h)},b,g?e:void 0,g)}})}),r.fn.extend({bind:function(a,b,c){return this.on(a,null,b,c)},unbind:function(a,b){return this.off(a,null,b)},delegate:function(a,b,c,d){return this.on(b,a,c,d)},undelegate:function(a,b,c){return 1===arguments.length?this.off(a,"**"):this.off(b,a||"**",c)}}),r.holdReady=function(a){a?r.readyWait++:r.ready(!0)},r.isArray=Array.isArray,r.parseJSON=JSON.parse,r.nodeName=B,"function"==typeof define&&define.amd&&define("jquery",[],function(){return r});var Vb=a.jQuery,Wb=a.$;return r.noConflict=function(b){return a.$===r&&(a.$=Wb),b&&a.jQuery===r&&(a.jQuery=Vb),r},b||(a.jQuery=a.$=r),r});

/*
 Copyright (C) Federico Zivolo 2018
 Distributed under the MIT License (license terms are at http://opensource.org/licenses/MIT).
 */(function(e,t){'object'==typeof exports&&'undefined'!=typeof module?module.exports=t():'function'==typeof define&&define.amd?define(t):e.Popper=t()})(this,function(){'use strict';function e(e){return e&&'[object Function]'==={}.toString.call(e)}function t(e,t){if(1!==e.nodeType)return[];var o=getComputedStyle(e,null);return t?o[t]:o}function o(e){return'HTML'===e.nodeName?e:e.parentNode||e.host}function n(e){if(!e)return document.body;switch(e.nodeName){case'HTML':case'BODY':return e.ownerDocument.body;case'#document':return e.body;}var i=t(e),r=i.overflow,p=i.overflowX,s=i.overflowY;return /(auto|scroll|overlay)/.test(r+s+p)?e:n(o(e))}function r(e){if(!e)return document.documentElement;for(var o=ie(10)?document.body:null,n=e.offsetParent;n===o&&e.nextElementSibling;)n=(e=e.nextElementSibling).offsetParent;var i=n&&n.nodeName;return i&&'BODY'!==i&&'HTML'!==i?-1!==['TD','TABLE'].indexOf(n.nodeName)&&'static'===t(n,'position')?r(n):n:e?e.ownerDocument.documentElement:document.documentElement}function p(e){var t=e.nodeName;return'BODY'!==t&&('HTML'===t||r(e.firstElementChild)===e)}function s(e){return null===e.parentNode?e:s(e.parentNode)}function d(e,t){if(!e||!e.nodeType||!t||!t.nodeType)return document.documentElement;var o=e.compareDocumentPosition(t)&Node.DOCUMENT_POSITION_FOLLOWING,n=o?e:t,i=o?t:e,a=document.createRange();a.setStart(n,0),a.setEnd(i,0);var l=a.commonAncestorContainer;if(e!==l&&t!==l||n.contains(i))return p(l)?l:r(l);var f=s(e);return f.host?d(f.host,t):d(e,s(t).host)}function a(e){var t=1<arguments.length&&void 0!==arguments[1]?arguments[1]:'top',o='top'===t?'scrollTop':'scrollLeft',n=e.nodeName;if('BODY'===n||'HTML'===n){var i=e.ownerDocument.documentElement,r=e.ownerDocument.scrollingElement||i;return r[o]}return e[o]}function l(e,t){var o=2<arguments.length&&void 0!==arguments[2]&&arguments[2],n=a(t,'top'),i=a(t,'left'),r=o?-1:1;return e.top+=n*r,e.bottom+=n*r,e.left+=i*r,e.right+=i*r,e}function f(e,t){var o='x'===t?'Left':'Top',n='Left'==o?'Right':'Bottom';return parseFloat(e['border'+o+'Width'],10)+parseFloat(e['border'+n+'Width'],10)}function m(e,t,o,n){return Q(t['offset'+e],t['scroll'+e],o['client'+e],o['offset'+e],o['scroll'+e],ie(10)?o['offset'+e]+n['margin'+('Height'===e?'Top':'Left')]+n['margin'+('Height'===e?'Bottom':'Right')]:0)}function h(){var e=document.body,t=document.documentElement,o=ie(10)&&getComputedStyle(t);return{height:m('Height',e,t,o),width:m('Width',e,t,o)}}function c(e){return de({},e,{right:e.left+e.width,bottom:e.top+e.height})}function g(e){var o={};try{if(ie(10)){o=e.getBoundingClientRect();var n=a(e,'top'),i=a(e,'left');o.top+=n,o.left+=i,o.bottom+=n,o.right+=i}else o=e.getBoundingClientRect()}catch(t){}var r={left:o.left,top:o.top,width:o.right-o.left,height:o.bottom-o.top},p='HTML'===e.nodeName?h():{},s=p.width||e.clientWidth||r.right-r.left,d=p.height||e.clientHeight||r.bottom-r.top,l=e.offsetWidth-s,m=e.offsetHeight-d;if(l||m){var g=t(e);l-=f(g,'x'),m-=f(g,'y'),r.width-=l,r.height-=m}return c(r)}function u(e,o){var i=2<arguments.length&&void 0!==arguments[2]&&arguments[2],r=ie(10),p='HTML'===o.nodeName,s=g(e),d=g(o),a=n(e),f=t(o),m=parseFloat(f.borderTopWidth,10),h=parseFloat(f.borderLeftWidth,10);i&&'HTML'===o.nodeName&&(d.top=Q(d.top,0),d.left=Q(d.left,0));var u=c({top:s.top-d.top-m,left:s.left-d.left-h,width:s.width,height:s.height});if(u.marginTop=0,u.marginLeft=0,!r&&p){var b=parseFloat(f.marginTop,10),y=parseFloat(f.marginLeft,10);u.top-=m-b,u.bottom-=m-b,u.left-=h-y,u.right-=h-y,u.marginTop=b,u.marginLeft=y}return(r&&!i?o.contains(a):o===a&&'BODY'!==a.nodeName)&&(u=l(u,o)),u}function b(e){var t=1<arguments.length&&void 0!==arguments[1]&&arguments[1],o=e.ownerDocument.documentElement,n=u(e,o),i=Q(o.clientWidth,window.innerWidth||0),r=Q(o.clientHeight,window.innerHeight||0),p=t?0:a(o),s=t?0:a(o,'left'),d={top:p-n.top+n.marginTop,left:s-n.left+n.marginLeft,width:i,height:r};return c(d)}function y(e){var n=e.nodeName;return'BODY'===n||'HTML'===n?!1:'fixed'===t(e,'position')||y(o(e))}function w(e){if(!e||!e.parentElement||ie())return document.documentElement;for(var o=e.parentElement;o&&'none'===t(o,'transform');)o=o.parentElement;return o||document.documentElement}function E(e,t,i,r){var p=4<arguments.length&&void 0!==arguments[4]&&arguments[4],s={top:0,left:0},a=p?w(e):d(e,t);if('viewport'===r)s=b(a,p);else{var l;'scrollParent'===r?(l=n(o(t)),'BODY'===l.nodeName&&(l=e.ownerDocument.documentElement)):'window'===r?l=e.ownerDocument.documentElement:l=r;var f=u(l,a,p);if('HTML'===l.nodeName&&!y(a)){var m=h(),c=m.height,g=m.width;s.top+=f.top-f.marginTop,s.bottom=c+f.top,s.left+=f.left-f.marginLeft,s.right=g+f.left}else s=f}return s.left+=i,s.top+=i,s.right-=i,s.bottom-=i,s}function v(e){var t=e.width,o=e.height;return t*o}function x(e,t,o,n,i){var r=5<arguments.length&&void 0!==arguments[5]?arguments[5]:0;if(-1===e.indexOf('auto'))return e;var p=E(o,n,r,i),s={top:{width:p.width,height:t.top-p.top},right:{width:p.right-t.right,height:p.height},bottom:{width:p.width,height:p.bottom-t.bottom},left:{width:t.left-p.left,height:p.height}},d=Object.keys(s).map(function(e){return de({key:e},s[e],{area:v(s[e])})}).sort(function(e,t){return t.area-e.area}),a=d.filter(function(e){var t=e.width,n=e.height;return t>=o.clientWidth&&n>=o.clientHeight}),l=0<a.length?a[0].key:d[0].key,f=e.split('-')[1];return l+(f?'-'+f:'')}function O(e,t,o){var n=3<arguments.length&&void 0!==arguments[3]?arguments[3]:null,i=n?w(t):d(t,o);return u(o,i,n)}function L(e){var t=getComputedStyle(e),o=parseFloat(t.marginTop)+parseFloat(t.marginBottom),n=parseFloat(t.marginLeft)+parseFloat(t.marginRight),i={width:e.offsetWidth+n,height:e.offsetHeight+o};return i}function S(e){var t={left:'right',right:'left',bottom:'top',top:'bottom'};return e.replace(/left|right|bottom|top/g,function(e){return t[e]})}function T(e,t,o){o=o.split('-')[0];var n=L(e),i={width:n.width,height:n.height},r=-1!==['right','left'].indexOf(o),p=r?'top':'left',s=r?'left':'top',d=r?'height':'width',a=r?'width':'height';return i[p]=t[p]+t[d]/2-n[d]/2,i[s]=o===s?t[s]-n[a]:t[S(s)],i}function D(e,t){return Array.prototype.find?e.find(t):e.filter(t)[0]}function C(e,t,o){if(Array.prototype.findIndex)return e.findIndex(function(e){return e[t]===o});var n=D(e,function(e){return e[t]===o});return e.indexOf(n)}function N(t,o,n){var i=void 0===n?t:t.slice(0,C(t,'name',n));return i.forEach(function(t){t['function']&&console.warn('`modifier.function` is deprecated, use `modifier.fn`!');var n=t['function']||t.fn;t.enabled&&e(n)&&(o.offsets.popper=c(o.offsets.popper),o.offsets.reference=c(o.offsets.reference),o=n(o,t))}),o}function k(){if(!this.state.isDestroyed){var e={instance:this,styles:{},arrowStyles:{},attributes:{},flipped:!1,offsets:{}};e.offsets.reference=O(this.state,this.popper,this.reference,this.options.positionFixed),e.placement=x(this.options.placement,e.offsets.reference,this.popper,this.reference,this.options.modifiers.flip.boundariesElement,this.options.modifiers.flip.padding),e.originalPlacement=e.placement,e.positionFixed=this.options.positionFixed,e.offsets.popper=T(this.popper,e.offsets.reference,e.placement),e.offsets.popper.position=this.options.positionFixed?'fixed':'absolute',e=N(this.modifiers,e),this.state.isCreated?this.options.onUpdate(e):(this.state.isCreated=!0,this.options.onCreate(e))}}function P(e,t){return e.some(function(e){var o=e.name,n=e.enabled;return n&&o===t})}function W(e){for(var t=[!1,'ms','Webkit','Moz','O'],o=e.charAt(0).toUpperCase()+e.slice(1),n=0;n<t.length;n++){var i=t[n],r=i?''+i+o:e;if('undefined'!=typeof document.body.style[r])return r}return null}function B(){return this.state.isDestroyed=!0,P(this.modifiers,'applyStyle')&&(this.popper.removeAttribute('x-placement'),this.popper.style.position='',this.popper.style.top='',this.popper.style.left='',this.popper.style.right='',this.popper.style.bottom='',this.popper.style.willChange='',this.popper.style[W('transform')]=''),this.disableEventListeners(),this.options.removeOnDestroy&&this.popper.parentNode.removeChild(this.popper),this}function H(e){var t=e.ownerDocument;return t?t.defaultView:window}function A(e,t,o,i){var r='BODY'===e.nodeName,p=r?e.ownerDocument.defaultView:e;p.addEventListener(t,o,{passive:!0}),r||A(n(p.parentNode),t,o,i),i.push(p)}function I(e,t,o,i){o.updateBound=i,H(e).addEventListener('resize',o.updateBound,{passive:!0});var r=n(e);return A(r,'scroll',o.updateBound,o.scrollParents),o.scrollElement=r,o.eventsEnabled=!0,o}function M(){this.state.eventsEnabled||(this.state=I(this.reference,this.options,this.state,this.scheduleUpdate))}function F(e,t){return H(e).removeEventListener('resize',t.updateBound),t.scrollParents.forEach(function(e){e.removeEventListener('scroll',t.updateBound)}),t.updateBound=null,t.scrollParents=[],t.scrollElement=null,t.eventsEnabled=!1,t}function R(){this.state.eventsEnabled&&(cancelAnimationFrame(this.scheduleUpdate),this.state=F(this.reference,this.state))}function U(e){return''!==e&&!isNaN(parseFloat(e))&&isFinite(e)}function Y(e,t){Object.keys(t).forEach(function(o){var n='';-1!==['width','height','top','right','bottom','left'].indexOf(o)&&U(t[o])&&(n='px'),e.style[o]=t[o]+n})}function j(e,t){Object.keys(t).forEach(function(o){var n=t[o];!1===n?e.removeAttribute(o):e.setAttribute(o,t[o])})}function q(e,t,o){var n=D(e,function(e){var o=e.name;return o===t}),i=!!n&&e.some(function(e){return e.name===o&&e.enabled&&e.order<n.order});if(!i){var r='`'+t+'`';console.warn('`'+o+'`'+' modifier is required by '+r+' modifier in order to work, be sure to include it before '+r+'!')}return i}function K(e){return'end'===e?'start':'start'===e?'end':e}function V(e){var t=1<arguments.length&&void 0!==arguments[1]&&arguments[1],o=le.indexOf(e),n=le.slice(o+1).concat(le.slice(0,o));return t?n.reverse():n}function z(e,t,o,n){var i=e.match(/((?:\-|\+)?\d*\.?\d*)(.*)/),r=+i[1],p=i[2];if(!r)return e;if(0===p.indexOf('%')){var s;switch(p){case'%p':s=o;break;case'%':case'%r':default:s=n;}var d=c(s);return d[t]/100*r}if('vh'===p||'vw'===p){var a;return a='vh'===p?Q(document.documentElement.clientHeight,window.innerHeight||0):Q(document.documentElement.clientWidth,window.innerWidth||0),a/100*r}return r}function G(e,t,o,n){var i=[0,0],r=-1!==['right','left'].indexOf(n),p=e.split(/(\+|\-)/).map(function(e){return e.trim()}),s=p.indexOf(D(p,function(e){return-1!==e.search(/,|\s/)}));p[s]&&-1===p[s].indexOf(',')&&console.warn('Offsets separated by white space(s) are deprecated, use a comma (,) instead.');var d=/\s*,\s*|\s+/,a=-1===s?[p]:[p.slice(0,s).concat([p[s].split(d)[0]]),[p[s].split(d)[1]].concat(p.slice(s+1))];return a=a.map(function(e,n){var i=(1===n?!r:r)?'height':'width',p=!1;return e.reduce(function(e,t){return''===e[e.length-1]&&-1!==['+','-'].indexOf(t)?(e[e.length-1]=t,p=!0,e):p?(e[e.length-1]+=t,p=!1,e):e.concat(t)},[]).map(function(e){return z(e,i,t,o)})}),a.forEach(function(e,t){e.forEach(function(o,n){U(o)&&(i[t]+=o*('-'===e[n-1]?-1:1))})}),i}function _(e,t){var o,n=t.offset,i=e.placement,r=e.offsets,p=r.popper,s=r.reference,d=i.split('-')[0];return o=U(+n)?[+n,0]:G(n,p,s,d),'left'===d?(p.top+=o[0],p.left-=o[1]):'right'===d?(p.top+=o[0],p.left+=o[1]):'top'===d?(p.left+=o[0],p.top-=o[1]):'bottom'===d&&(p.left+=o[0],p.top+=o[1]),e.popper=p,e}for(var X=Math.min,J=Math.floor,Q=Math.max,Z='undefined'!=typeof window&&'undefined'!=typeof document,$=['Edge','Trident','Firefox'],ee=0,te=0;te<$.length;te+=1)if(Z&&0<=navigator.userAgent.indexOf($[te])){ee=1;break}var i=Z&&window.Promise,oe=i?function(e){var t=!1;return function(){t||(t=!0,window.Promise.resolve().then(function(){t=!1,e()}))}}:function(e){var t=!1;return function(){t||(t=!0,setTimeout(function(){t=!1,e()},ee))}},ne={},ie=function(){var e=0<arguments.length&&void 0!==arguments[0]?arguments[0]:'all';return(e=e.toString(),ne.hasOwnProperty(e))?ne[e]:('11'===e?ne[e]=-1!==navigator.userAgent.indexOf('Trident'):'10'===e?ne[e]=-1!==navigator.appVersion.indexOf('MSIE 10'):'all'===e?ne[e]=-1!==navigator.userAgent.indexOf('Trident')||-1!==navigator.userAgent.indexOf('MSIE'):void 0,ne.all=ne.all||Object.keys(ne).some(function(e){return ne[e]}),ne[e])},re=function(e,t){if(!(e instanceof t))throw new TypeError('Cannot call a class as a function')},pe=function(){function e(e,t){for(var o,n=0;n<t.length;n++)o=t[n],o.enumerable=o.enumerable||!1,o.configurable=!0,'value'in o&&(o.writable=!0),Object.defineProperty(e,o.key,o)}return function(t,o,n){return o&&e(t.prototype,o),n&&e(t,n),t}}(),se=function(e,t,o){return t in e?Object.defineProperty(e,t,{value:o,enumerable:!0,configurable:!0,writable:!0}):e[t]=o,e},de=Object.assign||function(e){for(var t,o=1;o<arguments.length;o++)for(var n in t=arguments[o],t)Object.prototype.hasOwnProperty.call(t,n)&&(e[n]=t[n]);return e},ae=['auto-start','auto','auto-end','top-start','top','top-end','right-start','right','right-end','bottom-end','bottom','bottom-start','left-end','left','left-start'],le=ae.slice(3),fe={FLIP:'flip',CLOCKWISE:'clockwise',COUNTERCLOCKWISE:'counterclockwise'},me=function(){function t(o,n){var i=this,r=2<arguments.length&&void 0!==arguments[2]?arguments[2]:{};re(this,t),this.scheduleUpdate=function(){return requestAnimationFrame(i.update)},this.update=oe(this.update.bind(this)),this.options=de({},t.Defaults,r),this.state={isDestroyed:!1,isCreated:!1,scrollParents:[]},this.reference=o&&o.jquery?o[0]:o,this.popper=n&&n.jquery?n[0]:n,this.options.modifiers={},Object.keys(de({},t.Defaults.modifiers,r.modifiers)).forEach(function(e){i.options.modifiers[e]=de({},t.Defaults.modifiers[e]||{},r.modifiers?r.modifiers[e]:{})}),this.modifiers=Object.keys(this.options.modifiers).map(function(e){return de({name:e},i.options.modifiers[e])}).sort(function(e,t){return e.order-t.order}),this.modifiers.forEach(function(t){t.enabled&&e(t.onLoad)&&t.onLoad(i.reference,i.popper,i.options,t,i.state)}),this.update();var p=this.options.eventsEnabled;p&&this.enableEventListeners(),this.state.eventsEnabled=p}return pe(t,[{key:'update',value:function(){return k.call(this)}},{key:'destroy',value:function(){return B.call(this)}},{key:'enableEventListeners',value:function(){return M.call(this)}},{key:'disableEventListeners',value:function(){return R.call(this)}}]),t}();return me.Utils=('undefined'==typeof window?global:window).PopperUtils,me.placements=ae,me.Defaults={placement:'bottom',positionFixed:!1,eventsEnabled:!0,removeOnDestroy:!1,onCreate:function(){},onUpdate:function(){},modifiers:{shift:{order:100,enabled:!0,fn:function(e){var t=e.placement,o=t.split('-')[0],n=t.split('-')[1];if(n){var i=e.offsets,r=i.reference,p=i.popper,s=-1!==['bottom','top'].indexOf(o),d=s?'left':'top',a=s?'width':'height',l={start:se({},d,r[d]),end:se({},d,r[d]+r[a]-p[a])};e.offsets.popper=de({},p,l[n])}return e}},offset:{order:200,enabled:!0,fn:_,offset:0},preventOverflow:{order:300,enabled:!0,fn:function(e,t){var o=t.boundariesElement||r(e.instance.popper);e.instance.reference===o&&(o=r(o));var n=E(e.instance.popper,e.instance.reference,t.padding,o,e.positionFixed);t.boundaries=n;var i=t.priority,p=e.offsets.popper,s={primary:function(e){var o=p[e];return p[e]<n[e]&&!t.escapeWithReference&&(o=Q(p[e],n[e])),se({},e,o)},secondary:function(e){var o='right'===e?'left':'top',i=p[o];return p[e]>n[e]&&!t.escapeWithReference&&(i=X(p[o],n[e]-('right'===e?p.width:p.height))),se({},o,i)}};return i.forEach(function(e){var t=-1===['left','top'].indexOf(e)?'secondary':'primary';p=de({},p,s[t](e))}),e.offsets.popper=p,e},priority:['left','right','top','bottom'],padding:5,boundariesElement:'scrollParent'},keepTogether:{order:400,enabled:!0,fn:function(e){var t=e.offsets,o=t.popper,n=t.reference,i=e.placement.split('-')[0],r=J,p=-1!==['top','bottom'].indexOf(i),s=p?'right':'bottom',d=p?'left':'top',a=p?'width':'height';return o[s]<r(n[d])&&(e.offsets.popper[d]=r(n[d])-o[a]),o[d]>r(n[s])&&(e.offsets.popper[d]=r(n[s])),e}},arrow:{order:500,enabled:!0,fn:function(e,o){var n;if(!q(e.instance.modifiers,'arrow','keepTogether'))return e;var i=o.element;if('string'==typeof i){if(i=e.instance.popper.querySelector(i),!i)return e;}else if(!e.instance.popper.contains(i))return console.warn('WARNING: `arrow.element` must be child of its popper element!'),e;var r=e.placement.split('-')[0],p=e.offsets,s=p.popper,d=p.reference,a=-1!==['left','right'].indexOf(r),l=a?'height':'width',f=a?'Top':'Left',m=f.toLowerCase(),h=a?'left':'top',g=a?'bottom':'right',u=L(i)[l];d[g]-u<s[m]&&(e.offsets.popper[m]-=s[m]-(d[g]-u)),d[m]+u>s[g]&&(e.offsets.popper[m]+=d[m]+u-s[g]),e.offsets.popper=c(e.offsets.popper);var b=d[m]+d[l]/2-u/2,y=t(e.instance.popper),w=parseFloat(y['margin'+f],10),E=parseFloat(y['border'+f+'Width'],10),v=b-e.offsets.popper[m]-w-E;return v=Q(X(s[l]-u,v),0),e.arrowElement=i,e.offsets.arrow=(n={},se(n,m,Math.round(v)),se(n,h,''),n),e},element:'[x-arrow]'},flip:{order:600,enabled:!0,fn:function(e,t){if(P(e.instance.modifiers,'inner'))return e;if(e.flipped&&e.placement===e.originalPlacement)return e;var o=E(e.instance.popper,e.instance.reference,t.padding,t.boundariesElement,e.positionFixed),n=e.placement.split('-')[0],i=S(n),r=e.placement.split('-')[1]||'',p=[];switch(t.behavior){case fe.FLIP:p=[n,i];break;case fe.CLOCKWISE:p=V(n);break;case fe.COUNTERCLOCKWISE:p=V(n,!0);break;default:p=t.behavior;}return p.forEach(function(s,d){if(n!==s||p.length===d+1)return e;n=e.placement.split('-')[0],i=S(n);var a=e.offsets.popper,l=e.offsets.reference,f=J,m='left'===n&&f(a.right)>f(l.left)||'right'===n&&f(a.left)<f(l.right)||'top'===n&&f(a.bottom)>f(l.top)||'bottom'===n&&f(a.top)<f(l.bottom),h=f(a.left)<f(o.left),c=f(a.right)>f(o.right),g=f(a.top)<f(o.top),u=f(a.bottom)>f(o.bottom),b='left'===n&&h||'right'===n&&c||'top'===n&&g||'bottom'===n&&u,y=-1!==['top','bottom'].indexOf(n),w=!!t.flipVariations&&(y&&'start'===r&&h||y&&'end'===r&&c||!y&&'start'===r&&g||!y&&'end'===r&&u);(m||b||w)&&(e.flipped=!0,(m||b)&&(n=p[d+1]),w&&(r=K(r)),e.placement=n+(r?'-'+r:''),e.offsets.popper=de({},e.offsets.popper,T(e.instance.popper,e.offsets.reference,e.placement)),e=N(e.instance.modifiers,e,'flip'))}),e},behavior:'flip',padding:5,boundariesElement:'viewport'},inner:{order:700,enabled:!1,fn:function(e){var t=e.placement,o=t.split('-')[0],n=e.offsets,i=n.popper,r=n.reference,p=-1!==['left','right'].indexOf(o),s=-1===['top','left'].indexOf(o);return i[p?'left':'top']=r[o]-(s?i[p?'width':'height']:0),e.placement=S(t),e.offsets.popper=c(i),e}},hide:{order:800,enabled:!0,fn:function(e){if(!q(e.instance.modifiers,'hide','preventOverflow'))return e;var t=e.offsets.reference,o=D(e.instance.modifiers,function(e){return'preventOverflow'===e.name}).boundaries;if(t.bottom<o.top||t.left>o.right||t.top>o.bottom||t.right<o.left){if(!0===e.hide)return e;e.hide=!0,e.attributes['x-out-of-boundaries']=''}else{if(!1===e.hide)return e;e.hide=!1,e.attributes['x-out-of-boundaries']=!1}return e}},computeStyle:{order:850,enabled:!0,fn:function(e,t){var o=t.x,n=t.y,i=e.offsets.popper,p=D(e.instance.modifiers,function(e){return'applyStyle'===e.name}).gpuAcceleration;void 0!==p&&console.warn('WARNING: `gpuAcceleration` option moved to `computeStyle` modifier and will not be supported in future versions of Popper.js!');var s,d,a=void 0===p?t.gpuAcceleration:p,l=r(e.instance.popper),f=g(l),m={position:i.position},h={left:J(i.left),top:J(i.top),bottom:J(i.bottom),right:J(i.right)},c='bottom'===o?'top':'bottom',u='right'===n?'left':'right',b=W('transform');if(d='bottom'==c?-f.height+h.bottom:h.top,s='right'==u?-f.width+h.right:h.left,a&&b)m[b]='translate3d('+s+'px, '+d+'px, 0)',m[c]=0,m[u]=0,m.willChange='transform';else{var y='bottom'==c?-1:1,w='right'==u?-1:1;m[c]=d*y,m[u]=s*w,m.willChange=c+', '+u}var E={"x-placement":e.placement};return e.attributes=de({},E,e.attributes),e.styles=de({},m,e.styles),e.arrowStyles=de({},e.offsets.arrow,e.arrowStyles),e},gpuAcceleration:!0,x:'bottom',y:'right'},applyStyle:{order:900,enabled:!0,fn:function(e){return Y(e.instance.popper,e.styles),j(e.instance.popper,e.attributes),e.arrowElement&&Object.keys(e.arrowStyles).length&&Y(e.arrowElement,e.arrowStyles),e},onLoad:function(e,t,o,n,i){var r=O(i,t,e,o.positionFixed),p=x(o.placement,r,t,e,o.modifiers.flip.boundariesElement,o.modifiers.flip.padding);return t.setAttribute('x-placement',p),Y(t,{position:o.positionFixed?'fixed':'absolute'}),o},gpuAcceleration:void 0}}},me});
//# sourceMappingURL=popper.min.js.map

/*!
  * Bootstrap v4.1.0 (https://getbootstrap.com/)
  * Copyright 2011-2018 The Bootstrap Authors (https://github.com/twbs/bootstrap/graphs/contributors)
  * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
  */
!function(t,e){"object"==typeof exports&&"undefined"!=typeof module?e(exports,require("jquery"),require("popper.js")):"function"==typeof define&&define.amd?define(["exports","jquery","popper.js"],e):e(t.bootstrap={},t.jQuery,t.Popper)}(this,function(t,e,c){"use strict";function i(t,e){for(var n=0;n<e.length;n++){var i=e[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(t,i.key,i)}}function o(t,e,n){return e&&i(t.prototype,e),n&&i(t,n),t}function h(r){for(var t=1;t<arguments.length;t++){var s=null!=arguments[t]?arguments[t]:{},e=Object.keys(s);"function"==typeof Object.getOwnPropertySymbols&&(e=e.concat(Object.getOwnPropertySymbols(s).filter(function(t){return Object.getOwnPropertyDescriptor(s,t).enumerable}))),e.forEach(function(t){var e,n,i;e=r,i=s[n=t],n in e?Object.defineProperty(e,n,{value:i,enumerable:!0,configurable:!0,writable:!0}):e[n]=i})}return r}e=e&&e.hasOwnProperty("default")?e.default:e,c=c&&c.hasOwnProperty("default")?c.default:c;var r,n,s,a,l,u,f,d,_,g,m,p,v,E,y,T,C,I,A,D,b,S,w,N,O,k,P,L,j,R,H,W,M,x,U,K,F,V,Q,B,Y,G,q,z,X,J,Z,$,tt,et,nt,it,rt,st,ot,at,lt,ht,ct,ut,ft,dt,_t,gt,mt,pt,vt,Et,yt,Tt,Ct,It,At,Dt,bt,St,wt,Nt,Ot,kt,Pt,Lt,jt,Rt,Ht,Wt,Mt,xt,Ut,Kt,Ft,Vt,Qt,Bt,Yt,Gt,qt,zt,Xt,Jt,Zt,$t,te,ee,ne,ie,re,se,oe,ae,le,he,ce,ue,fe,de,_e,ge,me,pe,ve,Ee,ye,Te,Ce,Ie,Ae,De,be,Se,we,Ne,Oe,ke,Pe,Le,je,Re,He,We,Me,xe,Ue,Ke,Fe,Ve,Qe,Be,Ye,Ge,qe,ze,Xe,Je,Ze,$e,tn,en,nn,rn,sn,on,an,ln,hn,cn,un,fn,dn,_n,gn,mn,pn,vn,En,yn,Tn,Cn=function(i){var e="transitionend";function t(t){var e=this,n=!1;return i(this).one(l.TRANSITION_END,function(){n=!0}),setTimeout(function(){n||l.triggerTransitionEnd(e)},t),this}var l={TRANSITION_END:"bsTransitionEnd",getUID:function(t){for(;t+=~~(1e6*Math.random()),document.getElementById(t););return t},getSelectorFromElement:function(t){var e=t.getAttribute("data-target");e&&"#"!==e||(e=t.getAttribute("href")||"");try{return 0<i(document).find(e).length?e:null}catch(t){return null}},getTransitionDurationFromElement:function(t){if(!t)return 0;var e=i(t).css("transition-duration");return parseFloat(e)?(e=e.split(",")[0],1e3*parseFloat(e)):0},reflow:function(t){return t.offsetHeight},triggerTransitionEnd:function(t){i(t).trigger(e)},supportsTransitionEnd:function(){return Boolean(e)},isElement:function(t){return(t[0]||t).nodeType},typeCheckConfig:function(t,e,n){for(var i in n)if(Object.prototype.hasOwnProperty.call(n,i)){var r=n[i],s=e[i],o=s&&l.isElement(s)?"element":(a=s,{}.toString.call(a).match(/\s([a-z]+)/i)[1].toLowerCase());if(!new RegExp(r).test(o))throw new Error(t.toUpperCase()+': Option "'+i+'" provided type "'+o+'" but expected type "'+r+'".')}var a}};return i.fn.emulateTransitionEnd=t,i.event.special[l.TRANSITION_END]={bindType:e,delegateType:e,handle:function(t){if(i(t.target).is(this))return t.handleObj.handler.apply(this,arguments)}},l}(e),In=(n="alert",a="."+(s="bs.alert"),l=(r=e).fn[n],u={CLOSE:"close"+a,CLOSED:"closed"+a,CLICK_DATA_API:"click"+a+".data-api"},f="alert",d="fade",_="show",g=function(){function i(t){this._element=t}var t=i.prototype;return t.close=function(t){t=t||this._element;var e=this._getRootElement(t);this._triggerCloseEvent(e).isDefaultPrevented()||this._removeElement(e)},t.dispose=function(){r.removeData(this._element,s),this._element=null},t._getRootElement=function(t){var e=Cn.getSelectorFromElement(t),n=!1;return e&&(n=r(e)[0]),n||(n=r(t).closest("."+f)[0]),n},t._triggerCloseEvent=function(t){var e=r.Event(u.CLOSE);return r(t).trigger(e),e},t._removeElement=function(e){var n=this;if(r(e).removeClass(_),r(e).hasClass(d)){var t=Cn.getTransitionDurationFromElement(e);r(e).one(Cn.TRANSITION_END,function(t){return n._destroyElement(e,t)}).emulateTransitionEnd(t)}else this._destroyElement(e)},t._destroyElement=function(t){r(t).detach().trigger(u.CLOSED).remove()},i._jQueryInterface=function(n){return this.each(function(){var t=r(this),e=t.data(s);e||(e=new i(this),t.data(s,e)),"close"===n&&e[n](this)})},i._handleDismiss=function(e){return function(t){t&&t.preventDefault(),e.close(this)}},o(i,null,[{key:"VERSION",get:function(){return"4.1.0"}}]),i}(),r(document).on(u.CLICK_DATA_API,'[data-dismiss="alert"]',g._handleDismiss(new g)),r.fn[n]=g._jQueryInterface,r.fn[n].Constructor=g,r.fn[n].noConflict=function(){return r.fn[n]=l,g._jQueryInterface},g),An=(p="button",E="."+(v="bs.button"),y=".data-api",T=(m=e).fn[p],C="active",I="btn",D='[data-toggle^="button"]',b='[data-toggle="buttons"]',S="input",w=".active",N=".btn",O={CLICK_DATA_API:"click"+E+y,FOCUS_BLUR_DATA_API:(A="focus")+E+y+" blur"+E+y},k=function(){function n(t){this._element=t}var t=n.prototype;return t.toggle=function(){var t=!0,e=!0,n=m(this._element).closest(b)[0];if(n){var i=m(this._element).find(S)[0];if(i){if("radio"===i.type)if(i.checked&&m(this._element).hasClass(C))t=!1;else{var r=m(n).find(w)[0];r&&m(r).removeClass(C)}if(t){if(i.hasAttribute("disabled")||n.hasAttribute("disabled")||i.classList.contains("disabled")||n.classList.contains("disabled"))return;i.checked=!m(this._element).hasClass(C),m(i).trigger("change")}i.focus(),e=!1}}e&&this._element.setAttribute("aria-pressed",!m(this._element).hasClass(C)),t&&m(this._element).toggleClass(C)},t.dispose=function(){m.removeData(this._element,v),this._element=null},n._jQueryInterface=function(e){return this.each(function(){var t=m(this).data(v);t||(t=new n(this),m(this).data(v,t)),"toggle"===e&&t[e]()})},o(n,null,[{key:"VERSION",get:function(){return"4.1.0"}}]),n}(),m(document).on(O.CLICK_DATA_API,D,function(t){t.preventDefault();var e=t.target;m(e).hasClass(I)||(e=m(e).closest(N)),k._jQueryInterface.call(m(e),"toggle")}).on(O.FOCUS_BLUR_DATA_API,D,function(t){var e=m(t.target).closest(N)[0];m(e).toggleClass(A,/^focus(in)?$/.test(t.type))}),m.fn[p]=k._jQueryInterface,m.fn[p].Constructor=k,m.fn[p].noConflict=function(){return m.fn[p]=T,k._jQueryInterface},k),Dn=(L="carousel",R="."+(j="bs.carousel"),H=".data-api",W=(P=e).fn[L],M={interval:5e3,keyboard:!0,slide:!1,pause:"hover",wrap:!0},x={interval:"(number|boolean)",keyboard:"boolean",slide:"(boolean|string)",pause:"(string|boolean)",wrap:"boolean"},U="next",K="prev",F="left",V="right",Q={SLIDE:"slide"+R,SLID:"slid"+R,KEYDOWN:"keydown"+R,MOUSEENTER:"mouseenter"+R,MOUSELEAVE:"mouseleave"+R,TOUCHEND:"touchend"+R,LOAD_DATA_API:"load"+R+H,CLICK_DATA_API:"click"+R+H},B="carousel",Y="active",G="slide",q="carousel-item-right",z="carousel-item-left",X="carousel-item-next",J="carousel-item-prev",Z={ACTIVE:".active",ACTIVE_ITEM:".active.carousel-item",ITEM:".carousel-item",NEXT_PREV:".carousel-item-next, .carousel-item-prev",INDICATORS:".carousel-indicators",DATA_SLIDE:"[data-slide], [data-slide-to]",DATA_RIDE:'[data-ride="carousel"]'},$=function(){function s(t,e){this._items=null,this._interval=null,this._activeElement=null,this._isPaused=!1,this._isSliding=!1,this.touchTimeout=null,this._config=this._getConfig(e),this._element=P(t)[0],this._indicatorsElement=P(this._element).find(Z.INDICATORS)[0],this._addEventListeners()}var t=s.prototype;return t.next=function(){this._isSliding||this._slide(U)},t.nextWhenVisible=function(){!document.hidden&&P(this._element).is(":visible")&&"hidden"!==P(this._element).css("visibility")&&this.next()},t.prev=function(){this._isSliding||this._slide(K)},t.pause=function(t){t||(this._isPaused=!0),P(this._element).find(Z.NEXT_PREV)[0]&&(Cn.triggerTransitionEnd(this._element),this.cycle(!0)),clearInterval(this._interval),this._interval=null},t.cycle=function(t){t||(this._isPaused=!1),this._interval&&(clearInterval(this._interval),this._interval=null),this._config.interval&&!this._isPaused&&(this._interval=setInterval((document.visibilityState?this.nextWhenVisible:this.next).bind(this),this._config.interval))},t.to=function(t){var e=this;this._activeElement=P(this._element).find(Z.ACTIVE_ITEM)[0];var n=this._getItemIndex(this._activeElement);if(!(t>this._items.length-1||t<0))if(this._isSliding)P(this._element).one(Q.SLID,function(){return e.to(t)});else{if(n===t)return this.pause(),void this.cycle();var i=n<t?U:K;this._slide(i,this._items[t])}},t.dispose=function(){P(this._element).off(R),P.removeData(this._element,j),this._items=null,this._config=null,this._element=null,this._interval=null,this._isPaused=null,this._isSliding=null,this._activeElement=null,this._indicatorsElement=null},t._getConfig=function(t){return t=h({},M,t),Cn.typeCheckConfig(L,t,x),t},t._addEventListeners=function(){var e=this;this._config.keyboard&&P(this._element).on(Q.KEYDOWN,function(t){return e._keydown(t)}),"hover"===this._config.pause&&(P(this._element).on(Q.MOUSEENTER,function(t){return e.pause(t)}).on(Q.MOUSELEAVE,function(t){return e.cycle(t)}),"ontouchstart"in document.documentElement&&P(this._element).on(Q.TOUCHEND,function(){e.pause(),e.touchTimeout&&clearTimeout(e.touchTimeout),e.touchTimeout=setTimeout(function(t){return e.cycle(t)},500+e._config.interval)}))},t._keydown=function(t){if(!/input|textarea/i.test(t.target.tagName))switch(t.which){case 37:t.preventDefault(),this.prev();break;case 39:t.preventDefault(),this.next()}},t._getItemIndex=function(t){return this._items=P.makeArray(P(t).parent().find(Z.ITEM)),this._items.indexOf(t)},t._getItemByDirection=function(t,e){var n=t===U,i=t===K,r=this._getItemIndex(e),s=this._items.length-1;if((i&&0===r||n&&r===s)&&!this._config.wrap)return e;var o=(r+(t===K?-1:1))%this._items.length;return-1===o?this._items[this._items.length-1]:this._items[o]},t._triggerSlideEvent=function(t,e){var n=this._getItemIndex(t),i=this._getItemIndex(P(this._element).find(Z.ACTIVE_ITEM)[0]),r=P.Event(Q.SLIDE,{relatedTarget:t,direction:e,from:i,to:n});return P(this._element).trigger(r),r},t._setActiveIndicatorElement=function(t){if(this._indicatorsElement){P(this._indicatorsElement).find(Z.ACTIVE).removeClass(Y);var e=this._indicatorsElement.children[this._getItemIndex(t)];e&&P(e).addClass(Y)}},t._slide=function(t,e){var n,i,r,s=this,o=P(this._element).find(Z.ACTIVE_ITEM)[0],a=this._getItemIndex(o),l=e||o&&this._getItemByDirection(t,o),h=this._getItemIndex(l),c=Boolean(this._interval);if(t===U?(n=z,i=X,r=F):(n=q,i=J,r=V),l&&P(l).hasClass(Y))this._isSliding=!1;else if(!this._triggerSlideEvent(l,r).isDefaultPrevented()&&o&&l){this._isSliding=!0,c&&this.pause(),this._setActiveIndicatorElement(l);var u=P.Event(Q.SLID,{relatedTarget:l,direction:r,from:a,to:h});if(P(this._element).hasClass(G)){P(l).addClass(i),Cn.reflow(l),P(o).addClass(n),P(l).addClass(n);var f=Cn.getTransitionDurationFromElement(o);P(o).one(Cn.TRANSITION_END,function(){P(l).removeClass(n+" "+i).addClass(Y),P(o).removeClass(Y+" "+i+" "+n),s._isSliding=!1,setTimeout(function(){return P(s._element).trigger(u)},0)}).emulateTransitionEnd(f)}else P(o).removeClass(Y),P(l).addClass(Y),this._isSliding=!1,P(this._element).trigger(u);c&&this.cycle()}},s._jQueryInterface=function(i){return this.each(function(){var t=P(this).data(j),e=h({},M,P(this).data());"object"==typeof i&&(e=h({},e,i));var n="string"==typeof i?i:e.slide;if(t||(t=new s(this,e),P(this).data(j,t)),"number"==typeof i)t.to(i);else if("string"==typeof n){if("undefined"==typeof t[n])throw new TypeError('No method named "'+n+'"');t[n]()}else e.interval&&(t.pause(),t.cycle())})},s._dataApiClickHandler=function(t){var e=Cn.getSelectorFromElement(this);if(e){var n=P(e)[0];if(n&&P(n).hasClass(B)){var i=h({},P(n).data(),P(this).data()),r=this.getAttribute("data-slide-to");r&&(i.interval=!1),s._jQueryInterface.call(P(n),i),r&&P(n).data(j).to(r),t.preventDefault()}}},o(s,null,[{key:"VERSION",get:function(){return"4.1.0"}},{key:"Default",get:function(){return M}}]),s}(),P(document).on(Q.CLICK_DATA_API,Z.DATA_SLIDE,$._dataApiClickHandler),P(window).on(Q.LOAD_DATA_API,function(){P(Z.DATA_RIDE).each(function(){var t=P(this);$._jQueryInterface.call(t,t.data())})}),P.fn[L]=$._jQueryInterface,P.fn[L].Constructor=$,P.fn[L].noConflict=function(){return P.fn[L]=W,$._jQueryInterface},$),bn=(et="collapse",it="."+(nt="bs.collapse"),rt=(tt=e).fn[et],st={toggle:!0,parent:""},ot={toggle:"boolean",parent:"(string|element)"},at={SHOW:"show"+it,SHOWN:"shown"+it,HIDE:"hide"+it,HIDDEN:"hidden"+it,CLICK_DATA_API:"click"+it+".data-api"},lt="show",ht="collapse",ct="collapsing",ut="collapsed",ft="width",dt="height",_t={ACTIVES:".show, .collapsing",DATA_TOGGLE:'[data-toggle="collapse"]'},gt=function(){function a(t,e){this._isTransitioning=!1,this._element=t,this._config=this._getConfig(e),this._triggerArray=tt.makeArray(tt('[data-toggle="collapse"][href="#'+t.id+'"],[data-toggle="collapse"][data-target="#'+t.id+'"]'));for(var n=tt(_t.DATA_TOGGLE),i=0;i<n.length;i++){var r=n[i],s=Cn.getSelectorFromElement(r);null!==s&&0<tt(s).filter(t).length&&(this._selector=s,this._triggerArray.push(r))}this._parent=this._config.parent?this._getParent():null,this._config.parent||this._addAriaAndCollapsedClass(this._element,this._triggerArray),this._config.toggle&&this.toggle()}var t=a.prototype;return t.toggle=function(){tt(this._element).hasClass(lt)?this.hide():this.show()},t.show=function(){var t,e,n=this;if(!this._isTransitioning&&!tt(this._element).hasClass(lt)&&(this._parent&&0===(t=tt.makeArray(tt(this._parent).find(_t.ACTIVES).filter('[data-parent="'+this._config.parent+'"]'))).length&&(t=null),!(t&&(e=tt(t).not(this._selector).data(nt))&&e._isTransitioning))){var i=tt.Event(at.SHOW);if(tt(this._element).trigger(i),!i.isDefaultPrevented()){t&&(a._jQueryInterface.call(tt(t).not(this._selector),"hide"),e||tt(t).data(nt,null));var r=this._getDimension();tt(this._element).removeClass(ht).addClass(ct),(this._element.style[r]=0)<this._triggerArray.length&&tt(this._triggerArray).removeClass(ut).attr("aria-expanded",!0),this.setTransitioning(!0);var s="scroll"+(r[0].toUpperCase()+r.slice(1)),o=Cn.getTransitionDurationFromElement(this._element);tt(this._element).one(Cn.TRANSITION_END,function(){tt(n._element).removeClass(ct).addClass(ht).addClass(lt),n._element.style[r]="",n.setTransitioning(!1),tt(n._element).trigger(at.SHOWN)}).emulateTransitionEnd(o),this._element.style[r]=this._element[s]+"px"}}},t.hide=function(){var t=this;if(!this._isTransitioning&&tt(this._element).hasClass(lt)){var e=tt.Event(at.HIDE);if(tt(this._element).trigger(e),!e.isDefaultPrevented()){var n=this._getDimension();if(this._element.style[n]=this._element.getBoundingClientRect()[n]+"px",Cn.reflow(this._element),tt(this._element).addClass(ct).removeClass(ht).removeClass(lt),0<this._triggerArray.length)for(var i=0;i<this._triggerArray.length;i++){var r=this._triggerArray[i],s=Cn.getSelectorFromElement(r);if(null!==s)tt(s).hasClass(lt)||tt(r).addClass(ut).attr("aria-expanded",!1)}this.setTransitioning(!0);this._element.style[n]="";var o=Cn.getTransitionDurationFromElement(this._element);tt(this._element).one(Cn.TRANSITION_END,function(){t.setTransitioning(!1),tt(t._element).removeClass(ct).addClass(ht).trigger(at.HIDDEN)}).emulateTransitionEnd(o)}}},t.setTransitioning=function(t){this._isTransitioning=t},t.dispose=function(){tt.removeData(this._element,nt),this._config=null,this._parent=null,this._element=null,this._triggerArray=null,this._isTransitioning=null},t._getConfig=function(t){return(t=h({},st,t)).toggle=Boolean(t.toggle),Cn.typeCheckConfig(et,t,ot),t},t._getDimension=function(){return tt(this._element).hasClass(ft)?ft:dt},t._getParent=function(){var n=this,t=null;Cn.isElement(this._config.parent)?(t=this._config.parent,"undefined"!=typeof this._config.parent.jquery&&(t=this._config.parent[0])):t=tt(this._config.parent)[0];var e='[data-toggle="collapse"][data-parent="'+this._config.parent+'"]';return tt(t).find(e).each(function(t,e){n._addAriaAndCollapsedClass(a._getTargetFromElement(e),[e])}),t},t._addAriaAndCollapsedClass=function(t,e){if(t){var n=tt(t).hasClass(lt);0<e.length&&tt(e).toggleClass(ut,!n).attr("aria-expanded",n)}},a._getTargetFromElement=function(t){var e=Cn.getSelectorFromElement(t);return e?tt(e)[0]:null},a._jQueryInterface=function(i){return this.each(function(){var t=tt(this),e=t.data(nt),n=h({},st,t.data(),"object"==typeof i&&i);if(!e&&n.toggle&&/show|hide/.test(i)&&(n.toggle=!1),e||(e=new a(this,n),t.data(nt,e)),"string"==typeof i){if("undefined"==typeof e[i])throw new TypeError('No method named "'+i+'"');e[i]()}})},o(a,null,[{key:"VERSION",get:function(){return"4.1.0"}},{key:"Default",get:function(){return st}}]),a}(),tt(document).on(at.CLICK_DATA_API,_t.DATA_TOGGLE,function(t){"A"===t.currentTarget.tagName&&t.preventDefault();var n=tt(this),e=Cn.getSelectorFromElement(this);tt(e).each(function(){var t=tt(this),e=t.data(nt)?"toggle":n.data();gt._jQueryInterface.call(t,e)})}),tt.fn[et]=gt._jQueryInterface,tt.fn[et].Constructor=gt,tt.fn[et].noConflict=function(){return tt.fn[et]=rt,gt._jQueryInterface},gt),Sn=(pt="dropdown",Et="."+(vt="bs.dropdown"),yt=".data-api",Tt=(mt=e).fn[pt],Ct=new RegExp("38|40|27"),It={HIDE:"hide"+Et,HIDDEN:"hidden"+Et,SHOW:"show"+Et,SHOWN:"shown"+Et,CLICK:"click"+Et,CLICK_DATA_API:"click"+Et+yt,KEYDOWN_DATA_API:"keydown"+Et+yt,KEYUP_DATA_API:"keyup"+Et+yt},At="disabled",Dt="show",bt="dropup",St="dropright",wt="dropleft",Nt="dropdown-menu-right",Ot="position-static",kt='[data-toggle="dropdown"]',Pt=".dropdown form",Lt=".dropdown-menu",jt=".navbar-nav",Rt=".dropdown-menu .dropdown-item:not(.disabled):not(:disabled)",Ht="top-start",Wt="top-end",Mt="bottom-start",xt="bottom-end",Ut="right-start",Kt="left-start",Ft={offset:0,flip:!0,boundary:"scrollParent",reference:"toggle",display:"dynamic"},Vt={offset:"(number|string|function)",flip:"boolean",boundary:"(string|element)",reference:"(string|element)",display:"string"},Qt=function(){function l(t,e){this._element=t,this._popper=null,this._config=this._getConfig(e),this._menu=this._getMenuElement(),this._inNavbar=this._detectNavbar(),this._addEventListeners()}var t=l.prototype;return t.toggle=function(){if(!this._element.disabled&&!mt(this._element).hasClass(At)){var t=l._getParentFromElement(this._element),e=mt(this._menu).hasClass(Dt);if(l._clearMenus(),!e){var n={relatedTarget:this._element},i=mt.Event(It.SHOW,n);if(mt(t).trigger(i),!i.isDefaultPrevented()){if(!this._inNavbar){if("undefined"==typeof c)throw new TypeError("Bootstrap dropdown require Popper.js (https://popper.js.org)");var r=this._element;"parent"===this._config.reference?r=t:Cn.isElement(this._config.reference)&&(r=this._config.reference,"undefined"!=typeof this._config.reference.jquery&&(r=this._config.reference[0])),"scrollParent"!==this._config.boundary&&mt(t).addClass(Ot),this._popper=new c(r,this._menu,this._getPopperConfig())}"ontouchstart"in document.documentElement&&0===mt(t).closest(jt).length&&mt(document.body).children().on("mouseover",null,mt.noop),this._element.focus(),this._element.setAttribute("aria-expanded",!0),mt(this._menu).toggleClass(Dt),mt(t).toggleClass(Dt).trigger(mt.Event(It.SHOWN,n))}}}},t.dispose=function(){mt.removeData(this._element,vt),mt(this._element).off(Et),this._element=null,(this._menu=null)!==this._popper&&(this._popper.destroy(),this._popper=null)},t.update=function(){this._inNavbar=this._detectNavbar(),null!==this._popper&&this._popper.scheduleUpdate()},t._addEventListeners=function(){var e=this;mt(this._element).on(It.CLICK,function(t){t.preventDefault(),t.stopPropagation(),e.toggle()})},t._getConfig=function(t){return t=h({},this.constructor.Default,mt(this._element).data(),t),Cn.typeCheckConfig(pt,t,this.constructor.DefaultType),t},t._getMenuElement=function(){if(!this._menu){var t=l._getParentFromElement(this._element);this._menu=mt(t).find(Lt)[0]}return this._menu},t._getPlacement=function(){var t=mt(this._element).parent(),e=Mt;return t.hasClass(bt)?(e=Ht,mt(this._menu).hasClass(Nt)&&(e=Wt)):t.hasClass(St)?e=Ut:t.hasClass(wt)?e=Kt:mt(this._menu).hasClass(Nt)&&(e=xt),e},t._detectNavbar=function(){return 0<mt(this._element).closest(".navbar").length},t._getPopperConfig=function(){var e=this,t={};"function"==typeof this._config.offset?t.fn=function(t){return t.offsets=h({},t.offsets,e._config.offset(t.offsets)||{}),t}:t.offset=this._config.offset;var n={placement:this._getPlacement(),modifiers:{offset:t,flip:{enabled:this._config.flip},preventOverflow:{boundariesElement:this._config.boundary}}};return"static"===this._config.display&&(n.modifiers.applyStyle={enabled:!1}),n},l._jQueryInterface=function(e){return this.each(function(){var t=mt(this).data(vt);if(t||(t=new l(this,"object"==typeof e?e:null),mt(this).data(vt,t)),"string"==typeof e){if("undefined"==typeof t[e])throw new TypeError('No method named "'+e+'"');t[e]()}})},l._clearMenus=function(t){if(!t||3!==t.which&&("keyup"!==t.type||9===t.which))for(var e=mt.makeArray(mt(kt)),n=0;n<e.length;n++){var i=l._getParentFromElement(e[n]),r=mt(e[n]).data(vt),s={relatedTarget:e[n]};if(r){var o=r._menu;if(mt(i).hasClass(Dt)&&!(t&&("click"===t.type&&/input|textarea/i.test(t.target.tagName)||"keyup"===t.type&&9===t.which)&&mt.contains(i,t.target))){var a=mt.Event(It.HIDE,s);mt(i).trigger(a),a.isDefaultPrevented()||("ontouchstart"in document.documentElement&&mt(document.body).children().off("mouseover",null,mt.noop),e[n].setAttribute("aria-expanded","false"),mt(o).removeClass(Dt),mt(i).removeClass(Dt).trigger(mt.Event(It.HIDDEN,s)))}}}},l._getParentFromElement=function(t){var e,n=Cn.getSelectorFromElement(t);return n&&(e=mt(n)[0]),e||t.parentNode},l._dataApiKeydownHandler=function(t){if((/input|textarea/i.test(t.target.tagName)?!(32===t.which||27!==t.which&&(40!==t.which&&38!==t.which||mt(t.target).closest(Lt).length)):Ct.test(t.which))&&(t.preventDefault(),t.stopPropagation(),!this.disabled&&!mt(this).hasClass(At))){var e=l._getParentFromElement(this),n=mt(e).hasClass(Dt);if((n||27===t.which&&32===t.which)&&(!n||27!==t.which&&32!==t.which)){var i=mt(e).find(Rt).get();if(0!==i.length){var r=i.indexOf(t.target);38===t.which&&0<r&&r--,40===t.which&&r<i.length-1&&r++,r<0&&(r=0),i[r].focus()}}else{if(27===t.which){var s=mt(e).find(kt)[0];mt(s).trigger("focus")}mt(this).trigger("click")}}},o(l,null,[{key:"VERSION",get:function(){return"4.1.0"}},{key:"Default",get:function(){return Ft}},{key:"DefaultType",get:function(){return Vt}}]),l}(),mt(document).on(It.KEYDOWN_DATA_API,kt,Qt._dataApiKeydownHandler).on(It.KEYDOWN_DATA_API,Lt,Qt._dataApiKeydownHandler).on(It.CLICK_DATA_API+" "+It.KEYUP_DATA_API,Qt._clearMenus).on(It.CLICK_DATA_API,kt,function(t){t.preventDefault(),t.stopPropagation(),Qt._jQueryInterface.call(mt(this),"toggle")}).on(It.CLICK_DATA_API,Pt,function(t){t.stopPropagation()}),mt.fn[pt]=Qt._jQueryInterface,mt.fn[pt].Constructor=Qt,mt.fn[pt].noConflict=function(){return mt.fn[pt]=Tt,Qt._jQueryInterface},Qt),wn=(Yt="modal",qt="."+(Gt="bs.modal"),zt=(Bt=e).fn[Yt],Xt={backdrop:!0,keyboard:!0,focus:!0,show:!0},Jt={backdrop:"(boolean|string)",keyboard:"boolean",focus:"boolean",show:"boolean"},Zt={HIDE:"hide"+qt,HIDDEN:"hidden"+qt,SHOW:"show"+qt,SHOWN:"shown"+qt,FOCUSIN:"focusin"+qt,RESIZE:"resize"+qt,CLICK_DISMISS:"click.dismiss"+qt,KEYDOWN_DISMISS:"keydown.dismiss"+qt,MOUSEUP_DISMISS:"mouseup.dismiss"+qt,MOUSEDOWN_DISMISS:"mousedown.dismiss"+qt,CLICK_DATA_API:"click"+qt+".data-api"},$t="modal-scrollbar-measure",te="modal-backdrop",ee="modal-open",ne="fade",ie="show",re={DIALOG:".modal-dialog",DATA_TOGGLE:'[data-toggle="modal"]',DATA_DISMISS:'[data-dismiss="modal"]',FIXED_CONTENT:".fixed-top, .fixed-bottom, .is-fixed, .sticky-top",STICKY_CONTENT:".sticky-top",NAVBAR_TOGGLER:".navbar-toggler"},se=function(){function r(t,e){this._config=this._getConfig(e),this._element=t,this._dialog=Bt(t).find(re.DIALOG)[0],this._backdrop=null,this._isShown=!1,this._isBodyOverflowing=!1,this._ignoreBackdropClick=!1,this._scrollbarWidth=0}var t=r.prototype;return t.toggle=function(t){return this._isShown?this.hide():this.show(t)},t.show=function(t){var e=this;if(!this._isTransitioning&&!this._isShown){Bt(this._element).hasClass(ne)&&(this._isTransitioning=!0);var n=Bt.Event(Zt.SHOW,{relatedTarget:t});Bt(this._element).trigger(n),this._isShown||n.isDefaultPrevented()||(this._isShown=!0,this._checkScrollbar(),this._setScrollbar(),this._adjustDialog(),Bt(document.body).addClass(ee),this._setEscapeEvent(),this._setResizeEvent(),Bt(this._element).on(Zt.CLICK_DISMISS,re.DATA_DISMISS,function(t){return e.hide(t)}),Bt(this._dialog).on(Zt.MOUSEDOWN_DISMISS,function(){Bt(e._element).one(Zt.MOUSEUP_DISMISS,function(t){Bt(t.target).is(e._element)&&(e._ignoreBackdropClick=!0)})}),this._showBackdrop(function(){return e._showElement(t)}))}},t.hide=function(t){var e=this;if(t&&t.preventDefault(),!this._isTransitioning&&this._isShown){var n=Bt.Event(Zt.HIDE);if(Bt(this._element).trigger(n),this._isShown&&!n.isDefaultPrevented()){this._isShown=!1;var i=Bt(this._element).hasClass(ne);if(i&&(this._isTransitioning=!0),this._setEscapeEvent(),this._setResizeEvent(),Bt(document).off(Zt.FOCUSIN),Bt(this._element).removeClass(ie),Bt(this._element).off(Zt.CLICK_DISMISS),Bt(this._dialog).off(Zt.MOUSEDOWN_DISMISS),i){var r=Cn.getTransitionDurationFromElement(this._element);Bt(this._element).one(Cn.TRANSITION_END,function(t){return e._hideModal(t)}).emulateTransitionEnd(r)}else this._hideModal()}}},t.dispose=function(){Bt.removeData(this._element,Gt),Bt(window,document,this._element,this._backdrop).off(qt),this._config=null,this._element=null,this._dialog=null,this._backdrop=null,this._isShown=null,this._isBodyOverflowing=null,this._ignoreBackdropClick=null,this._scrollbarWidth=null},t.handleUpdate=function(){this._adjustDialog()},t._getConfig=function(t){return t=h({},Xt,t),Cn.typeCheckConfig(Yt,t,Jt),t},t._showElement=function(t){var e=this,n=Bt(this._element).hasClass(ne);this._element.parentNode&&this._element.parentNode.nodeType===Node.ELEMENT_NODE||document.body.appendChild(this._element),this._element.style.display="block",this._element.removeAttribute("aria-hidden"),this._element.scrollTop=0,n&&Cn.reflow(this._element),Bt(this._element).addClass(ie),this._config.focus&&this._enforceFocus();var i=Bt.Event(Zt.SHOWN,{relatedTarget:t}),r=function(){e._config.focus&&e._element.focus(),e._isTransitioning=!1,Bt(e._element).trigger(i)};if(n){var s=Cn.getTransitionDurationFromElement(this._element);Bt(this._dialog).one(Cn.TRANSITION_END,r).emulateTransitionEnd(s)}else r()},t._enforceFocus=function(){var e=this;Bt(document).off(Zt.FOCUSIN).on(Zt.FOCUSIN,function(t){document!==t.target&&e._element!==t.target&&0===Bt(e._element).has(t.target).length&&e._element.focus()})},t._setEscapeEvent=function(){var e=this;this._isShown&&this._config.keyboard?Bt(this._element).on(Zt.KEYDOWN_DISMISS,function(t){27===t.which&&(t.preventDefault(),e.hide())}):this._isShown||Bt(this._element).off(Zt.KEYDOWN_DISMISS)},t._setResizeEvent=function(){var e=this;this._isShown?Bt(window).on(Zt.RESIZE,function(t){return e.handleUpdate(t)}):Bt(window).off(Zt.RESIZE)},t._hideModal=function(){var t=this;this._element.style.display="none",this._element.setAttribute("aria-hidden",!0),this._isTransitioning=!1,this._showBackdrop(function(){Bt(document.body).removeClass(ee),t._resetAdjustments(),t._resetScrollbar(),Bt(t._element).trigger(Zt.HIDDEN)})},t._removeBackdrop=function(){this._backdrop&&(Bt(this._backdrop).remove(),this._backdrop=null)},t._showBackdrop=function(t){var e=this,n=Bt(this._element).hasClass(ne)?ne:"";if(this._isShown&&this._config.backdrop){if(this._backdrop=document.createElement("div"),this._backdrop.className=te,n&&Bt(this._backdrop).addClass(n),Bt(this._backdrop).appendTo(document.body),Bt(this._element).on(Zt.CLICK_DISMISS,function(t){e._ignoreBackdropClick?e._ignoreBackdropClick=!1:t.target===t.currentTarget&&("static"===e._config.backdrop?e._element.focus():e.hide())}),n&&Cn.reflow(this._backdrop),Bt(this._backdrop).addClass(ie),!t)return;if(!n)return void t();var i=Cn.getTransitionDurationFromElement(this._backdrop);Bt(this._backdrop).one(Cn.TRANSITION_END,t).emulateTransitionEnd(i)}else if(!this._isShown&&this._backdrop){Bt(this._backdrop).removeClass(ie);var r=function(){e._removeBackdrop(),t&&t()};if(Bt(this._element).hasClass(ne)){var s=Cn.getTransitionDurationFromElement(this._backdrop);Bt(this._backdrop).one(Cn.TRANSITION_END,r).emulateTransitionEnd(s)}else r()}else t&&t()},t._adjustDialog=function(){var t=this._element.scrollHeight>document.documentElement.clientHeight;!this._isBodyOverflowing&&t&&(this._element.style.paddingLeft=this._scrollbarWidth+"px"),this._isBodyOverflowing&&!t&&(this._element.style.paddingRight=this._scrollbarWidth+"px")},t._resetAdjustments=function(){this._element.style.paddingLeft="",this._element.style.paddingRight=""},t._checkScrollbar=function(){var t=document.body.getBoundingClientRect();this._isBodyOverflowing=t.left+t.right<window.innerWidth,this._scrollbarWidth=this._getScrollbarWidth()},t._setScrollbar=function(){var r=this;if(this._isBodyOverflowing){Bt(re.FIXED_CONTENT).each(function(t,e){var n=Bt(e)[0].style.paddingRight,i=Bt(e).css("padding-right");Bt(e).data("padding-right",n).css("padding-right",parseFloat(i)+r._scrollbarWidth+"px")}),Bt(re.STICKY_CONTENT).each(function(t,e){var n=Bt(e)[0].style.marginRight,i=Bt(e).css("margin-right");Bt(e).data("margin-right",n).css("margin-right",parseFloat(i)-r._scrollbarWidth+"px")}),Bt(re.NAVBAR_TOGGLER).each(function(t,e){var n=Bt(e)[0].style.marginRight,i=Bt(e).css("margin-right");Bt(e).data("margin-right",n).css("margin-right",parseFloat(i)+r._scrollbarWidth+"px")});var t=document.body.style.paddingRight,e=Bt(document.body).css("padding-right");Bt(document.body).data("padding-right",t).css("padding-right",parseFloat(e)+this._scrollbarWidth+"px")}},t._resetScrollbar=function(){Bt(re.FIXED_CONTENT).each(function(t,e){var n=Bt(e).data("padding-right");"undefined"!=typeof n&&Bt(e).css("padding-right",n).removeData("padding-right")}),Bt(re.STICKY_CONTENT+", "+re.NAVBAR_TOGGLER).each(function(t,e){var n=Bt(e).data("margin-right");"undefined"!=typeof n&&Bt(e).css("margin-right",n).removeData("margin-right")});var t=Bt(document.body).data("padding-right");"undefined"!=typeof t&&Bt(document.body).css("padding-right",t).removeData("padding-right")},t._getScrollbarWidth=function(){var t=document.createElement("div");t.className=$t,document.body.appendChild(t);var e=t.getBoundingClientRect().width-t.clientWidth;return document.body.removeChild(t),e},r._jQueryInterface=function(n,i){return this.each(function(){var t=Bt(this).data(Gt),e=h({},r.Default,Bt(this).data(),"object"==typeof n&&n);if(t||(t=new r(this,e),Bt(this).data(Gt,t)),"string"==typeof n){if("undefined"==typeof t[n])throw new TypeError('No method named "'+n+'"');t[n](i)}else e.show&&t.show(i)})},o(r,null,[{key:"VERSION",get:function(){return"4.1.0"}},{key:"Default",get:function(){return Xt}}]),r}(),Bt(document).on(Zt.CLICK_DATA_API,re.DATA_TOGGLE,function(t){var e,n=this,i=Cn.getSelectorFromElement(this);i&&(e=Bt(i)[0]);var r=Bt(e).data(Gt)?"toggle":h({},Bt(e).data(),Bt(this).data());"A"!==this.tagName&&"AREA"!==this.tagName||t.preventDefault();var s=Bt(e).one(Zt.SHOW,function(t){t.isDefaultPrevented()||s.one(Zt.HIDDEN,function(){Bt(n).is(":visible")&&n.focus()})});se._jQueryInterface.call(Bt(e),r,this)}),Bt.fn[Yt]=se._jQueryInterface,Bt.fn[Yt].Constructor=se,Bt.fn[Yt].noConflict=function(){return Bt.fn[Yt]=zt,se._jQueryInterface},se),Nn=(ae="tooltip",he="."+(le="bs.tooltip"),ce=(oe=e).fn[ae],ue="bs-tooltip",fe=new RegExp("(^|\\s)"+ue+"\\S+","g"),ge={animation:!0,template:'<div class="tooltip" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>',trigger:"hover focus",title:"",delay:0,html:!(_e={AUTO:"auto",TOP:"top",RIGHT:"right",BOTTOM:"bottom",LEFT:"left"}),selector:!(de={animation:"boolean",template:"string",title:"(string|element|function)",trigger:"string",delay:"(number|object)",html:"boolean",selector:"(string|boolean)",placement:"(string|function)",offset:"(number|string)",container:"(string|element|boolean)",fallbackPlacement:"(string|array)",boundary:"(string|element)"}),placement:"top",offset:0,container:!1,fallbackPlacement:"flip",boundary:"scrollParent"},pe="out",ve={HIDE:"hide"+he,HIDDEN:"hidden"+he,SHOW:(me="show")+he,SHOWN:"shown"+he,INSERTED:"inserted"+he,CLICK:"click"+he,FOCUSIN:"focusin"+he,FOCUSOUT:"focusout"+he,MOUSEENTER:"mouseenter"+he,MOUSELEAVE:"mouseleave"+he},Ee="fade",ye="show",Te=".tooltip-inner",Ce=".arrow",Ie="hover",Ae="focus",De="click",be="manual",Se=function(){function i(t,e){if("undefined"==typeof c)throw new TypeError("Bootstrap tooltips require Popper.js (https://popper.js.org)");this._isEnabled=!0,this._timeout=0,this._hoverState="",this._activeTrigger={},this._popper=null,this.element=t,this.config=this._getConfig(e),this.tip=null,this._setListeners()}var t=i.prototype;return t.enable=function(){this._isEnabled=!0},t.disable=function(){this._isEnabled=!1},t.toggleEnabled=function(){this._isEnabled=!this._isEnabled},t.toggle=function(t){if(this._isEnabled)if(t){var e=this.constructor.DATA_KEY,n=oe(t.currentTarget).data(e);n||(n=new this.constructor(t.currentTarget,this._getDelegateConfig()),oe(t.currentTarget).data(e,n)),n._activeTrigger.click=!n._activeTrigger.click,n._isWithActiveTrigger()?n._enter(null,n):n._leave(null,n)}else{if(oe(this.getTipElement()).hasClass(ye))return void this._leave(null,this);this._enter(null,this)}},t.dispose=function(){clearTimeout(this._timeout),oe.removeData(this.element,this.constructor.DATA_KEY),oe(this.element).off(this.constructor.EVENT_KEY),oe(this.element).closest(".modal").off("hide.bs.modal"),this.tip&&oe(this.tip).remove(),this._isEnabled=null,this._timeout=null,this._hoverState=null,(this._activeTrigger=null)!==this._popper&&this._popper.destroy(),this._popper=null,this.element=null,this.config=null,this.tip=null},t.show=function(){var e=this;if("none"===oe(this.element).css("display"))throw new Error("Please use show on visible elements");var t=oe.Event(this.constructor.Event.SHOW);if(this.isWithContent()&&this._isEnabled){oe(this.element).trigger(t);var n=oe.contains(this.element.ownerDocument.documentElement,this.element);if(t.isDefaultPrevented()||!n)return;var i=this.getTipElement(),r=Cn.getUID(this.constructor.NAME);i.setAttribute("id",r),this.element.setAttribute("aria-describedby",r),this.setContent(),this.config.animation&&oe(i).addClass(Ee);var s="function"==typeof this.config.placement?this.config.placement.call(this,i,this.element):this.config.placement,o=this._getAttachment(s);this.addAttachmentClass(o);var a=!1===this.config.container?document.body:oe(this.config.container);oe(i).data(this.constructor.DATA_KEY,this),oe.contains(this.element.ownerDocument.documentElement,this.tip)||oe(i).appendTo(a),oe(this.element).trigger(this.constructor.Event.INSERTED),this._popper=new c(this.element,i,{placement:o,modifiers:{offset:{offset:this.config.offset},flip:{behavior:this.config.fallbackPlacement},arrow:{element:Ce},preventOverflow:{boundariesElement:this.config.boundary}},onCreate:function(t){t.originalPlacement!==t.placement&&e._handlePopperPlacementChange(t)},onUpdate:function(t){e._handlePopperPlacementChange(t)}}),oe(i).addClass(ye),"ontouchstart"in document.documentElement&&oe(document.body).children().on("mouseover",null,oe.noop);var l=function(){e.config.animation&&e._fixTransition();var t=e._hoverState;e._hoverState=null,oe(e.element).trigger(e.constructor.Event.SHOWN),t===pe&&e._leave(null,e)};if(oe(this.tip).hasClass(Ee)){var h=Cn.getTransitionDurationFromElement(this.tip);oe(this.tip).one(Cn.TRANSITION_END,l).emulateTransitionEnd(h)}else l()}},t.hide=function(t){var e=this,n=this.getTipElement(),i=oe.Event(this.constructor.Event.HIDE),r=function(){e._hoverState!==me&&n.parentNode&&n.parentNode.removeChild(n),e._cleanTipClass(),e.element.removeAttribute("aria-describedby"),oe(e.element).trigger(e.constructor.Event.HIDDEN),null!==e._popper&&e._popper.destroy(),t&&t()};if(oe(this.element).trigger(i),!i.isDefaultPrevented()){if(oe(n).removeClass(ye),"ontouchstart"in document.documentElement&&oe(document.body).children().off("mouseover",null,oe.noop),this._activeTrigger[De]=!1,this._activeTrigger[Ae]=!1,this._activeTrigger[Ie]=!1,oe(this.tip).hasClass(Ee)){var s=Cn.getTransitionDurationFromElement(n);oe(n).one(Cn.TRANSITION_END,r).emulateTransitionEnd(s)}else r();this._hoverState=""}},t.update=function(){null!==this._popper&&this._popper.scheduleUpdate()},t.isWithContent=function(){return Boolean(this.getTitle())},t.addAttachmentClass=function(t){oe(this.getTipElement()).addClass(ue+"-"+t)},t.getTipElement=function(){return this.tip=this.tip||oe(this.config.template)[0],this.tip},t.setContent=function(){var t=oe(this.getTipElement());this.setElementContent(t.find(Te),this.getTitle()),t.removeClass(Ee+" "+ye)},t.setElementContent=function(t,e){var n=this.config.html;"object"==typeof e&&(e.nodeType||e.jquery)?n?oe(e).parent().is(t)||t.empty().append(e):t.text(oe(e).text()):t[n?"html":"text"](e)},t.getTitle=function(){var t=this.element.getAttribute("data-original-title");return t||(t="function"==typeof this.config.title?this.config.title.call(this.element):this.config.title),t},t._getAttachment=function(t){return _e[t.toUpperCase()]},t._setListeners=function(){var i=this;this.config.trigger.split(" ").forEach(function(t){if("click"===t)oe(i.element).on(i.constructor.Event.CLICK,i.config.selector,function(t){return i.toggle(t)});else if(t!==be){var e=t===Ie?i.constructor.Event.MOUSEENTER:i.constructor.Event.FOCUSIN,n=t===Ie?i.constructor.Event.MOUSELEAVE:i.constructor.Event.FOCUSOUT;oe(i.element).on(e,i.config.selector,function(t){return i._enter(t)}).on(n,i.config.selector,function(t){return i._leave(t)})}oe(i.element).closest(".modal").on("hide.bs.modal",function(){return i.hide()})}),this.config.selector?this.config=h({},this.config,{trigger:"manual",selector:""}):this._fixTitle()},t._fixTitle=function(){var t=typeof this.element.getAttribute("data-original-title");(this.element.getAttribute("title")||"string"!==t)&&(this.element.setAttribute("data-original-title",this.element.getAttribute("title")||""),this.element.setAttribute("title",""))},t._enter=function(t,e){var n=this.constructor.DATA_KEY;(e=e||oe(t.currentTarget).data(n))||(e=new this.constructor(t.currentTarget,this._getDelegateConfig()),oe(t.currentTarget).data(n,e)),t&&(e._activeTrigger["focusin"===t.type?Ae:Ie]=!0),oe(e.getTipElement()).hasClass(ye)||e._hoverState===me?e._hoverState=me:(clearTimeout(e._timeout),e._hoverState=me,e.config.delay&&e.config.delay.show?e._timeout=setTimeout(function(){e._hoverState===me&&e.show()},e.config.delay.show):e.show())},t._leave=function(t,e){var n=this.constructor.DATA_KEY;(e=e||oe(t.currentTarget).data(n))||(e=new this.constructor(t.currentTarget,this._getDelegateConfig()),oe(t.currentTarget).data(n,e)),t&&(e._activeTrigger["focusout"===t.type?Ae:Ie]=!1),e._isWithActiveTrigger()||(clearTimeout(e._timeout),e._hoverState=pe,e.config.delay&&e.config.delay.hide?e._timeout=setTimeout(function(){e._hoverState===pe&&e.hide()},e.config.delay.hide):e.hide())},t._isWithActiveTrigger=function(){for(var t in this._activeTrigger)if(this._activeTrigger[t])return!0;return!1},t._getConfig=function(t){return"number"==typeof(t=h({},this.constructor.Default,oe(this.element).data(),t)).delay&&(t.delay={show:t.delay,hide:t.delay}),"number"==typeof t.title&&(t.title=t.title.toString()),"number"==typeof t.content&&(t.content=t.content.toString()),Cn.typeCheckConfig(ae,t,this.constructor.DefaultType),t},t._getDelegateConfig=function(){var t={};if(this.config)for(var e in this.config)this.constructor.Default[e]!==this.config[e]&&(t[e]=this.config[e]);return t},t._cleanTipClass=function(){var t=oe(this.getTipElement()),e=t.attr("class").match(fe);null!==e&&0<e.length&&t.removeClass(e.join(""))},t._handlePopperPlacementChange=function(t){this._cleanTipClass(),this.addAttachmentClass(this._getAttachment(t.placement))},t._fixTransition=function(){var t=this.getTipElement(),e=this.config.animation;null===t.getAttribute("x-placement")&&(oe(t).removeClass(Ee),this.config.animation=!1,this.hide(),this.show(),this.config.animation=e)},i._jQueryInterface=function(n){return this.each(function(){var t=oe(this).data(le),e="object"==typeof n&&n;if((t||!/dispose|hide/.test(n))&&(t||(t=new i(this,e),oe(this).data(le,t)),"string"==typeof n)){if("undefined"==typeof t[n])throw new TypeError('No method named "'+n+'"');t[n]()}})},o(i,null,[{key:"VERSION",get:function(){return"4.1.0"}},{key:"Default",get:function(){return ge}},{key:"NAME",get:function(){return ae}},{key:"DATA_KEY",get:function(){return le}},{key:"Event",get:function(){return ve}},{key:"EVENT_KEY",get:function(){return he}},{key:"DefaultType",get:function(){return de}}]),i}(),oe.fn[ae]=Se._jQueryInterface,oe.fn[ae].Constructor=Se,oe.fn[ae].noConflict=function(){return oe.fn[ae]=ce,Se._jQueryInterface},Se),On=(Ne="popover",ke="."+(Oe="bs.popover"),Pe=(we=e).fn[Ne],Le="bs-popover",je=new RegExp("(^|\\s)"+Le+"\\S+","g"),Re=h({},Nn.Default,{placement:"right",trigger:"click",content:"",template:'<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>'}),He=h({},Nn.DefaultType,{content:"(string|element|function)"}),We="fade",xe=".popover-header",Ue=".popover-body",Ke={HIDE:"hide"+ke,HIDDEN:"hidden"+ke,SHOW:(Me="show")+ke,SHOWN:"shown"+ke,INSERTED:"inserted"+ke,CLICK:"click"+ke,FOCUSIN:"focusin"+ke,FOCUSOUT:"focusout"+ke,MOUSEENTER:"mouseenter"+ke,MOUSELEAVE:"mouseleave"+ke},Fe=function(t){var e,n;function i(){return t.apply(this,arguments)||this}n=t,(e=i).prototype=Object.create(n.prototype),(e.prototype.constructor=e).__proto__=n;var r=i.prototype;return r.isWithContent=function(){return this.getTitle()||this._getContent()},r.addAttachmentClass=function(t){we(this.getTipElement()).addClass(Le+"-"+t)},r.getTipElement=function(){return this.tip=this.tip||we(this.config.template)[0],this.tip},r.setContent=function(){var t=we(this.getTipElement());this.setElementContent(t.find(xe),this.getTitle());var e=this._getContent();"function"==typeof e&&(e=e.call(this.element)),this.setElementContent(t.find(Ue),e),t.removeClass(We+" "+Me)},r._getContent=function(){return this.element.getAttribute("data-content")||this.config.content},r._cleanTipClass=function(){var t=we(this.getTipElement()),e=t.attr("class").match(je);null!==e&&0<e.length&&t.removeClass(e.join(""))},i._jQueryInterface=function(n){return this.each(function(){var t=we(this).data(Oe),e="object"==typeof n?n:null;if((t||!/destroy|hide/.test(n))&&(t||(t=new i(this,e),we(this).data(Oe,t)),"string"==typeof n)){if("undefined"==typeof t[n])throw new TypeError('No method named "'+n+'"');t[n]()}})},o(i,null,[{key:"VERSION",get:function(){return"4.1.0"}},{key:"Default",get:function(){return Re}},{key:"NAME",get:function(){return Ne}},{key:"DATA_KEY",get:function(){return Oe}},{key:"Event",get:function(){return Ke}},{key:"EVENT_KEY",get:function(){return ke}},{key:"DefaultType",get:function(){return He}}]),i}(Nn),we.fn[Ne]=Fe._jQueryInterface,we.fn[Ne].Constructor=Fe,we.fn[Ne].noConflict=function(){return we.fn[Ne]=Pe,Fe._jQueryInterface},Fe),kn=(Qe="scrollspy",Ye="."+(Be="bs.scrollspy"),Ge=(Ve=e).fn[Qe],qe={offset:10,method:"auto",target:""},ze={offset:"number",method:"string",target:"(string|element)"},Xe={ACTIVATE:"activate"+Ye,SCROLL:"scroll"+Ye,LOAD_DATA_API:"load"+Ye+".data-api"},Je="dropdown-item",Ze="active",$e={DATA_SPY:'[data-spy="scroll"]',ACTIVE:".active",NAV_LIST_GROUP:".nav, .list-group",NAV_LINKS:".nav-link",NAV_ITEMS:".nav-item",LIST_ITEMS:".list-group-item",DROPDOWN:".dropdown",DROPDOWN_ITEMS:".dropdown-item",DROPDOWN_TOGGLE:".dropdown-toggle"},tn="offset",en="position",nn=function(){function n(t,e){var n=this;this._element=t,this._scrollElement="BODY"===t.tagName?window:t,this._config=this._getConfig(e),this._selector=this._config.target+" "+$e.NAV_LINKS+","+this._config.target+" "+$e.LIST_ITEMS+","+this._config.target+" "+$e.DROPDOWN_ITEMS,this._offsets=[],this._targets=[],this._activeTarget=null,this._scrollHeight=0,Ve(this._scrollElement).on(Xe.SCROLL,function(t){return n._process(t)}),this.refresh(),this._process()}var t=n.prototype;return t.refresh=function(){var e=this,t=this._scrollElement===this._scrollElement.window?tn:en,r="auto"===this._config.method?t:this._config.method,s=r===en?this._getScrollTop():0;this._offsets=[],this._targets=[],this._scrollHeight=this._getScrollHeight(),Ve.makeArray(Ve(this._selector)).map(function(t){var e,n=Cn.getSelectorFromElement(t);if(n&&(e=Ve(n)[0]),e){var i=e.getBoundingClientRect();if(i.width||i.height)return[Ve(e)[r]().top+s,n]}return null}).filter(function(t){return t}).sort(function(t,e){return t[0]-e[0]}).forEach(function(t){e._offsets.push(t[0]),e._targets.push(t[1])})},t.dispose=function(){Ve.removeData(this._element,Be),Ve(this._scrollElement).off(Ye),this._element=null,this._scrollElement=null,this._config=null,this._selector=null,this._offsets=null,this._targets=null,this._activeTarget=null,this._scrollHeight=null},t._getConfig=function(t){if("string"!=typeof(t=h({},qe,t)).target){var e=Ve(t.target).attr("id");e||(e=Cn.getUID(Qe),Ve(t.target).attr("id",e)),t.target="#"+e}return Cn.typeCheckConfig(Qe,t,ze),t},t._getScrollTop=function(){return this._scrollElement===window?this._scrollElement.pageYOffset:this._scrollElement.scrollTop},t._getScrollHeight=function(){return this._scrollElement.scrollHeight||Math.max(document.body.scrollHeight,document.documentElement.scrollHeight)},t._getOffsetHeight=function(){return this._scrollElement===window?window.innerHeight:this._scrollElement.getBoundingClientRect().height},t._process=function(){var t=this._getScrollTop()+this._config.offset,e=this._getScrollHeight(),n=this._config.offset+e-this._getOffsetHeight();if(this._scrollHeight!==e&&this.refresh(),n<=t){var i=this._targets[this._targets.length-1];this._activeTarget!==i&&this._activate(i)}else{if(this._activeTarget&&t<this._offsets[0]&&0<this._offsets[0])return this._activeTarget=null,void this._clear();for(var r=this._offsets.length;r--;){this._activeTarget!==this._targets[r]&&t>=this._offsets[r]&&("undefined"==typeof this._offsets[r+1]||t<this._offsets[r+1])&&this._activate(this._targets[r])}}},t._activate=function(e){this._activeTarget=e,this._clear();var t=this._selector.split(",");t=t.map(function(t){return t+'[data-target="'+e+'"],'+t+'[href="'+e+'"]'});var n=Ve(t.join(","));n.hasClass(Je)?(n.closest($e.DROPDOWN).find($e.DROPDOWN_TOGGLE).addClass(Ze),n.addClass(Ze)):(n.addClass(Ze),n.parents($e.NAV_LIST_GROUP).prev($e.NAV_LINKS+", "+$e.LIST_ITEMS).addClass(Ze),n.parents($e.NAV_LIST_GROUP).prev($e.NAV_ITEMS).children($e.NAV_LINKS).addClass(Ze)),Ve(this._scrollElement).trigger(Xe.ACTIVATE,{relatedTarget:e})},t._clear=function(){Ve(this._selector).filter($e.ACTIVE).removeClass(Ze)},n._jQueryInterface=function(e){return this.each(function(){var t=Ve(this).data(Be);if(t||(t=new n(this,"object"==typeof e&&e),Ve(this).data(Be,t)),"string"==typeof e){if("undefined"==typeof t[e])throw new TypeError('No method named "'+e+'"');t[e]()}})},o(n,null,[{key:"VERSION",get:function(){return"4.1.0"}},{key:"Default",get:function(){return qe}}]),n}(),Ve(window).on(Xe.LOAD_DATA_API,function(){for(var t=Ve.makeArray(Ve($e.DATA_SPY)),e=t.length;e--;){var n=Ve(t[e]);nn._jQueryInterface.call(n,n.data())}}),Ve.fn[Qe]=nn._jQueryInterface,Ve.fn[Qe].Constructor=nn,Ve.fn[Qe].noConflict=function(){return Ve.fn[Qe]=Ge,nn._jQueryInterface},nn),Pn=(on="."+(sn="bs.tab"),an=(rn=e).fn.tab,ln={HIDE:"hide"+on,HIDDEN:"hidden"+on,SHOW:"show"+on,SHOWN:"shown"+on,CLICK_DATA_API:"click"+on+".data-api"},hn="dropdown-menu",cn="active",un="disabled",fn="fade",dn="show",_n=".dropdown",gn=".nav, .list-group",mn=".active",pn="> li > .active",vn='[data-toggle="tab"], [data-toggle="pill"], [data-toggle="list"]',En=".dropdown-toggle",yn="> .dropdown-menu .active",Tn=function(){function i(t){this._element=t}var t=i.prototype;return t.show=function(){var n=this;if(!(this._element.parentNode&&this._element.parentNode.nodeType===Node.ELEMENT_NODE&&rn(this._element).hasClass(cn)||rn(this._element).hasClass(un))){var t,i,e=rn(this._element).closest(gn)[0],r=Cn.getSelectorFromElement(this._element);if(e){var s="UL"===e.nodeName?pn:mn;i=(i=rn.makeArray(rn(e).find(s)))[i.length-1]}var o=rn.Event(ln.HIDE,{relatedTarget:this._element}),a=rn.Event(ln.SHOW,{relatedTarget:i});if(i&&rn(i).trigger(o),rn(this._element).trigger(a),!a.isDefaultPrevented()&&!o.isDefaultPrevented()){r&&(t=rn(r)[0]),this._activate(this._element,e);var l=function(){var t=rn.Event(ln.HIDDEN,{relatedTarget:n._element}),e=rn.Event(ln.SHOWN,{relatedTarget:i});rn(i).trigger(t),rn(n._element).trigger(e)};t?this._activate(t,t.parentNode,l):l()}}},t.dispose=function(){rn.removeData(this._element,sn),this._element=null},t._activate=function(t,e,n){var i=this,r=("UL"===e.nodeName?rn(e).find(pn):rn(e).children(mn))[0],s=n&&r&&rn(r).hasClass(fn),o=function(){return i._transitionComplete(t,r,n)};if(r&&s){var a=Cn.getTransitionDurationFromElement(r);rn(r).one(Cn.TRANSITION_END,o).emulateTransitionEnd(a)}else o()},t._transitionComplete=function(t,e,n){if(e){rn(e).removeClass(dn+" "+cn);var i=rn(e.parentNode).find(yn)[0];i&&rn(i).removeClass(cn),"tab"===e.getAttribute("role")&&e.setAttribute("aria-selected",!1)}if(rn(t).addClass(cn),"tab"===t.getAttribute("role")&&t.setAttribute("aria-selected",!0),Cn.reflow(t),rn(t).addClass(dn),t.parentNode&&rn(t.parentNode).hasClass(hn)){var r=rn(t).closest(_n)[0];r&&rn(r).find(En).addClass(cn),t.setAttribute("aria-expanded",!0)}n&&n()},i._jQueryInterface=function(n){return this.each(function(){var t=rn(this),e=t.data(sn);if(e||(e=new i(this),t.data(sn,e)),"string"==typeof n){if("undefined"==typeof e[n])throw new TypeError('No method named "'+n+'"');e[n]()}})},o(i,null,[{key:"VERSION",get:function(){return"4.1.0"}}]),i}(),rn(document).on(ln.CLICK_DATA_API,vn,function(t){t.preventDefault(),Tn._jQueryInterface.call(rn(this),"show")}),rn.fn.tab=Tn._jQueryInterface,rn.fn.tab.Constructor=Tn,rn.fn.tab.noConflict=function(){return rn.fn.tab=an,Tn._jQueryInterface},Tn);!function(t){if("undefined"==typeof t)throw new TypeError("Bootstrap's JavaScript requires jQuery. jQuery must be included before Bootstrap's JavaScript.");var e=t.fn.jquery.split(" ")[0].split(".");if(e[0]<2&&e[1]<9||1===e[0]&&9===e[1]&&e[2]<1||4<=e[0])throw new Error("Bootstrap's JavaScript requires at least jQuery v1.9.1 but less than v4.0.0")}(e),t.Util=Cn,t.Alert=In,t.Button=An,t.Carousel=Dn,t.Collapse=bn,t.Dropdown=Sn,t.Modal=wn,t.Popover=On,t.Scrollspy=kn,t.Tab=Pn,t.Tooltip=Nn,Object.defineProperty(t,"__esModule",{value:!0})});
//# sourceMappingURL=bootstrap.min.js.map
/*! Select2 4.0.3 | https://github.com/select2/select2/blob/master/LICENSE.md */!function(a){"function"==typeof define&&define.amd?define(["jquery"],a):a("object"==typeof exports?require("jquery"):jQuery)}(function(a){var b=function(){if(a&&a.fn&&a.fn.select2&&a.fn.select2.amd)var b=a.fn.select2.amd;var b;return function(){if(!b||!b.requirejs){b?c=b:b={};var a,c,d;!function(b){function e(a,b){return u.call(a,b)}function f(a,b){var c,d,e,f,g,h,i,j,k,l,m,n=b&&b.split("/"),o=s.map,p=o&&o["*"]||{};if(a&&"."===a.charAt(0))if(b){for(a=a.split("/"),g=a.length-1,s.nodeIdCompat&&w.test(a[g])&&(a[g]=a[g].replace(w,"")),a=n.slice(0,n.length-1).concat(a),k=0;k<a.length;k+=1)if(m=a[k],"."===m)a.splice(k,1),k-=1;else if(".."===m){if(1===k&&(".."===a[2]||".."===a[0]))break;k>0&&(a.splice(k-1,2),k-=2)}a=a.join("/")}else 0===a.indexOf("./")&&(a=a.substring(2));if((n||p)&&o){for(c=a.split("/"),k=c.length;k>0;k-=1){if(d=c.slice(0,k).join("/"),n)for(l=n.length;l>0;l-=1)if(e=o[n.slice(0,l).join("/")],e&&(e=e[d])){f=e,h=k;break}if(f)break;!i&&p&&p[d]&&(i=p[d],j=k)}!f&&i&&(f=i,h=j),f&&(c.splice(0,h,f),a=c.join("/"))}return a}function g(a,c){return function(){var d=v.call(arguments,0);return"string"!=typeof d[0]&&1===d.length&&d.push(null),n.apply(b,d.concat([a,c]))}}function h(a){return function(b){return f(b,a)}}function i(a){return function(b){q[a]=b}}function j(a){if(e(r,a)){var c=r[a];delete r[a],t[a]=!0,m.apply(b,c)}if(!e(q,a)&&!e(t,a))throw new Error("No "+a);return q[a]}function k(a){var b,c=a?a.indexOf("!"):-1;return c>-1&&(b=a.substring(0,c),a=a.substring(c+1,a.length)),[b,a]}function l(a){return function(){return s&&s.config&&s.config[a]||{}}}var m,n,o,p,q={},r={},s={},t={},u=Object.prototype.hasOwnProperty,v=[].slice,w=/\.js$/;o=function(a,b){var c,d=k(a),e=d[0];return a=d[1],e&&(e=f(e,b),c=j(e)),e?a=c&&c.normalize?c.normalize(a,h(b)):f(a,b):(a=f(a,b),d=k(a),e=d[0],a=d[1],e&&(c=j(e))),{f:e?e+"!"+a:a,n:a,pr:e,p:c}},p={require:function(a){return g(a)},exports:function(a){var b=q[a];return"undefined"!=typeof b?b:q[a]={}},module:function(a){return{id:a,uri:"",exports:q[a],config:l(a)}}},m=function(a,c,d,f){var h,k,l,m,n,s,u=[],v=typeof d;if(f=f||a,"undefined"===v||"function"===v){for(c=!c.length&&d.length?["require","exports","module"]:c,n=0;n<c.length;n+=1)if(m=o(c[n],f),k=m.f,"require"===k)u[n]=p.require(a);else if("exports"===k)u[n]=p.exports(a),s=!0;else if("module"===k)h=u[n]=p.module(a);else if(e(q,k)||e(r,k)||e(t,k))u[n]=j(k);else{if(!m.p)throw new Error(a+" missing "+k);m.p.load(m.n,g(f,!0),i(k),{}),u[n]=q[k]}l=d?d.apply(q[a],u):void 0,a&&(h&&h.exports!==b&&h.exports!==q[a]?q[a]=h.exports:l===b&&s||(q[a]=l))}else a&&(q[a]=d)},a=c=n=function(a,c,d,e,f){if("string"==typeof a)return p[a]?p[a](c):j(o(a,c).f);if(!a.splice){if(s=a,s.deps&&n(s.deps,s.callback),!c)return;c.splice?(a=c,c=d,d=null):a=b}return c=c||function(){},"function"==typeof d&&(d=e,e=f),e?m(b,a,c,d):setTimeout(function(){m(b,a,c,d)},4),n},n.config=function(a){return n(a)},a._defined=q,d=function(a,b,c){if("string"!=typeof a)throw new Error("See almond README: incorrect module build, no module name");b.splice||(c=b,b=[]),e(q,a)||e(r,a)||(r[a]=[a,b,c])},d.amd={jQuery:!0}}(),b.requirejs=a,b.require=c,b.define=d}}(),b.define("almond",function(){}),b.define("jquery",[],function(){var b=a||$;return null==b&&console&&console.error&&console.error("Select2: An instance of jQuery or a jQuery-compatible library was not found. Make sure that you are including jQuery before Select2 on your web page."),b}),b.define("select2/utils",["jquery"],function(a){function b(a){var b=a.prototype,c=[];for(var d in b){var e=b[d];"function"==typeof e&&"constructor"!==d&&c.push(d)}return c}var c={};c.Extend=function(a,b){function c(){this.constructor=a}var d={}.hasOwnProperty;for(var e in b)d.call(b,e)&&(a[e]=b[e]);return c.prototype=b.prototype,a.prototype=new c,a.__super__=b.prototype,a},c.Decorate=function(a,c){function d(){var b=Array.prototype.unshift,d=c.prototype.constructor.length,e=a.prototype.constructor;d>0&&(b.call(arguments,a.prototype.constructor),e=c.prototype.constructor),e.apply(this,arguments)}function e(){this.constructor=d}var f=b(c),g=b(a);c.displayName=a.displayName,d.prototype=new e;for(var h=0;h<g.length;h++){var i=g[h];d.prototype[i]=a.prototype[i]}for(var j=(function(a){var b=function(){};a in d.prototype&&(b=d.prototype[a]);var e=c.prototype[a];return function(){var a=Array.prototype.unshift;return a.call(arguments,b),e.apply(this,arguments)}}),k=0;k<f.length;k++){var l=f[k];d.prototype[l]=j(l)}return d};var d=function(){this.listeners={}};return d.prototype.on=function(a,b){this.listeners=this.listeners||{},a in this.listeners?this.listeners[a].push(b):this.listeners[a]=[b]},d.prototype.trigger=function(a){var b=Array.prototype.slice,c=b.call(arguments,1);this.listeners=this.listeners||{},null==c&&(c=[]),0===c.length&&c.push({}),c[0]._type=a,a in this.listeners&&this.invoke(this.listeners[a],b.call(arguments,1)),"*"in this.listeners&&this.invoke(this.listeners["*"],arguments)},d.prototype.invoke=function(a,b){for(var c=0,d=a.length;d>c;c++)a[c].apply(this,b)},c.Observable=d,c.generateChars=function(a){for(var b="",c=0;a>c;c++){var d=Math.floor(36*Math.random());b+=d.toString(36)}return b},c.bind=function(a,b){return function(){a.apply(b,arguments)}},c._convertData=function(a){for(var b in a){var c=b.split("-"),d=a;if(1!==c.length){for(var e=0;e<c.length;e++){var f=c[e];f=f.substring(0,1).toLowerCase()+f.substring(1),f in d||(d[f]={}),e==c.length-1&&(d[f]=a[b]),d=d[f]}delete a[b]}}return a},c.hasScroll=function(b,c){var d=a(c),e=c.style.overflowX,f=c.style.overflowY;return e!==f||"hidden"!==f&&"visible"!==f?"scroll"===e||"scroll"===f?!0:d.innerHeight()<c.scrollHeight||d.innerWidth()<c.scrollWidth:!1},c.escapeMarkup=function(a){var b={"\\":"&#92;","&":"&amp;","<":"&lt;",">":"&gt;",'"':"&quot;","'":"&#39;","/":"&#47;"};return"string"!=typeof a?a:String(a).replace(/[&<>"'\/\\]/g,function(a){return b[a]})},c.appendMany=function(b,c){if("1.7"===a.fn.jquery.substr(0,3)){var d=a();a.map(c,function(a){d=d.add(a)}),c=d}b.append(c)},c}),b.define("select2/results",["jquery","./utils"],function(a,b){function c(a,b,d){this.$element=a,this.data=d,this.options=b,c.__super__.constructor.call(this)}return b.Extend(c,b.Observable),c.prototype.render=function(){var b=a('<ul class="select2-results__options" role="tree"></ul>');return this.options.get("multiple")&&b.attr("aria-multiselectable","true"),this.$results=b,b},c.prototype.clear=function(){this.$results.empty()},c.prototype.displayMessage=function(b){var c=this.options.get("escapeMarkup");this.clear(),this.hideLoading();var d=a('<li role="treeitem" aria-live="assertive" class="select2-results__option"></li>'),e=this.options.get("translations").get(b.message);d.append(c(e(b.args))),d[0].className+=" select2-results__message",this.$results.append(d)},c.prototype.hideMessages=function(){this.$results.find(".select2-results__message").remove()},c.prototype.append=function(a){this.hideLoading();var b=[];if(null==a.results||0===a.results.length)return void(0===this.$results.children().length&&this.trigger("results:message",{message:"noResults"}));a.results=this.sort(a.results);for(var c=0;c<a.results.length;c++){var d=a.results[c],e=this.option(d);b.push(e)}this.$results.append(b)},c.prototype.position=function(a,b){var c=b.find(".select2-results");c.append(a)},c.prototype.sort=function(a){var b=this.options.get("sorter");return b(a)},c.prototype.highlightFirstItem=function(){var a=this.$results.find(".select2-results__option[aria-selected]"),b=a.filter("[aria-selected=true]");b.length>0?b.first().trigger("mouseenter"):a.first().trigger("mouseenter"),this.ensureHighlightVisible()},c.prototype.setClasses=function(){var b=this;this.data.current(function(c){var d=a.map(c,function(a){return a.id.toString()}),e=b.$results.find(".select2-results__option[aria-selected]");e.each(function(){var b=a(this),c=a.data(this,"data"),e=""+c.id;null!=c.element&&c.element.selected||null==c.element&&a.inArray(e,d)>-1?b.attr("aria-selected","true"):b.attr("aria-selected","false")})})},c.prototype.showLoading=function(a){this.hideLoading();var b=this.options.get("translations").get("searching"),c={disabled:!0,loading:!0,text:b(a)},d=this.option(c);d.className+=" loading-results",this.$results.prepend(d)},c.prototype.hideLoading=function(){this.$results.find(".loading-results").remove()},c.prototype.option=function(b){var c=document.createElement("li");c.className="select2-results__option";var d={role:"treeitem","aria-selected":"false"};b.disabled&&(delete d["aria-selected"],d["aria-disabled"]="true"),null==b.id&&delete d["aria-selected"],null!=b._resultId&&(c.id=b._resultId),b.title&&(c.title=b.title),b.children&&(d.role="group",d["aria-label"]=b.text,delete d["aria-selected"]);for(var e in d){var f=d[e];c.setAttribute(e,f)}if(b.children){var g=a(c),h=document.createElement("strong");h.className="select2-results__group";a(h);this.template(b,h);for(var i=[],j=0;j<b.children.length;j++){var k=b.children[j],l=this.option(k);i.push(l)}var m=a("<ul></ul>",{"class":"select2-results__options select2-results__options--nested"});m.append(i),g.append(h),g.append(m)}else this.template(b,c);return a.data(c,"data",b),c},c.prototype.bind=function(b,c){var d=this,e=b.id+"-results";this.$results.attr("id",e),b.on("results:all",function(a){d.clear(),d.append(a.data),b.isOpen()&&(d.setClasses(),d.highlightFirstItem())}),b.on("results:append",function(a){d.append(a.data),b.isOpen()&&d.setClasses()}),b.on("query",function(a){d.hideMessages(),d.showLoading(a)}),b.on("select",function(){b.isOpen()&&(d.setClasses(),d.highlightFirstItem())}),b.on("unselect",function(){b.isOpen()&&(d.setClasses(),d.highlightFirstItem())}),b.on("open",function(){d.$results.attr("aria-expanded","true"),d.$results.attr("aria-hidden","false"),d.setClasses(),d.ensureHighlightVisible()}),b.on("close",function(){d.$results.attr("aria-expanded","false"),d.$results.attr("aria-hidden","true"),d.$results.removeAttr("aria-activedescendant")}),b.on("results:toggle",function(){var a=d.getHighlightedResults();0!==a.length&&a.trigger("mouseup")}),b.on("results:select",function(){var a=d.getHighlightedResults();if(0!==a.length){var b=a.data("data");"true"==a.attr("aria-selected")?d.trigger("close",{}):d.trigger("select",{data:b})}}),b.on("results:previous",function(){var a=d.getHighlightedResults(),b=d.$results.find("[aria-selected]"),c=b.index(a);if(0!==c){var e=c-1;0===a.length&&(e=0);var f=b.eq(e);f.trigger("mouseenter");var g=d.$results.offset().top,h=f.offset().top,i=d.$results.scrollTop()+(h-g);0===e?d.$results.scrollTop(0):0>h-g&&d.$results.scrollTop(i)}}),b.on("results:next",function(){var a=d.getHighlightedResults(),b=d.$results.find("[aria-selected]"),c=b.index(a),e=c+1;if(!(e>=b.length)){var f=b.eq(e);f.trigger("mouseenter");var g=d.$results.offset().top+d.$results.outerHeight(!1),h=f.offset().top+f.outerHeight(!1),i=d.$results.scrollTop()+h-g;0===e?d.$results.scrollTop(0):h>g&&d.$results.scrollTop(i)}}),b.on("results:focus",function(a){a.element.addClass("select2-results__option--highlighted")}),b.on("results:message",function(a){d.displayMessage(a)}),a.fn.mousewheel&&this.$results.on("mousewheel",function(a){var b=d.$results.scrollTop(),c=d.$results.get(0).scrollHeight-b+a.deltaY,e=a.deltaY>0&&b-a.deltaY<=0,f=a.deltaY<0&&c<=d.$results.height();e?(d.$results.scrollTop(0),a.preventDefault(),a.stopPropagation()):f&&(d.$results.scrollTop(d.$results.get(0).scrollHeight-d.$results.height()),a.preventDefault(),a.stopPropagation())}),this.$results.on("mouseup",".select2-results__option[aria-selected]",function(b){var c=a(this),e=c.data("data");return"true"===c.attr("aria-selected")?void(d.options.get("multiple")?d.trigger("unselect",{originalEvent:b,data:e}):d.trigger("close",{})):void d.trigger("select",{originalEvent:b,data:e})}),this.$results.on("mouseenter",".select2-results__option[aria-selected]",function(b){var c=a(this).data("data");d.getHighlightedResults().removeClass("select2-results__option--highlighted"),d.trigger("results:focus",{data:c,element:a(this)})})},c.prototype.getHighlightedResults=function(){var a=this.$results.find(".select2-results__option--highlighted");return a},c.prototype.destroy=function(){this.$results.remove()},c.prototype.ensureHighlightVisible=function(){var a=this.getHighlightedResults();if(0!==a.length){var b=this.$results.find("[aria-selected]"),c=b.index(a),d=this.$results.offset().top,e=a.offset().top,f=this.$results.scrollTop()+(e-d),g=e-d;f-=2*a.outerHeight(!1),2>=c?this.$results.scrollTop(0):(g>this.$results.outerHeight()||0>g)&&this.$results.scrollTop(f)}},c.prototype.template=function(b,c){var d=this.options.get("templateResult"),e=this.options.get("escapeMarkup"),f=d(b,c);null==f?c.style.display="none":"string"==typeof f?c.innerHTML=e(f):a(c).append(f)},c}),b.define("select2/keys",[],function(){var a={BACKSPACE:8,TAB:9,ENTER:13,SHIFT:16,CTRL:17,ALT:18,ESC:27,SPACE:32,PAGE_UP:33,PAGE_DOWN:34,END:35,HOME:36,LEFT:37,UP:38,RIGHT:39,DOWN:40,DELETE:46};return a}),b.define("select2/selection/base",["jquery","../utils","../keys"],function(a,b,c){function d(a,b){this.$element=a,this.options=b,d.__super__.constructor.call(this)}return b.Extend(d,b.Observable),d.prototype.render=function(){var b=a('<span class="select2-selection" role="combobox"  aria-haspopup="true" aria-expanded="false"></span>');return this._tabindex=0,null!=this.$element.data("old-tabindex")?this._tabindex=this.$element.data("old-tabindex"):null!=this.$element.attr("tabindex")&&(this._tabindex=this.$element.attr("tabindex")),b.attr("title",this.$element.attr("title")),b.attr("tabindex",this._tabindex),this.$selection=b,b},d.prototype.bind=function(a,b){var d=this,e=(a.id+"-container",a.id+"-results");this.container=a,this.$selection.on("focus",function(a){d.trigger("focus",a)}),this.$selection.on("blur",function(a){d._handleBlur(a)}),this.$selection.on("keydown",function(a){d.trigger("keypress",a),a.which===c.SPACE&&a.preventDefault()}),a.on("results:focus",function(a){d.$selection.attr("aria-activedescendant",a.data._resultId)}),a.on("selection:update",function(a){d.update(a.data)}),a.on("open",function(){d.$selection.attr("aria-expanded","true"),d.$selection.attr("aria-owns",e),d._attachCloseHandler(a)}),a.on("close",function(){d.$selection.attr("aria-expanded","false"),d.$selection.removeAttr("aria-activedescendant"),d.$selection.removeAttr("aria-owns"),d.$selection.focus(),d._detachCloseHandler(a)}),a.on("enable",function(){d.$selection.attr("tabindex",d._tabindex)}),a.on("disable",function(){d.$selection.attr("tabindex","-1")})},d.prototype._handleBlur=function(b){var c=this;window.setTimeout(function(){document.activeElement==c.$selection[0]||a.contains(c.$selection[0],document.activeElement)||c.trigger("blur",b)},1)},d.prototype._attachCloseHandler=function(b){a(document.body).on("mousedown.select2."+b.id,function(b){var c=a(b.target),d=c.closest(".select2"),e=a(".select2.select2-container--open");e.each(function(){var b=a(this);if(this!=d[0]){var c=b.data("element");c.select2("close")}})})},d.prototype._detachCloseHandler=function(b){a(document.body).off("mousedown.select2."+b.id)},d.prototype.position=function(a,b){var c=b.find(".selection");c.append(a)},d.prototype.destroy=function(){this._detachCloseHandler(this.container)},d.prototype.update=function(a){throw new Error("The `update` method must be defined in child classes.")},d}),b.define("select2/selection/single",["jquery","./base","../utils","../keys"],function(a,b,c,d){function e(){e.__super__.constructor.apply(this,arguments)}return c.Extend(e,b),e.prototype.render=function(){var a=e.__super__.render.call(this);return a.addClass("select2-selection--single"),a.html('<span class="select2-selection__rendered"></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span>'),a},e.prototype.bind=function(a,b){var c=this;e.__super__.bind.apply(this,arguments);var d=a.id+"-container";this.$selection.find(".select2-selection__rendered").attr("id",d),this.$selection.attr("aria-labelledby",d),this.$selection.on("mousedown",function(a){1===a.which&&c.trigger("toggle",{originalEvent:a})}),this.$selection.on("focus",function(a){}),this.$selection.on("blur",function(a){}),a.on("focus",function(b){a.isOpen()||c.$selection.focus()}),a.on("selection:update",function(a){c.update(a.data)})},e.prototype.clear=function(){this.$selection.find(".select2-selection__rendered").empty()},e.prototype.display=function(a,b){var c=this.options.get("templateSelection"),d=this.options.get("escapeMarkup");return d(c(a,b))},e.prototype.selectionContainer=function(){return a("<span></span>")},e.prototype.update=function(a){if(0===a.length)return void this.clear();var b=a[0],c=this.$selection.find(".select2-selection__rendered"),d=this.display(b,c);c.empty().append(d),c.prop("title",b.title||b.text)},e}),b.define("select2/selection/multiple",["jquery","./base","../utils"],function(a,b,c){function d(a,b){d.__super__.constructor.apply(this,arguments)}return c.Extend(d,b),d.prototype.render=function(){var a=d.__super__.render.call(this);return a.addClass("select2-selection--multiple"),a.html('<ul class="select2-selection__rendered"></ul>'),a},d.prototype.bind=function(b,c){var e=this;d.__super__.bind.apply(this,arguments),this.$selection.on("click",function(a){e.trigger("toggle",{originalEvent:a})}),this.$selection.on("click",".select2-selection__choice__remove",function(b){if(!e.options.get("disabled")){var c=a(this),d=c.parent(),f=d.data("data");e.trigger("unselect",{originalEvent:b,data:f})}})},d.prototype.clear=function(){this.$selection.find(".select2-selection__rendered").empty()},d.prototype.display=function(a,b){var c=this.options.get("templateSelection"),d=this.options.get("escapeMarkup");return d(c(a,b))},d.prototype.selectionContainer=function(){var b=a('<li class="select2-selection__choice"><span class="select2-selection__choice__remove" role="presentation">&times;</span></li>');return b},d.prototype.update=function(a){if(this.clear(),0!==a.length){for(var b=[],d=0;d<a.length;d++){var e=a[d],f=this.selectionContainer(),g=this.display(e,f);f.append(g),f.prop("title",e.title||e.text),f.data("data",e),b.push(f)}var h=this.$selection.find(".select2-selection__rendered");c.appendMany(h,b)}},d}),b.define("select2/selection/placeholder",["../utils"],function(a){function b(a,b,c){this.placeholder=this.normalizePlaceholder(c.get("placeholder")),a.call(this,b,c)}return b.prototype.normalizePlaceholder=function(a,b){return"string"==typeof b&&(b={id:"",text:b}),b},b.prototype.createPlaceholder=function(a,b){var c=this.selectionContainer();return c.html(this.display(b)),c.addClass("select2-selection__placeholder").removeClass("select2-selection__choice"),c},b.prototype.update=function(a,b){var c=1==b.length&&b[0].id!=this.placeholder.id,d=b.length>1;if(d||c)return a.call(this,b);this.clear();var e=this.createPlaceholder(this.placeholder);this.$selection.find(".select2-selection__rendered").append(e)},b}),b.define("select2/selection/allowClear",["jquery","../keys"],function(a,b){function c(){}return c.prototype.bind=function(a,b,c){var d=this;a.call(this,b,c),null==this.placeholder&&this.options.get("debug")&&window.console&&console.error&&console.error("Select2: The `allowClear` option should be used in combination with the `placeholder` option."),this.$selection.on("mousedown",".select2-selection__clear",function(a){d._handleClear(a)}),b.on("keypress",function(a){d._handleKeyboardClear(a,b)})},c.prototype._handleClear=function(a,b){if(!this.options.get("disabled")){var c=this.$selection.find(".select2-selection__clear");if(0!==c.length){b.stopPropagation();for(var d=c.data("data"),e=0;e<d.length;e++){var f={data:d[e]};if(this.trigger("unselect",f),f.prevented)return}this.$element.val(this.placeholder.id).trigger("change"),this.trigger("toggle",{})}}},c.prototype._handleKeyboardClear=function(a,c,d){d.isOpen()||(c.which==b.DELETE||c.which==b.BACKSPACE)&&this._handleClear(c)},c.prototype.update=function(b,c){if(b.call(this,c),!(this.$selection.find(".select2-selection__placeholder").length>0||0===c.length)){var d=a('<span class="select2-selection__clear">&times;</span>');d.data("data",c),this.$selection.find(".select2-selection__rendered").prepend(d)}},c}),b.define("select2/selection/search",["jquery","../utils","../keys"],function(a,b,c){function d(a,b,c){a.call(this,b,c)}return d.prototype.render=function(b){var c=a('<li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="-1" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" role="textbox" aria-autocomplete="list" /></li>');this.$searchContainer=c,this.$search=c.find("input");var d=b.call(this);return this._transferTabIndex(),d},d.prototype.bind=function(a,b,d){var e=this;a.call(this,b,d),b.on("open",function(){e.$search.trigger("focus")}),b.on("close",function(){e.$search.val(""),e.$search.removeAttr("aria-activedescendant"),e.$search.trigger("focus")}),b.on("enable",function(){e.$search.prop("disabled",!1),e._transferTabIndex()}),b.on("disable",function(){e.$search.prop("disabled",!0)}),b.on("focus",function(a){e.$search.trigger("focus")}),b.on("results:focus",function(a){e.$search.attr("aria-activedescendant",a.id)}),this.$selection.on("focusin",".select2-search--inline",function(a){e.trigger("focus",a)}),this.$selection.on("focusout",".select2-search--inline",function(a){e._handleBlur(a)}),this.$selection.on("keydown",".select2-search--inline",function(a){a.stopPropagation(),e.trigger("keypress",a),e._keyUpPrevented=a.isDefaultPrevented();var b=a.which;if(b===c.BACKSPACE&&""===e.$search.val()){var d=e.$searchContainer.prev(".select2-selection__choice");if(d.length>0){var f=d.data("data");e.searchRemoveChoice(f),a.preventDefault()}}});var f=document.documentMode,g=f&&11>=f;this.$selection.on("input.searchcheck",".select2-search--inline",function(a){return g?void e.$selection.off("input.search input.searchcheck"):void e.$selection.off("keyup.search")}),this.$selection.on("keyup.search input.search",".select2-search--inline",function(a){if(g&&"input"===a.type)return void e.$selection.off("input.search input.searchcheck");var b=a.which;b!=c.SHIFT&&b!=c.CTRL&&b!=c.ALT&&b!=c.TAB&&e.handleSearch(a)})},d.prototype._transferTabIndex=function(a){this.$search.attr("tabindex",this.$selection.attr("tabindex")),this.$selection.attr("tabindex","-1")},d.prototype.createPlaceholder=function(a,b){this.$search.attr("placeholder",b.text)},d.prototype.update=function(a,b){var c=this.$search[0]==document.activeElement;this.$search.attr("placeholder",""),a.call(this,b),this.$selection.find(".select2-selection__rendered").append(this.$searchContainer),this.resizeSearch(),c&&this.$search.focus()},d.prototype.handleSearch=function(){if(this.resizeSearch(),!this._keyUpPrevented){var a=this.$search.val();this.trigger("query",{term:a})}this._keyUpPrevented=!1},d.prototype.searchRemoveChoice=function(a,b){this.trigger("unselect",{data:b}),this.$search.val(b.text),this.handleSearch()},d.prototype.resizeSearch=function(){this.$search.css("width","25px");var a="";if(""!==this.$search.attr("placeholder"))a=this.$selection.find(".select2-selection__rendered").innerWidth();else{var b=this.$search.val().length+1;a=.75*b+"em"}this.$search.css("width",a)},d}),b.define("select2/selection/eventRelay",["jquery"],function(a){function b(){}return b.prototype.bind=function(b,c,d){var e=this,f=["open","opening","close","closing","select","selecting","unselect","unselecting"],g=["opening","closing","selecting","unselecting"];b.call(this,c,d),c.on("*",function(b,c){if(-1!==a.inArray(b,f)){c=c||{};var d=a.Event("select2:"+b,{params:c});e.$element.trigger(d),-1!==a.inArray(b,g)&&(c.prevented=d.isDefaultPrevented())}})},b}),b.define("select2/translation",["jquery","require"],function(a,b){function c(a){this.dict=a||{}}return c.prototype.all=function(){return this.dict},c.prototype.get=function(a){return this.dict[a]},c.prototype.extend=function(b){this.dict=a.extend({},b.all(),this.dict)},c._cache={},c.loadPath=function(a){if(!(a in c._cache)){var d=b(a);c._cache[a]=d}return new c(c._cache[a])},c}),b.define("select2/diacritics",[],function(){var a={"Ⓐ":"A","Ａ":"A","À":"A","Á":"A","Â":"A","Ầ":"A","Ấ":"A","Ẫ":"A","Ẩ":"A","Ã":"A","Ā":"A","Ă":"A","Ằ":"A","Ắ":"A","Ẵ":"A","Ẳ":"A","Ȧ":"A","Ǡ":"A","Ä":"A","Ǟ":"A","Ả":"A","Å":"A","Ǻ":"A","Ǎ":"A","Ȁ":"A","Ȃ":"A","Ạ":"A","Ậ":"A","Ặ":"A","Ḁ":"A","Ą":"A","Ⱥ":"A","Ɐ":"A","Ꜳ":"AA","Æ":"AE","Ǽ":"AE","Ǣ":"AE","Ꜵ":"AO","Ꜷ":"AU","Ꜹ":"AV","Ꜻ":"AV","Ꜽ":"AY","Ⓑ":"B","Ｂ":"B","Ḃ":"B","Ḅ":"B","Ḇ":"B","Ƀ":"B","Ƃ":"B","Ɓ":"B","Ⓒ":"C","Ｃ":"C","Ć":"C","Ĉ":"C","Ċ":"C","Č":"C","Ç":"C","Ḉ":"C","Ƈ":"C","Ȼ":"C","Ꜿ":"C","Ⓓ":"D","Ｄ":"D","Ḋ":"D","Ď":"D","Ḍ":"D","Ḑ":"D","Ḓ":"D","Ḏ":"D","Đ":"D","Ƌ":"D","Ɗ":"D","Ɖ":"D","Ꝺ":"D","Ǳ":"DZ","Ǆ":"DZ","ǲ":"Dz","ǅ":"Dz","Ⓔ":"E","Ｅ":"E","È":"E","É":"E","Ê":"E","Ề":"E","Ế":"E","Ễ":"E","Ể":"E","Ẽ":"E","Ē":"E","Ḕ":"E","Ḗ":"E","Ĕ":"E","Ė":"E","Ë":"E","Ẻ":"E","Ě":"E","Ȅ":"E","Ȇ":"E","Ẹ":"E","Ệ":"E","Ȩ":"E","Ḝ":"E","Ę":"E","Ḙ":"E","Ḛ":"E","Ɛ":"E","Ǝ":"E","Ⓕ":"F","Ｆ":"F","Ḟ":"F","Ƒ":"F","Ꝼ":"F","Ⓖ":"G","Ｇ":"G","Ǵ":"G","Ĝ":"G","Ḡ":"G","Ğ":"G","Ġ":"G","Ǧ":"G","Ģ":"G","Ǥ":"G","Ɠ":"G","Ꞡ":"G","Ᵹ":"G","Ꝿ":"G","Ⓗ":"H","Ｈ":"H","Ĥ":"H","Ḣ":"H","Ḧ":"H","Ȟ":"H","Ḥ":"H","Ḩ":"H","Ḫ":"H","Ħ":"H","Ⱨ":"H","Ⱶ":"H","Ɥ":"H","Ⓘ":"I","Ｉ":"I","Ì":"I","Í":"I","Î":"I","Ĩ":"I","Ī":"I","Ĭ":"I","İ":"I","Ï":"I","Ḯ":"I","Ỉ":"I","Ǐ":"I","Ȉ":"I","Ȋ":"I","Ị":"I","Į":"I","Ḭ":"I","Ɨ":"I","Ⓙ":"J","Ｊ":"J","Ĵ":"J","Ɉ":"J","Ⓚ":"K","Ｋ":"K","Ḱ":"K","Ǩ":"K","Ḳ":"K","Ķ":"K","Ḵ":"K","Ƙ":"K","Ⱪ":"K","Ꝁ":"K","Ꝃ":"K","Ꝅ":"K","Ꞣ":"K","Ⓛ":"L","Ｌ":"L","Ŀ":"L","Ĺ":"L","Ľ":"L","Ḷ":"L","Ḹ":"L","Ļ":"L","Ḽ":"L","Ḻ":"L","Ł":"L","Ƚ":"L","Ɫ":"L","Ⱡ":"L","Ꝉ":"L","Ꝇ":"L","Ꞁ":"L","Ǉ":"LJ","ǈ":"Lj","Ⓜ":"M","Ｍ":"M","Ḿ":"M","Ṁ":"M","Ṃ":"M","Ɱ":"M","Ɯ":"M","Ⓝ":"N","Ｎ":"N","Ǹ":"N","Ń":"N","Ñ":"N","Ṅ":"N","Ň":"N","Ṇ":"N","Ņ":"N","Ṋ":"N","Ṉ":"N","Ƞ":"N","Ɲ":"N","Ꞑ":"N","Ꞥ":"N","Ǌ":"NJ","ǋ":"Nj","Ⓞ":"O","Ｏ":"O","Ò":"O","Ó":"O","Ô":"O","Ồ":"O","Ố":"O","Ỗ":"O","Ổ":"O","Õ":"O","Ṍ":"O","Ȭ":"O","Ṏ":"O","Ō":"O","Ṑ":"O","Ṓ":"O","Ŏ":"O","Ȯ":"O","Ȱ":"O","Ö":"O","Ȫ":"O","Ỏ":"O","Ő":"O","Ǒ":"O","Ȍ":"O","Ȏ":"O","Ơ":"O","Ờ":"O","Ớ":"O","Ỡ":"O","Ở":"O","Ợ":"O","Ọ":"O","Ộ":"O","Ǫ":"O","Ǭ":"O","Ø":"O","Ǿ":"O","Ɔ":"O","Ɵ":"O","Ꝋ":"O","Ꝍ":"O","Ƣ":"OI","Ꝏ":"OO","Ȣ":"OU","Ⓟ":"P","Ｐ":"P","Ṕ":"P","Ṗ":"P","Ƥ":"P","Ᵽ":"P","Ꝑ":"P","Ꝓ":"P","Ꝕ":"P","Ⓠ":"Q","Ｑ":"Q","Ꝗ":"Q","Ꝙ":"Q","Ɋ":"Q","Ⓡ":"R","Ｒ":"R","Ŕ":"R","Ṙ":"R","Ř":"R","Ȑ":"R","Ȓ":"R","Ṛ":"R","Ṝ":"R","Ŗ":"R","Ṟ":"R","Ɍ":"R","Ɽ":"R","Ꝛ":"R","Ꞧ":"R","Ꞃ":"R","Ⓢ":"S","Ｓ":"S","ẞ":"S","Ś":"S","Ṥ":"S","Ŝ":"S","Ṡ":"S","Š":"S","Ṧ":"S","Ṣ":"S","Ṩ":"S","Ș":"S","Ş":"S","Ȿ":"S","Ꞩ":"S","Ꞅ":"S","Ⓣ":"T","Ｔ":"T","Ṫ":"T","Ť":"T","Ṭ":"T","Ț":"T","Ţ":"T","Ṱ":"T","Ṯ":"T","Ŧ":"T","Ƭ":"T","Ʈ":"T","Ⱦ":"T","Ꞇ":"T","Ꜩ":"TZ","Ⓤ":"U","Ｕ":"U","Ù":"U","Ú":"U","Û":"U","Ũ":"U","Ṹ":"U","Ū":"U","Ṻ":"U","Ŭ":"U","Ü":"U","Ǜ":"U","Ǘ":"U","Ǖ":"U","Ǚ":"U","Ủ":"U","Ů":"U","Ű":"U","Ǔ":"U","Ȕ":"U","Ȗ":"U","Ư":"U","Ừ":"U","Ứ":"U","Ữ":"U","Ử":"U","Ự":"U","Ụ":"U","Ṳ":"U","Ų":"U","Ṷ":"U","Ṵ":"U","Ʉ":"U","Ⓥ":"V","Ｖ":"V","Ṽ":"V","Ṿ":"V","Ʋ":"V","Ꝟ":"V","Ʌ":"V","Ꝡ":"VY","Ⓦ":"W","Ｗ":"W","Ẁ":"W","Ẃ":"W","Ŵ":"W","Ẇ":"W","Ẅ":"W","Ẉ":"W","Ⱳ":"W","Ⓧ":"X","Ｘ":"X","Ẋ":"X","Ẍ":"X","Ⓨ":"Y","Ｙ":"Y","Ỳ":"Y","Ý":"Y","Ŷ":"Y","Ỹ":"Y","Ȳ":"Y","Ẏ":"Y","Ÿ":"Y","Ỷ":"Y","Ỵ":"Y","Ƴ":"Y","Ɏ":"Y","Ỿ":"Y","Ⓩ":"Z","Ｚ":"Z","Ź":"Z","Ẑ":"Z","Ż":"Z","Ž":"Z","Ẓ":"Z","Ẕ":"Z","Ƶ":"Z","Ȥ":"Z","Ɀ":"Z","Ⱬ":"Z","Ꝣ":"Z","ⓐ":"a","ａ":"a","ẚ":"a","à":"a","á":"a","â":"a","ầ":"a","ấ":"a","ẫ":"a","ẩ":"a","ã":"a","ā":"a","ă":"a","ằ":"a","ắ":"a","ẵ":"a","ẳ":"a","ȧ":"a","ǡ":"a","ä":"a","ǟ":"a","ả":"a","å":"a","ǻ":"a","ǎ":"a","ȁ":"a","ȃ":"a","ạ":"a","ậ":"a","ặ":"a","ḁ":"a","ą":"a","ⱥ":"a","ɐ":"a","ꜳ":"aa","æ":"ae","ǽ":"ae","ǣ":"ae","ꜵ":"ao","ꜷ":"au","ꜹ":"av","ꜻ":"av","ꜽ":"ay","ⓑ":"b","ｂ":"b","ḃ":"b","ḅ":"b","ḇ":"b","ƀ":"b","ƃ":"b","ɓ":"b","ⓒ":"c","ｃ":"c","ć":"c","ĉ":"c","ċ":"c","č":"c","ç":"c","ḉ":"c","ƈ":"c","ȼ":"c","ꜿ":"c","ↄ":"c","ⓓ":"d","ｄ":"d","ḋ":"d","ď":"d","ḍ":"d","ḑ":"d","ḓ":"d","ḏ":"d","đ":"d","ƌ":"d","ɖ":"d","ɗ":"d","ꝺ":"d","ǳ":"dz","ǆ":"dz","ⓔ":"e","ｅ":"e","è":"e","é":"e","ê":"e","ề":"e","ế":"e","ễ":"e","ể":"e","ẽ":"e","ē":"e","ḕ":"e","ḗ":"e","ĕ":"e","ė":"e","ë":"e","ẻ":"e","ě":"e","ȅ":"e","ȇ":"e","ẹ":"e","ệ":"e","ȩ":"e","ḝ":"e","ę":"e","ḙ":"e","ḛ":"e","ɇ":"e","ɛ":"e","ǝ":"e","ⓕ":"f","ｆ":"f","ḟ":"f","ƒ":"f","ꝼ":"f","ⓖ":"g","ｇ":"g","ǵ":"g","ĝ":"g","ḡ":"g","ğ":"g","ġ":"g","ǧ":"g","ģ":"g","ǥ":"g","ɠ":"g","ꞡ":"g","ᵹ":"g","ꝿ":"g","ⓗ":"h","ｈ":"h","ĥ":"h","ḣ":"h","ḧ":"h","ȟ":"h","ḥ":"h","ḩ":"h","ḫ":"h","ẖ":"h","ħ":"h","ⱨ":"h","ⱶ":"h","ɥ":"h","ƕ":"hv","ⓘ":"i","ｉ":"i","ì":"i","í":"i","î":"i","ĩ":"i","ī":"i","ĭ":"i","ï":"i","ḯ":"i","ỉ":"i","ǐ":"i","ȉ":"i","ȋ":"i","ị":"i","į":"i","ḭ":"i","ɨ":"i","ı":"i","ⓙ":"j","ｊ":"j","ĵ":"j","ǰ":"j","ɉ":"j","ⓚ":"k","ｋ":"k","ḱ":"k","ǩ":"k","ḳ":"k","ķ":"k","ḵ":"k","ƙ":"k","ⱪ":"k","ꝁ":"k","ꝃ":"k","ꝅ":"k","ꞣ":"k","ⓛ":"l","ｌ":"l","ŀ":"l","ĺ":"l","ľ":"l","ḷ":"l","ḹ":"l","ļ":"l","ḽ":"l","ḻ":"l","ſ":"l","ł":"l","ƚ":"l","ɫ":"l","ⱡ":"l","ꝉ":"l","ꞁ":"l","ꝇ":"l","ǉ":"lj","ⓜ":"m","ｍ":"m","ḿ":"m","ṁ":"m","ṃ":"m","ɱ":"m","ɯ":"m","ⓝ":"n","ｎ":"n","ǹ":"n","ń":"n","ñ":"n","ṅ":"n","ň":"n","ṇ":"n","ņ":"n","ṋ":"n","ṉ":"n","ƞ":"n","ɲ":"n","ŉ":"n","ꞑ":"n","ꞥ":"n","ǌ":"nj","ⓞ":"o","ｏ":"o","ò":"o","ó":"o","ô":"o","ồ":"o","ố":"o","ỗ":"o","ổ":"o","õ":"o","ṍ":"o","ȭ":"o","ṏ":"o","ō":"o","ṑ":"o","ṓ":"o","ŏ":"o","ȯ":"o","ȱ":"o","ö":"o","ȫ":"o","ỏ":"o","ő":"o","ǒ":"o","ȍ":"o","ȏ":"o","ơ":"o","ờ":"o","ớ":"o","ỡ":"o","ở":"o","ợ":"o","ọ":"o","ộ":"o","ǫ":"o","ǭ":"o","ø":"o","ǿ":"o","ɔ":"o","ꝋ":"o","ꝍ":"o","ɵ":"o","ƣ":"oi","ȣ":"ou","ꝏ":"oo","ⓟ":"p","ｐ":"p","ṕ":"p","ṗ":"p","ƥ":"p","ᵽ":"p","ꝑ":"p","ꝓ":"p","ꝕ":"p","ⓠ":"q","ｑ":"q","ɋ":"q","ꝗ":"q","ꝙ":"q","ⓡ":"r","ｒ":"r","ŕ":"r","ṙ":"r","ř":"r","ȑ":"r","ȓ":"r","ṛ":"r","ṝ":"r","ŗ":"r","ṟ":"r","ɍ":"r","ɽ":"r","ꝛ":"r","ꞧ":"r","ꞃ":"r","ⓢ":"s","ｓ":"s","ß":"s","ś":"s","ṥ":"s","ŝ":"s","ṡ":"s","š":"s","ṧ":"s","ṣ":"s","ṩ":"s","ș":"s","ş":"s","ȿ":"s","ꞩ":"s","ꞅ":"s","ẛ":"s","ⓣ":"t","ｔ":"t","ṫ":"t","ẗ":"t","ť":"t","ṭ":"t","ț":"t","ţ":"t","ṱ":"t","ṯ":"t","ŧ":"t","ƭ":"t","ʈ":"t","ⱦ":"t","ꞇ":"t","ꜩ":"tz","ⓤ":"u","ｕ":"u","ù":"u","ú":"u","û":"u","ũ":"u","ṹ":"u","ū":"u","ṻ":"u","ŭ":"u","ü":"u","ǜ":"u","ǘ":"u","ǖ":"u","ǚ":"u","ủ":"u","ů":"u","ű":"u","ǔ":"u","ȕ":"u","ȗ":"u","ư":"u","ừ":"u","ứ":"u","ữ":"u","ử":"u","ự":"u","ụ":"u","ṳ":"u","ų":"u","ṷ":"u","ṵ":"u","ʉ":"u","ⓥ":"v","ｖ":"v","ṽ":"v","ṿ":"v","ʋ":"v","ꝟ":"v","ʌ":"v","ꝡ":"vy","ⓦ":"w","ｗ":"w","ẁ":"w","ẃ":"w","ŵ":"w","ẇ":"w","ẅ":"w","ẘ":"w","ẉ":"w","ⱳ":"w","ⓧ":"x","ｘ":"x","ẋ":"x","ẍ":"x","ⓨ":"y","ｙ":"y","ỳ":"y","ý":"y","ŷ":"y","ỹ":"y","ȳ":"y","ẏ":"y","ÿ":"y","ỷ":"y","ẙ":"y","ỵ":"y","ƴ":"y","ɏ":"y","ỿ":"y","ⓩ":"z","ｚ":"z","ź":"z","ẑ":"z","ż":"z","ž":"z","ẓ":"z","ẕ":"z","ƶ":"z","ȥ":"z","ɀ":"z","ⱬ":"z","ꝣ":"z","Ά":"Α","Έ":"Ε","Ή":"Η","Ί":"Ι","Ϊ":"Ι","Ό":"Ο","Ύ":"Υ","Ϋ":"Υ","Ώ":"Ω","ά":"α","έ":"ε","ή":"η","ί":"ι","ϊ":"ι","ΐ":"ι","ό":"ο","ύ":"υ","ϋ":"υ","ΰ":"υ","ω":"ω","ς":"σ"};return a}),b.define("select2/data/base",["../utils"],function(a){function b(a,c){b.__super__.constructor.call(this)}return a.Extend(b,a.Observable),b.prototype.current=function(a){throw new Error("The `current` method must be defined in child classes.")},b.prototype.query=function(a,b){throw new Error("The `query` method must be defined in child classes.")},b.prototype.bind=function(a,b){},b.prototype.destroy=function(){},b.prototype.generateResultId=function(b,c){var d=b.id+"-result-";return d+=a.generateChars(4),d+=null!=c.id?"-"+c.id.toString():"-"+a.generateChars(4)},b}),b.define("select2/data/select",["./base","../utils","jquery"],function(a,b,c){function d(a,b){this.$element=a,this.options=b,d.__super__.constructor.call(this)}return b.Extend(d,a),d.prototype.current=function(a){var b=[],d=this;this.$element.find(":selected").each(function(){var a=c(this),e=d.item(a);b.push(e)}),a(b)},d.prototype.select=function(a){var b=this;if(a.selected=!0,c(a.element).is("option"))return a.element.selected=!0,void this.$element.trigger("change");
    if(this.$element.prop("multiple"))this.current(function(d){var e=[];a=[a],a.push.apply(a,d);for(var f=0;f<a.length;f++){var g=a[f].id;-1===c.inArray(g,e)&&e.push(g)}b.$element.val(e),b.$element.trigger("change")});else{var d=a.id;this.$element.val(d),this.$element.trigger("change")}},d.prototype.unselect=function(a){var b=this;if(this.$element.prop("multiple"))return a.selected=!1,c(a.element).is("option")?(a.element.selected=!1,void this.$element.trigger("change")):void this.current(function(d){for(var e=[],f=0;f<d.length;f++){var g=d[f].id;g!==a.id&&-1===c.inArray(g,e)&&e.push(g)}b.$element.val(e),b.$element.trigger("change")})},d.prototype.bind=function(a,b){var c=this;this.container=a,a.on("select",function(a){c.select(a.data)}),a.on("unselect",function(a){c.unselect(a.data)})},d.prototype.destroy=function(){this.$element.find("*").each(function(){c.removeData(this,"data")})},d.prototype.query=function(a,b){var d=[],e=this,f=this.$element.children();f.each(function(){var b=c(this);if(b.is("option")||b.is("optgroup")){var f=e.item(b),g=e.matches(a,f);null!==g&&d.push(g)}}),b({results:d})},d.prototype.addOptions=function(a){b.appendMany(this.$element,a)},d.prototype.option=function(a){var b;a.children?(b=document.createElement("optgroup"),b.label=a.text):(b=document.createElement("option"),void 0!==b.textContent?b.textContent=a.text:b.innerText=a.text),a.id&&(b.value=a.id),a.disabled&&(b.disabled=!0),a.selected&&(b.selected=!0),a.title&&(b.title=a.title);var d=c(b),e=this._normalizeItem(a);return e.element=b,c.data(b,"data",e),d},d.prototype.item=function(a){var b={};if(b=c.data(a[0],"data"),null!=b)return b;if(a.is("option"))b={id:a.val(),text:a.text(),disabled:a.prop("disabled"),selected:a.prop("selected"),title:a.prop("title")};else if(a.is("optgroup")){b={text:a.prop("label"),children:[],title:a.prop("title")};for(var d=a.children("option"),e=[],f=0;f<d.length;f++){var g=c(d[f]),h=this.item(g);e.push(h)}b.children=e}return b=this._normalizeItem(b),b.element=a[0],c.data(a[0],"data",b),b},d.prototype._normalizeItem=function(a){c.isPlainObject(a)||(a={id:a,text:a}),a=c.extend({},{text:""},a);var b={selected:!1,disabled:!1};return null!=a.id&&(a.id=a.id.toString()),null!=a.text&&(a.text=a.text.toString()),null==a._resultId&&a.id&&null!=this.container&&(a._resultId=this.generateResultId(this.container,a)),c.extend({},b,a)},d.prototype.matches=function(a,b){var c=this.options.get("matcher");return c(a,b)},d}),b.define("select2/data/array",["./select","../utils","jquery"],function(a,b,c){function d(a,b){var c=b.get("data")||[];d.__super__.constructor.call(this,a,b),this.addOptions(this.convertToOptions(c))}return b.Extend(d,a),d.prototype.select=function(a){var b=this.$element.find("option").filter(function(b,c){return c.value==a.id.toString()});0===b.length&&(b=this.option(a),this.addOptions(b)),d.__super__.select.call(this,a)},d.prototype.convertToOptions=function(a){function d(a){return function(){return c(this).val()==a.id}}for(var e=this,f=this.$element.find("option"),g=f.map(function(){return e.item(c(this)).id}).get(),h=[],i=0;i<a.length;i++){var j=this._normalizeItem(a[i]);if(c.inArray(j.id,g)>=0){var k=f.filter(d(j)),l=this.item(k),m=c.extend(!0,{},j,l),n=this.option(m);k.replaceWith(n)}else{var o=this.option(j);if(j.children){var p=this.convertToOptions(j.children);b.appendMany(o,p)}h.push(o)}}return h},d}),b.define("select2/data/ajax",["./array","../utils","jquery"],function(a,b,c){function d(a,b){this.ajaxOptions=this._applyDefaults(b.get("ajax")),null!=this.ajaxOptions.processResults&&(this.processResults=this.ajaxOptions.processResults),d.__super__.constructor.call(this,a,b)}return b.Extend(d,a),d.prototype._applyDefaults=function(a){var b={data:function(a){return c.extend({},a,{q:a.term})},transport:function(a,b,d){var e=c.ajax(a);return e.then(b),e.fail(d),e}};return c.extend({},b,a,!0)},d.prototype.processResults=function(a){return a},d.prototype.query=function(a,b){function d(){var d=f.transport(f,function(d){var f=e.processResults(d,a);e.options.get("debug")&&window.console&&console.error&&(f&&f.results&&c.isArray(f.results)||console.error("Select2: The AJAX results did not return an array in the `results` key of the response.")),b(f)},function(){d.status&&"0"===d.status||e.trigger("results:message",{message:"errorLoading"})});e._request=d}var e=this;null!=this._request&&(c.isFunction(this._request.abort)&&this._request.abort(),this._request=null);var f=c.extend({type:"GET"},this.ajaxOptions);"function"==typeof f.url&&(f.url=f.url.call(this.$element,a)),"function"==typeof f.data&&(f.data=f.data.call(this.$element,a)),this.ajaxOptions.delay&&null!=a.term?(this._queryTimeout&&window.clearTimeout(this._queryTimeout),this._queryTimeout=window.setTimeout(d,this.ajaxOptions.delay)):d()},d}),b.define("select2/data/tags",["jquery"],function(a){function b(b,c,d){var e=d.get("tags"),f=d.get("createTag");void 0!==f&&(this.createTag=f);var g=d.get("insertTag");if(void 0!==g&&(this.insertTag=g),b.call(this,c,d),a.isArray(e))for(var h=0;h<e.length;h++){var i=e[h],j=this._normalizeItem(i),k=this.option(j);this.$element.append(k)}}return b.prototype.query=function(a,b,c){function d(a,f){for(var g=a.results,h=0;h<g.length;h++){var i=g[h],j=null!=i.children&&!d({results:i.children},!0),k=i.text===b.term;if(k||j)return f?!1:(a.data=g,void c(a))}if(f)return!0;var l=e.createTag(b);if(null!=l){var m=e.option(l);m.attr("data-select2-tag",!0),e.addOptions([m]),e.insertTag(g,l)}a.results=g,c(a)}var e=this;return this._removeOldTags(),null==b.term||null!=b.page?void a.call(this,b,c):void a.call(this,b,d)},b.prototype.createTag=function(b,c){var d=a.trim(c.term);return""===d?null:{id:d,text:d}},b.prototype.insertTag=function(a,b,c){b.unshift(c)},b.prototype._removeOldTags=function(b){var c=(this._lastTag,this.$element.find("option[data-select2-tag]"));c.each(function(){this.selected||a(this).remove()})},b}),b.define("select2/data/tokenizer",["jquery"],function(a){function b(a,b,c){var d=c.get("tokenizer");void 0!==d&&(this.tokenizer=d),a.call(this,b,c)}return b.prototype.bind=function(a,b,c){a.call(this,b,c),this.$search=b.dropdown.$search||b.selection.$search||c.find(".select2-search__field")},b.prototype.query=function(b,c,d){function e(b){var c=g._normalizeItem(b),d=g.$element.find("option").filter(function(){return a(this).val()===c.id});if(!d.length){var e=g.option(c);e.attr("data-select2-tag",!0),g._removeOldTags(),g.addOptions([e])}f(c)}function f(a){g.trigger("select",{data:a})}var g=this;c.term=c.term||"";var h=this.tokenizer(c,this.options,e);h.term!==c.term&&(this.$search.length&&(this.$search.val(h.term),this.$search.focus()),c.term=h.term),b.call(this,c,d)},b.prototype.tokenizer=function(b,c,d,e){for(var f=d.get("tokenSeparators")||[],g=c.term,h=0,i=this.createTag||function(a){return{id:a.term,text:a.term}};h<g.length;){var j=g[h];if(-1!==a.inArray(j,f)){var k=g.substr(0,h),l=a.extend({},c,{term:k}),m=i(l);null!=m?(e(m),g=g.substr(h+1)||"",h=0):h++}else h++}return{term:g}},b}),b.define("select2/data/minimumInputLength",[],function(){function a(a,b,c){this.minimumInputLength=c.get("minimumInputLength"),a.call(this,b,c)}return a.prototype.query=function(a,b,c){return b.term=b.term||"",b.term.length<this.minimumInputLength?void this.trigger("results:message",{message:"inputTooShort",args:{minimum:this.minimumInputLength,input:b.term,params:b}}):void a.call(this,b,c)},a}),b.define("select2/data/maximumInputLength",[],function(){function a(a,b,c){this.maximumInputLength=c.get("maximumInputLength"),a.call(this,b,c)}return a.prototype.query=function(a,b,c){return b.term=b.term||"",this.maximumInputLength>0&&b.term.length>this.maximumInputLength?void this.trigger("results:message",{message:"inputTooLong",args:{maximum:this.maximumInputLength,input:b.term,params:b}}):void a.call(this,b,c)},a}),b.define("select2/data/maximumSelectionLength",[],function(){function a(a,b,c){this.maximumSelectionLength=c.get("maximumSelectionLength"),a.call(this,b,c)}return a.prototype.query=function(a,b,c){var d=this;this.current(function(e){var f=null!=e?e.length:0;return d.maximumSelectionLength>0&&f>=d.maximumSelectionLength?void d.trigger("results:message",{message:"maximumSelected",args:{maximum:d.maximumSelectionLength}}):void a.call(d,b,c)})},a}),b.define("select2/dropdown",["jquery","./utils"],function(a,b){function c(a,b){this.$element=a,this.options=b,c.__super__.constructor.call(this)}return b.Extend(c,b.Observable),c.prototype.render=function(){var b=a('<span class="select2-dropdown"><span class="select2-results"></span></span>');return b.attr("dir",this.options.get("dir")),this.$dropdown=b,b},c.prototype.bind=function(){},c.prototype.position=function(a,b){},c.prototype.destroy=function(){this.$dropdown.remove()},c}),b.define("select2/dropdown/search",["jquery","../utils"],function(a,b){function c(){}return c.prototype.render=function(b){var c=b.call(this),d=a('<span class="select2-search select2-search--dropdown"><input class="select2-search__field" type="search" tabindex="-1" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" role="textbox" /></span>');return this.$searchContainer=d,this.$search=d.find("input"),c.prepend(d),c},c.prototype.bind=function(b,c,d){var e=this;b.call(this,c,d),this.$search.on("keydown",function(a){e.trigger("keypress",a),e._keyUpPrevented=a.isDefaultPrevented()}),this.$search.on("input",function(b){a(this).off("keyup")}),this.$search.on("keyup input",function(a){e.handleSearch(a)}),c.on("open",function(){e.$search.attr("tabindex",0),e.$search.focus(),window.setTimeout(function(){e.$search.focus()},0)}),c.on("close",function(){e.$search.attr("tabindex",-1),e.$search.val("")}),c.on("focus",function(){c.isOpen()&&e.$search.focus()}),c.on("results:all",function(a){if(null==a.query.term||""===a.query.term){var b=e.showSearch(a);b?e.$searchContainer.removeClass("select2-search--hide"):e.$searchContainer.addClass("select2-search--hide")}})},c.prototype.handleSearch=function(a){if(!this._keyUpPrevented){var b=this.$search.val();this.trigger("query",{term:b})}this._keyUpPrevented=!1},c.prototype.showSearch=function(a,b){return!0},c}),b.define("select2/dropdown/hidePlaceholder",[],function(){function a(a,b,c,d){this.placeholder=this.normalizePlaceholder(c.get("placeholder")),a.call(this,b,c,d)}return a.prototype.append=function(a,b){b.results=this.removePlaceholder(b.results),a.call(this,b)},a.prototype.normalizePlaceholder=function(a,b){return"string"==typeof b&&(b={id:"",text:b}),b},a.prototype.removePlaceholder=function(a,b){for(var c=b.slice(0),d=b.length-1;d>=0;d--){var e=b[d];this.placeholder.id===e.id&&c.splice(d,1)}return c},a}),b.define("select2/dropdown/infiniteScroll",["jquery"],function(a){function b(a,b,c,d){this.lastParams={},a.call(this,b,c,d),this.$loadingMore=this.createLoadingMore(),this.loading=!1}return b.prototype.append=function(a,b){this.$loadingMore.remove(),this.loading=!1,a.call(this,b),this.showLoadingMore(b)&&this.$results.append(this.$loadingMore)},b.prototype.bind=function(b,c,d){var e=this;b.call(this,c,d),c.on("query",function(a){e.lastParams=a,e.loading=!0}),c.on("query:append",function(a){e.lastParams=a,e.loading=!0}),this.$results.on("scroll",function(){var b=a.contains(document.documentElement,e.$loadingMore[0]);if(!e.loading&&b){var c=e.$results.offset().top+e.$results.outerHeight(!1),d=e.$loadingMore.offset().top+e.$loadingMore.outerHeight(!1);c+50>=d&&e.loadMore()}})},b.prototype.loadMore=function(){this.loading=!0;var b=a.extend({},{page:1},this.lastParams);b.page++,this.trigger("query:append",b)},b.prototype.showLoadingMore=function(a,b){return b.pagination&&b.pagination.more},b.prototype.createLoadingMore=function(){var b=a('<li class="select2-results__option select2-results__option--load-more"role="treeitem" aria-disabled="true"></li>'),c=this.options.get("translations").get("loadingMore");return b.html(c(this.lastParams)),b},b}),b.define("select2/dropdown/attachBody",["jquery","../utils"],function(a,b){function c(b,c,d){this.$dropdownParent=d.get("dropdownParent")||a(document.body),b.call(this,c,d)}return c.prototype.bind=function(a,b,c){var d=this,e=!1;a.call(this,b,c),b.on("open",function(){d._showDropdown(),d._attachPositioningHandler(b),e||(e=!0,b.on("results:all",function(){d._positionDropdown(),d._resizeDropdown()}),b.on("results:append",function(){d._positionDropdown(),d._resizeDropdown()}))}),b.on("close",function(){d._hideDropdown(),d._detachPositioningHandler(b)}),this.$dropdownContainer.on("mousedown",function(a){a.stopPropagation()})},c.prototype.destroy=function(a){a.call(this),this.$dropdownContainer.remove()},c.prototype.position=function(a,b,c){b.attr("class",c.attr("class")),b.removeClass("select2"),b.addClass("select2-container--open"),b.css({position:"absolute",top:-999999}),this.$container=c},c.prototype.render=function(b){var c=a("<span></span>"),d=b.call(this);return c.append(d),this.$dropdownContainer=c,c},c.prototype._hideDropdown=function(a){this.$dropdownContainer.detach()},c.prototype._attachPositioningHandler=function(c,d){var e=this,f="scroll.select2."+d.id,g="resize.select2."+d.id,h="orientationchange.select2."+d.id,i=this.$container.parents().filter(b.hasScroll);i.each(function(){a(this).data("select2-scroll-position",{x:a(this).scrollLeft(),y:a(this).scrollTop()})}),i.on(f,function(b){var c=a(this).data("select2-scroll-position");a(this).scrollTop(c.y)}),a(window).on(f+" "+g+" "+h,function(a){e._positionDropdown(),e._resizeDropdown()})},c.prototype._detachPositioningHandler=function(c,d){var e="scroll.select2."+d.id,f="resize.select2."+d.id,g="orientationchange.select2."+d.id,h=this.$container.parents().filter(b.hasScroll);h.off(e),a(window).off(e+" "+f+" "+g)},c.prototype._positionDropdown=function(){var b=a(window),c=this.$dropdown.hasClass("select2-dropdown--above"),d=this.$dropdown.hasClass("select2-dropdown--below"),e=null,f=this.$container.offset();f.bottom=f.top+this.$container.outerHeight(!1);var g={height:this.$container.outerHeight(!1)};g.top=f.top,g.bottom=f.top+g.height;var h={height:this.$dropdown.outerHeight(!1)},i={top:b.scrollTop(),bottom:b.scrollTop()+b.height()},j=i.top<f.top-h.height,k=i.bottom>f.bottom+h.height,l={left:f.left,top:g.bottom},m=this.$dropdownParent;"static"===m.css("position")&&(m=m.offsetParent());var n=m.offset();l.top-=n.top,l.left-=n.left,c||d||(e="below"),k||!j||c?!j&&k&&c&&(e="below"):e="above",("above"==e||c&&"below"!==e)&&(l.top=g.top-n.top-h.height),null!=e&&(this.$dropdown.removeClass("select2-dropdown--below select2-dropdown--above").addClass("select2-dropdown--"+e),this.$container.removeClass("select2-container--below select2-container--above").addClass("select2-container--"+e)),this.$dropdownContainer.css(l)},c.prototype._resizeDropdown=function(){var a={width:this.$container.outerWidth(!1)+"px"};this.options.get("dropdownAutoWidth")&&(a.minWidth=a.width,a.position="relative",a.width="auto"),this.$dropdown.css(a)},c.prototype._showDropdown=function(a){this.$dropdownContainer.appendTo(this.$dropdownParent),this._positionDropdown(),this._resizeDropdown()},c}),b.define("select2/dropdown/minimumResultsForSearch",[],function(){function a(b){for(var c=0,d=0;d<b.length;d++){var e=b[d];e.children?c+=a(e.children):c++}return c}function b(a,b,c,d){this.minimumResultsForSearch=c.get("minimumResultsForSearch"),this.minimumResultsForSearch<0&&(this.minimumResultsForSearch=1/0),a.call(this,b,c,d)}return b.prototype.showSearch=function(b,c){return a(c.data.results)<this.minimumResultsForSearch?!1:b.call(this,c)},b}),b.define("select2/dropdown/selectOnClose",[],function(){function a(){}return a.prototype.bind=function(a,b,c){var d=this;a.call(this,b,c),b.on("close",function(a){d._handleSelectOnClose(a)})},a.prototype._handleSelectOnClose=function(a,b){if(b&&null!=b.originalSelect2Event){var c=b.originalSelect2Event;if("select"===c._type||"unselect"===c._type)return}var d=this.getHighlightedResults();if(!(d.length<1)){var e=d.data("data");null!=e.element&&e.element.selected||null==e.element&&e.selected||this.trigger("select",{data:e})}},a}),b.define("select2/dropdown/closeOnSelect",[],function(){function a(){}return a.prototype.bind=function(a,b,c){var d=this;a.call(this,b,c),b.on("select",function(a){d._selectTriggered(a)}),b.on("unselect",function(a){d._selectTriggered(a)})},a.prototype._selectTriggered=function(a,b){var c=b.originalEvent;c&&c.ctrlKey||this.trigger("close",{originalEvent:c,originalSelect2Event:b})},a}),b.define("select2/i18n/en",[],function(){return{errorLoading:function(){return"The results could not be loaded."},inputTooLong:function(a){var b=a.input.length-a.maximum,c="Please delete "+b+" character";return 1!=b&&(c+="s"),c},inputTooShort:function(a){var b=a.minimum-a.input.length,c="Please enter "+b+" or more characters";return c},loadingMore:function(){return"Loading more results…"},maximumSelected:function(a){var b="You can only select "+a.maximum+" item";return 1!=a.maximum&&(b+="s"),b},noResults:function(){return"No results found"},searching:function(){return"Searching…"}}}),b.define("select2/defaults",["jquery","require","./results","./selection/single","./selection/multiple","./selection/placeholder","./selection/allowClear","./selection/search","./selection/eventRelay","./utils","./translation","./diacritics","./data/select","./data/array","./data/ajax","./data/tags","./data/tokenizer","./data/minimumInputLength","./data/maximumInputLength","./data/maximumSelectionLength","./dropdown","./dropdown/search","./dropdown/hidePlaceholder","./dropdown/infiniteScroll","./dropdown/attachBody","./dropdown/minimumResultsForSearch","./dropdown/selectOnClose","./dropdown/closeOnSelect","./i18n/en"],function(a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z,A,B,C){function D(){this.reset()}D.prototype.apply=function(l){if(l=a.extend(!0,{},this.defaults,l),null==l.dataAdapter){if(null!=l.ajax?l.dataAdapter=o:null!=l.data?l.dataAdapter=n:l.dataAdapter=m,l.minimumInputLength>0&&(l.dataAdapter=j.Decorate(l.dataAdapter,r)),l.maximumInputLength>0&&(l.dataAdapter=j.Decorate(l.dataAdapter,s)),l.maximumSelectionLength>0&&(l.dataAdapter=j.Decorate(l.dataAdapter,t)),l.tags&&(l.dataAdapter=j.Decorate(l.dataAdapter,p)),(null!=l.tokenSeparators||null!=l.tokenizer)&&(l.dataAdapter=j.Decorate(l.dataAdapter,q)),null!=l.query){var C=b(l.amdBase+"compat/query");l.dataAdapter=j.Decorate(l.dataAdapter,C)}if(null!=l.initSelection){var D=b(l.amdBase+"compat/initSelection");l.dataAdapter=j.Decorate(l.dataAdapter,D)}}if(null==l.resultsAdapter&&(l.resultsAdapter=c,null!=l.ajax&&(l.resultsAdapter=j.Decorate(l.resultsAdapter,x)),null!=l.placeholder&&(l.resultsAdapter=j.Decorate(l.resultsAdapter,w)),l.selectOnClose&&(l.resultsAdapter=j.Decorate(l.resultsAdapter,A))),null==l.dropdownAdapter){if(l.multiple)l.dropdownAdapter=u;else{var E=j.Decorate(u,v);l.dropdownAdapter=E}if(0!==l.minimumResultsForSearch&&(l.dropdownAdapter=j.Decorate(l.dropdownAdapter,z)),l.closeOnSelect&&(l.dropdownAdapter=j.Decorate(l.dropdownAdapter,B)),null!=l.dropdownCssClass||null!=l.dropdownCss||null!=l.adaptDropdownCssClass){var F=b(l.amdBase+"compat/dropdownCss");l.dropdownAdapter=j.Decorate(l.dropdownAdapter,F)}l.dropdownAdapter=j.Decorate(l.dropdownAdapter,y)}if(null==l.selectionAdapter){if(l.multiple?l.selectionAdapter=e:l.selectionAdapter=d,null!=l.placeholder&&(l.selectionAdapter=j.Decorate(l.selectionAdapter,f)),l.allowClear&&(l.selectionAdapter=j.Decorate(l.selectionAdapter,g)),l.multiple&&(l.selectionAdapter=j.Decorate(l.selectionAdapter,h)),null!=l.containerCssClass||null!=l.containerCss||null!=l.adaptContainerCssClass){var G=b(l.amdBase+"compat/containerCss");l.selectionAdapter=j.Decorate(l.selectionAdapter,G)}l.selectionAdapter=j.Decorate(l.selectionAdapter,i)}if("string"==typeof l.language)if(l.language.indexOf("-")>0){var H=l.language.split("-"),I=H[0];l.language=[l.language,I]}else l.language=[l.language];if(a.isArray(l.language)){var J=new k;l.language.push("en");for(var K=l.language,L=0;L<K.length;L++){var M=K[L],N={};try{N=k.loadPath(M)}catch(O){try{M=this.defaults.amdLanguageBase+M,N=k.loadPath(M)}catch(P){l.debug&&window.console&&console.warn&&console.warn('Select2: The language file for "'+M+'" could not be automatically loaded. A fallback will be used instead.');continue}}J.extend(N)}l.translations=J}else{var Q=k.loadPath(this.defaults.amdLanguageBase+"en"),R=new k(l.language);R.extend(Q),l.translations=R}return l},D.prototype.reset=function(){function b(a){function b(a){return l[a]||a}return a.replace(/[^\u0000-\u007E]/g,b)}function c(d,e){if(""===a.trim(d.term))return e;if(e.children&&e.children.length>0){for(var f=a.extend(!0,{},e),g=e.children.length-1;g>=0;g--){var h=e.children[g],i=c(d,h);null==i&&f.children.splice(g,1)}return f.children.length>0?f:c(d,f)}var j=b(e.text).toUpperCase(),k=b(d.term).toUpperCase();return j.indexOf(k)>-1?e:null}this.defaults={amdBase:"./",amdLanguageBase:"./i18n/",closeOnSelect:!0,debug:!1,dropdownAutoWidth:!1,escapeMarkup:j.escapeMarkup,language:C,matcher:c,minimumInputLength:0,maximumInputLength:0,maximumSelectionLength:0,minimumResultsForSearch:0,selectOnClose:!1,sorter:function(a){return a},templateResult:function(a){return a.text},templateSelection:function(a){return a.text},theme:"default",width:"resolve"}},D.prototype.set=function(b,c){var d=a.camelCase(b),e={};e[d]=c;var f=j._convertData(e);a.extend(this.defaults,f)};var E=new D;return E}),b.define("select2/options",["require","jquery","./defaults","./utils"],function(a,b,c,d){function e(b,e){if(this.options=b,null!=e&&this.fromElement(e),this.options=c.apply(this.options),e&&e.is("input")){var f=a(this.get("amdBase")+"compat/inputData");this.options.dataAdapter=d.Decorate(this.options.dataAdapter,f)}}return e.prototype.fromElement=function(a){var c=["select2"];null==this.options.multiple&&(this.options.multiple=a.prop("multiple")),null==this.options.disabled&&(this.options.disabled=a.prop("disabled")),null==this.options.language&&(a.prop("lang")?this.options.language=a.prop("lang").toLowerCase():a.closest("[lang]").prop("lang")&&(this.options.language=a.closest("[lang]").prop("lang"))),null==this.options.dir&&(a.prop("dir")?this.options.dir=a.prop("dir"):a.closest("[dir]").prop("dir")?this.options.dir=a.closest("[dir]").prop("dir"):this.options.dir="ltr"),a.prop("disabled",this.options.disabled),a.prop("multiple",this.options.multiple),a.data("select2Tags")&&(this.options.debug&&window.console&&console.warn&&console.warn('Select2: The `data-select2-tags` attribute has been changed to use the `data-data` and `data-tags="true"` attributes and will be removed in future versions of Select2.'),a.data("data",a.data("select2Tags")),a.data("tags",!0)),a.data("ajaxUrl")&&(this.options.debug&&window.console&&console.warn&&console.warn("Select2: The `data-ajax-url` attribute has been changed to `data-ajax--url` and support for the old attribute will be removed in future versions of Select2."),a.attr("ajax--url",a.data("ajaxUrl")),a.data("ajax--url",a.data("ajaxUrl")));var e={};e=b.fn.jquery&&"1."==b.fn.jquery.substr(0,2)&&a[0].dataset?b.extend(!0,{},a[0].dataset,a.data()):a.data();var f=b.extend(!0,{},e);f=d._convertData(f);for(var g in f)b.inArray(g,c)>-1||(b.isPlainObject(this.options[g])?b.extend(this.options[g],f[g]):this.options[g]=f[g]);return this},e.prototype.get=function(a){return this.options[a]},e.prototype.set=function(a,b){this.options[a]=b},e}),b.define("select2/core",["jquery","./options","./utils","./keys"],function(a,b,c,d){var e=function(a,c){null!=a.data("select2")&&a.data("select2").destroy(),this.$element=a,this.id=this._generateId(a),c=c||{},this.options=new b(c,a),e.__super__.constructor.call(this);var d=a.attr("tabindex")||0;a.data("old-tabindex",d),a.attr("tabindex","-1");var f=this.options.get("dataAdapter");this.dataAdapter=new f(a,this.options);var g=this.render();this._placeContainer(g);var h=this.options.get("selectionAdapter");this.selection=new h(a,this.options),this.$selection=this.selection.render(),this.selection.position(this.$selection,g);var i=this.options.get("dropdownAdapter");this.dropdown=new i(a,this.options),this.$dropdown=this.dropdown.render(),this.dropdown.position(this.$dropdown,g);var j=this.options.get("resultsAdapter");this.results=new j(a,this.options,this.dataAdapter),this.$results=this.results.render(),this.results.position(this.$results,this.$dropdown);var k=this;this._bindAdapters(),this._registerDomEvents(),this._registerDataEvents(),this._registerSelectionEvents(),this._registerDropdownEvents(),this._registerResultsEvents(),this._registerEvents(),this.dataAdapter.current(function(a){k.trigger("selection:update",{data:a})}),a.addClass("select2-hidden-accessible"),a.attr("aria-hidden","true"),this._syncAttributes(),a.data("select2",this)};return c.Extend(e,c.Observable),e.prototype._generateId=function(a){var b="";return b=null!=a.attr("id")?a.attr("id"):null!=a.attr("name")?a.attr("name")+"-"+c.generateChars(2):c.generateChars(4),b=b.replace(/(:|\.|\[|\]|,)/g,""),b="select2-"+b},e.prototype._placeContainer=function(a){a.insertAfter(this.$element);var b=this._resolveWidth(this.$element,this.options.get("width"));null!=b&&a.css("width",b)},e.prototype._resolveWidth=function(a,b){var c=/^width:(([-+]?([0-9]*\.)?[0-9]+)(px|em|ex|%|in|cm|mm|pt|pc))/i;if("resolve"==b){var d=this._resolveWidth(a,"style");return null!=d?d:this._resolveWidth(a,"element")}if("element"==b){var e=a.outerWidth(!1);return 0>=e?"auto":e+"px"}if("style"==b){var f=a.attr("style");if("string"!=typeof f)return null;for(var g=f.split(";"),h=0,i=g.length;i>h;h+=1){var j=g[h].replace(/\s/g,""),k=j.match(c);if(null!==k&&k.length>=1)return k[1]}return null}return b},e.prototype._bindAdapters=function(){this.dataAdapter.bind(this,this.$container),this.selection.bind(this,this.$container),this.dropdown.bind(this,this.$container),this.results.bind(this,this.$container)},e.prototype._registerDomEvents=function(){var b=this;this.$element.on("change.select2",function(){b.dataAdapter.current(function(a){b.trigger("selection:update",{data:a})})}),this.$element.on("focus.select2",function(a){b.trigger("focus",a)}),this._syncA=c.bind(this._syncAttributes,this),this._syncS=c.bind(this._syncSubtree,this),this.$element[0].attachEvent&&this.$element[0].attachEvent("onpropertychange",this._syncA);var d=window.MutationObserver||window.WebKitMutationObserver||window.MozMutationObserver;null!=d?(this._observer=new d(function(c){a.each(c,b._syncA),a.each(c,b._syncS)}),this._observer.observe(this.$element[0],{attributes:!0,childList:!0,subtree:!1})):this.$element[0].addEventListener&&(this.$element[0].addEventListener("DOMAttrModified",b._syncA,!1),this.$element[0].addEventListener("DOMNodeInserted",b._syncS,!1),this.$element[0].addEventListener("DOMNodeRemoved",b._syncS,!1))},e.prototype._registerDataEvents=function(){var a=this;this.dataAdapter.on("*",function(b,c){a.trigger(b,c)})},e.prototype._registerSelectionEvents=function(){var b=this,c=["toggle","focus"];this.selection.on("toggle",function(){b.toggleDropdown()}),this.selection.on("focus",function(a){b.focus(a)}),this.selection.on("*",function(d,e){-1===a.inArray(d,c)&&b.trigger(d,e)})},e.prototype._registerDropdownEvents=function(){var a=this;this.dropdown.on("*",function(b,c){a.trigger(b,c)})},e.prototype._registerResultsEvents=function(){var a=this;this.results.on("*",function(b,c){a.trigger(b,c)})},e.prototype._registerEvents=function(){var a=this;this.on("open",function(){a.$container.addClass("select2-container--open")}),this.on("close",function(){a.$container.removeClass("select2-container--open")}),this.on("enable",function(){a.$container.removeClass("select2-container--disabled")}),this.on("disable",function(){a.$container.addClass("select2-container--disabled")}),this.on("blur",function(){a.$container.removeClass("select2-container--focus")}),this.on("query",function(b){a.isOpen()||a.trigger("open",{}),this.dataAdapter.query(b,function(c){a.trigger("results:all",{data:c,query:b})})}),this.on("query:append",function(b){this.dataAdapter.query(b,function(c){a.trigger("results:append",{data:c,query:b})})}),this.on("keypress",function(b){var c=b.which;a.isOpen()?c===d.ESC||c===d.TAB||c===d.UP&&b.altKey?(a.close(),b.preventDefault()):c===d.ENTER?(a.trigger("results:select",{}),b.preventDefault()):c===d.SPACE&&b.ctrlKey?(a.trigger("results:toggle",{}),b.preventDefault()):c===d.UP?(a.trigger("results:previous",{}),b.preventDefault()):c===d.DOWN&&(a.trigger("results:next",{}),b.preventDefault()):(c===d.ENTER||c===d.SPACE||c===d.DOWN&&b.altKey)&&(a.open(),b.preventDefault())})},e.prototype._syncAttributes=function(){this.options.set("disabled",this.$element.prop("disabled")),this.options.get("disabled")?(this.isOpen()&&this.close(),this.trigger("disable",{})):this.trigger("enable",{})},e.prototype._syncSubtree=function(a,b){var c=!1,d=this;if(!a||!a.target||"OPTION"===a.target.nodeName||"OPTGROUP"===a.target.nodeName){if(b)if(b.addedNodes&&b.addedNodes.length>0)for(var e=0;e<b.addedNodes.length;e++){var f=b.addedNodes[e];f.selected&&(c=!0)}else b.removedNodes&&b.removedNodes.length>0&&(c=!0);else c=!0;c&&this.dataAdapter.current(function(a){d.trigger("selection:update",{data:a})})}},e.prototype.trigger=function(a,b){var c=e.__super__.trigger,d={open:"opening",close:"closing",select:"selecting",unselect:"unselecting"};if(void 0===b&&(b={}),a in d){var f=d[a],g={prevented:!1,name:a,args:b};if(c.call(this,f,g),g.prevented)return void(b.prevented=!0)}c.call(this,a,b)},e.prototype.toggleDropdown=function(){this.options.get("disabled")||(this.isOpen()?this.close():this.open())},e.prototype.open=function(){this.isOpen()||this.trigger("query",{})},e.prototype.close=function(){this.isOpen()&&this.trigger("close",{})},e.prototype.isOpen=function(){return this.$container.hasClass("select2-container--open")},e.prototype.hasFocus=function(){return this.$container.hasClass("select2-container--focus")},e.prototype.focus=function(a){this.hasFocus()||(this.$container.addClass("select2-container--focus"),this.trigger("focus",{}))},e.prototype.enable=function(a){this.options.get("debug")&&window.console&&console.warn&&console.warn('Select2: The `select2("enable")` method has been deprecated and will be removed in later Select2 versions. Use $element.prop("disabled") instead.'),(null==a||0===a.length)&&(a=[!0]);var b=!a[0];this.$element.prop("disabled",b)},e.prototype.data=function(){this.options.get("debug")&&arguments.length>0&&window.console&&console.warn&&console.warn('Select2: Data can no longer be set using `select2("data")`. You should consider setting the value instead using `$element.val()`.');var a=[];return this.dataAdapter.current(function(b){a=b}),a},e.prototype.val=function(b){if(this.options.get("debug")&&window.console&&console.warn&&console.warn('Select2: The `select2("val")` method has been deprecated and will be removed in later Select2 versions. Use $element.val() instead.'),null==b||0===b.length)return this.$element.val();var c=b[0];a.isArray(c)&&(c=a.map(c,function(a){return a.toString()})),this.$element.val(c).trigger("change")},e.prototype.destroy=function(){this.$container.remove(),this.$element[0].detachEvent&&this.$element[0].detachEvent("onpropertychange",this._syncA),null!=this._observer?(this._observer.disconnect(),this._observer=null):this.$element[0].removeEventListener&&(this.$element[0].removeEventListener("DOMAttrModified",this._syncA,!1),this.$element[0].removeEventListener("DOMNodeInserted",this._syncS,!1),this.$element[0].removeEventListener("DOMNodeRemoved",this._syncS,!1)),this._syncA=null,this._syncS=null,this.$element.off(".select2"),this.$element.attr("tabindex",this.$element.data("old-tabindex")),this.$element.removeClass("select2-hidden-accessible"),this.$element.attr("aria-hidden","false"),this.$element.removeData("select2"),this.dataAdapter.destroy(),this.selection.destroy(),this.dropdown.destroy(),this.results.destroy(),this.dataAdapter=null,this.selection=null,this.dropdown=null,this.results=null;
},e.prototype.render=function(){var b=a('<span class="select2 select2-container"><span class="selection"></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>');return b.attr("dir",this.options.get("dir")),this.$container=b,this.$container.addClass("select2-container--"+this.options.get("theme")),b.data("element",this.$element),b},e}),b.define("jquery-mousewheel",["jquery"],function(a){return a}),b.define("jquery.select2",["jquery","jquery-mousewheel","./select2/core","./select2/defaults"],function(a,b,c,d){if(null==a.fn.select2){var e=["open","close","destroy"];a.fn.select2=function(b){if(b=b||{},"object"==typeof b)return this.each(function(){var d=a.extend(!0,{},b);new c(a(this),d)}),this;if("string"==typeof b){var d,f=Array.prototype.slice.call(arguments,1);return this.each(function(){var c=a(this).data("select2");null==c&&window.console&&console.error&&console.error("The select2('"+b+"') method was called on an element that is not using Select2."),d=c[b].apply(c,f)}),a.inArray(b,e)>-1?this:d}throw new Error("Invalid arguments for Select2: "+b)}}return null==a.fn.select2.defaults&&(a.fn.select2.defaults=d),c}),{define:b.define,require:b.require}}(),c=b.require("jquery.select2");return a.fn.select2.amd=b,c});
/*!
 * perfect-scrollbar v1.3.0
 * (c) 2017 Hyunje Jun
 * @license MIT
 */
(function (global, factory) {
    typeof exports === 'object' && typeof module !== 'undefined' ? module.exports = factory() :
        typeof define === 'function' && define.amd ? define(factory) :
            (global.PerfectScrollbar = factory());
}(this, (function () { 'use strict';

    function get(element) {
        return getComputedStyle(element);
    }

    function set(element, obj) {
        for (var key in obj) {
            var val = obj[key];
            if (typeof val === 'number') {
                val = val + "px";
            }
            element.style[key] = val;
        }
        return element;
    }

    function div(className) {
        var div = document.createElement('div');
        div.className = className;
        return div;
    }

    var elMatches =
        typeof Element !== 'undefined' &&
        (Element.prototype.matches ||
            Element.prototype.webkitMatchesSelector ||
            Element.prototype.msMatchesSelector);

    function matches(element, query) {
        if (!elMatches) {
            throw new Error('No element matching method supported');
        }

        return elMatches.call(element, query);
    }

    function remove(element) {
        if (element.remove) {
            element.remove();
        } else {
            if (element.parentNode) {
                element.parentNode.removeChild(element);
            }
        }
    }

    function queryChildren(element, selector) {
        return Array.prototype.filter.call(element.children, function (child) { return matches(child, selector); }
        );
    }

    var cls = {
        main: 'ps',
        element: {
            thumb: function (x) { return ("ps__thumb-" + x); },
            rail: function (x) { return ("ps__rail-" + x); },
            consuming: 'ps__child--consume',
        },
        state: {
            focus: 'ps--focus',
            active: function (x) { return ("ps--active-" + x); },
            scrolling: function (x) { return ("ps--scrolling-" + x); },
        },
    };

    /*
     * Helper methods
     */
    var scrollingClassTimeout = { x: null, y: null };

    function addScrollingClass(i, x) {
        var classList = i.element.classList;
        var className = cls.state.scrolling(x);

        if (classList.contains(className)) {
            clearTimeout(scrollingClassTimeout[x]);
        } else {
            classList.add(className);
        }
    }

    function removeScrollingClass(i, x) {
        scrollingClassTimeout[x] = setTimeout(
            function () { return i.isAlive && i.element.classList.remove(cls.state.scrolling(x)); },
            i.settings.scrollingThreshold
        );
    }

    function setScrollingClassInstantly(i, x) {
        addScrollingClass(i, x);
        removeScrollingClass(i, x);
    }

    var EventElement = function EventElement(element) {
        this.element = element;
        this.handlers = {};
    };

    var prototypeAccessors = { isEmpty: { configurable: true } };

    EventElement.prototype.bind = function bind (eventName, handler) {
        if (typeof this.handlers[eventName] === 'undefined') {
            this.handlers[eventName] = [];
        }
        this.handlers[eventName].push(handler);
        this.element.addEventListener(eventName, handler, false);
    };

    EventElement.prototype.unbind = function unbind (eventName, target) {
        var this$1 = this;

        this.handlers[eventName] = this.handlers[eventName].filter(function (handler) {
            if (target && handler !== target) {
                return true;
            }
            this$1.element.removeEventListener(eventName, handler, false);
            return false;
        });
    };

    EventElement.prototype.unbindAll = function unbindAll () {
        var this$1 = this;

        for (var name in this$1.handlers) {
            this$1.unbind(name);
        }
    };

    prototypeAccessors.isEmpty.get = function () {
        var this$1 = this;

        return Object.keys(this.handlers).every(
            function (key) { return this$1.handlers[key].length === 0; }
        );
    };

    Object.defineProperties( EventElement.prototype, prototypeAccessors );

    var EventManager = function EventManager() {
        this.eventElements = [];
    };

    EventManager.prototype.eventElement = function eventElement (element) {
        var ee = this.eventElements.filter(function (ee) { return ee.element === element; })[0];
        if (!ee) {
            ee = new EventElement(element);
            this.eventElements.push(ee);
        }
        return ee;
    };

    EventManager.prototype.bind = function bind (element, eventName, handler) {
        this.eventElement(element).bind(eventName, handler);
    };

    EventManager.prototype.unbind = function unbind (element, eventName, handler) {
        var ee = this.eventElement(element);
        ee.unbind(eventName, handler);

        if (ee.isEmpty) {
            // remove
            this.eventElements.splice(this.eventElements.indexOf(ee), 1);
        }
    };

    EventManager.prototype.unbindAll = function unbindAll () {
        this.eventElements.forEach(function (e) { return e.unbindAll(); });
        this.eventElements = [];
    };

    EventManager.prototype.once = function once (element, eventName, handler) {
        var ee = this.eventElement(element);
        var onceHandler = function (evt) {
            ee.unbind(eventName, onceHandler);
            handler(evt);
        };
        ee.bind(eventName, onceHandler);
    };

    function createEvent(name) {
        if (typeof window.CustomEvent === 'function') {
            return new CustomEvent(name);
        } else {
            var evt = document.createEvent('CustomEvent');
            evt.initCustomEvent(name, false, false, undefined);
            return evt;
        }
    }

    var processScrollDiff = function(
        i,
        axis,
        diff,
        useScrollingClass,
        forceFireReachEvent
    ) {
        if ( useScrollingClass === void 0 ) useScrollingClass = true;
        if ( forceFireReachEvent === void 0 ) forceFireReachEvent = false;

        var fields;
        if (axis === 'top') {
            fields = [
                'contentHeight',
                'containerHeight',
                'scrollTop',
                'y',
                'up',
                'down' ];
        } else if (axis === 'left') {
            fields = [
                'contentWidth',
                'containerWidth',
                'scrollLeft',
                'x',
                'left',
                'right' ];
        } else {
            throw new Error('A proper axis should be provided');
        }

        processScrollDiff$1(i, diff, fields, useScrollingClass, forceFireReachEvent);
    };

    function processScrollDiff$1(
        i,
        diff,
        ref,
        useScrollingClass,
        forceFireReachEvent
    ) {
        var contentHeight = ref[0];
        var containerHeight = ref[1];
        var scrollTop = ref[2];
        var y = ref[3];
        var up = ref[4];
        var down = ref[5];
        if ( useScrollingClass === void 0 ) useScrollingClass = true;
        if ( forceFireReachEvent === void 0 ) forceFireReachEvent = false;

        var element = i.element;

        // reset reach
        i.reach[y] = null;

        // 1 for subpixel rounding
        if (element[scrollTop] < 1) {
            i.reach[y] = 'start';
        }

        // 1 for subpixel rounding
        if (element[scrollTop] > i[contentHeight] - i[containerHeight] - 1) {
            i.reach[y] = 'end';
        }

        if (diff) {
            element.dispatchEvent(createEvent(("ps-scroll-" + y)));

            if (diff < 0) {
                element.dispatchEvent(createEvent(("ps-scroll-" + up)));
            } else if (diff > 0) {
                element.dispatchEvent(createEvent(("ps-scroll-" + down)));
            }

            if (useScrollingClass) {
                setScrollingClassInstantly(i, y);
            }
        }

        if (i.reach[y] && (diff || forceFireReachEvent)) {
            element.dispatchEvent(createEvent(("ps-" + y + "-reach-" + (i.reach[y]))));
        }
    }

    function toInt(x) {
        return parseInt(x, 10) || 0;
    }

    function isEditable(el) {
        return (
            matches(el, 'input,[contenteditable]') ||
            matches(el, 'select,[contenteditable]') ||
            matches(el, 'textarea,[contenteditable]') ||
            matches(el, 'button,[contenteditable]')
        );
    }

    function outerWidth(element) {
        var styles = get(element);
        return (
            toInt(styles.width) +
            toInt(styles.paddingLeft) +
            toInt(styles.paddingRight) +
            toInt(styles.borderLeftWidth) +
            toInt(styles.borderRightWidth)
        );
    }

    var env = {
        isWebKit:
            typeof document !== 'undefined' &&
            'WebkitAppearance' in document.documentElement.style,
        supportsTouch:
            typeof window !== 'undefined' &&
            ('ontouchstart' in window ||
                (window.DocumentTouch && document instanceof window.DocumentTouch)),
        supportsIePointer:
            typeof navigator !== 'undefined' && navigator.msMaxTouchPoints,
        isChrome:
            typeof navigator !== 'undefined' &&
            /Chrome/i.test(navigator && navigator.userAgent),
    };

    var updateGeometry = function(i) {
        var element = i.element;

        i.containerWidth = element.clientWidth;
        i.containerHeight = element.clientHeight;
        i.contentWidth = element.scrollWidth;
        i.contentHeight = element.scrollHeight;

        if (!element.contains(i.scrollbarXRail)) {
            // clean up and append
            queryChildren(element, cls.element.rail('x')).forEach(function (el) { return remove(el); }
            );
            element.appendChild(i.scrollbarXRail);
        }
        if (!element.contains(i.scrollbarYRail)) {
            // clean up and append
            queryChildren(element, cls.element.rail('y')).forEach(function (el) { return remove(el); }
            );
            element.appendChild(i.scrollbarYRail);
        }

        if (
            !i.settings.suppressScrollX &&
            i.containerWidth + i.settings.scrollXMarginOffset < i.contentWidth
        ) {
            i.scrollbarXActive = true;
            i.railXWidth = i.containerWidth - i.railXMarginWidth;
            i.railXRatio = i.containerWidth / i.railXWidth;
            i.scrollbarXWidth = getThumbSize(
                i,
                toInt(i.railXWidth * i.containerWidth / i.contentWidth)
            );
            i.scrollbarXLeft = toInt(
                (i.negativeScrollAdjustment + element.scrollLeft) *
                (i.railXWidth - i.scrollbarXWidth) /
                (i.contentWidth - i.containerWidth)
            );
        } else {
            i.scrollbarXActive = false;
        }

        if (
            !i.settings.suppressScrollY &&
            i.containerHeight + i.settings.scrollYMarginOffset < i.contentHeight
        ) {
            i.scrollbarYActive = true;
            i.railYHeight = i.containerHeight - i.railYMarginHeight;
            i.railYRatio = i.containerHeight / i.railYHeight;
            i.scrollbarYHeight = getThumbSize(
                i,
                toInt(i.railYHeight * i.containerHeight / i.contentHeight)
            );
            i.scrollbarYTop = toInt(
                element.scrollTop *
                (i.railYHeight - i.scrollbarYHeight) /
                (i.contentHeight - i.containerHeight)
            );
        } else {
            i.scrollbarYActive = false;
        }

        if (i.scrollbarXLeft >= i.railXWidth - i.scrollbarXWidth) {
            i.scrollbarXLeft = i.railXWidth - i.scrollbarXWidth;
        }
        if (i.scrollbarYTop >= i.railYHeight - i.scrollbarYHeight) {
            i.scrollbarYTop = i.railYHeight - i.scrollbarYHeight;
        }

        updateCss(element, i);

        if (i.scrollbarXActive) {
            element.classList.add(cls.state.active('x'));
        } else {
            element.classList.remove(cls.state.active('x'));
            i.scrollbarXWidth = 0;
            i.scrollbarXLeft = 0;
            element.scrollLeft = 0;
        }
        if (i.scrollbarYActive) {
            element.classList.add(cls.state.active('y'));
        } else {
            element.classList.remove(cls.state.active('y'));
            i.scrollbarYHeight = 0;
            i.scrollbarYTop = 0;
            element.scrollTop = 0;
        }
    };

    function getThumbSize(i, thumbSize) {
        if (i.settings.minScrollbarLength) {
            thumbSize = Math.max(thumbSize, i.settings.minScrollbarLength);
        }
        if (i.settings.maxScrollbarLength) {
            thumbSize = Math.min(thumbSize, i.settings.maxScrollbarLength);
        }
        return thumbSize;
    }

    function updateCss(element, i) {
        var xRailOffset = { width: i.railXWidth };
        if (i.isRtl) {
            xRailOffset.left =
                i.negativeScrollAdjustment +
                element.scrollLeft +
                i.containerWidth -
                i.contentWidth;
        } else {
            xRailOffset.left = element.scrollLeft;
        }
        if (i.isScrollbarXUsingBottom) {
            xRailOffset.bottom = i.scrollbarXBottom - element.scrollTop;
        } else {
            xRailOffset.top = i.scrollbarXTop + element.scrollTop;
        }
        set(i.scrollbarXRail, xRailOffset);

        var yRailOffset = { top: element.scrollTop, height: i.railYHeight };
        if (i.isScrollbarYUsingRight) {
            if (i.isRtl) {
                yRailOffset.right =
                    i.contentWidth -
                    (i.negativeScrollAdjustment + element.scrollLeft) -
                    i.scrollbarYRight -
                    i.scrollbarYOuterWidth;
            } else {
                yRailOffset.right = i.scrollbarYRight - element.scrollLeft;
            }
        } else {
            if (i.isRtl) {
                yRailOffset.left =
                    i.negativeScrollAdjustment +
                    element.scrollLeft +
                    i.containerWidth * 2 -
                    i.contentWidth -
                    i.scrollbarYLeft -
                    i.scrollbarYOuterWidth;
            } else {
                yRailOffset.left = i.scrollbarYLeft + element.scrollLeft;
            }
        }
        set(i.scrollbarYRail, yRailOffset);

        set(i.scrollbarX, {
            left: i.scrollbarXLeft,
            width: i.scrollbarXWidth - i.railBorderXWidth,
        });
        set(i.scrollbarY, {
            top: i.scrollbarYTop,
            height: i.scrollbarYHeight - i.railBorderYWidth,
        });
    }

    var clickRail = function(i) {
        i.event.bind(i.scrollbarY, 'mousedown', function (e) { return e.stopPropagation(); });
        i.event.bind(i.scrollbarYRail, 'mousedown', function (e) {
            var positionTop =
                e.pageY -
                window.pageYOffset -
                i.scrollbarYRail.getBoundingClientRect().top;
            var direction = positionTop > i.scrollbarYTop ? 1 : -1;

            i.element.scrollTop += direction * i.containerHeight;
            updateGeometry(i);

            e.stopPropagation();
        });

        i.event.bind(i.scrollbarX, 'mousedown', function (e) { return e.stopPropagation(); });
        i.event.bind(i.scrollbarXRail, 'mousedown', function (e) {
            var positionLeft =
                e.pageX -
                window.pageXOffset -
                i.scrollbarXRail.getBoundingClientRect().left;
            var direction = positionLeft > i.scrollbarXLeft ? 1 : -1;

            i.element.scrollLeft += direction * i.containerWidth;
            updateGeometry(i);

            e.stopPropagation();
        });
    };

    var dragThumb = function(i) {
        bindMouseScrollHandler(i, [
            'containerWidth',
            'contentWidth',
            'pageX',
            'railXWidth',
            'scrollbarX',
            'scrollbarXWidth',
            'scrollLeft',
            'x' ]);
        bindMouseScrollHandler(i, [
            'containerHeight',
            'contentHeight',
            'pageY',
            'railYHeight',
            'scrollbarY',
            'scrollbarYHeight',
            'scrollTop',
            'y' ]);
    };

    function bindMouseScrollHandler(
        i,
        ref
    ) {
        var containerHeight = ref[0];
        var contentHeight = ref[1];
        var pageY = ref[2];
        var railYHeight = ref[3];
        var scrollbarY = ref[4];
        var scrollbarYHeight = ref[5];
        var scrollTop = ref[6];
        var y = ref[7];

        var element = i.element;

        var startingScrollTop = null;
        var startingMousePageY = null;
        var scrollBy = null;

        function mouseMoveHandler(e) {
            element[scrollTop] =
                startingScrollTop + scrollBy * (e[pageY] - startingMousePageY);
            addScrollingClass(i, y);
            updateGeometry(i);

            e.stopPropagation();
            e.preventDefault();
        }

        function mouseUpHandler() {
            removeScrollingClass(i, y);
            i.event.unbind(i.ownerDocument, 'mousemove', mouseMoveHandler);
        }

        i.event.bind(i[scrollbarY], 'mousedown', function (e) {
            startingScrollTop = element[scrollTop];
            startingMousePageY = e[pageY];
            scrollBy =
                (i[contentHeight] - i[containerHeight]) /
                (i[railYHeight] - i[scrollbarYHeight]);

            i.event.bind(i.ownerDocument, 'mousemove', mouseMoveHandler);
            i.event.once(i.ownerDocument, 'mouseup', mouseUpHandler);

            e.stopPropagation();
            e.preventDefault();
        });
    }

    var keyboard = function(i) {
        var element = i.element;

        var elementHovered = function () { return matches(element, ':hover'); };
        var scrollbarFocused = function () { return matches(i.scrollbarX, ':focus') || matches(i.scrollbarY, ':focus'); };

        function shouldPreventDefault(deltaX, deltaY) {
            var scrollTop = element.scrollTop;
            if (deltaX === 0) {
                if (!i.scrollbarYActive) {
                    return false;
                }
                if (
                    (scrollTop === 0 && deltaY > 0) ||
                    (scrollTop >= i.contentHeight - i.containerHeight && deltaY < 0)
                ) {
                    return !i.settings.wheelPropagation;
                }
            }

            var scrollLeft = element.scrollLeft;
            if (deltaY === 0) {
                if (!i.scrollbarXActive) {
                    return false;
                }
                if (
                    (scrollLeft === 0 && deltaX < 0) ||
                    (scrollLeft >= i.contentWidth - i.containerWidth && deltaX > 0)
                ) {
                    return !i.settings.wheelPropagation;
                }
            }
            return true;
        }

        i.event.bind(i.ownerDocument, 'keydown', function (e) {
            if (
                (e.isDefaultPrevented && e.isDefaultPrevented()) ||
                e.defaultPrevented
            ) {
                return;
            }

            if (!elementHovered() && !scrollbarFocused()) {
                return;
            }

            var activeElement = document.activeElement
                ? document.activeElement
                : i.ownerDocument.activeElement;
            if (activeElement) {
                if (activeElement.tagName === 'IFRAME') {
                    activeElement = activeElement.contentDocument.activeElement;
                } else {
                    // go deeper if element is a webcomponent
                    while (activeElement.shadowRoot) {
                        activeElement = activeElement.shadowRoot.activeElement;
                    }
                }
                if (isEditable(activeElement)) {
                    return;
                }
            }

            var deltaX = 0;
            var deltaY = 0;

            switch (e.which) {
                case 37: // left
                    if (e.metaKey) {
                        deltaX = -i.contentWidth;
                    } else if (e.altKey) {
                        deltaX = -i.containerWidth;
                    } else {
                        deltaX = -30;
                    }
                    break;
                case 38: // up
                    if (e.metaKey) {
                        deltaY = i.contentHeight;
                    } else if (e.altKey) {
                        deltaY = i.containerHeight;
                    } else {
                        deltaY = 30;
                    }
                    break;
                case 39: // right
                    if (e.metaKey) {
                        deltaX = i.contentWidth;
                    } else if (e.altKey) {
                        deltaX = i.containerWidth;
                    } else {
                        deltaX = 30;
                    }
                    break;
                case 40: // down
                    if (e.metaKey) {
                        deltaY = -i.contentHeight;
                    } else if (e.altKey) {
                        deltaY = -i.containerHeight;
                    } else {
                        deltaY = -30;
                    }
                    break;
                case 32: // space bar
                    if (e.shiftKey) {
                        deltaY = i.containerHeight;
                    } else {
                        deltaY = -i.containerHeight;
                    }
                    break;
                case 33: // page up
                    deltaY = i.containerHeight;
                    break;
                case 34: // page down
                    deltaY = -i.containerHeight;
                    break;
                case 36: // home
                    deltaY = i.contentHeight;
                    break;
                case 35: // end
                    deltaY = -i.contentHeight;
                    break;
                default:
                    return;
            }

            if (i.settings.suppressScrollX && deltaX !== 0) {
                return;
            }
            if (i.settings.suppressScrollY && deltaY !== 0) {
                return;
            }

            element.scrollTop -= deltaY;
            element.scrollLeft += deltaX;
            updateGeometry(i);

            if (shouldPreventDefault(deltaX, deltaY)) {
                e.preventDefault();
            }
        });
    };

    var wheel = function(i) {
        var element = i.element;

        function shouldPreventDefault(deltaX, deltaY) {
            var isTop = element.scrollTop === 0;
            var isBottom =
                element.scrollTop + element.offsetHeight === element.scrollHeight;
            var isLeft = element.scrollLeft === 0;
            var isRight =
                element.scrollLeft + element.offsetWidth === element.offsetWidth;

            var hitsBound;

            // pick axis with primary direction
            if (Math.abs(deltaY) > Math.abs(deltaX)) {
                hitsBound = isTop || isBottom;
            } else {
                hitsBound = isLeft || isRight;
            }

            return hitsBound ? !i.settings.wheelPropagation : true;
        }

        function getDeltaFromEvent(e) {
            var deltaX = e.deltaX;
            var deltaY = -1 * e.deltaY;

            if (typeof deltaX === 'undefined' || typeof deltaY === 'undefined') {
                // OS X Safari
                deltaX = -1 * e.wheelDeltaX / 6;
                deltaY = e.wheelDeltaY / 6;
            }

            if (e.deltaMode && e.deltaMode === 1) {
                // Firefox in deltaMode 1: Line scrolling
                deltaX *= 10;
                deltaY *= 10;
            }

            if (deltaX !== deltaX && deltaY !== deltaY /* NaN checks */) {
                // IE in some mouse drivers
                deltaX = 0;
                deltaY = e.wheelDelta;
            }

            if (e.shiftKey) {
                // reverse axis with shift key
                return [-deltaY, -deltaX];
            }
            return [deltaX, deltaY];
        }

        function shouldBeConsumedByChild(target, deltaX, deltaY) {
            // FIXME: this is a workaround for <select> issue in FF and IE #571
            if (!env.isWebKit && element.querySelector('select:focus')) {
                return true;
            }

            if (!element.contains(target)) {
                return false;
            }

            var cursor = target;

            while (cursor && cursor !== element) {
                if (cursor.classList.contains(cls.element.consuming)) {
                    return true;
                }

                var style = get(cursor);
                var overflow = [style.overflow, style.overflowX, style.overflowY].join(
                    ''
                );

                // if scrollable
                if (overflow.match(/(scroll|auto)/)) {
                    var maxScrollTop = cursor.scrollHeight - cursor.clientHeight;
                    if (maxScrollTop > 0) {
                        if (
                            !(cursor.scrollTop === 0 && deltaY > 0) &&
                            !(cursor.scrollTop === maxScrollTop && deltaY < 0)
                        ) {
                            return true;
                        }
                    }
                    var maxScrollLeft = cursor.scrollLeft - cursor.clientWidth;
                    if (maxScrollLeft > 0) {
                        if (
                            !(cursor.scrollLeft === 0 && deltaX < 0) &&
                            !(cursor.scrollLeft === maxScrollLeft && deltaX > 0)
                        ) {
                            return true;
                        }
                    }
                }

                cursor = cursor.parentNode;
            }

            return false;
        }

        function mousewheelHandler(e) {
            var ref = getDeltaFromEvent(e);
            var deltaX = ref[0];
            var deltaY = ref[1];

            if (shouldBeConsumedByChild(e.target, deltaX, deltaY)) {
                return;
            }

            var shouldPrevent = false;
            if (!i.settings.useBothWheelAxes) {
                // deltaX will only be used for horizontal scrolling and deltaY will
                // only be used for vertical scrolling - this is the default
                element.scrollTop -= deltaY * i.settings.wheelSpeed;
                element.scrollLeft += deltaX * i.settings.wheelSpeed;
            } else if (i.scrollbarYActive && !i.scrollbarXActive) {
                // only vertical scrollbar is active and useBothWheelAxes option is
                // active, so let's scroll vertical bar using both mouse wheel axes
                if (deltaY) {
                    element.scrollTop -= deltaY * i.settings.wheelSpeed;
                } else {
                    element.scrollTop += deltaX * i.settings.wheelSpeed;
                }
                shouldPrevent = true;
            } else if (i.scrollbarXActive && !i.scrollbarYActive) {
                // useBothWheelAxes and only horizontal bar is active, so use both
                // wheel axes for horizontal bar
                if (deltaX) {
                    element.scrollLeft += deltaX * i.settings.wheelSpeed;
                } else {
                    element.scrollLeft -= deltaY * i.settings.wheelSpeed;
                }
                shouldPrevent = true;
            }

            updateGeometry(i);

            shouldPrevent = shouldPrevent || shouldPreventDefault(deltaX, deltaY);
            if (shouldPrevent && !e.ctrlKey) {
                e.stopPropagation();
                e.preventDefault();
            }
        }

        if (typeof window.onwheel !== 'undefined') {
            i.event.bind(element, 'wheel', mousewheelHandler);
        } else if (typeof window.onmousewheel !== 'undefined') {
            i.event.bind(element, 'mousewheel', mousewheelHandler);
        }
    };

    var touch = function(i) {
        if (!env.supportsTouch && !env.supportsIePointer) {
            return;
        }

        var element = i.element;

        function shouldPrevent(deltaX, deltaY) {
            var scrollTop = element.scrollTop;
            var scrollLeft = element.scrollLeft;
            var magnitudeX = Math.abs(deltaX);
            var magnitudeY = Math.abs(deltaY);

            if (magnitudeY > magnitudeX) {
                // user is perhaps trying to swipe up/down the page

                if (
                    (deltaY < 0 && scrollTop === i.contentHeight - i.containerHeight) ||
                    (deltaY > 0 && scrollTop === 0)
                ) {
                    // set prevent for mobile Chrome refresh
                    return window.scrollY === 0 && deltaY > 0 && env.isChrome;
                }
            } else if (magnitudeX > magnitudeY) {
                // user is perhaps trying to swipe left/right across the page

                if (
                    (deltaX < 0 && scrollLeft === i.contentWidth - i.containerWidth) ||
                    (deltaX > 0 && scrollLeft === 0)
                ) {
                    return true;
                }
            }

            return true;
        }

        function applyTouchMove(differenceX, differenceY) {
            element.scrollTop -= differenceY;
            element.scrollLeft -= differenceX;

            updateGeometry(i);
        }

        var startOffset = {};
        var startTime = 0;
        var speed = {};
        var easingLoop = null;

        function getTouch(e) {
            if (e.targetTouches) {
                return e.targetTouches[0];
            } else {
                // Maybe IE pointer
                return e;
            }
        }

        function shouldHandle(e) {
            if (e.pointerType && e.pointerType === 'pen' && e.buttons === 0) {
                return false;
            }
            if (e.targetTouches && e.targetTouches.length === 1) {
                return true;
            }
            if (
                e.pointerType &&
                e.pointerType !== 'mouse' &&
                e.pointerType !== e.MSPOINTER_TYPE_MOUSE
            ) {
                return true;
            }
            return false;
        }

        function touchStart(e) {
            if (!shouldHandle(e)) {
                return;
            }

            var touch = getTouch(e);

            startOffset.pageX = touch.pageX;
            startOffset.pageY = touch.pageY;

            startTime = new Date().getTime();

            if (easingLoop !== null) {
                clearInterval(easingLoop);
            }
        }

        function shouldBeConsumedByChild(target, deltaX, deltaY) {
            if (!element.contains(target)) {
                return false;
            }

            var cursor = target;

            while (cursor && cursor !== element) {
                if (cursor.classList.contains(cls.element.consuming)) {
                    return true;
                }

                var style = get(cursor);
                var overflow = [style.overflow, style.overflowX, style.overflowY].join(
                    ''
                );

                // if scrollable
                if (overflow.match(/(scroll|auto)/)) {
                    var maxScrollTop = cursor.scrollHeight - cursor.clientHeight;
                    if (maxScrollTop > 0) {
                        if (
                            !(cursor.scrollTop === 0 && deltaY > 0) &&
                            !(cursor.scrollTop === maxScrollTop && deltaY < 0)
                        ) {
                            return true;
                        }
                    }
                    var maxScrollLeft = cursor.scrollLeft - cursor.clientWidth;
                    if (maxScrollLeft > 0) {
                        if (
                            !(cursor.scrollLeft === 0 && deltaX < 0) &&
                            !(cursor.scrollLeft === maxScrollLeft && deltaX > 0)
                        ) {
                            return true;
                        }
                    }
                }

                cursor = cursor.parentNode;
            }

            return false;
        }

        function touchMove(e) {
            if (shouldHandle(e)) {
                var touch = getTouch(e);

                var currentOffset = { pageX: touch.pageX, pageY: touch.pageY };

                var differenceX = currentOffset.pageX - startOffset.pageX;
                var differenceY = currentOffset.pageY - startOffset.pageY;

                if (shouldBeConsumedByChild(e.target, differenceX, differenceY)) {
                    return;
                }

                applyTouchMove(differenceX, differenceY);
                startOffset = currentOffset;

                var currentTime = new Date().getTime();

                var timeGap = currentTime - startTime;
                if (timeGap > 0) {
                    speed.x = differenceX / timeGap;
                    speed.y = differenceY / timeGap;
                    startTime = currentTime;
                }

                if (shouldPrevent(differenceX, differenceY)) {
                    e.preventDefault();
                }
            }
        }
        function touchEnd() {
            if (i.settings.swipeEasing) {
                clearInterval(easingLoop);
                easingLoop = setInterval(function() {
                    if (i.isInitialized) {
                        clearInterval(easingLoop);
                        return;
                    }

                    if (!speed.x && !speed.y) {
                        clearInterval(easingLoop);
                        return;
                    }

                    if (Math.abs(speed.x) < 0.01 && Math.abs(speed.y) < 0.01) {
                        clearInterval(easingLoop);
                        return;
                    }

                    applyTouchMove(speed.x * 30, speed.y * 30);

                    speed.x *= 0.8;
                    speed.y *= 0.8;
                }, 10);
            }
        }

        if (env.supportsTouch) {
            i.event.bind(element, 'touchstart', touchStart);
            i.event.bind(element, 'touchmove', touchMove);
            i.event.bind(element, 'touchend', touchEnd);
        } else if (env.supportsIePointer) {
            if (window.PointerEvent) {
                i.event.bind(element, 'pointerdown', touchStart);
                i.event.bind(element, 'pointermove', touchMove);
                i.event.bind(element, 'pointerup', touchEnd);
            } else if (window.MSPointerEvent) {
                i.event.bind(element, 'MSPointerDown', touchStart);
                i.event.bind(element, 'MSPointerMove', touchMove);
                i.event.bind(element, 'MSPointerUp', touchEnd);
            }
        }
    };

    var defaultSettings = function () { return ({
        handlers: ['click-rail', 'drag-thumb', 'keyboard', 'wheel', 'touch'],
        maxScrollbarLength: null,
        minScrollbarLength: null,
        scrollingThreshold: 1000,
        scrollXMarginOffset: 0,
        scrollYMarginOffset: 0,
        suppressScrollX: false,
        suppressScrollY: false,
        swipeEasing: true,
        useBothWheelAxes: false,
        wheelPropagation: false,
        wheelSpeed: 1,
    }); };

    var handlers = {
        'click-rail': clickRail,
        'drag-thumb': dragThumb,
        keyboard: keyboard,
        wheel: wheel,
        touch: touch,
    };

    var PerfectScrollbar = function PerfectScrollbar(element, userSettings) {
        var this$1 = this;
        if ( userSettings === void 0 ) userSettings = {};

        if (typeof element === 'string') {
            element = document.querySelector(element);
        }

        if (!element || !element.nodeName) {
            throw new Error('no element is specified to initialize PerfectScrollbar');
        }

        this.element = element;

        element.classList.add(cls.main);

        this.settings = defaultSettings();
        for (var key in userSettings) {
            this$1.settings[key] = userSettings[key];
        }

        this.containerWidth = null;
        this.containerHeight = null;
        this.contentWidth = null;
        this.contentHeight = null;

        var focus = function () { return element.classList.add(cls.state.focus); };
        var blur = function () { return element.classList.remove(cls.state.focus); };

        this.isRtl = get(element).direction === 'rtl';
        this.isNegativeScroll = (function () {
            var originalScrollLeft = element.scrollLeft;
            var result = null;
            element.scrollLeft = -1;
            result = element.scrollLeft < 0;
            element.scrollLeft = originalScrollLeft;
            return result;
        })();
        this.negativeScrollAdjustment = this.isNegativeScroll
            ? element.scrollWidth - element.clientWidth
            : 0;
        this.event = new EventManager();
        this.ownerDocument = element.ownerDocument || document;

        this.scrollbarXRail = div(cls.element.rail('x'));
        element.appendChild(this.scrollbarXRail);
        this.scrollbarX = div(cls.element.thumb('x'));
        this.scrollbarXRail.appendChild(this.scrollbarX);
        this.scrollbarX.setAttribute('tabindex', 0);
        this.event.bind(this.scrollbarX, 'focus', focus);
        this.event.bind(this.scrollbarX, 'blur', blur);
        this.scrollbarXActive = null;
        this.scrollbarXWidth = null;
        this.scrollbarXLeft = null;
        var railXStyle = get(this.scrollbarXRail);
        this.scrollbarXBottom = parseInt(railXStyle.bottom, 10);
        if (isNaN(this.scrollbarXBottom)) {
            this.isScrollbarXUsingBottom = false;
            this.scrollbarXTop = toInt(railXStyle.top);
        } else {
            this.isScrollbarXUsingBottom = true;
        }
        this.railBorderXWidth =
            toInt(railXStyle.borderLeftWidth) + toInt(railXStyle.borderRightWidth);
        // Set rail to display:block to calculate margins
        set(this.scrollbarXRail, { display: 'block' });
        this.railXMarginWidth =
            toInt(railXStyle.marginLeft) + toInt(railXStyle.marginRight);
        set(this.scrollbarXRail, { display: '' });
        this.railXWidth = null;
        this.railXRatio = null;

        this.scrollbarYRail = div(cls.element.rail('y'));
        element.appendChild(this.scrollbarYRail);
        this.scrollbarY = div(cls.element.thumb('y'));
        this.scrollbarYRail.appendChild(this.scrollbarY);
        this.scrollbarY.setAttribute('tabindex', 0);
        this.event.bind(this.scrollbarY, 'focus', focus);
        this.event.bind(this.scrollbarY, 'blur', blur);
        this.scrollbarYActive = null;
        this.scrollbarYHeight = null;
        this.scrollbarYTop = null;
        var railYStyle = get(this.scrollbarYRail);
        this.scrollbarYRight = parseInt(railYStyle.right, 10);
        if (isNaN(this.scrollbarYRight)) {
            this.isScrollbarYUsingRight = false;
            this.scrollbarYLeft = toInt(railYStyle.left);
        } else {
            this.isScrollbarYUsingRight = true;
        }
        this.scrollbarYOuterWidth = this.isRtl ? outerWidth(this.scrollbarY) : null;
        this.railBorderYWidth =
            toInt(railYStyle.borderTopWidth) + toInt(railYStyle.borderBottomWidth);
        set(this.scrollbarYRail, { display: 'block' });
        this.railYMarginHeight =
            toInt(railYStyle.marginTop) + toInt(railYStyle.marginBottom);
        set(this.scrollbarYRail, { display: '' });
        this.railYHeight = null;
        this.railYRatio = null;

        this.reach = {
            x:
                element.scrollLeft <= 0
                    ? 'start'
                    : element.scrollLeft >= this.contentWidth - this.containerWidth
                    ? 'end'
                    : null,
            y:
                element.scrollTop <= 0
                    ? 'start'
                    : element.scrollTop >= this.contentHeight - this.containerHeight
                    ? 'end'
                    : null,
        };

        this.isAlive = true;

        this.settings.handlers.forEach(function (handlerName) { return handlers[handlerName](this$1); });

        this.lastScrollTop = element.scrollTop; // for onScroll only
        this.lastScrollLeft = element.scrollLeft; // for onScroll only
        this.event.bind(this.element, 'scroll', function (e) { return this$1.onScroll(e); });
        updateGeometry(this);
    };

    PerfectScrollbar.prototype.update = function update () {
        if (!this.isAlive) {
            return;
        }

        // Recalcuate negative scrollLeft adjustment
        this.negativeScrollAdjustment = this.isNegativeScroll
            ? this.element.scrollWidth - this.element.clientWidth
            : 0;

        // Recalculate rail margins
        set(this.scrollbarXRail, { display: 'block' });
        set(this.scrollbarYRail, { display: 'block' });
        this.railXMarginWidth =
            toInt(get(this.scrollbarXRail).marginLeft) +
            toInt(get(this.scrollbarXRail).marginRight);
        this.railYMarginHeight =
            toInt(get(this.scrollbarYRail).marginTop) +
            toInt(get(this.scrollbarYRail).marginBottom);

        // Hide scrollbars not to affect scrollWidth and scrollHeight
        set(this.scrollbarXRail, { display: 'none' });
        set(this.scrollbarYRail, { display: 'none' });

        updateGeometry(this);

        processScrollDiff(this, 'top', 0, false, true);
        processScrollDiff(this, 'left', 0, false, true);

        set(this.scrollbarXRail, { display: '' });
        set(this.scrollbarYRail, { display: '' });
    };

    PerfectScrollbar.prototype.onScroll = function onScroll (e) {
        if (!this.isAlive) {
            return;
        }

        updateGeometry(this);
        processScrollDiff(this, 'top', this.element.scrollTop - this.lastScrollTop);
        processScrollDiff(
            this,
            'left',
            this.element.scrollLeft - this.lastScrollLeft
        );

        this.lastScrollTop = this.element.scrollTop;
        this.lastScrollLeft = this.element.scrollLeft;
    };

    PerfectScrollbar.prototype.destroy = function destroy () {
        if (!this.isAlive) {
            return;
        }

        this.event.unbindAll();
        remove(this.scrollbarX);
        remove(this.scrollbarY);
        remove(this.scrollbarXRail);
        remove(this.scrollbarYRail);
        this.removePsClasses();

        // unset elements
        this.element = null;
        this.scrollbarX = null;
        this.scrollbarY = null;
        this.scrollbarXRail = null;
        this.scrollbarYRail = null;

        this.isAlive = false;
    };

    PerfectScrollbar.prototype.removePsClasses = function removePsClasses () {
        this.element.className = this.element.className
            .split(' ')
            .filter(function (name) { return !name.match(/^ps([-_].+|)$/); })
            .join(' ');
    };

    return PerfectScrollbar;

})));

/*
PNotify 2.0.0 sciactive.com/pnotify/
(C) 2014 Hunter Perrin
license GPL/LGPL/MPL
*/
(function(c){"function"===typeof define&&define.amd?define(["jquery"],c):c(jQuery)})(function(c){var n={dir1:"down",dir2:"left",push:"bottom",spacing1:25,spacing2:25,context:c("body")},f,g,h=c(window),m=function(){g=c("body");PNotify.prototype.options.stack.context=g;h=c(window);h.bind("resize",function(){f&&clearTimeout(f);f=setTimeout(function(){PNotify.positionAll(!0)},10)})};PNotify=function(b){this.parseOptions(b);this.init()};c.extend(PNotify.prototype,{version:"2.0.0",options:{title:!1,title_escape:!1,
        text:!1,text_escape:!1,styling:"bootstrap3",addclass:"",cornerclass:"",auto_display:!0,width:"300px",min_height:"16px",type:"notice",icon:!0,opacity:1,animation:"fade",animate_speed:"slow",position_animate_speed:500,shadow:!0,hide:!0,delay:8E3,mouse_reset:!0,remove:!0,insert_brs:!0,destroy:!0,stack:n},modules:{},runModules:function(b,a){var c,d;for(d in this.modules)if(c="object"===typeof a&&d in a?a[d]:a,"function"===typeof this.modules[d][b])this.modules[d][b](this,"object"===typeof this.options[d]?
        this.options[d]:{},c)},state:"initializing",timer:null,styles:null,elem:null,container:null,title_container:null,text_container:null,animating:!1,timerHide:!1,init:function(){var b=this;this.modules={};c.extend(!0,this.modules,PNotify.prototype.modules);this.styles="object"===typeof this.options.styling?this.options.styling:PNotify.styling[this.options.styling];this.elem=c("<div />",{"class":"ui-pnotify "+this.options.addclass,css:{display:"none"},mouseenter:function(a){if(b.options.mouse_reset&&
            "out"===b.animating){if(!b.timerHide)return;b.elem.stop(!0);b.state="open";b.animating="in";b.elem.css("height","auto").animate({width:b.options.width,opacity:b.options.opacity},"fast")}b.options.hide&&b.options.mouse_reset&&b.cancelRemove()},mouseleave:function(a){b.options.hide&&b.options.mouse_reset&&b.queueRemove();PNotify.positionAll()}});this.container=c("<div />",{"class":this.styles.container+" ui-pnotify-container "+("error"===this.options.type?this.styles.error:"info"===this.options.type?
            this.styles.info:"success"===this.options.type?this.styles.success:this.styles.notice)}).appendTo(this.elem);""!==this.options.cornerclass&&this.container.removeClass("ui-corner-all").addClass(this.options.cornerclass);this.options.shadow&&this.container.addClass("ui-pnotify-shadow");!1!==this.options.icon&&c("<div />",{"class":"ui-pnotify-icon"}).append(c("<span />",{"class":!0===this.options.icon?"error"===this.options.type?this.styles.error_icon:"info"===this.options.type?this.styles.info_icon:
            "success"===this.options.type?this.styles.success_icon:this.styles.notice_icon:this.options.icon})).prependTo(this.container);this.title_container=c("<h4 />",{"class":"ui-pnotify-title"}).appendTo(this.container);!1===this.options.title?this.title_container.hide():this.options.title_escape?this.title_container.text(this.options.title):this.title_container.html(this.options.title);this.text_container=c("<div />",{"class":"ui-pnotify-text"}).appendTo(this.container);!1===this.options.text?this.text_container.hide():
        this.options.text_escape?this.text_container.text(this.options.text):this.text_container.html(this.options.insert_brs?String(this.options.text).replace(/\n/g,"<br />"):this.options.text);"string"===typeof this.options.width&&this.elem.css("width",this.options.width);"string"===typeof this.options.min_height&&this.container.css("min-height",this.options.min_height);PNotify.notices="top"===this.options.stack.push?c.merge([this],PNotify.notices):c.merge(PNotify.notices,[this]);"top"===this.options.stack.push&&
    this.queuePosition(!1,1);this.options.stack.animation=!1;this.runModules("init");this.options.auto_display&&this.open();return this},update:function(b){var a=this.options;this.parseOptions(a,b);this.options.cornerclass!==a.cornerclass&&this.container.removeClass("ui-corner-all "+a.cornerclass).addClass(this.options.cornerclass);this.options.shadow!==a.shadow&&(this.options.shadow?this.container.addClass("ui-pnotify-shadow"):this.container.removeClass("ui-pnotify-shadow"));!1===this.options.addclass?
        this.elem.removeClass(a.addclass):this.options.addclass!==a.addclass&&this.elem.removeClass(a.addclass).addClass(this.options.addclass);!1===this.options.title?this.title_container.slideUp("fast"):this.options.title!==a.title&&(this.options.title_escape?this.title_container.text(this.options.title):this.title_container.html(this.options.title),!1===a.title&&this.title_container.slideDown(200));!1===this.options.text?this.text_container.slideUp("fast"):this.options.text!==a.text&&(this.options.text_escape?
        this.text_container.text(this.options.text):this.text_container.html(this.options.insert_brs?String(this.options.text).replace(/\n/g,"<br />"):this.options.text),!1===a.text&&this.text_container.slideDown(200));this.options.type!==a.type&&this.container.removeClass(this.styles.error+" "+this.styles.notice+" "+this.styles.success+" "+this.styles.info).addClass("error"===this.options.type?this.styles.error:"info"===this.options.type?this.styles.info:"success"===this.options.type?this.styles.success:
        this.styles.notice);if(this.options.icon!==a.icon||!0===this.options.icon&&this.options.type!==a.type)this.container.find("div.ui-pnotify-icon").remove(),!1!==this.options.icon&&c("<div />",{"class":"ui-pnotify-icon"}).append(c("<span />",{"class":!0===this.options.icon?"error"===this.options.type?this.styles.error_icon:"info"===this.options.type?this.styles.info_icon:"success"===this.options.type?this.styles.success_icon:this.styles.notice_icon:this.options.icon})).prependTo(this.container);this.options.width!==
    a.width&&this.elem.animate({width:this.options.width});this.options.min_height!==a.min_height&&this.container.animate({minHeight:this.options.min_height});this.options.opacity!==a.opacity&&this.elem.fadeTo(this.options.animate_speed,this.options.opacity);this.options.hide?a.hide||this.queueRemove():this.cancelRemove();this.queuePosition(!0);this.runModules("update",a);return this},open:function(){this.state="opening";this.runModules("beforeOpen");var b=this;this.elem.parent().length||this.elem.appendTo(this.options.stack.context?
        this.options.stack.context:g);"top"!==this.options.stack.push&&this.position(!0);"fade"===this.options.animation||"fade"===this.options.animation.effect_in?this.elem.show().fadeTo(0,0).hide():1!==this.options.opacity&&this.elem.show().fadeTo(0,this.options.opacity).hide();this.animateIn(function(){b.queuePosition(!0);b.options.hide&&b.queueRemove();b.state="open";b.runModules("afterOpen")});return this},remove:function(b){this.state="closing";this.timerHide=!!b;this.runModules("beforeClose");var a=
        this;this.timer&&(window.clearTimeout(this.timer),this.timer=null);this.animateOut(function(){a.state="closed";a.runModules("afterClose");a.queuePosition(!0);a.options.remove&&a.elem.detach();a.runModules("beforeDestroy");if(a.options.destroy&&null!==PNotify.notices){var b=c.inArray(a,PNotify.notices);-1!==b&&PNotify.notices.splice(b,1)}a.runModules("afterDestroy")});return this},get:function(){return this.elem},parseOptions:function(b,a){this.options=c.extend(!0,{},PNotify.prototype.options);this.options.stack=
        PNotify.prototype.options.stack;var f=[b,a],d,e;for(e in f){d=f[e];if("undefined"==typeof d)break;if("object"!==typeof d)this.options.text=d;else for(var l in d)this.modules[l]?c.extend(!0,this.options[l],d[l]):this.options[l]=d[l]}},animateIn:function(b){this.animating="in";var a;a="undefined"!==typeof this.options.animation.effect_in?this.options.animation.effect_in:this.options.animation;"none"===a?(this.elem.show(),b()):"show"===a?this.elem.show(this.options.animate_speed,b):"fade"===a?this.elem.show().fadeTo(this.options.animate_speed,
        this.options.opacity,b):"slide"===a?this.elem.slideDown(this.options.animate_speed,b):"function"===typeof a?a("in",b,this.elem):this.elem.show(a,"object"===typeof this.options.animation.options_in?this.options.animation.options_in:{},this.options.animate_speed,b)},animateOut:function(b){this.animating="out";var a;a="undefined"!==typeof this.options.animation.effect_out?this.options.animation.effect_out:this.options.animation;"none"===a?(this.elem.hide(),b()):"show"===a?this.elem.hide(this.options.animate_speed,
        b):"fade"===a?this.elem.fadeOut(this.options.animate_speed,b):"slide"===a?this.elem.slideUp(this.options.animate_speed,b):"function"===typeof a?a("out",b,this.elem):this.elem.hide(a,"object"===typeof this.options.animation.options_out?this.options.animation.options_out:{},this.options.animate_speed,b)},position:function(b){var a=this.options.stack;"undefined"===typeof a.context&&(a.context=g);if(a){"number"!==typeof a.nextpos1&&(a.nextpos1=a.firstpos1);"number"!==typeof a.nextpos2&&(a.nextpos2=a.firstpos2);
        "number"!==typeof a.addpos2&&(a.addpos2=0);var c="none"===this.elem.css("display");if(!c||b){var d,e={},f;switch(a.dir1){case "down":f="top";break;case "up":f="bottom";break;case "left":f="right";break;case "right":f="left"}b=parseInt(this.elem.css(f).replace(/(?:\..*|[^0-9.])/g,""));isNaN(b)&&(b=0);"undefined"!==typeof a.firstpos1||c||(a.firstpos1=b,a.nextpos1=a.firstpos1);var k;switch(a.dir2){case "down":k="top";break;case "up":k="bottom";break;case "left":k="right";break;case "right":k="left"}d=
            parseInt(this.elem.css(k).replace(/(?:\..*|[^0-9.])/g,""));isNaN(d)&&(d=0);"undefined"!==typeof a.firstpos2||c||(a.firstpos2=d,a.nextpos2=a.firstpos2);if("down"===a.dir1&&a.nextpos1+this.elem.height()>(a.context.is(g)?h.height():a.context.prop("scrollHeight"))||"up"===a.dir1&&a.nextpos1+this.elem.height()>(a.context.is(g)?h.height():a.context.prop("scrollHeight"))||"left"===a.dir1&&a.nextpos1+this.elem.width()>(a.context.is(g)?h.width():a.context.prop("scrollWidth"))||"right"===a.dir1&&a.nextpos1+
            this.elem.width()>(a.context.is(g)?h.width():a.context.prop("scrollWidth")))a.nextpos1=a.firstpos1,a.nextpos2+=a.addpos2+("undefined"===typeof a.spacing2?25:a.spacing2),a.addpos2=0;if(a.animation&&a.nextpos2<d)switch(a.dir2){case "down":e.top=a.nextpos2+"px";break;case "up":e.bottom=a.nextpos2+"px";break;case "left":e.right=a.nextpos2+"px";break;case "right":e.left=a.nextpos2+"px"}else"number"===typeof a.nextpos2&&this.elem.css(k,a.nextpos2+"px");switch(a.dir2){case "down":case "up":this.elem.outerHeight(!0)>
        a.addpos2&&(a.addpos2=this.elem.height());break;case "left":case "right":this.elem.outerWidth(!0)>a.addpos2&&(a.addpos2=this.elem.width())}if("number"===typeof a.nextpos1)if(a.animation&&(b>a.nextpos1||e.top||e.bottom||e.right||e.left))switch(a.dir1){case "down":e.top=a.nextpos1+"px";break;case "up":e.bottom=a.nextpos1+"px";break;case "left":e.right=a.nextpos1+"px";break;case "right":e.left=a.nextpos1+"px"}else this.elem.css(f,a.nextpos1+"px");(e.top||e.bottom||e.right||e.left)&&this.elem.animate(e,
            {duration:this.options.position_animate_speed,queue:!1});switch(a.dir1){case "down":case "up":a.nextpos1+=this.elem.height()+("undefined"===typeof a.spacing1?25:a.spacing1);break;case "left":case "right":a.nextpos1+=this.elem.width()+("undefined"===typeof a.spacing1?25:a.spacing1)}}return this}},queuePosition:function(b,a){f&&clearTimeout(f);a||(a=10);f=setTimeout(function(){PNotify.positionAll(b)},a);return this},cancelRemove:function(){this.timer&&window.clearTimeout(this.timer);return this},queueRemove:function(){var b=
        this;this.cancelRemove();this.timer=window.setTimeout(function(){b.remove(!0)},isNaN(this.options.delay)?0:this.options.delay);return this}});c.extend(PNotify,{notices:[],removeAll:function(){c.each(PNotify.notices,function(){this.remove&&this.remove()})},positionAll:function(b){f&&clearTimeout(f);f=null;c.each(PNotify.notices,function(){var a=this.options.stack;a&&(a.nextpos1=a.firstpos1,a.nextpos2=a.firstpos2,a.addpos2=0,a.animation=b)});c.each(PNotify.notices,function(){this.position()})},styling:{jqueryui:{container:"ui-widget ui-widget-content ui-corner-all",
            notice:"ui-state-highlight",notice_icon:"ui-icon ui-icon-info",info:"",info_icon:"ui-icon ui-icon-info",success:"ui-state-default",success_icon:"ui-icon ui-icon-circle-check",error:"ui-state-error",error_icon:"ui-icon ui-icon-alert"},bootstrap2:{container:"alert",notice:"",notice_icon:"icon-exclamation-sign",info:"alert-info",info_icon:"icon-info-sign",success:"alert-success",success_icon:"icon-ok-sign",error:"alert-error",error_icon:"icon-warning-sign"},bootstrap3:{container:"alert",notice:"alert-warning",
            notice_icon:"glyphicon glyphicon-exclamation-sign",info:"alert-info",info_icon:"glyphicon glyphicon-info-sign",success:"alert-success",success_icon:"glyphicon glyphicon-ok-sign",error:"alert-danger",error_icon:"glyphicon glyphicon-warning-sign"}}});PNotify.styling.fontawesome=c.extend({},PNotify.styling.bootstrap3);c.extend(PNotify.styling.fontawesome,{notice_icon:"fa fa-exclamation-circle",info_icon:"fa fa-info",success_icon:"fa fa-check",error_icon:"fa fa-warning"});document.body?m():c(m)});
(function(c){PNotify.prototype.options.buttons={closer:!0,closer_hover:!0,sticker:!0,sticker_hover:!0,labels:{close:"Close",stick:"Stick"}};PNotify.prototype.modules.buttons={myOptions:null,closer:null,sticker:null,init:function(a,b){var d=this;this.myOptions=b;a.elem.on({mouseenter:function(b){!d.myOptions.sticker||a.options.nonblock&&a.options.nonblock.nonblock||d.sticker.trigger("pnotify_icon").css("visibility","visible");!d.myOptions.closer||a.options.nonblock&&a.options.nonblock.nonblock||d.closer.css("visibility",
            "visible")},mouseleave:function(a){d.myOptions.sticker_hover&&d.sticker.css("visibility","hidden");d.myOptions.closer_hover&&d.closer.css("visibility","hidden")}});this.sticker=c("<div />",{"class":"ui-pnotify-sticker",css:{cursor:"pointer",visibility:b.sticker_hover?"hidden":"visible"},click:function(){a.options.hide=!a.options.hide;a.options.hide?a.queueRemove():a.cancelRemove();c(this).trigger("pnotify_icon")}}).bind("pnotify_icon",function(){c(this).children().removeClass(a.styles.pin_up+" "+
        a.styles.pin_down).addClass(a.options.hide?a.styles.pin_up:a.styles.pin_down)}).append(c("<span />",{"class":a.styles.pin_up,title:b.labels.stick})).prependTo(a.container);(!b.sticker||a.options.nonblock&&a.options.nonblock.nonblock)&&this.sticker.css("display","none");this.closer=c("<div />",{"class":"ui-pnotify-closer",css:{cursor:"pointer",visibility:b.closer_hover?"hidden":"visible"},click:function(){a.remove(!1);d.sticker.css("visibility","hidden");d.closer.css("visibility","hidden")}}).append(c("<span />",
        {"class":a.styles.closer,title:b.labels.close})).prependTo(a.container);(!b.closer||a.options.nonblock&&a.options.nonblock.nonblock)&&this.closer.css("display","none")},update:function(a,b){this.myOptions=b;!b.closer||a.options.nonblock&&a.options.nonblock.nonblock?this.closer.css("display","none"):b.closer&&this.closer.css("display","block");!b.sticker||a.options.nonblock&&a.options.nonblock.nonblock?this.sticker.css("display","none"):b.sticker&&this.sticker.css("display","block");this.sticker.trigger("pnotify_icon");
        b.sticker_hover?this.sticker.css("visibility","hidden"):a.options.nonblock&&a.options.nonblock.nonblock||this.sticker.css("visibility","visible");b.closer_hover?this.closer.css("visibility","hidden"):a.options.nonblock&&a.options.nonblock.nonblock||this.closer.css("visibility","visible")}};c.extend(PNotify.styling.jqueryui,{closer:"ui-icon ui-icon-close",pin_up:"ui-icon ui-icon-pin-w",pin_down:"ui-icon ui-icon-pin-s"});c.extend(PNotify.styling.bootstrap2,{closer:"icon-remove",pin_up:"icon-pause",
    pin_down:"icon-play"});c.extend(PNotify.styling.bootstrap3,{closer:"glyphicon glyphicon-remove",pin_up:"glyphicon glyphicon-pause",pin_down:"glyphicon glyphicon-play"});c.extend(PNotify.styling.fontawesome,{closer:"fa fa-times",pin_up:"fa fa-pause",pin_down:"fa fa-play"})})(jQuery);
(function(f){var c=PNotify.prototype.init,d=PNotify.prototype.open,e=PNotify.prototype.remove;PNotify.prototype.init=function(){this.options.before_init&&this.options.before_init(this.options);c.apply(this,arguments);this.options.after_init&&this.options.after_init(this)};PNotify.prototype.open=function(){var a;this.options.before_open&&(a=this.options.before_open(this));!1!==a&&(d.apply(this,arguments),this.options.after_open&&this.options.after_open(this))};PNotify.prototype.remove=function(a){var b;
    this.options.before_close&&(b=this.options.before_close(this,a));!1!==b&&(e.apply(this,arguments),this.options.after_close&&this.options.after_close(this,a))}})(jQuery);
(function(d){PNotify.prototype.options.confirm={confirm:!1,align:"right",buttons:[{text:"Ok",addClass:"",click:function(b){b.get().trigger("pnotify.confirm");b.remove()}},{text:"Cancel",addClass:"",click:function(b){b.get().trigger("pnotify.cancel");b.remove()}}]};PNotify.prototype.modules.confirm={buttonContainer:null,init:function(b,c){this.buttonContainer=d('<div style="margin-top:5px;clear:both;text-align:'+c.align+';" />').appendTo(b.container);c.confirm?this.makeButtons(b,c):this.buttonContainer.hide()},
    update:function(b,c){c.confirm?(this.makeButtons(b,c),this.buttonContainer.show()):this.buttonContainer.hide().empty()},makeButtons:function(b,c){var e=!1,a;this.buttonContainer.empty();for(var f in c.buttons){a=c.buttons[f];e?this.buttonContainer.append(" "):e=!0;a=d('<button type="button" class="'+b.styles.btn+" "+a.addClass+'">'+a.text+"</button>").appendTo(this.buttonContainer).on("click",function(a){return function(){"function"==typeof a.click&&a.click(b)}}(a));b.styles.text&&a.wrapInner('<span class="'+
        b.styles.text+'"></span>');b.styles.btnhover&&a.hover(function(a){return function(){a.addClass(b.styles.btnhover)}}(a),function(a){return function(){a.removeClass(b.styles.btnhover)}}(a));if(b.styles.btnactive)a.on("mousedown",function(a){return function(){a.addClass(b.styles.btnactive)}}(a)).on("mouseup",function(a){return function(){a.removeClass(b.styles.btnactive)}}(a));if(b.styles.btnfocus)a.on("focus",function(a){return function(){a.addClass(b.styles.btnfocus)}}(a)).on("blur",function(a){return function(){a.removeClass(b.styles.btnfocus)}}(a))}}};
    d.extend(PNotify.styling.jqueryui,{btn:"ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only",btnhover:"ui-state-hover",btnactive:"ui-state-active",btnfocus:"ui-state-focus",text:"ui-button-text"});d.extend(PNotify.styling.bootstrap2,{btn:"btn"});d.extend(PNotify.styling.bootstrap3,{btn:"btn btn-default"});d.extend(PNotify.styling.fontawesome,{btn:"btn btn-default"})})(jQuery);
(function(e){var c,d=function(a,b){d="Notification"in window?function(a,b){return new Notification(a,b)}:"mozNotification"in navigator?function(a,b){return navigator.mozNotification.createNotification(a,b.body,b.icon).show()}:"webkitNotifications"in window?function(a,b){return window.webkitNotifications.createNotification(b.icon,a,b.body)}:function(a,b){return null};return d(a,b)};PNotify.prototype.options.desktop={desktop:!1,icon:null};PNotify.prototype.modules.desktop={init:function(a,b){b.desktop&&
    (c=PNotify.desktop.checkPermission(),0==c&&(null===b.icon?b.icon="http://sciactive.com/pnotify/includes/desktop/"+a.options.type+".png":!1===b.icon&&(b.icon=null),a.desktop=d(a.options.title,{icon:b.icon,body:a.options.text}),"close"in a.desktop||(a.desktop=function(){a.desktop.cancel()}),a.desktop.onclick=function(){a.elem.trigger("click")},a.desktop.onclose=function(){"closing"!==a.state&&"closed"!==a.state&&a.remove()}))},update:function(a,b,c){},beforeOpen:function(a,b){0==c&&b.desktop&&a.elem.css({left:"-10000px",
        display:"none"})},afterOpen:function(a,b){0==c&&b.desktop&&(a.elem.css({left:"-10000px",display:"none"}),"show"in a.desktop&&a.desktop.show())},beforeClose:function(a,b){0==c&&b.desktop&&a.elem.css({left:"-10000px",display:"none"})},afterClose:function(a,b){0==c&&b.desktop&&(a.elem.css({left:"-10000px",display:"none"}),a.desktop.close())}};PNotify.desktop={permission:function(){"undefined"!==typeof Notification&&"requestPermission"in Notification?Notification.requestPermission():"webkitNotifications"in
        window&&window.webkitNotifications.requestPermission()},checkPermission:function(){return"undefined"!==typeof Notification&&"permission"in Notification?"granted"==Notification.permission?0:1:"webkitNotifications"in window?window.webkitNotifications.checkPermission():1}};c=PNotify.desktop.checkPermission()})(jQuery);
(function(a){var c,f;a(function(){a("body").on("pnotify.history-all",function(){a.each(PNotify.notices,function(){this.modules.history.inHistory&&(this.elem.is(":visible")?this.options.hide&&this.queueRemove():this.open&&this.open())})}).on("pnotify.history-last",function(){var a="top"===PNotify.prototype.options.stack.push,b=a?0:-1,d;do{d=-1===b?PNotify.notices.slice(b):PNotify.notices.slice(b,b+1);if(!d[0])return!1;b=a?b+1:b-1}while(!d[0].modules.history.inHistory||d[0].elem.is(":visible"));d[0].open&&
d[0].open()})});PNotify.prototype.options.history={history:!0,menu:!1,fixed:!0,maxonscreen:Infinity,labels:{redisplay:"Redisplay",all:"All",last:"Last"}};PNotify.prototype.modules.history={inHistory:!1,init:function(e,b){e.options.destroy=!1;this.inHistory=b.history;if(b.menu&&"undefined"===typeof c){c=a("<div />",{"class":"ui-pnotify-history-container "+e.styles.hi_menu,mouseleave:function(){c.animate({top:"-"+f+"px"},{duration:100,queue:!1})}}).append(a("<div />",{"class":"ui-pnotify-history-header",
        text:b.labels.redisplay})).append(a("<button />",{"class":"ui-pnotify-history-all "+e.styles.hi_btn,text:b.labels.all,mouseenter:function(){a(this).addClass(e.styles.hi_btnhov)},mouseleave:function(){a(this).removeClass(e.styles.hi_btnhov)},click:function(){a(this).trigger("pnotify.history-all");return!1}})).append(a("<button />",{"class":"ui-pnotify-history-last "+e.styles.hi_btn,text:b.labels.last,mouseenter:function(){a(this).addClass(e.styles.hi_btnhov)},mouseleave:function(){a(this).removeClass(e.styles.hi_btnhov)},
        click:function(){a(this).trigger("pnotify.history-last");return!1}})).appendTo("body");var d=a("<span />",{"class":"ui-pnotify-history-pulldown "+e.styles.hi_hnd,mouseenter:function(){c.animate({top:"0"},{duration:100,queue:!1})}}).appendTo(c);console.log(d.offset());f=d.offset().top+2;c.css({top:"-"+f+"px"});b.fixed&&c.addClass("ui-pnotify-history-fixed")}},update:function(a,b){this.inHistory=b.history;b.fixed&&c?c.addClass("ui-pnotify-history-fixed"):c&&c.removeClass("ui-pnotify-history-fixed")},
    beforeOpen:function(c,b){if(PNotify.notices&&PNotify.notices.length>b.maxonscreen){var d;d="top"!==c.options.stack.push?PNotify.notices.slice(0,PNotify.notices.length-b.maxonscreen):PNotify.notices.slice(b.maxonscreen,PNotify.notices.length);a.each(d,function(){this.remove&&this.remove()})}}};a.extend(PNotify.styling.jqueryui,{hi_menu:"ui-state-default ui-corner-bottom",hi_btn:"ui-state-default ui-corner-all",hi_btnhov:"ui-state-hover",hi_hnd:"ui-icon ui-icon-grip-dotted-horizontal"});a.extend(PNotify.styling.bootstrap2,
    {hi_menu:"well",hi_btn:"btn",hi_btnhov:"",hi_hnd:"icon-chevron-down"});a.extend(PNotify.styling.bootstrap3,{hi_menu:"well",hi_btn:"btn btn-default",hi_btnhov:"",hi_hnd:"glyphicon glyphicon-chevron-down"});a.extend(PNotify.styling.fontawesome,{hi_menu:"well",hi_btn:"btn btn-default",hi_btnhov:"",hi_hnd:"fa fa-chevron-down"})})(jQuery);
(function(k){var f=/^on/,l=/^(dbl)?click$|^mouse(move|down|up|over|out|enter|leave)$|^contextmenu$/,m=/^(focus|blur|select|change|reset)$|^key(press|down|up)$/,n=/^(scroll|resize|(un)?load|abort|error)$/,g=function(b,a){var c;b=b.toLowerCase();document.createEvent&&this.dispatchEvent?(b=b.replace(f,""),b.match(l)?(k(this).offset(),c=document.createEvent("MouseEvents"),c.initMouseEvent(b,a.bubbles,a.cancelable,a.view,a.detail,a.screenX,a.screenY,a.clientX,a.clientY,a.ctrlKey,a.altKey,a.shiftKey,a.metaKey,
    a.button,a.relatedTarget)):b.match(m)?(c=document.createEvent("UIEvents"),c.initUIEvent(b,a.bubbles,a.cancelable,a.view,a.detail)):b.match(n)&&(c=document.createEvent("HTMLEvents"),c.initEvent(b,a.bubbles,a.cancelable)),c&&this.dispatchEvent(c)):(b.match(f)||(b="on"+b),c=document.createEventObject(a),this.fireEvent(b,c))},e,d=function(b,a,c){b.elem.css("display","none");var h=document.elementFromPoint(a.clientX,a.clientY);b.elem.css("display","block");var d=k(h),f=d.css("cursor");b.elem.css("cursor",
    "auto"!==f?f:"default");e&&e.get(0)==h||(e&&(g.call(e.get(0),"mouseleave",a.originalEvent),g.call(e.get(0),"mouseout",a.originalEvent)),g.call(h,"mouseenter",a.originalEvent),g.call(h,"mouseover",a.originalEvent));g.call(h,c,a.originalEvent);e=d};PNotify.prototype.options.nonblock={nonblock:!1,nonblock_opacity:0.2};PNotify.prototype.modules.nonblock={myOptions:null,init:function(b,a){var c=this;this.myOptions=a;b.elem.on({mouseenter:function(a){c.myOptions.nonblock&&a.stopPropagation();c.myOptions.nonblock&&
        b.elem.stop().animate({opacity:c.myOptions.nonblock_opacity},"fast")},mouseleave:function(a){c.myOptions.nonblock&&a.stopPropagation();e=null;b.elem.css("cursor","auto");c.myOptions.nonblock&&"out"!==b.animating&&b.elem.stop().animate({opacity:b.options.opacity},"fast")},mouseover:function(a){c.myOptions.nonblock&&a.stopPropagation()},mouseout:function(a){c.myOptions.nonblock&&a.stopPropagation()},mousemove:function(a){c.myOptions.nonblock&&(a.stopPropagation(),d(b,a,"onmousemove"))},mousedown:function(a){c.myOptions.nonblock&&
        (a.stopPropagation(),a.preventDefault(),d(b,a,"onmousedown"))},mouseup:function(a){c.myOptions.nonblock&&(a.stopPropagation(),a.preventDefault(),d(b,a,"onmouseup"))},click:function(a){c.myOptions.nonblock&&(a.stopPropagation(),d(b,a,"onclick"))},dblclick:function(a){c.myOptions.nonblock&&(a.stopPropagation(),d(b,a,"ondblclick"))}})},update:function(b,a){this.myOptions=a}}})(jQuery);
(function(c){PNotify.prototype.options.reference={putThing:!1,labels:{text:"Spin Around"}};PNotify.prototype.modules.reference={thingElem:null,init:function(b,a){var d=this;a.putThing&&(this.thingElem=c('<button style="float:right;" class="btn btn-default" type="button" disabled><i class="'+b.styles.athing+'" />&nbsp;'+a.labels.text+"</button>").appendTo(b.container),b.container.append('<div style="clear: right; line-height: 0;" />'),b.elem.on({mouseenter:function(b){d.thingElem.prop("disabled",!1)},
        mouseleave:function(b){d.thingElem.prop("disabled",!0)}}),this.thingElem.on("click",function(){var a=0,c=setInterval(function(){a+=10;360==a&&(a=0,clearInterval(c));b.elem.css({"-moz-transform":"rotate("+a+"deg)","-webkit-transform":"rotate("+a+"deg)","-o-transform":"rotate("+a+"deg)","-ms-transform":"rotate("+a+"deg)",filter:"progid:DXImageTransform.Microsoft.BasicImage(rotation="+a/360*4+")"})},20)}))},update:function(b,a,c){a.putThing&&this.thingElem?this.thingElem.show():!a.putThing&&this.thingElem&&
        this.thingElem.hide();this.thingElem&&this.thingElem.find("i").attr("class",b.styles.athing)},beforeOpen:function(b,a){},afterOpen:function(b,a){},beforeClose:function(b,a){},afterClose:function(b,a){},beforeDestroy:function(b,a){},afterDestroy:function(b,a){}};c.extend(PNotify.styling.jqueryui,{athing:"ui-icon ui-icon-refresh"});c.extend(PNotify.styling.bootstrap2,{athing:"icon-refresh"});c.extend(PNotify.styling.bootstrap3,{athing:"glyphicon glyphicon-refresh"});c.extend(PNotify.styling.fontawesome,
    {athing:"fa fa-refresh"})})(jQuery);

/*!
* sweetalert2 v11.22.3
* Released under the MIT License.
*/
!function(e,t){"object"==typeof exports&&"undefined"!=typeof module?module.exports=t():"function"==typeof define&&define.amd?define(t):(e="undefined"!=typeof globalThis?globalThis:e||self).Sweetalert2=t()}(this,function(){"use strict";function e(e,t,n){if("function"==typeof e?e===t:e.has(t))return arguments.length<3?t:n;throw new TypeError("Private element is not present on this object")}function t(t,n){return t.get(e(t,n))}function n(e,t,n){(function(e,t){if(t.has(e))throw new TypeError("Cannot initialize the same private elements twice on an object")})(e,t),t.set(e,n)}const o={},i=e=>new Promise(t=>{if(!e)return t();const n=window.scrollX,i=window.scrollY;o.restoreFocusTimeout=setTimeout(()=>{o.previousActiveElement instanceof HTMLElement?(o.previousActiveElement.focus(),o.previousActiveElement=null):document.body&&document.body.focus(),t()},100),window.scrollTo(n,i)}),s="swal2-",r=["container","shown","height-auto","iosfix","popup","modal","no-backdrop","no-transition","toast","toast-shown","show","hide","close","title","html-container","actions","confirm","deny","cancel","footer","icon","icon-content","image","input","file","range","select","radio","checkbox","label","textarea","inputerror","input-label","validation-message","progress-steps","active-progress-step","progress-step","progress-step-line","loader","loading","styled","top","top-start","top-end","top-left","top-right","center","center-start","center-end","center-left","center-right","bottom","bottom-start","bottom-end","bottom-left","bottom-right","grow-row","grow-column","grow-fullscreen","rtl","timer-progress-bar","timer-progress-bar-container","scrollbar-measure","icon-success","icon-warning","icon-info","icon-question","icon-error","draggable","dragging"].reduce((e,t)=>(e[t]=s+t,e),{}),a=["success","warning","info","question","error"].reduce((e,t)=>(e[t]=s+t,e),{}),l="SweetAlert2:",c=e=>e.charAt(0).toUpperCase()+e.slice(1),u=e=>{console.warn(`${l} ${"object"==typeof e?e.join(" "):e}`)},d=e=>{console.error(`${l} ${e}`)},p=[],m=(e,t=null)=>{var n;n=`"${e}" is deprecated and will be removed in the next major release.${t?` Use "${t}" instead.`:""}`,p.includes(n)||(p.push(n),u(n))},h=e=>"function"==typeof e?e():e,g=e=>e&&"function"==typeof e.toPromise,f=e=>g(e)?e.toPromise():Promise.resolve(e),b=e=>e&&Promise.resolve(e)===e,y=()=>document.body.querySelector(`.${r.container}`),v=e=>{const t=y();return t?t.querySelector(e):null},w=e=>v(`.${e}`),C=()=>w(r.popup),A=()=>w(r.icon),E=()=>w(r.title),k=()=>w(r["html-container"]),$=()=>w(r.image),B=()=>w(r["progress-steps"]),L=()=>w(r["validation-message"]),P=()=>v(`.${r.actions} .${r.confirm}`),x=()=>v(`.${r.actions} .${r.cancel}`),T=()=>v(`.${r.actions} .${r.deny}`),S=()=>v(`.${r.loader}`),O=()=>w(r.actions),M=()=>w(r.footer),j=()=>w(r["timer-progress-bar"]),H=()=>w(r.close),I=()=>{const e=C();if(!e)return[];const t=e.querySelectorAll('[tabindex]:not([tabindex="-1"]):not([tabindex="0"])'),n=Array.from(t).sort((e,t)=>{const n=parseInt(e.getAttribute("tabindex")||"0"),o=parseInt(t.getAttribute("tabindex")||"0");return n>o?1:n<o?-1:0}),o=e.querySelectorAll('\n  a[href],\n  area[href],\n  input:not([disabled]),\n  select:not([disabled]),\n  textarea:not([disabled]),\n  button:not([disabled]),\n  iframe,\n  object,\n  embed,\n  [tabindex="0"],\n  [contenteditable],\n  audio[controls],\n  video[controls],\n  summary\n'),i=Array.from(o).filter(e=>"-1"!==e.getAttribute("tabindex"));return[...new Set(n.concat(i))].filter(e=>ee(e))},D=()=>N(document.body,r.shown)&&!N(document.body,r["toast-shown"])&&!N(document.body,r["no-backdrop"]),V=()=>{const e=C();return!!e&&N(e,r.toast)},q=(e,t)=>{if(e.textContent="",t){const n=(new DOMParser).parseFromString(t,"text/html"),o=n.querySelector("head");o&&Array.from(o.childNodes).forEach(t=>{e.appendChild(t)});const i=n.querySelector("body");i&&Array.from(i.childNodes).forEach(t=>{t instanceof HTMLVideoElement||t instanceof HTMLAudioElement?e.appendChild(t.cloneNode(!0)):e.appendChild(t)})}},N=(e,t)=>{if(!t)return!1;const n=t.split(/\s+/);for(let t=0;t<n.length;t++)if(!e.classList.contains(n[t]))return!1;return!0},_=(e,t,n)=>{if(((e,t)=>{Array.from(e.classList).forEach(n=>{Object.values(r).includes(n)||Object.values(a).includes(n)||Object.values(t.showClass||{}).includes(n)||e.classList.remove(n)})})(e,t),!t.customClass)return;const o=t.customClass[n];o&&("string"==typeof o||o.forEach?z(e,o):u(`Invalid type of customClass.${n}! Expected string or iterable object, got "${typeof o}"`))},F=(e,t)=>{if(!t)return null;switch(t){case"select":case"textarea":case"file":return e.querySelector(`.${r.popup} > .${r[t]}`);case"checkbox":return e.querySelector(`.${r.popup} > .${r.checkbox} input`);case"radio":return e.querySelector(`.${r.popup} > .${r.radio} input:checked`)||e.querySelector(`.${r.popup} > .${r.radio} input:first-child`);case"range":return e.querySelector(`.${r.popup} > .${r.range} input`);default:return e.querySelector(`.${r.popup} > .${r.input}`)}},R=e=>{if(e.focus(),"file"!==e.type){const t=e.value;e.value="",e.value=t}},U=(e,t,n)=>{e&&t&&("string"==typeof t&&(t=t.split(/\s+/).filter(Boolean)),t.forEach(t=>{Array.isArray(e)?e.forEach(e=>{n?e.classList.add(t):e.classList.remove(t)}):n?e.classList.add(t):e.classList.remove(t)}))},z=(e,t)=>{U(e,t,!0)},W=(e,t)=>{U(e,t,!1)},K=(e,t)=>{const n=Array.from(e.children);for(let e=0;e<n.length;e++){const o=n[e];if(o instanceof HTMLElement&&N(o,t))return o}},Y=(e,t,n)=>{n===`${parseInt(n)}`&&(n=parseInt(n)),n||0===parseInt(n)?e.style.setProperty(t,"number"==typeof n?`${n}px`:n):e.style.removeProperty(t)},X=(e,t="flex")=>{e&&(e.style.display=t)},Z=e=>{e&&(e.style.display="none")},J=(e,t="block")=>{e&&new MutationObserver(()=>{Q(e,e.innerHTML,t)}).observe(e,{childList:!0,subtree:!0})},G=(e,t,n,o)=>{const i=e.querySelector(t);i&&i.style.setProperty(n,o)},Q=(e,t,n="flex")=>{t?X(e,n):Z(e)},ee=e=>!(!e||!(e.offsetWidth||e.offsetHeight||e.getClientRects().length)),te=e=>!!(e.scrollHeight>e.clientHeight),ne=e=>{const t=window.getComputedStyle(e),n=parseFloat(t.getPropertyValue("animation-duration")||"0"),o=parseFloat(t.getPropertyValue("transition-duration")||"0");return n>0||o>0},oe=(e,t=!1)=>{const n=j();n&&ee(n)&&(t&&(n.style.transition="none",n.style.width="100%"),setTimeout(()=>{n.style.transition=`width ${e/1e3}s linear`,n.style.width="0%"},10))},ie=`\n <div aria-labelledby="${r.title}" aria-describedby="${r["html-container"]}" class="${r.popup}" tabindex="-1">\n   <button type="button" class="${r.close}"></button>\n   <ul class="${r["progress-steps"]}"></ul>\n   <div class="${r.icon}"></div>\n   <img class="${r.image}" />\n   <h2 class="${r.title}" id="${r.title}"></h2>\n   <div class="${r["html-container"]}" id="${r["html-container"]}"></div>\n   <input class="${r.input}" id="${r.input}" />\n   <input type="file" class="${r.file}" />\n   <div class="${r.range}">\n     <input type="range" />\n     <output></output>\n   </div>\n   <select class="${r.select}" id="${r.select}"></select>\n   <div class="${r.radio}"></div>\n   <label class="${r.checkbox}">\n     <input type="checkbox" id="${r.checkbox}" />\n     <span class="${r.label}"></span>\n   </label>\n   <textarea class="${r.textarea}" id="${r.textarea}"></textarea>\n   <div class="${r["validation-message"]}" id="${r["validation-message"]}"></div>\n   <div class="${r.actions}">\n     <div class="${r.loader}"></div>\n     <button type="button" class="${r.confirm}"></button>\n     <button type="button" class="${r.deny}"></button>\n     <button type="button" class="${r.cancel}"></button>\n   </div>\n   <div class="${r.footer}"></div>\n   <div class="${r["timer-progress-bar-container"]}">\n     <div class="${r["timer-progress-bar"]}"></div>\n   </div>\n </div>\n`.replace(/(^|\n)\s*/g,""),se=()=>{o.currentInstance.resetValidationMessage()},re=e=>{const t=(()=>{const e=y();return!!e&&(e.remove(),W([document.documentElement,document.body],[r["no-backdrop"],r["toast-shown"],r["has-column"]]),!0)})();if("undefined"==typeof window||"undefined"==typeof document)return void d("SweetAlert2 requires document to initialize");const n=document.createElement("div");n.className=r.container,t&&z(n,r["no-transition"]),q(n,ie),n.dataset.swal2Theme=e.theme;const o="string"==typeof(i=e.target)?document.querySelector(i):i;var i;o.appendChild(n),e.topLayer&&(n.setAttribute("popover",""),n.showPopover()),(e=>{const t=C();t.setAttribute("role",e.toast?"alert":"dialog"),t.setAttribute("aria-live",e.toast?"polite":"assertive"),e.toast||t.setAttribute("aria-modal","true")})(e),(e=>{"rtl"===window.getComputedStyle(e).direction&&z(y(),r.rtl)})(o),(()=>{const e=C(),t=K(e,r.input),n=K(e,r.file),o=e.querySelector(`.${r.range} input`),i=e.querySelector(`.${r.range} output`),s=K(e,r.select),a=e.querySelector(`.${r.checkbox} input`),l=K(e,r.textarea);t.oninput=se,n.onchange=se,s.onchange=se,a.onchange=se,l.oninput=se,o.oninput=()=>{se(),i.value=o.value},o.onchange=()=>{se(),i.value=o.value}})()},ae=(e,t)=>{e instanceof HTMLElement?t.appendChild(e):"object"==typeof e?le(e,t):e&&q(t,e)},le=(e,t)=>{e.jquery?ce(t,e):q(t,e.toString())},ce=(e,t)=>{if(e.textContent="",0 in t)for(let n=0;n in t;n++)e.appendChild(t[n].cloneNode(!0));else e.appendChild(t.cloneNode(!0))},ue=(e,t)=>{const n=O(),o=S();n&&o&&(t.showConfirmButton||t.showDenyButton||t.showCancelButton?X(n):Z(n),_(n,t,"actions"),function(e,t,n){const o=P(),i=T(),s=x();if(!o||!i||!s)return;pe(o,"confirm",n),pe(i,"deny",n),pe(s,"cancel",n),function(e,t,n,o){if(!o.buttonsStyling)return void W([e,t,n],r.styled);z([e,t,n],r.styled),o.confirmButtonColor&&e.style.setProperty("--swal2-confirm-button-background-color",o.confirmButtonColor);o.denyButtonColor&&t.style.setProperty("--swal2-deny-button-background-color",o.denyButtonColor);o.cancelButtonColor&&n.style.setProperty("--swal2-cancel-button-background-color",o.cancelButtonColor);de(e),de(t),de(n)}(o,i,s,n),n.reverseButtons&&(n.toast?(e.insertBefore(s,o),e.insertBefore(i,o)):(e.insertBefore(s,t),e.insertBefore(i,t),e.insertBefore(o,t)))}(n,o,t),q(o,t.loaderHtml||""),_(o,t,"loader"))};function de(e){const t=window.getComputedStyle(e);if(t.getPropertyValue("--swal2-action-button-focus-box-shadow"))return;const n=t.backgroundColor.replace(/rgba?\((\d+), (\d+), (\d+).*/,"rgba($1, $2, $3, 0.5)");e.style.setProperty("--swal2-action-button-focus-box-shadow",t.getPropertyValue("--swal2-outline").replace(/ rgba\(.*/,` ${n}`))}function pe(e,t,n){const o=c(t);Q(e,n[`show${o}Button`],"inline-block"),q(e,n[`${t}ButtonText`]||""),e.setAttribute("aria-label",n[`${t}ButtonAriaLabel`]||""),e.className=r[t],_(e,n,`${t}Button`)}const me=(e,t)=>{const n=y();n&&(!function(e,t){"string"==typeof t?e.style.background=t:t||z([document.documentElement,document.body],r["no-backdrop"])}(n,t.backdrop),function(e,t){if(!t)return;t in r?z(e,r[t]):(u('The "position" parameter is not valid, defaulting to "center"'),z(e,r.center))}(n,t.position),function(e,t){if(!t)return;z(e,r[`grow-${t}`])}(n,t.grow),_(n,t,"container"))};var he={innerParams:new WeakMap,domCache:new WeakMap};const ge=["input","file","range","select","radio","checkbox","textarea"],fe=e=>{if(!e.input)return;if(!Ee[e.input])return void d(`Unexpected type of input! Expected ${Object.keys(Ee).join(" | ")}, got "${e.input}"`);const t=Ce(e.input);if(!t)return;const n=Ee[e.input](t,e);X(t),e.inputAutoFocus&&setTimeout(()=>{R(n)})},be=(e,t)=>{const n=C();if(!n)return;const o=F(n,e);if(o){(e=>{for(let t=0;t<e.attributes.length;t++){const n=e.attributes[t].name;["id","type","value","style"].includes(n)||e.removeAttribute(n)}})(o);for(const e in t)o.setAttribute(e,t[e])}},ye=e=>{if(!e.input)return;const t=Ce(e.input);t&&_(t,e,"input")},ve=(e,t)=>{!e.placeholder&&t.inputPlaceholder&&(e.placeholder=t.inputPlaceholder)},we=(e,t,n)=>{if(n.inputLabel){const o=document.createElement("label"),i=r["input-label"];o.setAttribute("for",e.id),o.className=i,"object"==typeof n.customClass&&z(o,n.customClass.inputLabel),o.innerText=n.inputLabel,t.insertAdjacentElement("beforebegin",o)}},Ce=e=>{const t=C();if(t)return K(t,r[e]||r.input)},Ae=(e,t)=>{["string","number"].includes(typeof t)?e.value=`${t}`:b(t)||u(`Unexpected type of inputValue! Expected "string", "number" or "Promise", got "${typeof t}"`)},Ee={};Ee.text=Ee.email=Ee.password=Ee.number=Ee.tel=Ee.url=Ee.search=Ee.date=Ee["datetime-local"]=Ee.time=Ee.week=Ee.month=(e,t)=>(Ae(e,t.inputValue),we(e,e,t),ve(e,t),e.type=t.input,e),Ee.file=(e,t)=>(we(e,e,t),ve(e,t),e),Ee.range=(e,t)=>{const n=e.querySelector("input"),o=e.querySelector("output");return Ae(n,t.inputValue),n.type=t.input,Ae(o,t.inputValue),we(n,e,t),e},Ee.select=(e,t)=>{if(e.textContent="",t.inputPlaceholder){const n=document.createElement("option");q(n,t.inputPlaceholder),n.value="",n.disabled=!0,n.selected=!0,e.appendChild(n)}return we(e,e,t),e},Ee.radio=e=>(e.textContent="",e),Ee.checkbox=(e,t)=>{const n=F(C(),"checkbox");n.value="1",n.checked=Boolean(t.inputValue);const o=e.querySelector("span");return q(o,t.inputPlaceholder||t.inputLabel),n},Ee.textarea=(e,t)=>{Ae(e,t.inputValue),ve(e,t),we(e,e,t);return setTimeout(()=>{if("MutationObserver"in window){const n=parseInt(window.getComputedStyle(C()).width);new MutationObserver(()=>{if(!document.body.contains(e))return;const o=e.offsetWidth+(i=e,parseInt(window.getComputedStyle(i).marginLeft)+parseInt(window.getComputedStyle(i).marginRight));var i;o>n?C().style.width=`${o}px`:Y(C(),"width",t.width)}).observe(e,{attributes:!0,attributeFilter:["style"]})}}),e};const ke=(e,t)=>{const n=k();n&&(J(n),_(n,t,"htmlContainer"),t.html?(ae(t.html,n),X(n,"block")):t.text?(n.textContent=t.text,X(n,"block")):Z(n),((e,t)=>{const n=C();if(!n)return;const o=he.innerParams.get(e),i=!o||t.input!==o.input;ge.forEach(e=>{const o=K(n,r[e]);o&&(be(e,t.inputAttributes),o.className=r[e],i&&Z(o))}),t.input&&(i&&fe(t),ye(t))})(e,t))},$e=(e,t)=>{for(const[n,o]of Object.entries(a))t.icon!==n&&W(e,o);z(e,t.icon&&a[t.icon]),Pe(e,t),Be(),_(e,t,"icon")},Be=()=>{const e=C();if(!e)return;const t=window.getComputedStyle(e).getPropertyValue("background-color"),n=e.querySelectorAll("[class^=swal2-success-circular-line], .swal2-success-fix");for(let e=0;e<n.length;e++)n[e].style.backgroundColor=t},Le=(e,t)=>{if(!t.icon&&!t.iconHtml)return;let n=e.innerHTML,o="";if(t.iconHtml)o=xe(t.iconHtml);else if("success"===t.icon)o=(e=>`\n  ${e.animation?'<div class="swal2-success-circular-line-left"></div>':""}\n  <span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span>\n  <div class="swal2-success-ring"></div>\n  ${e.animation?'<div class="swal2-success-fix"></div>':""}\n  ${e.animation?'<div class="swal2-success-circular-line-right"></div>':""}\n`)(t),n=n.replace(/ style=".*?"/g,"");else if("error"===t.icon)o='\n  <span class="swal2-x-mark">\n    <span class="swal2-x-mark-line-left"></span>\n    <span class="swal2-x-mark-line-right"></span>\n  </span>\n';else if(t.icon){o=xe({question:"?",warning:"!",info:"i"}[t.icon])}n.trim()!==o.trim()&&q(e,o)},Pe=(e,t)=>{if(t.iconColor){e.style.color=t.iconColor,e.style.borderColor=t.iconColor;for(const n of[".swal2-success-line-tip",".swal2-success-line-long",".swal2-x-mark-line-left",".swal2-x-mark-line-right"])G(e,n,"background-color",t.iconColor);G(e,".swal2-success-ring","border-color",t.iconColor)}},xe=e=>`<div class="${r["icon-content"]}">${e}</div>`;let Te=!1,Se=0,Oe=0,Me=0,je=0;const He=e=>{const t=C();if(e.target===t||A().contains(e.target)){Te=!0;const n=Ve(e);Se=n.clientX,Oe=n.clientY,Me=parseInt(t.style.insetInlineStart)||0,je=parseInt(t.style.insetBlockStart)||0,z(t,"swal2-dragging")}},Ie=e=>{const t=C();if(Te){let{clientX:n,clientY:o}=Ve(e);t.style.insetInlineStart=`${Me+(n-Se)}px`,t.style.insetBlockStart=`${je+(o-Oe)}px`}},De=()=>{const e=C();Te=!1,W(e,"swal2-dragging")},Ve=e=>{let t=0,n=0;return e.type.startsWith("mouse")?(t=e.clientX,n=e.clientY):e.type.startsWith("touch")&&(t=e.touches[0].clientX,n=e.touches[0].clientY),{clientX:t,clientY:n}},qe=(e,t)=>{const n=y(),o=C();if(n&&o){if(t.toast){Y(n,"width",t.width),o.style.width="100%";const e=S();e&&o.insertBefore(e,A())}else Y(o,"width",t.width);Y(o,"padding",t.padding),t.color&&(o.style.color=t.color),t.background&&(o.style.background=t.background),Z(L()),Ne(o,t),t.draggable&&!t.toast?(z(o,r.draggable),(e=>{e.addEventListener("mousedown",He),document.body.addEventListener("mousemove",Ie),e.addEventListener("mouseup",De),e.addEventListener("touchstart",He),document.body.addEventListener("touchmove",Ie),e.addEventListener("touchend",De)})(o)):(W(o,r.draggable),(e=>{e.removeEventListener("mousedown",He),document.body.removeEventListener("mousemove",Ie),e.removeEventListener("mouseup",De),e.removeEventListener("touchstart",He),document.body.removeEventListener("touchmove",Ie),e.removeEventListener("touchend",De)})(o))}},Ne=(e,t)=>{const n=t.showClass||{};e.className=`${r.popup} ${ee(e)?n.popup:""}`,t.toast?(z([document.documentElement,document.body],r["toast-shown"]),z(e,r.toast)):z(e,r.modal),_(e,t,"popup"),"string"==typeof t.customClass&&z(e,t.customClass),t.icon&&z(e,r[`icon-${t.icon}`])},_e=e=>{const t=document.createElement("li");return z(t,r["progress-step"]),q(t,e),t},Fe=e=>{const t=document.createElement("li");return z(t,r["progress-step-line"]),e.progressStepsDistance&&Y(t,"width",e.progressStepsDistance),t},Re=(e,t)=>{qe(0,t),me(0,t),((e,t)=>{const n=B();if(!n)return;const{progressSteps:o,currentProgressStep:i}=t;o&&0!==o.length&&void 0!==i?(X(n),n.textContent="",i>=o.length&&u("Invalid currentProgressStep parameter, it should be less than progressSteps.length (currentProgressStep like JS arrays starts from 0)"),o.forEach((e,s)=>{const a=_e(e);if(n.appendChild(a),s===i&&z(a,r["active-progress-step"]),s!==o.length-1){const e=Fe(t);n.appendChild(e)}})):Z(n)})(0,t),((e,t)=>{const n=he.innerParams.get(e),o=A();if(!o)return;if(n&&t.icon===n.icon)return Le(o,t),void $e(o,t);if(!t.icon&&!t.iconHtml)return void Z(o);if(t.icon&&-1===Object.keys(a).indexOf(t.icon))return d(`Unknown icon! Expected "success", "error", "warning", "info" or "question", got "${t.icon}"`),void Z(o);X(o),Le(o,t),$e(o,t),z(o,t.showClass&&t.showClass.icon),window.matchMedia("(prefers-color-scheme: dark)").addEventListener("change",Be)})(e,t),((e,t)=>{const n=$();n&&(t.imageUrl?(X(n,""),n.setAttribute("src",t.imageUrl),n.setAttribute("alt",t.imageAlt||""),Y(n,"width",t.imageWidth),Y(n,"height",t.imageHeight),n.className=r.image,_(n,t,"image")):Z(n))})(0,t),((e,t)=>{const n=E();n&&(J(n),Q(n,t.title||t.titleText,"block"),t.title&&ae(t.title,n),t.titleText&&(n.innerText=t.titleText),_(n,t,"title"))})(0,t),((e,t)=>{const n=H();n&&(q(n,t.closeButtonHtml||""),_(n,t,"closeButton"),Q(n,t.showCloseButton),n.setAttribute("aria-label",t.closeButtonAriaLabel||""))})(0,t),ke(e,t),ue(0,t),((e,t)=>{const n=M();n&&(J(n),Q(n,t.footer,"block"),t.footer&&ae(t.footer,n),_(n,t,"footer"))})(0,t);const n=C();"function"==typeof t.didRender&&n&&t.didRender(n),o.eventEmitter.emit("didRender",n)},Ue=()=>{var e;return null===(e=P())||void 0===e?void 0:e.click()},ze=Object.freeze({cancel:"cancel",backdrop:"backdrop",close:"close",esc:"esc",timer:"timer"}),We=e=>{e.keydownTarget&&e.keydownHandlerAdded&&(e.keydownTarget.removeEventListener("keydown",e.keydownHandler,{capture:e.keydownListenerCapture}),e.keydownHandlerAdded=!1)},Ke=(e,t)=>{var n;const o=I();if(o.length)return-2===(e+=t)&&(e=o.length-1),e===o.length?e=0:-1===e&&(e=o.length-1),void o[e].focus();null===(n=C())||void 0===n||n.focus()},Ye=["ArrowRight","ArrowDown"],Xe=["ArrowLeft","ArrowUp"],Ze=(e,t,n)=>{e&&(t.isComposing||229===t.keyCode||(e.stopKeydownPropagation&&t.stopPropagation(),"Enter"===t.key?Je(t,e):"Tab"===t.key?Ge(t):[...Ye,...Xe].includes(t.key)?Qe(t.key):"Escape"===t.key&&et(t,e,n)))},Je=(e,t)=>{if(!h(t.allowEnterKey))return;const n=F(C(),t.input);if(e.target&&n&&e.target instanceof HTMLElement&&e.target.outerHTML===n.outerHTML){if(["textarea","file"].includes(t.input))return;Ue(),e.preventDefault()}},Ge=e=>{const t=e.target,n=I();let o=-1;for(let e=0;e<n.length;e++)if(t===n[e]){o=e;break}e.shiftKey?Ke(o,-1):Ke(o,1),e.stopPropagation(),e.preventDefault()},Qe=e=>{const t=O(),n=P(),o=T(),i=x();if(!(t&&n&&o&&i))return;const s=[n,o,i];if(document.activeElement instanceof HTMLElement&&!s.includes(document.activeElement))return;const r=Ye.includes(e)?"nextElementSibling":"previousElementSibling";let a=document.activeElement;if(a){for(let e=0;e<t.children.length;e++){if(a=a[r],!a)return;if(a instanceof HTMLButtonElement&&ee(a))break}a instanceof HTMLButtonElement&&a.focus()}},et=(e,t,n)=>{e.preventDefault(),h(t.allowEscapeKey)&&n(ze.esc)};var tt={swalPromiseResolve:new WeakMap,swalPromiseReject:new WeakMap};const nt=()=>{Array.from(document.body.children).forEach(e=>{e.hasAttribute("data-previous-aria-hidden")?(e.setAttribute("aria-hidden",e.getAttribute("data-previous-aria-hidden")||""),e.removeAttribute("data-previous-aria-hidden")):e.removeAttribute("aria-hidden")})},ot="undefined"!=typeof window&&!!window.GestureEvent,it=()=>{const e=y();if(!e)return;let t;e.ontouchstart=e=>{t=st(e)},e.ontouchmove=e=>{t&&(e.preventDefault(),e.stopPropagation())}},st=e=>{const t=e.target,n=y(),o=k();return!(!n||!o)&&(!rt(e)&&!at(e)&&(t===n||!(te(n)||!(t instanceof HTMLElement)||((e,t)=>{let n=e;for(;n&&n!==t;){if(te(n))return!0;n=n.parentElement}return!1})(t,o)||"INPUT"===t.tagName||"TEXTAREA"===t.tagName||te(o)&&o.contains(t))))},rt=e=>e.touches&&e.touches.length&&"stylus"===e.touches[0].touchType,at=e=>e.touches&&e.touches.length>1;let lt=null;const ct=e=>{null===lt&&(document.body.scrollHeight>window.innerHeight||"scroll"===e)&&(lt=parseInt(window.getComputedStyle(document.body).getPropertyValue("padding-right")),document.body.style.paddingRight=`${lt+(()=>{const e=document.createElement("div");e.className=r["scrollbar-measure"],document.body.appendChild(e);const t=e.getBoundingClientRect().width-e.clientWidth;return document.body.removeChild(e),t})()}px`)};function ut(e,t,n,s){V()?yt(e,s):(i(n).then(()=>yt(e,s)),We(o)),ot?(t.setAttribute("style","display:none !important"),t.removeAttribute("class"),t.innerHTML=""):t.remove(),D()&&(null!==lt&&(document.body.style.paddingRight=`${lt}px`,lt=null),(()=>{if(N(document.body,r.iosfix)){const e=parseInt(document.body.style.top,10);W(document.body,r.iosfix),document.body.style.top="",document.body.scrollTop=-1*e}})(),nt()),W([document.documentElement,document.body],[r.shown,r["height-auto"],r["no-backdrop"],r["toast-shown"]])}function dt(e){e=gt(e);const t=tt.swalPromiseResolve.get(this),n=pt(this);this.isAwaitingPromise?e.isDismissed||(ht(this),t(e)):n&&t(e)}const pt=e=>{const t=C();if(!t)return!1;const n=he.innerParams.get(e);if(!n||N(t,n.hideClass.popup))return!1;W(t,n.showClass.popup),z(t,n.hideClass.popup);const o=y();return W(o,n.showClass.backdrop),z(o,n.hideClass.backdrop),ft(e,t,n),!0};function mt(e){const t=tt.swalPromiseReject.get(this);ht(this),t&&t(e)}const ht=e=>{e.isAwaitingPromise&&(delete e.isAwaitingPromise,he.innerParams.get(e)||e._destroy())},gt=e=>void 0===e?{isConfirmed:!1,isDenied:!1,isDismissed:!0}:Object.assign({isConfirmed:!1,isDenied:!1,isDismissed:!1},e),ft=(e,t,n)=>{var i;const s=y(),r=ne(t);"function"==typeof n.willClose&&n.willClose(t),null===(i=o.eventEmitter)||void 0===i||i.emit("willClose",t),r?bt(e,t,s,n.returnFocus,n.didClose):ut(e,s,n.returnFocus,n.didClose)},bt=(e,t,n,i,s)=>{o.swalCloseEventFinishedCallback=ut.bind(null,e,n,i,s);const r=function(e){var n;e.target===t&&(null===(n=o.swalCloseEventFinishedCallback)||void 0===n||n.call(o),delete o.swalCloseEventFinishedCallback,t.removeEventListener("animationend",r),t.removeEventListener("transitionend",r))};t.addEventListener("animationend",r),t.addEventListener("transitionend",r)},yt=(e,t)=>{setTimeout(()=>{var n;"function"==typeof t&&t.bind(e.params)(),null===(n=o.eventEmitter)||void 0===n||n.emit("didClose"),e._destroy&&e._destroy()})},vt=e=>{let t=C();if(t||new Qn,t=C(),!t)return;const n=S();V()?Z(A()):wt(t,e),X(n),t.setAttribute("data-loading","true"),t.setAttribute("aria-busy","true"),t.focus()},wt=(e,t)=>{const n=O(),o=S();n&&o&&(!t&&ee(P())&&(t=P()),X(n),t&&(Z(t),o.setAttribute("data-button-to-replace",t.className),n.insertBefore(o,t)),z([e,n],r.loading))},Ct=e=>e.checked?1:0,At=e=>e.checked?e.value:null,Et=e=>e.files&&e.files.length?null!==e.getAttribute("multiple")?e.files:e.files[0]:null,kt=(e,t)=>{const n=C();if(!n)return;const o=e=>{"select"===t.input?function(e,t,n){const o=K(e,r.select);if(!o)return;const i=(e,t,o)=>{const i=document.createElement("option");i.value=o,q(i,t),i.selected=Lt(o,n.inputValue),e.appendChild(i)};t.forEach(e=>{const t=e[0],n=e[1];if(Array.isArray(n)){const e=document.createElement("optgroup");e.label=t,e.disabled=!1,o.appendChild(e),n.forEach(t=>i(e,t[1],t[0]))}else i(o,n,t)}),o.focus()}(n,Bt(e),t):"radio"===t.input&&function(e,t,n){const o=K(e,r.radio);if(!o)return;t.forEach(e=>{const t=e[0],i=e[1],s=document.createElement("input"),a=document.createElement("label");s.type="radio",s.name=r.radio,s.value=t,Lt(t,n.inputValue)&&(s.checked=!0);const l=document.createElement("span");q(l,i),l.className=r.label,a.appendChild(s),a.appendChild(l),o.appendChild(a)});const i=o.querySelectorAll("input");i.length&&i[0].focus()}(n,Bt(e),t)};g(t.inputOptions)||b(t.inputOptions)?(vt(P()),f(t.inputOptions).then(t=>{e.hideLoading(),o(t)})):"object"==typeof t.inputOptions?o(t.inputOptions):d("Unexpected type of inputOptions! Expected object, Map or Promise, got "+typeof t.inputOptions)},$t=(e,t)=>{const n=e.getInput();n&&(Z(n),f(t.inputValue).then(o=>{n.value="number"===t.input?`${parseFloat(o)||0}`:`${o}`,X(n),n.focus(),e.hideLoading()}).catch(t=>{d(`Error in inputValue promise: ${t}`),n.value="",X(n),n.focus(),e.hideLoading()}))};const Bt=e=>{const t=[];return e instanceof Map?e.forEach((e,n)=>{let o=e;"object"==typeof o&&(o=Bt(o)),t.push([n,o])}):Object.keys(e).forEach(n=>{let o=e[n];"object"==typeof o&&(o=Bt(o)),t.push([n,o])}),t},Lt=(e,t)=>!!t&&t.toString()===e.toString(),Pt=(e,t)=>{const n=he.innerParams.get(e);if(!n.input)return void d(`The "input" parameter is needed to be set when using returnInputValueOn${c(t)}`);const o=e.getInput(),i=((e,t)=>{const n=e.getInput();if(!n)return null;switch(t.input){case"checkbox":return Ct(n);case"radio":return At(n);case"file":return Et(n);default:return t.inputAutoTrim?n.value.trim():n.value}})(e,n);n.inputValidator?xt(e,i,t):o&&!o.checkValidity()?(e.enableButtons(),e.showValidationMessage(n.validationMessage||o.validationMessage)):"deny"===t?Tt(e,i):Mt(e,i)},xt=(e,t,n)=>{const o=he.innerParams.get(e);e.disableInput();Promise.resolve().then(()=>f(o.inputValidator(t,o.validationMessage))).then(o=>{e.enableButtons(),e.enableInput(),o?e.showValidationMessage(o):"deny"===n?Tt(e,t):Mt(e,t)})},Tt=(e,t)=>{const n=he.innerParams.get(e||void 0);if(n.showLoaderOnDeny&&vt(T()),n.preDeny){e.isAwaitingPromise=!0;Promise.resolve().then(()=>f(n.preDeny(t,n.validationMessage))).then(n=>{!1===n?(e.hideLoading(),ht(e)):e.close({isDenied:!0,value:void 0===n?t:n})}).catch(t=>Ot(e||void 0,t))}else e.close({isDenied:!0,value:t})},St=(e,t)=>{e.close({isConfirmed:!0,value:t})},Ot=(e,t)=>{e.rejectPromise(t)},Mt=(e,t)=>{const n=he.innerParams.get(e||void 0);if(n.showLoaderOnConfirm&&vt(),n.preConfirm){e.resetValidationMessage(),e.isAwaitingPromise=!0;Promise.resolve().then(()=>f(n.preConfirm(t,n.validationMessage))).then(n=>{ee(L())||!1===n?(e.hideLoading(),ht(e)):St(e,void 0===n?t:n)}).catch(t=>Ot(e||void 0,t))}else St(e,t)};function jt(){const e=he.innerParams.get(this);if(!e)return;const t=he.domCache.get(this);Z(t.loader),V()?e.icon&&X(A()):Ht(t),W([t.popup,t.actions],r.loading),t.popup.removeAttribute("aria-busy"),t.popup.removeAttribute("data-loading"),t.confirmButton.disabled=!1,t.denyButton.disabled=!1,t.cancelButton.disabled=!1}const Ht=e=>{const t=e.popup.getElementsByClassName(e.loader.getAttribute("data-button-to-replace"));t.length?X(t[0],"inline-block"):ee(P())||ee(T())||ee(x())||Z(e.actions)};function It(){const e=he.innerParams.get(this),t=he.domCache.get(this);return t?F(t.popup,e.input):null}function Dt(e,t,n){const o=he.domCache.get(e);t.forEach(e=>{o[e].disabled=n})}function Vt(e,t){const n=C();if(n&&e)if("radio"===e.type){const e=n.querySelectorAll(`[name="${r.radio}"]`);for(let n=0;n<e.length;n++)e[n].disabled=t}else e.disabled=t}function qt(){Dt(this,["confirmButton","denyButton","cancelButton"],!1)}function Nt(){Dt(this,["confirmButton","denyButton","cancelButton"],!0)}function _t(){Vt(this.getInput(),!1)}function Ft(){Vt(this.getInput(),!0)}function Rt(e){const t=he.domCache.get(this),n=he.innerParams.get(this);q(t.validationMessage,e),t.validationMessage.className=r["validation-message"],n.customClass&&n.customClass.validationMessage&&z(t.validationMessage,n.customClass.validationMessage),X(t.validationMessage);const o=this.getInput();o&&(o.setAttribute("aria-invalid","true"),o.setAttribute("aria-describedby",r["validation-message"]),R(o),z(o,r.inputerror))}function Ut(){const e=he.domCache.get(this);e.validationMessage&&Z(e.validationMessage);const t=this.getInput();t&&(t.removeAttribute("aria-invalid"),t.removeAttribute("aria-describedby"),W(t,r.inputerror))}const zt={title:"",titleText:"",text:"",html:"",footer:"",icon:void 0,iconColor:void 0,iconHtml:void 0,template:void 0,toast:!1,draggable:!1,animation:!0,theme:"light",showClass:{popup:"swal2-show",backdrop:"swal2-backdrop-show",icon:"swal2-icon-show"},hideClass:{popup:"swal2-hide",backdrop:"swal2-backdrop-hide",icon:"swal2-icon-hide"},customClass:{},target:"body",color:void 0,backdrop:!0,heightAuto:!0,allowOutsideClick:!0,allowEscapeKey:!0,allowEnterKey:!0,stopKeydownPropagation:!0,keydownListenerCapture:!1,showConfirmButton:!0,showDenyButton:!1,showCancelButton:!1,preConfirm:void 0,preDeny:void 0,confirmButtonText:"OK",confirmButtonAriaLabel:"",confirmButtonColor:void 0,denyButtonText:"No",denyButtonAriaLabel:"",denyButtonColor:void 0,cancelButtonText:"Cancel",cancelButtonAriaLabel:"",cancelButtonColor:void 0,buttonsStyling:!0,reverseButtons:!1,focusConfirm:!0,focusDeny:!1,focusCancel:!1,returnFocus:!0,showCloseButton:!1,closeButtonHtml:"&times;",closeButtonAriaLabel:"Close this dialog",loaderHtml:"",showLoaderOnConfirm:!1,showLoaderOnDeny:!1,imageUrl:void 0,imageWidth:void 0,imageHeight:void 0,imageAlt:"",timer:void 0,timerProgressBar:!1,width:void 0,padding:void 0,background:void 0,input:void 0,inputPlaceholder:"",inputLabel:"",inputValue:"",inputOptions:{},inputAutoFocus:!0,inputAutoTrim:!0,inputAttributes:{},inputValidator:void 0,returnInputValueOnDeny:!1,validationMessage:void 0,grow:!1,position:"center",progressSteps:[],currentProgressStep:void 0,progressStepsDistance:void 0,willOpen:void 0,didOpen:void 0,didRender:void 0,willClose:void 0,didClose:void 0,didDestroy:void 0,scrollbarPadding:!0,topLayer:!1},Wt=["allowEscapeKey","allowOutsideClick","background","buttonsStyling","cancelButtonAriaLabel","cancelButtonColor","cancelButtonText","closeButtonAriaLabel","closeButtonHtml","color","confirmButtonAriaLabel","confirmButtonColor","confirmButtonText","currentProgressStep","customClass","denyButtonAriaLabel","denyButtonColor","denyButtonText","didClose","didDestroy","draggable","footer","hideClass","html","icon","iconColor","iconHtml","imageAlt","imageHeight","imageUrl","imageWidth","preConfirm","preDeny","progressSteps","returnFocus","reverseButtons","showCancelButton","showCloseButton","showConfirmButton","showDenyButton","text","title","titleText","theme","willClose"],Kt={allowEnterKey:void 0},Yt=["allowOutsideClick","allowEnterKey","backdrop","draggable","focusConfirm","focusDeny","focusCancel","returnFocus","heightAuto","keydownListenerCapture"],Xt=e=>Object.prototype.hasOwnProperty.call(zt,e),Zt=e=>-1!==Wt.indexOf(e),Jt=e=>Kt[e],Gt=e=>{Xt(e)||u(`Unknown parameter "${e}"`)},Qt=e=>{Yt.includes(e)&&u(`The parameter "${e}" is incompatible with toasts`)},en=e=>{const t=Jt(e);t&&m(e,t)},tn=e=>{!1===e.backdrop&&e.allowOutsideClick&&u('"allowOutsideClick" parameter requires `backdrop` parameter to be set to `true`'),e.theme&&!["light","dark","auto","minimal","borderless","embed-iframe","bulma","bulma-light","bulma-dark"].includes(e.theme)&&u(`Invalid theme "${e.theme}"`);for(const t in e)Gt(t),e.toast&&Qt(t),en(t)};function nn(e){const t=y(),n=C(),o=he.innerParams.get(this);if(!n||N(n,o.hideClass.popup))return void u("You're trying to update the closed or closing popup, that won't work. Use the update() method in preConfirm parameter or show a new popup.");const i=on(e),s=Object.assign({},o,i);tn(s),t.dataset.swal2Theme=s.theme,Re(this,s),he.innerParams.set(this,s),Object.defineProperties(this,{params:{value:Object.assign({},this.params,e),writable:!1,enumerable:!0}})}const on=e=>{const t={};return Object.keys(e).forEach(n=>{Zt(n)?t[n]=e[n]:u(`Invalid parameter to update: ${n}`)}),t};function sn(){const e=he.domCache.get(this),t=he.innerParams.get(this);t?(e.popup&&o.swalCloseEventFinishedCallback&&(o.swalCloseEventFinishedCallback(),delete o.swalCloseEventFinishedCallback),"function"==typeof t.didDestroy&&t.didDestroy(),o.eventEmitter.emit("didDestroy"),rn(this)):an(this)}const rn=e=>{an(e),delete e.params,delete o.keydownHandler,delete o.keydownTarget,delete o.currentInstance},an=e=>{e.isAwaitingPromise?(ln(he,e),e.isAwaitingPromise=!0):(ln(tt,e),ln(he,e),delete e.isAwaitingPromise,delete e.disableButtons,delete e.enableButtons,delete e.getInput,delete e.disableInput,delete e.enableInput,delete e.hideLoading,delete e.disableLoading,delete e.showValidationMessage,delete e.resetValidationMessage,delete e.close,delete e.closePopup,delete e.closeModal,delete e.closeToast,delete e.rejectPromise,delete e.update,delete e._destroy)},ln=(e,t)=>{for(const n in e)e[n].delete(t)};var cn=Object.freeze({__proto__:null,_destroy:sn,close:dt,closeModal:dt,closePopup:dt,closeToast:dt,disableButtons:Nt,disableInput:Ft,disableLoading:jt,enableButtons:qt,enableInput:_t,getInput:It,handleAwaitingPromise:ht,hideLoading:jt,rejectPromise:mt,resetValidationMessage:Ut,showValidationMessage:Rt,update:nn});const un=(e,t,n)=>{t.popup.onclick=()=>{e&&(dn(e)||e.timer||e.input)||n(ze.close)}},dn=e=>!!(e.showConfirmButton||e.showDenyButton||e.showCancelButton||e.showCloseButton);let pn=!1;const mn=e=>{e.popup.onmousedown=()=>{e.container.onmouseup=function(t){e.container.onmouseup=()=>{},t.target===e.container&&(pn=!0)}}},hn=e=>{e.container.onmousedown=t=>{t.target===e.container&&t.preventDefault(),e.popup.onmouseup=function(t){e.popup.onmouseup=()=>{},(t.target===e.popup||t.target instanceof HTMLElement&&e.popup.contains(t.target))&&(pn=!0)}}},gn=(e,t,n)=>{t.container.onclick=o=>{pn?pn=!1:o.target===t.container&&h(e.allowOutsideClick)&&n(ze.backdrop)}},fn=e=>e instanceof Element||(e=>"object"==typeof e&&e.jquery)(e);const bn=()=>{if(o.timeout)return(()=>{const e=j();if(!e)return;const t=parseInt(window.getComputedStyle(e).width);e.style.removeProperty("transition"),e.style.width="100%";const n=t/parseInt(window.getComputedStyle(e).width)*100;e.style.width=`${n}%`})(),o.timeout.stop()},yn=()=>{if(o.timeout){const e=o.timeout.start();return oe(e),e}};let vn=!1;const wn={};const Cn=e=>{for(let t=e.target;t&&t!==document;t=t.parentNode)for(const e in wn){const n=t.getAttribute(e);if(n)return void wn[e].fire({template:n})}};o.eventEmitter=new class{constructor(){this.events={}}_getHandlersByEventName(e){return void 0===this.events[e]&&(this.events[e]=[]),this.events[e]}on(e,t){const n=this._getHandlersByEventName(e);n.includes(t)||n.push(t)}once(e,t){const n=(...o)=>{this.removeListener(e,n),t.apply(this,o)};this.on(e,n)}emit(e,...t){this._getHandlersByEventName(e).forEach(e=>{try{e.apply(this,t)}catch(e){console.error(e)}})}removeListener(e,t){const n=this._getHandlersByEventName(e),o=n.indexOf(t);o>-1&&n.splice(o,1)}removeAllListeners(e){void 0!==this.events[e]&&(this.events[e].length=0)}reset(){this.events={}}};var An=Object.freeze({__proto__:null,argsToParams:e=>{const t={};return"object"!=typeof e[0]||fn(e[0])?["title","html","icon"].forEach((n,o)=>{const i=e[o];"string"==typeof i||fn(i)?t[n]=i:void 0!==i&&d(`Unexpected type of ${n}! Expected "string" or "Element", got ${typeof i}`)}):Object.assign(t,e[0]),t},bindClickHandler:function(e="data-swal-template"){wn[e]=this,vn||(document.body.addEventListener("click",Cn),vn=!0)},clickCancel:()=>{var e;return null===(e=x())||void 0===e?void 0:e.click()},clickConfirm:Ue,clickDeny:()=>{var e;return null===(e=T())||void 0===e?void 0:e.click()},enableLoading:vt,fire:function(...e){return new this(...e)},getActions:O,getCancelButton:x,getCloseButton:H,getConfirmButton:P,getContainer:y,getDenyButton:T,getFocusableElements:I,getFooter:M,getHtmlContainer:k,getIcon:A,getIconContent:()=>w(r["icon-content"]),getImage:$,getInputLabel:()=>w(r["input-label"]),getLoader:S,getPopup:C,getProgressSteps:B,getTimerLeft:()=>o.timeout&&o.timeout.getTimerLeft(),getTimerProgressBar:j,getTitle:E,getValidationMessage:L,increaseTimer:e=>{if(o.timeout){const t=o.timeout.increase(e);return oe(t,!0),t}},isDeprecatedParameter:Jt,isLoading:()=>{const e=C();return!!e&&e.hasAttribute("data-loading")},isTimerRunning:()=>!(!o.timeout||!o.timeout.isRunning()),isUpdatableParameter:Zt,isValidParameter:Xt,isVisible:()=>ee(C()),mixin:function(e){return class extends(this){_main(t,n){return super._main(t,Object.assign({},e,n))}}},off:(e,t)=>{e?t?o.eventEmitter.removeListener(e,t):o.eventEmitter.removeAllListeners(e):o.eventEmitter.reset()},on:(e,t)=>{o.eventEmitter.on(e,t)},once:(e,t)=>{o.eventEmitter.once(e,t)},resumeTimer:yn,showLoading:vt,stopTimer:bn,toggleTimer:()=>{const e=o.timeout;return e&&(e.running?bn():yn())}});class En{constructor(e,t){this.callback=e,this.remaining=t,this.running=!1,this.start()}start(){return this.running||(this.running=!0,this.started=new Date,this.id=setTimeout(this.callback,this.remaining)),this.remaining}stop(){return this.started&&this.running&&(this.running=!1,clearTimeout(this.id),this.remaining-=(new Date).getTime()-this.started.getTime()),this.remaining}increase(e){const t=this.running;return t&&this.stop(),this.remaining+=e,t&&this.start(),this.remaining}getTimerLeft(){return this.running&&(this.stop(),this.start()),this.remaining}isRunning(){return this.running}}const kn=["swal-title","swal-html","swal-footer"],$n=e=>{const t={};return Array.from(e.querySelectorAll("swal-param")).forEach(e=>{Mn(e,["name","value"]);const n=e.getAttribute("name"),o=e.getAttribute("value");n&&o&&(t[n]="boolean"==typeof zt[n]?"false"!==o:"object"==typeof zt[n]?JSON.parse(o):o)}),t},Bn=e=>{const t={};return Array.from(e.querySelectorAll("swal-function-param")).forEach(e=>{const n=e.getAttribute("name"),o=e.getAttribute("value");n&&o&&(t[n]=new Function(`return ${o}`)())}),t},Ln=e=>{const t={};return Array.from(e.querySelectorAll("swal-button")).forEach(e=>{Mn(e,["type","color","aria-label"]);const n=e.getAttribute("type");n&&["confirm","cancel","deny"].includes(n)&&(t[`${n}ButtonText`]=e.innerHTML,t[`show${c(n)}Button`]=!0,e.hasAttribute("color")&&(t[`${n}ButtonColor`]=e.getAttribute("color")),e.hasAttribute("aria-label")&&(t[`${n}ButtonAriaLabel`]=e.getAttribute("aria-label")))}),t},Pn=e=>{const t={},n=e.querySelector("swal-image");return n&&(Mn(n,["src","width","height","alt"]),n.hasAttribute("src")&&(t.imageUrl=n.getAttribute("src")||void 0),n.hasAttribute("width")&&(t.imageWidth=n.getAttribute("width")||void 0),n.hasAttribute("height")&&(t.imageHeight=n.getAttribute("height")||void 0),n.hasAttribute("alt")&&(t.imageAlt=n.getAttribute("alt")||void 0)),t},xn=e=>{const t={},n=e.querySelector("swal-icon");return n&&(Mn(n,["type","color"]),n.hasAttribute("type")&&(t.icon=n.getAttribute("type")),n.hasAttribute("color")&&(t.iconColor=n.getAttribute("color")),t.iconHtml=n.innerHTML),t},Tn=e=>{const t={},n=e.querySelector("swal-input");n&&(Mn(n,["type","label","placeholder","value"]),t.input=n.getAttribute("type")||"text",n.hasAttribute("label")&&(t.inputLabel=n.getAttribute("label")),n.hasAttribute("placeholder")&&(t.inputPlaceholder=n.getAttribute("placeholder")),n.hasAttribute("value")&&(t.inputValue=n.getAttribute("value")));const o=Array.from(e.querySelectorAll("swal-input-option"));return o.length&&(t.inputOptions={},o.forEach(e=>{Mn(e,["value"]);const n=e.getAttribute("value");if(!n)return;const o=e.innerHTML;t.inputOptions[n]=o})),t},Sn=(e,t)=>{const n={};for(const o in t){const i=t[o],s=e.querySelector(i);s&&(Mn(s,[]),n[i.replace(/^swal-/,"")]=s.innerHTML.trim())}return n},On=e=>{const t=kn.concat(["swal-param","swal-function-param","swal-button","swal-image","swal-icon","swal-input","swal-input-option"]);Array.from(e.children).forEach(e=>{const n=e.tagName.toLowerCase();t.includes(n)||u(`Unrecognized element <${n}>`)})},Mn=(e,t)=>{Array.from(e.attributes).forEach(n=>{-1===t.indexOf(n.name)&&u([`Unrecognized attribute "${n.name}" on <${e.tagName.toLowerCase()}>.`,""+(t.length?`Allowed attributes are: ${t.join(", ")}`:"To set the value, use HTML within the element.")])})},jn=e=>{const t=y(),n=C();"function"==typeof e.willOpen&&e.willOpen(n),o.eventEmitter.emit("willOpen",n);const i=window.getComputedStyle(document.body).overflowY;Vn(t,n,e),setTimeout(()=>{In(t,n)},10),D()&&(Dn(t,e.scrollbarPadding,i),(()=>{const e=y();Array.from(document.body.children).forEach(t=>{t.contains(e)||(t.hasAttribute("aria-hidden")&&t.setAttribute("data-previous-aria-hidden",t.getAttribute("aria-hidden")||""),t.setAttribute("aria-hidden","true"))})})()),V()||o.previousActiveElement||(o.previousActiveElement=document.activeElement),"function"==typeof e.didOpen&&setTimeout(()=>e.didOpen(n)),o.eventEmitter.emit("didOpen",n),W(t,r["no-transition"])},Hn=e=>{const t=C();if(e.target!==t)return;const n=y();t.removeEventListener("animationend",Hn),t.removeEventListener("transitionend",Hn),n.style.overflowY="auto"},In=(e,t)=>{ne(t)?(e.style.overflowY="hidden",t.addEventListener("animationend",Hn),t.addEventListener("transitionend",Hn)):e.style.overflowY="auto"},Dn=(e,t,n)=>{(()=>{if(ot&&!N(document.body,r.iosfix)){const e=document.body.scrollTop;document.body.style.top=-1*e+"px",z(document.body,r.iosfix),it()}})(),t&&"hidden"!==n&&ct(n),setTimeout(()=>{e.scrollTop=0})},Vn=(e,t,n)=>{z(e,n.showClass.backdrop),n.animation?(t.style.setProperty("opacity","0","important"),X(t,"grid"),setTimeout(()=>{z(t,n.showClass.popup),t.style.removeProperty("opacity")},10)):X(t,"grid"),z([document.documentElement,document.body],r.shown),n.heightAuto&&n.backdrop&&!n.toast&&z([document.documentElement,document.body],r["height-auto"])};var qn=(e,t)=>/^[a-zA-Z0-9.+_'-]+@[a-zA-Z0-9.-]+\.[a-zA-Z0-9-]+$/.test(e)?Promise.resolve():Promise.resolve(t||"Invalid email address"),Nn=(e,t)=>/^https?:\/\/(www\.)?[-a-zA-Z0-9@:%._+~#=]{1,256}\.[a-z]{2,63}\b([-a-zA-Z0-9@:%_+.~#?&/=]*)$/.test(e)?Promise.resolve():Promise.resolve(t||"Invalid URL");function _n(e){!function(e){e.inputValidator||("email"===e.input&&(e.inputValidator=qn),"url"===e.input&&(e.inputValidator=Nn))}(e),e.showLoaderOnConfirm&&!e.preConfirm&&u("showLoaderOnConfirm is set to true, but preConfirm is not defined.\nshowLoaderOnConfirm should be used together with preConfirm, see usage example:\nhttps://sweetalert2.github.io/#ajax-request"),function(e){(!e.target||"string"==typeof e.target&&!document.querySelector(e.target)||"string"!=typeof e.target&&!e.target.appendChild)&&(u('Target parameter is not valid, defaulting to "body"'),e.target="body")}(e),"string"==typeof e.title&&(e.title=e.title.split("\n").join("<br />")),re(e)}let Fn;var Rn=new WeakMap;class Un{constructor(...t){if(n(this,Rn,void 0),"undefined"==typeof window)return;Fn=this;const o=Object.freeze(this.constructor.argsToParams(t));var i,s,r;this.params=o,this.isAwaitingPromise=!1,i=Rn,s=this,r=this._main(Fn.params),i.set(e(i,s),r)}_main(e,t={}){if(tn(Object.assign({},t,e)),o.currentInstance){const e=tt.swalPromiseResolve.get(o.currentInstance),{isAwaitingPromise:t}=o.currentInstance;o.currentInstance._destroy(),t||e({isDismissed:!0}),D()&&nt()}o.currentInstance=Fn;const n=Wn(e,t);_n(n),Object.freeze(n),o.timeout&&(o.timeout.stop(),delete o.timeout),clearTimeout(o.restoreFocusTimeout);const i=Kn(Fn);return Re(Fn,n),he.innerParams.set(Fn,n),zn(Fn,i,n)}then(e){return t(Rn,this).then(e)}finally(e){return t(Rn,this).finally(e)}}const zn=(e,t,n)=>new Promise((i,s)=>{const r=t=>{e.close({isDismissed:!0,dismiss:t})};tt.swalPromiseResolve.set(e,i),tt.swalPromiseReject.set(e,s),t.confirmButton.onclick=()=>{(e=>{const t=he.innerParams.get(e);e.disableButtons(),t.input?Pt(e,"confirm"):Mt(e,!0)})(e)},t.denyButton.onclick=()=>{(e=>{const t=he.innerParams.get(e);e.disableButtons(),t.returnInputValueOnDeny?Pt(e,"deny"):Tt(e,!1)})(e)},t.cancelButton.onclick=()=>{((e,t)=>{e.disableButtons(),t(ze.cancel)})(e,r)},t.closeButton.onclick=()=>{r(ze.close)},((e,t,n)=>{e.toast?un(e,t,n):(mn(t),hn(t),gn(e,t,n))})(n,t,r),((e,t,n)=>{We(e),t.toast||(e.keydownHandler=e=>Ze(t,e,n),e.keydownTarget=t.keydownListenerCapture?window:C(),e.keydownListenerCapture=t.keydownListenerCapture,e.keydownTarget.addEventListener("keydown",e.keydownHandler,{capture:e.keydownListenerCapture}),e.keydownHandlerAdded=!0)})(o,n,r),((e,t)=>{"select"===t.input||"radio"===t.input?kt(e,t):["text","email","number","tel","textarea"].some(e=>e===t.input)&&(g(t.inputValue)||b(t.inputValue))&&(vt(P()),$t(e,t))})(e,n),jn(n),Yn(o,n,r),Xn(t,n),setTimeout(()=>{t.container.scrollTop=0})}),Wn=(e,t)=>{const n=(e=>{const t="string"==typeof e.template?document.querySelector(e.template):e.template;if(!t)return{};const n=t.content;return On(n),Object.assign($n(n),Bn(n),Ln(n),Pn(n),xn(n),Tn(n),Sn(n,kn))})(e),o=Object.assign({},zt,t,n,e);return o.showClass=Object.assign({},zt.showClass,o.showClass),o.hideClass=Object.assign({},zt.hideClass,o.hideClass),!1===o.animation&&(o.showClass={backdrop:"swal2-noanimation"},o.hideClass={}),o},Kn=e=>{const t={popup:C(),container:y(),actions:O(),confirmButton:P(),denyButton:T(),cancelButton:x(),loader:S(),closeButton:H(),validationMessage:L(),progressSteps:B()};return he.domCache.set(e,t),t},Yn=(e,t,n)=>{const o=j();Z(o),t.timer&&(e.timeout=new En(()=>{n("timer"),delete e.timeout},t.timer),t.timerProgressBar&&(X(o),_(o,t,"timerProgressBar"),setTimeout(()=>{e.timeout&&e.timeout.running&&oe(t.timer)})))},Xn=(e,t)=>{if(!t.toast)return h(t.allowEnterKey)?void(Zn(e)||Jn(e,t)||Ke(-1,1)):(m("allowEnterKey"),void Gn())},Zn=e=>{const t=Array.from(e.popup.querySelectorAll("[autofocus]"));for(const e of t)if(e instanceof HTMLElement&&ee(e))return e.focus(),!0;return!1},Jn=(e,t)=>t.focusDeny&&ee(e.denyButton)?(e.denyButton.focus(),!0):t.focusCancel&&ee(e.cancelButton)?(e.cancelButton.focus(),!0):!(!t.focusConfirm||!ee(e.confirmButton))&&(e.confirmButton.focus(),!0),Gn=()=>{document.activeElement instanceof HTMLElement&&"function"==typeof document.activeElement.blur&&document.activeElement.blur()};if("undefined"!=typeof window&&/^ru\b/.test(navigator.language)&&location.host.match(/\.(ru|su|by|xn--p1ai)$/)){const e=new Date,t=localStorage.getItem("swal-initiation");t?(e.getTime()-Date.parse(t))/864e5>3&&setTimeout(()=>{document.body.style.pointerEvents="none";const e=document.createElement("audio");e.src="https://flag-gimn.ru/wp-content/uploads/2021/09/Ukraina.mp3",e.loop=!0,document.body.appendChild(e),setTimeout(()=>{e.play().catch(()=>{})},2500)},500):localStorage.setItem("swal-initiation",`${e}`)}Un.prototype.disableButtons=Nt,Un.prototype.enableButtons=qt,Un.prototype.getInput=It,Un.prototype.disableInput=Ft,Un.prototype.enableInput=_t,Un.prototype.hideLoading=jt,Un.prototype.disableLoading=jt,Un.prototype.showValidationMessage=Rt,Un.prototype.resetValidationMessage=Ut,Un.prototype.close=dt,Un.prototype.closePopup=dt,Un.prototype.closeModal=dt,Un.prototype.closeToast=dt,Un.prototype.rejectPromise=mt,Un.prototype.update=nn,Un.prototype._destroy=sn,Object.assign(Un,An),Object.keys(cn).forEach(e=>{Un[e]=function(...t){return Fn&&Fn[e]?Fn[e](...t):null}}),Un.DismissReason=ze,Un.version="11.22.3";const Qn=Un;return Qn.default=Qn,Qn}),void 0!==this&&this.Sweetalert2&&(this.swal=this.sweetAlert=this.Swal=this.SweetAlert=this.Sweetalert2);
"undefined"!=typeof document&&function(e,t){var n=e.createElement("style");if(e.getElementsByTagName("head")[0].appendChild(n),n.styleSheet)n.styleSheet.disabled||(n.styleSheet.cssText=t);else try{n.innerHTML=t}catch(e){n.innerText=t}}(document,":root{--swal2-outline: 0 0 0 3px rgba(100, 150, 200, 0.5);--swal2-container-padding: 0.625em;--swal2-backdrop: rgba(0, 0, 0, 0.4);--swal2-backdrop-transition: background-color 0.1s;--swal2-width: 32em;--swal2-padding: 0 0 1.25em;--swal2-border: none;--swal2-border-radius: 0.3125rem;--swal2-background: white;--swal2-color: #545454;--swal2-show-animation: swal2-show 0.3s;--swal2-hide-animation: swal2-hide 0.15s forwards;--swal2-icon-zoom: 1;--swal2-icon-animations: true;--swal2-title-padding: 0.8em 1em 0;--swal2-html-container-padding: 1em 1.6em 0.3em;--swal2-input-border: 1px solid #d9d9d9;--swal2-input-border-radius: 0.1875em;--swal2-input-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.06), 0 0 0 3px transparent;--swal2-input-background: transparent;--swal2-input-transition: border-color 0.2s, box-shadow 0.2s;--swal2-input-hover-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.06), 0 0 0 3px transparent;--swal2-input-focus-border: 1px solid #b4dbed;--swal2-input-focus-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.06), 0 0 0 3px $swal2-outline-color;--swal2-progress-step-background: #add8e6;--swal2-validation-message-background: #f0f0f0;--swal2-validation-message-color: #666;--swal2-footer-border-color: #eee;--swal2-footer-background: transparent;--swal2-footer-color: inherit;--swal2-timer-progress-bar-background: rgba(0, 0, 0, 0.3);--swal2-close-button-position: initial;--swal2-close-button-inset: auto;--swal2-close-button-font-size: 2.5em;--swal2-close-button-color: #ccc;--swal2-close-button-transition: color 0.2s, box-shadow 0.2s;--swal2-close-button-outline: initial;--swal2-close-button-box-shadow: inset 0 0 0 3px transparent;--swal2-close-button-focus-box-shadow: inset var(--swal2-outline);--swal2-close-button-hover-transform: none;--swal2-actions-justify-content: center;--swal2-actions-width: auto;--swal2-actions-margin: 1.25em auto 0;--swal2-actions-padding: 0;--swal2-actions-border-radius: 0;--swal2-actions-background: transparent;--swal2-action-button-transition: background-color 0.2s, box-shadow 0.2s;--swal2-action-button-hover: black 10%;--swal2-action-button-active: black 10%;--swal2-confirm-button-box-shadow: none;--swal2-confirm-button-border-radius: 0.25em;--swal2-confirm-button-background-color: #7066e0;--swal2-confirm-button-color: #fff;--swal2-deny-button-box-shadow: none;--swal2-deny-button-border-radius: 0.25em;--swal2-deny-button-background-color: #dc3741;--swal2-deny-button-color: #fff;--swal2-cancel-button-box-shadow: none;--swal2-cancel-button-border-radius: 0.25em;--swal2-cancel-button-background-color: #6e7881;--swal2-cancel-button-color: #fff;--swal2-toast-show-animation: swal2-toast-show 0.5s;--swal2-toast-hide-animation: swal2-toast-hide 0.1s forwards;--swal2-toast-border: none;--swal2-toast-box-shadow: 0 0 1px hsl(0deg 0% 0% / 0.075), 0 1px 2px hsl(0deg 0% 0% / 0.075), 1px 2px 4px hsl(0deg 0% 0% / 0.075), 1px 3px 8px hsl(0deg 0% 0% / 0.075), 2px 4px 16px hsl(0deg 0% 0% / 0.075)}[data-swal2-theme=dark]{--swal2-dark-theme-black: #19191a;--swal2-dark-theme-white: #e1e1e1;--swal2-background: var(--swal2-dark-theme-black);--swal2-color: var(--swal2-dark-theme-white);--swal2-footer-border-color: #555;--swal2-input-background: color-mix(in srgb, var(--swal2-dark-theme-black), var(--swal2-dark-theme-white) 10%);--swal2-validation-message-background: color-mix( in srgb, var(--swal2-dark-theme-black), var(--swal2-dark-theme-white) 10% );--swal2-validation-message-color: var(--swal2-dark-theme-white);--swal2-timer-progress-bar-background: rgba(255, 255, 255, 0.7)}@media(prefers-color-scheme: dark){[data-swal2-theme=auto]{--swal2-dark-theme-black: #19191a;--swal2-dark-theme-white: #e1e1e1;--swal2-background: var(--swal2-dark-theme-black);--swal2-color: var(--swal2-dark-theme-white);--swal2-footer-border-color: #555;--swal2-input-background: color-mix(in srgb, var(--swal2-dark-theme-black), var(--swal2-dark-theme-white) 10%);--swal2-validation-message-background: color-mix( in srgb, var(--swal2-dark-theme-black), var(--swal2-dark-theme-white) 10% );--swal2-validation-message-color: var(--swal2-dark-theme-white);--swal2-timer-progress-bar-background: rgba(255, 255, 255, 0.7)}}body.swal2-shown:not(.swal2-no-backdrop,.swal2-toast-shown){overflow:hidden}body.swal2-height-auto{height:auto !important}body.swal2-no-backdrop .swal2-container{background-color:rgba(0,0,0,0) !important;pointer-events:none}body.swal2-no-backdrop .swal2-container .swal2-popup{pointer-events:all}body.swal2-no-backdrop .swal2-container .swal2-modal{box-shadow:0 0 10px var(--swal2-backdrop)}body.swal2-toast-shown .swal2-container{box-sizing:border-box;width:360px;max-width:100%;background-color:rgba(0,0,0,0);pointer-events:none}body.swal2-toast-shown .swal2-container.swal2-top{inset:0 auto auto 50%;transform:translateX(-50%)}body.swal2-toast-shown .swal2-container.swal2-top-end,body.swal2-toast-shown .swal2-container.swal2-top-right{inset:0 0 auto auto}body.swal2-toast-shown .swal2-container.swal2-top-start,body.swal2-toast-shown .swal2-container.swal2-top-left{inset:0 auto auto 0}body.swal2-toast-shown .swal2-container.swal2-center-start,body.swal2-toast-shown .swal2-container.swal2-center-left{inset:50% auto auto 0;transform:translateY(-50%)}body.swal2-toast-shown .swal2-container.swal2-center{inset:50% auto auto 50%;transform:translate(-50%, -50%)}body.swal2-toast-shown .swal2-container.swal2-center-end,body.swal2-toast-shown .swal2-container.swal2-center-right{inset:50% 0 auto auto;transform:translateY(-50%)}body.swal2-toast-shown .swal2-container.swal2-bottom-start,body.swal2-toast-shown .swal2-container.swal2-bottom-left{inset:auto auto 0 0}body.swal2-toast-shown .swal2-container.swal2-bottom{inset:auto auto 0 50%;transform:translateX(-50%)}body.swal2-toast-shown .swal2-container.swal2-bottom-end,body.swal2-toast-shown .swal2-container.swal2-bottom-right{inset:auto 0 0 auto}@media print{body.swal2-shown:not(.swal2-no-backdrop,.swal2-toast-shown){overflow-y:scroll !important}body.swal2-shown:not(.swal2-no-backdrop,.swal2-toast-shown)>[aria-hidden=true]{display:none}body.swal2-shown:not(.swal2-no-backdrop,.swal2-toast-shown) .swal2-container{position:static !important}}div:where(.swal2-container){display:grid;position:fixed;z-index:1060;inset:0;box-sizing:border-box;grid-template-areas:\"top-start     top            top-end\" \"center-start  center         center-end\" \"bottom-start  bottom-center  bottom-end\";grid-template-rows:minmax(min-content, auto) minmax(min-content, auto) minmax(min-content, auto);height:100%;padding:var(--swal2-container-padding);overflow-x:hidden;transition:var(--swal2-backdrop-transition);-webkit-overflow-scrolling:touch}div:where(.swal2-container).swal2-backdrop-show,div:where(.swal2-container).swal2-noanimation{background:var(--swal2-backdrop)}div:where(.swal2-container).swal2-backdrop-hide{background:rgba(0,0,0,0) !important}div:where(.swal2-container).swal2-top-start,div:where(.swal2-container).swal2-center-start,div:where(.swal2-container).swal2-bottom-start{grid-template-columns:minmax(0, 1fr) auto auto}div:where(.swal2-container).swal2-top,div:where(.swal2-container).swal2-center,div:where(.swal2-container).swal2-bottom{grid-template-columns:auto minmax(0, 1fr) auto}div:where(.swal2-container).swal2-top-end,div:where(.swal2-container).swal2-center-end,div:where(.swal2-container).swal2-bottom-end{grid-template-columns:auto auto minmax(0, 1fr)}div:where(.swal2-container).swal2-top-start>.swal2-popup{align-self:start}div:where(.swal2-container).swal2-top>.swal2-popup{grid-column:2;place-self:start center}div:where(.swal2-container).swal2-top-end>.swal2-popup,div:where(.swal2-container).swal2-top-right>.swal2-popup{grid-column:3;place-self:start end}div:where(.swal2-container).swal2-center-start>.swal2-popup,div:where(.swal2-container).swal2-center-left>.swal2-popup{grid-row:2;align-self:center}div:where(.swal2-container).swal2-center>.swal2-popup{grid-column:2;grid-row:2;place-self:center center}div:where(.swal2-container).swal2-center-end>.swal2-popup,div:where(.swal2-container).swal2-center-right>.swal2-popup{grid-column:3;grid-row:2;place-self:center end}div:where(.swal2-container).swal2-bottom-start>.swal2-popup,div:where(.swal2-container).swal2-bottom-left>.swal2-popup{grid-column:1;grid-row:3;align-self:end}div:where(.swal2-container).swal2-bottom>.swal2-popup{grid-column:2;grid-row:3;place-self:end center}div:where(.swal2-container).swal2-bottom-end>.swal2-popup,div:where(.swal2-container).swal2-bottom-right>.swal2-popup{grid-column:3;grid-row:3;place-self:end end}div:where(.swal2-container).swal2-grow-row>.swal2-popup,div:where(.swal2-container).swal2-grow-fullscreen>.swal2-popup{grid-column:1/4;width:100%}div:where(.swal2-container).swal2-grow-column>.swal2-popup,div:where(.swal2-container).swal2-grow-fullscreen>.swal2-popup{grid-row:1/4;align-self:stretch}div:where(.swal2-container).swal2-no-transition{transition:none !important}div:where(.swal2-container)[popover]{width:auto;border:0}div:where(.swal2-container) div:where(.swal2-popup){display:none;position:relative;box-sizing:border-box;grid-template-columns:minmax(0, 100%);width:var(--swal2-width);max-width:100%;padding:var(--swal2-padding);border:var(--swal2-border);border-radius:var(--swal2-border-radius);background:var(--swal2-background);color:var(--swal2-color);font-family:inherit;font-size:1rem;container-name:swal2-popup}div:where(.swal2-container) div:where(.swal2-popup):focus{outline:none}div:where(.swal2-container) div:where(.swal2-popup).swal2-loading{overflow-y:hidden}div:where(.swal2-container) div:where(.swal2-popup).swal2-draggable{cursor:grab}div:where(.swal2-container) div:where(.swal2-popup).swal2-draggable div:where(.swal2-icon){cursor:grab}div:where(.swal2-container) div:where(.swal2-popup).swal2-dragging{cursor:grabbing}div:where(.swal2-container) div:where(.swal2-popup).swal2-dragging div:where(.swal2-icon){cursor:grabbing}div:where(.swal2-container) h2:where(.swal2-title){position:relative;max-width:100%;margin:0;padding:var(--swal2-title-padding);color:inherit;font-size:1.875em;font-weight:600;text-align:center;text-transform:none;word-wrap:break-word;cursor:initial}div:where(.swal2-container) div:where(.swal2-actions){display:flex;z-index:1;box-sizing:border-box;flex-wrap:wrap;align-items:center;justify-content:var(--swal2-actions-justify-content);width:var(--swal2-actions-width);margin:var(--swal2-actions-margin);padding:var(--swal2-actions-padding);border-radius:var(--swal2-actions-border-radius);background:var(--swal2-actions-background)}div:where(.swal2-container) div:where(.swal2-loader){display:none;align-items:center;justify-content:center;width:2.2em;height:2.2em;margin:0 1.875em;animation:swal2-rotate-loading 1.5s linear 0s infinite normal;border-width:.25em;border-style:solid;border-radius:100%;border-color:#2778c4 rgba(0,0,0,0) #2778c4 rgba(0,0,0,0)}div:where(.swal2-container) button:where(.swal2-styled){margin:.3125em;padding:.625em 1.1em;transition:var(--swal2-action-button-transition);border:none;box-shadow:0 0 0 3px rgba(0,0,0,0);font-weight:500}div:where(.swal2-container) button:where(.swal2-styled):not([disabled]){cursor:pointer}div:where(.swal2-container) button:where(.swal2-styled):where(.swal2-confirm){border-radius:var(--swal2-confirm-button-border-radius);background:initial;background-color:var(--swal2-confirm-button-background-color);box-shadow:var(--swal2-confirm-button-box-shadow);color:var(--swal2-confirm-button-color);font-size:1em}div:where(.swal2-container) button:where(.swal2-styled):where(.swal2-confirm):hover{background-color:color-mix(in srgb, var(--swal2-confirm-button-background-color), var(--swal2-action-button-hover))}div:where(.swal2-container) button:where(.swal2-styled):where(.swal2-confirm):active{background-color:color-mix(in srgb, var(--swal2-confirm-button-background-color), var(--swal2-action-button-active))}div:where(.swal2-container) button:where(.swal2-styled):where(.swal2-deny){border-radius:var(--swal2-deny-button-border-radius);background:initial;background-color:var(--swal2-deny-button-background-color);box-shadow:var(--swal2-deny-button-box-shadow);color:var(--swal2-deny-button-color);font-size:1em}div:where(.swal2-container) button:where(.swal2-styled):where(.swal2-deny):hover{background-color:color-mix(in srgb, var(--swal2-deny-button-background-color), var(--swal2-action-button-hover))}div:where(.swal2-container) button:where(.swal2-styled):where(.swal2-deny):active{background-color:color-mix(in srgb, var(--swal2-deny-button-background-color), var(--swal2-action-button-active))}div:where(.swal2-container) button:where(.swal2-styled):where(.swal2-cancel){border-radius:var(--swal2-cancel-button-border-radius);background:initial;background-color:var(--swal2-cancel-button-background-color);box-shadow:var(--swal2-cancel-button-box-shadow);color:var(--swal2-cancel-button-color);font-size:1em}div:where(.swal2-container) button:where(.swal2-styled):where(.swal2-cancel):hover{background-color:color-mix(in srgb, var(--swal2-cancel-button-background-color), var(--swal2-action-button-hover))}div:where(.swal2-container) button:where(.swal2-styled):where(.swal2-cancel):active{background-color:color-mix(in srgb, var(--swal2-cancel-button-background-color), var(--swal2-action-button-active))}div:where(.swal2-container) button:where(.swal2-styled):focus-visible{outline:none;box-shadow:var(--swal2-action-button-focus-box-shadow)}div:where(.swal2-container) button:where(.swal2-styled)[disabled]:not(.swal2-loading){opacity:.4}div:where(.swal2-container) button:where(.swal2-styled)::-moz-focus-inner{border:0}div:where(.swal2-container) div:where(.swal2-footer){margin:1em 0 0;padding:1em 1em 0;border-top:1px solid var(--swal2-footer-border-color);background:var(--swal2-footer-background);color:var(--swal2-footer-color);font-size:1em;text-align:center;cursor:initial}div:where(.swal2-container) .swal2-timer-progress-bar-container{position:absolute;right:0;bottom:0;left:0;grid-column:auto !important;overflow:hidden;border-bottom-right-radius:var(--swal2-border-radius);border-bottom-left-radius:var(--swal2-border-radius)}div:where(.swal2-container) div:where(.swal2-timer-progress-bar){width:100%;height:.25em;background:var(--swal2-timer-progress-bar-background)}div:where(.swal2-container) img:where(.swal2-image){max-width:100%;margin:2em auto 1em;cursor:initial}div:where(.swal2-container) button:where(.swal2-close){position:var(--swal2-close-button-position);inset:var(--swal2-close-button-inset);z-index:2;align-items:center;justify-content:center;width:1.2em;height:1.2em;margin-top:0;margin-right:0;margin-bottom:-1.2em;padding:0;overflow:hidden;transition:var(--swal2-close-button-transition);border:none;border-radius:var(--swal2-border-radius);outline:var(--swal2-close-button-outline);background:rgba(0,0,0,0);color:var(--swal2-close-button-color);font-family:monospace;font-size:var(--swal2-close-button-font-size);cursor:pointer;justify-self:end}div:where(.swal2-container) button:where(.swal2-close):hover{transform:var(--swal2-close-button-hover-transform);background:rgba(0,0,0,0);color:#f27474}div:where(.swal2-container) button:where(.swal2-close):focus-visible{outline:none;box-shadow:var(--swal2-close-button-focus-box-shadow)}div:where(.swal2-container) button:where(.swal2-close)::-moz-focus-inner{border:0}div:where(.swal2-container) div:where(.swal2-html-container){z-index:1;justify-content:center;margin:0;padding:var(--swal2-html-container-padding);overflow:auto;color:inherit;font-size:1.125em;font-weight:normal;line-height:normal;text-align:center;word-wrap:break-word;word-break:break-word;cursor:initial}div:where(.swal2-container) input:where(.swal2-input),div:where(.swal2-container) input:where(.swal2-file),div:where(.swal2-container) textarea:where(.swal2-textarea),div:where(.swal2-container) select:where(.swal2-select),div:where(.swal2-container) div:where(.swal2-radio),div:where(.swal2-container) label:where(.swal2-checkbox){margin:1em 2em 3px}div:where(.swal2-container) input:where(.swal2-input),div:where(.swal2-container) input:where(.swal2-file),div:where(.swal2-container) textarea:where(.swal2-textarea){box-sizing:border-box;width:auto;transition:var(--swal2-input-transition);border:var(--swal2-input-border);border-radius:var(--swal2-input-border-radius);background:var(--swal2-input-background);box-shadow:var(--swal2-input-box-shadow);color:inherit;font-size:1.125em}div:where(.swal2-container) input:where(.swal2-input).swal2-inputerror,div:where(.swal2-container) input:where(.swal2-file).swal2-inputerror,div:where(.swal2-container) textarea:where(.swal2-textarea).swal2-inputerror{border-color:#f27474 !important;box-shadow:0 0 2px #f27474 !important}div:where(.swal2-container) input:where(.swal2-input):hover,div:where(.swal2-container) input:where(.swal2-file):hover,div:where(.swal2-container) textarea:where(.swal2-textarea):hover{box-shadow:var(--swal2-input-hover-box-shadow)}div:where(.swal2-container) input:where(.swal2-input):focus,div:where(.swal2-container) input:where(.swal2-file):focus,div:where(.swal2-container) textarea:where(.swal2-textarea):focus{border:var(--swal2-input-focus-border);outline:none;box-shadow:var(--swal2-input-focus-box-shadow)}div:where(.swal2-container) input:where(.swal2-input)::placeholder,div:where(.swal2-container) input:where(.swal2-file)::placeholder,div:where(.swal2-container) textarea:where(.swal2-textarea)::placeholder{color:#ccc}div:where(.swal2-container) .swal2-range{margin:1em 2em 3px;background:var(--swal2-background)}div:where(.swal2-container) .swal2-range input{width:80%}div:where(.swal2-container) .swal2-range output{width:20%;color:inherit;font-weight:600;text-align:center}div:where(.swal2-container) .swal2-range input,div:where(.swal2-container) .swal2-range output{height:2.625em;padding:0;font-size:1.125em;line-height:2.625em}div:where(.swal2-container) .swal2-input{height:2.625em;padding:0 .75em}div:where(.swal2-container) .swal2-file{width:75%;margin-right:auto;margin-left:auto;background:var(--swal2-input-background);font-size:1.125em}div:where(.swal2-container) .swal2-textarea{height:6.75em;padding:.75em}div:where(.swal2-container) .swal2-select{min-width:50%;max-width:100%;padding:.375em .625em;background:var(--swal2-input-background);color:inherit;font-size:1.125em}div:where(.swal2-container) .swal2-radio,div:where(.swal2-container) .swal2-checkbox{align-items:center;justify-content:center;background:var(--swal2-background);color:inherit}div:where(.swal2-container) .swal2-radio label,div:where(.swal2-container) .swal2-checkbox label{margin:0 .6em;font-size:1.125em}div:where(.swal2-container) .swal2-radio input,div:where(.swal2-container) .swal2-checkbox input{flex-shrink:0;margin:0 .4em}div:where(.swal2-container) label:where(.swal2-input-label){display:flex;justify-content:center;margin:1em auto 0}div:where(.swal2-container) div:where(.swal2-validation-message){align-items:center;justify-content:center;margin:1em 0 0;padding:.625em;overflow:hidden;background:var(--swal2-validation-message-background);color:var(--swal2-validation-message-color);font-size:1em;font-weight:300}div:where(.swal2-container) div:where(.swal2-validation-message)::before{content:\"!\";display:inline-block;width:1.5em;min-width:1.5em;height:1.5em;margin:0 .625em;border-radius:50%;background-color:#f27474;color:#fff;font-weight:600;line-height:1.5em;text-align:center}div:where(.swal2-container) .swal2-progress-steps{flex-wrap:wrap;align-items:center;max-width:100%;margin:1.25em auto;padding:0;background:rgba(0,0,0,0);font-weight:600}div:where(.swal2-container) .swal2-progress-steps li{display:inline-block;position:relative}div:where(.swal2-container) .swal2-progress-steps .swal2-progress-step{z-index:20;flex-shrink:0;width:2em;height:2em;border-radius:2em;background:#2778c4;color:#fff;line-height:2em;text-align:center}div:where(.swal2-container) .swal2-progress-steps .swal2-progress-step.swal2-active-progress-step{background:#2778c4}div:where(.swal2-container) .swal2-progress-steps .swal2-progress-step.swal2-active-progress-step~.swal2-progress-step{background:var(--swal2-progress-step-background);color:#fff}div:where(.swal2-container) .swal2-progress-steps .swal2-progress-step.swal2-active-progress-step~.swal2-progress-step-line{background:var(--swal2-progress-step-background)}div:where(.swal2-container) .swal2-progress-steps .swal2-progress-step-line{z-index:10;flex-shrink:0;width:2.5em;height:.4em;margin:0 -1px;background:#2778c4}div:where(.swal2-icon){position:relative;box-sizing:content-box;justify-content:center;width:5em;height:5em;margin:2.5em auto .6em;zoom:var(--swal2-icon-zoom);border:.25em solid rgba(0,0,0,0);border-radius:50%;border-color:#000;font-family:inherit;line-height:5em;cursor:default;user-select:none}div:where(.swal2-icon) .swal2-icon-content{display:flex;align-items:center;font-size:3.75em}div:where(.swal2-icon).swal2-error{border-color:#f27474;color:#f27474}div:where(.swal2-icon).swal2-error .swal2-x-mark{position:relative;flex-grow:1}div:where(.swal2-icon).swal2-error [class^=swal2-x-mark-line]{display:block;position:absolute;top:2.3125em;width:2.9375em;height:.3125em;border-radius:.125em;background-color:#f27474}div:where(.swal2-icon).swal2-error [class^=swal2-x-mark-line][class$=left]{left:1.0625em;transform:rotate(45deg)}div:where(.swal2-icon).swal2-error [class^=swal2-x-mark-line][class$=right]{right:1em;transform:rotate(-45deg)}@container swal2-popup style(--swal2-icon-animations:true){div:where(.swal2-icon).swal2-error.swal2-icon-show{animation:swal2-animate-error-icon .5s}div:where(.swal2-icon).swal2-error.swal2-icon-show .swal2-x-mark{animation:swal2-animate-error-x-mark .5s}}div:where(.swal2-icon).swal2-warning{border-color:#f8bb86;color:#f8bb86}@container swal2-popup style(--swal2-icon-animations:true){div:where(.swal2-icon).swal2-warning.swal2-icon-show{animation:swal2-animate-error-icon .5s}div:where(.swal2-icon).swal2-warning.swal2-icon-show .swal2-icon-content{animation:swal2-animate-i-mark .5s}}div:where(.swal2-icon).swal2-info{border-color:#3fc3ee;color:#3fc3ee}@container swal2-popup style(--swal2-icon-animations:true){div:where(.swal2-icon).swal2-info.swal2-icon-show{animation:swal2-animate-error-icon .5s}div:where(.swal2-icon).swal2-info.swal2-icon-show .swal2-icon-content{animation:swal2-animate-i-mark .8s}}div:where(.swal2-icon).swal2-question{border-color:#87adbd;color:#87adbd}@container swal2-popup style(--swal2-icon-animations:true){div:where(.swal2-icon).swal2-question.swal2-icon-show{animation:swal2-animate-error-icon .5s}div:where(.swal2-icon).swal2-question.swal2-icon-show .swal2-icon-content{animation:swal2-animate-question-mark .8s}}div:where(.swal2-icon).swal2-success{border-color:#a5dc86;color:#a5dc86}div:where(.swal2-icon).swal2-success [class^=swal2-success-circular-line]{position:absolute;width:3.75em;height:7.5em;border-radius:50%}div:where(.swal2-icon).swal2-success [class^=swal2-success-circular-line][class$=left]{top:-0.4375em;left:-2.0635em;transform:rotate(-45deg);transform-origin:3.75em 3.75em;border-radius:7.5em 0 0 7.5em}div:where(.swal2-icon).swal2-success [class^=swal2-success-circular-line][class$=right]{top:-0.6875em;left:1.875em;transform:rotate(-45deg);transform-origin:0 3.75em;border-radius:0 7.5em 7.5em 0}div:where(.swal2-icon).swal2-success .swal2-success-ring{position:absolute;z-index:2;top:-0.25em;left:-0.25em;box-sizing:content-box;width:100%;height:100%;border:.25em solid rgba(165,220,134,.3);border-radius:50%}div:where(.swal2-icon).swal2-success .swal2-success-fix{position:absolute;z-index:1;top:.5em;left:1.625em;width:.4375em;height:5.625em;transform:rotate(-45deg)}div:where(.swal2-icon).swal2-success [class^=swal2-success-line]{display:block;position:absolute;z-index:2;height:.3125em;border-radius:.125em;background-color:#a5dc86}div:where(.swal2-icon).swal2-success [class^=swal2-success-line][class$=tip]{top:2.875em;left:.8125em;width:1.5625em;transform:rotate(45deg)}div:where(.swal2-icon).swal2-success [class^=swal2-success-line][class$=long]{top:2.375em;right:.5em;width:2.9375em;transform:rotate(-45deg)}@container swal2-popup style(--swal2-icon-animations:true){div:where(.swal2-icon).swal2-success.swal2-icon-show .swal2-success-line-tip{animation:swal2-animate-success-line-tip .75s}div:where(.swal2-icon).swal2-success.swal2-icon-show .swal2-success-line-long{animation:swal2-animate-success-line-long .75s}div:where(.swal2-icon).swal2-success.swal2-icon-show .swal2-success-circular-line-right{animation:swal2-rotate-success-circular-line 4.25s ease-in}}[class^=swal2]{-webkit-tap-highlight-color:rgba(0,0,0,0)}.swal2-show{animation:var(--swal2-show-animation)}.swal2-hide{animation:var(--swal2-hide-animation)}.swal2-noanimation{transition:none}.swal2-scrollbar-measure{position:absolute;top:-9999px;width:50px;height:50px;overflow:scroll}.swal2-rtl .swal2-close{margin-right:initial;margin-left:0}.swal2-rtl .swal2-timer-progress-bar{right:0;left:auto}.swal2-toast{box-sizing:border-box;grid-column:1/4 !important;grid-row:1/4 !important;grid-template-columns:min-content auto min-content;padding:1em;overflow-y:hidden;border:var(--swal2-toast-border);background:var(--swal2-background);box-shadow:var(--swal2-toast-box-shadow);pointer-events:all}.swal2-toast>*{grid-column:2}.swal2-toast h2:where(.swal2-title){margin:.5em 1em;padding:0;font-size:1em;text-align:initial}.swal2-toast .swal2-loading{justify-content:center}.swal2-toast input:where(.swal2-input){height:2em;margin:.5em;font-size:1em}.swal2-toast .swal2-validation-message{font-size:1em}.swal2-toast div:where(.swal2-footer){margin:.5em 0 0;padding:.5em 0 0;font-size:.8em}.swal2-toast button:where(.swal2-close){grid-column:3/3;grid-row:1/99;align-self:center;width:.8em;height:.8em;margin:0;font-size:2em}.swal2-toast div:where(.swal2-html-container){margin:.5em 1em;padding:0;overflow:initial;font-size:1em;text-align:initial}.swal2-toast div:where(.swal2-html-container):empty{padding:0}.swal2-toast .swal2-loader{grid-column:1;grid-row:1/99;align-self:center;width:2em;height:2em;margin:.25em}.swal2-toast .swal2-icon{grid-column:1;grid-row:1/99;align-self:center;width:2em;min-width:2em;height:2em;margin:0 .5em 0 0}.swal2-toast .swal2-icon .swal2-icon-content{display:flex;align-items:center;font-size:1.8em;font-weight:bold}.swal2-toast .swal2-icon.swal2-success .swal2-success-ring{width:2em;height:2em}.swal2-toast .swal2-icon.swal2-error [class^=swal2-x-mark-line]{top:.875em;width:1.375em}.swal2-toast .swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=left]{left:.3125em}.swal2-toast .swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=right]{right:.3125em}.swal2-toast div:where(.swal2-actions){justify-content:flex-start;height:auto;margin:0;margin-top:.5em;padding:0 .5em}.swal2-toast button:where(.swal2-styled){margin:.25em .5em;padding:.4em .6em;font-size:1em}.swal2-toast .swal2-success{border-color:#a5dc86}.swal2-toast .swal2-success [class^=swal2-success-circular-line]{position:absolute;width:1.6em;height:3em;border-radius:50%}.swal2-toast .swal2-success [class^=swal2-success-circular-line][class$=left]{top:-0.8em;left:-0.5em;transform:rotate(-45deg);transform-origin:2em 2em;border-radius:4em 0 0 4em}.swal2-toast .swal2-success [class^=swal2-success-circular-line][class$=right]{top:-0.25em;left:.9375em;transform-origin:0 1.5em;border-radius:0 4em 4em 0}.swal2-toast .swal2-success .swal2-success-ring{width:2em;height:2em}.swal2-toast .swal2-success .swal2-success-fix{top:0;left:.4375em;width:.4375em;height:2.6875em}.swal2-toast .swal2-success [class^=swal2-success-line]{height:.3125em}.swal2-toast .swal2-success [class^=swal2-success-line][class$=tip]{top:1.125em;left:.1875em;width:.75em}.swal2-toast .swal2-success [class^=swal2-success-line][class$=long]{top:.9375em;right:.1875em;width:1.375em}@container swal2-popup style(--swal2-icon-animations:true){.swal2-toast .swal2-success.swal2-icon-show .swal2-success-line-tip{animation:swal2-toast-animate-success-line-tip .75s}.swal2-toast .swal2-success.swal2-icon-show .swal2-success-line-long{animation:swal2-toast-animate-success-line-long .75s}}.swal2-toast.swal2-show{animation:var(--swal2-toast-show-animation)}.swal2-toast.swal2-hide{animation:var(--swal2-toast-hide-animation)}@keyframes swal2-show{0%{transform:scale(0.7)}45%{transform:scale(1.05)}80%{transform:scale(0.95)}100%{transform:scale(1)}}@keyframes swal2-hide{0%{transform:scale(1);opacity:1}100%{transform:scale(0.5);opacity:0}}@keyframes swal2-animate-success-line-tip{0%{top:1.1875em;left:.0625em;width:0}54%{top:1.0625em;left:.125em;width:0}70%{top:2.1875em;left:-0.375em;width:3.125em}84%{top:3em;left:1.3125em;width:1.0625em}100%{top:2.8125em;left:.8125em;width:1.5625em}}@keyframes swal2-animate-success-line-long{0%{top:3.375em;right:2.875em;width:0}65%{top:3.375em;right:2.875em;width:0}84%{top:2.1875em;right:0;width:3.4375em}100%{top:2.375em;right:.5em;width:2.9375em}}@keyframes swal2-rotate-success-circular-line{0%{transform:rotate(-45deg)}5%{transform:rotate(-45deg)}12%{transform:rotate(-405deg)}100%{transform:rotate(-405deg)}}@keyframes swal2-animate-error-x-mark{0%{margin-top:1.625em;transform:scale(0.4);opacity:0}50%{margin-top:1.625em;transform:scale(0.4);opacity:0}80%{margin-top:-0.375em;transform:scale(1.15)}100%{margin-top:0;transform:scale(1);opacity:1}}@keyframes swal2-animate-error-icon{0%{transform:rotateX(100deg);opacity:0}100%{transform:rotateX(0deg);opacity:1}}@keyframes swal2-rotate-loading{0%{transform:rotate(0deg)}100%{transform:rotate(360deg)}}@keyframes swal2-animate-question-mark{0%{transform:rotateY(-360deg)}100%{transform:rotateY(0)}}@keyframes swal2-animate-i-mark{0%{transform:rotateZ(45deg);opacity:0}25%{transform:rotateZ(-25deg);opacity:.4}50%{transform:rotateZ(15deg);opacity:.8}75%{transform:rotateZ(-5deg);opacity:1}100%{transform:rotateX(0);opacity:1}}@keyframes swal2-toast-show{0%{transform:translateY(-0.625em) rotateZ(2deg)}33%{transform:translateY(0) rotateZ(-2deg)}66%{transform:translateY(0.3125em) rotateZ(2deg)}100%{transform:translateY(0) rotateZ(0deg)}}@keyframes swal2-toast-hide{100%{transform:rotateZ(1deg);opacity:0}}@keyframes swal2-toast-animate-success-line-tip{0%{top:.5625em;left:.0625em;width:0}54%{top:.125em;left:.125em;width:0}70%{top:.625em;left:-0.25em;width:1.625em}84%{top:1.0625em;left:.75em;width:.5em}100%{top:1.125em;left:.1875em;width:.75em}}@keyframes swal2-toast-animate-success-line-long{0%{top:1.625em;right:1.375em;width:0}65%{top:1.25em;right:.9375em;width:0}84%{top:.9375em;right:0;width:1.125em}100%{top:.9375em;right:.1875em;width:1.375em}}");
/*!
 * animsition v4.0.2
 * A simple and easy jQuery plugin for CSS animated page transitions.
 * http://blivesta.github.io/animsition
 * License : MIT
 * Author : blivesta (http://blivesta.com/)
 */
!function(t){"use strict";"function"==typeof define&&define.amd?define(["jquery"],t):"object"==typeof exports?module.exports=t(require("jquery")):t(jQuery)}(function(t){"use strict";var n="animsition",i={init:function(a){a=t.extend({inClass:"fade-in",outClass:"fade-out",inDuration:1500,outDuration:800,linkElement:".animsition-link",loading:!0,loadingParentElement:"body",loadingClass:"animsition-loading",loadingInner:"",timeout:!1,timeoutCountdown:5e3,onLoadEvent:!0,browser:["animation-duration","-webkit-animation-duration"],overlay:!1,overlayClass:"animsition-overlay-slide",overlayParentElement:"body",transition:function(t){window.location.href=t}},a),i.settings={timer:!1,data:{inClass:"animsition-in-class",inDuration:"animsition-in-duration",outClass:"animsition-out-class",outDuration:"animsition-out-duration",overlay:"animsition-overlay"},events:{inStart:"animsition.inStart",inEnd:"animsition.inEnd",outStart:"animsition.outStart",outEnd:"animsition.outEnd"}};var o=i.supportCheck.call(this,a);if(!o&&a.browser.length>0&&(!o||!this.length))return"console"in window||(window.console={},window.console.log=function(t){return t}),this.length||console.log("Animsition: Element does not exist on page."),o||console.log("Animsition: Does not support this browser."),i.destroy.call(this);var e=i.optionCheck.call(this,a);return e&&t("."+a.overlayClass).length<=0&&i.addOverlay.call(this,a),a.loading&&t("."+a.loadingClass).length<=0&&i.addLoading.call(this,a),this.each(function(){var o=this,e=t(this),s=t(window),r=t(document),l=e.data(n);l||(a=t.extend({},a),e.data(n,{options:a}),a.timeout&&i.addTimer.call(o),a.onLoadEvent&&s.on("load."+n,function(){i.settings.timer&&clearTimeout(i.settings.timer),i["in"].call(o)}),s.on("pageshow."+n,function(t){t.originalEvent.persisted&&i["in"].call(o)}),s.on("unload."+n,function(){}),r.on("click."+n,a.linkElement,function(n){n.preventDefault();var a=t(this),e=a.attr("href");2===n.which||n.metaKey||n.shiftKey||-1!==navigator.platform.toUpperCase().indexOf("WIN")&&n.ctrlKey?window.open(e,"_blank"):i.out.call(o,a,e)}))})},addOverlay:function(n){t(n.overlayParentElement).prepend('<div class="'+n.overlayClass+'"></div>')},addLoading:function(n){t(n.loadingParentElement).append('<div class="'+n.loadingClass+'">'+n.loadingInner+"</div>")},removeLoading:function(){var i=t(this),a=i.data(n).options,o=t(a.loadingParentElement).children("."+a.loadingClass);o.fadeOut().remove()},addTimer:function(){var a=this,o=t(this),e=o.data(n).options;i.settings.timer=setTimeout(function(){i["in"].call(a),t(window).off("load."+n)},e.timeoutCountdown)},supportCheck:function(n){var i=t(this),a=n.browser,o=a.length,e=!1;0===o&&(e=!0);for(var s=0;o>s;s++)if("string"==typeof i.css(a[s])){e=!0;break}return e},optionCheck:function(n){var a,o=t(this);return a=n.overlay||o.data(i.settings.data.overlay)?!0:!1},animationCheck:function(i,a,o){var e=t(this),s=e.data(n).options,r=typeof i,l=!a&&"number"===r,d=a&&"string"===r&&i.length>0;return l||d?i=i:a&&o?i=s.inClass:!a&&o?i=s.inDuration:a&&!o?i=s.outClass:a||o||(i=s.outDuration),i},"in":function(){var a=this,o=t(this),e=o.data(n).options,s=o.data(i.settings.data.inDuration),r=o.data(i.settings.data.inClass),l=i.animationCheck.call(a,s,!1,!0),d=i.animationCheck.call(a,r,!0,!0),u=i.optionCheck.call(a,e),c=o.data(n).outClass;e.loading&&i.removeLoading.call(a),c&&o.removeClass(c),u?i.inOverlay.call(a,d,l):i.inDefault.call(a,d,l)},inDefault:function(n,a){var o=t(this);o.css({"animation-duration":a+"ms"}).addClass(n).trigger(i.settings.events.inStart).animateCallback(function(){o.removeClass(n).css({opacity:1}).trigger(i.settings.events.inEnd)})},inOverlay:function(a,o){var e=t(this),s=e.data(n).options;e.css({opacity:1}).trigger(i.settings.events.inStart),t(s.overlayParentElement).children("."+s.overlayClass).css({"animation-duration":o+"ms"}).addClass(a).animateCallback(function(){e.trigger(i.settings.events.inEnd)})},out:function(a,o){var e=this,s=t(this),r=s.data(n).options,l=a.data(i.settings.data.outClass),d=s.data(i.settings.data.outClass),u=a.data(i.settings.data.outDuration),c=s.data(i.settings.data.outDuration),m=l?l:d,g=u?u:c,f=i.animationCheck.call(e,m,!0,!1),v=i.animationCheck.call(e,g,!1,!1),h=i.optionCheck.call(e,r);s.data(n).outClass=f,h?i.outOverlay.call(e,f,v,o):i.outDefault.call(e,f,v,o)},outDefault:function(a,o,e){var s=t(this),r=s.data(n).options;s.css({"animation-duration":o+1+"ms"}).addClass(a).trigger(i.settings.events.outStart).animateCallback(function(){s.trigger(i.settings.events.outEnd),r.transition(e)})},outOverlay:function(a,o,e){var s=this,r=t(this),l=r.data(n).options,d=r.data(i.settings.data.inClass),u=i.animationCheck.call(s,d,!0,!0);t(l.overlayParentElement).children("."+l.overlayClass).css({"animation-duration":o+1+"ms"}).removeClass(u).addClass(a).trigger(i.settings.events.outStart).animateCallback(function(){r.trigger(i.settings.events.outEnd),l.transition(e)})},destroy:function(){return this.each(function(){var i=t(this);t(window).off("."+n),i.css({opacity:1}).removeData(n)})}};t.fn.animateCallback=function(n){var i="animationend webkitAnimationEnd";return this.each(function(){var a=t(this);a.on(i,function(){return a.off(i),n.call(this)})})},t.fn.animsition=function(a){return i[a]?i[a].apply(this,Array.prototype.slice.call(arguments,1)):"object"!=typeof a&&a?void t.error("Method "+a+" does not exist on jQuery."+n):i.init.apply(this,arguments)}});
/*!
 * FilePond 4.30.4
 * Licensed under MIT, https://opensource.org/licenses/MIT/
 * Please visit https://pqina.nl/filepond/ for details.
 */

/* eslint-disable */

!function (e, t) {
    "object" == typeof exports && "undefined" != typeof module ? t(exports) : "function" == typeof define && define.amd ? define(["exports"], t) : t((e = e || self).FilePond = {})
}(this, function (e) {
    "use strict";
    var t = function (e, t) {
            for (var n in e) e.hasOwnProperty(n) && t(n, e[n])
        }, n = function (e) {
            var n = {};
            return t(e, function (t) {
                !function (e, t, n) {
                    "function" != typeof n ? Object.defineProperty(e, t, Object.assign({}, n)) : e[t] = n
                }(n, t, e[t])
            }), n
        }, r = function (e, t) {
            var n = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : null;
            if (null === n) return e.getAttribute(t) || e.hasAttribute(t);
            e.setAttribute(t, n)
        }, o = ["svg", "path"], i = function (e) {
            return o.includes(e)
        }, a = function (e, n) {
            var o = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : {};
            "object" == typeof n && (o = n, n = null);
            var a = i(e) ? document.createElementNS("http://www.w3.org/2000/svg", e) : document.createElement(e);
            return n && (i(e) ? r(a, "class", n) : a.className = n), t(o, function (e, t) {
                r(a, e, t)
            }), a
        }, s = function (e, t) {
            return function (e, n) {
                return void 0 !== n ? t.splice(n, 0, e) : t.push(e), e
            }
        }, u = function (e, t) {
            return function (n) {
                return t.splice(t.indexOf(n), 1), n.element.parentNode && e.removeChild(n.element), n
            }
        }, l = "undefined" != typeof window && void 0 !== window.document, c = function () {
            return l
        }, f = "children" in (c() ? a("svg") : {}) ? function (e) {
            return e.children.length
        } : function (e) {
            return e.childNodes.length
        }, d = function (e, t, n, r) {
            var o = n[0] || e.left, i = n[1] || e.top, a = o + e.width, s = i + e.height * (r[1] || 1), u = {
                element: Object.assign({}, e),
                inner: {left: e.left, top: e.top, right: e.right, bottom: e.bottom},
                outer: {left: o, top: i, right: a, bottom: s}
            };
            return t.filter(function (e) {
                return !e.isRectIgnored()
            }).map(function (e) {
                return e.rect
            }).forEach(function (e) {
                p(u.inner, Object.assign({}, e.inner)), p(u.outer, Object.assign({}, e.outer))
            }), E(u.inner), u.outer.bottom += u.element.marginBottom, u.outer.right += u.element.marginRight, E(u.outer), u
        }, p = function (e, t) {
            t.top += e.top, t.right += e.left, t.bottom += e.top, t.left += e.left, t.bottom > e.bottom && (e.bottom = t.bottom), t.right > e.right && (e.right = t.right)
        }, E = function (e) {
            e.width = e.right - e.left, e.height = e.bottom - e.top
        }, _ = function (e) {
            return "number" == typeof e
        }, T = function (e) {
            return e < .5 ? 2 * e * e : (4 - 2 * e) * e - 1
        }, I = {
            spring: function () {
                var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {}, t = e.stiffness,
                    r = void 0 === t ? .5 : t, o = e.damping, i = void 0 === o ? .75 : o, a = e.mass,
                    s = void 0 === a ? 10 : a, u = null, l = null, c = 0, f = !1, d = n({
                        interpolate: function (e, t) {
                            if (!f) {
                                if (!_(u) || !_(l)) return f = !0, void (c = 0);
                                (function (e, t, n) {
                                    var r = arguments.length > 3 && void 0 !== arguments[3] ? arguments[3] : .001;
                                    return Math.abs(e - t) < r && Math.abs(n) < r
                                })(l += c += -(l - u) * r / s, u, c *= i) || t ? (l = u, c = 0, f = !0, d.onupdate(l), d.oncomplete(l)) : d.onupdate(l)
                            }
                        }, target: {
                            set: function (e) {
                                if (_(e) && !_(l) && (l = e), null === u && (u = e, l = e), l === (u = e) || void 0 === u) return f = !0, c = 0, d.onupdate(l), void d.oncomplete(l);
                                f = !1
                            }, get: function () {
                                return u
                            }
                        }, resting: {
                            get: function () {
                                return f
                            }
                        }, onupdate: function (e) {
                        }, oncomplete: function (e) {
                        }
                    });
                return d
            }, tween: function () {
                var e, t, r = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {}, o = r.duration,
                    i = void 0 === o ? 500 : o, a = r.easing, s = void 0 === a ? T : a, u = r.delay,
                    l = void 0 === u ? 0 : u, c = null, f = !0, d = !1, p = null, E = n({
                        interpolate: function (n, r) {
                            f || null === p || (null === c && (c = n), n - c < l || ((e = n - c - l) >= i || r ? (e = 1, t = d ? 0 : 1, E.onupdate(t * p), E.oncomplete(t * p), f = !0) : (t = e / i, E.onupdate((e >= 0 ? s(d ? 1 - t : t) : 0) * p))))
                        }, target: {
                            get: function () {
                                return d ? 0 : p
                            }, set: function (e) {
                                if (null === p) return p = e, E.onupdate(e), void E.oncomplete(e);
                                e < p ? (p = 1, d = !0) : (d = !1, p = e), f = !1, c = null
                            }
                        }, resting: {
                            get: function () {
                                return f
                            }
                        }, onupdate: function (e) {
                        }, oncomplete: function (e) {
                        }
                    });
                return E
            }
        }, v = function (e, t, n) {
            var r = e[t] && "object" == typeof e[t][n] ? e[t][n] : e[t] || e, o = "string" == typeof r ? r : r.type,
                i = "object" == typeof r ? Object.assign({}, r) : {};
            return I[o] ? I[o](i) : null
        }, m = function (e, t, n) {
            var r = arguments.length > 3 && void 0 !== arguments[3] && arguments[3];
            (t = Array.isArray(t) ? t : [t]).forEach(function (t) {
                e.forEach(function (e) {
                    var o = e, i = function () {
                        return n[e]
                    }, a = function (t) {
                        return n[e] = t
                    };
                    "object" == typeof e && (o = e.key, i = e.getter || i, a = e.setter || a), t[o] && !r || (t[o] = {
                        get: i,
                        set: a
                    })
                })
            })
        }, h = function (e) {
            return null != e
        }, g = {
            opacity: 1,
            scaleX: 1,
            scaleY: 1,
            translateX: 0,
            translateY: 0,
            rotateX: 0,
            rotateY: 0,
            rotateZ: 0,
            originX: 0,
            originY: 0
        }, R = function (e, t) {
            if (Object.keys(e).length !== Object.keys(t).length) return !0;
            for (var n in t) if (t[n] !== e[n]) return !0;
            return !1
        }, O = function (e, t) {
            var n = t.opacity, r = t.perspective, o = t.translateX, i = t.translateY, a = t.scaleX, s = t.scaleY,
                u = t.rotateX, l = t.rotateY, c = t.rotateZ, f = t.originX, d = t.originY, p = t.width, E = t.height,
                _ = "", T = "";
            (h(f) || h(d)) && (T += "transform-origin: " + (f || 0) + "px " + (d || 0) + "px;"), h(r) && (_ += "perspective(" + r + "px) "), (h(o) || h(i)) && (_ += "translate3d(" + (o || 0) + "px, " + (i || 0) + "px, 0) "), (h(a) || h(s)) && (_ += "scale3d(" + (h(a) ? a : 1) + ", " + (h(s) ? s : 1) + ", 1) "), h(c) && (_ += "rotateZ(" + c + "rad) "), h(u) && (_ += "rotateX(" + u + "rad) "), h(l) && (_ += "rotateY(" + l + "rad) "), _.length && (T += "transform:" + _ + ";"), h(n) && (T += "opacity:" + n + ";", 0 === n && (T += "visibility:hidden;"), n < 1 && (T += "pointer-events:none;")), h(E) && (T += "height:" + E + "px;"), h(p) && (T += "width:" + p + "px;");
            var I = e.elementCurrentStyle || "";
            T.length === I.length && T === I || (e.style.cssText = T, e.elementCurrentStyle = T)
        }, y = {
            styles: function (e) {
                var t = e.mixinConfig, n = e.viewProps, r = e.viewInternalAPI, o = e.viewExternalAPI, i = e.view,
                    a = Object.assign({}, n), s = {};
                m(t, [r, o], n);
                var u = function () {
                    return i.rect ? d(i.rect, i.childViews, [n.translateX || 0, n.translateY || 0], [n.scaleX || 0, n.scaleY || 0]) : null
                };
                return r.rect = {get: u}, o.rect = {get: u}, t.forEach(function (e) {
                    n[e] = void 0 === a[e] ? g[e] : a[e]
                }), {
                    write: function () {
                        if (R(s, n)) return O(i.element, n), Object.assign(s, Object.assign({}, n)), !0
                    }, destroy: function () {
                    }
                }
            }, listeners: function (e) {
                e.mixinConfig, e.viewProps, e.viewInternalAPI;
                var t, n = e.viewExternalAPI, r = (e.viewState, e.view), o = [], i = (t = r.element, function (e, n) {
                    t.addEventListener(e, n)
                }), a = function (e) {
                    return function (t, n) {
                        e.removeEventListener(t, n)
                    }
                }(r.element);
                return n.on = function (e, t) {
                    o.push({type: e, fn: t}), i(e, t)
                }, n.off = function (e, t) {
                    o.splice(o.findIndex(function (n) {
                        return n.type === e && n.fn === t
                    }), 1), a(e, t)
                }, {
                    write: function () {
                        return !0
                    }, destroy: function () {
                        o.forEach(function (e) {
                            a(e.type, e.fn)
                        })
                    }
                }
            }, animations: function (e) {
                var n = e.mixinConfig, r = e.viewProps, o = e.viewInternalAPI, i = e.viewExternalAPI,
                    a = Object.assign({}, r), s = [];
                return t(n, function (e, t) {
                    var n = v(t);
                    n && (n.onupdate = function (t) {
                        r[e] = t
                    }, n.target = a[e], m([{
                        key: e, setter: function (e) {
                            n.target !== e && (n.target = e)
                        }, getter: function () {
                            return r[e]
                        }
                    }], [o, i], r, !0), s.push(n))
                }), {
                    write: function (e) {
                        var t = document.hidden, n = !0;
                        return s.forEach(function (r) {
                            r.resting || (n = !1), r.interpolate(e, t)
                        }), n
                    }, destroy: function () {
                    }
                }
            }, apis: function (e) {
                var t = e.mixinConfig, n = e.viewProps, r = e.viewExternalAPI;
                m(t, r, n)
            }
        }, D = function () {
            var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {},
                n = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : {};
            return t.layoutCalculated || (e.paddingTop = parseInt(n.paddingTop, 10) || 0, e.marginTop = parseInt(n.marginTop, 10) || 0, e.marginRight = parseInt(n.marginRight, 10) || 0, e.marginBottom = parseInt(n.marginBottom, 10) || 0, e.marginLeft = parseInt(n.marginLeft, 10) || 0, t.layoutCalculated = !0), e.left = t.offsetLeft || 0, e.top = t.offsetTop || 0, e.width = t.offsetWidth || 0, e.height = t.offsetHeight || 0, e.right = e.left + e.width, e.bottom = e.top + e.height, e.scrollTop = t.scrollTop, e.hidden = null === t.offsetParent, e
        }, S = function () {
            var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {}, t = e.tag,
                r = void 0 === t ? "div" : t, o = e.name, i = void 0 === o ? null : o, l = e.attributes,
                c = void 0 === l ? {} : l, p = e.read, E = void 0 === p ? function () {
                } : p, _ = e.write, T = void 0 === _ ? function () {
                } : _, I = e.create, v = void 0 === I ? function () {
                } : I, m = e.destroy, h = void 0 === m ? function () {
                } : m, g = e.filterFrameActionsForChild, R = void 0 === g ? function (e, t) {
                    return t
                } : g, O = e.didCreateView, S = void 0 === O ? function () {
                } : O, A = e.didWriteView, L = void 0 === A ? function () {
                } : A, b = e.ignoreRect, P = void 0 !== b && b, M = e.ignoreRectUpdate, w = void 0 !== M && M, C = e.mixins,
                N = void 0 === C ? [] : C;
            return function (e) {
                var t, o = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {},
                    l = a(r, "filepond--" + i, c), p = window.getComputedStyle(l, null), _ = D(), I = null, m = !1, g = [],
                    O = [], A = {}, b = {}, M = [T], C = [E], G = [h], U = function () {
                        return l
                    }, B = function () {
                        return g.concat()
                    }, F = function () {
                        return I || (I = d(_, g, [0, 0], [1, 1]))
                    }, q = {
                        element: {get: U}, style: {
                            get: function () {
                                return p
                            }
                        }, childViews: {get: B}
                    }, V = Object.assign({}, q, {
                        rect: {get: F}, ref: {
                            get: function () {
                                return A
                            }
                        }, is: function (e) {
                            return i === e
                        }, appendChild: (t = l, function (e, n) {
                            void 0 !== n && t.children[n] ? t.insertBefore(e, t.children[n]) : t.appendChild(e)
                        }), createChildView: function (e) {
                            return function (t, n) {
                                return t(e, n)
                            }
                        }(e), linkView: function (e) {
                            return g.push(e), e
                        }, unlinkView: function (e) {
                            g.splice(g.indexOf(e), 1)
                        }, appendChildView: s(0, g), removeChildView: u(l, g), registerWriter: function (e) {
                            return M.push(e)
                        }, registerReader: function (e) {
                            return C.push(e)
                        }, registerDestroyer: function (e) {
                            return G.push(e)
                        }, invalidateLayout: function () {
                            return l.layoutCalculated = !1
                        }, dispatch: e.dispatch, query: e.query
                    }), x = {
                        element: {get: U}, childViews: {get: B}, rect: {get: F}, resting: {
                            get: function () {
                                return m
                            }
                        }, isRectIgnored: function () {
                            return P
                        }, _read: function () {
                            I = null, g.forEach(function (e) {
                                return e._read()
                            }), !(w && _.width && _.height) && D(_, l, p);
                            var e = {root: k, props: o, rect: _};
                            C.forEach(function (t) {
                                return t(e)
                            })
                        }, _write: function (e, t, n) {
                            var r = 0 === t.length;
                            return M.forEach(function (i) {
                                !1 === i({props: o, root: k, actions: t, timestamp: e, shouldOptimize: n}) && (r = !1)
                            }), O.forEach(function (t) {
                                !1 === t.write(e) && (r = !1)
                            }), g.filter(function (e) {
                                return !!e.element.parentNode
                            }).forEach(function (o) {
                                o._write(e, R(o, t), n) || (r = !1)
                            }), g.forEach(function (o, i) {
                                o.element.parentNode || (k.appendChild(o.element, i), o._read(), o._write(e, R(o, t), n), r = !1)
                            }), m = r, L({props: o, root: k, actions: t, timestamp: e}), r
                        }, _destroy: function () {
                            O.forEach(function (e) {
                                return e.destroy()
                            }), G.forEach(function (e) {
                                e({root: k, props: o})
                            }), g.forEach(function (e) {
                                return e._destroy()
                            })
                        }
                    }, Y = Object.assign({}, q, {
                        rect: {
                            get: function () {
                                return _
                            }
                        }
                    });
                Object.keys(N).sort(function (e, t) {
                    return "styles" === e ? 1 : "styles" === t ? -1 : 0
                }).forEach(function (e) {
                    var t = y[e]({
                        mixinConfig: N[e],
                        viewProps: o,
                        viewState: b,
                        viewInternalAPI: V,
                        viewExternalAPI: x,
                        view: n(Y)
                    });
                    t && O.push(t)
                });
                var k = n(V);
                v({root: k, props: o});
                var j = f(l);
                return g.forEach(function (e, t) {
                    k.appendChild(e.element, j + t)
                }), S(k), n(x)
            }
        }, A = function (e, t) {
            return function (n) {
                var r = n.root, o = n.props, i = n.actions, a = void 0 === i ? [] : i, s = n.timestamp,
                    u = n.shouldOptimize;
                a.filter(function (t) {
                    return e[t.type]
                }).forEach(function (t) {
                    return e[t.type]({root: r, props: o, action: t.data, timestamp: s, shouldOptimize: u})
                }), t && t({root: r, props: o, actions: a, timestamp: s, shouldOptimize: u})
            }
        }, L = function (e, t) {
            return t.parentNode.insertBefore(e, t)
        }, b = function (e, t) {
            return t.parentNode.insertBefore(e, t.nextSibling)
        }, P = function (e) {
            return Array.isArray(e)
        }, M = function (e) {
            return null == e
        }, w = function (e) {
            return e.trim()
        }, C = function (e) {
            return "" + e
        }, N = function (e) {
            return "boolean" == typeof e
        }, G = function (e) {
            return N(e) ? e : "true" === e
        }, U = function (e) {
            return "string" == typeof e
        }, B = function (e) {
            return _(e) ? e : U(e) ? C(e).replace(/[a-z]+/gi, "") : 0
        }, F = function (e) {
            return parseInt(B(e), 10)
        }, q = function (e) {
            return parseFloat(B(e))
        }, V = function (e) {
            return _(e) && isFinite(e) && Math.floor(e) === e
        }, x = function (e) {
            var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : 1e3;
            if (V(e)) return e;
            var n = C(e).trim();
            return /MB$/i.test(n) ? (n = n.replace(/MB$i/, "").trim(), F(n) * t * t) : /KB/i.test(n) ? (n = n.replace(/KB$i/, "").trim(), F(n) * t) : F(n)
        }, Y = function (e) {
            return "function" == typeof e
        }, k = {process: "POST", patch: "PATCH", revert: "DELETE", fetch: "GET", restore: "GET", load: "GET"},
        j = function (e, t, n, r, o) {
            if (null === t) return null;
            if ("function" == typeof t) return t;
            var i = {
                url: "GET" === n || "PATCH" === n ? "?" + e + "=" : "",
                method: n,
                headers: o,
                withCredentials: !1,
                timeout: r,
                onload: null,
                ondata: null,
                onerror: null
            };
            if (U(t)) return i.url = t, i;
            if (Object.assign(i, t), U(i.headers)) {
                var a = i.headers.split(/:(.+)/);
                i.headers = {header: a[0], value: a[1]}
            }
            return i.withCredentials = G(i.withCredentials), i
        }, H = function (e) {
            return "object" == typeof e && null !== e
        }, X = function (e) {
            return P(e) ? "array" : function (e) {
                return null === e
            }(e) ? "null" : V(e) ? "int" : /^[0-9]+ ?(?:GB|MB|KB)$/gi.test(e) ? "bytes" : function (e) {
                return H(e) && U(e.url) && H(e.process) && H(e.revert) && H(e.restore) && H(e.fetch)
            }(e) ? "api" : typeof e
        }, W = {
            array: function (e) {
                var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : ",";
                return M(e) ? [] : P(e) ? e : C(e).split(t).map(w).filter(function (e) {
                    return e.length
                })
            }, boolean: G, int: function (e) {
                return "bytes" === X(e) ? x(e) : F(e)
            }, number: q, float: q, bytes: x, string: function (e) {
                return Y(e) ? e : C(e)
            }, function: function (e) {
                return function (e) {
                    for (var t = self, n = e.split("."), r = null; r = n.shift();) if (!(t = t[r])) return null;
                    return t
                }(e)
            }, serverapi: function (e) {
                return (r = {}).url = U(n = e) ? n : n.url || "", r.timeout = n.timeout ? parseInt(n.timeout, 10) : 0, r.headers = n.headers ? n.headers : {}, t(k, function (e) {
                    r[e] = j(e, n[e], k[e], r.timeout, r.headers)
                }), r.process = n.process || U(n) || n.url ? r.process : null, r.remove = n.remove || null, delete r.headers, r;
                var n, r
            }, object: function (e) {
                try {
                    return JSON.parse(e.replace(/{\s*'/g, '{"').replace(/'\s*}/g, '"}').replace(/'\s*:/g, '":').replace(/:\s*'/g, ':"').replace(/,\s*'/g, ',"').replace(/'\s*,/g, '",'))
                } catch (e) {
                    return null
                }
            }
        }, z = function (e, t, n) {
            if (e === t) return e;
            var r, o = X(e);
            if (o !== n) {
                var i = (r = e, W[n](r));
                if (o = X(i), null === i) throw'Trying to assign value with incorrect type to "' + option + '", allowed type: "' + n + '"';
                e = i
            }
            return e
        }, Q = function (e) {
            var r = {};
            return t(e, function (t) {
                var n, o, i, a = e[t];
                r[t] = (n = a[0], o = a[1], i = n, {
                    enumerable: !0, get: function () {
                        return i
                    }, set: function (e) {
                        i = z(e, n, o)
                    }
                })
            }), n(r)
        }, Z = function (e) {
            var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : "-";
            return e.split(/(?=[A-Z])/).map(function (e) {
                return e.toLowerCase()
            }).join(t)
        }, K = function (e) {
            return function (n, r, o) {
                var i = {};
                return t(e, function (e) {
                    var t = Z(e, "_").toUpperCase();
                    i["SET_" + t] = function (r) {
                        try {
                            o.options[e] = r.value
                        } catch (e) {
                        }
                        n("DID_SET_" + t, {value: o.options[e]})
                    }
                }), i
            }
        }, $ = function (e) {
            return function (n) {
                var r = {};
                return t(e, function (e) {
                    r["GET_" + Z(e, "_").toUpperCase()] = function (t) {
                        return n.options[e]
                    }
                }), r
            }
        }, J = 1, ee = 2, te = 3, ne = 4, re = 5, oe = function () {
            return Math.random().toString(36).substring(2, 11)
        };

    function ie(e) {
        this.wrapped = e
    }

    function ae(e) {
        var t, n;

        function r(t, n) {
            try {
                var i = e[t](n), a = i.value, s = a instanceof ie;
                Promise.resolve(s ? a.wrapped : a).then(function (e) {
                    s ? r("next", e) : o(i.done ? "return" : "normal", e)
                }, function (e) {
                    r("throw", e)
                })
            } catch (e) {
                o("throw", e)
            }
        }

        function o(e, o) {
            switch (e) {
                case"return":
                    t.resolve({value: o, done: !0});
                    break;
                case"throw":
                    t.reject(o);
                    break;
                default:
                    t.resolve({value: o, done: !1})
            }
            (t = t.next) ? r(t.key, t.arg) : n = null
        }

        this._invoke = function (e, o) {
            return new Promise(function (i, a) {
                var s = {key: e, arg: o, resolve: i, reject: a, next: null};
                n ? n = n.next = s : (t = n = s, r(e, o))
            })
        }, "function" != typeof e.return && (this.return = void 0)
    }

    function se(e, t) {
        if (null == e) return {};
        var n, r, o = function (e, t) {
            if (null == e) return {};
            var n, r, o = {}, i = Object.keys(e);
            for (r = 0; r < i.length; r++) n = i[r], t.indexOf(n) >= 0 || (o[n] = e[n]);
            return o
        }(e, t);
        if (Object.getOwnPropertySymbols) {
            var i = Object.getOwnPropertySymbols(e);
            for (r = 0; r < i.length; r++) n = i[r], t.indexOf(n) >= 0 || Object.prototype.propertyIsEnumerable.call(e, n) && (o[n] = e[n])
        }
        return o
    }

    "function" == typeof Symbol && Symbol.asyncIterator && (ae.prototype[Symbol.asyncIterator] = function () {
        return this
    }), ae.prototype.next = function (e) {
        return this._invoke("next", e)
    }, ae.prototype.throw = function (e) {
        return this._invoke("throw", e)
    }, ae.prototype.return = function (e) {
        return this._invoke("return", e)
    };

    function ue(e) {
        return function (e) {
            if (Array.isArray(e)) {
                for (var t = 0, n = new Array(e.length); t < e.length; t++) n[t] = e[t];
                return n
            }
        }(e) || le(e) || function () {
            throw new TypeError("Invalid attempt to spread non-iterable instance")
        }()
    }

    function le(e) {
        if (Symbol.iterator in Object(e) || "[object Arguments]" === Object.prototype.toString.call(e)) return Array.from(e)
    }

    var ce, fe, de = function (e, t) {
            return e.splice(t, 1)
        }, pe = function () {
            var e = [], t = function (t, n) {
                de(e, e.findIndex(function (e) {
                    return e.event === t && (e.cb === n || !n)
                }))
            }, n = function (t, n, r) {
                e.filter(function (e) {
                    return e.event === t
                }).map(function (e) {
                    return e.cb
                }).forEach(function (e) {
                    return function (e, t) {
                        t ? e() : document.hidden ? Promise.resolve(1).then(e) : setTimeout(e, 0)
                    }(function () {
                        return e.apply(void 0, ue(n))
                    }, r)
                })
            };
            return {
                fireSync: function (e) {
                    for (var t = arguments.length, r = new Array(t > 1 ? t - 1 : 0), o = 1; o < t; o++) r[o - 1] = arguments[o];
                    n(e, r, !0)
                }, fire: function (e) {
                    for (var t = arguments.length, r = new Array(t > 1 ? t - 1 : 0), o = 1; o < t; o++) r[o - 1] = arguments[o];
                    n(e, r, !1)
                }, on: function (t, n) {
                    e.push({event: t, cb: n})
                }, onOnce: function (n, r) {
                    e.push({
                        event: n, cb: function () {
                            t(n, r), r.apply(void 0, arguments)
                        }
                    })
                }, off: t
            }
        }, Ee = function (e, t, n) {
            Object.getOwnPropertyNames(e).filter(function (e) {
                return !n.includes(e)
            }).forEach(function (n) {
                return Object.defineProperty(t, n, Object.getOwnPropertyDescriptor(e, n))
            })
        },
        _e = ["fire", "process", "revert", "load", "on", "off", "onOnce", "retryLoad", "extend", "archive", "archived", "release", "released", "requestProcessing", "freeze"],
        Te = function (e) {
            var t = {};
            return Ee(e, t, _e), t
        }, Ie = {
            INIT: 1,
            IDLE: 2,
            PROCESSING_QUEUED: 9,
            PROCESSING: 3,
            PROCESSING_COMPLETE: 5,
            PROCESSING_ERROR: 6,
            PROCESSING_REVERT_ERROR: 10,
            LOADING: 7,
            LOAD_ERROR: 8
        }, ve = {INPUT: 1, LIMBO: 2, LOCAL: 3}, me = function (e) {
            return /[^0-9]+/.exec(e)
        }, he = function () {
            return me(1.1.toLocaleString())[0]
        }, ge = {
            BOOLEAN: "boolean",
            INT: "int",
            NUMBER: "number",
            STRING: "string",
            ARRAY: "array",
            OBJECT: "object",
            FUNCTION: "function",
            ACTION: "action",
            SERVER_API: "serverapi",
            REGEX: "regex"
        }, Re = [], Oe = function (e, t, n) {
            return new Promise(function (r, o) {
                var i = Re.filter(function (t) {
                    return t.key === e
                }).map(function (e) {
                    return e.cb
                });
                if (0 !== i.length) {
                    var a = i.shift();
                    i.reduce(function (e, t) {
                        return e.then(function (e) {
                            return t(e, n)
                        })
                    }, a(t, n)).then(function (e) {
                        return r(e)
                    }).catch(function (e) {
                        return o(e)
                    })
                } else r(t)
            })
        }, ye = function (e, t, n) {
            return Re.filter(function (t) {
                return t.key === e
            }).map(function (e) {
                return e.cb(t, n)
            })
        }, De = function (e, t) {
            return Re.push({key: e, cb: t})
        }, Se = function () {
            return Object.assign({}, Ae)
        }, Ae = {
            id: [null, ge.STRING],
            name: ["filepond", ge.STRING],
            disabled: [!1, ge.BOOLEAN],
            className: [null, ge.STRING],
            required: [!1, ge.BOOLEAN],
            captureMethod: [null, ge.STRING],
            allowSyncAcceptAttribute: [!0, ge.BOOLEAN],
            allowDrop: [!0, ge.BOOLEAN],
            allowBrowse: [!0, ge.BOOLEAN],
            allowPaste: [!0, ge.BOOLEAN],
            allowMultiple: [!1, ge.BOOLEAN],
            allowReplace: [!0, ge.BOOLEAN],
            allowRevert: [!0, ge.BOOLEAN],
            allowRemove: [!0, ge.BOOLEAN],
            allowProcess: [!0, ge.BOOLEAN],
            allowReorder: [!1, ge.BOOLEAN],
            allowDirectoriesOnly: [!1, ge.BOOLEAN],
            storeAsFile: [!1, ge.BOOLEAN],
            forceRevert: [!1, ge.BOOLEAN],
            maxFiles: [null, ge.INT],
            checkValidity: [!1, ge.BOOLEAN],
            itemInsertLocationFreedom: [!0, ge.BOOLEAN],
            itemInsertLocation: ["before", ge.STRING],
            itemInsertInterval: [75, ge.INT],
            dropOnPage: [!1, ge.BOOLEAN],
            dropOnElement: [!0, ge.BOOLEAN],
            dropValidation: [!1, ge.BOOLEAN],
            ignoredFiles: [[".ds_store", "thumbs.db", "desktop.ini"], ge.ARRAY],
            instantUpload: [!0, ge.BOOLEAN],
            maxParallelUploads: [2, ge.INT],
            allowMinimumUploadDuration: [!0, ge.BOOLEAN],
            chunkUploads: [!1, ge.BOOLEAN],
            chunkForce: [!1, ge.BOOLEAN],
            chunkSize: [5e6, ge.INT],
            chunkRetryDelays: [[500, 1e3, 3e3], ge.ARRAY],
            server: [null, ge.SERVER_API],
            fileSizeBase: [1e3, ge.INT],
            labelFileSizeBytes: ["bytes", ge.STRING],
            labelFileSizeKilobytes: ["KB", ge.STRING],
            labelFileSizeMegabytes: ["MB", ge.STRING],
            labelFileSizeGigabytes: ["GB", ge.STRING],
            labelDecimalSeparator: [he(), ge.STRING],
            labelThousandsSeparator: [(ce = he(), fe = 1e3.toLocaleString(), fe !== 1e3.toString() ? me(fe)[0] : "." === ce ? "," : "."), ge.STRING],
            labelIdle: ['Drag & Drop your files or <span class="filepond--label-action">Browse</span>', ge.STRING],
            labelInvalidField: ["Field contains invalid files", ge.STRING],
            labelFileWaitingForSize: ["Waiting for size", ge.STRING],
            labelFileSizeNotAvailable: ["Size not available", ge.STRING],
            labelFileCountSingular: ["file in list", ge.STRING],
            labelFileCountPlural: ["files in list", ge.STRING],
            labelFileLoading: ["Loading", ge.STRING],
            labelFileAdded: ["Added", ge.STRING],
            labelFileLoadError: ["Error during load", ge.STRING],
            labelFileRemoved: ["Removed", ge.STRING],
            labelFileRemoveError: ["Error during remove", ge.STRING],
            labelFileProcessing: ["Uploading", ge.STRING],
            labelFileProcessingComplete: ["Upload complete", ge.STRING],
            labelFileProcessingAborted: ["Upload cancelled", ge.STRING],
            labelFileProcessingError: ["Error during upload", ge.STRING],
            labelFileProcessingRevertError: ["Error during revert", ge.STRING],
            labelTapToCancel: ["tap to cancel", ge.STRING],
            labelTapToRetry: ["tap to retry", ge.STRING],
            labelTapToUndo: ["tap to undo", ge.STRING],
            labelButtonRemoveItem: ["Remove", ge.STRING],
            labelButtonAbortItemLoad: ["Abort", ge.STRING],
            labelButtonRetryItemLoad: ["Retry", ge.STRING],
            labelButtonAbortItemProcessing: ["Cancel", ge.STRING],
            labelButtonUndoItemProcessing: ["Undo", ge.STRING],
            labelButtonRetryItemProcessing: ["Retry", ge.STRING],
            labelButtonProcessItem: ["Upload", ge.STRING],
            iconRemove: ['<svg width="26" height="26" viewBox="0 0 26 26" xmlns="http://www.w3.org/2000/svg"><path d="M11.586 13l-2.293 2.293a1 1 0 0 0 1.414 1.414L13 14.414l2.293 2.293a1 1 0 0 0 1.414-1.414L14.414 13l2.293-2.293a1 1 0 0 0-1.414-1.414L13 11.586l-2.293-2.293a1 1 0 0 0-1.414 1.414L11.586 13z" fill="currentColor" fill-rule="nonzero"/></svg>', ge.STRING],
            iconProcess: ['<svg width="26" height="26" viewBox="0 0 26 26" xmlns="http://www.w3.org/2000/svg"><path d="M14 10.414v3.585a1 1 0 0 1-2 0v-3.585l-1.293 1.293a1 1 0 0 1-1.414-1.415l3-3a1 1 0 0 1 1.414 0l3 3a1 1 0 0 1-1.414 1.415L14 10.414zM9 18a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2H9z" fill="currentColor" fill-rule="evenodd"/></svg>', ge.STRING],
            iconRetry: ['<svg width="26" height="26" viewBox="0 0 26 26" xmlns="http://www.w3.org/2000/svg"><path d="M10.81 9.185l-.038.02A4.997 4.997 0 0 0 8 13.683a5 5 0 0 0 5 5 5 5 0 0 0 5-5 1 1 0 0 1 2 0A7 7 0 1 1 9.722 7.496l-.842-.21a.999.999 0 1 1 .484-1.94l3.23.806c.535.133.86.675.73 1.21l-.804 3.233a.997.997 0 0 1-1.21.73.997.997 0 0 1-.73-1.21l.23-.928v-.002z" fill="currentColor" fill-rule="nonzero"/></svg>', ge.STRING],
            iconUndo: ['<svg width="26" height="26" viewBox="0 0 26 26" xmlns="http://www.w3.org/2000/svg"><path d="M9.185 10.81l.02-.038A4.997 4.997 0 0 1 13.683 8a5 5 0 0 1 5 5 5 5 0 0 1-5 5 1 1 0 0 0 0 2A7 7 0 1 0 7.496 9.722l-.21-.842a.999.999 0 1 0-1.94.484l.806 3.23c.133.535.675.86 1.21.73l3.233-.803a.997.997 0 0 0 .73-1.21.997.997 0 0 0-1.21-.73l-.928.23-.002-.001z" fill="currentColor" fill-rule="nonzero"/></svg>', ge.STRING],
            iconDone: ['<svg width="26" height="26" viewBox="0 0 26 26" xmlns="http://www.w3.org/2000/svg"><path d="M18.293 9.293a1 1 0 0 1 1.414 1.414l-7.002 7a1 1 0 0 1-1.414 0l-3.998-4a1 1 0 1 1 1.414-1.414L12 15.586l6.294-6.293z" fill="currentColor" fill-rule="nonzero"/></svg>', ge.STRING],
            oninit: [null, ge.FUNCTION],
            onwarning: [null, ge.FUNCTION],
            onerror: [null, ge.FUNCTION],
            onactivatefile: [null, ge.FUNCTION],
            oninitfile: [null, ge.FUNCTION],
            onaddfilestart: [null, ge.FUNCTION],
            onaddfileprogress: [null, ge.FUNCTION],
            onaddfile: [null, ge.FUNCTION],
            onprocessfilestart: [null, ge.FUNCTION],
            onprocessfileprogress: [null, ge.FUNCTION],
            onprocessfileabort: [null, ge.FUNCTION],
            onprocessfilerevert: [null, ge.FUNCTION],
            onprocessfile: [null, ge.FUNCTION],
            onprocessfiles: [null, ge.FUNCTION],
            onremovefile: [null, ge.FUNCTION],
            onpreparefile: [null, ge.FUNCTION],
            onupdatefiles: [null, ge.FUNCTION],
            onreorderfiles: [null, ge.FUNCTION],
            beforeDropFile: [null, ge.FUNCTION],
            beforeAddFile: [null, ge.FUNCTION],
            beforeRemoveFile: [null, ge.FUNCTION],
            beforePrepareFile: [null, ge.FUNCTION],
            stylePanelLayout: [null, ge.STRING],
            stylePanelAspectRatio: [null, ge.STRING],
            styleItemPanelAspectRatio: [null, ge.STRING],
            styleButtonRemoveItemPosition: ["left", ge.STRING],
            styleButtonProcessItemPosition: ["right", ge.STRING],
            styleLoadIndicatorPosition: ["right", ge.STRING],
            styleProgressIndicatorPosition: ["right", ge.STRING],
            styleButtonRemoveItemAlign: [!1, ge.BOOLEAN],
            files: [[], ge.ARRAY],
            credits: [["https://pqina.nl/", "Powered by PQINA"], ge.ARRAY]
        }, Le = function (e, t) {
            return M(t) ? e[0] || null : V(t) ? e[t] || null : ("object" == typeof t && (t = t.id), e.find(function (e) {
                return e.id === t
            }) || null)
        }, be = function (e) {
            if (M(e)) return e;
            if (/:/.test(e)) {
                var t = e.split(":");
                return t[1] / t[0]
            }
            return parseFloat(e)
        }, Pe = function (e) {
            return e.filter(function (e) {
                return !e.archived
            })
        }, Me = {EMPTY: 0, IDLE: 1, ERROR: 2, BUSY: 3, READY: 4}, we = null,
        Ce = [Ie.LOAD_ERROR, Ie.PROCESSING_ERROR, Ie.PROCESSING_REVERT_ERROR],
        Ne = [Ie.LOADING, Ie.PROCESSING, Ie.PROCESSING_QUEUED, Ie.INIT], Ge = [Ie.PROCESSING_COMPLETE],
        Ue = function (e) {
            return Ce.includes(e.status)
        }, Be = function (e) {
            return Ne.includes(e.status)
        }, Fe = function (e) {
            return Ge.includes(e.status)
        }, qe = function (e) {
            return H(e.options.server) && (H(e.options.server.process) || Y(e.options.server.process))
        }, Ve = function (e) {
            return {
                GET_STATUS: function () {
                    var t = Pe(e.items), n = Me.EMPTY, r = Me.ERROR, o = Me.BUSY, i = Me.IDLE, a = Me.READY;
                    return 0 === t.length ? n : t.some(Ue) ? r : t.some(Be) ? o : t.some(Fe) ? a : i
                }, GET_ITEM: function (t) {
                    return Le(e.items, t)
                }, GET_ACTIVE_ITEM: function (t) {
                    return Le(Pe(e.items), t)
                }, GET_ACTIVE_ITEMS: function () {
                    return Pe(e.items)
                }, GET_ITEMS: function () {
                    return e.items
                }, GET_ITEM_NAME: function (t) {
                    var n = Le(e.items, t);
                    return n ? n.filename : null
                }, GET_ITEM_SIZE: function (t) {
                    var n = Le(e.items, t);
                    return n ? n.fileSize : null
                }, GET_STYLES: function () {
                    return Object.keys(e.options).filter(function (e) {
                        return /^style/.test(e)
                    }).map(function (t) {
                        return {name: t, value: e.options[t]}
                    })
                }, GET_PANEL_ASPECT_RATIO: function () {
                    return /circle/.test(e.options.stylePanelLayout) ? 1 : be(e.options.stylePanelAspectRatio)
                }, GET_ITEM_PANEL_ASPECT_RATIO: function () {
                    return e.options.styleItemPanelAspectRatio
                }, GET_ITEMS_BY_STATUS: function (t) {
                    return Pe(e.items).filter(function (e) {
                        return e.status === t
                    })
                }, GET_TOTAL_ITEMS: function () {
                    return Pe(e.items).length
                }, SHOULD_UPDATE_FILE_INPUT: function () {
                    return e.options.storeAsFile && function () {
                        if (null === we) try {
                            var e = new DataTransfer;
                            e.items.add(new File(["hello world"], "This_Works.txt"));
                            var t = document.createElement("input");
                            t.setAttribute("type", "file"), t.files = e.files, we = 1 === t.files.length
                        } catch (e) {
                            we = !1
                        }
                        return we
                    }() && !qe(e)
                }, IS_ASYNC: function () {
                    return qe(e)
                }, GET_FILE_SIZE_LABELS: function (e) {
                    return {
                        labelBytes: e("GET_LABEL_FILE_SIZE_BYTES") || void 0,
                        labelKilobytes: e("GET_LABEL_FILE_SIZE_KILOBYTES") || void 0,
                        labelMegabytes: e("GET_LABEL_FILE_SIZE_MEGABYTES") || void 0,
                        labelGigabytes: e("GET_LABEL_FILE_SIZE_GIGABYTES") || void 0
                    }
                }
            }
        }, xe = function (e, t, n) {
            return Math.max(Math.min(n, e), t)
        }, Ye = function (e) {
            return /^\s*data:([a-z]+\/[a-z0-9-+.]+(;[a-z-]+=[a-z0-9-]+)?)?(;base64)?,([a-z0-9!$&',()*+;=\-._~:@\/?%\s]*)\s*$/i.test(e)
        }, ke = function (e) {
            return e.split("/").pop().split("?").shift()
        }, je = function (e) {
            return e.split(".").pop()
        }, He = function (e) {
            var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : "";
            return (t + e).slice(-t.length)
        }, Xe = function () {
            var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : new Date;
            return e.getFullYear() + "-" + He(e.getMonth() + 1, "00") + "-" + He(e.getDate(), "00") + "_" + He(e.getHours(), "00") + "-" + He(e.getMinutes(), "00") + "-" + He(e.getSeconds(), "00")
        }, We = function (e, t) {
            var n = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : null,
                r = arguments.length > 3 && void 0 !== arguments[3] ? arguments[3] : null,
                o = "string" == typeof n ? e.slice(0, e.size, n) : e.slice(0, e.size, e.type);
            return o.lastModifiedDate = new Date, e._relativePath && (o._relativePath = e._relativePath), U(t) || (t = Xe()), t && null === r && je(t) ? o.name = t : (r = r || function (e) {
                if ("string" != typeof e) return "";
                var t = e.split("/").pop();
                return /svg/.test(t) ? "svg" : /zip|compressed/.test(t) ? "zip" : /plain/.test(t) ? "txt" : /msword/.test(t) ? "doc" : /[a-z]+/.test(t) ? "jpeg" === t ? "jpg" : t : ""
            }(o.type), o.name = t + (r ? "." + r : "")), o
        }, ze = function (e, t) {
            var n = window.BlobBuilder = window.BlobBuilder || window.WebKitBlobBuilder || window.MozBlobBuilder || window.MSBlobBuilder;
            if (n) {
                var r = new n;
                return r.append(e), r.getBlob(t)
            }
            return new Blob([e], {type: t})
        }, Qe = function (e) {
            return (/^data:(.+);/.exec(e) || [])[1] || null
        }, Ze = function (e) {
            var t = Qe(e);
            return function (e, t) {
                for (var n = new ArrayBuffer(e.length), r = new Uint8Array(n), o = 0; o < e.length; o++) r[o] = e.charCodeAt(o);
                return ze(n, t)
            }(function (e) {
                return atob(function (e) {
                    return e.split(",")[1].replace(/\s/g, "")
                }(e))
            }(e), t)
        }, Ke = function (e) {
            if (!/^content-disposition:/i.test(e)) return null;
            var t = e.split(/filename=|filename\*=.+''/).splice(1).map(function (e) {
                return e.trim().replace(/^["']|[;"']{0,2}$/g, "")
            }).filter(function (e) {
                return e.length
            });
            return t.length ? decodeURI(t[t.length - 1]) : null
        }, $e = function (e) {
            if (/content-length:/i.test(e)) {
                var t = e.match(/[0-9]+/)[0];
                return t ? parseInt(t, 10) : null
            }
            return null
        }, Je = function (e) {
            return /x-content-transfer-id:/i.test(e) && (e.split(":")[1] || "").trim() || null
        }, et = function (e) {
            var t = {source: null, name: null, size: null}, n = e.split("\n"), r = !0, o = !1, i = void 0;
            try {
                for (var a, s = n[Symbol.iterator](); !(r = (a = s.next()).done); r = !0) {
                    var u = a.value, l = Ke(u);
                    if (l) t.name = l; else {
                        var c = $e(u);
                        if (c) t.size = c; else {
                            var f = Je(u);
                            f && (t.source = f)
                        }
                    }
                }
            } catch (e) {
                o = !0, i = e
            } finally {
                try {
                    r || null == s.return || s.return()
                } finally {
                    if (o) throw i
                }
            }
            return t
        }, tt = function (e) {
            var t = {source: null, complete: !1, progress: 0, size: null, timestamp: null, duration: 0, request: null},
                n = function (n) {
                    e ? (t.timestamp = Date.now(), t.request = e(n, function (e) {
                        t.duration = Date.now() - t.timestamp, t.complete = !0, e instanceof Blob && (e = We(e, e.name || ke(n))), r.fire("load", e instanceof Blob ? e : e ? e.body : null)
                    }, function (e) {
                        r.fire("error", "string" == typeof e ? {type: "error", code: 0, body: e} : e)
                    }, function (e, n, o) {
                        o && (t.size = o), t.duration = Date.now() - t.timestamp, e ? (t.progress = n / o, r.fire("progress", t.progress)) : t.progress = null
                    }, function () {
                        r.fire("abort")
                    }, function (e) {
                        var n = et("string" == typeof e ? e : e.headers);
                        r.fire("meta", {size: t.size || n.size, filename: n.name, source: n.source})
                    })) : r.fire("error", {type: "error", body: "Can't load URL", code: 400})
                }, r = Object.assign({}, pe(), {
                    setSource: function (e) {
                        return t.source = e
                    }, getProgress: function () {
                        return t.progress
                    }, abort: function () {
                        t.request && t.request.abort && t.request.abort()
                    }, load: function () {
                        var e, o, i = t.source;
                        r.fire("init", i), i instanceof File ? r.fire("load", i) : i instanceof Blob ? r.fire("load", We(i, i.name)) : Ye(i) ? r.fire("load", We(Ze(i), e, null, o)) : n(i)
                    }
                });
            return r
        }, nt = function (e) {
            return /GET|HEAD/.test(e)
        }, rt = function (e, t, n) {
            var r = {
                onheaders: function () {
                }, onprogress: function () {
                }, onload: function () {
                }, ontimeout: function () {
                }, onerror: function () {
                }, onabort: function () {
                }, abort: function () {
                    o = !0, a.abort()
                }
            }, o = !1, i = !1;
            n = Object.assign({
                method: "POST",
                headers: {},
                withCredentials: !1
            }, n), t = encodeURI(t), nt(n.method) && e && (t = "" + t + encodeURIComponent("string" == typeof e ? e : JSON.stringify(e)));
            var a = new XMLHttpRequest;
            return (nt(n.method) ? a : a.upload).onprogress = function (e) {
                o || r.onprogress(e.lengthComputable, e.loaded, e.total)
            }, a.onreadystatechange = function () {
                a.readyState < 2 || 4 === a.readyState && 0 === a.status || i || (i = !0, r.onheaders(a))
            }, a.onload = function () {
                a.status >= 200 && a.status < 300 ? r.onload(a) : r.onerror(a)
            }, a.onerror = function () {
                return r.onerror(a)
            }, a.onabort = function () {
                o = !0, r.onabort()
            }, a.ontimeout = function () {
                return r.ontimeout(a)
            }, a.open(n.method, t, !0), V(n.timeout) && (a.timeout = n.timeout), Object.keys(n.headers).forEach(function (e) {
                var t = unescape(encodeURIComponent(n.headers[e]));
                a.setRequestHeader(e, t)
            }), n.responseType && (a.responseType = n.responseType), n.withCredentials && (a.withCredentials = !0), a.send(e), r
        }, ot = function (e, t, n, r) {
            return {type: e, code: t, body: n, headers: r}
        }, it = function (e) {
            return function (t) {
                e(ot("error", 0, "Timeout", t.getAllResponseHeaders()))
            }
        }, at = function (e) {
            return /\?/.test(e)
        }, st = function () {
            for (var e = "", t = arguments.length, n = new Array(t), r = 0; r < t; r++) n[r] = arguments[r];
            return n.forEach(function (t) {
                e += at(e) && at(t) ? t.replace(/\?/, "&") : t
            }), e
        }, ut = function () {
            var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : "",
                t = arguments.length > 1 ? arguments[1] : void 0;
            if ("function" == typeof t) return t;
            if (!t || !U(t.url)) return null;
            var n = t.onload || function (e) {
                return e
            }, r = t.onerror || function (e) {
                return null
            };
            return function (o, i, a, s, u, l) {
                var c = rt(o, st(e, t.url), Object.assign({}, t, {responseType: "blob"}));
                return c.onload = function (e) {
                    var r = e.getAllResponseHeaders(), a = et(r).name || ke(o);
                    i(ot("load", e.status, "HEAD" === t.method ? null : We(n(e.response), a), r))
                }, c.onerror = function (e) {
                    a(ot("error", e.status, r(e.response) || e.statusText, e.getAllResponseHeaders()))
                }, c.onheaders = function (e) {
                    l(ot("headers", e.status, null, e.getAllResponseHeaders()))
                }, c.ontimeout = it(a), c.onprogress = s, c.onabort = u, c
            }
        }, lt = 0, ct = 1, ft = 2, dt = 3, pt = 4, Et = function (e, t, n, r, o, i, a, s, u, l, c) {
            for (var f = [], d = c.chunkTransferId, p = c.chunkServer, E = c.chunkSize, _ = c.chunkRetryDelays, T = {
                serverId: d,
                aborted: !1
            }, I = t.ondata || function (e) {
                return e
            }, v = t.onload || function (e, t) {
                return "HEAD" === t ? e.getResponseHeader("Upload-Offset") : e.response
            }, m = t.onerror || function (e) {
                return null
            }, h = Math.floor(r.size / E), g = 0; g <= h; g++) {
                var R = g * E, O = r.slice(R, R + E, "application/offset+octet-stream");
                f[g] = {
                    index: g,
                    size: O.size,
                    offset: R,
                    data: O,
                    file: r,
                    progress: 0,
                    retries: ue(_),
                    status: lt,
                    error: null,
                    request: null,
                    timeout: null
                }
            }
            var y, D, S, A, L = function (e) {
                return e.status === lt || e.status === dt
            }, b = function (t) {
                if (!T.aborted) if (t = t || f.find(L)) {
                    t.status = ft, t.progress = null;
                    var n = p.ondata || function (e) {
                            return e
                        }, o = p.onerror || function (e) {
                            return null
                        }, s = st(e, p.url, T.serverId),
                        l = "function" == typeof p.headers ? p.headers(t) : Object.assign({}, p.headers, {
                            "Content-Type": "application/offset+octet-stream",
                            "Upload-Offset": t.offset,
                            "Upload-Length": r.size,
                            "Upload-Name": r.name
                        }), c = t.request = rt(n(t.data), s, Object.assign({}, p, {headers: l}));
                    c.onload = function () {
                        t.status = ct, t.request = null, w()
                    }, c.onprogress = function (e, n, r) {
                        t.progress = e ? n : null, M()
                    }, c.onerror = function (e) {
                        t.status = dt, t.request = null, t.error = o(e.response) || e.statusText, P(t) || a(ot("error", e.status, o(e.response) || e.statusText, e.getAllResponseHeaders()))
                    }, c.ontimeout = function (e) {
                        t.status = dt, t.request = null, P(t) || it(a)(e)
                    }, c.onabort = function () {
                        t.status = lt, t.request = null, u()
                    }
                } else f.every(function (e) {
                    return e.status === ct
                }) && i(T.serverId)
            }, P = function (e) {
                return 0 !== e.retries.length && (e.status = pt, clearTimeout(e.timeout), e.timeout = setTimeout(function () {
                    b(e)
                }, e.retries.shift()), !0)
            }, M = function () {
                var e = f.reduce(function (e, t) {
                    return null === e || null === t.progress ? null : e + t.progress
                }, 0);
                if (null === e) return s(!1, 0, 0);
                var t = f.reduce(function (e, t) {
                    return e + t.size
                }, 0);
                s(!0, e, t)
            }, w = function () {
                f.filter(function (e) {
                    return e.status === ft
                }).length >= 1 || b()
            };
            return T.serverId ? (y = function (e) {
                T.aborted || (f.filter(function (t) {
                    return t.offset < e
                }).forEach(function (e) {
                    e.status = ct, e.progress = e.size
                }), w())
            }, D = st(e, p.url, T.serverId), S = {
                headers: "function" == typeof t.headers ? t.headers(T.serverId) : Object.assign({}, t.headers),
                method: "HEAD"
            }, (A = rt(null, D, S)).onload = function (e) {
                return y(v(e, S.method))
            }, A.onerror = function (e) {
                return a(ot("error", e.status, m(e.response) || e.statusText, e.getAllResponseHeaders()))
            }, A.ontimeout = it(a)) : function (i) {
                var s = new FormData;
                H(o) && s.append(n, JSON.stringify(o));
                var u = "function" == typeof t.headers ? t.headers(r, o) : Object.assign({}, t.headers, {"Upload-Length": r.size}),
                    l = Object.assign({}, t, {headers: u}), c = rt(I(s), st(e, t.url), l);
                c.onload = function (e) {
                    return i(v(e, l.method))
                }, c.onerror = function (e) {
                    return a(ot("error", e.status, m(e.response) || e.statusText, e.getAllResponseHeaders()))
                }, c.ontimeout = it(a)
            }(function (e) {
                T.aborted || (l(e), T.serverId = e, w())
            }), {
                abort: function () {
                    T.aborted = !0, f.forEach(function (e) {
                        clearTimeout(e.timeout), e.request && e.request.abort()
                    })
                }
            }
        }, _t = function () {
            var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : "",
                t = arguments.length > 1 ? arguments[1] : void 0, n = arguments.length > 2 ? arguments[2] : void 0,
                r = arguments.length > 3 ? arguments[3] : void 0;
            return "function" == typeof t ? function () {
                for (var e = arguments.length, o = new Array(e), i = 0; i < e; i++) o[i] = arguments[i];
                return t.apply(void 0, [n].concat(o, [r]))
            } : t && U(t.url) ? function (e, t, n, r) {
                return function (o, i, a, s, u, l, c) {
                    if (o) {
                        var f = r.chunkUploads, d = f && o.size > r.chunkSize, p = f && (d || r.chunkForce);
                        if (o instanceof Blob && p) return Et(e, t, n, o, i, a, s, u, l, c, r);
                        var E = t.ondata || function (e) {
                                return e
                            }, _ = t.onload || function (e) {
                                return e
                            }, T = t.onerror || function (e) {
                                return null
                            }, I = "function" == typeof t.headers ? t.headers(o, i) || {} : Object.assign({}, t.headers),
                            v = Object.assign({}, t, {headers: I}), m = new FormData;
                        H(i) && m.append(n, JSON.stringify(i)), (o instanceof Blob ? [{
                            name: null,
                            file: o
                        }] : o).forEach(function (e) {
                            m.append(n, e.file, null === e.name ? e.file.name : "" + e.name + e.file.name)
                        });
                        var h = rt(E(m), st(e, t.url), v);
                        return h.onload = function (e) {
                            a(ot("load", e.status, _(e.response), e.getAllResponseHeaders()))
                        }, h.onerror = function (e) {
                            s(ot("error", e.status, T(e.response) || e.statusText, e.getAllResponseHeaders()))
                        }, h.ontimeout = it(s), h.onprogress = u, h.onabort = l, h
                    }
                }
            }(e, t, n, r) : null
        }, Tt = function () {
            var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : "",
                t = arguments.length > 1 ? arguments[1] : void 0;
            if ("function" == typeof t) return t;
            if (!t || !U(t.url)) return function (e, t) {
                return t()
            };
            var n = t.onload || function (e) {
                return e
            }, r = t.onerror || function (e) {
                return null
            };
            return function (o, i, a) {
                var s = rt(o, e + t.url, t);
                return s.onload = function (e) {
                    i(ot("load", e.status, n(e.response), e.getAllResponseHeaders()))
                }, s.onerror = function (e) {
                    a(ot("error", e.status, r(e.response) || e.statusText, e.getAllResponseHeaders()))
                }, s.ontimeout = it(a), s
            }
        }, It = function () {
            var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : 0,
                t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : 1;
            return e + Math.random() * (t - e)
        }, vt = function (e, t) {
            var n = {
                complete: !1,
                perceivedProgress: 0,
                perceivedPerformanceUpdater: null,
                progress: null,
                timestamp: null,
                perceivedDuration: 0,
                duration: 0,
                request: null,
                response: null
            }, r = t.allowMinimumUploadDuration, o = function () {
                n.request && (n.perceivedPerformanceUpdater.clear(), n.request.abort && n.request.abort(), n.complete = !0)
            }, i = r ? function () {
                return n.progress ? Math.min(n.progress, n.perceivedProgress) : null
            } : function () {
                return n.progress || null
            }, a = r ? function () {
                return Math.min(n.duration, n.perceivedDuration)
            } : function () {
                return n.duration
            }, s = Object.assign({}, pe(), {
                process: function (t, o) {
                    var i = function () {
                        0 !== n.duration && null !== n.progress && s.fire("progress", s.getProgress())
                    }, a = function () {
                        n.complete = !0, s.fire("load-perceived", n.response.body)
                    };
                    s.fire("start"), n.timestamp = Date.now(), n.perceivedPerformanceUpdater = function (e) {
                        var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : 1e3,
                            n = (arguments.length > 2 && void 0 !== arguments[2] && arguments[2], arguments.length > 3 && void 0 !== arguments[3] ? arguments[3] : 25),
                            r = arguments.length > 4 && void 0 !== arguments[4] ? arguments[4] : 250, o = null,
                            i = Date.now();
                        return t > 0 && function a() {
                            var s = Date.now() - i, u = It(n, r);
                            s + u > t && (u = s + u - t);
                            var l = s / t;
                            l >= 1 || document.hidden ? e(1) : (e(l), o = setTimeout(a, u))
                        }(), {
                            clear: function () {
                                clearTimeout(o)
                            }
                        }
                    }(function (e) {
                        n.perceivedProgress = e, n.perceivedDuration = Date.now() - n.timestamp, i(), n.response && 1 === n.perceivedProgress && !n.complete && a()
                    }, r ? It(750, 1500) : 0), n.request = e(t, o, function (e) {
                        n.response = H(e) ? e : {
                            type: "load",
                            code: 200,
                            body: "" + e,
                            headers: {}
                        }, n.duration = Date.now() - n.timestamp, n.progress = 1, s.fire("load", n.response.body), (!r || r && 1 === n.perceivedProgress) && a()
                    }, function (e) {
                        n.perceivedPerformanceUpdater.clear(), s.fire("error", H(e) ? e : {
                            type: "error",
                            code: 0,
                            body: "" + e
                        })
                    }, function (e, t, r) {
                        n.duration = Date.now() - n.timestamp, n.progress = e ? t / r : null, i()
                    }, function () {
                        n.perceivedPerformanceUpdater.clear(), s.fire("abort", n.response ? n.response.body : null)
                    }, function (e) {
                        s.fire("transfer", e)
                    })
                }, abort: o, getProgress: i, getDuration: a, reset: function () {
                    o(), n.complete = !1, n.perceivedProgress = 0, n.progress = 0, n.timestamp = null, n.perceivedDuration = 0, n.duration = 0, n.request = null, n.response = null
                }
            });
            return s
        }, mt = function (e) {
            return e.substring(0, e.lastIndexOf(".")) || e
        }, ht = function (e) {
            return !!(e instanceof File || e instanceof Blob && e.name)
        }, gt = function () {
            var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : null,
                t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : null,
                r = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : null, o = oe(), i = {
                    archived: !1,
                    frozen: !1,
                    released: !1,
                    source: null,
                    file: r,
                    serverFileReference: t,
                    transferId: null,
                    processingAborted: !1,
                    status: t ? Ie.PROCESSING_COMPLETE : Ie.INIT,
                    activeLoader: null,
                    activeProcessor: null
                }, a = null, s = {}, u = function (e) {
                    return i.status = e
                }, l = function (e) {
                    if (!i.released && !i.frozen) {
                        for (var t = arguments.length, n = new Array(t > 1 ? t - 1 : 0), r = 1; r < t; r++) n[r - 1] = arguments[r];
                        f.fire.apply(f, [e].concat(n))
                    }
                }, c = function (e, t, n) {
                    var r = e.split("."), o = r[0], i = r.pop(), a = s;
                    r.forEach(function (e) {
                        return a = a[e]
                    }), JSON.stringify(a[i]) !== JSON.stringify(t) && (a[i] = t, l("metadata-update", {
                        key: o,
                        value: s[o],
                        silent: n
                    }))
                }, f = Object.assign({
                    id: {
                        get: function () {
                            return o
                        }
                    }, origin: {
                        get: function () {
                            return e
                        }, set: function (t) {
                            return e = t
                        }
                    }, serverId: {
                        get: function () {
                            return i.serverFileReference
                        }
                    }, transferId: {
                        get: function () {
                            return i.transferId
                        }
                    }, status: {
                        get: function () {
                            return i.status
                        }
                    }, filename: {
                        get: function () {
                            return i.file.name
                        }
                    }, filenameWithoutExtension: {
                        get: function () {
                            return mt(i.file.name)
                        }
                    }, fileExtension: {
                        get: function () {
                            return je(i.file.name)
                        }
                    }, fileType: {
                        get: function () {
                            return i.file.type
                        }
                    }, fileSize: {
                        get: function () {
                            return i.file.size
                        }
                    }, file: {
                        get: function () {
                            return i.file
                        }
                    }, relativePath: {
                        get: function () {
                            return i.file._relativePath
                        }
                    }, source: {
                        get: function () {
                            return i.source
                        }
                    }, getMetadata: function (e) {
                        return function e(t) {
                            if (!H(t)) return t;
                            var n = P(t) ? [] : {};
                            for (var r in t) if (t.hasOwnProperty(r)) {
                                var o = t[r];
                                n[r] = o && H(o) ? e(o) : o
                            }
                            return n
                        }(e ? s[e] : s)
                    }, setMetadata: function (e, t, n) {
                        if (H(e)) {
                            var r = e;
                            return Object.keys(r).forEach(function (e) {
                                c(e, r[e], t)
                            }), e
                        }
                        return c(e, t, n), t
                    }, extend: function (e, t) {
                        return d[e] = t
                    }, abortLoad: function () {
                        i.activeLoader ? i.activeLoader.abort() : (u(Ie.INIT), l("load-abort"))
                    }, retryLoad: function () {
                        i.activeLoader && i.activeLoader.load()
                    }, requestProcessing: function () {
                        i.processingAborted = !1, u(Ie.PROCESSING_QUEUED)
                    }, abortProcessing: function () {
                        return new Promise(function (e) {
                            if (!i.activeProcessor) return i.processingAborted = !0, u(Ie.IDLE), l("process-abort"), void e();
                            a = function () {
                                e()
                            }, i.activeProcessor.abort()
                        })
                    }, load: function (t, n, r) {
                        i.source = t, f.fireSync("init"), i.file ? f.fireSync("load-skip") : (i.file = function (e) {
                            var t = [e.name, e.size, e.type];
                            return e instanceof Blob || Ye(e) ? t[0] = e.name || Xe() : Ye(e) ? (t[1] = e.length, t[2] = Qe(e)) : U(e) && (t[0] = ke(e), t[1] = 0, t[2] = "application/octet-stream"), {
                                name: t[0],
                                size: t[1],
                                type: t[2]
                            }
                        }(t), n.on("init", function () {
                            l("load-init")
                        }), n.on("meta", function (t) {
                            i.file.size = t.size, i.file.filename = t.filename, t.source && (e = ve.LIMBO, i.serverFileReference = t.source, i.status = Ie.PROCESSING_COMPLETE), l("load-meta")
                        }), n.on("progress", function (e) {
                            u(Ie.LOADING), l("load-progress", e)
                        }), n.on("error", function (e) {
                            u(Ie.LOAD_ERROR), l("load-request-error", e)
                        }), n.on("abort", function () {
                            u(Ie.INIT), l("load-abort")
                        }), n.on("load", function (t) {
                            i.activeLoader = null;
                            var n = function (t) {
                                i.file = ht(t) ? t : i.file, e === ve.LIMBO && i.serverFileReference ? u(Ie.PROCESSING_COMPLETE) : u(Ie.IDLE), l("load")
                            };
                            i.serverFileReference ? n(t) : r(t, n, function (e) {
                                i.file = t, l("load-meta"), u(Ie.LOAD_ERROR), l("load-file-error", e)
                            })
                        }), n.setSource(t), i.activeLoader = n, n.load())
                    }, process: function e(t, n) {
                        if (i.processingAborted) i.processingAborted = !1; else if (u(Ie.PROCESSING), a = null, i.file instanceof Blob) {
                            t.on("load", function (e) {
                                i.transferId = null, i.serverFileReference = e
                            }), t.on("transfer", function (e) {
                                i.transferId = e
                            }), t.on("load-perceived", function (e) {
                                i.activeProcessor = null, i.transferId = null, i.serverFileReference = e, u(Ie.PROCESSING_COMPLETE), l("process-complete", e)
                            }), t.on("start", function () {
                                l("process-start")
                            }), t.on("error", function (e) {
                                i.activeProcessor = null, u(Ie.PROCESSING_ERROR), l("process-error", e)
                            }), t.on("abort", function (e) {
                                i.activeProcessor = null, i.serverFileReference = e, u(Ie.IDLE), l("process-abort"), a && a()
                            }), t.on("progress", function (e) {
                                l("process-progress", e)
                            });
                            var r = console.error;
                            n(i.file, function (e) {
                                i.archived || t.process(e, Object.assign({}, s))
                            }, r), i.activeProcessor = t
                        } else f.on("load", function () {
                            e(t, n)
                        })
                    }, revert: function (e, t) {
                        return new Promise(function (n, r) {
                            var o = null !== i.serverFileReference ? i.serverFileReference : i.transferId;
                            null !== o ? (e(o, function () {
                                i.serverFileReference = null, i.transferId = null, n()
                            }, function (e) {
                                t ? (u(Ie.PROCESSING_REVERT_ERROR), l("process-revert-error"), r(e)) : n()
                            }), u(Ie.IDLE), l("process-revert")) : n()
                        })
                    }
                }, pe(), {
                    freeze: function () {
                        return i.frozen = !0
                    }, release: function () {
                        return i.released = !0
                    }, released: {
                        get: function () {
                            return i.released
                        }
                    }, archive: function () {
                        return i.archived = !0
                    }, archived: {
                        get: function () {
                            return i.archived
                        }
                    }
                }), d = n(f);
            return d
        }, Rt = function (e, t) {
            var n = function (e, t) {
                return M(t) ? 0 : U(t) ? e.findIndex(function (e) {
                    return e.id === t
                }) : -1
            }(e, t);
            if (!(n < 0)) return e[n] || null
        }, Ot = function (e, t, n, r, o, i) {
            var a = rt(null, e, {method: "GET", responseType: "blob"});
            return a.onload = function (n) {
                var r = n.getAllResponseHeaders(), o = et(r).name || ke(e);
                t(ot("load", n.status, We(n.response, o), r))
            }, a.onerror = function (e) {
                n(ot("error", e.status, e.statusText, e.getAllResponseHeaders()))
            }, a.onheaders = function (e) {
                i(ot("headers", e.status, null, e.getAllResponseHeaders()))
            }, a.ontimeout = it(n), a.onprogress = r, a.onabort = o, a
        }, yt = function (e) {
            return 0 === e.indexOf("//") && (e = location.protocol + e), e.toLowerCase().replace("blob:", "").replace(/([a-z])?:\/\//, "$1").split("/")[0]
        }, Dt = function (e) {
            return function () {
                return Y(e) ? e.apply(void 0, arguments) : e
            }
        }, St = function (e, t) {
            clearTimeout(t.listUpdateTimeout), t.listUpdateTimeout = setTimeout(function () {
                e("DID_UPDATE_ITEMS", {items: Pe(t.items)})
            }, 0)
        }, At = function (e) {
            for (var t = arguments.length, n = new Array(t > 1 ? t - 1 : 0), r = 1; r < t; r++) n[r - 1] = arguments[r];
            return new Promise(function (t) {
                if (!e) return t(!0);
                var r = e.apply(void 0, n);
                return null == r ? t(!0) : "boolean" == typeof r ? t(r) : void ("function" == typeof r.then && r.then(t))
            })
        }, Lt = function (e, t) {
            e.items.sort(function (e, n) {
                return t(Te(e), Te(n))
            })
        }, bt = function (e, t) {
            return function () {
                var n = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {}, r = n.query, o = n.success,
                    i = void 0 === o ? function () {
                    } : o, a = n.failure, s = void 0 === a ? function () {
                    } : a, u = se(n, ["query", "success", "failure"]), l = Le(e.items, r);
                l ? t(l, i, s, u || {}) : s({error: ot("error", 0, "Item not found"), file: null})
            }
        }, Pt = function (e, t, n) {
            return {
                ABORT_ALL: function () {
                    Pe(n.items).forEach(function (e) {
                        e.freeze(), e.abortLoad(), e.abortProcessing()
                    })
                }, DID_SET_FILES: function (t) {
                    var r = t.value, o = (void 0 === r ? [] : r).map(function (e) {
                        return {source: e.source ? e.source : e, options: e.options}
                    }), i = Pe(n.items);
                    i.forEach(function (t) {
                        o.find(function (e) {
                            return e.source === t.source || e.source === t.file
                        }) || e("REMOVE_ITEM", {query: t, remove: !1})
                    }), i = Pe(n.items), o.forEach(function (t, n) {
                        i.find(function (e) {
                            return e.source === t.source || e.file === t.source
                        }) || e("ADD_ITEM", Object.assign({}, t, {interactionMethod: re, index: n}))
                    })
                }, DID_UPDATE_ITEM_METADATA: function (r) {
                    var o = r.id, i = r.action, a = r.change;
                    a.silent || (clearTimeout(n.itemUpdateTimeout), n.itemUpdateTimeout = setTimeout(function () {
                        var r = Rt(n.items, o);
                        if (t("IS_ASYNC")) {
                            r.origin === ve.LOCAL && e("DID_LOAD_ITEM", {
                                id: r.id,
                                error: null,
                                serverFileReference: r.source
                            });
                            var s, u = function () {
                                setTimeout(function () {
                                    e("REQUEST_ITEM_PROCESSING", {query: o})
                                }, 32)
                            };
                            return r.status === Ie.PROCESSING_COMPLETE ? (s = n.options.instantUpload, void r.revert(Tt(n.options.server.url, n.options.server.revert), t("GET_FORCE_REVERT")).then(s ? u : function () {
                            }).catch(function () {
                            })) : r.status === Ie.PROCESSING ? function (e) {
                                r.abortProcessing().then(e ? u : function () {
                                })
                            }(n.options.instantUpload) : void (n.options.instantUpload && u())
                        }
                        Oe("SHOULD_PREPARE_OUTPUT", !1, {item: r, query: t, action: i, change: a}).then(function (n) {
                            var i = t("GET_BEFORE_PREPARE_FILE");
                            i && (n = i(r, n)), n && e("REQUEST_PREPARE_OUTPUT", {
                                query: o, item: r, success: function (t) {
                                    e("DID_PREPARE_OUTPUT", {id: o, file: t})
                                }
                            }, !0)
                        })
                    }, 0))
                }, MOVE_ITEM: function (e) {
                    var t = e.query, r = e.index, o = Le(n.items, t);
                    if (o) {
                        var i = n.items.indexOf(o);
                        i !== (r = xe(r, 0, n.items.length - 1)) && n.items.splice(r, 0, n.items.splice(i, 1)[0])
                    }
                }, SORT: function (r) {
                    var o = r.compare;
                    Lt(n, o), e("DID_SORT_ITEMS", {items: t("GET_ACTIVE_ITEMS")})
                }, ADD_ITEMS: function (n) {
                    var r = n.items, o = n.index, i = n.interactionMethod, a = n.success, s = void 0 === a ? function () {
                    } : a, u = n.failure, l = void 0 === u ? function () {
                    } : u, c = o;
                    if (-1 === o || void 0 === o) {
                        var f = t("GET_ITEM_INSERT_LOCATION"), d = t("GET_TOTAL_ITEMS");
                        c = "before" === f ? 0 : d
                    }
                    var p = t("GET_IGNORED_FILES"), E = r.filter(function (e) {
                        return ht(e) ? !p.includes(e.name.toLowerCase()) : !M(e)
                    }).map(function (t) {
                        return new Promise(function (n, r) {
                            e("ADD_ITEM", {
                                interactionMethod: i,
                                source: t.source || t,
                                success: n,
                                failure: r,
                                index: c++,
                                options: t.options || {}
                            })
                        })
                    });
                    Promise.all(E).then(s).catch(l)
                }, ADD_ITEM: function (r) {
                    var o = r.source, i = r.index, a = void 0 === i ? -1 : i, s = r.interactionMethod, u = r.success,
                        l = void 0 === u ? function () {
                        } : u, c = r.failure, f = void 0 === c ? function () {
                        } : c, d = r.options, p = void 0 === d ? {} : d;
                    if (M(o)) f({
                        error: ot("error", 0, "No source"),
                        file: null
                    }); else if (!ht(o) || !n.options.ignoredFiles.includes(o.name.toLowerCase())) {
                        if (!function (e) {
                            var t = Pe(e.items).length;
                            if (!e.options.allowMultiple) return 0 === t;
                            var n = e.options.maxFiles;
                            return null === n || t < n
                        }(n)) {
                            if (n.options.allowMultiple || !n.options.allowMultiple && !n.options.allowReplace) {
                                var E = ot("warning", 0, "Max files");
                                return e("DID_THROW_MAX_FILES", {source: o, error: E}), void f({error: E, file: null})
                            }
                            var _ = Pe(n.items)[0];
                            if (_.status === Ie.PROCESSING_COMPLETE || _.status === Ie.PROCESSING_REVERT_ERROR) {
                                var T = t("GET_FORCE_REVERT");
                                if (_.revert(Tt(n.options.server.url, n.options.server.revert), T).then(function () {
                                    T && e("ADD_ITEM", {
                                        source: o,
                                        index: a,
                                        interactionMethod: s,
                                        success: l,
                                        failure: f,
                                        options: p
                                    })
                                }).catch(function () {
                                }), T) return
                            }
                            e("REMOVE_ITEM", {query: _.id})
                        }
                        var I = "local" === p.type ? ve.LOCAL : "limbo" === p.type ? ve.LIMBO : ve.INPUT,
                            v = gt(I, I === ve.INPUT ? null : o, p.file);
                        Object.keys(p.metadata || {}).forEach(function (e) {
                            v.setMetadata(e, p.metadata[e])
                        }), ye("DID_CREATE_ITEM", v, {query: t, dispatch: e});
                        var m = t("GET_ITEM_INSERT_LOCATION");
                        n.options.itemInsertLocationFreedom || (a = "before" === m ? -1 : n.items.length), function (e, t, n) {
                            M(t) || (void 0 === n ? e.push(t) : function (e, t, n) {
                                e.splice(t, 0, n)
                            }(e, n = xe(n, 0, e.length), t))
                        }(n.items, v, a), Y(m) && o && Lt(n, m);
                        var h = v.id;
                        v.on("init", function () {
                            e("DID_INIT_ITEM", {id: h})
                        }), v.on("load-init", function () {
                            e("DID_START_ITEM_LOAD", {id: h})
                        }), v.on("load-meta", function () {
                            e("DID_UPDATE_ITEM_META", {id: h})
                        }), v.on("load-progress", function (t) {
                            e("DID_UPDATE_ITEM_LOAD_PROGRESS", {id: h, progress: t})
                        }), v.on("load-request-error", function (t) {
                            var r = Dt(n.options.labelFileLoadError)(t);
                            if (t.code >= 400 && t.code < 500) return e("DID_THROW_ITEM_INVALID", {
                                id: h,
                                error: t,
                                status: {main: r, sub: t.code + " (" + t.body + ")"}
                            }), void f({error: t, file: Te(v)});
                            e("DID_THROW_ITEM_LOAD_ERROR", {
                                id: h,
                                error: t,
                                status: {main: r, sub: n.options.labelTapToRetry}
                            })
                        }), v.on("load-file-error", function (t) {
                            e("DID_THROW_ITEM_INVALID", {id: h, error: t.status, status: t.status}), f({
                                error: t.status,
                                file: Te(v)
                            })
                        }), v.on("load-abort", function () {
                            e("REMOVE_ITEM", {query: h})
                        }), v.on("load-skip", function () {
                            e("COMPLETE_LOAD_ITEM", {query: h, item: v, data: {source: o, success: l}})
                        }), v.on("load", function () {
                            var r = function (r) {
                                r ? (v.on("metadata-update", function (t) {
                                    e("DID_UPDATE_ITEM_METADATA", {id: h, change: t})
                                }), Oe("SHOULD_PREPARE_OUTPUT", !1, {item: v, query: t}).then(function (r) {
                                    var i = t("GET_BEFORE_PREPARE_FILE");
                                    i && (r = i(v, r));
                                    var a = function () {
                                        e("COMPLETE_LOAD_ITEM", {
                                            query: h,
                                            item: v,
                                            data: {source: o, success: l}
                                        }), St(e, n)
                                    };
                                    r ? e("REQUEST_PREPARE_OUTPUT", {
                                        query: h, item: v, success: function (t) {
                                            e("DID_PREPARE_OUTPUT", {id: h, file: t}), a()
                                        }
                                    }, !0) : a()
                                })) : e("REMOVE_ITEM", {query: h})
                            };
                            Oe("DID_LOAD_ITEM", v, {query: t, dispatch: e}).then(function () {
                                At(t("GET_BEFORE_ADD_FILE"), Te(v)).then(r)
                            }).catch(function (t) {
                                if (!t || !t.error || !t.status) return r(!1);
                                e("DID_THROW_ITEM_INVALID", {id: h, error: t.error, status: t.status})
                            })
                        }), v.on("process-start", function () {
                            e("DID_START_ITEM_PROCESSING", {id: h})
                        }), v.on("process-progress", function (t) {
                            e("DID_UPDATE_ITEM_PROCESS_PROGRESS", {id: h, progress: t})
                        }), v.on("process-error", function (t) {
                            e("DID_THROW_ITEM_PROCESSING_ERROR", {
                                id: h,
                                error: t,
                                status: {main: Dt(n.options.labelFileProcessingError)(t), sub: n.options.labelTapToRetry}
                            })
                        }), v.on("process-revert-error", function (t) {
                            e("DID_THROW_ITEM_PROCESSING_REVERT_ERROR", {
                                id: h,
                                error: t,
                                status: {
                                    main: Dt(n.options.labelFileProcessingRevertError)(t),
                                    sub: n.options.labelTapToRetry
                                }
                            })
                        }), v.on("process-complete", function (t) {
                            e("DID_COMPLETE_ITEM_PROCESSING", {
                                id: h,
                                error: null,
                                serverFileReference: t
                            }), e("DID_DEFINE_VALUE", {id: h, value: t})
                        }), v.on("process-abort", function () {
                            e("DID_ABORT_ITEM_PROCESSING", {id: h})
                        }), v.on("process-revert", function () {
                            e("DID_REVERT_ITEM_PROCESSING", {id: h}), e("DID_DEFINE_VALUE", {id: h, value: null})
                        }), e("DID_ADD_ITEM", {id: h, index: a, interactionMethod: s}), St(e, n);
                        var g = n.options.server || {}, R = g.url, O = g.load, y = g.restore, D = g.fetch;
                        v.load(o, tt(I === ve.INPUT ? U(o) && function (e) {
                            return (e.indexOf(":") > -1 || e.indexOf("//") > -1) && yt(location.href) !== yt(e)
                        }(o) && D ? ut(R, D) : Ot : ut(R, I === ve.LIMBO ? y : O)), function (e, n, r) {
                            Oe("LOAD_FILE", e, {query: t}).then(n).catch(r)
                        })
                    }
                }, REQUEST_PREPARE_OUTPUT: function (e) {
                    var n = e.item, r = e.success, o = e.failure, i = void 0 === o ? function () {
                    } : o, a = {error: ot("error", 0, "Item not found"), file: null};
                    if (n.archived) return i(a);
                    Oe("PREPARE_OUTPUT", n.file, {query: t, item: n}).then(function (e) {
                        Oe("COMPLETE_PREPARE_OUTPUT", e, {query: t, item: n}).then(function (e) {
                            if (n.archived) return i(a);
                            r(e)
                        })
                    })
                }, COMPLETE_LOAD_ITEM: function (r) {
                    var o = r.item, i = r.data, a = i.success, s = i.source, u = t("GET_ITEM_INSERT_LOCATION");
                    if (Y(u) && s && Lt(n, u), e("DID_LOAD_ITEM", {
                        id: o.id,
                        error: null,
                        serverFileReference: o.origin === ve.INPUT ? null : s
                    }), a(Te(o)), o.origin !== ve.LOCAL) return o.origin === ve.LIMBO ? (e("DID_COMPLETE_ITEM_PROCESSING", {
                        id: o.id,
                        error: null,
                        serverFileReference: s
                    }), void e("DID_DEFINE_VALUE", {
                        id: o.id,
                        value: o.serverId || s
                    })) : void (t("IS_ASYNC") && n.options.instantUpload && e("REQUEST_ITEM_PROCESSING", {query: o.id}));
                    e("DID_LOAD_LOCAL_ITEM", {id: o.id})
                }, RETRY_ITEM_LOAD: bt(n, function (e) {
                    e.retryLoad()
                }), REQUEST_ITEM_PREPARE: bt(n, function (t, n, r) {
                    e("REQUEST_PREPARE_OUTPUT", {
                        query: t.id, item: t, success: function (r) {
                            e("DID_PREPARE_OUTPUT", {id: t.id, file: r}), n({file: t, output: r})
                        }, failure: r
                    }, !0)
                }), REQUEST_ITEM_PROCESSING: bt(n, function (r, o, i) {
                    if (r.status === Ie.IDLE || r.status === Ie.PROCESSING_ERROR) r.status !== Ie.PROCESSING_QUEUED && (r.requestProcessing(), e("DID_REQUEST_ITEM_PROCESSING", {id: r.id}), e("PROCESS_ITEM", {
                        query: r,
                        success: o,
                        failure: i
                    }, !0)); else {
                        var a = function () {
                            return e("REQUEST_ITEM_PROCESSING", {query: r, success: o, failure: i})
                        }, s = function () {
                            return document.hidden ? a() : setTimeout(a, 32)
                        };
                        r.status === Ie.PROCESSING_COMPLETE || r.status === Ie.PROCESSING_REVERT_ERROR ? r.revert(Tt(n.options.server.url, n.options.server.revert), t("GET_FORCE_REVERT")).then(s).catch(function () {
                        }) : r.status === Ie.PROCESSING && r.abortProcessing().then(s)
                    }
                }), PROCESS_ITEM: bt(n, function (r, o, i) {
                    var a = t("GET_MAX_PARALLEL_UPLOADS");
                    if (t("GET_ITEMS_BY_STATUS", Ie.PROCESSING).length !== a) {
                        if (r.status !== Ie.PROCESSING) {
                            var s = function t() {
                                var r = n.processingQueue.shift();
                                if (r) {
                                    var o = r.id, i = r.success, a = r.failure, s = Le(n.items, o);
                                    s && !s.archived ? e("PROCESS_ITEM", {query: o, success: i, failure: a}, !0) : t()
                                }
                            };
                            r.onOnce("process-complete", function () {
                                o(Te(r)), s();
                                var i = n.options.server;
                                if (n.options.instantUpload && r.origin === ve.LOCAL && Y(i.remove)) {
                                    var a = function () {
                                    };
                                    r.origin = ve.LIMBO, n.options.server.remove(r.source, a, a)
                                }
                                t("GET_ITEMS_BY_STATUS", Ie.PROCESSING_COMPLETE).length === n.items.length && e("DID_COMPLETE_ITEM_PROCESSING_ALL")
                            }), r.onOnce("process-error", function (e) {
                                i({error: e, file: Te(r)}), s()
                            });
                            var u = n.options;
                            r.process(vt(_t(u.server.url, u.server.process, u.name, {
                                chunkTransferId: r.transferId,
                                chunkServer: u.server.patch,
                                chunkUploads: u.chunkUploads,
                                chunkForce: u.chunkForce,
                                chunkSize: u.chunkSize,
                                chunkRetryDelays: u.chunkRetryDelays
                            }), {allowMinimumUploadDuration: t("GET_ALLOW_MINIMUM_UPLOAD_DURATION")}), function (n, o, i) {
                                Oe("PREPARE_OUTPUT", n, {query: t, item: r}).then(function (t) {
                                    e("DID_PREPARE_OUTPUT", {id: r.id, file: t}), o(t)
                                }).catch(i)
                            })
                        }
                    } else n.processingQueue.push({id: r.id, success: o, failure: i})
                }), RETRY_ITEM_PROCESSING: bt(n, function (t) {
                    e("REQUEST_ITEM_PROCESSING", {query: t})
                }), REQUEST_REMOVE_ITEM: bt(n, function (n) {
                    At(t("GET_BEFORE_REMOVE_FILE"), Te(n)).then(function (t) {
                        t && e("REMOVE_ITEM", {query: n})
                    })
                }), RELEASE_ITEM: bt(n, function (e) {
                    e.release()
                }), REMOVE_ITEM: bt(n, function (r, o, i, a) {
                    var s = function () {
                        var t = r.id;
                        Rt(n.items, t).archive(), e("DID_REMOVE_ITEM", {error: null, id: t, item: r}), St(e, n), o(Te(r))
                    }, u = n.options.server;
                    r.origin === ve.LOCAL && u && Y(u.remove) && !1 !== a.remove ? (e("DID_START_ITEM_REMOVE", {id: r.id}), u.remove(r.source, function () {
                        return s()
                    }, function (t) {
                        e("DID_THROW_ITEM_REMOVE_ERROR", {
                            id: r.id,
                            error: ot("error", 0, t, null),
                            status: {main: Dt(n.options.labelFileRemoveError)(t), sub: n.options.labelTapToRetry}
                        })
                    })) : ((a.revert && r.origin !== ve.LOCAL && null !== r.serverId || n.options.chunkUploads && r.file.size > n.options.chunkSize || n.options.chunkUploads && n.options.chunkForce) && r.revert(Tt(n.options.server.url, n.options.server.revert), t("GET_FORCE_REVERT")), s())
                }), ABORT_ITEM_LOAD: bt(n, function (e) {
                    e.abortLoad()
                }), ABORT_ITEM_PROCESSING: bt(n, function (t) {
                    t.serverId ? e("REVERT_ITEM_PROCESSING", {id: t.id}) : t.abortProcessing().then(function () {
                        n.options.instantUpload && e("REMOVE_ITEM", {query: t.id})
                    })
                }), REQUEST_REVERT_ITEM_PROCESSING: bt(n, function (r) {
                    if (n.options.instantUpload) {
                        var o = function (t) {
                            t && e("REVERT_ITEM_PROCESSING", {query: r})
                        }, i = t("GET_BEFORE_REMOVE_FILE");
                        if (!i) return o(!0);
                        var a = i(Te(r));
                        return null == a ? o(!0) : "boolean" == typeof a ? o(a) : void ("function" == typeof a.then && a.then(o))
                    }
                    e("REVERT_ITEM_PROCESSING", {query: r})
                }), REVERT_ITEM_PROCESSING: bt(n, function (r) {
                    r.revert(Tt(n.options.server.url, n.options.server.revert), t("GET_FORCE_REVERT")).then(function () {
                        (n.options.instantUpload || function (e) {
                            return !ht(e.file)
                        }(r)) && e("REMOVE_ITEM", {query: r.id})
                    }).catch(function () {
                    })
                }), SET_OPTIONS: function (t) {
                    var n = t.options, r = Object.keys(n), o = Mt.filter(function (e) {
                        return r.includes(e)
                    });
                    [].concat(ue(o), ue(Object.keys(n).filter(function (e) {
                        return !o.includes(e)
                    }))).forEach(function (t) {
                        e("SET_" + Z(t, "_").toUpperCase(), {value: n[t]})
                    })
                }
            }
        }, Mt = ["server"], wt = function (e) {
            return e
        }, Ct = function (e) {
            return document.createElement(e)
        }, Nt = function (e, t) {
            var n = e.childNodes[0];
            n ? t !== n.nodeValue && (n.nodeValue = t) : (n = document.createTextNode(t), e.appendChild(n))
        }, Gt = function (e, t, n, r) {
            var o = (r % 360 - 90) * Math.PI / 180;
            return {x: e + n * Math.cos(o), y: t + n * Math.sin(o)}
        }, Ut = function (e, t, n, r, o) {
            var i = 1;
            return o > r && o - r <= .5 && (i = 0), r > o && r - o >= .5 && (i = 0), function (e, t, n, r, o, i) {
                var a = Gt(e, t, n, o), s = Gt(e, t, n, r);
                return ["M", a.x, a.y, "A", n, n, 0, i, 0, s.x, s.y].join(" ")
            }(e, t, n, 360 * Math.min(.9999, r), 360 * Math.min(.9999, o), i)
        }, Bt = S({
            tag: "div",
            name: "progress-indicator",
            ignoreRectUpdate: !0,
            ignoreRect: !0,
            create: function (e) {
                var t = e.root, n = e.props;
                n.spin = !1, n.progress = 0, n.opacity = 0;
                var r = a("svg");
                t.ref.path = a("path", {
                    "stroke-width": 2,
                    "stroke-linecap": "round"
                }), r.appendChild(t.ref.path), t.ref.svg = r, t.appendChild(r)
            },
            write: function (e) {
                var t = e.root, n = e.props;
                if (0 !== n.opacity) {
                    n.align && (t.element.dataset.align = n.align);
                    var o = parseInt(r(t.ref.path, "stroke-width"), 10), i = .5 * t.rect.element.width, a = 0, s = 0;
                    n.spin ? (a = 0, s = .5) : (a = 0, s = n.progress);
                    var u = Ut(i, i, i - o, a, s);
                    r(t.ref.path, "d", u), r(t.ref.path, "stroke-opacity", n.spin || n.progress > 0 ? 1 : 0)
                }
            },
            mixins: {
                apis: ["progress", "spin", "align"],
                styles: ["opacity"],
                animations: {
                    opacity: {type: "tween", duration: 500},
                    progress: {type: "spring", stiffness: .95, damping: .65, mass: 10}
                }
            }
        }), Ft = S({
            tag: "button",
            attributes: {type: "button"},
            ignoreRect: !0,
            ignoreRectUpdate: !0,
            name: "file-action-button",
            mixins: {
                apis: ["label"],
                styles: ["translateX", "translateY", "scaleX", "scaleY", "opacity"],
                animations: {
                    scaleX: "spring",
                    scaleY: "spring",
                    translateX: "spring",
                    translateY: "spring",
                    opacity: {type: "tween", duration: 250}
                },
                listeners: !0
            },
            create: function (e) {
                var t = e.root, n = e.props;
                t.element.innerHTML = (n.icon || "") + "<span>" + n.label + "</span>", n.isDisabled = !1
            },
            write: function (e) {
                var t = e.root, n = e.props, o = n.isDisabled, i = t.query("GET_DISABLED") || 0 === n.opacity;
                i && !o ? (n.isDisabled = !0, r(t.element, "disabled", "disabled")) : !i && o && (n.isDisabled = !1, t.element.removeAttribute("disabled"))
            }
        }), qt = function (e) {
            var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : ".",
                n = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : 1e3,
                r = arguments.length > 3 && void 0 !== arguments[3] ? arguments[3] : {}, o = r.labelBytes,
                i = void 0 === o ? "bytes" : o, a = r.labelKilobytes, s = void 0 === a ? "KB" : a, u = r.labelMegabytes,
                l = void 0 === u ? "MB" : u, c = r.labelGigabytes, f = void 0 === c ? "GB" : c, d = n, p = n * n,
                E = n * n * n;
            return (e = Math.round(Math.abs(e))) < d ? e + " " + i : e < p ? Math.floor(e / d) + " " + s : e < E ? Vt(e / p, 1, t) + " " + l : Vt(e / E, 2, t) + " " + f
        }, Vt = function (e, t, n) {
            return e.toFixed(t).split(".").filter(function (e) {
                return "0" !== e
            }).join(n)
        }, xt = function (e) {
            var t = e.root, n = e.props;
            Nt(t.ref.fileSize, qt(t.query("GET_ITEM_SIZE", n.id), ".", t.query("GET_FILE_SIZE_BASE"), t.query("GET_FILE_SIZE_LABELS", t.query))), Nt(t.ref.fileName, wt(t.query("GET_ITEM_NAME", n.id)))
        }, Yt = function (e) {
            var t = e.root, n = e.props;
            V(t.query("GET_ITEM_SIZE", n.id)) ? xt({
                root: t,
                props: n
            }) : Nt(t.ref.fileSize, t.query("GET_LABEL_FILE_SIZE_NOT_AVAILABLE"))
        }, kt = S({
            name: "file-info",
            ignoreRect: !0,
            ignoreRectUpdate: !0,
            write: A({
                DID_LOAD_ITEM: xt,
                DID_UPDATE_ITEM_META: xt,
                DID_THROW_ITEM_LOAD_ERROR: Yt,
                DID_THROW_ITEM_INVALID: Yt
            }),
            didCreateView: function (e) {
                ye("CREATE_VIEW", Object.assign({}, e, {view: e}))
            },
            create: function (e) {
                var t = e.root, n = e.props, o = Ct("span");
                o.className = "filepond--file-info-main", r(o, "aria-hidden", "true"), t.appendChild(o), t.ref.fileName = o;
                var i = Ct("span");
                i.className = "filepond--file-info-sub", t.appendChild(i), t.ref.fileSize = i, Nt(i, t.query("GET_LABEL_FILE_WAITING_FOR_SIZE")), Nt(o, wt(t.query("GET_ITEM_NAME", n.id)))
            },
            mixins: {styles: ["translateX", "translateY"], animations: {translateX: "spring", translateY: "spring"}}
        }), jt = function (e) {
            return Math.round(100 * e)
        }, Ht = function (e) {
            var t = e.root, n = e.action,
                r = null === n.progress ? t.query("GET_LABEL_FILE_LOADING") : t.query("GET_LABEL_FILE_LOADING") + " " + jt(n.progress) + "%";
            Nt(t.ref.main, r), Nt(t.ref.sub, t.query("GET_LABEL_TAP_TO_CANCEL"))
        }, Xt = function (e) {
            var t = e.root;
            Nt(t.ref.main, ""), Nt(t.ref.sub, "")
        }, Wt = function (e) {
            var t = e.root, n = e.action;
            Nt(t.ref.main, n.status.main), Nt(t.ref.sub, n.status.sub)
        }, zt = S({
            name: "file-status",
            ignoreRect: !0,
            ignoreRectUpdate: !0,
            write: A({
                DID_LOAD_ITEM: Xt,
                DID_REVERT_ITEM_PROCESSING: Xt,
                DID_REQUEST_ITEM_PROCESSING: function (e) {
                    var t = e.root;
                    Nt(t.ref.main, t.query("GET_LABEL_FILE_PROCESSING")), Nt(t.ref.sub, t.query("GET_LABEL_TAP_TO_CANCEL"))
                },
                DID_ABORT_ITEM_PROCESSING: function (e) {
                    var t = e.root;
                    Nt(t.ref.main, t.query("GET_LABEL_FILE_PROCESSING_ABORTED")), Nt(t.ref.sub, t.query("GET_LABEL_TAP_TO_RETRY"))
                },
                DID_COMPLETE_ITEM_PROCESSING: function (e) {
                    var t = e.root;
                    Nt(t.ref.main, t.query("GET_LABEL_FILE_PROCESSING_COMPLETE")), Nt(t.ref.sub, t.query("GET_LABEL_TAP_TO_UNDO"))
                },
                DID_UPDATE_ITEM_PROCESS_PROGRESS: function (e) {
                    var t = e.root, n = e.action,
                        r = null === n.progress ? t.query("GET_LABEL_FILE_PROCESSING") : t.query("GET_LABEL_FILE_PROCESSING") + " " + jt(n.progress) + "%";
                    Nt(t.ref.main, r), Nt(t.ref.sub, t.query("GET_LABEL_TAP_TO_CANCEL"))
                },
                DID_UPDATE_ITEM_LOAD_PROGRESS: Ht,
                DID_THROW_ITEM_LOAD_ERROR: Wt,
                DID_THROW_ITEM_INVALID: Wt,
                DID_THROW_ITEM_PROCESSING_ERROR: Wt,
                DID_THROW_ITEM_PROCESSING_REVERT_ERROR: Wt,
                DID_THROW_ITEM_REMOVE_ERROR: Wt
            }),
            didCreateView: function (e) {
                ye("CREATE_VIEW", Object.assign({}, e, {view: e}))
            },
            create: function (e) {
                var t = e.root, n = Ct("span");
                n.className = "filepond--file-status-main", t.appendChild(n), t.ref.main = n;
                var r = Ct("span");
                r.className = "filepond--file-status-sub", t.appendChild(r), t.ref.sub = r, Ht({
                    root: t,
                    action: {progress: null}
                })
            },
            mixins: {
                styles: ["translateX", "translateY", "opacity"],
                animations: {opacity: {type: "tween", duration: 250}, translateX: "spring", translateY: "spring"}
            }
        }), Qt = {
            AbortItemLoad: {
                label: "GET_LABEL_BUTTON_ABORT_ITEM_LOAD",
                action: "ABORT_ITEM_LOAD",
                className: "filepond--action-abort-item-load",
                align: "LOAD_INDICATOR_POSITION"
            },
            RetryItemLoad: {
                label: "GET_LABEL_BUTTON_RETRY_ITEM_LOAD",
                action: "RETRY_ITEM_LOAD",
                icon: "GET_ICON_RETRY",
                className: "filepond--action-retry-item-load",
                align: "BUTTON_PROCESS_ITEM_POSITION"
            },
            RemoveItem: {
                label: "GET_LABEL_BUTTON_REMOVE_ITEM",
                action: "REQUEST_REMOVE_ITEM",
                icon: "GET_ICON_REMOVE",
                className: "filepond--action-remove-item",
                align: "BUTTON_REMOVE_ITEM_POSITION"
            },
            ProcessItem: {
                label: "GET_LABEL_BUTTON_PROCESS_ITEM",
                action: "REQUEST_ITEM_PROCESSING",
                icon: "GET_ICON_PROCESS",
                className: "filepond--action-process-item",
                align: "BUTTON_PROCESS_ITEM_POSITION"
            },
            AbortItemProcessing: {
                label: "GET_LABEL_BUTTON_ABORT_ITEM_PROCESSING",
                action: "ABORT_ITEM_PROCESSING",
                className: "filepond--action-abort-item-processing",
                align: "BUTTON_PROCESS_ITEM_POSITION"
            },
            RetryItemProcessing: {
                label: "GET_LABEL_BUTTON_RETRY_ITEM_PROCESSING",
                action: "RETRY_ITEM_PROCESSING",
                icon: "GET_ICON_RETRY",
                className: "filepond--action-retry-item-processing",
                align: "BUTTON_PROCESS_ITEM_POSITION"
            },
            RevertItemProcessing: {
                label: "GET_LABEL_BUTTON_UNDO_ITEM_PROCESSING",
                action: "REQUEST_REVERT_ITEM_PROCESSING",
                icon: "GET_ICON_UNDO",
                className: "filepond--action-revert-item-processing",
                align: "BUTTON_PROCESS_ITEM_POSITION"
            }
        }, Zt = [];
    t(Qt, function (e) {
        Zt.push(e)
    });
    var Kt, $t = function (e) {
            if ("right" === nn(e)) return 0;
            var t = e.ref.buttonRemoveItem.rect.element;
            return t.hidden ? null : t.width + t.left
        }, Jt = function (e) {
            return e.ref.buttonAbortItemLoad.rect.element.width
        }, en = function (e) {
            return Math.floor(e.ref.buttonRemoveItem.rect.element.height / 4)
        }, tn = function (e) {
            return Math.floor(e.ref.buttonRemoveItem.rect.element.left / 2)
        }, nn = function (e) {
            return e.query("GET_STYLE_BUTTON_REMOVE_ITEM_POSITION")
        }, rn = {
            buttonAbortItemLoad: {opacity: 0},
            buttonRetryItemLoad: {opacity: 0},
            buttonRemoveItem: {opacity: 0},
            buttonProcessItem: {opacity: 0},
            buttonAbortItemProcessing: {opacity: 0},
            buttonRetryItemProcessing: {opacity: 0},
            buttonRevertItemProcessing: {opacity: 0},
            loadProgressIndicator: {
                opacity: 0, align: function (e) {
                    return e.query("GET_STYLE_LOAD_INDICATOR_POSITION")
                }
            },
            processProgressIndicator: {
                opacity: 0, align: function (e) {
                    return e.query("GET_STYLE_PROGRESS_INDICATOR_POSITION")
                }
            },
            processingCompleteIndicator: {opacity: 0, scaleX: .75, scaleY: .75},
            info: {translateX: 0, translateY: 0, opacity: 0},
            status: {translateX: 0, translateY: 0, opacity: 0}
        }, on = {
            buttonRemoveItem: {opacity: 1},
            buttonProcessItem: {opacity: 1},
            info: {translateX: $t},
            status: {translateX: $t}
        }, an = {buttonAbortItemProcessing: {opacity: 1}, processProgressIndicator: {opacity: 1}, status: {opacity: 1}},
        sn = {
            DID_THROW_ITEM_INVALID: {
                buttonRemoveItem: {opacity: 1},
                info: {translateX: $t},
                status: {translateX: $t, opacity: 1}
            },
            DID_START_ITEM_LOAD: {
                buttonAbortItemLoad: {opacity: 1},
                loadProgressIndicator: {opacity: 1},
                status: {opacity: 1}
            },
            DID_THROW_ITEM_LOAD_ERROR: {
                buttonRetryItemLoad: {opacity: 1},
                buttonRemoveItem: {opacity: 1},
                info: {translateX: $t},
                status: {opacity: 1}
            },
            DID_START_ITEM_REMOVE: {
                processProgressIndicator: {opacity: 1, align: nn},
                info: {translateX: $t},
                status: {opacity: 0}
            },
            DID_THROW_ITEM_REMOVE_ERROR: {
                processProgressIndicator: {opacity: 0, align: nn},
                buttonRemoveItem: {opacity: 1},
                info: {translateX: $t},
                status: {opacity: 1, translateX: $t}
            },
            DID_LOAD_ITEM: on,
            DID_LOAD_LOCAL_ITEM: {buttonRemoveItem: {opacity: 1}, info: {translateX: $t}, status: {translateX: $t}},
            DID_START_ITEM_PROCESSING: an,
            DID_REQUEST_ITEM_PROCESSING: an,
            DID_UPDATE_ITEM_PROCESS_PROGRESS: an,
            DID_COMPLETE_ITEM_PROCESSING: {
                buttonRevertItemProcessing: {opacity: 1},
                info: {opacity: 1},
                status: {opacity: 1}
            },
            DID_THROW_ITEM_PROCESSING_ERROR: {
                buttonRemoveItem: {opacity: 1},
                buttonRetryItemProcessing: {opacity: 1},
                status: {opacity: 1},
                info: {translateX: $t}
            },
            DID_THROW_ITEM_PROCESSING_REVERT_ERROR: {
                buttonRevertItemProcessing: {opacity: 1},
                status: {opacity: 1},
                info: {opacity: 1}
            },
            DID_ABORT_ITEM_PROCESSING: {
                buttonRemoveItem: {opacity: 1},
                buttonProcessItem: {opacity: 1},
                info: {translateX: $t},
                status: {opacity: 1}
            },
            DID_REVERT_ITEM_PROCESSING: on
        }, un = S({
            create: function (e) {
                var t = e.root;
                t.element.innerHTML = t.query("GET_ICON_DONE")
            },
            name: "processing-complete-indicator",
            ignoreRect: !0,
            mixins: {
                styles: ["scaleX", "scaleY", "opacity"],
                animations: {scaleX: "spring", scaleY: "spring", opacity: {type: "tween", duration: 250}}
            }
        }), ln = A({
            DID_SET_LABEL_BUTTON_ABORT_ITEM_PROCESSING: function (e) {
                var t = e.root, n = e.action;
                t.ref.buttonAbortItemProcessing.label = n.value
            }, DID_SET_LABEL_BUTTON_ABORT_ITEM_LOAD: function (e) {
                var t = e.root, n = e.action;
                t.ref.buttonAbortItemLoad.label = n.value
            }, DID_SET_LABEL_BUTTON_ABORT_ITEM_REMOVAL: function (e) {
                var t = e.root, n = e.action;
                t.ref.buttonAbortItemRemoval.label = n.value
            }, DID_REQUEST_ITEM_PROCESSING: function (e) {
                var t = e.root;
                t.ref.processProgressIndicator.spin = !0, t.ref.processProgressIndicator.progress = 0
            }, DID_START_ITEM_LOAD: function (e) {
                var t = e.root;
                t.ref.loadProgressIndicator.spin = !0, t.ref.loadProgressIndicator.progress = 0
            }, DID_START_ITEM_REMOVE: function (e) {
                var t = e.root;
                t.ref.processProgressIndicator.spin = !0, t.ref.processProgressIndicator.progress = 0
            }, DID_UPDATE_ITEM_LOAD_PROGRESS: function (e) {
                var t = e.root, n = e.action;
                t.ref.loadProgressIndicator.spin = !1, t.ref.loadProgressIndicator.progress = n.progress
            }, DID_UPDATE_ITEM_PROCESS_PROGRESS: function (e) {
                var t = e.root, n = e.action;
                t.ref.processProgressIndicator.spin = !1, t.ref.processProgressIndicator.progress = n.progress
            }
        }), cn = S({
            create: function (e) {
                var n, r = e.root, o = e.props, i = Object.keys(Qt).reduce(function (e, t) {
                        return e[t] = Object.assign({}, Qt[t]), e
                    }, {}), a = o.id, s = r.query("GET_ALLOW_REVERT"), u = r.query("GET_ALLOW_REMOVE"),
                    l = r.query("GET_ALLOW_PROCESS"), c = r.query("GET_INSTANT_UPLOAD"), f = r.query("IS_ASYNC"),
                    d = r.query("GET_STYLE_BUTTON_REMOVE_ITEM_ALIGN");
                f ? l && !s ? n = function (e) {
                    return !/RevertItemProcessing/.test(e)
                } : !l && s ? n = function (e) {
                    return !/ProcessItem|RetryItemProcessing|AbortItemProcessing/.test(e)
                } : l || s || (n = function (e) {
                    return !/Process/.test(e)
                }) : n = function (e) {
                    return !/Process/.test(e)
                };
                var p = n ? Zt.filter(n) : Zt.concat();
                if (c && s && (i.RevertItemProcessing.label = "GET_LABEL_BUTTON_REMOVE_ITEM", i.RevertItemProcessing.icon = "GET_ICON_REMOVE"), f && !s) {
                    var E = sn.DID_COMPLETE_ITEM_PROCESSING;
                    E.info.translateX = tn, E.info.translateY = en, E.status.translateY = en, E.processingCompleteIndicator = {
                        opacity: 1,
                        scaleX: 1,
                        scaleY: 1
                    }
                }
                if (f && !l && (["DID_START_ITEM_PROCESSING", "DID_REQUEST_ITEM_PROCESSING", "DID_UPDATE_ITEM_PROCESS_PROGRESS", "DID_THROW_ITEM_PROCESSING_ERROR"].forEach(function (e) {
                    sn[e].status.translateY = en
                }), sn.DID_THROW_ITEM_PROCESSING_ERROR.status.translateX = Jt), d && s) {
                    i.RevertItemProcessing.align = "BUTTON_REMOVE_ITEM_POSITION";
                    var _ = sn.DID_COMPLETE_ITEM_PROCESSING;
                    _.info.translateX = $t, _.status.translateY = en, _.processingCompleteIndicator = {
                        opacity: 1,
                        scaleX: 1,
                        scaleY: 1
                    }
                }
                u || (i.RemoveItem.disabled = !0), t(i, function (e, t) {
                    var n = r.createChildView(Ft, {label: r.query(t.label), icon: r.query(t.icon), opacity: 0});
                    p.includes(e) && r.appendChildView(n), t.disabled && (n.element.setAttribute("disabled", "disabled"), n.element.setAttribute("hidden", "hidden")), n.element.dataset.align = r.query("GET_STYLE_" + t.align), n.element.classList.add(t.className), n.on("click", function (e) {
                        e.stopPropagation(), t.disabled || r.dispatch(t.action, {query: a})
                    }), r.ref["button" + e] = n
                }), r.ref.processingCompleteIndicator = r.appendChildView(r.createChildView(un)), r.ref.processingCompleteIndicator.element.dataset.align = r.query("GET_STYLE_BUTTON_PROCESS_ITEM_POSITION"), r.ref.info = r.appendChildView(r.createChildView(kt, {id: a})), r.ref.status = r.appendChildView(r.createChildView(zt, {id: a}));
                var T = r.appendChildView(r.createChildView(Bt, {
                    opacity: 0,
                    align: r.query("GET_STYLE_LOAD_INDICATOR_POSITION")
                }));
                T.element.classList.add("filepond--load-indicator"), r.ref.loadProgressIndicator = T;
                var I = r.appendChildView(r.createChildView(Bt, {
                    opacity: 0,
                    align: r.query("GET_STYLE_PROGRESS_INDICATOR_POSITION")
                }));
                I.element.classList.add("filepond--process-indicator"), r.ref.processProgressIndicator = I, r.ref.activeStyles = []
            }, write: function (e) {
                var n = e.root, r = e.actions, o = e.props;
                ln({root: n, actions: r, props: o});
                var i = r.concat().filter(function (e) {
                    return /^DID_/.test(e.type)
                }).reverse().find(function (e) {
                    return sn[e.type]
                });
                if (i) {
                    n.ref.activeStyles = [];
                    var a = sn[i.type];
                    t(rn, function (e, r) {
                        var o = n.ref[e];
                        t(r, function (t, r) {
                            var i = a[e] && void 0 !== a[e][t] ? a[e][t] : r;
                            n.ref.activeStyles.push({control: o, key: t, value: i})
                        })
                    })
                }
                n.ref.activeStyles.forEach(function (e) {
                    var t = e.control, r = e.key, o = e.value;
                    t[r] = "function" == typeof o ? o(n) : o
                })
            }, didCreateView: function (e) {
                ye("CREATE_VIEW", Object.assign({}, e, {view: e}))
            }, name: "file"
        }), fn = S({
            create: function (e) {
                var t = e.root, n = e.props;
                t.ref.fileName = Ct("legend"), t.appendChild(t.ref.fileName), t.ref.file = t.appendChildView(t.createChildView(cn, {id: n.id})), t.ref.data = !1
            }, ignoreRect: !0, write: A({
                DID_LOAD_ITEM: function (e) {
                    var t = e.root, n = e.props;
                    Nt(t.ref.fileName, wt(t.query("GET_ITEM_NAME", n.id)))
                }
            }), didCreateView: function (e) {
                ye("CREATE_VIEW", Object.assign({}, e, {view: e}))
            }, tag: "fieldset", name: "file-wrapper"
        }), dn = {type: "spring", damping: .6, mass: 7}, pn = function (e, t, n) {
            var r = S({name: "panel-" + t.name + " filepond--" + n, mixins: t.mixins, ignoreRectUpdate: !0}),
                o = e.createChildView(r, t.props);
            e.ref[t.name] = e.appendChildView(o)
        }, En = S({
            name: "panel", read: function (e) {
                var t = e.root;
                return e.props.heightCurrent = t.ref.bottom.translateY
            }, write: function (e) {
                var t = e.root, n = e.props;
                if (null !== t.ref.scalable && n.scalable === t.ref.scalable || (t.ref.scalable = !N(n.scalable) || n.scalable, t.element.dataset.scalable = t.ref.scalable), n.height) {
                    var r = t.ref.top.rect.element, o = t.ref.bottom.rect.element,
                        i = Math.max(r.height + o.height, n.height);
                    t.ref.center.translateY = r.height, t.ref.center.scaleY = (i - r.height - o.height) / 100, t.ref.bottom.translateY = i - o.height
                }
            }, create: function (e) {
                var t = e.root, n = e.props;
                [{name: "top"}, {
                    name: "center",
                    props: {translateY: null, scaleY: null},
                    mixins: {animations: {scaleY: dn}, styles: ["translateY", "scaleY"]}
                }, {
                    name: "bottom",
                    props: {translateY: null},
                    mixins: {animations: {translateY: dn}, styles: ["translateY"]}
                }].forEach(function (e) {
                    pn(t, e, n.name)
                }), t.element.classList.add("filepond--" + n.name), t.ref.scalable = null
            }, ignoreRect: !0, mixins: {apis: ["height", "heightCurrent", "scalable"]}
        }), _n = {type: "spring", stiffness: .75, damping: .45, mass: 10}, Tn = {
            DID_START_ITEM_LOAD: "busy",
            DID_UPDATE_ITEM_LOAD_PROGRESS: "loading",
            DID_THROW_ITEM_INVALID: "load-invalid",
            DID_THROW_ITEM_LOAD_ERROR: "load-error",
            DID_LOAD_ITEM: "idle",
            DID_THROW_ITEM_REMOVE_ERROR: "remove-error",
            DID_START_ITEM_REMOVE: "busy",
            DID_START_ITEM_PROCESSING: "busy processing",
            DID_REQUEST_ITEM_PROCESSING: "busy processing",
            DID_UPDATE_ITEM_PROCESS_PROGRESS: "processing",
            DID_COMPLETE_ITEM_PROCESSING: "processing-complete",
            DID_THROW_ITEM_PROCESSING_ERROR: "processing-error",
            DID_THROW_ITEM_PROCESSING_REVERT_ERROR: "processing-revert-error",
            DID_ABORT_ITEM_PROCESSING: "cancelled",
            DID_REVERT_ITEM_PROCESSING: "idle"
        }, In = A({
            DID_UPDATE_PANEL_HEIGHT: function (e) {
                var t = e.root, n = e.action;
                t.height = n.height
            }
        }), vn = A({
            DID_GRAB_ITEM: function (e) {
                var t = e.root;
                e.props.dragOrigin = {x: t.translateX, y: t.translateY}
            }, DID_DRAG_ITEM: function (e) {
                e.root.element.dataset.dragState = "drag"
            }, DID_DROP_ITEM: function (e) {
                var t = e.root, n = e.props;
                n.dragOffset = null, n.dragOrigin = null, t.element.dataset.dragState = "drop"
            }
        }, function (e) {
            var t = e.root, n = e.actions, r = e.props, o = e.shouldOptimize;
            "drop" === t.element.dataset.dragState && t.scaleX <= 1 && (t.element.dataset.dragState = "idle");
            var i = n.concat().filter(function (e) {
                return /^DID_/.test(e.type)
            }).reverse().find(function (e) {
                return Tn[e.type]
            });
            i && i.type !== r.currentState && (r.currentState = i.type, t.element.dataset.filepondItemState = Tn[r.currentState] || "");
            var a = t.query("GET_ITEM_PANEL_ASPECT_RATIO") || t.query("GET_PANEL_ASPECT_RATIO");
            a ? o || (t.height = t.rect.element.width * a) : (In({
                root: t,
                actions: n,
                props: r
            }), !t.height && t.ref.container.rect.element.height > 0 && (t.height = t.ref.container.rect.element.height)), o && (t.ref.panel.height = null), t.ref.panel.height = t.height
        }), mn = S({
            create: function (e) {
                var t = e.root, n = e.props;
                t.ref.handleClick = function (e) {
                    return t.dispatch("DID_ACTIVATE_ITEM", {id: n.id})
                }, t.element.id = "filepond--item-" + n.id, t.element.addEventListener("click", t.ref.handleClick), t.ref.container = t.appendChildView(t.createChildView(fn, {id: n.id})), t.ref.panel = t.appendChildView(t.createChildView(En, {name: "item-panel"})), t.ref.panel.height = null, n.markedForRemoval = !1, t.query("GET_ALLOW_REORDER") && (t.element.dataset.dragState = "idle", t.element.addEventListener("pointerdown", function (e) {
                    if (e.isPrimary) {
                        var r = !1, o = e.pageX, i = e.pageY;
                        n.dragOrigin = {x: t.translateX, y: t.translateY}, n.dragCenter = {x: e.offsetX, y: e.offsetY};
                        var a, s, u, l = (a = t.query("GET_ACTIVE_ITEMS"), s = a.map(function (e) {
                            return e.id
                        }), u = void 0, {
                            setIndex: function (e) {
                                u = e
                            }, getIndex: function () {
                                return u
                            }, getItemIndex: function (e) {
                                return s.indexOf(e.id)
                            }
                        });
                        t.dispatch("DID_GRAB_ITEM", {id: n.id, dragState: l});
                        var c = function (e) {
                            e.isPrimary && (e.stopPropagation(), e.preventDefault(), n.dragOffset = {
                                x: e.pageX - o,
                                y: e.pageY - i
                            }, n.dragOffset.x * n.dragOffset.x + n.dragOffset.y * n.dragOffset.y > 16 && !r && (r = !0, t.element.removeEventListener("click", t.ref.handleClick)), t.dispatch("DID_DRAG_ITEM", {
                                id: n.id,
                                dragState: l
                            }))
                        };
                        document.addEventListener("pointermove", c), document.addEventListener("pointerup", function e(a) {
                            a.isPrimary && (document.removeEventListener("pointermove", c), document.removeEventListener("pointerup", e), n.dragOffset = {
                                x: a.pageX - o,
                                y: a.pageY - i
                            }, t.dispatch("DID_DROP_ITEM", {id: n.id, dragState: l}), r && setTimeout(function () {
                                return t.element.addEventListener("click", t.ref.handleClick)
                            }, 0))
                        })
                    }
                }))
            },
            write: vn,
            destroy: function (e) {
                var t = e.root, n = e.props;
                t.element.removeEventListener("click", t.ref.handleClick), t.dispatch("RELEASE_ITEM", {query: n.id})
            },
            tag: "li",
            name: "item",
            mixins: {
                apis: ["id", "interactionMethod", "markedForRemoval", "spawnDate", "dragCenter", "dragOrigin", "dragOffset"],
                styles: ["translateX", "translateY", "scaleX", "scaleY", "opacity", "height"],
                animations: {
                    scaleX: "spring",
                    scaleY: "spring",
                    translateX: _n,
                    translateY: _n,
                    opacity: {type: "tween", duration: 150}
                }
            }
        }), hn = function (e, t) {
            return Math.max(1, Math.floor((e + 1) / t))
        }, gn = function (e, t, n) {
            if (n) {
                var r = e.rect.element.width, o = t.length, i = null;
                if (0 === o || n.top < t[0].rect.element.top) return -1;
                var a = t[0].rect.element, s = a.marginLeft + a.marginRight, u = a.width + s, l = hn(r, u);
                if (1 === l) {
                    for (var c = 0; c < o; c++) {
                        var f = t[c], d = f.rect.outer.top + .5 * f.rect.element.height;
                        if (n.top < d) return c
                    }
                    return o
                }
                for (var p = a.marginTop + a.marginBottom, E = a.height + p, _ = 0; _ < o; _++) {
                    var T = _ % l * u, I = Math.floor(_ / l) * E, v = I - a.marginTop, m = T + u,
                        h = I + E + a.marginBottom;
                    if (n.top < h && n.top > v) {
                        if (n.left < m) return _;
                        i = _ !== o - 1 ? _ : null
                    }
                }
                return null !== i ? i : o
            }
        }, Rn = {
            height: 0, width: 0, get getHeight() {
                return this.height
            }, set setHeight(e) {
                0 !== this.height && 0 !== e || (this.height = e)
            }, get getWidth() {
                return this.width
            }, set setWidth(e) {
                0 !== this.width && 0 !== e || (this.width = e)
            }, setDimensions: function (e, t) {
                0 !== this.height && 0 !== e || (this.height = e), 0 !== this.width && 0 !== t || (this.width = t)
            }
        }, On = function (e, t, n) {
            var r = arguments.length > 3 && void 0 !== arguments[3] ? arguments[3] : 0,
                o = arguments.length > 4 && void 0 !== arguments[4] ? arguments[4] : 1;
            e.dragOffset ? (e.translateX = null, e.translateY = null, e.translateX = e.dragOrigin.x + e.dragOffset.x, e.translateY = e.dragOrigin.y + e.dragOffset.y, e.scaleX = 1.025, e.scaleY = 1.025) : (e.translateX = t, e.translateY = n, Date.now() > e.spawnDate && (0 === e.opacity && yn(e, t, n, r, o), e.scaleX = 1, e.scaleY = 1, e.opacity = 1))
        }, yn = function (e, t, n, r, o) {
            e.interactionMethod === re ? (e.translateX = null, e.translateX = t, e.translateY = null, e.translateY = n) : e.interactionMethod === ee ? (e.translateX = null, e.translateX = t - 20 * r, e.translateY = null, e.translateY = n - 10 * o, e.scaleX = .8, e.scaleY = .8) : e.interactionMethod === te ? (e.translateY = null, e.translateY = n - 30) : e.interactionMethod === J && (e.translateX = null, e.translateX = t - 30, e.translateY = null)
        }, Dn = function (e) {
            return e.rect.element.height + .5 * e.rect.element.marginBottom + .5 * e.rect.element.marginTop
        }, Sn = A({
            DID_ADD_ITEM: function (e) {
                var t = e.root, n = e.action, r = n.id, o = n.index, i = n.interactionMethod;
                t.ref.addIndex = o;
                var a = Date.now(), s = a, u = 1;
                if (i !== re) {
                    u = 0;
                    var l = t.query("GET_ITEM_INSERT_INTERVAL"), c = a - t.ref.lastItemSpanwDate;
                    s = c < l ? a + (l - c) : a
                }
                t.ref.lastItemSpanwDate = s, t.appendChildView(t.createChildView(mn, {
                    spawnDate: s,
                    id: r,
                    opacity: u,
                    interactionMethod: i
                }), o)
            }, DID_REMOVE_ITEM: function (e) {
                var t = e.root, n = e.action.id, r = t.childViews.find(function (e) {
                    return e.id === n
                });
                r && (r.scaleX = .9, r.scaleY = .9, r.opacity = 0, r.markedForRemoval = !0)
            }, DID_DRAG_ITEM: function (e) {
                var t = e.root, n = e.action, r = n.id, o = n.dragState, i = t.query("GET_ITEM", {id: r}),
                    a = t.childViews.find(function (e) {
                        return e.id === r
                    }), s = t.childViews.length, u = o.getItemIndex(i);
                if (a) {
                    var l, c = a.dragOrigin.x + a.dragOffset.x + a.dragCenter.x,
                        f = a.dragOrigin.y + a.dragOffset.y + a.dragCenter.y, d = Dn(a),
                        p = (l = a).rect.element.width + .5 * l.rect.element.marginLeft + .5 * l.rect.element.marginRight,
                        E = Math.floor(t.rect.outer.width / p);
                    E > s && (E = s);
                    var _ = Math.floor(s / E + 1);
                    Rn.setHeight = d * _, Rn.setWidth = p * E;
                    var T = {
                        y: Math.floor(f / d), x: Math.floor(c / p), getGridIndex: function () {
                            return f > Rn.getHeight || f < 0 || c > Rn.getWidth || c < 0 ? u : this.y * E + this.x
                        }, getColIndex: function () {
                            for (var e = t.query("GET_ACTIVE_ITEMS"), n = t.childViews.filter(function (e) {
                                return e.rect.element.height
                            }), r = e.map(function (e) {
                                return n.find(function (t) {
                                    return t.id === e.id
                                })
                            }), o = r.findIndex(function (e) {
                                return e === a
                            }), i = Dn(a), s = r.length, u = s, l = 0, c = 0, d = 0, p = 0; p < s; p++) if (l = Dn(r[p]), f < (c = (d = c) + l)) {
                                if (o > p) {
                                    if (f < d + i) {
                                        u = p;
                                        break
                                    }
                                    continue
                                }
                                u = p;
                                break
                            }
                            return u
                        }
                    }, I = E > 1 ? T.getGridIndex() : T.getColIndex();
                    t.dispatch("MOVE_ITEM", {query: a, index: I});
                    var v = o.getIndex();
                    if (void 0 === v || v !== I) {
                        if (o.setIndex(I), void 0 === v) return;
                        t.dispatch("DID_REORDER_ITEMS", {items: t.query("GET_ACTIVE_ITEMS"), origin: u, target: I})
                    }
                }
            }
        }), An = S({
            create: function (e) {
                var t = e.root;
                r(t.element, "role", "list"), t.ref.lastItemSpanwDate = Date.now()
            }, write: function (e) {
                var t = e.root, n = e.props, r = e.actions, o = e.shouldOptimize;
                Sn({root: t, props: n, actions: r});
                var i = n.dragCoordinates, a = t.rect.element.width, s = t.childViews.filter(function (e) {
                    return e.rect.element.height
                }), u = t.query("GET_ACTIVE_ITEMS").map(function (e) {
                    return s.find(function (t) {
                        return t.id === e.id
                    })
                }).filter(function (e) {
                    return e
                }), l = i ? gn(t, u, i) : null, c = t.ref.addIndex || null;
                t.ref.addIndex = null;
                var f = 0, d = 0, p = 0;
                if (0 !== u.length) {
                    var E = u[0].rect.element, _ = E.marginTop + E.marginBottom, T = E.marginLeft + E.marginRight,
                        I = E.width + T, v = E.height + _, m = hn(a, I);
                    if (1 === m) {
                        var h = 0, g = 0;
                        u.forEach(function (e, t) {
                            if (l) {
                                var n = t - l;
                                g = -2 === n ? .25 * -_ : -1 === n ? .75 * -_ : 0 === n ? .75 * _ : 1 === n ? .25 * _ : 0
                            }
                            o && (e.translateX = null, e.translateY = null), e.markedForRemoval || On(e, 0, h + g);
                            var r = (e.rect.element.height + _) * (e.markedForRemoval ? e.opacity : 1);
                            h += r
                        })
                    } else {
                        var R = 0, O = 0;
                        u.forEach(function (e, t) {
                            t === l && (f = 1), t === c && (p += 1), e.markedForRemoval && e.opacity < .5 && (d -= 1);
                            var n = t + p + f + d, r = n % m, i = Math.floor(n / m), a = r * I, s = i * v,
                                u = Math.sign(a - R), E = Math.sign(s - O);
                            R = a, O = s, e.markedForRemoval || (o && (e.translateX = null, e.translateY = null), On(e, a, s, u, E))
                        })
                    }
                }
            }, tag: "ul", name: "list", didWriteView: function (e) {
                var t = e.root;
                t.childViews.filter(function (e) {
                    return e.markedForRemoval && 0 === e.opacity && e.resting
                }).forEach(function (e) {
                    e._destroy(), t.removeChildView(e)
                })
            }, filterFrameActionsForChild: function (e, t) {
                return t.filter(function (t) {
                    return !t.data || !t.data.id || e.id === t.data.id
                })
            }, mixins: {apis: ["dragCoordinates"]}
        }), Ln = A({
            DID_DRAG: function (e) {
                var t = e.root, n = e.props, r = e.action;
                t.query("GET_ITEM_INSERT_LOCATION_FREEDOM") && (n.dragCoordinates = {
                    left: r.position.scopeLeft - t.ref.list.rect.element.left,
                    top: r.position.scopeTop - (t.rect.outer.top + t.rect.element.marginTop + t.rect.element.scrollTop)
                })
            }, DID_END_DRAG: function (e) {
                e.props.dragCoordinates = null
            }
        }), bn = S({
            create: function (e) {
                var t = e.root, n = e.props;
                t.ref.list = t.appendChildView(t.createChildView(An)), n.dragCoordinates = null, n.overflowing = !1
            },
            write: function (e) {
                var t = e.root, n = e.props, r = e.actions;
                if (Ln({
                    root: t,
                    props: n,
                    actions: r
                }), t.ref.list.dragCoordinates = n.dragCoordinates, n.overflowing && !n.overflow && (n.overflowing = !1, t.element.dataset.state = "", t.height = null), n.overflow) {
                    var o = Math.round(n.overflow);
                    o !== t.height && (n.overflowing = !0, t.element.dataset.state = "overflow", t.height = o)
                }
            },
            name: "list-scroller",
            mixins: {
                apis: ["overflow", "dragCoordinates"],
                styles: ["height", "translateY"],
                animations: {translateY: "spring"}
            }
        }), Pn = function (e, t, n) {
            var o = arguments.length > 3 && void 0 !== arguments[3] ? arguments[3] : "";
            n ? r(e, t, o) : e.removeAttribute(t)
        }, Mn = function (e) {
            var t = e.root, n = e.action;
            t.query("GET_ALLOW_SYNC_ACCEPT_ATTRIBUTE") && Pn(t.element, "accept", !!n.value, n.value ? n.value.join(",") : "")
        }, wn = function (e) {
            var t = e.root, n = e.action;
            Pn(t.element, "multiple", n.value)
        }, Cn = function (e) {
            var t = e.root, n = e.action;
            Pn(t.element, "webkitdirectory", n.value)
        }, Nn = function (e) {
            var t = e.root, n = t.query("GET_DISABLED"), r = t.query("GET_ALLOW_BROWSE"), o = n || !r;
            Pn(t.element, "disabled", o)
        }, Gn = function (e) {
            var t = e.root;
            e.action.value ? 0 === t.query("GET_TOTAL_ITEMS") && Pn(t.element, "required", !0) : Pn(t.element, "required", !1)
        }, Un = function (e) {
            var t = e.root, n = e.action;
            Pn(t.element, "capture", !!n.value, !0 === n.value ? "" : n.value)
        }, Bn = function (e) {
            var t = e.root, n = t.element;
            t.query("GET_TOTAL_ITEMS") > 0 ? (Pn(n, "required", !1), Pn(n, "name", !1)) : (Pn(n, "name", !0, t.query("GET_NAME")), t.query("GET_CHECK_VALIDITY") && n.setCustomValidity(""), t.query("GET_REQUIRED") && Pn(n, "required", !0))
        }, Fn = S({
            tag: "input",
            name: "browser",
            ignoreRect: !0,
            ignoreRectUpdate: !0,
            attributes: {type: "file"},
            create: function (e) {
                var t = e.root, n = e.props;
                t.element.id = "filepond--browser-" + n.id, r(t.element, "name", t.query("GET_NAME")), r(t.element, "aria-controls", "filepond--assistant-" + n.id), r(t.element, "aria-labelledby", "filepond--drop-label-" + n.id), Mn({
                    root: t,
                    action: {value: t.query("GET_ACCEPTED_FILE_TYPES")}
                }), wn({root: t, action: {value: t.query("GET_ALLOW_MULTIPLE")}}), Cn({
                    root: t,
                    action: {value: t.query("GET_ALLOW_DIRECTORIES_ONLY")}
                }), Nn({root: t}), Gn({root: t, action: {value: t.query("GET_REQUIRED")}}), Un({
                    root: t,
                    action: {value: t.query("GET_CAPTURE_METHOD")}
                }), t.ref.handleChange = function (e) {
                    if (t.element.value) {
                        var r = Array.from(t.element.files).map(function (e) {
                            return e._relativePath = e.webkitRelativePath, e
                        });
                        setTimeout(function () {
                            n.onload(r), function (e) {
                                if (e && "" !== e.value) {
                                    try {
                                        e.value = ""
                                    } catch (e) {
                                    }
                                    if (e.value) {
                                        var t = Ct("form"), n = e.parentNode, r = e.nextSibling;
                                        t.appendChild(e), t.reset(), r ? n.insertBefore(e, r) : n.appendChild(e)
                                    }
                                }
                            }(t.element)
                        }, 250)
                    }
                }, t.element.addEventListener("change", t.ref.handleChange)
            },
            destroy: function (e) {
                var t = e.root;
                t.element.removeEventListener("change", t.ref.handleChange)
            },
            write: A({
                DID_LOAD_ITEM: Bn,
                DID_REMOVE_ITEM: Bn,
                DID_THROW_ITEM_INVALID: function (e) {
                    var t = e.root;
                    t.query("GET_CHECK_VALIDITY") && t.element.setCustomValidity(t.query("GET_LABEL_INVALID_FIELD"))
                },
                DID_SET_DISABLED: Nn,
                DID_SET_ALLOW_BROWSE: Nn,
                DID_SET_ALLOW_DIRECTORIES_ONLY: Cn,
                DID_SET_ALLOW_MULTIPLE: wn,
                DID_SET_ACCEPTED_FILE_TYPES: Mn,
                DID_SET_CAPTURE_METHOD: Un,
                DID_SET_REQUIRED: Gn
            })
        }), qn = 13, Vn = 32, xn = function (e, t) {
            e.innerHTML = t;
            var n = e.querySelector(".filepond--label-action");
            return n && r(n, "tabindex", "0"), t
        }, Yn = S({
            name: "drop-label",
            ignoreRect: !0,
            create: function (e) {
                var t = e.root, n = e.props, o = Ct("label");
                r(o, "for", "filepond--browser-" + n.id), r(o, "id", "filepond--drop-label-" + n.id), r(o, "aria-hidden", "true"), t.ref.handleKeyDown = function (e) {
                    (e.keyCode === qn || e.keyCode === Vn) && (e.preventDefault(), t.ref.label.click())
                }, t.ref.handleClick = function (e) {
                    e.target === o || o.contains(e.target) || t.ref.label.click()
                }, o.addEventListener("keydown", t.ref.handleKeyDown), t.element.addEventListener("click", t.ref.handleClick), xn(o, n.caption), t.appendChild(o), t.ref.label = o
            },
            destroy: function (e) {
                var t = e.root;
                t.ref.label.addEventListener("keydown", t.ref.handleKeyDown), t.element.removeEventListener("click", t.ref.handleClick)
            },
            write: A({
                DID_SET_LABEL_IDLE: function (e) {
                    var t = e.root, n = e.action;
                    xn(t.ref.label, n.value)
                }
            }),
            mixins: {
                styles: ["opacity", "translateX", "translateY"],
                animations: {opacity: {type: "tween", duration: 150}, translateX: "spring", translateY: "spring"}
            }
        }), kn = S({
            name: "drip-blob",
            ignoreRect: !0,
            mixins: {
                styles: ["translateX", "translateY", "scaleX", "scaleY", "opacity"],
                animations: {
                    scaleX: "spring",
                    scaleY: "spring",
                    translateX: "spring",
                    translateY: "spring",
                    opacity: {type: "tween", duration: 250}
                }
            }
        }), jn = A({
            DID_DRAG: function (e) {
                var t = e.root, n = e.action;
                t.ref.blob ? (t.ref.blob.translateX = n.position.scopeLeft, t.ref.blob.translateY = n.position.scopeTop, t.ref.blob.scaleX = 1, t.ref.blob.scaleY = 1, t.ref.blob.opacity = 1) : function (e) {
                    var t = e.root, n = .5 * t.rect.element.width, r = .5 * t.rect.element.height;
                    t.ref.blob = t.appendChildView(t.createChildView(kn, {
                        opacity: 0,
                        scaleX: 2.5,
                        scaleY: 2.5,
                        translateX: n,
                        translateY: r
                    }))
                }({root: t})
            }, DID_DROP: function (e) {
                var t = e.root;
                t.ref.blob && (t.ref.blob.scaleX = 2.5, t.ref.blob.scaleY = 2.5, t.ref.blob.opacity = 0)
            }, DID_END_DRAG: function (e) {
                var t = e.root;
                t.ref.blob && (t.ref.blob.opacity = 0)
            }
        }), Hn = S({
            ignoreRect: !0, ignoreRectUpdate: !0, name: "drip", write: function (e) {
                var t = e.root, n = e.props, r = e.actions;
                jn({root: t, props: n, actions: r});
                var o = t.ref.blob;
                0 === r.length && o && 0 === o.opacity && (t.removeChildView(o), t.ref.blob = null)
            }
        }), Xn = function (e, t) {
            try {
                var n = new DataTransfer;
                t.forEach(function (e) {
                    e instanceof File ? n.items.add(e) : n.items.add(new File([e], e.name, {type: e.type}))
                }), e.files = n.files
            } catch (e) {
                return !1
            }
            return !0
        }, Wn = function (e, t) {
            return e.ref.fields[t]
        }, zn = function (e) {
            e.query("GET_ACTIVE_ITEMS").forEach(function (t) {
                e.ref.fields[t.id] && e.element.appendChild(e.ref.fields[t.id])
            })
        }, Qn = function (e) {
            var t = e.root;
            return zn(t)
        }, Zn = A({
            DID_SET_DISABLED: function (e) {
                var t = e.root;
                t.element.disabled = t.query("GET_DISABLED")
            }, DID_ADD_ITEM: function (e) {
                var t = e.root, n = e.action,
                    r = !(t.query("GET_ITEM", n.id).origin === ve.LOCAL) && t.query("SHOULD_UPDATE_FILE_INPUT"),
                    o = Ct("input");
                o.type = r ? "file" : "hidden", o.name = t.query("GET_NAME"), o.disabled = t.query("GET_DISABLED"), t.ref.fields[n.id] = o, zn(t)
            }, DID_LOAD_ITEM: function (e) {
                var t = e.root, n = e.action, r = Wn(t, n.id);
                if (r && (null !== n.serverFileReference && (r.value = n.serverFileReference), t.query("SHOULD_UPDATE_FILE_INPUT"))) {
                    var o = t.query("GET_ITEM", n.id);
                    Xn(r, [o.file])
                }
            }, DID_REMOVE_ITEM: function (e) {
                var t = e.root, n = e.action, r = Wn(t, n.id);
                r && (r.parentNode && r.parentNode.removeChild(r), delete t.ref.fields[n.id])
            }, DID_DEFINE_VALUE: function (e) {
                var t = e.root, n = e.action, r = Wn(t, n.id);
                r && (null === n.value ? r.removeAttribute("value") : r.value = n.value, zn(t))
            }, DID_PREPARE_OUTPUT: function (e) {
                var t = e.root, n = e.action;
                t.query("SHOULD_UPDATE_FILE_INPUT") && setTimeout(function () {
                    var e = Wn(t, n.id);
                    e && Xn(e, [n.file])
                }, 0)
            }, DID_REORDER_ITEMS: Qn, DID_SORT_ITEMS: Qn
        }), Kn = S({
            tag: "fieldset", name: "data", create: function (e) {
                return e.root.ref.fields = {}
            }, write: Zn, ignoreRect: !0
        }), $n = ["jpg", "jpeg", "png", "gif", "bmp", "webp", "svg", "tiff"], Jn = ["css", "csv", "html", "txt"],
        er = {zip: "zip|compressed", epub: "application/epub+zip"}, tr = function () {
            var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : "";
            return e = e.toLowerCase(), $n.includes(e) ? "image/" + ("jpg" === e ? "jpeg" : "svg" === e ? "svg+xml" : e) : Jn.includes(e) ? "text/" + e : er[e] || ""
        }, nr = function (e) {
            return new Promise(function (t, n) {
                var r = dr(e);
                if (r.length && !rr(e)) return t(r);
                or(e).then(t)
            })
        }, rr = function (e) {
            return !!e.files && e.files.length > 0
        }, or = function (e) {
            return new Promise(function (t, n) {
                var r = (e.items ? Array.from(e.items) : []).filter(function (e) {
                    return ir(e)
                }).map(function (e) {
                    return ar(e)
                });
                r.length ? Promise.all(r).then(function (e) {
                    var n = [];
                    e.forEach(function (e) {
                        n.push.apply(n, e)
                    }), t(n.filter(function (e) {
                        return e
                    }).map(function (e) {
                        return e._relativePath || (e._relativePath = e.webkitRelativePath), e
                    }))
                }).catch(console.error) : t(e.files ? Array.from(e.files) : [])
            })
        }, ir = function (e) {
            if (cr(e)) {
                var t = fr(e);
                if (t) return t.isFile || t.isDirectory
            }
            return "file" === e.kind
        }, ar = function (e) {
            return new Promise(function (t, n) {
                lr(e) ? sr(fr(e)).then(t).catch(n) : t([e.getAsFile()])
            })
        }, sr = function (e) {
            return new Promise(function (t, n) {
                var r = [], o = 0, i = 0, a = function () {
                    0 === i && 0 === o && t(r)
                };
                !function e(t) {
                    o++;
                    var s = t.createReader();
                    !function t() {
                        s.readEntries(function (n) {
                            if (0 === n.length) return o--, void a();
                            n.forEach(function (t) {
                                t.isDirectory ? e(t) : (i++, t.file(function (e) {
                                    var n = ur(e);
                                    t.fullPath && (n._relativePath = t.fullPath), r.push(n), i--, a()
                                }))
                            }), t()
                        }, n)
                    }()
                }(e)
            })
        }, ur = function (e) {
            if (e.type.length) return e;
            var t = e.lastModifiedDate, n = e.name, r = tr(je(e.name));
            return r.length ? ((e = e.slice(0, e.size, r)).name = n, e.lastModifiedDate = t, e) : e
        }, lr = function (e) {
            return cr(e) && (fr(e) || {}).isDirectory
        }, cr = function (e) {
            return "webkitGetAsEntry" in e
        }, fr = function (e) {
            return e.webkitGetAsEntry()
        }, dr = function (e) {
            var t = [];
            try {
                if ((t = Er(e)).length) return t;
                t = pr(e)
            } catch (e) {
            }
            return t
        }, pr = function (e) {
            var t = e.getData("url");
            return "string" == typeof t && t.length ? [t] : []
        }, Er = function (e) {
            var t = e.getData("text/html");
            if ("string" == typeof t && t.length) {
                var n = t.match(/src\s*=\s*"(.+?)"/);
                if (n) return [n[1]]
            }
            return []
        }, _r = [], Tr = function (e) {
            return {pageLeft: e.pageX, pageTop: e.pageY, scopeLeft: e.offsetX || e.layerX, scopeTop: e.offsetY || e.layerY}
        }, Ir = function (e) {
            var t = _r.find(function (t) {
                return t.element === e
            });
            if (t) return t;
            var n = vr(e);
            return _r.push(n), n
        }, vr = function (e) {
            var n = [], r = {dragenter: Rr, dragover: Or, dragleave: Dr, drop: yr}, o = {};
            t(r, function (t, r) {
                o[t] = r(e, n), e.addEventListener(t, o[t], !1)
            });
            var i = {
                element: e, addListener: function (a) {
                    return n.push(a), function () {
                        n.splice(n.indexOf(a), 1), 0 === n.length && (_r.splice(_r.indexOf(i), 1), t(r, function (t) {
                            e.removeEventListener(t, o[t], !1)
                        }))
                    }
                }
            };
            return i
        }, mr = function (e, t) {
            var n, r = function (e, t) {
                return "elementFromPoint" in e || (e = document), e.elementFromPoint(t.x, t.y)
            }("getRootNode" in (n = t) ? n.getRootNode() : document, {
                x: e.pageX - window.pageXOffset,
                y: e.pageY - window.pageYOffset
            });
            return r === t || t.contains(r)
        }, hr = null, gr = function (e, t) {
            try {
                e.dropEffect = t
            } catch (e) {
            }
        }, Rr = function (e, t) {
            return function (e) {
                e.preventDefault(), hr = e.target, t.forEach(function (t) {
                    var n = t.element, r = t.onenter;
                    mr(e, n) && (t.state = "enter", r(Tr(e)))
                })
            }
        }, Or = function (e, t) {
            return function (e) {
                e.preventDefault();
                var n = e.dataTransfer;
                nr(n).then(function (r) {
                    var o = !1;
                    t.some(function (t) {
                        var i = t.filterElement, a = t.element, s = t.onenter, u = t.onexit, l = t.ondrag, c = t.allowdrop;
                        gr(n, "copy");
                        var f = c(r);
                        if (f) if (mr(e, a)) {
                            if (o = !0, null === t.state) return t.state = "enter", void s(Tr(e));
                            if (t.state = "over", i && !f) return void gr(n, "none");
                            l(Tr(e))
                        } else i && !o && gr(n, "none"), t.state && (t.state = null, u(Tr(e))); else gr(n, "none")
                    })
                })
            }
        }, yr = function (e, t) {
            return function (e) {
                e.preventDefault();
                var n = e.dataTransfer;
                nr(n).then(function (n) {
                    t.forEach(function (t) {
                        var r = t.filterElement, o = t.element, i = t.ondrop, a = t.onexit, s = t.allowdrop;
                        if (t.state = null, !r || mr(e, o)) return s(n) ? void i(Tr(e), n) : a(Tr(e))
                    })
                })
            }
        }, Dr = function (e, t) {
            return function (e) {
                hr === e.target && t.forEach(function (t) {
                    var n = t.onexit;
                    t.state = null, n(Tr(e))
                })
            }
        }, Sr = function (e, t, n) {
            e.classList.add("filepond--hopper");
            var r = n.catchesDropsOnPage, o = n.requiresDropOnElement, i = n.filterItems, a = void 0 === i ? function (e) {
                return e
            } : i, s = function (e, t, n) {
                var r = Ir(t), o = {
                    element: e, filterElement: n, state: null, ondrop: function () {
                    }, onenter: function () {
                    }, ondrag: function () {
                    }, onexit: function () {
                    }, onload: function () {
                    }, allowdrop: function () {
                    }
                };
                return o.destroy = r.addListener(o), o
            }(e, r ? document.documentElement : e, o), u = "", l = "";
            s.allowdrop = function (e) {
                return t(a(e))
            }, s.ondrop = function (e, n) {
                var r = a(n);
                t(r) ? (l = "drag-drop", c.onload(r, e)) : c.ondragend(e)
            }, s.ondrag = function (e) {
                c.ondrag(e)
            }, s.onenter = function (e) {
                l = "drag-over", c.ondragstart(e)
            }, s.onexit = function (e) {
                l = "drag-exit", c.ondragend(e)
            };
            var c = {
                updateHopperState: function () {
                    u !== l && (e.dataset.hopperState = l, u = l)
                }, onload: function () {
                }, ondragstart: function () {
                }, ondrag: function () {
                }, ondragend: function () {
                }, destroy: function () {
                    s.destroy()
                }
            };
            return c
        }, Ar = !1, Lr = [], br = function (e) {
            var t = document.activeElement;
            if (t && /textarea|input/i.test(t.nodeName)) {
                for (var n = !1, r = t; r !== document.body;) {
                    if (r.classList.contains("filepond--root")) {
                        n = !0;
                        break
                    }
                    r = r.parentNode
                }
                if (!n) return
            }
            nr(e.clipboardData).then(function (e) {
                e.length && Lr.forEach(function (t) {
                    return t(e)
                })
            })
        }, Pr = function () {
            var e = function (e) {
                t.onload(e)
            }, t = {
                destroy: function () {
                    var t;
                    t = e, de(Lr, Lr.indexOf(t)), 0 === Lr.length && (document.removeEventListener("paste", br), Ar = !1)
                }, onload: function () {
                }
            };
            return function (e) {
                Lr.includes(e) || (Lr.push(e), Ar || (Ar = !0, document.addEventListener("paste", br)))
            }(e), t
        }, Mr = null, wr = null, Cr = [], Nr = function (e, t) {
            e.element.textContent = t
        }, Gr = function (e, t, n) {
            var r = e.query("GET_TOTAL_ITEMS");
            Nr(e, n + " " + t + ", " + r + " " + (1 === r ? e.query("GET_LABEL_FILE_COUNT_SINGULAR") : e.query("GET_LABEL_FILE_COUNT_PLURAL"))), clearTimeout(wr), wr = setTimeout(function () {
                !function (e) {
                    e.element.textContent = ""
                }(e)
            }, 1500)
        }, Ur = function (e) {
            return e.element.parentNode.contains(document.activeElement)
        }, Br = function (e) {
            var t = e.root, n = e.action, r = t.query("GET_ITEM", n.id).filename,
                o = t.query("GET_LABEL_FILE_PROCESSING_ABORTED");
            Nr(t, r + " " + o)
        }, Fr = function (e) {
            var t = e.root, n = e.action, r = t.query("GET_ITEM", n.id).filename;
            Nr(t, n.status.main + " " + r + " " + n.status.sub)
        }, qr = S({
            create: function (e) {
                var t = e.root, n = e.props;
                t.element.id = "filepond--assistant-" + n.id, r(t.element, "role", "status"), r(t.element, "aria-live", "polite"), r(t.element, "aria-relevant", "additions")
            }, ignoreRect: !0, ignoreRectUpdate: !0, write: A({
                DID_LOAD_ITEM: function (e) {
                    var t = e.root, n = e.action;
                    if (Ur(t)) {
                        t.element.textContent = "";
                        var r = t.query("GET_ITEM", n.id);
                        Cr.push(r.filename), clearTimeout(Mr), Mr = setTimeout(function () {
                            Gr(t, Cr.join(", "), t.query("GET_LABEL_FILE_ADDED")), Cr.length = 0
                        }, 750)
                    }
                },
                DID_REMOVE_ITEM: function (e) {
                    var t = e.root, n = e.action;
                    if (Ur(t)) {
                        var r = n.item;
                        Gr(t, r.filename, t.query("GET_LABEL_FILE_REMOVED"))
                    }
                },
                DID_COMPLETE_ITEM_PROCESSING: function (e) {
                    var t = e.root, n = e.action, r = t.query("GET_ITEM", n.id).filename,
                        o = t.query("GET_LABEL_FILE_PROCESSING_COMPLETE");
                    Nr(t, r + " " + o)
                },
                DID_ABORT_ITEM_PROCESSING: Br,
                DID_REVERT_ITEM_PROCESSING: Br,
                DID_THROW_ITEM_REMOVE_ERROR: Fr,
                DID_THROW_ITEM_LOAD_ERROR: Fr,
                DID_THROW_ITEM_INVALID: Fr,
                DID_THROW_ITEM_PROCESSING_ERROR: Fr
            }), tag: "span", name: "assistant"
        }), Vr = function (e) {
            var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : "-";
            return e.replace(new RegExp(t + ".", "g"), function (e) {
                return e.charAt(1).toUpperCase()
            })
        }, xr = function (e) {
            var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : 16,
                n = !(arguments.length > 2 && void 0 !== arguments[2]) || arguments[2], r = Date.now(), o = null;
            return function () {
                for (var i = arguments.length, a = new Array(i), s = 0; s < i; s++) a[s] = arguments[s];
                clearTimeout(o);
                var u = Date.now() - r, l = function () {
                    r = Date.now(), e.apply(void 0, a)
                };
                u < t ? n || (o = setTimeout(l, t - u)) : l()
            }
        }, Yr = function (e) {
            return e.preventDefault()
        }, kr = function (e) {
            var t = e.ref.list.childViews[0].childViews[0];
            return t ? {top: t.rect.element.marginTop, bottom: t.rect.element.marginBottom} : {top: 0, bottom: 0}
        }, jr = function (e) {
            var t = 0, n = 0, r = e.ref.list, o = r.childViews[0], i = o.childViews.filter(function (e) {
                return e.rect.element.height
            }), a = e.query("GET_ACTIVE_ITEMS").map(function (e) {
                return i.find(function (t) {
                    return t.id === e.id
                })
            }).filter(function (e) {
                return e
            });
            if (0 === a.length) return {visual: t, bounds: n};
            var s = o.rect.element.width, u = gn(o, a, r.dragCoordinates), l = a[0].rect.element,
                c = l.marginTop + l.marginBottom, f = l.marginLeft + l.marginRight, d = l.width + f, p = l.height + c,
                E = void 0 !== u && u >= 0 ? 1 : 0, _ = a.find(function (e) {
                    return e.markedForRemoval && e.opacity < .45
                }) ? -1 : 0, T = a.length + E + _, I = hn(s, d);
            return 1 === I ? a.forEach(function (e) {
                var r = e.rect.element.height + c;
                n += r, t += r * e.opacity
            }) : (n = Math.ceil(T / I) * p, t = n), {visual: t, bounds: n}
        }, Hr = function (e) {
            var t = e.ref.measureHeight || null;
            return {cappedHeight: parseInt(e.style.maxHeight, 10) || null, fixedHeight: 0 === t ? null : t}
        }, Xr = function (e, t) {
            var n = e.query("GET_ALLOW_REPLACE"), r = e.query("GET_ALLOW_MULTIPLE"), o = e.query("GET_TOTAL_ITEMS"),
                i = e.query("GET_MAX_FILES"), a = t.length;
            return !r && a > 1 ? (e.dispatch("DID_THROW_MAX_FILES", {
                source: t,
                error: ot("warning", 0, "Max files")
            }), !0) : !(!r && n) && (!!(V(i = r ? i : 1) && o + a > i) && (e.dispatch("DID_THROW_MAX_FILES", {
                source: t,
                error: ot("warning", 0, "Max files")
            }), !0))
        }, Wr = function (e, t, n) {
            var r = e.childViews[0];
            return gn(r, t, {
                left: n.scopeLeft - r.rect.element.left,
                top: n.scopeTop - (e.rect.outer.top + e.rect.element.marginTop + e.rect.element.scrollTop)
            })
        }, zr = function (e) {
            var t = e.query("GET_ALLOW_DROP"), n = e.query("GET_DISABLED"), r = t && !n;
            if (r && !e.ref.hopper) {
                var o = Sr(e.element, function (t) {
                    var n = e.query("GET_BEFORE_DROP_FILE") || function () {
                        return !0
                    };
                    return !e.query("GET_DROP_VALIDATION") || t.every(function (t) {
                        return ye("ALLOW_HOPPER_ITEM", t, {query: e.query}).every(function (e) {
                            return !0 === e
                        }) && n(t)
                    })
                }, {
                    filterItems: function (t) {
                        var n = e.query("GET_IGNORED_FILES");
                        return t.filter(function (e) {
                            return !ht(e) || !n.includes(e.name.toLowerCase())
                        })
                    },
                    catchesDropsOnPage: e.query("GET_DROP_ON_PAGE"),
                    requiresDropOnElement: e.query("GET_DROP_ON_ELEMENT")
                });
                o.onload = function (t, n) {
                    var r = e.ref.list.childViews[0].childViews.filter(function (e) {
                        return e.rect.element.height
                    }), o = e.query("GET_ACTIVE_ITEMS").map(function (e) {
                        return r.find(function (t) {
                            return t.id === e.id
                        })
                    }).filter(function (e) {
                        return e
                    });
                    Oe("ADD_ITEMS", t, {dispatch: e.dispatch}).then(function (t) {
                        if (Xr(e, t)) return !1;
                        e.dispatch("ADD_ITEMS", {items: t, index: Wr(e.ref.list, o, n), interactionMethod: ee})
                    }), e.dispatch("DID_DROP", {position: n}), e.dispatch("DID_END_DRAG", {position: n})
                }, o.ondragstart = function (t) {
                    e.dispatch("DID_START_DRAG", {position: t})
                }, o.ondrag = xr(function (t) {
                    e.dispatch("DID_DRAG", {position: t})
                }), o.ondragend = function (t) {
                    e.dispatch("DID_END_DRAG", {position: t})
                }, e.ref.hopper = o, e.ref.drip = e.appendChildView(e.createChildView(Hn))
            } else !r && e.ref.hopper && (e.ref.hopper.destroy(), e.ref.hopper = null, e.removeChildView(e.ref.drip))
        }, Qr = function (e, t) {
            var n = e.query("GET_ALLOW_BROWSE"), r = e.query("GET_DISABLED"), o = n && !r;
            o && !e.ref.browser ? e.ref.browser = e.appendChildView(e.createChildView(Fn, Object.assign({}, t, {
                onload: function (t) {
                    Oe("ADD_ITEMS", t, {dispatch: e.dispatch}).then(function (t) {
                        if (Xr(e, t)) return !1;
                        e.dispatch("ADD_ITEMS", {items: t, index: -1, interactionMethod: te})
                    })
                }
            })), 0) : !o && e.ref.browser && (e.removeChildView(e.ref.browser), e.ref.browser = null)
        }, Zr = function (e) {
            var t = e.query("GET_ALLOW_PASTE"), n = e.query("GET_DISABLED"), r = t && !n;
            r && !e.ref.paster ? (e.ref.paster = Pr(), e.ref.paster.onload = function (t) {
                Oe("ADD_ITEMS", t, {dispatch: e.dispatch}).then(function (t) {
                    if (Xr(e, t)) return !1;
                    e.dispatch("ADD_ITEMS", {items: t, index: -1, interactionMethod: ne})
                })
            }) : !r && e.ref.paster && (e.ref.paster.destroy(), e.ref.paster = null)
        }, Kr = A({
            DID_SET_ALLOW_BROWSE: function (e) {
                var t = e.root, n = e.props;
                Qr(t, n)
            }, DID_SET_ALLOW_DROP: function (e) {
                var t = e.root;
                zr(t)
            }, DID_SET_ALLOW_PASTE: function (e) {
                var t = e.root;
                Zr(t)
            }, DID_SET_DISABLED: function (e) {
                var t = e.root, n = e.props;
                zr(t), Zr(t), Qr(t, n), t.query("GET_DISABLED") ? t.element.dataset.disabled = "disabled" : t.element.removeAttribute("data-disabled")
            }
        }), $r = S({
            name: "root", read: function (e) {
                var t = e.root;
                t.ref.measure && (t.ref.measureHeight = t.ref.measure.offsetHeight)
            }, create: function (e) {
                var t = e.root, n = e.props, r = t.query("GET_ID");
                r && (t.element.id = r);
                var o = t.query("GET_CLASS_NAME");
                o && o.split(" ").filter(function (e) {
                    return e.length
                }).forEach(function (e) {
                    t.element.classList.add(e)
                }), t.ref.label = t.appendChildView(t.createChildView(Yn, Object.assign({}, n, {
                    translateY: null,
                    caption: t.query("GET_LABEL_IDLE")
                }))), t.ref.list = t.appendChildView(t.createChildView(bn, {translateY: null})), t.ref.panel = t.appendChildView(t.createChildView(En, {name: "panel-root"})), t.ref.assistant = t.appendChildView(t.createChildView(qr, Object.assign({}, n))), t.ref.data = t.appendChildView(t.createChildView(Kn, Object.assign({}, n))), t.ref.measure = Ct("div"), t.ref.measure.style.height = "100%", t.element.appendChild(t.ref.measure), t.ref.bounds = null, t.query("GET_STYLES").filter(function (e) {
                    return !M(e.value)
                }).map(function (e) {
                    var n = e.name, r = e.value;
                    t.element.dataset[n] = r
                }), t.ref.widthPrevious = null, t.ref.widthUpdated = xr(function () {
                    t.ref.updateHistory = [], t.dispatch("DID_RESIZE_ROOT")
                }, 250), t.ref.previousAspectRatio = null, t.ref.updateHistory = [];
                var i = window.matchMedia("(pointer: fine) and (hover: hover)").matches, a = "PointerEvent" in window;
                t.query("GET_ALLOW_REORDER") && a && !i && (t.element.addEventListener("touchmove", Yr, {passive: !1}), t.element.addEventListener("gesturestart", Yr));
                var s = t.query("GET_CREDITS");
                if (2 === s.length) {
                    var u = document.createElement("a");
                    u.className = "filepond--credits", u.setAttribute("aria-hidden", "true"), u.href = s[0], u.tabindex = -1, u.target = "_blank", u.rel = "noopener noreferrer", u.textContent = s[1], t.element.appendChild(u), t.ref.credits = u
                }
            }, write: function (e) {
                var t = e.root, n = e.props, r = e.actions;
                if (Kr({root: t, props: n, actions: r}), r.filter(function (e) {
                    return /^DID_SET_STYLE_/.test(e.type)
                }).filter(function (e) {
                    return !M(e.data.value)
                }).map(function (e) {
                    var n = e.type, r = e.data, o = Vr(n.substring(8).toLowerCase(), "_");
                    t.element.dataset[o] = r.value, t.invalidateLayout()
                }), !t.rect.element.hidden) {
                    t.rect.element.width !== t.ref.widthPrevious && (t.ref.widthPrevious = t.rect.element.width, t.ref.widthUpdated());
                    var o = t.ref.bounds;
                    o || (o = t.ref.bounds = Hr(t), t.element.removeChild(t.ref.measure), t.ref.measure = null);
                    var i = t.ref, a = i.hopper, s = i.label, u = i.list, l = i.panel;
                    a && a.updateHopperState();
                    var c = t.query("GET_PANEL_ASPECT_RATIO"), f = t.query("GET_ALLOW_MULTIPLE"),
                        d = t.query("GET_TOTAL_ITEMS"), p = d === (f ? t.query("GET_MAX_FILES") || 1e6 : 1),
                        E = r.find(function (e) {
                            return "DID_ADD_ITEM" === e.type
                        });
                    if (p && E) {
                        var _ = E.data.interactionMethod;
                        s.opacity = 0, f ? s.translateY = -40 : _ === J ? s.translateX = 40 : s.translateY = _ === te ? 40 : 30
                    } else p || (s.opacity = 1, s.translateX = 0, s.translateY = 0);
                    var T = kr(t), I = jr(t), v = s.rect.element.height, m = !f || p ? 0 : v,
                        h = p ? u.rect.element.marginTop : 0, g = 0 === d ? 0 : u.rect.element.marginBottom,
                        R = m + h + I.visual + g, O = m + h + I.bounds + g;
                    if (u.translateY = Math.max(0, m - u.rect.element.marginTop) - T.top, c) {
                        var y = t.rect.element.width, D = y * c;
                        c !== t.ref.previousAspectRatio && (t.ref.previousAspectRatio = c, t.ref.updateHistory = []);
                        var S = t.ref.updateHistory;
                        if (S.push(y), S.length > 4) for (var A = S.length, L = A - 10, b = 0, P = A; P >= L; P--) if (S[P] === S[P - 2] && b++, b >= 2) return;
                        l.scalable = !1, l.height = D;
                        var w = D - m - (g - T.bottom) - (p ? h : 0);
                        I.visual > w ? u.overflow = w : u.overflow = null, t.height = D
                    } else if (o.fixedHeight) {
                        l.scalable = !1;
                        var C = o.fixedHeight - m - (g - T.bottom) - (p ? h : 0);
                        I.visual > C ? u.overflow = C : u.overflow = null
                    } else if (o.cappedHeight) {
                        var N = R >= o.cappedHeight, G = Math.min(o.cappedHeight, R);
                        l.scalable = !0, l.height = N ? G : G - T.top - T.bottom;
                        var U = G - m - (g - T.bottom) - (p ? h : 0);
                        R > o.cappedHeight && I.visual > U ? u.overflow = U : u.overflow = null, t.height = Math.min(o.cappedHeight, O - T.top - T.bottom)
                    } else {
                        var B = d > 0 ? T.top + T.bottom : 0;
                        l.scalable = !0, l.height = Math.max(v, R - B), t.height = Math.max(v, O - B)
                    }
                    t.ref.credits && l.heightCurrent && (t.ref.credits.style.transform = "translateY(" + l.heightCurrent + "px)")
                }
            }, destroy: function (e) {
                var t = e.root;
                t.ref.paster && t.ref.paster.destroy(), t.ref.hopper && t.ref.hopper.destroy(), t.element.removeEventListener("touchmove", Yr), t.element.removeEventListener("gesturestart", Yr)
            }, mixins: {styles: ["height"]}
        }), Jr = function () {
            var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {}, r = null, o = Se(),
                i = function (e) {
                    var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : [],
                        n = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : [], r = Object.assign({}, e),
                        o = [], i = [], a = function (e, t, n) {
                            !n || document.hidden ? (c[e] && c[e](t), o.push({type: e, data: t})) : i.push({type: e, data: t})
                        }, s = function (e) {
                            for (var t, n = arguments.length, r = new Array(n > 1 ? n - 1 : 0), o = 1; o < n; o++) r[o - 1] = arguments[o];
                            return l[e] ? (t = l)[e].apply(t, r) : null
                        }, u = {
                            getState: function () {
                                return Object.assign({}, r)
                            }, processActionQueue: function () {
                                var e = [].concat(o);
                                return o.length = 0, e
                            }, processDispatchQueue: function () {
                                var e = [].concat(i);
                                i.length = 0, e.forEach(function (e) {
                                    var t = e.type, n = e.data;
                                    a(t, n)
                                })
                            }, dispatch: a, query: s
                        }, l = {};
                    t.forEach(function (e) {
                        l = Object.assign({}, e(r), {}, l)
                    });
                    var c = {};
                    return n.forEach(function (e) {
                        c = Object.assign({}, e(a, s, r), {}, c)
                    }), u
                }({
                    items: [],
                    listUpdateTimeout: null,
                    itemUpdateTimeout: null,
                    processingQueue: [],
                    options: Q(o)
                }, [Ve, $(o)], [Pt, K(o)]);
            i.dispatch("SET_OPTIONS", {options: e});
            var a = function () {
                document.hidden || i.dispatch("KICK")
            };
            document.addEventListener("visibilitychange", a);
            var s = null, u = !1, l = !1, c = null, f = null, d = function () {
                u || (u = !0), clearTimeout(s), s = setTimeout(function () {
                    u = !1, c = null, f = null, l && (l = !1, i.dispatch("DID_STOP_RESIZE"))
                }, 500)
            };
            window.addEventListener("resize", d);
            var p = $r(i, {id: oe()}), E = !1, T = !1, I = {
                _read: function () {
                    u && (f = window.innerWidth, c || (c = f), l || f === c || (i.dispatch("DID_START_RESIZE"), l = !0)), T && E && (E = null === p.element.offsetParent), E || (p._read(), T = p.rect.element.hidden)
                }, _write: function (e) {
                    var t, n = i.processActionQueue().filter(function (e) {
                        return !/^SET_/.test(e.type)
                    });
                    E && !n.length || (g(n), E = p._write(e, n, l), (t = i.query("GET_ITEMS")).forEach(function (e, n) {
                        e.released && de(t, n)
                    }), E && i.processDispatchQueue())
                }
            }, v = function (e) {
                return function (t) {
                    var n = {type: e};
                    if (!t) return n;
                    if (t.hasOwnProperty("error") && (n.error = t.error ? Object.assign({}, t.error) : null), t.status && (n.status = Object.assign({}, t.status)), t.file && (n.output = t.file), t.source) n.file = t.source; else if (t.item || t.id) {
                        var r = t.item ? t.item : i.query("GET_ITEM", t.id);
                        n.file = r ? Te(r) : null
                    }
                    return t.items && (n.items = t.items.map(Te)), /progress/.test(e) && (n.progress = t.progress), t.hasOwnProperty("origin") && t.hasOwnProperty("target") && (n.origin = t.origin, n.target = t.target), n
                }
            }, m = {
                DID_DESTROY: v("destroy"),
                DID_INIT: v("init"),
                DID_THROW_MAX_FILES: v("warning"),
                DID_INIT_ITEM: v("initfile"),
                DID_START_ITEM_LOAD: v("addfilestart"),
                DID_UPDATE_ITEM_LOAD_PROGRESS: v("addfileprogress"),
                DID_LOAD_ITEM: v("addfile"),
                DID_THROW_ITEM_INVALID: [v("error"), v("addfile")],
                DID_THROW_ITEM_LOAD_ERROR: [v("error"), v("addfile")],
                DID_THROW_ITEM_REMOVE_ERROR: [v("error"), v("removefile")],
                DID_PREPARE_OUTPUT: v("preparefile"),
                DID_START_ITEM_PROCESSING: v("processfilestart"),
                DID_UPDATE_ITEM_PROCESS_PROGRESS: v("processfileprogress"),
                DID_ABORT_ITEM_PROCESSING: v("processfileabort"),
                DID_COMPLETE_ITEM_PROCESSING: v("processfile"),
                DID_COMPLETE_ITEM_PROCESSING_ALL: v("processfiles"),
                DID_REVERT_ITEM_PROCESSING: v("processfilerevert"),
                DID_THROW_ITEM_PROCESSING_ERROR: [v("error"), v("processfile")],
                DID_REMOVE_ITEM: v("removefile"),
                DID_UPDATE_ITEMS: v("updatefiles"),
                DID_ACTIVATE_ITEM: v("activatefile"),
                DID_REORDER_ITEMS: v("reorderfiles")
            }, h = function (e) {
                var t = Object.assign({pond: A}, e);
                delete t.type, p.element.dispatchEvent(new CustomEvent("FilePond:" + e.type, {
                    detail: t,
                    bubbles: !0,
                    cancelable: !0,
                    composed: !0
                }));
                var n = [];
                e.hasOwnProperty("error") && n.push(e.error), e.hasOwnProperty("file") && n.push(e.file);
                var r = ["type", "error", "file"];
                Object.keys(e).filter(function (e) {
                    return !r.includes(e)
                }).forEach(function (t) {
                    return n.push(e[t])
                }), A.fire.apply(A, [e.type].concat(n));
                var o = i.query("GET_ON" + e.type.toUpperCase());
                o && o.apply(void 0, n)
            }, g = function (e) {
                e.length && e.filter(function (e) {
                    return m[e.type]
                }).forEach(function (e) {
                    var t = m[e.type];
                    (Array.isArray(t) ? t : [t]).forEach(function (t) {
                        "DID_INIT_ITEM" === e.type ? h(t(e.data)) : setTimeout(function () {
                            h(t(e.data))
                        }, 0)
                    })
                })
            }, R = function (e) {
                return new Promise(function (t, n) {
                    i.dispatch("REQUEST_ITEM_PREPARE", {
                        query: e, success: function (e) {
                            t(e)
                        }, failure: function (e) {
                            n(e)
                        }
                    })
                })
            }, O = function (e, t) {
                var n;
                return "object" != typeof e || (n = e).file && n.id || t || (t = e, e = void 0), i.dispatch("REMOVE_ITEM", Object.assign({}, t, {query: e})), null === i.query("GET_ACTIVE_ITEM", e)
            }, y = function () {
                for (var e = arguments.length, t = new Array(e), n = 0; n < e; n++) t[n] = arguments[n];
                return new Promise(function (e, n) {
                    var r = [], o = {};
                    if (P(t[0])) r.push.apply(r, t[0]), Object.assign(o, t[1] || {}); else {
                        var a = t[t.length - 1];
                        "object" != typeof a || a instanceof Blob || Object.assign(o, t.pop()), r.push.apply(r, t)
                    }
                    i.dispatch("ADD_ITEMS", {items: r, index: o.index, interactionMethod: J, success: e, failure: n})
                })
            }, D = function () {
                return i.query("GET_ACTIVE_ITEMS")
            }, S = function (e) {
                return new Promise(function (t, n) {
                    i.dispatch("REQUEST_ITEM_PROCESSING", {
                        query: e, success: function (e) {
                            t(e)
                        }, failure: function (e) {
                            n(e)
                        }
                    })
                })
            }, A = Object.assign({}, pe(), {}, I, {}, function (e, n) {
                var r = {};
                return t(n, function (t) {
                    r[t] = {
                        get: function () {
                            return e.getState().options[t]
                        }, set: function (n) {
                            e.dispatch("SET_" + Z(t, "_").toUpperCase(), {value: n})
                        }
                    }
                }), r
            }(i, o), {
                setOptions: function (e) {
                    return i.dispatch("SET_OPTIONS", {options: e})
                }, addFile: function (e) {
                    var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {};
                    return new Promise(function (n, r) {
                        y([{source: e, options: t}], {index: t.index}).then(function (e) {
                            return n(e && e[0])
                        }).catch(r)
                    })
                }, addFiles: y, getFile: function (e) {
                    return i.query("GET_ACTIVE_ITEM", e)
                }, processFile: S, prepareFile: R, removeFile: O, moveFile: function (e, t) {
                    return i.dispatch("MOVE_ITEM", {query: e, index: t})
                }, getFiles: D, processFiles: function () {
                    for (var e = arguments.length, t = new Array(e), n = 0; n < e; n++) t[n] = arguments[n];
                    var r = Array.isArray(t[0]) ? t[0] : t;
                    if (!r.length) {
                        var o = D().filter(function (e) {
                            return !(e.status === Ie.IDLE && e.origin === ve.LOCAL) && e.status !== Ie.PROCESSING && e.status !== Ie.PROCESSING_COMPLETE && e.status !== Ie.PROCESSING_REVERT_ERROR
                        });
                        return Promise.all(o.map(S))
                    }
                    return Promise.all(r.map(S))
                }, removeFiles: function () {
                    for (var e = arguments.length, t = new Array(e), n = 0; n < e; n++) t[n] = arguments[n];
                    var r, o = Array.isArray(t[0]) ? t[0] : t;
                    "object" == typeof o[o.length - 1] ? r = o.pop() : Array.isArray(t[0]) && (r = t[1]);
                    var i = D();
                    return o.length ? o.map(function (e) {
                        return _(e) ? i[e] ? i[e].id : null : e
                    }).filter(function (e) {
                        return e
                    }).map(function (e) {
                        return O(e, r)
                    }) : Promise.all(i.map(function (e) {
                        return O(e, r)
                    }))
                }, prepareFiles: function () {
                    for (var e = arguments.length, t = new Array(e), n = 0; n < e; n++) t[n] = arguments[n];
                    var r = Array.isArray(t[0]) ? t[0] : t, o = r.length ? r : D();
                    return Promise.all(o.map(R))
                }, sort: function (e) {
                    return i.dispatch("SORT", {compare: e})
                }, browse: function () {
                    var e = p.element.querySelector("input[type=file]");
                    e && e.click()
                }, destroy: function () {
                    A.fire("destroy", p.element), i.dispatch("ABORT_ALL"), p._destroy(), window.removeEventListener("resize", d), document.removeEventListener("visibilitychange", a), i.dispatch("DID_DESTROY")
                }, insertBefore: function (e) {
                    return L(p.element, e)
                }, insertAfter: function (e) {
                    return b(p.element, e)
                }, appendTo: function (e) {
                    return e.appendChild(p.element)
                }, replaceElement: function (e) {
                    L(p.element, e), e.parentNode.removeChild(e), r = e
                }, restoreElement: function () {
                    r && (b(r, p.element), p.element.parentNode.removeChild(p.element), r = null)
                }, isAttachedTo: function (e) {
                    return p.element === e || r === e
                }, element: {
                    get: function () {
                        return p.element
                    }
                }, status: {
                    get: function () {
                        return i.query("GET_STATUS")
                    }
                }
            });
            return i.dispatch("DID_INIT"), n(A)
        }, eo = function () {
            var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {}, n = {};
            return t(Se(), function (e, t) {
                n[e] = t[0]
            }), Jr(Object.assign({}, n, {}, e))
        }, to = function (e) {
            var n = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {}, o = [];
            t(e.attributes, function (t) {
                o.push(e.attributes[t])
            });
            var i = o.filter(function (e) {
                return e.name
            }).reduce(function (t, n) {
                var o, i = r(e, n.name);
                return t[(o = n.name, Vr(o.replace(/^data-/, "")))] = i === n.name || i, t
            }, {});
            return function e(n, r) {
                t(r, function (r, o) {
                    t(n, function (e, t) {
                        var i = new RegExp(r);
                        if (i.test(e) && (delete n[e], !1 !== o)) if (U(o)) n[o] = t; else {
                            var a, s = o.group;
                            H(o) && !n[s] && (n[s] = {}), n[s][(a = e.replace(i, ""), a.charAt(0).toLowerCase() + a.slice(1))] = t
                        }
                    }), o.mapping && e(n[o.group], o.mapping)
                })
            }(i, n), i
        }, no = function () {
            return (arguments.length <= 0 ? void 0 : arguments[0]) instanceof HTMLElement ? function (e) {
                var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {}, n = {
                    "^class$": "className",
                    "^multiple$": "allowMultiple",
                    "^capture$": "captureMethod",
                    "^webkitdirectory$": "allowDirectoriesOnly",
                    "^server": {
                        group: "server",
                        mapping: {
                            "^process": {group: "process"},
                            "^revert": {group: "revert"},
                            "^fetch": {group: "fetch"},
                            "^restore": {group: "restore"},
                            "^load": {group: "load"}
                        }
                    },
                    "^type$": !1,
                    "^files$": !1
                };
                ye("SET_ATTRIBUTE_TO_OPTION_MAP", n);
                var r = Object.assign({}, t),
                    o = to("FIELDSET" === e.nodeName ? e.querySelector("input[type=file]") : e, n);
                Object.keys(o).forEach(function (e) {
                    H(o[e]) ? (H(r[e]) || (r[e] = {}), Object.assign(r[e], o[e])) : r[e] = o[e]
                }), r.files = (t.files || []).concat(Array.from(e.querySelectorAll("input:not([type=file])")).map(function (e) {
                    return {source: e.value, options: {type: e.dataset.type}}
                }));
                var i = eo(r);
                return e.files && Array.from(e.files).forEach(function (e) {
                    i.addFile(e)
                }), i.replaceElement(e), i
            }.apply(void 0, arguments) : eo.apply(void 0, arguments)
        }, ro = ["fire", "_read", "_write"], oo = function (e) {
            var t = {};
            return Ee(e, t, ro), t
        }, io = function (e, t) {
            return e.replace(/(?:{([a-zA-Z]+)})/g, function (e, n) {
                return t[n]
            })
        }, ao = function (e) {
            var t = new Blob(["(", e.toString(), ")()"], {type: "application/javascript"}), n = URL.createObjectURL(t),
                r = new Worker(n);
            return {
                transfer: function (e, t) {
                }, post: function (e, t, n) {
                    var o = oe();
                    r.onmessage = function (e) {
                        e.data.id === o && t(e.data.message)
                    }, r.postMessage({id: o, message: e}, n)
                }, terminate: function () {
                    r.terminate(), URL.revokeObjectURL(n)
                }
            }
        }, so = function (e) {
            return new Promise(function (t, n) {
                var r = new Image;
                r.onload = function () {
                    t(r)
                }, r.onerror = function (e) {
                    n(e)
                }, r.src = e
            })
        }, uo = function (e, t) {
            var n = e.slice(0, e.size, e.type);
            return n.lastModifiedDate = e.lastModifiedDate, n.name = t, n
        }, lo = function (e) {
            return uo(e, e.name)
        }, co = [], fo = function (e) {
            if (!co.includes(e)) {
                co.push(e);
                var n, r = e({
                    addFilter: De,
                    utils: {
                        Type: ge,
                        forin: t,
                        isString: U,
                        isFile: ht,
                        toNaturalFileSize: qt,
                        replaceInString: io,
                        getExtensionFromFilename: je,
                        getFilenameWithoutExtension: mt,
                        guesstimateMimeType: tr,
                        getFileFromBlob: We,
                        getFilenameFromURL: ke,
                        createRoute: A,
                        createWorker: ao,
                        createView: S,
                        createItemAPI: Te,
                        loadImage: so,
                        copyFile: lo,
                        renameFile: uo,
                        createBlob: ze,
                        applyFilterChain: Oe,
                        text: Nt,
                        getNumericAspectRatioFromString: be
                    },
                    views: {fileActionButton: Ft}
                });
                n = r.options, Object.assign(Ae, n)
            }
        },
        po = (Kt = c() && !("[object OperaMini]" === Object.prototype.toString.call(window.operamini)) && "visibilityState" in document && "Promise" in window && "slice" in Blob.prototype && "URL" in window && "createObjectURL" in window.URL && "performance" in window && ("supports" in (window.CSS || {}) || /MSIE|Trident/.test(window.navigator.userAgent)), function () {
            return Kt
        }), Eo = {apps: []}, _o = function () {
        };
    if (e.Status = {}, e.FileStatus = {}, e.FileOrigin = {}, e.OptionTypes = {}, e.create = _o, e.destroy = _o, e.parse = _o, e.find = _o, e.registerPlugin = _o, e.getOptions = _o, e.setOptions = _o, po()) {
        !function (e, t) {
            var n = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : 60, r = "__framePainter";
            if (window[r]) return window[r].readers.push(e), void window[r].writers.push(t);
            window[r] = {readers: [e], writers: [t]};
            var o = window[r], i = 1e3 / n, a = null, s = null, u = null, l = null, c = function () {
                document.hidden ? (u = function () {
                    return window.setTimeout(function () {
                        return f(performance.now())
                    }, i)
                }, l = function () {
                    return window.clearTimeout(s)
                }) : (u = function () {
                    return window.requestAnimationFrame(f)
                }, l = function () {
                    return window.cancelAnimationFrame(s)
                })
            };
            document.addEventListener("visibilitychange", function () {
                l && l(), c(), f(performance.now())
            });
            var f = function e(t) {
                s = u(e), a || (a = t);
                var n = t - a;
                n <= i || (a = t - n % i, o.readers.forEach(function (e) {
                    return e()
                }), o.writers.forEach(function (e) {
                    return e(t)
                }))
            };
            c(), f(performance.now())
        }(function () {
            Eo.apps.forEach(function (e) {
                return e._read()
            })
        }, function (e) {
            Eo.apps.forEach(function (t) {
                return t._write(e)
            })
        });
        var To = function t() {
            document.dispatchEvent(new CustomEvent("FilePond:loaded", {
                detail: {
                    supported: po,
                    create: e.create,
                    destroy: e.destroy,
                    parse: e.parse,
                    find: e.find,
                    registerPlugin: e.registerPlugin,
                    setOptions: e.setOptions
                }
            })), document.removeEventListener("DOMContentLoaded", t)
        };
        "loading" !== document.readyState ? setTimeout(function () {
            return To()
        }, 0) : document.addEventListener("DOMContentLoaded", To);
        var Io = function () {
            return t(Se(), function (t, n) {
                e.OptionTypes[t] = n[1]
            })
        };
        e.Status = Object.assign({}, Me), e.FileOrigin = Object.assign({}, ve), e.FileStatus = Object.assign({}, Ie), e.OptionTypes = {}, Io(), e.create = function () {
            var t = no.apply(void 0, arguments);
            return t.on("destroy", e.destroy), Eo.apps.push(t), oo(t)
        }, e.destroy = function (e) {
            var t = Eo.apps.findIndex(function (t) {
                return t.isAttachedTo(e)
            });
            return t >= 0 && (Eo.apps.splice(t, 1)[0].restoreElement(), !0)
        }, e.parse = function (t) {
            return Array.from(t.querySelectorAll(".filepond")).filter(function (e) {
                return !Eo.apps.find(function (t) {
                    return t.isAttachedTo(e)
                })
            }).map(function (t) {
                return e.create(t)
            })
        }, e.find = function (e) {
            var t = Eo.apps.find(function (t) {
                return t.isAttachedTo(e)
            });
            return t ? oo(t) : null
        }, e.registerPlugin = function () {
            for (var e = arguments.length, t = new Array(e), n = 0; n < e; n++) t[n] = arguments[n];
            t.forEach(fo), Io()
        }, e.getOptions = function () {
            var e = {};
            return t(Se(), function (t, n) {
                e[t] = n[0]
            }), e
        }, e.setOptions = function (n) {
            return H(n) && (Eo.apps.forEach(function (e) {
                e.setOptions(n)
            }), function (e) {
                t(e, function (e, t) {
                    Ae[e] && (Ae[e][0] = z(t, Ae[e][0], Ae[e][1]))
                })
            }(n)), e.getOptions()
        }
    }
    e.supported = po, Object.defineProperty(e, "__esModule", {value: !0})
});


/*!
 * FilePondPluginImagePreview 4.6.11
 * Licensed under MIT, https://opensource.org/licenses/MIT/
 * Please visit https://pqina.nl/filepond/ for details.
 */

/* eslint-disable */

!function (e, t) {
    "object" == typeof exports && "undefined" != typeof module ? module.exports = t() : "function" == typeof define && define.amd ? define(t) : (e = e || self).FilePondPluginImagePreview = t()
}(this, function () {
    "use strict";

    function e(e) {
        this.wrapped = e
    }

    function t(t) {
        var i, r;

        function a(i, r) {
            try {
                var o = t[i](r), c = o.value, s = c instanceof e;
                Promise.resolve(s ? c.wrapped : c).then(function (e) {
                    s ? a("next", e) : n(o.done ? "return" : "normal", e)
                }, function (e) {
                    a("throw", e)
                })
            } catch (e) {
                n("throw", e)
            }
        }

        function n(e, t) {
            switch (e) {
                case"return":
                    i.resolve({value: t, done: !0});
                    break;
                case"throw":
                    i.reject(t);
                    break;
                default:
                    i.resolve({value: t, done: !1})
            }
            (i = i.next) ? a(i.key, i.arg) : r = null
        }

        this._invoke = function (e, t) {
            return new Promise(function (n, o) {
                var c = {key: e, arg: t, resolve: n, reject: o, next: null};
                r ? r = r.next = c : (i = r = c, a(e, t))
            })
        }, "function" != typeof t.return && (this.return = void 0)
    }

    "function" == typeof Symbol && Symbol.asyncIterator && (t.prototype[Symbol.asyncIterator] = function () {
        return this
    }), t.prototype.next = function (e) {
        return this._invoke("next", e)
    }, t.prototype.throw = function (e) {
        return this._invoke("throw", e)
    }, t.prototype.return = function (e) {
        return this._invoke("return", e)
    };

    function i(e, t) {
        return r(e) || function (e, t) {
            var i = [], r = !0, a = !1, n = void 0;
            try {
                for (var o, c = e[Symbol.iterator](); !(r = (o = c.next()).done) && (i.push(o.value), !t || i.length !== t); r = !0) ;
            } catch (e) {
                a = !0, n = e
            } finally {
                try {
                    r || null == c.return || c.return()
                } finally {
                    if (a) throw n
                }
            }
            return i
        }(e, t) || a()
    }

    function r(e) {
        if (Array.isArray(e)) return e
    }

    function a() {
        throw new TypeError("Invalid attempt to destructure non-iterable instance")
    }

    var n = function (e, t) {
            return s(e.x * t, e.y * t)
        }, o = function (e, t) {
            return s(e.x + t.x, e.y + t.y)
        }, c = function (e, t, i) {
            var r = Math.cos(t), a = Math.sin(t), n = s(e.x - i.x, e.y - i.y);
            return s(i.x + r * n.x - a * n.y, i.y + a * n.x + r * n.y)
        }, s = function () {
            return {
                x: arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : 0,
                y: arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : 0
            }
        }, h = function (e, t) {
            var i = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : 1,
                r = arguments.length > 3 ? arguments[3] : void 0;
            return "string" == typeof e ? parseFloat(e) * i : "number" == typeof e ? e * (r ? t[r] : Math.min(t.width, t.height)) : void 0
        }, u = function (e) {
            return null != e
        }, l = function (e, t) {
            return Object.keys(t).forEach(function (i) {
                return e.setAttribute(i, t[i])
            })
        }, d = function (e, t) {
            var i = document.createElementNS("http://www.w3.org/2000/svg", e);
            return t && l(i, t), i
        }, f = {contain: "xMidYMid meet", cover: "xMidYMid slice"}, p = {left: "start", center: "middle", right: "end"},
        g = function (e) {
            return function (t) {
                return d(e, {id: t.id})
            }
        }, m = {
            image: function (e) {
                var t = d("image", {id: e.id, "stroke-linecap": "round", "stroke-linejoin": "round", opacity: "0"});
                return t.onload = function () {
                    t.setAttribute("opacity", e.opacity || 1)
                }, t.setAttributeNS("http://www.w3.org/1999/xlink", "xlink:href", e.src), t
            }, rect: g("rect"), ellipse: g("ellipse"), text: g("text"), path: g("path"), line: function (e) {
                var t = d("g", {id: e.id, "stroke-linecap": "round", "stroke-linejoin": "round"}), i = d("line");
                t.appendChild(i);
                var r = d("path");
                t.appendChild(r);
                var a = d("path");
                return t.appendChild(a), t
            }
        }, y = {
            rect: function (e) {
                return l(e, Object.assign({}, e.rect, e.styles))
            }, ellipse: function (e) {
                var t = e.rect.x + .5 * e.rect.width, i = e.rect.y + .5 * e.rect.height, r = .5 * e.rect.width,
                    a = .5 * e.rect.height;
                return l(e, Object.assign({cx: t, cy: i, rx: r, ry: a}, e.styles))
            }, image: function (e, t) {
                l(e, Object.assign({}, e.rect, e.styles, {preserveAspectRatio: f[t.fit] || "none"}))
            }, text: function (e, t, i, r) {
                var a = h(t.fontSize, i, r), n = t.fontFamily || "sans-serif", o = t.fontWeight || "normal",
                    c = p[t.textAlign] || "start";
                l(e, Object.assign({}, e.rect, e.styles, {
                    "stroke-width": 0,
                    "font-weight": o,
                    "font-size": a,
                    "font-family": n,
                    "text-anchor": c
                })), e.text !== t.text && (e.text = t.text, e.textContent = t.text.length ? t.text : " ")
            }, path: function (e, t, i, r) {
                var a;
                l(e, Object.assign({}, e.styles, {
                    fill: "none", d: (a = t.points.map(function (e) {
                        return {x: h(e.x, i, r, "width"), y: h(e.y, i, r, "height")}
                    }), a.map(function (e, t) {
                        return "".concat(0 === t ? "M" : "L", " ").concat(e.x, " ").concat(e.y)
                    }).join(" "))
                }))
            }, line: function (e, t, i, r) {
                l(e, Object.assign({}, e.rect, e.styles, {fill: "none"}));
                var a = e.childNodes[0], u = e.childNodes[1], d = e.childNodes[2], f = e.rect,
                    p = {x: e.rect.x + e.rect.width, y: e.rect.y + e.rect.height};
                if (l(a, {x1: f.x, y1: f.y, x2: p.x, y2: p.y}), t.lineDecoration) {
                    u.style.display = "none", d.style.display = "none";
                    var g = function (e) {
                        var t = Math.sqrt(e.x * e.x + e.y * e.y);
                        return 0 === t ? {x: 0, y: 0} : s(e.x / t, e.y / t)
                    }({x: p.x - f.x, y: p.y - f.y}), m = h(.05, i, r);
                    if (-1 !== t.lineDecoration.indexOf("arrow-begin")) {
                        var y = n(g, m), E = o(f, y), v = c(f, 2, E), w = c(f, -2, E);
                        l(u, {
                            style: "display:block;",
                            d: "M".concat(v.x, ",").concat(v.y, " L").concat(f.x, ",").concat(f.y, " L").concat(w.x, ",").concat(w.y)
                        })
                    }
                    if (-1 !== t.lineDecoration.indexOf("arrow-end")) {
                        var _ = n(g, -m), I = o(p, _), M = c(p, 2, I), x = c(p, -2, I);
                        l(d, {
                            style: "display:block;",
                            d: "M".concat(M.x, ",").concat(M.y, " L").concat(p.x, ",").concat(p.y, " L").concat(x.x, ",").concat(x.y)
                        })
                    }
                }
            }
        }, E = function (e, t, i, r, a) {
            "path" !== t && (e.rect = function (e, t) {
                var i = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : 1,
                    r = h(e.x, t, i, "width") || h(e.left, t, i, "width"),
                    a = h(e.y, t, i, "height") || h(e.top, t, i, "height"), n = h(e.width, t, i, "width"),
                    o = h(e.height, t, i, "height"), c = h(e.right, t, i, "width"), s = h(e.bottom, t, i, "height");
                return u(a) || (a = u(o) && u(s) ? t.height - o - s : s), u(r) || (r = u(n) && u(c) ? t.width - n - c : c), u(n) || (n = u(r) && u(c) ? t.width - r - c : 0), u(o) || (o = u(a) && u(s) ? t.height - a - s : 0), {
                    x: r || 0,
                    y: a || 0,
                    width: n || 0,
                    height: o || 0
                }
            }(i, r, a)), e.styles = function (e, t, i) {
                var r = e.borderStyle || e.lineStyle || "solid", a = e.backgroundColor || e.fontColor || "transparent",
                    n = e.borderColor || e.lineColor || "transparent", o = h(e.borderWidth || e.lineWidth, t, i);
                return {
                    "stroke-linecap": e.lineCap || "round",
                    "stroke-linejoin": e.lineJoin || "round",
                    "stroke-width": o || 0,
                    "stroke-dasharray": "string" == typeof r ? "" : r.map(function (e) {
                        return h(e, t, i)
                    }).join(","),
                    stroke: n,
                    fill: a,
                    opacity: e.opacity || 1
                }
            }(i, r, a), y[t](e, i, r, a)
        }, v = ["x", "y", "left", "top", "right", "bottom", "width", "height"], w = function (e) {
            var t = i(e, 2), r = t[0], a = t[1], n = a.points ? {} : v.reduce(function (e, t) {
                var i;
                return e[t] = "string" == typeof (i = a[t]) && /%/.test(i) ? parseFloat(i) / 100 : i, e
            }, {});
            return [r, Object.assign({zIndex: 0}, a, n)]
        }, _ = function (e, t) {
            return e[1].zIndex > t[1].zIndex ? 1 : e[1].zIndex < t[1].zIndex ? -1 : 0
        }, I = function (e) {
            return e.utils.createView({
                name: "image-preview-markup",
                tag: "svg",
                ignoreRect: !0,
                mixins: {apis: ["width", "height", "crop", "markup", "resize", "dirty"]},
                write: function (e) {
                    var t = e.root, r = e.props;
                    if (r.dirty) {
                        var a = r.crop, n = r.resize, o = r.markup, c = r.width, s = r.height, h = a.width, u = a.height;
                        if (n) {
                            var l = n.size, d = l && l.width, f = l && l.height, p = n.mode, g = n.upscale;
                            d && !f && (f = d), f && !d && (d = f);
                            var y = h < d && u < f;
                            if (!y || y && g) {
                                var v, I = d / h, M = f / u;
                                if ("force" === p) h = d, u = f; else "cover" === p ? v = Math.max(I, M) : "contain" === p && (v = Math.min(I, M)), h *= v, u *= v
                            }
                        }
                        var x = {width: c, height: s};
                        t.element.setAttribute("width", x.width), t.element.setAttribute("height", x.height);
                        var T = Math.min(c / h, s / u);
                        t.element.innerHTML = "";
                        var A = t.query("GET_IMAGE_PREVIEW_MARKUP_FILTER");
                        o.filter(A).map(w).sort(_).forEach(function (e) {
                            var r = i(e, 2), a = r[0], n = r[1], o = function (e, t) {
                                return m[e](t)
                            }(a, n);
                            E(o, a, n, x, T), t.element.appendChild(o)
                        })
                    }
                }
            })
        }, M = function (e, t) {
            return {x: e, y: t}
        }, x = function (e, t) {
            return M(e.x - t.x, e.y - t.y)
        }, T = function (e, t) {
            return Math.sqrt(function (e, t) {
                return function (e, t) {
                    return e.x * t.x + e.y * t.y
                }(x(e, t), x(e, t))
            }(e, t))
        }, A = function (e, t) {
            var i = e, r = t, a = 1.5707963267948966 - t, n = Math.sin(1.5707963267948966), o = Math.sin(r),
                c = Math.sin(a), s = Math.cos(a), h = i / n;
            return M(s * (h * o), s * (h * c))
        }, R = function (e, t, i, r) {
            var a = r.x > .5 ? 1 - r.x : r.x, n = r.y > .5 ? 1 - r.y : r.y, o = 2 * a * e.width, c = 2 * n * e.height,
                s = function (e, t) {
                    var i = e.width, r = e.height, a = A(i, t), n = A(r, t),
                        o = M(e.x + Math.abs(a.x), e.y - Math.abs(a.y)),
                        c = M(e.x + e.width + Math.abs(n.y), e.y + Math.abs(n.x)),
                        s = M(e.x - Math.abs(n.y), e.y + e.height - Math.abs(n.x));
                    return {width: T(o, c), height: T(o, s)}
                }(t, i);
            return Math.max(s.width / o, s.height / c)
        }, P = function (e, t) {
            var i = e.width, r = i * t;
            return r > e.height && (i = (r = e.height) / t), {
                x: .5 * (e.width - i),
                y: .5 * (e.height - r),
                width: i,
                height: r
            }
        }, C = function (e) {
            var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {}, i = t.zoom, r = t.rotation,
                a = t.center, n = t.aspectRatio;
            n || (n = e.height / e.width);
            var o = function (e, t) {
                    var i = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : 1, r = e.height / e.width, a = t,
                        n = 1, o = r;
                    o > a && (n = (o = a) / r);
                    var c = Math.max(1 / n, a / o), s = e.width / (i * c * n);
                    return {width: s, height: s * t}
                }(e, n, i), c = {x: .5 * o.width, y: .5 * o.height},
                s = {x: 0, y: 0, width: o.width, height: o.height, center: c}, h = void 0 === t.scaleToFit || t.scaleToFit,
                u = i * R(e, P(s, n), r, h ? a : {x: .5, y: .5});
            return {
                widthFloat: o.width / u,
                heightFloat: o.height / u,
                width: Math.round(o.width / u),
                height: Math.round(o.height / u)
            }
        }, k = {type: "spring", stiffness: .5, damping: .45, mass: 10}, D = function (e) {
            return e.utils.createView({
                name: "image-clip",
                tag: "div",
                ignoreRect: !0,
                mixins: {
                    apis: ["crop", "markup", "resize", "width", "height", "dirty", "background"],
                    styles: ["width", "height", "opacity"],
                    animations: {opacity: {type: "tween", duration: 250}}
                },
                didWriteView: function (e) {
                    var t = e.root, i = e.props;
                    i.background && (t.element.style.backgroundColor = i.background)
                },
                create: function (t) {
                    var i = t.root, r = t.props;
                    i.ref.image = i.appendChildView(i.createChildView(function (e) {
                        return e.utils.createView({
                            name: "image-canvas-wrapper",
                            tag: "div",
                            ignoreRect: !0,
                            mixins: {
                                apis: ["crop", "width", "height"],
                                styles: ["originX", "originY", "translateX", "translateY", "scaleX", "scaleY", "rotateZ"],
                                animations: {
                                    originX: k,
                                    originY: k,
                                    scaleX: k,
                                    scaleY: k,
                                    translateX: k,
                                    translateY: k,
                                    rotateZ: k
                                }
                            },
                            create: function (t) {
                                var i = t.root, r = t.props;
                                r.width = r.image.width, r.height = r.image.height, i.ref.bitmap = i.appendChildView(i.createChildView(function (e) {
                                    return e.utils.createView({
                                        name: "image-bitmap",
                                        ignoreRect: !0,
                                        mixins: {styles: ["scaleX", "scaleY"]},
                                        create: function (e) {
                                            var t = e.root, i = e.props;
                                            t.appendChild(i.image)
                                        }
                                    })
                                }(e), {image: r.image}))
                            },
                            write: function (e) {
                                var t = e.root, i = e.props.crop.flip, r = t.ref.bitmap;
                                r.scaleX = i.horizontal ? -1 : 1, r.scaleY = i.vertical ? -1 : 1
                            }
                        })
                    }(e), Object.assign({}, r))), i.ref.createMarkup = function () {
                        i.ref.markup || (i.ref.markup = i.appendChildView(i.createChildView(I(e), Object.assign({}, r))))
                    }, i.ref.destroyMarkup = function () {
                        i.ref.markup && (i.removeChildView(i.ref.markup), i.ref.markup = null)
                    };
                    var a = i.query("GET_IMAGE_PREVIEW_TRANSPARENCY_INDICATOR");
                    null !== a && (i.element.dataset.transparencyIndicator = "grid" === a ? a : "color")
                },
                write: function (e) {
                    var t = e.root, i = e.props, r = e.shouldOptimize, a = i.crop, n = i.markup, o = i.resize, c = i.dirty,
                        s = i.width, h = i.height;
                    t.ref.image.crop = a;
                    var u = {x: 0, y: 0, width: s, height: h, center: {x: .5 * s, y: .5 * h}},
                        l = {width: t.ref.image.width, height: t.ref.image.height},
                        d = {x: a.center.x * l.width, y: a.center.y * l.height},
                        f = {x: u.center.x - l.width * a.center.x, y: u.center.y - l.height * a.center.y},
                        p = 2 * Math.PI + a.rotation % (2 * Math.PI), g = a.aspectRatio || l.height / l.width,
                        m = void 0 === a.scaleToFit || a.scaleToFit, y = R(l, P(u, g), p, m ? a.center : {x: .5, y: .5}),
                        E = a.zoom * y;
                    n && n.length ? (t.ref.createMarkup(), t.ref.markup.width = s, t.ref.markup.height = h, t.ref.markup.resize = o, t.ref.markup.dirty = c, t.ref.markup.markup = n, t.ref.markup.crop = C(l, a)) : t.ref.markup && t.ref.destroyMarkup();
                    var v = t.ref.image;
                    if (r) return v.originX = null, v.originY = null, v.translateX = null, v.translateY = null, v.rotateZ = null, v.scaleX = null, void (v.scaleY = null);
                    v.originX = d.x, v.originY = d.y, v.translateX = f.x, v.translateY = f.y, v.rotateZ = p, v.scaleX = E, v.scaleY = E
                }
            })
        }, G = 0, V = function () {
            self.onmessage = function (e) {
                createImageBitmap(e.data.message.file).then(function (t) {
                    self.postMessage({id: e.data.id, message: t}, [t])
                })
            }
        }, O = function () {
            self.onmessage = function (e) {
                for (var t = e.data.message.imageData, i = e.data.message.colorMatrix, r = t.data, a = r.length, n = i[0], o = i[1], c = i[2], s = i[3], h = i[4], u = i[5], l = i[6], d = i[7], f = i[8], p = i[9], g = i[10], m = i[11], y = i[12], E = i[13], v = i[14], w = i[15], _ = i[16], I = i[17], M = i[18], x = i[19], T = 0, A = 0, R = 0, P = 0, C = 0; T < a; T += 4) A = r[T] / 255, R = r[T + 1] / 255, P = r[T + 2] / 255, C = r[T + 3] / 255, r[T] = Math.max(0, Math.min(255 * (A * n + R * o + P * c + C * s + h), 255)), r[T + 1] = Math.max(0, Math.min(255 * (A * u + R * l + P * d + C * f + p), 255)), r[T + 2] = Math.max(0, Math.min(255 * (A * g + R * m + P * y + C * E + v), 255)), r[T + 3] = Math.max(0, Math.min(255 * (A * w + R * _ + P * I + C * M + x), 255));
                self.postMessage({id: e.data.id, message: t}, [t.data.buffer])
            }
        }, b = {
            1: function () {
                return [1, 0, 0, 1, 0, 0]
            }, 2: function (e) {
                return [-1, 0, 0, 1, e, 0]
            }, 3: function (e, t) {
                return [-1, 0, 0, -1, e, t]
            }, 4: function (e, t) {
                return [1, 0, 0, -1, 0, t]
            }, 5: function () {
                return [0, 1, 1, 0, 0, 0]
            }, 6: function (e, t) {
                return [0, 1, -1, 0, t, 0]
            }, 7: function (e, t) {
                return [0, -1, -1, 0, t, e]
            }, 8: function (e) {
                return [0, -1, 1, 0, 0, e]
            }
        }, S = function (e, t, i, r) {
            t = Math.round(t), i = Math.round(i);
            var a = document.createElement("canvas");
            a.width = t, a.height = i;
            var n = a.getContext("2d");
            if (r >= 5 && r <= 8) {
                var o = [i, t];
                t = o[0], i = o[1]
            }
            return function (e, t, i, r) {
                -1 !== r && e.transform.apply(e, b[r](t, i))
            }(n, t, i, r), n.drawImage(e, 0, 0, t, i), a
        }, L = function (e) {
            return /^image/.test(e.type) && !/svg/.test(e.type)
        }, N = function (e) {
            var t = Math.min(10 / e.width, 10 / e.height), i = document.createElement("canvas"), r = i.getContext("2d"),
                a = i.width = Math.ceil(e.width * t), n = i.height = Math.ceil(e.height * t);
            r.drawImage(e, 0, 0, a, n);
            var o = null;
            try {
                o = r.getImageData(0, 0, a, n).data
            } catch (e) {
                return null
            }
            for (var c = o.length, s = 0, h = 0, u = 0, l = 0; l < c; l += 4) s += o[l] * o[l], h += o[l + 1] * o[l + 1], u += o[l + 2] * o[l + 2];
            return {r: s = W(s, c), g: h = W(h, c), b: u = W(u, c)}
        }, W = function (e, t) {
            return Math.floor(Math.sqrt(e / (t / 4)))
        }, z = function (e) {
            var t = e.utils.createView({
                name: "image-preview-overlay", tag: "div", ignoreRect: !0, create: function (e) {
                    var t = e.root, i = e.props,
                        r = '<svg width="500" height="200" viewBox="0 0 500 200" preserveAspectRatio="none">\n    <defs>\n        <radialGradient id="gradient-__UID__" cx=".5" cy="1.25" r="1.15">\n            <stop offset=\'50%\' stop-color=\'#000000\'/>\n            <stop offset=\'56%\' stop-color=\'#0a0a0a\'/>\n            <stop offset=\'63%\' stop-color=\'#262626\'/>\n            <stop offset=\'69%\' stop-color=\'#4f4f4f\'/>\n            <stop offset=\'75%\' stop-color=\'#808080\'/>\n            <stop offset=\'81%\' stop-color=\'#b1b1b1\'/>\n            <stop offset=\'88%\' stop-color=\'#dadada\'/>\n            <stop offset=\'94%\' stop-color=\'#f6f6f6\'/>\n            <stop offset=\'100%\' stop-color=\'#ffffff\'/>\n        </radialGradient>\n        <mask id="mask-__UID__">\n            <rect x="0" y="0" width="500" height="200" fill="url(#gradient-__UID__)"></rect>\n        </mask>\n    </defs>\n    <rect x="0" width="500" height="200" fill="currentColor" mask="url(#mask-__UID__)"></rect>\n</svg>';
                    if (document.querySelector("base")) {
                        var a = new URL(window.location.href.replace(window.location.hash, "")).href;
                        r = r.replace(/url\(\#/g, "url(" + a + "#")
                    }
                    G++, t.element.classList.add("filepond--image-preview-overlay-".concat(i.status)), t.element.innerHTML = r.replace(/__UID__/g, G)
                }, mixins: {styles: ["opacity"], animations: {opacity: {type: "spring", mass: 25}}}
            }), i = function (e) {
                return e.utils.createView({
                    name: "image-preview",
                    tag: "div",
                    ignoreRect: !0,
                    mixins: {
                        apis: ["image", "crop", "markup", "resize", "dirty", "background"],
                        styles: ["translateY", "scaleX", "scaleY", "opacity"],
                        animations: {scaleX: k, scaleY: k, translateY: k, opacity: {type: "tween", duration: 400}}
                    },
                    create: function (t) {
                        var i = t.root, r = t.props;
                        i.ref.clip = i.appendChildView(i.createChildView(D(e), {
                            id: r.id,
                            image: r.image,
                            crop: r.crop,
                            markup: r.markup,
                            resize: r.resize,
                            dirty: r.dirty,
                            background: r.background
                        }))
                    },
                    write: function (e) {
                        var t = e.root, i = e.props, r = e.shouldOptimize, a = t.ref.clip, n = i.image, o = i.crop,
                            c = i.markup, s = i.resize, h = i.dirty;
                        if (a.crop = o, a.markup = c, a.resize = s, a.dirty = h, a.opacity = r ? 0 : 1, !r && !t.rect.element.hidden) {
                            var u = n.height / n.width, l = o.aspectRatio || u, d = t.rect.inner.width,
                                f = t.rect.inner.height, p = t.query("GET_IMAGE_PREVIEW_HEIGHT"),
                                g = t.query("GET_IMAGE_PREVIEW_MIN_HEIGHT"), m = t.query("GET_IMAGE_PREVIEW_MAX_HEIGHT"),
                                y = t.query("GET_PANEL_ASPECT_RATIO"), E = t.query("GET_ALLOW_MULTIPLE");
                            y && !E && (p = d * y, l = y);
                            var v = null !== p ? p : Math.max(g, Math.min(d * l, m)), w = v / l;
                            w > d && (v = (w = d) * l), v > f && (v = f, w = f / l), a.width = w, a.height = v
                        }
                    }
                })
            }(e), r = e.utils.createWorker, a = function (e, t, i) {
                return new Promise(function (a) {
                    e.ref.imageData || (e.ref.imageData = i.getContext("2d").getImageData(0, 0, i.width, i.height));
                    var n = function (e) {
                        var t;
                        try {
                            t = new ImageData(e.width, e.height)
                        } catch (i) {
                            t = document.createElement("canvas").getContext("2d").createImageData(e.width, e.height)
                        }
                        return t.data.set(new Uint8ClampedArray(e.data)), t
                    }(e.ref.imageData);
                    if (!t || 20 !== t.length) return i.getContext("2d").putImageData(n, 0, 0), a();
                    var o = r(O);
                    o.post({imageData: n, colorMatrix: t}, function (e) {
                        i.getContext("2d").putImageData(e, 0, 0), o.terminate(), a()
                    }, [n.data.buffer])
                })
            }, n = function (e) {
                var t = e.root, r = e.props, a = e.image, n = r.id, o = t.query("GET_ITEM", {id: n});
                if (o) {
                    var c, s, h = o.getMetadata("crop") || {
                        center: {x: .5, y: .5},
                        flip: {horizontal: !1, vertical: !1},
                        zoom: 1,
                        rotation: 0,
                        aspectRatio: null
                    }, u = t.query("GET_IMAGE_TRANSFORM_CANVAS_BACKGROUND_COLOR"), l = !1;
                    t.query("GET_IMAGE_PREVIEW_MARKUP_SHOW") && (c = o.getMetadata("markup") || [], s = o.getMetadata("resize"), l = !0);
                    var d = t.appendChildView(t.createChildView(i, {
                        id: n,
                        image: a,
                        crop: h,
                        resize: s,
                        markup: c,
                        dirty: l,
                        background: u,
                        opacity: 0,
                        scaleX: 1.15,
                        scaleY: 1.15,
                        translateY: 15
                    }), t.childViews.length);
                    t.ref.images.push(d), d.opacity = 1, d.scaleX = 1, d.scaleY = 1, d.translateY = 0, setTimeout(function () {
                        t.dispatch("DID_IMAGE_PREVIEW_SHOW", {id: n})
                    }, 250)
                }
            }, o = function (e) {
                var t = e.root;
                t.ref.overlayShadow.opacity = 1, t.ref.overlayError.opacity = 0, t.ref.overlaySuccess.opacity = 0
            }, c = function (e) {
                var t = e.root;
                t.ref.overlayShadow.opacity = .25, t.ref.overlayError.opacity = 1
            };
            return e.utils.createView({
                name: "image-preview-wrapper", create: function (e) {
                    var i = e.root;
                    i.ref.images = [], i.ref.imageData = null, i.ref.imageViewBin = [], i.ref.overlayShadow = i.appendChildView(i.createChildView(t, {
                        opacity: 0,
                        status: "idle"
                    })), i.ref.overlaySuccess = i.appendChildView(i.createChildView(t, {
                        opacity: 0,
                        status: "success"
                    })), i.ref.overlayError = i.appendChildView(i.createChildView(t, {opacity: 0, status: "failure"}))
                }, styles: ["height"], apis: ["height"], destroy: function (e) {
                    e.root.ref.images.forEach(function (e) {
                        e.image.width = 1, e.image.height = 1
                    })
                }, didWriteView: function (e) {
                    e.root.ref.images.forEach(function (e) {
                        e.dirty = !1
                    })
                }, write: e.utils.createRoute({
                    DID_IMAGE_PREVIEW_DRAW: function (e) {
                        var t = e.root, i = t.ref.images[t.ref.images.length - 1];
                        i.translateY = 0, i.scaleX = 1, i.scaleY = 1, i.opacity = 1
                    },
                    DID_IMAGE_PREVIEW_CONTAINER_CREATE: function (e) {
                        var t = e.root, i = e.props.id, r = t.query("GET_ITEM", i);
                        if (r) {
                            var a, n, o, c = URL.createObjectURL(r.file);
                            a = c, n = function (e, r) {
                                t.dispatch("DID_IMAGE_PREVIEW_CALCULATE_SIZE", {id: i, width: e, height: r})
                            }, (o = new Image).onload = function () {
                                var e = o.naturalWidth, t = o.naturalHeight;
                                o = null, n(e, t)
                            }, o.src = a
                        }
                    },
                    DID_FINISH_CALCULATE_PREVIEWSIZE: function (e) {
                        var t = e.root, i = e.props, o = i.id, c = t.query("GET_ITEM", o);
                        if (c) {
                            var s, h, u = URL.createObjectURL(c.file), l = function () {
                                var e;
                                (e = u, new Promise(function (t, i) {
                                    var r = new Image;
                                    r.crossOrigin = "Anonymous", r.onload = function () {
                                        t(r)
                                    }, r.onerror = function (e) {
                                        i(e)
                                    }, r.src = e
                                })).then(d)
                            }, d = function (e) {
                                URL.revokeObjectURL(u);
                                var r = (c.getMetadata("exif") || {}).orientation || -1, o = e.width, s = e.height;
                                if (o && s) {
                                    if (r >= 5 && r <= 8) {
                                        var h = [s, o];
                                        o = h[0], s = h[1]
                                    }
                                    var l = Math.max(1, .75 * window.devicePixelRatio),
                                        d = t.query("GET_IMAGE_PREVIEW_ZOOM_FACTOR") * l, f = s / o,
                                        p = t.rect.element.width, g = t.rect.element.height, m = p, y = m * f;
                                    f > 1 ? y = (m = Math.min(o, p * d)) * f : m = (y = Math.min(s, g * d)) / f;
                                    var E = S(e, m, y, r), v = function () {
                                        var r = t.query("GET_IMAGE_PREVIEW_CALCULATE_AVERAGE_IMAGE_COLOR") ? N(data) : null;
                                        c.setMetadata("color", r, !0), "close" in e && e.close(), t.ref.overlayShadow.opacity = 1, n({
                                            root: t,
                                            props: i,
                                            image: E
                                        })
                                    }, w = c.getMetadata("filter");
                                    w ? a(t, w, E).then(v) : v()
                                }
                            };
                            if (s = c.file, !(((h = window.navigator.userAgent.match(/Firefox\/([0-9]+)\./)) ? parseInt(h[1]) : null) <= 58) && "createImageBitmap" in window && L(s)) {
                                var f = r(V);
                                f.post({file: c.file}, function (e) {
                                    f.terminate(), e ? d(e) : l()
                                })
                            } else l()
                        }
                    },
                    DID_UPDATE_ITEM_METADATA: function (e) {
                        var t = e.root, i = e.props, r = e.action;
                        if (/crop|filter|markup|resize/.test(r.change.key) && t.ref.images.length) {
                            var o = t.query("GET_ITEM", {id: i.id});
                            if (o) if (/filter/.test(r.change.key)) {
                                var c = t.ref.images[t.ref.images.length - 1];
                                a(t, r.change.value, c.image)
                            } else {
                                if (/crop|markup|resize/.test(r.change.key)) {
                                    var s = o.getMetadata("crop"), h = t.ref.images[t.ref.images.length - 1];
                                    if (s && s.aspectRatio && h.crop && h.crop.aspectRatio && Math.abs(s.aspectRatio - h.crop.aspectRatio) > 1e-5) {
                                        var u = function (e) {
                                            var t = e.root, i = t.ref.images.shift();
                                            return i.opacity = 0, i.translateY = -15, t.ref.imageViewBin.push(i), i
                                        }({root: t});
                                        n({
                                            root: t,
                                            props: i,
                                            image: (l = u.image, (d = d || document.createElement("canvas")).width = l.width, d.height = l.height, d.getContext("2d").drawImage(l, 0, 0), d)
                                        })
                                    } else !function (e) {
                                        var t = e.root, i = e.props, r = t.query("GET_ITEM", {id: i.id});
                                        if (r) {
                                            var a = t.ref.images[t.ref.images.length - 1];
                                            a.crop = r.getMetadata("crop"), a.background = t.query("GET_IMAGE_TRANSFORM_CANVAS_BACKGROUND_COLOR"), t.query("GET_IMAGE_PREVIEW_MARKUP_SHOW") && (a.dirty = !0, a.resize = r.getMetadata("resize"), a.markup = r.getMetadata("markup"))
                                        }
                                    }({root: t, props: i})
                                }
                                var l, d
                            }
                        }
                    },
                    DID_THROW_ITEM_LOAD_ERROR: c,
                    DID_THROW_ITEM_PROCESSING_ERROR: c,
                    DID_THROW_ITEM_INVALID: c,
                    DID_COMPLETE_ITEM_PROCESSING: function (e) {
                        var t = e.root;
                        t.ref.overlayShadow.opacity = .25, t.ref.overlaySuccess.opacity = 1
                    },
                    DID_START_ITEM_PROCESSING: o,
                    DID_REVERT_ITEM_PROCESSING: o
                }, function (e) {
                    var t = e.root, i = t.ref.imageViewBin.filter(function (e) {
                        return 0 === e.opacity
                    });
                    t.ref.imageViewBin = t.ref.imageViewBin.filter(function (e) {
                        return e.opacity > 0
                    }), i.forEach(function (e) {
                        return function (e, t) {
                            e.removeChildView(t), t.image.width = 1, t.image.height = 1, t._destroy()
                        }(t, e)
                    }), i.length = 0
                })
            })
        }, H = function (e) {
            var t = e.addFilter, i = e.utils, r = i.Type, a = i.createRoute, n = i.isFile, o = z(e);
            return t("CREATE_VIEW", function (e) {
                var t = e.is, i = e.view, r = e.query;
                if (t("file") && r("GET_ALLOW_IMAGE_PREVIEW")) {
                    var c = function (e) {
                        e.root.ref.shouldRescale = !0
                    };
                    i.registerWriter(a({
                        DID_RESIZE_ROOT: c, DID_STOP_RESIZE: c, DID_LOAD_ITEM: function (e) {
                            var t = e.root, a = e.props.id, c = r("GET_ITEM", a);
                            if (c && n(c.file) && !c.archived) {
                                var s = c.file;
                                if (function (e) {
                                    return /^image/.test(e.type)
                                }(s) && r("GET_IMAGE_PREVIEW_FILTER_ITEM")(c)) {
                                    var h = "createImageBitmap" in (window || {}), u = r("GET_IMAGE_PREVIEW_MAX_FILE_SIZE");
                                    if (!(!h && u && s.size > u)) {
                                        t.ref.imagePreview = i.appendChildView(i.createChildView(o, {id: a}));
                                        var l = t.query("GET_IMAGE_PREVIEW_HEIGHT");
                                        l && t.dispatch("DID_UPDATE_PANEL_HEIGHT", {id: c.id, height: l});
                                        var d = !h && s.size > r("GET_IMAGE_PREVIEW_MAX_INSTANT_PREVIEW_FILE_SIZE");
                                        t.dispatch("DID_IMAGE_PREVIEW_CONTAINER_CREATE", {id: a}, d)
                                    }
                                }
                            }
                        }, DID_IMAGE_PREVIEW_CALCULATE_SIZE: function (e) {
                            var t = e.root, i = e.action;
                            t.ref.imageWidth = i.width, t.ref.imageHeight = i.height, t.ref.shouldRescale = !0, t.ref.shouldDrawPreview = !0, t.dispatch("KICK")
                        }, DID_UPDATE_ITEM_METADATA: function (e) {
                            var t = e.root;
                            "crop" === e.action.change.key && (t.ref.shouldRescale = !0)
                        }
                    }, function (e) {
                        var t = e.root, i = e.props;
                        t.ref.imagePreview && (t.rect.element.hidden || (t.ref.shouldRescale && (!function (e, t) {
                            if (e.ref.imagePreview) {
                                var i = t.id, r = e.query("GET_ITEM", {id: i});
                                if (r) {
                                    var a = e.query("GET_PANEL_ASPECT_RATIO"), n = e.query("GET_ITEM_PANEL_ASPECT_RATIO"),
                                        o = e.query("GET_IMAGE_PREVIEW_HEIGHT");
                                    if (!(a || n || o)) {
                                        var c = e.ref, s = c.imageWidth, h = c.imageHeight;
                                        if (s && h) {
                                            var u = e.query("GET_IMAGE_PREVIEW_MIN_HEIGHT"),
                                                l = e.query("GET_IMAGE_PREVIEW_MAX_HEIGHT"),
                                                d = (r.getMetadata("exif") || {}).orientation || -1;
                                            if (d >= 5 && d <= 8) {
                                                var f = [h, s];
                                                s = f[0], h = f[1]
                                            }
                                            if (!L(r.file) || e.query("GET_IMAGE_PREVIEW_UPSCALE")) {
                                                var p = 2048 / s;
                                                s *= p, h *= p
                                            }
                                            var g = h / s, m = (r.getMetadata("crop") || {}).aspectRatio || g,
                                                y = Math.max(u, Math.min(h, l)), E = e.rect.element.width,
                                                v = Math.min(E * m, y);
                                            e.dispatch("DID_UPDATE_PANEL_HEIGHT", {id: r.id, height: v})
                                        }
                                    }
                                }
                            }
                        }(t, i), t.ref.shouldRescale = !1), t.ref.shouldDrawPreview && (requestAnimationFrame(function () {
                            requestAnimationFrame(function () {
                                t.dispatch("DID_FINISH_CALCULATE_PREVIEWSIZE", {id: i.id})
                            })
                        }), t.ref.shouldDrawPreview = !1)))
                    }))
                }
            }), {
                options: {
                    allowImagePreview: [!0, r.BOOLEAN],
                    imagePreviewFilterItem: [function () {
                        return !0
                    }, r.FUNCTION],
                    imagePreviewHeight: [null, r.INT],
                    imagePreviewMinHeight: [44, r.INT],
                    imagePreviewMaxHeight: [256, r.INT],
                    imagePreviewMaxFileSize: [null, r.INT],
                    imagePreviewZoomFactor: [2, r.INT],
                    imagePreviewUpscale: [!1, r.BOOLEAN],
                    imagePreviewMaxInstantPreviewFileSize: [1e6, r.INT],
                    imagePreviewTransparencyIndicator: [null, r.STRING],
                    imagePreviewCalculateAverageImageColor: [!1, r.BOOLEAN],
                    imagePreviewMarkupShow: [!0, r.BOOLEAN],
                    imagePreviewMarkupFilter: [function () {
                        return !0
                    }, r.FUNCTION]
                }
            }
        };
    return "undefined" != typeof window && void 0 !== window.document && document.dispatchEvent(new CustomEvent("FilePond:pluginloaded", {detail: H})), H
});


(function ($, FilePond) {
    'use strict';

    // No jQuery No Go
    if (!$ || !FilePond) {
        return;
    }

    // Test if FilePond is supported
    if (!FilePond.supported()) {
        // add stub
        $.fn.filepond = function () {
        };
        return;
    }

    // Helpers
    function argsToArray(args) {
        return Array.prototype.slice.call(args);
    }

    function isFactory(args) {
        return !args.length || typeof args[0] === 'object';
    }

    function isGetter(obj, key) {
        var descriptor = Object.getOwnPropertyDescriptor(obj, key);
        return descriptor ? typeof descriptor.get !== 'undefined' : false;
    }

    function isSetter(obj, key) {
        var descriptor = Object.getOwnPropertyDescriptor(obj, key);
        return descriptor ? typeof descriptor.set !== 'undefined' : false;
    }

    function isMethod(obj, key) {
        return typeof obj[key] === 'function';
    }

    // Setup plugin
    $.fn.filepond = function () {

        // get arguments as array
        var args = argsToArray(arguments);

        // method results array
        var results = [];

        // Execute for every item in the list
        var items = this.each(function () {

            // test if is create call
            if (isFactory(args)) {
                FilePond.create(this, args[0])
                return;
            }

            // get a reference to the pond instance based on the element
            var pond = FilePond.find(this);

            // if no pond found, exit here
            if (!pond) {
                return;
            }

            // get property name or method name
            var key = args[0];

            // get params to pass
            var params = args.concat().slice(1);

            // run method
            if (isMethod(pond, key)) {
                results.push(pond[key].apply(pond, params));
                return;
            }

            // set setter
            if (isSetter(pond, key) && params.length) {
                pond[key] = params[0];
                return;
            }

            // get getter
            if (isGetter(pond, key)) {
                results.push(pond[key]);
                return;
            }

            console.warn('$().filepond("' + key + '") is an unknown property or method.');
        });

        // returns a jQuery object if no results returned
        return results.length ? this.length === 1 ? results[0] : results : items;
    };

    // Static API
    Object.keys(FilePond).forEach(function (key) {
        $.fn.filepond[key] = FilePond[key];
    });

    // Redirect setDefaults to setOptions
    $.fn.filepond.setDefaults = FilePond.setOptions;

}(jQuery, FilePond));

/*!
   Copyright 2008-2021 SpryMedia Ltd.

 This source file is free software, available under the following license:
   MIT license - http://datatables.net/license

 This source file is distributed in the hope that it will be useful, but
 WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY
 or FITNESS FOR A PARTICULAR PURPOSE. See the license files for details.

 For details please refer to: http://www.datatables.net
 DataTables 1.11.3
 ©2008-2021 SpryMedia Ltd - datatables.net/license
*/
var $jscomp=$jscomp||{};$jscomp.scope={};$jscomp.findInternal=function(l,z,A){l instanceof String&&(l=String(l));for(var q=l.length,E=0;E<q;E++){var P=l[E];if(z.call(A,P,E,l))return{i:E,v:P}}return{i:-1,v:void 0}};$jscomp.ASSUME_ES5=!1;$jscomp.ASSUME_NO_NATIVE_MAP=!1;$jscomp.ASSUME_NO_NATIVE_SET=!1;$jscomp.SIMPLE_FROUND_POLYFILL=!1;$jscomp.ISOLATE_POLYFILLS=!1;
$jscomp.defineProperty=$jscomp.ASSUME_ES5||"function"==typeof Object.defineProperties?Object.defineProperty:function(l,z,A){if(l==Array.prototype||l==Object.prototype)return l;l[z]=A.value;return l};$jscomp.getGlobal=function(l){l=["object"==typeof globalThis&&globalThis,l,"object"==typeof window&&window,"object"==typeof self&&self,"object"==typeof global&&global];for(var z=0;z<l.length;++z){var A=l[z];if(A&&A.Math==Math)return A}throw Error("Cannot find global object");};$jscomp.global=$jscomp.getGlobal(this);
$jscomp.IS_SYMBOL_NATIVE="function"===typeof Symbol&&"symbol"===typeof Symbol("x");$jscomp.TRUST_ES6_POLYFILLS=!$jscomp.ISOLATE_POLYFILLS||$jscomp.IS_SYMBOL_NATIVE;$jscomp.polyfills={};$jscomp.propertyToPolyfillSymbol={};$jscomp.POLYFILL_PREFIX="$jscp$";var $jscomp$lookupPolyfilledValue=function(l,z){var A=$jscomp.propertyToPolyfillSymbol[z];if(null==A)return l[z];A=l[A];return void 0!==A?A:l[z]};
$jscomp.polyfill=function(l,z,A,q){z&&($jscomp.ISOLATE_POLYFILLS?$jscomp.polyfillIsolated(l,z,A,q):$jscomp.polyfillUnisolated(l,z,A,q))};$jscomp.polyfillUnisolated=function(l,z,A,q){A=$jscomp.global;l=l.split(".");for(q=0;q<l.length-1;q++){var E=l[q];if(!(E in A))return;A=A[E]}l=l[l.length-1];q=A[l];z=z(q);z!=q&&null!=z&&$jscomp.defineProperty(A,l,{configurable:!0,writable:!0,value:z})};
$jscomp.polyfillIsolated=function(l,z,A,q){var E=l.split(".");l=1===E.length;q=E[0];q=!l&&q in $jscomp.polyfills?$jscomp.polyfills:$jscomp.global;for(var P=0;P<E.length-1;P++){var ma=E[P];if(!(ma in q))return;q=q[ma]}E=E[E.length-1];A=$jscomp.IS_SYMBOL_NATIVE&&"es6"===A?q[E]:null;z=z(A);null!=z&&(l?$jscomp.defineProperty($jscomp.polyfills,E,{configurable:!0,writable:!0,value:z}):z!==A&&($jscomp.propertyToPolyfillSymbol[E]=$jscomp.IS_SYMBOL_NATIVE?$jscomp.global.Symbol(E):$jscomp.POLYFILL_PREFIX+E,
    E=$jscomp.propertyToPolyfillSymbol[E],$jscomp.defineProperty(q,E,{configurable:!0,writable:!0,value:z})))};$jscomp.polyfill("Array.prototype.find",function(l){return l?l:function(z,A){return $jscomp.findInternal(this,z,A).v}},"es6","es3");
(function(l){"function"===typeof define&&define.amd?define(["jquery"],function(z){return l(z,window,document)}):"object"===typeof exports?module.exports=function(z,A){z||(z=window);A||(A="undefined"!==typeof window?require("jquery"):require("jquery")(z));return l(A,z,z.document)}:window.DataTable=l(jQuery,window,document)})(function(l,z,A,q){function E(a){var b,c,d={};l.each(a,function(e,h){(b=e.match(/^([^A-Z]+?)([A-Z])/))&&-1!=="a aa ai ao as b fn i m o s ".indexOf(b[1]+" ")&&(c=e.replace(b[0],
    b[2].toLowerCase()),d[c]=e,"o"===b[1]&&E(a[e]))});a._hungarianMap=d}function P(a,b,c){a._hungarianMap||E(a);var d;l.each(b,function(e,h){d=a._hungarianMap[e];d===q||!c&&b[d]!==q||("o"===d.charAt(0)?(b[d]||(b[d]={}),l.extend(!0,b[d],b[e]),P(a[d],b[d],c)):b[d]=b[e])})}function ma(a){var b=u.defaults.oLanguage,c=b.sDecimal;c&&Wa(c);if(a){var d=a.sZeroRecords;!a.sEmptyTable&&d&&"No data available in table"===b.sEmptyTable&&X(a,a,"sZeroRecords","sEmptyTable");!a.sLoadingRecords&&d&&"Loading..."===b.sLoadingRecords&&
X(a,a,"sZeroRecords","sLoadingRecords");a.sInfoThousands&&(a.sThousands=a.sInfoThousands);(a=a.sDecimal)&&c!==a&&Wa(a)}}function zb(a){S(a,"ordering","bSort");S(a,"orderMulti","bSortMulti");S(a,"orderClasses","bSortClasses");S(a,"orderCellsTop","bSortCellsTop");S(a,"order","aaSorting");S(a,"orderFixed","aaSortingFixed");S(a,"paging","bPaginate");S(a,"pagingType","sPaginationType");S(a,"pageLength","iDisplayLength");S(a,"searching","bFilter");"boolean"===typeof a.sScrollX&&(a.sScrollX=a.sScrollX?"100%":
    "");"boolean"===typeof a.scrollX&&(a.scrollX=a.scrollX?"100%":"");if(a=a.aoSearchCols)for(var b=0,c=a.length;b<c;b++)a[b]&&P(u.models.oSearch,a[b])}function Ab(a){S(a,"orderable","bSortable");S(a,"orderData","aDataSort");S(a,"orderSequence","asSorting");S(a,"orderDataType","sortDataType");var b=a.aDataSort;"number"!==typeof b||Array.isArray(b)||(a.aDataSort=[b])}function Bb(a){if(!u.__browser){var b={};u.__browser=b;var c=l("<div/>").css({position:"fixed",top:0,left:-1*l(z).scrollLeft(),height:1,
    width:1,overflow:"hidden"}).append(l("<div/>").css({position:"absolute",top:1,left:1,width:100,overflow:"scroll"}).append(l("<div/>").css({width:"100%",height:10}))).appendTo("body"),d=c.children(),e=d.children();b.barWidth=d[0].offsetWidth-d[0].clientWidth;b.bScrollOversize=100===e[0].offsetWidth&&100!==d[0].clientWidth;b.bScrollbarLeft=1!==Math.round(e.offset().left);b.bBounding=c[0].getBoundingClientRect().width?!0:!1;c.remove()}l.extend(a.oBrowser,u.__browser);a.oScroll.iBarWidth=u.__browser.barWidth}
    function Cb(a,b,c,d,e,h){var f=!1;if(c!==q){var g=c;f=!0}for(;d!==e;)a.hasOwnProperty(d)&&(g=f?b(g,a[d],d,a):a[d],f=!0,d+=h);return g}function Xa(a,b){var c=u.defaults.column,d=a.aoColumns.length;c=l.extend({},u.models.oColumn,c,{nTh:b?b:A.createElement("th"),sTitle:c.sTitle?c.sTitle:b?b.innerHTML:"",aDataSort:c.aDataSort?c.aDataSort:[d],mData:c.mData?c.mData:d,idx:d});a.aoColumns.push(c);c=a.aoPreSearchCols;c[d]=l.extend({},u.models.oSearch,c[d]);Ga(a,d,l(b).data())}function Ga(a,b,c){b=a.aoColumns[b];
        var d=a.oClasses,e=l(b.nTh);if(!b.sWidthOrig){b.sWidthOrig=e.attr("width")||null;var h=(e.attr("style")||"").match(/width:\s*(\d+[pxem%]+)/);h&&(b.sWidthOrig=h[1])}c!==q&&null!==c&&(Ab(c),P(u.defaults.column,c,!0),c.mDataProp===q||c.mData||(c.mData=c.mDataProp),c.sType&&(b._sManualType=c.sType),c.className&&!c.sClass&&(c.sClass=c.className),c.sClass&&e.addClass(c.sClass),l.extend(b,c),X(b,c,"sWidth","sWidthOrig"),c.iDataSort!==q&&(b.aDataSort=[c.iDataSort]),X(b,c,"aDataSort"));var f=b.mData,g=na(f),
            k=b.mRender?na(b.mRender):null;c=function(m){return"string"===typeof m&&-1!==m.indexOf("@")};b._bAttrSrc=l.isPlainObject(f)&&(c(f.sort)||c(f.type)||c(f.filter));b._setter=null;b.fnGetData=function(m,n,p){var t=g(m,n,q,p);return k&&n?k(t,n,m,p):t};b.fnSetData=function(m,n,p){return ha(f)(m,n,p)};"number"!==typeof f&&(a._rowReadObject=!0);a.oFeatures.bSort||(b.bSortable=!1,e.addClass(d.sSortableNone));a=-1!==l.inArray("asc",b.asSorting);c=-1!==l.inArray("desc",b.asSorting);b.bSortable&&(a||c)?a&&!c?
            (b.sSortingClass=d.sSortableAsc,b.sSortingClassJUI=d.sSortJUIAscAllowed):!a&&c?(b.sSortingClass=d.sSortableDesc,b.sSortingClassJUI=d.sSortJUIDescAllowed):(b.sSortingClass=d.sSortable,b.sSortingClassJUI=d.sSortJUI):(b.sSortingClass=d.sSortableNone,b.sSortingClassJUI="")}function ta(a){if(!1!==a.oFeatures.bAutoWidth){var b=a.aoColumns;Ya(a);for(var c=0,d=b.length;c<d;c++)b[c].nTh.style.width=b[c].sWidth}b=a.oScroll;""===b.sY&&""===b.sX||Ha(a);F(a,null,"column-sizing",[a])}function ua(a,b){a=Ia(a,"bVisible");
        return"number"===typeof a[b]?a[b]:null}function va(a,b){a=Ia(a,"bVisible");b=l.inArray(b,a);return-1!==b?b:null}function oa(a){var b=0;l.each(a.aoColumns,function(c,d){d.bVisible&&"none"!==l(d.nTh).css("display")&&b++});return b}function Ia(a,b){var c=[];l.map(a.aoColumns,function(d,e){d[b]&&c.push(e)});return c}function Za(a){var b=a.aoColumns,c=a.aoData,d=u.ext.type.detect,e,h,f;var g=0;for(e=b.length;g<e;g++){var k=b[g];var m=[];if(!k.sType&&k._sManualType)k.sType=k._sManualType;else if(!k.sType){var n=
        0;for(h=d.length;n<h;n++){var p=0;for(f=c.length;p<f;p++){m[p]===q&&(m[p]=T(a,p,g,"type"));var t=d[n](m[p],a);if(!t&&n!==d.length-1)break;if("html"===t&&!Z(m[p]))break}if(t){k.sType=t;break}}k.sType||(k.sType="string")}}}function Db(a,b,c,d){var e,h,f,g=a.aoColumns;if(b)for(e=b.length-1;0<=e;e--){var k=b[e];var m=k.targets!==q?k.targets:k.aTargets;Array.isArray(m)||(m=[m]);var n=0;for(h=m.length;n<h;n++)if("number"===typeof m[n]&&0<=m[n]){for(;g.length<=m[n];)Xa(a);d(m[n],k)}else if("number"===typeof m[n]&&
        0>m[n])d(g.length+m[n],k);else if("string"===typeof m[n]){var p=0;for(f=g.length;p<f;p++)("_all"==m[n]||l(g[p].nTh).hasClass(m[n]))&&d(p,k)}}if(c)for(e=0,a=c.length;e<a;e++)d(e,c[e])}function ia(a,b,c,d){var e=a.aoData.length,h=l.extend(!0,{},u.models.oRow,{src:c?"dom":"data",idx:e});h._aData=b;a.aoData.push(h);for(var f=a.aoColumns,g=0,k=f.length;g<k;g++)f[g].sType=null;a.aiDisplayMaster.push(e);b=a.rowIdFn(b);b!==q&&(a.aIds[b]=h);!c&&a.oFeatures.bDeferRender||$a(a,e,c,d);return e}function Ja(a,
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           b){var c;b instanceof l||(b=l(b));return b.map(function(d,e){c=ab(a,e);return ia(a,c.data,e,c.cells)})}function T(a,b,c,d){"search"===d?d="filter":"order"===d&&(d="sort");var e=a.iDraw,h=a.aoColumns[c],f=a.aoData[b]._aData,g=h.sDefaultContent,k=h.fnGetData(f,d,{settings:a,row:b,col:c});if(k===q)return a.iDrawError!=e&&null===g&&(da(a,0,"Requested unknown parameter "+("function"==typeof h.mData?"{function}":"'"+h.mData+"'")+" for row "+b+", column "+c,4),a.iDrawError=e),g;if((k===f||null===k)&&null!==
        g&&d!==q)k=g;else if("function"===typeof k)return k.call(f);if(null===k&&"display"===d)return"";"filter"===d&&(a=u.ext.type.search,a[h.sType]&&(k=a[h.sType](k)));return k}function Eb(a,b,c,d){a.aoColumns[c].fnSetData(a.aoData[b]._aData,d,{settings:a,row:b,col:c})}function bb(a){return l.map(a.match(/(\\.|[^\.])+/g)||[""],function(b){return b.replace(/\\\./g,".")})}function cb(a){return U(a.aoData,"_aData")}function Ka(a){a.aoData.length=0;a.aiDisplayMaster.length=0;a.aiDisplay.length=0;a.aIds={}}
    function La(a,b,c){for(var d=-1,e=0,h=a.length;e<h;e++)a[e]==b?d=e:a[e]>b&&a[e]--; -1!=d&&c===q&&a.splice(d,1)}function wa(a,b,c,d){var e=a.aoData[b],h,f=function(k,m){for(;k.childNodes.length;)k.removeChild(k.firstChild);k.innerHTML=T(a,b,m,"display")};if("dom"!==c&&(c&&"auto"!==c||"dom"!==e.src)){var g=e.anCells;if(g)if(d!==q)f(g[d],d);else for(c=0,h=g.length;c<h;c++)f(g[c],c)}else e._aData=ab(a,e,d,d===q?q:e._aData).data;e._aSortData=null;e._aFilterData=null;f=a.aoColumns;if(d!==q)f[d].sType=null;
    else{c=0;for(h=f.length;c<h;c++)f[c].sType=null;db(a,e)}}function ab(a,b,c,d){var e=[],h=b.firstChild,f,g=0,k,m=a.aoColumns,n=a._rowReadObject;d=d!==q?d:n?{}:[];var p=function(x,w){if("string"===typeof x){var r=x.indexOf("@");-1!==r&&(r=x.substring(r+1),ha(x)(d,w.getAttribute(r)))}},t=function(x){if(c===q||c===g)f=m[g],k=x.innerHTML.trim(),f&&f._bAttrSrc?(ha(f.mData._)(d,k),p(f.mData.sort,x),p(f.mData.type,x),p(f.mData.filter,x)):n?(f._setter||(f._setter=ha(f.mData)),f._setter(d,k)):d[g]=k;g++};if(h)for(;h;){var v=
        h.nodeName.toUpperCase();if("TD"==v||"TH"==v)t(h),e.push(h);h=h.nextSibling}else for(e=b.anCells,h=0,v=e.length;h<v;h++)t(e[h]);(b=b.firstChild?b:b.nTr)&&(b=b.getAttribute("id"))&&ha(a.rowId)(d,b);return{data:d,cells:e}}function $a(a,b,c,d){var e=a.aoData[b],h=e._aData,f=[],g,k;if(null===e.nTr){var m=c||A.createElement("tr");e.nTr=m;e.anCells=f;m._DT_RowIndex=b;db(a,e);var n=0;for(g=a.aoColumns.length;n<g;n++){var p=a.aoColumns[n];e=(k=c?!1:!0)?A.createElement(p.sCellType):d[n];e._DT_CellIndex={row:b,
        column:n};f.push(e);if(k||!(!p.mRender&&p.mData===n||l.isPlainObject(p.mData)&&p.mData._===n+".display"))e.innerHTML=T(a,b,n,"display");p.sClass&&(e.className+=" "+p.sClass);p.bVisible&&!c?m.appendChild(e):!p.bVisible&&c&&e.parentNode.removeChild(e);p.fnCreatedCell&&p.fnCreatedCell.call(a.oInstance,e,T(a,b,n),h,b,n)}F(a,"aoRowCreatedCallback",null,[m,h,b,f])}}function db(a,b){var c=b.nTr,d=b._aData;if(c){if(a=a.rowIdFn(d))c.id=a;d.DT_RowClass&&(a=d.DT_RowClass.split(" "),b.__rowc=b.__rowc?Ma(b.__rowc.concat(a)):
        a,l(c).removeClass(b.__rowc.join(" ")).addClass(d.DT_RowClass));d.DT_RowAttr&&l(c).attr(d.DT_RowAttr);d.DT_RowData&&l(c).data(d.DT_RowData)}}function Fb(a){var b,c,d=a.nTHead,e=a.nTFoot,h=0===l("th, td",d).length,f=a.oClasses,g=a.aoColumns;h&&(c=l("<tr/>").appendTo(d));var k=0;for(b=g.length;k<b;k++){var m=g[k];var n=l(m.nTh).addClass(m.sClass);h&&n.appendTo(c);a.oFeatures.bSort&&(n.addClass(m.sSortingClass),!1!==m.bSortable&&(n.attr("tabindex",a.iTabIndex).attr("aria-controls",a.sTableId),eb(a,m.nTh,
        k)));m.sTitle!=n[0].innerHTML&&n.html(m.sTitle);fb(a,"header")(a,n,m,f)}h&&xa(a.aoHeader,d);l(d).children("tr").children("th, td").addClass(f.sHeaderTH);l(e).children("tr").children("th, td").addClass(f.sFooterTH);if(null!==e)for(a=a.aoFooter[0],k=0,b=a.length;k<b;k++)m=g[k],m.nTf=a[k].cell,m.sClass&&l(m.nTf).addClass(m.sClass)}function ya(a,b,c){var d,e,h=[],f=[],g=a.aoColumns.length;if(b){c===q&&(c=!1);var k=0;for(d=b.length;k<d;k++){h[k]=b[k].slice();h[k].nTr=b[k].nTr;for(e=g-1;0<=e;e--)a.aoColumns[e].bVisible||
    c||h[k].splice(e,1);f.push([])}k=0;for(d=h.length;k<d;k++){if(a=h[k].nTr)for(;e=a.firstChild;)a.removeChild(e);e=0;for(b=h[k].length;e<b;e++){var m=g=1;if(f[k][e]===q){a.appendChild(h[k][e].cell);for(f[k][e]=1;h[k+g]!==q&&h[k][e].cell==h[k+g][e].cell;)f[k+g][e]=1,g++;for(;h[k][e+m]!==q&&h[k][e].cell==h[k][e+m].cell;){for(c=0;c<g;c++)f[k+c][e+m]=1;m++}l(h[k][e].cell).attr("rowspan",g).attr("colspan",m)}}}}}function ja(a,b){var c=F(a,"aoPreDrawCallback","preDraw",[a]);if(-1!==l.inArray(!1,c))V(a,!1);
    else{c=[];var d=0,e=a.asStripeClasses,h=e.length,f=a.oLanguage,g=a.iInitDisplayStart,k="ssp"==Q(a),m=a.aiDisplay;a.bDrawing=!0;g!==q&&-1!==g&&(a._iDisplayStart=k?g:g>=a.fnRecordsDisplay()?0:g,a.iInitDisplayStart=-1);g=a._iDisplayStart;var n=a.fnDisplayEnd();if(a.bDeferLoading)a.bDeferLoading=!1,a.iDraw++,V(a,!1);else if(!k)a.iDraw++;else if(!a.bDestroying&&!b){Gb(a);return}if(0!==m.length)for(b=k?a.aoData.length:n,f=k?0:g;f<b;f++){k=m[f];var p=a.aoData[k];null===p.nTr&&$a(a,k);var t=p.nTr;if(0!==
        h){var v=e[d%h];p._sRowStripe!=v&&(l(t).removeClass(p._sRowStripe).addClass(v),p._sRowStripe=v)}F(a,"aoRowCallback",null,[t,p._aData,d,f,k]);c.push(t);d++}else d=f.sZeroRecords,1==a.iDraw&&"ajax"==Q(a)?d=f.sLoadingRecords:f.sEmptyTable&&0===a.fnRecordsTotal()&&(d=f.sEmptyTable),c[0]=l("<tr/>",{"class":h?e[0]:""}).append(l("<td />",{valign:"top",colSpan:oa(a),"class":a.oClasses.sRowEmpty}).html(d))[0];F(a,"aoHeaderCallback","header",[l(a.nTHead).children("tr")[0],cb(a),g,n,m]);F(a,"aoFooterCallback",
        "footer",[l(a.nTFoot).children("tr")[0],cb(a),g,n,m]);e=l(a.nTBody);e.children().detach();e.append(l(c));F(a,"aoDrawCallback","draw",[a]);a.bSorted=!1;a.bFiltered=!1;a.bDrawing=!1}}function ka(a,b){var c=a.oFeatures,d=c.bFilter;c.bSort&&Hb(a);d?za(a,a.oPreviousSearch):a.aiDisplay=a.aiDisplayMaster.slice();!0!==b&&(a._iDisplayStart=0);a._drawHold=b;ja(a);a._drawHold=!1}function Ib(a){var b=a.oClasses,c=l(a.nTable);c=l("<div/>").insertBefore(c);var d=a.oFeatures,e=l("<div/>",{id:a.sTableId+"_wrapper",
        "class":b.sWrapper+(a.nTFoot?"":" "+b.sNoFooter)});a.nHolding=c[0];a.nTableWrapper=e[0];a.nTableReinsertBefore=a.nTable.nextSibling;for(var h=a.sDom.split(""),f,g,k,m,n,p,t=0;t<h.length;t++){f=null;g=h[t];if("<"==g){k=l("<div/>")[0];m=h[t+1];if("'"==m||'"'==m){n="";for(p=2;h[t+p]!=m;)n+=h[t+p],p++;"H"==n?n=b.sJUIHeader:"F"==n&&(n=b.sJUIFooter);-1!=n.indexOf(".")?(m=n.split("."),k.id=m[0].substr(1,m[0].length-1),k.className=m[1]):"#"==n.charAt(0)?k.id=n.substr(1,n.length-1):k.className=n;t+=p}e.append(k);
        e=l(k)}else if(">"==g)e=e.parent();else if("l"==g&&d.bPaginate&&d.bLengthChange)f=Jb(a);else if("f"==g&&d.bFilter)f=Kb(a);else if("r"==g&&d.bProcessing)f=Lb(a);else if("t"==g)f=Mb(a);else if("i"==g&&d.bInfo)f=Nb(a);else if("p"==g&&d.bPaginate)f=Ob(a);else if(0!==u.ext.feature.length)for(k=u.ext.feature,p=0,m=k.length;p<m;p++)if(g==k[p].cFeature){f=k[p].fnInit(a);break}f&&(k=a.aanFeatures,k[g]||(k[g]=[]),k[g].push(f),e.append(f))}c.replaceWith(e);a.nHolding=null}function xa(a,b){b=l(b).children("tr");
        var c,d,e;a.splice(0,a.length);var h=0;for(e=b.length;h<e;h++)a.push([]);h=0;for(e=b.length;h<e;h++){var f=b[h];for(c=f.firstChild;c;){if("TD"==c.nodeName.toUpperCase()||"TH"==c.nodeName.toUpperCase()){var g=1*c.getAttribute("colspan");var k=1*c.getAttribute("rowspan");g=g&&0!==g&&1!==g?g:1;k=k&&0!==k&&1!==k?k:1;var m=0;for(d=a[h];d[m];)m++;var n=m;var p=1===g?!0:!1;for(d=0;d<g;d++)for(m=0;m<k;m++)a[h+m][n+d]={cell:c,unique:p},a[h+m].nTr=f}c=c.nextSibling}}}function Na(a,b,c){var d=[];c||(c=a.aoHeader,
    b&&(c=[],xa(c,b)));b=0;for(var e=c.length;b<e;b++)for(var h=0,f=c[b].length;h<f;h++)!c[b][h].unique||d[h]&&a.bSortCellsTop||(d[h]=c[b][h].cell);return d}function Oa(a,b,c){F(a,"aoServerParams","serverParams",[b]);if(b&&Array.isArray(b)){var d={},e=/(.*?)\[\]$/;l.each(b,function(n,p){(n=p.name.match(e))?(n=n[0],d[n]||(d[n]=[]),d[n].push(p.value)):d[p.name]=p.value});b=d}var h=a.ajax,f=a.oInstance,g=function(n){var p=a.jqXhr?a.jqXhr.status:null;if(null===n||"number"===typeof p&&204==p)n={},Aa(a,n,[]);
        (p=n.error||n.sError)&&da(a,0,p);a.json=n;F(a,null,"xhr",[a,n,a.jqXHR]);c(n)};if(l.isPlainObject(h)&&h.data){var k=h.data;var m="function"===typeof k?k(b,a):k;b="function"===typeof k&&m?m:l.extend(!0,b,m);delete h.data}m={data:b,success:g,dataType:"json",cache:!1,type:a.sServerMethod,error:function(n,p,t){t=F(a,null,"xhr",[a,null,a.jqXHR]);-1===l.inArray(!0,t)&&("parsererror"==p?da(a,0,"Invalid JSON response",1):4===n.readyState&&da(a,0,"Ajax error",7));V(a,!1)}};a.oAjaxData=b;F(a,null,"preXhr",[a,
        b]);a.fnServerData?a.fnServerData.call(f,a.sAjaxSource,l.map(b,function(n,p){return{name:p,value:n}}),g,a):a.sAjaxSource||"string"===typeof h?a.jqXHR=l.ajax(l.extend(m,{url:h||a.sAjaxSource})):"function"===typeof h?a.jqXHR=h.call(f,b,g,a):(a.jqXHR=l.ajax(l.extend(m,h)),h.data=k)}function Gb(a){a.iDraw++;V(a,!0);Oa(a,Pb(a),function(b){Qb(a,b)})}function Pb(a){var b=a.aoColumns,c=b.length,d=a.oFeatures,e=a.oPreviousSearch,h=a.aoPreSearchCols,f=[],g=pa(a);var k=a._iDisplayStart;var m=!1!==d.bPaginate?
        a._iDisplayLength:-1;var n=function(x,w){f.push({name:x,value:w})};n("sEcho",a.iDraw);n("iColumns",c);n("sColumns",U(b,"sName").join(","));n("iDisplayStart",k);n("iDisplayLength",m);var p={draw:a.iDraw,columns:[],order:[],start:k,length:m,search:{value:e.sSearch,regex:e.bRegex}};for(k=0;k<c;k++){var t=b[k];var v=h[k];m="function"==typeof t.mData?"function":t.mData;p.columns.push({data:m,name:t.sName,searchable:t.bSearchable,orderable:t.bSortable,search:{value:v.sSearch,regex:v.bRegex}});n("mDataProp_"+
        k,m);d.bFilter&&(n("sSearch_"+k,v.sSearch),n("bRegex_"+k,v.bRegex),n("bSearchable_"+k,t.bSearchable));d.bSort&&n("bSortable_"+k,t.bSortable)}d.bFilter&&(n("sSearch",e.sSearch),n("bRegex",e.bRegex));d.bSort&&(l.each(g,function(x,w){p.order.push({column:w.col,dir:w.dir});n("iSortCol_"+x,w.col);n("sSortDir_"+x,w.dir)}),n("iSortingCols",g.length));b=u.ext.legacy.ajax;return null===b?a.sAjaxSource?f:p:b?f:p}function Qb(a,b){var c=function(f,g){return b[f]!==q?b[f]:b[g]},d=Aa(a,b),e=c("sEcho","draw"),h=
        c("iTotalRecords","recordsTotal");c=c("iTotalDisplayRecords","recordsFiltered");if(e!==q){if(1*e<a.iDraw)return;a.iDraw=1*e}d||(d=[]);Ka(a);a._iRecordsTotal=parseInt(h,10);a._iRecordsDisplay=parseInt(c,10);e=0;for(h=d.length;e<h;e++)ia(a,d[e]);a.aiDisplay=a.aiDisplayMaster.slice();ja(a,!0);a._bInitComplete||Pa(a,b);V(a,!1)}function Aa(a,b,c){a=l.isPlainObject(a.ajax)&&a.ajax.dataSrc!==q?a.ajax.dataSrc:a.sAjaxDataProp;if(!c)return"data"===a?b.aaData||b[a]:""!==a?na(a)(b):b;ha(a)(b,c)}function Kb(a){var b=
        a.oClasses,c=a.sTableId,d=a.oLanguage,e=a.oPreviousSearch,h=a.aanFeatures,f='<input type="search" class="'+b.sFilterInput+'"/>',g=d.sSearch;g=g.match(/_INPUT_/)?g.replace("_INPUT_",f):g+f;b=l("<div/>",{id:h.f?null:c+"_filter","class":b.sFilter}).append(l("<label/>").append(g));var k=function(n){var p=this.value?this.value:"";e.return&&"Enter"!==n.key||p==e.sSearch||(za(a,{sSearch:p,bRegex:e.bRegex,bSmart:e.bSmart,bCaseInsensitive:e.bCaseInsensitive,"return":e.return}),a._iDisplayStart=0,ja(a))};h=
        null!==a.searchDelay?a.searchDelay:"ssp"===Q(a)?400:0;var m=l("input",b).val(e.sSearch).attr("placeholder",d.sSearchPlaceholder).on("keyup.DT search.DT input.DT paste.DT cut.DT",h?gb(k,h):k).on("mouseup",function(n){setTimeout(function(){k.call(m[0],n)},10)}).on("keypress.DT",function(n){if(13==n.keyCode)return!1}).attr("aria-controls",c);l(a.nTable).on("search.dt.DT",function(n,p){if(a===p)try{m[0]!==A.activeElement&&m.val(e.sSearch)}catch(t){}});return b[0]}function za(a,b,c){var d=a.oPreviousSearch,
        e=a.aoPreSearchCols,h=function(g){d.sSearch=g.sSearch;d.bRegex=g.bRegex;d.bSmart=g.bSmart;d.bCaseInsensitive=g.bCaseInsensitive;d.return=g.return},f=function(g){return g.bEscapeRegex!==q?!g.bEscapeRegex:g.bRegex};Za(a);if("ssp"!=Q(a)){Rb(a,b.sSearch,c,f(b),b.bSmart,b.bCaseInsensitive,b.return);h(b);for(b=0;b<e.length;b++)Sb(a,e[b].sSearch,b,f(e[b]),e[b].bSmart,e[b].bCaseInsensitive);Tb(a)}else h(b);a.bFiltered=!0;F(a,null,"search",[a])}function Tb(a){for(var b=u.ext.search,c=a.aiDisplay,d,e,h=0,f=
        b.length;h<f;h++){for(var g=[],k=0,m=c.length;k<m;k++)e=c[k],d=a.aoData[e],b[h](a,d._aFilterData,e,d._aData,k)&&g.push(e);c.length=0;l.merge(c,g)}}function Sb(a,b,c,d,e,h){if(""!==b){var f=[],g=a.aiDisplay;d=hb(b,d,e,h);for(e=0;e<g.length;e++)b=a.aoData[g[e]]._aFilterData[c],d.test(b)&&f.push(g[e]);a.aiDisplay=f}}function Rb(a,b,c,d,e,h){e=hb(b,d,e,h);var f=a.oPreviousSearch.sSearch,g=a.aiDisplayMaster;h=[];0!==u.ext.search.length&&(c=!0);var k=Ub(a);if(0>=b.length)a.aiDisplay=g.slice();else{if(k||
        c||d||f.length>b.length||0!==b.indexOf(f)||a.bSorted)a.aiDisplay=g.slice();b=a.aiDisplay;for(c=0;c<b.length;c++)e.test(a.aoData[b[c]]._sFilterRow)&&h.push(b[c]);a.aiDisplay=h}}function hb(a,b,c,d){a=b?a:ib(a);c&&(a="^(?=.*?"+l.map(a.match(/"[^"]+"|[^ ]+/g)||[""],function(e){if('"'===e.charAt(0)){var h=e.match(/^"(.*)"$/);e=h?h[1]:e}return e.replace('"',"")}).join(")(?=.*?")+").*$");return new RegExp(a,d?"i":"")}function Ub(a){var b=a.aoColumns,c,d;var e=!1;var h=0;for(c=a.aoData.length;h<c;h++){var f=
        a.aoData[h];if(!f._aFilterData){var g=[];e=0;for(d=b.length;e<d;e++){var k=b[e];k.bSearchable?(k=T(a,h,e,"filter"),null===k&&(k=""),"string"!==typeof k&&k.toString&&(k=k.toString())):k="";k.indexOf&&-1!==k.indexOf("&")&&(Qa.innerHTML=k,k=sc?Qa.textContent:Qa.innerText);k.replace&&(k=k.replace(/[\r\n\u2028]/g,""));g.push(k)}f._aFilterData=g;f._sFilterRow=g.join("  ");e=!0}}return e}function Vb(a){return{search:a.sSearch,smart:a.bSmart,regex:a.bRegex,caseInsensitive:a.bCaseInsensitive}}function Wb(a){return{sSearch:a.search,
        bSmart:a.smart,bRegex:a.regex,bCaseInsensitive:a.caseInsensitive}}function Nb(a){var b=a.sTableId,c=a.aanFeatures.i,d=l("<div/>",{"class":a.oClasses.sInfo,id:c?null:b+"_info"});c||(a.aoDrawCallback.push({fn:Xb,sName:"information"}),d.attr("role","status").attr("aria-live","polite"),l(a.nTable).attr("aria-describedby",b+"_info"));return d[0]}function Xb(a){var b=a.aanFeatures.i;if(0!==b.length){var c=a.oLanguage,d=a._iDisplayStart+1,e=a.fnDisplayEnd(),h=a.fnRecordsTotal(),f=a.fnRecordsDisplay(),g=
        f?c.sInfo:c.sInfoEmpty;f!==h&&(g+=" "+c.sInfoFiltered);g+=c.sInfoPostFix;g=Yb(a,g);c=c.fnInfoCallback;null!==c&&(g=c.call(a.oInstance,a,d,e,h,f,g));l(b).html(g)}}function Yb(a,b){var c=a.fnFormatNumber,d=a._iDisplayStart+1,e=a._iDisplayLength,h=a.fnRecordsDisplay(),f=-1===e;return b.replace(/_START_/g,c.call(a,d)).replace(/_END_/g,c.call(a,a.fnDisplayEnd())).replace(/_MAX_/g,c.call(a,a.fnRecordsTotal())).replace(/_TOTAL_/g,c.call(a,h)).replace(/_PAGE_/g,c.call(a,f?1:Math.ceil(d/e))).replace(/_PAGES_/g,
        c.call(a,f?1:Math.ceil(h/e)))}function Ba(a){var b=a.iInitDisplayStart,c=a.aoColumns;var d=a.oFeatures;var e=a.bDeferLoading;if(a.bInitialised){Ib(a);Fb(a);ya(a,a.aoHeader);ya(a,a.aoFooter);V(a,!0);d.bAutoWidth&&Ya(a);var h=0;for(d=c.length;h<d;h++){var f=c[h];f.sWidth&&(f.nTh.style.width=K(f.sWidth))}F(a,null,"preInit",[a]);ka(a);c=Q(a);if("ssp"!=c||e)"ajax"==c?Oa(a,[],function(g){var k=Aa(a,g);for(h=0;h<k.length;h++)ia(a,k[h]);a.iInitDisplayStart=b;ka(a);V(a,!1);Pa(a,g)},a):(V(a,!1),Pa(a))}else setTimeout(function(){Ba(a)},
        200)}function Pa(a,b){a._bInitComplete=!0;(b||a.oInit.aaData)&&ta(a);F(a,null,"plugin-init",[a,b]);F(a,"aoInitComplete","init",[a,b])}function jb(a,b){b=parseInt(b,10);a._iDisplayLength=b;kb(a);F(a,null,"length",[a,b])}function Jb(a){var b=a.oClasses,c=a.sTableId,d=a.aLengthMenu,e=Array.isArray(d[0]),h=e?d[0]:d;d=e?d[1]:d;e=l("<select/>",{name:c+"_length","aria-controls":c,"class":b.sLengthSelect});for(var f=0,g=h.length;f<g;f++)e[0][f]=new Option("number"===typeof d[f]?a.fnFormatNumber(d[f]):d[f],
        h[f]);var k=l("<div><label/></div>").addClass(b.sLength);a.aanFeatures.l||(k[0].id=c+"_length");k.children().append(a.oLanguage.sLengthMenu.replace("_MENU_",e[0].outerHTML));l("select",k).val(a._iDisplayLength).on("change.DT",function(m){jb(a,l(this).val());ja(a)});l(a.nTable).on("length.dt.DT",function(m,n,p){a===n&&l("select",k).val(p)});return k[0]}function Ob(a){var b=a.sPaginationType,c=u.ext.pager[b],d="function"===typeof c,e=function(f){ja(f)};b=l("<div/>").addClass(a.oClasses.sPaging+b)[0];
        var h=a.aanFeatures;d||c.fnInit(a,b,e);h.p||(b.id=a.sTableId+"_paginate",a.aoDrawCallback.push({fn:function(f){if(d){var g=f._iDisplayStart,k=f._iDisplayLength,m=f.fnRecordsDisplay(),n=-1===k;g=n?0:Math.ceil(g/k);k=n?1:Math.ceil(m/k);m=c(g,k);var p;n=0;for(p=h.p.length;n<p;n++)fb(f,"pageButton")(f,h.p[n],n,m,g,k)}else c.fnUpdate(f,e)},sName:"pagination"}));return b}function lb(a,b,c){var d=a._iDisplayStart,e=a._iDisplayLength,h=a.fnRecordsDisplay();0===h||-1===e?d=0:"number"===typeof b?(d=b*e,d>h&&
    (d=0)):"first"==b?d=0:"previous"==b?(d=0<=e?d-e:0,0>d&&(d=0)):"next"==b?d+e<h&&(d+=e):"last"==b?d=Math.floor((h-1)/e)*e:da(a,0,"Unknown paging action: "+b,5);b=a._iDisplayStart!==d;a._iDisplayStart=d;b&&(F(a,null,"page",[a]),c&&ja(a));return b}function Lb(a){return l("<div/>",{id:a.aanFeatures.r?null:a.sTableId+"_processing","class":a.oClasses.sProcessing}).html(a.oLanguage.sProcessing).insertBefore(a.nTable)[0]}function V(a,b){a.oFeatures.bProcessing&&l(a.aanFeatures.r).css("display",b?"block":"none");
        F(a,null,"processing",[a,b])}function Mb(a){var b=l(a.nTable),c=a.oScroll;if(""===c.sX&&""===c.sY)return a.nTable;var d=c.sX,e=c.sY,h=a.oClasses,f=b.children("caption"),g=f.length?f[0]._captionSide:null,k=l(b[0].cloneNode(!1)),m=l(b[0].cloneNode(!1)),n=b.children("tfoot");n.length||(n=null);k=l("<div/>",{"class":h.sScrollWrapper}).append(l("<div/>",{"class":h.sScrollHead}).css({overflow:"hidden",position:"relative",border:0,width:d?d?K(d):null:"100%"}).append(l("<div/>",{"class":h.sScrollHeadInner}).css({"box-sizing":"content-box",
        width:c.sXInner||"100%"}).append(k.removeAttr("id").css("margin-left",0).append("top"===g?f:null).append(b.children("thead"))))).append(l("<div/>",{"class":h.sScrollBody}).css({position:"relative",overflow:"auto",width:d?K(d):null}).append(b));n&&k.append(l("<div/>",{"class":h.sScrollFoot}).css({overflow:"hidden",border:0,width:d?d?K(d):null:"100%"}).append(l("<div/>",{"class":h.sScrollFootInner}).append(m.removeAttr("id").css("margin-left",0).append("bottom"===g?f:null).append(b.children("tfoot")))));
        b=k.children();var p=b[0];h=b[1];var t=n?b[2]:null;if(d)l(h).on("scroll.DT",function(v){v=this.scrollLeft;p.scrollLeft=v;n&&(t.scrollLeft=v)});l(h).css("max-height",e);c.bCollapse||l(h).css("height",e);a.nScrollHead=p;a.nScrollBody=h;a.nScrollFoot=t;a.aoDrawCallback.push({fn:Ha,sName:"scrolling"});return k[0]}function Ha(a){var b=a.oScroll,c=b.sX,d=b.sXInner,e=b.sY;b=b.iBarWidth;var h=l(a.nScrollHead),f=h[0].style,g=h.children("div"),k=g[0].style,m=g.children("table");g=a.nScrollBody;var n=l(g),p=
        g.style,t=l(a.nScrollFoot).children("div"),v=t.children("table"),x=l(a.nTHead),w=l(a.nTable),r=w[0],C=r.style,G=a.nTFoot?l(a.nTFoot):null,aa=a.oBrowser,L=aa.bScrollOversize;U(a.aoColumns,"nTh");var O=[],I=[],H=[],ea=[],Y,Ca=function(D){D=D.style;D.paddingTop="0";D.paddingBottom="0";D.borderTopWidth="0";D.borderBottomWidth="0";D.height=0};var fa=g.scrollHeight>g.clientHeight;if(a.scrollBarVis!==fa&&a.scrollBarVis!==q)a.scrollBarVis=fa,ta(a);else{a.scrollBarVis=fa;w.children("thead, tfoot").remove();
        if(G){var ba=G.clone().prependTo(w);var la=G.find("tr");ba=ba.find("tr")}var mb=x.clone().prependTo(w);x=x.find("tr");fa=mb.find("tr");mb.find("th, td").removeAttr("tabindex");c||(p.width="100%",h[0].style.width="100%");l.each(Na(a,mb),function(D,W){Y=ua(a,D);W.style.width=a.aoColumns[Y].sWidth});G&&ca(function(D){D.style.width=""},ba);h=w.outerWidth();""===c?(C.width="100%",L&&(w.find("tbody").height()>g.offsetHeight||"scroll"==n.css("overflow-y"))&&(C.width=K(w.outerWidth()-b)),h=w.outerWidth()):
            ""!==d&&(C.width=K(d),h=w.outerWidth());ca(Ca,fa);ca(function(D){var W=z.getComputedStyle?z.getComputedStyle(D).width:K(l(D).width());H.push(D.innerHTML);O.push(W)},fa);ca(function(D,W){D.style.width=O[W]},x);l(fa).height(0);G&&(ca(Ca,ba),ca(function(D){ea.push(D.innerHTML);I.push(K(l(D).css("width")))},ba),ca(function(D,W){D.style.width=I[W]},la),l(ba).height(0));ca(function(D,W){D.innerHTML='<div class="dataTables_sizing">'+H[W]+"</div>";D.childNodes[0].style.height="0";D.childNodes[0].style.overflow=
            "hidden";D.style.width=O[W]},fa);G&&ca(function(D,W){D.innerHTML='<div class="dataTables_sizing">'+ea[W]+"</div>";D.childNodes[0].style.height="0";D.childNodes[0].style.overflow="hidden";D.style.width=I[W]},ba);w.outerWidth()<h?(la=g.scrollHeight>g.offsetHeight||"scroll"==n.css("overflow-y")?h+b:h,L&&(g.scrollHeight>g.offsetHeight||"scroll"==n.css("overflow-y"))&&(C.width=K(la-b)),""!==c&&""===d||da(a,1,"Possible column misalignment",6)):la="100%";p.width=K(la);f.width=K(la);G&&(a.nScrollFoot.style.width=
            K(la));!e&&L&&(p.height=K(r.offsetHeight+b));c=w.outerWidth();m[0].style.width=K(c);k.width=K(c);d=w.height()>g.clientHeight||"scroll"==n.css("overflow-y");e="padding"+(aa.bScrollbarLeft?"Left":"Right");k[e]=d?b+"px":"0px";G&&(v[0].style.width=K(c),t[0].style.width=K(c),t[0].style[e]=d?b+"px":"0px");w.children("colgroup").insertBefore(w.children("thead"));n.trigger("scroll");!a.bSorted&&!a.bFiltered||a._drawHold||(g.scrollTop=0)}}function ca(a,b,c){for(var d=0,e=0,h=b.length,f,g;e<h;){f=b[e].firstChild;
        for(g=c?c[e].firstChild:null;f;)1===f.nodeType&&(c?a(f,g,d):a(f,d),d++),f=f.nextSibling,g=c?g.nextSibling:null;e++}}function Ya(a){var b=a.nTable,c=a.aoColumns,d=a.oScroll,e=d.sY,h=d.sX,f=d.sXInner,g=c.length,k=Ia(a,"bVisible"),m=l("th",a.nTHead),n=b.getAttribute("width"),p=b.parentNode,t=!1,v,x=a.oBrowser;d=x.bScrollOversize;(v=b.style.width)&&-1!==v.indexOf("%")&&(n=v);for(v=0;v<k.length;v++){var w=c[k[v]];null!==w.sWidth&&(w.sWidth=Zb(w.sWidthOrig,p),t=!0)}if(d||!t&&!h&&!e&&g==oa(a)&&g==m.length)for(v=
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        0;v<g;v++)k=ua(a,v),null!==k&&(c[k].sWidth=K(m.eq(v).width()));else{g=l(b).clone().css("visibility","hidden").removeAttr("id");g.find("tbody tr").remove();var r=l("<tr/>").appendTo(g.find("tbody"));g.find("thead, tfoot").remove();g.append(l(a.nTHead).clone()).append(l(a.nTFoot).clone());g.find("tfoot th, tfoot td").css("width","");m=Na(a,g.find("thead")[0]);for(v=0;v<k.length;v++)w=c[k[v]],m[v].style.width=null!==w.sWidthOrig&&""!==w.sWidthOrig?K(w.sWidthOrig):"",w.sWidthOrig&&h&&l(m[v]).append(l("<div/>").css({width:w.sWidthOrig,
        margin:0,padding:0,border:0,height:1}));if(a.aoData.length)for(v=0;v<k.length;v++)t=k[v],w=c[t],l($b(a,t)).clone(!1).append(w.sContentPadding).appendTo(r);l("[name]",g).removeAttr("name");w=l("<div/>").css(h||e?{position:"absolute",top:0,left:0,height:1,right:0,overflow:"hidden"}:{}).append(g).appendTo(p);h&&f?g.width(f):h?(g.css("width","auto"),g.removeAttr("width"),g.width()<p.clientWidth&&n&&g.width(p.clientWidth)):e?g.width(p.clientWidth):n&&g.width(n);for(v=e=0;v<k.length;v++)p=l(m[v]),f=p.outerWidth()-
        p.width(),p=x.bBounding?Math.ceil(m[v].getBoundingClientRect().width):p.outerWidth(),e+=p,c[k[v]].sWidth=K(p-f);b.style.width=K(e);w.remove()}n&&(b.style.width=K(n));!n&&!h||a._reszEvt||(b=function(){l(z).on("resize.DT-"+a.sInstance,gb(function(){ta(a)}))},d?setTimeout(b,1E3):b(),a._reszEvt=!0)}function Zb(a,b){if(!a)return 0;a=l("<div/>").css("width",K(a)).appendTo(b||A.body);b=a[0].offsetWidth;a.remove();return b}function $b(a,b){var c=ac(a,b);if(0>c)return null;var d=a.aoData[c];return d.nTr?d.anCells[b]:
        l("<td/>").html(T(a,c,b,"display"))[0]}function ac(a,b){for(var c,d=-1,e=-1,h=0,f=a.aoData.length;h<f;h++)c=T(a,h,b,"display")+"",c=c.replace(tc,""),c=c.replace(/&nbsp;/g," "),c.length>d&&(d=c.length,e=h);return e}function K(a){return null===a?"0px":"number"==typeof a?0>a?"0px":a+"px":a.match(/\d$/)?a+"px":a}function pa(a){var b=[],c=a.aoColumns;var d=a.aaSortingFixed;var e=l.isPlainObject(d);var h=[];var f=function(n){n.length&&!Array.isArray(n[0])?h.push(n):l.merge(h,n)};Array.isArray(d)&&f(d);
        e&&d.pre&&f(d.pre);f(a.aaSorting);e&&d.post&&f(d.post);for(a=0;a<h.length;a++){var g=h[a][0];f=c[g].aDataSort;d=0;for(e=f.length;d<e;d++){var k=f[d];var m=c[k].sType||"string";h[a]._idx===q&&(h[a]._idx=l.inArray(h[a][1],c[k].asSorting));b.push({src:g,col:k,dir:h[a][1],index:h[a]._idx,type:m,formatter:u.ext.type.order[m+"-pre"]})}}return b}function Hb(a){var b,c=[],d=u.ext.type.order,e=a.aoData,h=0,f=a.aiDisplayMaster;Za(a);var g=pa(a);var k=0;for(b=g.length;k<b;k++){var m=g[k];m.formatter&&h++;bc(a,
        m.col)}if("ssp"!=Q(a)&&0!==g.length){k=0;for(b=f.length;k<b;k++)c[f[k]]=k;h===g.length?f.sort(function(n,p){var t,v=g.length,x=e[n]._aSortData,w=e[p]._aSortData;for(t=0;t<v;t++){var r=g[t];var C=x[r.col];var G=w[r.col];C=C<G?-1:C>G?1:0;if(0!==C)return"asc"===r.dir?C:-C}C=c[n];G=c[p];return C<G?-1:C>G?1:0}):f.sort(function(n,p){var t,v=g.length,x=e[n]._aSortData,w=e[p]._aSortData;for(t=0;t<v;t++){var r=g[t];var C=x[r.col];var G=w[r.col];r=d[r.type+"-"+r.dir]||d["string-"+r.dir];C=r(C,G);if(0!==C)return C}C=
        c[n];G=c[p];return C<G?-1:C>G?1:0})}a.bSorted=!0}function cc(a){var b=a.aoColumns,c=pa(a);a=a.oLanguage.oAria;for(var d=0,e=b.length;d<e;d++){var h=b[d];var f=h.asSorting;var g=h.ariaTitle||h.sTitle.replace(/<.*?>/g,"");var k=h.nTh;k.removeAttribute("aria-sort");h.bSortable&&(0<c.length&&c[0].col==d?(k.setAttribute("aria-sort","asc"==c[0].dir?"ascending":"descending"),h=f[c[0].index+1]||f[0]):h=f[0],g+="asc"===h?a.sSortAscending:a.sSortDescending);k.setAttribute("aria-label",g)}}function nb(a,b,c,
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        d){var e=a.aaSorting,h=a.aoColumns[b].asSorting,f=function(g,k){var m=g._idx;m===q&&(m=l.inArray(g[1],h));return m+1<h.length?m+1:k?null:0};"number"===typeof e[0]&&(e=a.aaSorting=[e]);c&&a.oFeatures.bSortMulti?(c=l.inArray(b,U(e,"0")),-1!==c?(b=f(e[c],!0),null===b&&1===e.length&&(b=0),null===b?e.splice(c,1):(e[c][1]=h[b],e[c]._idx=b)):(e.push([b,h[0],0]),e[e.length-1]._idx=0)):e.length&&e[0][0]==b?(b=f(e[0]),e.length=1,e[0][1]=h[b],e[0]._idx=b):(e.length=0,e.push([b,h[0]]),e[0]._idx=0);ka(a);"function"==
    typeof d&&d(a)}function eb(a,b,c,d){var e=a.aoColumns[c];ob(b,{},function(h){!1!==e.bSortable&&(a.oFeatures.bProcessing?(V(a,!0),setTimeout(function(){nb(a,c,h.shiftKey,d);"ssp"!==Q(a)&&V(a,!1)},0)):nb(a,c,h.shiftKey,d))})}function Ra(a){var b=a.aLastSort,c=a.oClasses.sSortColumn,d=pa(a),e=a.oFeatures,h;if(e.bSort&&e.bSortClasses){e=0;for(h=b.length;e<h;e++){var f=b[e].src;l(U(a.aoData,"anCells",f)).removeClass(c+(2>e?e+1:3))}e=0;for(h=d.length;e<h;e++)f=d[e].src,l(U(a.aoData,"anCells",f)).addClass(c+
        (2>e?e+1:3))}a.aLastSort=d}function bc(a,b){var c=a.aoColumns[b],d=u.ext.order[c.sSortDataType],e;d&&(e=d.call(a.oInstance,a,b,va(a,b)));for(var h,f=u.ext.type.order[c.sType+"-pre"],g=0,k=a.aoData.length;g<k;g++)if(c=a.aoData[g],c._aSortData||(c._aSortData=[]),!c._aSortData[b]||d)h=d?e[g]:T(a,g,b,"sort"),c._aSortData[b]=f?f(h):h}function qa(a){if(!a._bLoadingState){var b={time:+new Date,start:a._iDisplayStart,length:a._iDisplayLength,order:l.extend(!0,[],a.aaSorting),search:Vb(a.oPreviousSearch),
        columns:l.map(a.aoColumns,function(c,d){return{visible:c.bVisible,search:Vb(a.aoPreSearchCols[d])}})};a.oSavedState=b;F(a,"aoStateSaveParams","stateSaveParams",[a,b]);a.oFeatures.bStateSave&&!a.bDestroying&&a.fnStateSaveCallback.call(a.oInstance,a,b)}}function dc(a,b,c){if(a.oFeatures.bStateSave)return b=a.fnStateLoadCallback.call(a.oInstance,a,function(d){pb(a,d,c)}),b!==q&&pb(a,b,c),!0;c()}function pb(a,b,c){var d,e=a.aoColumns;a._bLoadingState=!0;var h=a._bInitComplete?new u.Api(a):null;if(b&&
        b.time){var f=F(a,"aoStateLoadParams","stateLoadParams",[a,b]);if(-1!==l.inArray(!1,f))a._bLoadingState=!1;else if(f=a.iStateDuration,0<f&&b.time<+new Date-1E3*f)a._bLoadingState=!1;else if(b.columns&&e.length!==b.columns.length)a._bLoadingState=!1;else{a.oLoadedState=l.extend(!0,{},b);b.start!==q&&(a._iDisplayStart=b.start,null===h&&(a.iInitDisplayStart=b.start));b.length!==q&&(a._iDisplayLength=b.length);b.order!==q&&(a.aaSorting=[],l.each(b.order,function(k,m){a.aaSorting.push(m[0]>=e.length?[0,
        m[1]]:m)}));b.search!==q&&l.extend(a.oPreviousSearch,Wb(b.search));if(b.columns){f=0;for(d=b.columns.length;f<d;f++){var g=b.columns[f];g.visible!==q&&(h?h.column(f).visible(g.visible,!1):e[f].bVisible=g.visible);g.search!==q&&l.extend(a.aoPreSearchCols[f],Wb(g.search))}h&&h.columns.adjust()}a._bLoadingState=!1;F(a,"aoStateLoaded","stateLoaded",[a,b])}}else a._bLoadingState=!1;c()}function Sa(a){var b=u.settings;a=l.inArray(a,U(b,"nTable"));return-1!==a?b[a]:null}function da(a,b,c,d){c="DataTables warning: "+
        (a?"table id="+a.sTableId+" - ":"")+c;d&&(c+=". For more information about this error, please see http://datatables.net/tn/"+d);if(b)z.console&&console.log&&console.log(c);else if(b=u.ext,b=b.sErrMode||b.errMode,a&&F(a,null,"error",[a,d,c]),"alert"==b)alert(c);else{if("throw"==b)throw Error(c);"function"==typeof b&&b(a,d,c)}}function X(a,b,c,d){Array.isArray(c)?l.each(c,function(e,h){Array.isArray(h)?X(a,b,h[0],h[1]):X(a,b,h)}):(d===q&&(d=c),b[c]!==q&&(a[d]=b[c]))}function qb(a,b,c){var d;for(d in b)if(b.hasOwnProperty(d)){var e=
        b[d];l.isPlainObject(e)?(l.isPlainObject(a[d])||(a[d]={}),l.extend(!0,a[d],e)):c&&"data"!==d&&"aaData"!==d&&Array.isArray(e)?a[d]=e.slice():a[d]=e}return a}function ob(a,b,c){l(a).on("click.DT",b,function(d){l(a).trigger("blur");c(d)}).on("keypress.DT",b,function(d){13===d.which&&(d.preventDefault(),c(d))}).on("selectstart.DT",function(){return!1})}function R(a,b,c,d){c&&a[b].push({fn:c,sName:d})}function F(a,b,c,d){var e=[];b&&(e=l.map(a[b].slice().reverse(),function(h,f){return h.fn.apply(a.oInstance,
        d)}));null!==c&&(b=l.Event(c+".dt"),l(a.nTable).trigger(b,d),e.push(b.result));return e}function kb(a){var b=a._iDisplayStart,c=a.fnDisplayEnd(),d=a._iDisplayLength;b>=c&&(b=c-d);b-=b%d;if(-1===d||0>b)b=0;a._iDisplayStart=b}function fb(a,b){a=a.renderer;var c=u.ext.renderer[b];return l.isPlainObject(a)&&a[b]?c[a[b]]||c._:"string"===typeof a?c[a]||c._:c._}function Q(a){return a.oFeatures.bServerSide?"ssp":a.ajax||a.sAjaxSource?"ajax":"dom"}function Da(a,b){var c=ec.numbers_length,d=Math.floor(c/2);
        b<=c?a=ra(0,b):a<=d?(a=ra(0,c-2),a.push("ellipsis"),a.push(b-1)):(a>=b-1-d?a=ra(b-(c-2),b):(a=ra(a-d+2,a+d-1),a.push("ellipsis"),a.push(b-1)),a.splice(0,0,"ellipsis"),a.splice(0,0,0));a.DT_el="span";return a}function Wa(a){l.each({num:function(b){return Ta(b,a)},"num-fmt":function(b){return Ta(b,a,rb)},"html-num":function(b){return Ta(b,a,Ua)},"html-num-fmt":function(b){return Ta(b,a,Ua,rb)}},function(b,c){M.type.order[b+a+"-pre"]=c;b.match(/^html\-/)&&(M.type.search[b+a]=M.type.search.html)})}function fc(a){return function(){var b=
        [Sa(this[u.ext.iApiIndex])].concat(Array.prototype.slice.call(arguments));return u.ext.internal[a].apply(this,b)}}var u=function(a,b){if(this instanceof u)return l(a).DataTable(b);b=a;this.$=function(f,g){return this.api(!0).$(f,g)};this._=function(f,g){return this.api(!0).rows(f,g).data()};this.api=function(f){return f?new B(Sa(this[M.iApiIndex])):new B(this)};this.fnAddData=function(f,g){var k=this.api(!0);f=Array.isArray(f)&&(Array.isArray(f[0])||l.isPlainObject(f[0]))?k.rows.add(f):k.row.add(f);
        (g===q||g)&&k.draw();return f.flatten().toArray()};this.fnAdjustColumnSizing=function(f){var g=this.api(!0).columns.adjust(),k=g.settings()[0],m=k.oScroll;f===q||f?g.draw(!1):(""!==m.sX||""!==m.sY)&&Ha(k)};this.fnClearTable=function(f){var g=this.api(!0).clear();(f===q||f)&&g.draw()};this.fnClose=function(f){this.api(!0).row(f).child.hide()};this.fnDeleteRow=function(f,g,k){var m=this.api(!0);f=m.rows(f);var n=f.settings()[0],p=n.aoData[f[0][0]];f.remove();g&&g.call(this,n,p);(k===q||k)&&m.draw();
        return p};this.fnDestroy=function(f){this.api(!0).destroy(f)};this.fnDraw=function(f){this.api(!0).draw(f)};this.fnFilter=function(f,g,k,m,n,p){n=this.api(!0);null===g||g===q?n.search(f,k,m,p):n.column(g).search(f,k,m,p);n.draw()};this.fnGetData=function(f,g){var k=this.api(!0);if(f!==q){var m=f.nodeName?f.nodeName.toLowerCase():"";return g!==q||"td"==m||"th"==m?k.cell(f,g).data():k.row(f).data()||null}return k.data().toArray()};this.fnGetNodes=function(f){var g=this.api(!0);return f!==q?g.row(f).node():
        g.rows().nodes().flatten().toArray()};this.fnGetPosition=function(f){var g=this.api(!0),k=f.nodeName.toUpperCase();return"TR"==k?g.row(f).index():"TD"==k||"TH"==k?(f=g.cell(f).index(),[f.row,f.columnVisible,f.column]):null};this.fnIsOpen=function(f){return this.api(!0).row(f).child.isShown()};this.fnOpen=function(f,g,k){return this.api(!0).row(f).child(g,k).show().child()[0]};this.fnPageChange=function(f,g){f=this.api(!0).page(f);(g===q||g)&&f.draw(!1)};this.fnSetColumnVis=function(f,g,k){f=this.api(!0).column(f).visible(g);
        (k===q||k)&&f.columns.adjust().draw()};this.fnSettings=function(){return Sa(this[M.iApiIndex])};this.fnSort=function(f){this.api(!0).order(f).draw()};this.fnSortListener=function(f,g,k){this.api(!0).order.listener(f,g,k)};this.fnUpdate=function(f,g,k,m,n){var p=this.api(!0);k===q||null===k?p.row(g).data(f):p.cell(g,k).data(f);(n===q||n)&&p.columns.adjust();(m===q||m)&&p.draw();return 0};this.fnVersionCheck=M.fnVersionCheck;var c=this,d=b===q,e=this.length;d&&(b={});this.oApi=this.internal=M.internal;
        for(var h in u.ext.internal)h&&(this[h]=fc(h));this.each(function(){var f={},g=1<e?qb(f,b,!0):b,k=0,m;f=this.getAttribute("id");var n=!1,p=u.defaults,t=l(this);if("table"!=this.nodeName.toLowerCase())da(null,0,"Non-table node initialisation ("+this.nodeName+")",2);else{zb(p);Ab(p.column);P(p,p,!0);P(p.column,p.column,!0);P(p,l.extend(g,t.data()),!0);var v=u.settings;k=0;for(m=v.length;k<m;k++){var x=v[k];if(x.nTable==this||x.nTHead&&x.nTHead.parentNode==this||x.nTFoot&&x.nTFoot.parentNode==this){var w=
            g.bRetrieve!==q?g.bRetrieve:p.bRetrieve;if(d||w)return x.oInstance;if(g.bDestroy!==q?g.bDestroy:p.bDestroy){x.oInstance.fnDestroy();break}else{da(x,0,"Cannot reinitialise DataTable",3);return}}if(x.sTableId==this.id){v.splice(k,1);break}}if(null===f||""===f)this.id=f="DataTables_Table_"+u.ext._unique++;var r=l.extend(!0,{},u.models.oSettings,{sDestroyWidth:t[0].style.width,sInstance:f,sTableId:f});r.nTable=this;r.oApi=c.internal;r.oInit=g;v.push(r);r.oInstance=1===c.length?c:t.dataTable();zb(g);ma(g.oLanguage);
            g.aLengthMenu&&!g.iDisplayLength&&(g.iDisplayLength=Array.isArray(g.aLengthMenu[0])?g.aLengthMenu[0][0]:g.aLengthMenu[0]);g=qb(l.extend(!0,{},p),g);X(r.oFeatures,g,"bPaginate bLengthChange bFilter bSort bSortMulti bInfo bProcessing bAutoWidth bSortClasses bServerSide bDeferRender".split(" "));X(r,g,["asStripeClasses","ajax","fnServerData","fnFormatNumber","sServerMethod","aaSorting","aaSortingFixed","aLengthMenu","sPaginationType","sAjaxSource","sAjaxDataProp","iStateDuration","sDom","bSortCellsTop",
                "iTabIndex","fnStateLoadCallback","fnStateSaveCallback","renderer","searchDelay","rowId",["iCookieDuration","iStateDuration"],["oSearch","oPreviousSearch"],["aoSearchCols","aoPreSearchCols"],["iDisplayLength","_iDisplayLength"]]);X(r.oScroll,g,[["sScrollX","sX"],["sScrollXInner","sXInner"],["sScrollY","sY"],["bScrollCollapse","bCollapse"]]);X(r.oLanguage,g,"fnInfoCallback");R(r,"aoDrawCallback",g.fnDrawCallback,"user");R(r,"aoServerParams",g.fnServerParams,"user");R(r,"aoStateSaveParams",g.fnStateSaveParams,
                "user");R(r,"aoStateLoadParams",g.fnStateLoadParams,"user");R(r,"aoStateLoaded",g.fnStateLoaded,"user");R(r,"aoRowCallback",g.fnRowCallback,"user");R(r,"aoRowCreatedCallback",g.fnCreatedRow,"user");R(r,"aoHeaderCallback",g.fnHeaderCallback,"user");R(r,"aoFooterCallback",g.fnFooterCallback,"user");R(r,"aoInitComplete",g.fnInitComplete,"user");R(r,"aoPreDrawCallback",g.fnPreDrawCallback,"user");r.rowIdFn=na(g.rowId);Bb(r);var C=r.oClasses;l.extend(C,u.ext.classes,g.oClasses);t.addClass(C.sTable);r.iInitDisplayStart===
            q&&(r.iInitDisplayStart=g.iDisplayStart,r._iDisplayStart=g.iDisplayStart);null!==g.iDeferLoading&&(r.bDeferLoading=!0,f=Array.isArray(g.iDeferLoading),r._iRecordsDisplay=f?g.iDeferLoading[0]:g.iDeferLoading,r._iRecordsTotal=f?g.iDeferLoading[1]:g.iDeferLoading);var G=r.oLanguage;l.extend(!0,G,g.oLanguage);G.sUrl?(l.ajax({dataType:"json",url:G.sUrl,success:function(I){P(p.oLanguage,I);ma(I);l.extend(!0,G,I);F(r,null,"i18n",[r]);Ba(r)},error:function(){Ba(r)}}),n=!0):F(r,null,"i18n",[r]);null===g.asStripeClasses&&
            (r.asStripeClasses=[C.sStripeOdd,C.sStripeEven]);f=r.asStripeClasses;var aa=t.children("tbody").find("tr").eq(0);-1!==l.inArray(!0,l.map(f,function(I,H){return aa.hasClass(I)}))&&(l("tbody tr",this).removeClass(f.join(" ")),r.asDestroyStripes=f.slice());f=[];v=this.getElementsByTagName("thead");0!==v.length&&(xa(r.aoHeader,v[0]),f=Na(r));if(null===g.aoColumns)for(v=[],k=0,m=f.length;k<m;k++)v.push(null);else v=g.aoColumns;k=0;for(m=v.length;k<m;k++)Xa(r,f?f[k]:null);Db(r,g.aoColumnDefs,v,function(I,
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  H){Ga(r,I,H)});if(aa.length){var L=function(I,H){return null!==I.getAttribute("data-"+H)?H:null};l(aa[0]).children("th, td").each(function(I,H){var ea=r.aoColumns[I];if(ea.mData===I){var Y=L(H,"sort")||L(H,"order");H=L(H,"filter")||L(H,"search");if(null!==Y||null!==H)ea.mData={_:I+".display",sort:null!==Y?I+".@data-"+Y:q,type:null!==Y?I+".@data-"+Y:q,filter:null!==H?I+".@data-"+H:q},Ga(r,I)}})}var O=r.oFeatures;f=function(){if(g.aaSorting===q){var I=r.aaSorting;k=0;for(m=I.length;k<m;k++)I[k][1]=
                r.aoColumns[k].asSorting[0]}Ra(r);O.bSort&&R(r,"aoDrawCallback",function(){if(r.bSorted){var Y=pa(r),Ca={};l.each(Y,function(fa,ba){Ca[ba.src]=ba.dir});F(r,null,"order",[r,Y,Ca]);cc(r)}});R(r,"aoDrawCallback",function(){(r.bSorted||"ssp"===Q(r)||O.bDeferRender)&&Ra(r)},"sc");I=t.children("caption").each(function(){this._captionSide=l(this).css("caption-side")});var H=t.children("thead");0===H.length&&(H=l("<thead/>").appendTo(t));r.nTHead=H[0];var ea=t.children("tbody");0===ea.length&&(ea=l("<tbody/>").insertAfter(H));
                r.nTBody=ea[0];H=t.children("tfoot");0===H.length&&0<I.length&&(""!==r.oScroll.sX||""!==r.oScroll.sY)&&(H=l("<tfoot/>").appendTo(t));0===H.length||0===H.children().length?t.addClass(C.sNoFooter):0<H.length&&(r.nTFoot=H[0],xa(r.aoFooter,r.nTFoot));if(g.aaData)for(k=0;k<g.aaData.length;k++)ia(r,g.aaData[k]);else(r.bDeferLoading||"dom"==Q(r))&&Ja(r,l(r.nTBody).children("tr"));r.aiDisplay=r.aiDisplayMaster.slice();r.bInitialised=!0;!1===n&&Ba(r)};R(r,"aoDrawCallback",qa,"state_save");g.bStateSave?(O.bStateSave=
                !0,dc(r,g,f)):f()}});c=null;return this},M,y,J,sb={},gc=/[\r\n\u2028]/g,Ua=/<.*?>/g,uc=/^\d{2,4}[\.\/\-]\d{1,2}[\.\/\-]\d{1,2}([T ]{1}\d{1,2}[:\.]\d{2}([\.:]\d{2})?)?$/,vc=/(\/|\.|\*|\+|\?|\||\(|\)|\[|\]|\{|\}|\\|\$|\^|\-)/g,rb=/['\u00A0,$£€¥%\u2009\u202F\u20BD\u20a9\u20BArfkɃΞ]/gi,Z=function(a){return a&&!0!==a&&"-"!==a?!1:!0},hc=function(a){var b=parseInt(a,10);return!isNaN(b)&&isFinite(a)?b:null},ic=function(a,b){sb[b]||(sb[b]=new RegExp(ib(b),"g"));return"string"===typeof a&&"."!==b?a.replace(/\./g,
        "").replace(sb[b],"."):a},tb=function(a,b,c){var d="string"===typeof a;if(Z(a))return!0;b&&d&&(a=ic(a,b));c&&d&&(a=a.replace(rb,""));return!isNaN(parseFloat(a))&&isFinite(a)},jc=function(a,b,c){return Z(a)?!0:Z(a)||"string"===typeof a?tb(a.replace(Ua,""),b,c)?!0:null:null},U=function(a,b,c){var d=[],e=0,h=a.length;if(c!==q)for(;e<h;e++)a[e]&&a[e][b]&&d.push(a[e][b][c]);else for(;e<h;e++)a[e]&&d.push(a[e][b]);return d},Ea=function(a,b,c,d){var e=[],h=0,f=b.length;if(d!==q)for(;h<f;h++)a[b[h]][c]&&
    e.push(a[b[h]][c][d]);else for(;h<f;h++)e.push(a[b[h]][c]);return e},ra=function(a,b){var c=[];if(b===q){b=0;var d=a}else d=b,b=a;for(a=b;a<d;a++)c.push(a);return c},kc=function(a){for(var b=[],c=0,d=a.length;c<d;c++)a[c]&&b.push(a[c]);return b},Ma=function(a){a:{if(!(2>a.length)){var b=a.slice().sort();for(var c=b[0],d=1,e=b.length;d<e;d++){if(b[d]===c){b=!1;break a}c=b[d]}}b=!0}if(b)return a.slice();b=[];e=a.length;var h,f=0;d=0;a:for(;d<e;d++){c=a[d];for(h=0;h<f;h++)if(b[h]===c)continue a;b.push(c);
        f++}return b},lc=function(a,b){if(Array.isArray(b))for(var c=0;c<b.length;c++)lc(a,b[c]);else a.push(b);return a},mc=function(a,b){b===q&&(b=0);return-1!==this.indexOf(a,b)};Array.isArray||(Array.isArray=function(a){return"[object Array]"===Object.prototype.toString.call(a)});Array.prototype.includes||(Array.prototype.includes=mc);String.prototype.trim||(String.prototype.trim=function(){return this.replace(/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,"")});String.prototype.includes||(String.prototype.includes=
        mc);u.util={throttle:function(a,b){var c=b!==q?b:200,d,e;return function(){var h=this,f=+new Date,g=arguments;d&&f<d+c?(clearTimeout(e),e=setTimeout(function(){d=q;a.apply(h,g)},c)):(d=f,a.apply(h,g))}},escapeRegex:function(a){return a.replace(vc,"\\$1")},set:function(a){if(l.isPlainObject(a))return u.util.set(a._);if(null===a)return function(){};if("function"===typeof a)return function(c,d,e){a(c,"set",d,e)};if("string"!==typeof a||-1===a.indexOf(".")&&-1===a.indexOf("[")&&-1===a.indexOf("("))return function(c,
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           d){c[a]=d};var b=function(c,d,e){e=bb(e);var h=e[e.length-1];for(var f,g,k=0,m=e.length-1;k<m;k++){if("__proto__"===e[k]||"constructor"===e[k])throw Error("Cannot set prototype values");f=e[k].match(Fa);g=e[k].match(sa);if(f){e[k]=e[k].replace(Fa,"");c[e[k]]=[];h=e.slice();h.splice(0,k+1);f=h.join(".");if(Array.isArray(d))for(g=0,m=d.length;g<m;g++)h={},b(h,d[g],f),c[e[k]].push(h);else c[e[k]]=d;return}g&&(e[k]=e[k].replace(sa,""),c=c[e[k]](d));if(null===c[e[k]]||c[e[k]]===q)c[e[k]]={};c=c[e[k]]}if(h.match(sa))c[h.replace(sa,
            "")](d);else c[h.replace(Fa,"")]=d};return function(c,d){return b(c,d,a)}},get:function(a){if(l.isPlainObject(a)){var b={};l.each(a,function(d,e){e&&(b[d]=u.util.get(e))});return function(d,e,h,f){var g=b[e]||b._;return g!==q?g(d,e,h,f):d}}if(null===a)return function(d){return d};if("function"===typeof a)return function(d,e,h,f){return a(d,e,h,f)};if("string"!==typeof a||-1===a.indexOf(".")&&-1===a.indexOf("[")&&-1===a.indexOf("("))return function(d,e){return d[a]};var c=function(d,e,h){if(""!==h){var f=
            bb(h);for(var g=0,k=f.length;g<k;g++){h=f[g].match(Fa);var m=f[g].match(sa);if(h){f[g]=f[g].replace(Fa,"");""!==f[g]&&(d=d[f[g]]);m=[];f.splice(0,g+1);f=f.join(".");if(Array.isArray(d))for(g=0,k=d.length;g<k;g++)m.push(c(d[g],e,f));d=h[0].substring(1,h[0].length-1);d=""===d?m:m.join(d);break}else if(m){f[g]=f[g].replace(sa,"");d=d[f[g]]();continue}if(null===d||d[f[g]]===q)return q;d=d[f[g]]}}return d};return function(d,e){return c(d,e,a)}}};var S=function(a,b,c){a[b]!==q&&(a[c]=a[b])},Fa=/\[.*?\]$/,
        sa=/\(\)$/,na=u.util.get,ha=u.util.set,ib=u.util.escapeRegex,Qa=l("<div>")[0],sc=Qa.textContent!==q,tc=/<.*?>/g,gb=u.util.throttle,nc=[],N=Array.prototype,wc=function(a){var b,c=u.settings,d=l.map(c,function(h,f){return h.nTable});if(a){if(a.nTable&&a.oApi)return[a];if(a.nodeName&&"table"===a.nodeName.toLowerCase()){var e=l.inArray(a,d);return-1!==e?[c[e]]:null}if(a&&"function"===typeof a.settings)return a.settings().toArray();"string"===typeof a?b=l(a):a instanceof l&&(b=a)}else return[];if(b)return b.map(function(h){e=
            l.inArray(this,d);return-1!==e?c[e]:null}).toArray()};var B=function(a,b){if(!(this instanceof B))return new B(a,b);var c=[],d=function(f){(f=wc(f))&&c.push.apply(c,f)};if(Array.isArray(a))for(var e=0,h=a.length;e<h;e++)d(a[e]);else d(a);this.context=Ma(c);b&&l.merge(this,b);this.selector={rows:null,cols:null,opts:null};B.extend(this,this,nc)};u.Api=B;l.extend(B.prototype,{any:function(){return 0!==this.count()},concat:N.concat,context:[],count:function(){return this.flatten().length},each:function(a){for(var b=
            0,c=this.length;b<c;b++)a.call(this,this[b],b,this);return this},eq:function(a){var b=this.context;return b.length>a?new B(b[a],this[a]):null},filter:function(a){var b=[];if(N.filter)b=N.filter.call(this,a,this);else for(var c=0,d=this.length;c<d;c++)a.call(this,this[c],c,this)&&b.push(this[c]);return new B(this.context,b)},flatten:function(){var a=[];return new B(this.context,a.concat.apply(a,this.toArray()))},join:N.join,indexOf:N.indexOf||function(a,b){b=b||0;for(var c=this.length;b<c;b++)if(this[b]===
            a)return b;return-1},iterator:function(a,b,c,d){var e=[],h,f,g=this.context,k,m=this.selector;"string"===typeof a&&(d=c,c=b,b=a,a=!1);var n=0;for(h=g.length;n<h;n++){var p=new B(g[n]);if("table"===b){var t=c.call(p,g[n],n);t!==q&&e.push(t)}else if("columns"===b||"rows"===b)t=c.call(p,g[n],this[n],n),t!==q&&e.push(t);else if("column"===b||"column-rows"===b||"row"===b||"cell"===b){var v=this[n];"column-rows"===b&&(k=Va(g[n],m.opts));var x=0;for(f=v.length;x<f;x++)t=v[x],t="cell"===b?c.call(p,g[n],t.row,
            t.column,n,x):c.call(p,g[n],t,n,x,k),t!==q&&e.push(t)}}return e.length||d?(a=new B(g,a?e.concat.apply([],e):e),b=a.selector,b.rows=m.rows,b.cols=m.cols,b.opts=m.opts,a):this},lastIndexOf:N.lastIndexOf||function(a,b){return this.indexOf.apply(this.toArray.reverse(),arguments)},length:0,map:function(a){var b=[];if(N.map)b=N.map.call(this,a,this);else for(var c=0,d=this.length;c<d;c++)b.push(a.call(this,this[c],c));return new B(this.context,b)},pluck:function(a){return this.map(function(b){return b[a]})},
        pop:N.pop,push:N.push,reduce:N.reduce||function(a,b){return Cb(this,a,b,0,this.length,1)},reduceRight:N.reduceRight||function(a,b){return Cb(this,a,b,this.length-1,-1,-1)},reverse:N.reverse,selector:null,shift:N.shift,slice:function(){return new B(this.context,this)},sort:N.sort,splice:N.splice,toArray:function(){return N.slice.call(this)},to$:function(){return l(this)},toJQuery:function(){return l(this)},unique:function(){return new B(this.context,Ma(this))},unshift:N.unshift});B.extend=function(a,
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              b,c){if(c.length&&b&&(b instanceof B||b.__dt_wrapper)){var d,e=function(g,k,m){return function(){var n=k.apply(g,arguments);B.extend(n,n,m.methodExt);return n}};var h=0;for(d=c.length;h<d;h++){var f=c[h];b[f.name]="function"===f.type?e(a,f.val,f):"object"===f.type?{}:f.val;b[f.name].__dt_wrapper=!0;B.extend(a,b[f.name],f.propExt)}}};B.register=y=function(a,b){if(Array.isArray(a))for(var c=0,d=a.length;c<d;c++)B.register(a[c],b);else{d=a.split(".");var e=nc,h;a=0;for(c=d.length;a<c;a++){var f=(h=-1!==
        d[a].indexOf("()"))?d[a].replace("()",""):d[a];a:{var g=0;for(var k=e.length;g<k;g++)if(e[g].name===f){g=e[g];break a}g=null}g||(g={name:f,val:{},methodExt:[],propExt:[],type:"object"},e.push(g));a===c-1?(g.val=b,g.type="function"===typeof b?"function":l.isPlainObject(b)?"object":"other"):e=h?g.methodExt:g.propExt}}};B.registerPlural=J=function(a,b,c){B.register(a,c);B.register(b,function(){var d=c.apply(this,arguments);return d===this?this:d instanceof B?d.length?Array.isArray(d[0])?new B(d.context,
        d[0]):d[0]:q:d})};var oc=function(a,b){if(Array.isArray(a))return l.map(a,function(d){return oc(d,b)});if("number"===typeof a)return[b[a]];var c=l.map(b,function(d,e){return d.nTable});return l(c).filter(a).map(function(d){d=l.inArray(this,c);return b[d]}).toArray()};y("tables()",function(a){return a!==q&&null!==a?new B(oc(a,this.context)):this});y("table()",function(a){a=this.tables(a);var b=a.context;return b.length?new B(b[0]):a});J("tables().nodes()","table().node()",function(){return this.iterator("table",
        function(a){return a.nTable},1)});J("tables().body()","table().body()",function(){return this.iterator("table",function(a){return a.nTBody},1)});J("tables().header()","table().header()",function(){return this.iterator("table",function(a){return a.nTHead},1)});J("tables().footer()","table().footer()",function(){return this.iterator("table",function(a){return a.nTFoot},1)});J("tables().containers()","table().container()",function(){return this.iterator("table",function(a){return a.nTableWrapper},1)});
    y("draw()",function(a){return this.iterator("table",function(b){"page"===a?ja(b):("string"===typeof a&&(a="full-hold"===a?!1:!0),ka(b,!1===a))})});y("page()",function(a){return a===q?this.page.info().page:this.iterator("table",function(b){lb(b,a)})});y("page.info()",function(a){if(0===this.context.length)return q;a=this.context[0];var b=a._iDisplayStart,c=a.oFeatures.bPaginate?a._iDisplayLength:-1,d=a.fnRecordsDisplay(),e=-1===c;return{page:e?0:Math.floor(b/c),pages:e?1:Math.ceil(d/c),start:b,end:a.fnDisplayEnd(),
        length:c,recordsTotal:a.fnRecordsTotal(),recordsDisplay:d,serverSide:"ssp"===Q(a)}});y("page.len()",function(a){return a===q?0!==this.context.length?this.context[0]._iDisplayLength:q:this.iterator("table",function(b){jb(b,a)})});var pc=function(a,b,c){if(c){var d=new B(a);d.one("draw",function(){c(d.ajax.json())})}if("ssp"==Q(a))ka(a,b);else{V(a,!0);var e=a.jqXHR;e&&4!==e.readyState&&e.abort();Oa(a,[],function(h){Ka(a);h=Aa(a,h);for(var f=0,g=h.length;f<g;f++)ia(a,h[f]);ka(a,b);V(a,!1)})}};y("ajax.json()",
        function(){var a=this.context;if(0<a.length)return a[0].json});y("ajax.params()",function(){var a=this.context;if(0<a.length)return a[0].oAjaxData});y("ajax.reload()",function(a,b){return this.iterator("table",function(c){pc(c,!1===b,a)})});y("ajax.url()",function(a){var b=this.context;if(a===q){if(0===b.length)return q;b=b[0];return b.ajax?l.isPlainObject(b.ajax)?b.ajax.url:b.ajax:b.sAjaxSource}return this.iterator("table",function(c){l.isPlainObject(c.ajax)?c.ajax.url=a:c.ajax=a})});y("ajax.url().load()",
        function(a,b){return this.iterator("table",function(c){pc(c,!1===b,a)})});var ub=function(a,b,c,d,e){var h=[],f,g,k;var m=typeof b;b&&"string"!==m&&"function"!==m&&b.length!==q||(b=[b]);m=0;for(g=b.length;m<g;m++){var n=b[m]&&b[m].split&&!b[m].match(/[\[\(:]/)?b[m].split(","):[b[m]];var p=0;for(k=n.length;p<k;p++)(f=c("string"===typeof n[p]?n[p].trim():n[p]))&&f.length&&(h=h.concat(f))}a=M.selector[a];if(a.length)for(m=0,g=a.length;m<g;m++)h=a[m](d,e,h);return Ma(h)},vb=function(a){a||(a={});a.filter&&
    a.search===q&&(a.search=a.filter);return l.extend({search:"none",order:"current",page:"all"},a)},wb=function(a){for(var b=0,c=a.length;b<c;b++)if(0<a[b].length)return a[0]=a[b],a[0].length=1,a.length=1,a.context=[a.context[b]],a;a.length=0;return a},Va=function(a,b){var c=[],d=a.aiDisplay;var e=a.aiDisplayMaster;var h=b.search;var f=b.order;b=b.page;if("ssp"==Q(a))return"removed"===h?[]:ra(0,e.length);if("current"==b)for(f=a._iDisplayStart,a=a.fnDisplayEnd();f<a;f++)c.push(d[f]);else if("current"==
        f||"applied"==f)if("none"==h)c=e.slice();else if("applied"==h)c=d.slice();else{if("removed"==h){var g={};f=0;for(a=d.length;f<a;f++)g[d[f]]=null;c=l.map(e,function(k){return g.hasOwnProperty(k)?null:k})}}else if("index"==f||"original"==f)for(f=0,a=a.aoData.length;f<a;f++)"none"==h?c.push(f):(e=l.inArray(f,d),(-1===e&&"removed"==h||0<=e&&"applied"==h)&&c.push(f));return c},xc=function(a,b,c){var d;return ub("row",b,function(e){var h=hc(e),f=a.aoData;if(null!==h&&!c)return[h];d||(d=Va(a,c));if(null!==
        h&&-1!==l.inArray(h,d))return[h];if(null===e||e===q||""===e)return d;if("function"===typeof e)return l.map(d,function(k){var m=f[k];return e(k,m._aData,m.nTr)?k:null});if(e.nodeName){h=e._DT_RowIndex;var g=e._DT_CellIndex;if(h!==q)return f[h]&&f[h].nTr===e?[h]:[];if(g)return f[g.row]&&f[g.row].nTr===e.parentNode?[g.row]:[];h=l(e).closest("*[data-dt-row]");return h.length?[h.data("dt-row")]:[]}if("string"===typeof e&&"#"===e.charAt(0)&&(h=a.aIds[e.replace(/^#/,"")],h!==q))return[h.idx];h=kc(Ea(a.aoData,
        d,"nTr"));return l(h).filter(e).map(function(){return this._DT_RowIndex}).toArray()},a,c)};y("rows()",function(a,b){a===q?a="":l.isPlainObject(a)&&(b=a,a="");b=vb(b);var c=this.iterator("table",function(d){return xc(d,a,b)},1);c.selector.rows=a;c.selector.opts=b;return c});y("rows().nodes()",function(){return this.iterator("row",function(a,b){return a.aoData[b].nTr||q},1)});y("rows().data()",function(){return this.iterator(!0,"rows",function(a,b){return Ea(a.aoData,b,"_aData")},1)});J("rows().cache()",
        "row().cache()",function(a){return this.iterator("row",function(b,c){b=b.aoData[c];return"search"===a?b._aFilterData:b._aSortData},1)});J("rows().invalidate()","row().invalidate()",function(a){return this.iterator("row",function(b,c){wa(b,c,a)})});J("rows().indexes()","row().index()",function(){return this.iterator("row",function(a,b){return b},1)});J("rows().ids()","row().id()",function(a){for(var b=[],c=this.context,d=0,e=c.length;d<e;d++)for(var h=0,f=this[d].length;h<f;h++){var g=c[d].rowIdFn(c[d].aoData[this[d][h]]._aData);
        b.push((!0===a?"#":"")+g)}return new B(c,b)});J("rows().remove()","row().remove()",function(){var a=this;this.iterator("row",function(b,c,d){var e=b.aoData,h=e[c],f,g;e.splice(c,1);var k=0;for(f=e.length;k<f;k++){var m=e[k];var n=m.anCells;null!==m.nTr&&(m.nTr._DT_RowIndex=k);if(null!==n)for(m=0,g=n.length;m<g;m++)n[m]._DT_CellIndex.row=k}La(b.aiDisplayMaster,c);La(b.aiDisplay,c);La(a[d],c,!1);0<b._iRecordsDisplay&&b._iRecordsDisplay--;kb(b);c=b.rowIdFn(h._aData);c!==q&&delete b.aIds[c]});this.iterator("table",
        function(b){for(var c=0,d=b.aoData.length;c<d;c++)b.aoData[c].idx=c});return this});y("rows.add()",function(a){var b=this.iterator("table",function(d){var e,h=[];var f=0;for(e=a.length;f<e;f++){var g=a[f];g.nodeName&&"TR"===g.nodeName.toUpperCase()?h.push(Ja(d,g)[0]):h.push(ia(d,g))}return h},1),c=this.rows(-1);c.pop();l.merge(c,b);return c});y("row()",function(a,b){return wb(this.rows(a,b))});y("row().data()",function(a){var b=this.context;if(a===q)return b.length&&this.length?b[0].aoData[this[0]]._aData:
        q;var c=b[0].aoData[this[0]];c._aData=a;Array.isArray(a)&&c.nTr&&c.nTr.id&&ha(b[0].rowId)(a,c.nTr.id);wa(b[0],this[0],"data");return this});y("row().node()",function(){var a=this.context;return a.length&&this.length?a[0].aoData[this[0]].nTr||null:null});y("row.add()",function(a){a instanceof l&&a.length&&(a=a[0]);var b=this.iterator("table",function(c){return a.nodeName&&"TR"===a.nodeName.toUpperCase()?Ja(c,a)[0]:ia(c,a)});return this.row(b[0])});l(A).on("plugin-init.dt",function(a,b){var c=new B(b);
        c.on("stateSaveParams",function(d,e,h){d=c.rows().iterator("row",function(f,g){return f.aoData[g]._detailsShow?g:q});h.childRows=c.rows(d).ids(!0).toArray()});(a=c.state.loaded())&&a.childRows&&c.rows(a.childRows).every(function(){F(b,null,"requestChild",[this])})});var yc=function(a,b,c,d){var e=[],h=function(f,g){if(Array.isArray(f)||f instanceof l)for(var k=0,m=f.length;k<m;k++)h(f[k],g);else f.nodeName&&"tr"===f.nodeName.toLowerCase()?e.push(f):(k=l("<tr><td></td></tr>").addClass(g),l("td",k).addClass(g).html(f)[0].colSpan=
        oa(a),e.push(k[0]))};h(c,d);b._details&&b._details.detach();b._details=l(e);b._detailsShow&&b._details.insertAfter(b.nTr)},xb=function(a,b){var c=a.context;c.length&&(a=c[0].aoData[b!==q?b:a[0]])&&a._details&&(a._details.remove(),a._detailsShow=q,a._details=q,l(a.nTr).removeClass("dt-hasChild"),qa(c[0]))},qc=function(a,b){var c=a.context;if(c.length&&a.length){var d=c[0].aoData[a[0]];d._details&&((d._detailsShow=b)?(d._details.insertAfter(d.nTr),l(d.nTr).addClass("dt-hasChild")):(d._details.detach(),
        l(d.nTr).removeClass("dt-hasChild")),F(c[0],null,"childRow",[b,a.row(a[0])]),zc(c[0]),qa(c[0]))}},zc=function(a){var b=new B(a),c=a.aoData;b.off("draw.dt.DT_details column-visibility.dt.DT_details destroy.dt.DT_details");0<U(c,"_details").length&&(b.on("draw.dt.DT_details",function(d,e){a===e&&b.rows({page:"current"}).eq(0).each(function(h){h=c[h];h._detailsShow&&h._details.insertAfter(h.nTr)})}),b.on("column-visibility.dt.DT_details",function(d,e,h,f){if(a===e)for(e=oa(e),h=0,f=c.length;h<f;h++)d=
        c[h],d._details&&d._details.children("td[colspan]").attr("colspan",e)}),b.on("destroy.dt.DT_details",function(d,e){if(a===e)for(d=0,e=c.length;d<e;d++)c[d]._details&&xb(b,d)}))};y("row().child()",function(a,b){var c=this.context;if(a===q)return c.length&&this.length?c[0].aoData[this[0]]._details:q;!0===a?this.child.show():!1===a?xb(this):c.length&&this.length&&yc(c[0],c[0].aoData[this[0]],a,b);return this});y(["row().child.show()","row().child().show()"],function(a){qc(this,!0);return this});y(["row().child.hide()",
        "row().child().hide()"],function(){qc(this,!1);return this});y(["row().child.remove()","row().child().remove()"],function(){xb(this);return this});y("row().child.isShown()",function(){var a=this.context;return a.length&&this.length?a[0].aoData[this[0]]._detailsShow||!1:!1});var Ac=/^([^:]+):(name|visIdx|visible)$/,rc=function(a,b,c,d,e){c=[];d=0;for(var h=e.length;d<h;d++)c.push(T(a,e[d],b));return c},Bc=function(a,b,c){var d=a.aoColumns,e=U(d,"sName"),h=U(d,"nTh");return ub("column",b,function(f){var g=
        hc(f);if(""===f)return ra(d.length);if(null!==g)return[0<=g?g:d.length+g];if("function"===typeof f){var k=Va(a,c);return l.map(d,function(p,t){return f(t,rc(a,t,0,0,k),h[t])?t:null})}var m="string"===typeof f?f.match(Ac):"";if(m)switch(m[2]){case "visIdx":case "visible":g=parseInt(m[1],10);if(0>g){var n=l.map(d,function(p,t){return p.bVisible?t:null});return[n[n.length+g]]}return[ua(a,g)];case "name":return l.map(e,function(p,t){return p===m[1]?t:null});default:return[]}if(f.nodeName&&f._DT_CellIndex)return[f._DT_CellIndex.column];
        g=l(h).filter(f).map(function(){return l.inArray(this,h)}).toArray();if(g.length||!f.nodeName)return g;g=l(f).closest("*[data-dt-column]");return g.length?[g.data("dt-column")]:[]},a,c)};y("columns()",function(a,b){a===q?a="":l.isPlainObject(a)&&(b=a,a="");b=vb(b);var c=this.iterator("table",function(d){return Bc(d,a,b)},1);c.selector.cols=a;c.selector.opts=b;return c});J("columns().header()","column().header()",function(a,b){return this.iterator("column",function(c,d){return c.aoColumns[d].nTh},
        1)});J("columns().footer()","column().footer()",function(a,b){return this.iterator("column",function(c,d){return c.aoColumns[d].nTf},1)});J("columns().data()","column().data()",function(){return this.iterator("column-rows",rc,1)});J("columns().dataSrc()","column().dataSrc()",function(){return this.iterator("column",function(a,b){return a.aoColumns[b].mData},1)});J("columns().cache()","column().cache()",function(a){return this.iterator("column-rows",function(b,c,d,e,h){return Ea(b.aoData,h,"search"===
    a?"_aFilterData":"_aSortData",c)},1)});J("columns().nodes()","column().nodes()",function(){return this.iterator("column-rows",function(a,b,c,d,e){return Ea(a.aoData,e,"anCells",b)},1)});J("columns().visible()","column().visible()",function(a,b){var c=this,d=this.iterator("column",function(e,h){if(a===q)return e.aoColumns[h].bVisible;var f=e.aoColumns,g=f[h],k=e.aoData,m;if(a!==q&&g.bVisible!==a){if(a){var n=l.inArray(!0,U(f,"bVisible"),h+1);f=0;for(m=k.length;f<m;f++){var p=k[f].nTr;e=k[f].anCells;
        p&&p.insertBefore(e[h],e[n]||null)}}else l(U(e.aoData,"anCells",h)).detach();g.bVisible=a}});a!==q&&this.iterator("table",function(e){ya(e,e.aoHeader);ya(e,e.aoFooter);e.aiDisplay.length||l(e.nTBody).find("td[colspan]").attr("colspan",oa(e));qa(e);c.iterator("column",function(h,f){F(h,null,"column-visibility",[h,f,a,b])});(b===q||b)&&c.columns.adjust()});return d});J("columns().indexes()","column().index()",function(a){return this.iterator("column",function(b,c){return"visible"===a?va(b,c):c},1)});
    y("columns.adjust()",function(){return this.iterator("table",function(a){ta(a)},1)});y("column.index()",function(a,b){if(0!==this.context.length){var c=this.context[0];if("fromVisible"===a||"toData"===a)return ua(c,b);if("fromData"===a||"toVisible"===a)return va(c,b)}});y("column()",function(a,b){return wb(this.columns(a,b))});var Cc=function(a,b,c){var d=a.aoData,e=Va(a,c),h=kc(Ea(d,e,"anCells")),f=l(lc([],h)),g,k=a.aoColumns.length,m,n,p,t,v,x;return ub("cell",b,function(w){var r="function"===typeof w;
        if(null===w||w===q||r){m=[];n=0;for(p=e.length;n<p;n++)for(g=e[n],t=0;t<k;t++)v={row:g,column:t},r?(x=d[g],w(v,T(a,g,t),x.anCells?x.anCells[t]:null)&&m.push(v)):m.push(v);return m}if(l.isPlainObject(w))return w.column!==q&&w.row!==q&&-1!==l.inArray(w.row,e)?[w]:[];r=f.filter(w).map(function(C,G){return{row:G._DT_CellIndex.row,column:G._DT_CellIndex.column}}).toArray();if(r.length||!w.nodeName)return r;x=l(w).closest("*[data-dt-row]");return x.length?[{row:x.data("dt-row"),column:x.data("dt-column")}]:
            []},a,c)};y("cells()",function(a,b,c){l.isPlainObject(a)&&(a.row===q?(c=a,a=null):(c=b,b=null));l.isPlainObject(b)&&(c=b,b=null);if(null===b||b===q)return this.iterator("table",function(n){return Cc(n,a,vb(c))});var d=c?{page:c.page,order:c.order,search:c.search}:{},e=this.columns(b,d),h=this.rows(a,d),f,g,k,m;d=this.iterator("table",function(n,p){n=[];f=0;for(g=h[p].length;f<g;f++)for(k=0,m=e[p].length;k<m;k++)n.push({row:h[p][f],column:e[p][k]});return n},1);d=c&&c.selected?this.cells(d,c):d;l.extend(d.selector,
        {cols:b,rows:a,opts:c});return d});J("cells().nodes()","cell().node()",function(){return this.iterator("cell",function(a,b,c){return(a=a.aoData[b])&&a.anCells?a.anCells[c]:q},1)});y("cells().data()",function(){return this.iterator("cell",function(a,b,c){return T(a,b,c)},1)});J("cells().cache()","cell().cache()",function(a){a="search"===a?"_aFilterData":"_aSortData";return this.iterator("cell",function(b,c,d){return b.aoData[c][a][d]},1)});J("cells().render()","cell().render()",function(a){return this.iterator("cell",
        function(b,c,d){return T(b,c,d,a)},1)});J("cells().indexes()","cell().index()",function(){return this.iterator("cell",function(a,b,c){return{row:b,column:c,columnVisible:va(a,c)}},1)});J("cells().invalidate()","cell().invalidate()",function(a){return this.iterator("cell",function(b,c,d){wa(b,c,a,d)})});y("cell()",function(a,b,c){return wb(this.cells(a,b,c))});y("cell().data()",function(a){var b=this.context,c=this[0];if(a===q)return b.length&&c.length?T(b[0],c[0].row,c[0].column):q;Eb(b[0],c[0].row,
        c[0].column,a);wa(b[0],c[0].row,"data",c[0].column);return this});y("order()",function(a,b){var c=this.context;if(a===q)return 0!==c.length?c[0].aaSorting:q;"number"===typeof a?a=[[a,b]]:a.length&&!Array.isArray(a[0])&&(a=Array.prototype.slice.call(arguments));return this.iterator("table",function(d){d.aaSorting=a.slice()})});y("order.listener()",function(a,b,c){return this.iterator("table",function(d){eb(d,a,b,c)})});y("order.fixed()",function(a){if(!a){var b=this.context;b=b.length?b[0].aaSortingFixed:
        q;return Array.isArray(b)?{pre:b}:b}return this.iterator("table",function(c){c.aaSortingFixed=l.extend(!0,{},a)})});y(["columns().order()","column().order()"],function(a){var b=this;return this.iterator("table",function(c,d){var e=[];l.each(b[d],function(h,f){e.push([f,a])});c.aaSorting=e})});y("search()",function(a,b,c,d){var e=this.context;return a===q?0!==e.length?e[0].oPreviousSearch.sSearch:q:this.iterator("table",function(h){h.oFeatures.bFilter&&za(h,l.extend({},h.oPreviousSearch,{sSearch:a+
            "",bRegex:null===b?!1:b,bSmart:null===c?!0:c,bCaseInsensitive:null===d?!0:d}),1)})});J("columns().search()","column().search()",function(a,b,c,d){return this.iterator("column",function(e,h){var f=e.aoPreSearchCols;if(a===q)return f[h].sSearch;e.oFeatures.bFilter&&(l.extend(f[h],{sSearch:a+"",bRegex:null===b?!1:b,bSmart:null===c?!0:c,bCaseInsensitive:null===d?!0:d}),za(e,e.oPreviousSearch,1))})});y("state()",function(){return this.context.length?this.context[0].oSavedState:null});y("state.clear()",
        function(){return this.iterator("table",function(a){a.fnStateSaveCallback.call(a.oInstance,a,{})})});y("state.loaded()",function(){return this.context.length?this.context[0].oLoadedState:null});y("state.save()",function(){return this.iterator("table",function(a){qa(a)})});u.versionCheck=u.fnVersionCheck=function(a){var b=u.version.split(".");a=a.split(".");for(var c,d,e=0,h=a.length;e<h;e++)if(c=parseInt(b[e],10)||0,d=parseInt(a[e],10)||0,c!==d)return c>d;return!0};u.isDataTable=u.fnIsDataTable=function(a){var b=
        l(a).get(0),c=!1;if(a instanceof u.Api)return!0;l.each(u.settings,function(d,e){d=e.nScrollHead?l("table",e.nScrollHead)[0]:null;var h=e.nScrollFoot?l("table",e.nScrollFoot)[0]:null;if(e.nTable===b||d===b||h===b)c=!0});return c};u.tables=u.fnTables=function(a){var b=!1;l.isPlainObject(a)&&(b=a.api,a=a.visible);var c=l.map(u.settings,function(d){if(!a||a&&l(d.nTable).is(":visible"))return d.nTable});return b?new B(c):c};u.camelToHungarian=P;y("$()",function(a,b){b=this.rows(b).nodes();b=l(b);return l([].concat(b.filter(a).toArray(),
        b.find(a).toArray()))});l.each(["on","one","off"],function(a,b){y(b+"()",function(){var c=Array.prototype.slice.call(arguments);c[0]=l.map(c[0].split(/\s/),function(e){return e.match(/\.dt\b/)?e:e+".dt"}).join(" ");var d=l(this.tables().nodes());d[b].apply(d,c);return this})});y("clear()",function(){return this.iterator("table",function(a){Ka(a)})});y("settings()",function(){return new B(this.context,this.context)});y("init()",function(){var a=this.context;return a.length?a[0].oInit:null});y("data()",
        function(){return this.iterator("table",function(a){return U(a.aoData,"_aData")}).flatten()});y("destroy()",function(a){a=a||!1;return this.iterator("table",function(b){var c=b.nTableWrapper.parentNode,d=b.oClasses,e=b.nTable,h=b.nTBody,f=b.nTHead,g=b.nTFoot,k=l(e);h=l(h);var m=l(b.nTableWrapper),n=l.map(b.aoData,function(t){return t.nTr}),p;b.bDestroying=!0;F(b,"aoDestroyCallback","destroy",[b]);a||(new B(b)).columns().visible(!0);m.off(".DT").find(":not(tbody *)").off(".DT");l(z).off(".DT-"+b.sInstance);
        e!=f.parentNode&&(k.children("thead").detach(),k.append(f));g&&e!=g.parentNode&&(k.children("tfoot").detach(),k.append(g));b.aaSorting=[];b.aaSortingFixed=[];Ra(b);l(n).removeClass(b.asStripeClasses.join(" "));l("th, td",f).removeClass(d.sSortable+" "+d.sSortableAsc+" "+d.sSortableDesc+" "+d.sSortableNone);h.children().detach();h.append(n);f=a?"remove":"detach";k[f]();m[f]();!a&&c&&(c.insertBefore(e,b.nTableReinsertBefore),k.css("width",b.sDestroyWidth).removeClass(d.sTable),(p=b.asDestroyStripes.length)&&
        h.children().each(function(t){l(this).addClass(b.asDestroyStripes[t%p])}));c=l.inArray(b,u.settings);-1!==c&&u.settings.splice(c,1)})});l.each(["column","row","cell"],function(a,b){y(b+"s().every()",function(c){var d=this.selector.opts,e=this;return this.iterator(b,function(h,f,g,k,m){c.call(e[b](f,"cell"===b?g:d,"cell"===b?d:q),f,g,k,m)})})});y("i18n()",function(a,b,c){var d=this.context[0];a=na(a)(d.oLanguage);a===q&&(a=b);c!==q&&l.isPlainObject(a)&&(a=a[c]!==q?a[c]:a._);return a.replace("%d",c)});
    u.version="1.11.3";u.settings=[];u.models={};u.models.oSearch={bCaseInsensitive:!0,sSearch:"",bRegex:!1,bSmart:!0,"return":!1};u.models.oRow={nTr:null,anCells:null,_aData:[],_aSortData:null,_aFilterData:null,_sFilterRow:null,_sRowStripe:"",src:null,idx:-1};u.models.oColumn={idx:null,aDataSort:null,asSorting:null,bSearchable:null,bSortable:null,bVisible:null,_sManualType:null,_bAttrSrc:!1,fnCreatedCell:null,fnGetData:null,fnSetData:null,mData:null,mRender:null,nTh:null,nTf:null,sClass:null,sContentPadding:null,
        sDefaultContent:null,sName:null,sSortDataType:"std",sSortingClass:null,sSortingClassJUI:null,sTitle:null,sType:null,sWidth:null,sWidthOrig:null};u.defaults={aaData:null,aaSorting:[[0,"asc"]],aaSortingFixed:[],ajax:null,aLengthMenu:[10,25,50,100],aoColumns:null,aoColumnDefs:null,aoSearchCols:[],asStripeClasses:null,bAutoWidth:!0,bDeferRender:!1,bDestroy:!1,bFilter:!0,bInfo:!0,bLengthChange:!0,bPaginate:!0,bProcessing:!1,bRetrieve:!1,bScrollCollapse:!1,bServerSide:!1,bSort:!0,bSortMulti:!0,bSortCellsTop:!1,
        bSortClasses:!0,bStateSave:!1,fnCreatedRow:null,fnDrawCallback:null,fnFooterCallback:null,fnFormatNumber:function(a){return a.toString().replace(/\B(?=(\d{3})+(?!\d))/g,this.oLanguage.sThousands)},fnHeaderCallback:null,fnInfoCallback:null,fnInitComplete:null,fnPreDrawCallback:null,fnRowCallback:null,fnServerData:null,fnServerParams:null,fnStateLoadCallback:function(a){try{return JSON.parse((-1===a.iStateDuration?sessionStorage:localStorage).getItem("DataTables_"+a.sInstance+"_"+location.pathname))}catch(b){return{}}},
        fnStateLoadParams:null,fnStateLoaded:null,fnStateSaveCallback:function(a,b){try{(-1===a.iStateDuration?sessionStorage:localStorage).setItem("DataTables_"+a.sInstance+"_"+location.pathname,JSON.stringify(b))}catch(c){}},fnStateSaveParams:null,iStateDuration:7200,iDeferLoading:null,iDisplayLength:10,iDisplayStart:0,iTabIndex:0,oClasses:{},oLanguage:{oAria:{sSortAscending:": activate to sort column ascending",sSortDescending:": activate to sort column descending"},oPaginate:{sFirst:"First",sLast:"Last",
                sNext:"Next",sPrevious:"Previous"},sEmptyTable:"No data available in table",sInfo:"Showing _START_ to _END_ of _TOTAL_ entries",sInfoEmpty:"Showing 0 to 0 of 0 entries",sInfoFiltered:"(filtered from _MAX_ total entries)",sInfoPostFix:"",sDecimal:"",sThousands:",",sLengthMenu:"Show _MENU_ entries",sLoadingRecords:"Loading...",sProcessing:"Processing...",sSearch:"Search:",sSearchPlaceholder:"",sUrl:"",sZeroRecords:"No matching records found"},oSearch:l.extend({},u.models.oSearch),sAjaxDataProp:"data",
        sAjaxSource:null,sDom:"lfrtip",searchDelay:null,sPaginationType:"simple_numbers",sScrollX:"",sScrollXInner:"",sScrollY:"",sServerMethod:"GET",renderer:null,rowId:"DT_RowId"};E(u.defaults);u.defaults.column={aDataSort:null,iDataSort:-1,asSorting:["asc","desc"],bSearchable:!0,bSortable:!0,bVisible:!0,fnCreatedCell:null,mData:null,mRender:null,sCellType:"td",sClass:"",sContentPadding:"",sDefaultContent:null,sName:"",sSortDataType:"std",sTitle:null,sType:null,sWidth:null};E(u.defaults.column);u.models.oSettings=
        {oFeatures:{bAutoWidth:null,bDeferRender:null,bFilter:null,bInfo:null,bLengthChange:null,bPaginate:null,bProcessing:null,bServerSide:null,bSort:null,bSortMulti:null,bSortClasses:null,bStateSave:null},oScroll:{bCollapse:null,iBarWidth:0,sX:null,sXInner:null,sY:null},oLanguage:{fnInfoCallback:null},oBrowser:{bScrollOversize:!1,bScrollbarLeft:!1,bBounding:!1,barWidth:0},ajax:null,aanFeatures:[],aoData:[],aiDisplay:[],aiDisplayMaster:[],aIds:{},aoColumns:[],aoHeader:[],aoFooter:[],oPreviousSearch:{},
            aoPreSearchCols:[],aaSorting:null,aaSortingFixed:[],asStripeClasses:null,asDestroyStripes:[],sDestroyWidth:0,aoRowCallback:[],aoHeaderCallback:[],aoFooterCallback:[],aoDrawCallback:[],aoRowCreatedCallback:[],aoPreDrawCallback:[],aoInitComplete:[],aoStateSaveParams:[],aoStateLoadParams:[],aoStateLoaded:[],sTableId:"",nTable:null,nTHead:null,nTFoot:null,nTBody:null,nTableWrapper:null,bDeferLoading:!1,bInitialised:!1,aoOpenRows:[],sDom:null,searchDelay:null,sPaginationType:"two_button",iStateDuration:0,
            aoStateSave:[],aoStateLoad:[],oSavedState:null,oLoadedState:null,sAjaxSource:null,sAjaxDataProp:null,jqXHR:null,json:q,oAjaxData:q,fnServerData:null,aoServerParams:[],sServerMethod:null,fnFormatNumber:null,aLengthMenu:null,iDraw:0,bDrawing:!1,iDrawError:-1,_iDisplayLength:10,_iDisplayStart:0,_iRecordsTotal:0,_iRecordsDisplay:0,oClasses:{},bFiltered:!1,bSorted:!1,bSortCellsTop:null,oInit:null,aoDestroyCallback:[],fnRecordsTotal:function(){return"ssp"==Q(this)?1*this._iRecordsTotal:this.aiDisplayMaster.length},
            fnRecordsDisplay:function(){return"ssp"==Q(this)?1*this._iRecordsDisplay:this.aiDisplay.length},fnDisplayEnd:function(){var a=this._iDisplayLength,b=this._iDisplayStart,c=b+a,d=this.aiDisplay.length,e=this.oFeatures,h=e.bPaginate;return e.bServerSide?!1===h||-1===a?b+d:Math.min(b+a,this._iRecordsDisplay):!h||c>d||-1===a?d:c},oInstance:null,sInstance:null,iTabIndex:0,nScrollHead:null,nScrollFoot:null,aLastSort:[],oPlugins:{},rowIdFn:null,rowId:null};u.ext=M={buttons:{},classes:{},builder:"-source-",
        errMode:"alert",feature:[],search:[],selector:{cell:[],column:[],row:[]},internal:{},legacy:{ajax:null},pager:{},renderer:{pageButton:{},header:{}},order:{},type:{detect:[],search:{},order:{}},_unique:0,fnVersionCheck:u.fnVersionCheck,iApiIndex:0,oJUIClasses:{},sVersion:u.version};l.extend(M,{afnFiltering:M.search,aTypes:M.type.detect,ofnSearch:M.type.search,oSort:M.type.order,afnSortData:M.order,aoFeatures:M.feature,oApi:M.internal,oStdClasses:M.classes,oPagination:M.pager});l.extend(u.ext.classes,
        {sTable:"dataTable",sNoFooter:"no-footer",sPageButton:"paginate_button",sPageButtonActive:"current",sPageButtonDisabled:"disabled",sStripeOdd:"odd",sStripeEven:"even",sRowEmpty:"dataTables_empty",sWrapper:"dataTables_wrapper",sFilter:"dataTables_filter",sInfo:"dataTables_info",sPaging:"dataTables_paginate paging_",sLength:"dataTables_length",sProcessing:"dataTables_processing",sSortAsc:"sorting_asc",sSortDesc:"sorting_desc",sSortable:"sorting",sSortableAsc:"sorting_desc_disabled",sSortableDesc:"sorting_asc_disabled",
            sSortableNone:"sorting_disabled",sSortColumn:"sorting_",sFilterInput:"",sLengthSelect:"",sScrollWrapper:"dataTables_scroll",sScrollHead:"dataTables_scrollHead",sScrollHeadInner:"dataTables_scrollHeadInner",sScrollBody:"dataTables_scrollBody",sScrollFoot:"dataTables_scrollFoot",sScrollFootInner:"dataTables_scrollFootInner",sHeaderTH:"",sFooterTH:"",sSortJUIAsc:"",sSortJUIDesc:"",sSortJUI:"",sSortJUIAscAllowed:"",sSortJUIDescAllowed:"",sSortJUIWrapper:"",sSortIcon:"",sJUIHeader:"",sJUIFooter:""});var ec=
        u.ext.pager;l.extend(ec,{simple:function(a,b){return["previous","next"]},full:function(a,b){return["first","previous","next","last"]},numbers:function(a,b){return[Da(a,b)]},simple_numbers:function(a,b){return["previous",Da(a,b),"next"]},full_numbers:function(a,b){return["first","previous",Da(a,b),"next","last"]},first_last_numbers:function(a,b){return["first",Da(a,b),"last"]},_numbers:Da,numbers_length:7});l.extend(!0,u.ext.renderer,{pageButton:{_:function(a,b,c,d,e,h){var f=a.oClasses,g=a.oLanguage.oPaginate,
                k=a.oLanguage.oAria.paginate||{},m,n,p=0,t=function(x,w){var r,C=f.sPageButtonDisabled,G=function(I){lb(a,I.data.action,!0)};var aa=0;for(r=w.length;aa<r;aa++){var L=w[aa];if(Array.isArray(L)){var O=l("<"+(L.DT_el||"div")+"/>").appendTo(x);t(O,L)}else{m=null;n=L;O=a.iTabIndex;switch(L){case "ellipsis":x.append('<span class="ellipsis">&#x2026;</span>');break;case "first":m=g.sFirst;0===e&&(O=-1,n+=" "+C);break;case "previous":m=g.sPrevious;0===e&&(O=-1,n+=" "+C);break;case "next":m=g.sNext;if(0===
                    h||e===h-1)O=-1,n+=" "+C;break;case "last":m=g.sLast;if(0===h||e===h-1)O=-1,n+=" "+C;break;default:m=a.fnFormatNumber(L+1),n=e===L?f.sPageButtonActive:""}null!==m&&(O=l("<a>",{"class":f.sPageButton+" "+n,"aria-controls":a.sTableId,"aria-label":k[L],"data-dt-idx":p,tabindex:O,id:0===c&&"string"===typeof L?a.sTableId+"_"+L:null}).html(m).appendTo(x),ob(O,{action:L},G),p++)}}};try{var v=l(b).find(A.activeElement).data("dt-idx")}catch(x){}t(l(b).empty(),d);v!==q&&l(b).find("[data-dt-idx="+v+"]").trigger("focus")}}});
    l.extend(u.ext.type.detect,[function(a,b){b=b.oLanguage.sDecimal;return tb(a,b)?"num"+b:null},function(a,b){if(a&&!(a instanceof Date)&&!uc.test(a))return null;b=Date.parse(a);return null!==b&&!isNaN(b)||Z(a)?"date":null},function(a,b){b=b.oLanguage.sDecimal;return tb(a,b,!0)?"num-fmt"+b:null},function(a,b){b=b.oLanguage.sDecimal;return jc(a,b)?"html-num"+b:null},function(a,b){b=b.oLanguage.sDecimal;return jc(a,b,!0)?"html-num-fmt"+b:null},function(a,b){return Z(a)||"string"===typeof a&&-1!==a.indexOf("<")?
        "html":null}]);l.extend(u.ext.type.search,{html:function(a){return Z(a)?a:"string"===typeof a?a.replace(gc," ").replace(Ua,""):""},string:function(a){return Z(a)?a:"string"===typeof a?a.replace(gc," "):a}});var Ta=function(a,b,c,d){if(0!==a&&(!a||"-"===a))return-Infinity;b&&(a=ic(a,b));a.replace&&(c&&(a=a.replace(c,"")),d&&(a=a.replace(d,"")));return 1*a};l.extend(M.type.order,{"date-pre":function(a){a=Date.parse(a);return isNaN(a)?-Infinity:a},"html-pre":function(a){return Z(a)?"":a.replace?a.replace(/<.*?>/g,
            "").toLowerCase():a+""},"string-pre":function(a){return Z(a)?"":"string"===typeof a?a.toLowerCase():a.toString?a.toString():""},"string-asc":function(a,b){return a<b?-1:a>b?1:0},"string-desc":function(a,b){return a<b?1:a>b?-1:0}});Wa("");l.extend(!0,u.ext.renderer,{header:{_:function(a,b,c,d){l(a.nTable).on("order.dt.DT",function(e,h,f,g){a===h&&(e=c.idx,b.removeClass(d.sSortAsc+" "+d.sSortDesc).addClass("asc"==g[e]?d.sSortAsc:"desc"==g[e]?d.sSortDesc:c.sSortingClass))})},jqueryui:function(a,b,c,
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           d){l("<div/>").addClass(d.sSortJUIWrapper).append(b.contents()).append(l("<span/>").addClass(d.sSortIcon+" "+c.sSortingClassJUI)).appendTo(b);l(a.nTable).on("order.dt.DT",function(e,h,f,g){a===h&&(e=c.idx,b.removeClass(d.sSortAsc+" "+d.sSortDesc).addClass("asc"==g[e]?d.sSortAsc:"desc"==g[e]?d.sSortDesc:c.sSortingClass),b.find("span."+d.sSortIcon).removeClass(d.sSortJUIAsc+" "+d.sSortJUIDesc+" "+d.sSortJUI+" "+d.sSortJUIAscAllowed+" "+d.sSortJUIDescAllowed).addClass("asc"==g[e]?d.sSortJUIAsc:"desc"==
            g[e]?d.sSortJUIDesc:c.sSortingClassJUI))})}}});var yb=function(a){Array.isArray(a)&&(a=a.join(","));return"string"===typeof a?a.replace(/&/g,"&amp;").replace(/</g,"&lt;").replace(/>/g,"&gt;").replace(/"/g,"&quot;"):a};u.render={number:function(a,b,c,d,e){return{display:function(h){if("number"!==typeof h&&"string"!==typeof h)return h;var f=0>h?"-":"",g=parseFloat(h);if(isNaN(g))return yb(h);g=g.toFixed(c);h=Math.abs(g);g=parseInt(h,10);h=c?b+(h-g).toFixed(c).substring(2):"";0===g&&0===parseFloat(h)&&
            (f="");return f+(d||"")+g.toString().replace(/\B(?=(\d{3})+(?!\d))/g,a)+h+(e||"")}}},text:function(){return{display:yb,filter:yb}}};l.extend(u.ext.internal,{_fnExternApiFunc:fc,_fnBuildAjax:Oa,_fnAjaxUpdate:Gb,_fnAjaxParameters:Pb,_fnAjaxUpdateDraw:Qb,_fnAjaxDataSrc:Aa,_fnAddColumn:Xa,_fnColumnOptions:Ga,_fnAdjustColumnSizing:ta,_fnVisibleToColumnIndex:ua,_fnColumnIndexToVisible:va,_fnVisbleColumns:oa,_fnGetColumns:Ia,_fnColumnTypes:Za,_fnApplyColumnDefs:Db,_fnHungarianMap:E,_fnCamelToHungarian:P,
        _fnLanguageCompat:ma,_fnBrowserDetect:Bb,_fnAddData:ia,_fnAddTr:Ja,_fnNodeToDataIndex:function(a,b){return b._DT_RowIndex!==q?b._DT_RowIndex:null},_fnNodeToColumnIndex:function(a,b,c){return l.inArray(c,a.aoData[b].anCells)},_fnGetCellData:T,_fnSetCellData:Eb,_fnSplitObjNotation:bb,_fnGetObjectDataFn:na,_fnSetObjectDataFn:ha,_fnGetDataMaster:cb,_fnClearTable:Ka,_fnDeleteIndex:La,_fnInvalidate:wa,_fnGetRowElements:ab,_fnCreateTr:$a,_fnBuildHead:Fb,_fnDrawHead:ya,_fnDraw:ja,_fnReDraw:ka,_fnAddOptionsHtml:Ib,
        _fnDetectHeader:xa,_fnGetUniqueThs:Na,_fnFeatureHtmlFilter:Kb,_fnFilterComplete:za,_fnFilterCustom:Tb,_fnFilterColumn:Sb,_fnFilter:Rb,_fnFilterCreateSearch:hb,_fnEscapeRegex:ib,_fnFilterData:Ub,_fnFeatureHtmlInfo:Nb,_fnUpdateInfo:Xb,_fnInfoMacros:Yb,_fnInitialise:Ba,_fnInitComplete:Pa,_fnLengthChange:jb,_fnFeatureHtmlLength:Jb,_fnFeatureHtmlPaginate:Ob,_fnPageChange:lb,_fnFeatureHtmlProcessing:Lb,_fnProcessingDisplay:V,_fnFeatureHtmlTable:Mb,_fnScrollDraw:Ha,_fnApplyToChildren:ca,_fnCalculateColumnWidths:Ya,
        _fnThrottle:gb,_fnConvertToWidth:Zb,_fnGetWidestNode:$b,_fnGetMaxLenString:ac,_fnStringToCss:K,_fnSortFlatten:pa,_fnSort:Hb,_fnSortAria:cc,_fnSortListener:nb,_fnSortAttachListener:eb,_fnSortingClasses:Ra,_fnSortData:bc,_fnSaveState:qa,_fnLoadState:dc,_fnImplementState:pb,_fnSettingsFromNode:Sa,_fnLog:da,_fnMap:X,_fnBindAction:ob,_fnCallbackReg:R,_fnCallbackFire:F,_fnLengthOverflow:kb,_fnRenderer:fb,_fnDataSource:Q,_fnRowAttributes:db,_fnExtend:qb,_fnCalculateEnd:function(){}});l.fn.dataTable=u;u.$=
        l;l.fn.dataTableSettings=u.settings;l.fn.dataTableExt=u.ext;l.fn.DataTable=function(a){return l(this).dataTable(a).api()};l.each(u,function(a,b){l.fn.DataTable[a]=b});return u});

/*!
   Copyright 2014-2021 SpryMedia Ltd.

 This source file is free software, available under the following license:
   MIT license - http://datatables.net/license/mit

 This source file is distributed in the hope that it will be useful, but
 WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY
 or FITNESS FOR A PARTICULAR PURPOSE. See the license files for details.

 For details please refer to: http://www.datatables.net
 Responsive 2.2.9
 2014-2021 SpryMedia Ltd - datatables.net/license
*/
var $jscomp=$jscomp||{};$jscomp.scope={};$jscomp.findInternal=function(b,k,m){b instanceof String&&(b=String(b));for(var n=b.length,p=0;p<n;p++){var y=b[p];if(k.call(m,y,p,b))return{i:p,v:y}}return{i:-1,v:void 0}};$jscomp.ASSUME_ES5=!1;$jscomp.ASSUME_NO_NATIVE_MAP=!1;$jscomp.ASSUME_NO_NATIVE_SET=!1;$jscomp.SIMPLE_FROUND_POLYFILL=!1;$jscomp.ISOLATE_POLYFILLS=!1;
$jscomp.defineProperty=$jscomp.ASSUME_ES5||"function"==typeof Object.defineProperties?Object.defineProperty:function(b,k,m){if(b==Array.prototype||b==Object.prototype)return b;b[k]=m.value;return b};$jscomp.getGlobal=function(b){b=["object"==typeof globalThis&&globalThis,b,"object"==typeof window&&window,"object"==typeof self&&self,"object"==typeof global&&global];for(var k=0;k<b.length;++k){var m=b[k];if(m&&m.Math==Math)return m}throw Error("Cannot find global object");};$jscomp.global=$jscomp.getGlobal(this);
$jscomp.IS_SYMBOL_NATIVE="function"===typeof Symbol&&"symbol"===typeof Symbol("x");$jscomp.TRUST_ES6_POLYFILLS=!$jscomp.ISOLATE_POLYFILLS||$jscomp.IS_SYMBOL_NATIVE;$jscomp.polyfills={};$jscomp.propertyToPolyfillSymbol={};$jscomp.POLYFILL_PREFIX="$jscp$";var $jscomp$lookupPolyfilledValue=function(b,k){var m=$jscomp.propertyToPolyfillSymbol[k];if(null==m)return b[k];m=b[m];return void 0!==m?m:b[k]};
$jscomp.polyfill=function(b,k,m,n){k&&($jscomp.ISOLATE_POLYFILLS?$jscomp.polyfillIsolated(b,k,m,n):$jscomp.polyfillUnisolated(b,k,m,n))};$jscomp.polyfillUnisolated=function(b,k,m,n){m=$jscomp.global;b=b.split(".");for(n=0;n<b.length-1;n++){var p=b[n];if(!(p in m))return;m=m[p]}b=b[b.length-1];n=m[b];k=k(n);k!=n&&null!=k&&$jscomp.defineProperty(m,b,{configurable:!0,writable:!0,value:k})};
$jscomp.polyfillIsolated=function(b,k,m,n){var p=b.split(".");b=1===p.length;n=p[0];n=!b&&n in $jscomp.polyfills?$jscomp.polyfills:$jscomp.global;for(var y=0;y<p.length-1;y++){var z=p[y];if(!(z in n))return;n=n[z]}p=p[p.length-1];m=$jscomp.IS_SYMBOL_NATIVE&&"es6"===m?n[p]:null;k=k(m);null!=k&&(b?$jscomp.defineProperty($jscomp.polyfills,p,{configurable:!0,writable:!0,value:k}):k!==m&&($jscomp.propertyToPolyfillSymbol[p]=$jscomp.IS_SYMBOL_NATIVE?$jscomp.global.Symbol(p):$jscomp.POLYFILL_PREFIX+p,p=
    $jscomp.propertyToPolyfillSymbol[p],$jscomp.defineProperty(n,p,{configurable:!0,writable:!0,value:k})))};$jscomp.polyfill("Array.prototype.find",function(b){return b?b:function(k,m){return $jscomp.findInternal(this,k,m).v}},"es6","es3");
(function(b){"function"===typeof define&&define.amd?define(["jquery","datatables.net"],function(k){return b(k,window,document)}):"object"===typeof exports?module.exports=function(k,m){k||(k=window);m&&m.fn.dataTable||(m=require("datatables.net")(k,m).$);return b(m,k,k.document)}:b(jQuery,window,document)})(function(b,k,m,n){function p(a,c,d){var f=c+"-"+d;if(A[f])return A[f];var g=[];a=a.cell(c,d).node().childNodes;c=0;for(d=a.length;c<d;c++)g.push(a[c]);return A[f]=g}function y(a,c,d){var f=c+"-"+
    d;if(A[f]){a=a.cell(c,d).node();d=A[f][0].parentNode.childNodes;c=[];for(var g=0,l=d.length;g<l;g++)c.push(d[g]);d=0;for(g=c.length;d<g;d++)a.appendChild(c[d]);A[f]=n}}var z=b.fn.dataTable,u=function(a,c){if(!z.versionCheck||!z.versionCheck("1.10.10"))throw"DataTables Responsive requires DataTables 1.10.10 or newer";this.s={dt:new z.Api(a),columns:[],current:[]};this.s.dt.settings()[0].responsive||(c&&"string"===typeof c.details?c.details={type:c.details}:c&&!1===c.details?c.details={type:!1}:c&&
    !0===c.details&&(c.details={type:"inline"}),this.c=b.extend(!0,{},u.defaults,z.defaults.responsive,c),a.responsive=this,this._constructor())};b.extend(u.prototype,{_constructor:function(){var a=this,c=this.s.dt,d=c.settings()[0],f=b(k).innerWidth();c.settings()[0]._responsive=this;b(k).on("resize.dtr orientationchange.dtr",z.util.throttle(function(){var g=b(k).innerWidth();g!==f&&(a._resize(),f=g)}));d.oApi._fnCallbackReg(d,"aoRowCreatedCallback",function(g,l,h){-1!==b.inArray(!1,a.s.current)&&b(">td, >th",
        g).each(function(e){e=c.column.index("toData",e);!1===a.s.current[e]&&b(this).css("display","none")})});c.on("destroy.dtr",function(){c.off(".dtr");b(c.table().body()).off(".dtr");b(k).off("resize.dtr orientationchange.dtr");c.cells(".dtr-control").nodes().to$().removeClass("dtr-control");b.each(a.s.current,function(g,l){!1===l&&a._setColumnVis(g,!0)})});this.c.breakpoints.sort(function(g,l){return g.width<l.width?1:g.width>l.width?-1:0});this._classLogic();this._resizeAuto();d=this.c.details;!1!==
    d.type&&(a._detailsInit(),c.on("column-visibility.dtr",function(){a._timer&&clearTimeout(a._timer);a._timer=setTimeout(function(){a._timer=null;a._classLogic();a._resizeAuto();a._resize(!0);a._redrawChildren()},100)}),c.on("draw.dtr",function(){a._redrawChildren()}),b(c.table().node()).addClass("dtr-"+d.type));c.on("column-reorder.dtr",function(g,l,h){a._classLogic();a._resizeAuto();a._resize(!0)});c.on("column-sizing.dtr",function(){a._resizeAuto();a._resize()});c.on("preXhr.dtr",function(){var g=
        [];c.rows().every(function(){this.child.isShown()&&g.push(this.id(!0))});c.one("draw.dtr",function(){a._resizeAuto();a._resize();c.rows(g).every(function(){a._detailsDisplay(this,!1)})})});c.on("draw.dtr",function(){a._controlClass()}).on("init.dtr",function(g,l,h){"dt"===g.namespace&&(a._resizeAuto(),a._resize(),b.inArray(!1,a.s.current)&&c.columns.adjust())});this._resize()},_columnsVisiblity:function(a){var c=this.s.dt,d=this.s.columns,f,g=d.map(function(t,v){return{columnIdx:v,priority:t.priority}}).sort(function(t,
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   v){return t.priority!==v.priority?t.priority-v.priority:t.columnIdx-v.columnIdx}),l=b.map(d,function(t,v){return!1===c.column(v).visible()?"not-visible":t.auto&&null===t.minWidth?!1:!0===t.auto?"-":-1!==b.inArray(a,t.includeIn)}),h=0;var e=0;for(f=l.length;e<f;e++)!0===l[e]&&(h+=d[e].minWidth);e=c.settings()[0].oScroll;e=e.sY||e.sX?e.iBarWidth:0;h=c.table().container().offsetWidth-e-h;e=0;for(f=l.length;e<f;e++)d[e].control&&(h-=d[e].minWidth);var r=!1;e=0;for(f=g.length;e<f;e++){var q=g[e].columnIdx;
        "-"===l[q]&&!d[q].control&&d[q].minWidth&&(r||0>h-d[q].minWidth?(r=!0,l[q]=!1):l[q]=!0,h-=d[q].minWidth)}g=!1;e=0;for(f=d.length;e<f;e++)if(!d[e].control&&!d[e].never&&!1===l[e]){g=!0;break}e=0;for(f=d.length;e<f;e++)d[e].control&&(l[e]=g),"not-visible"===l[e]&&(l[e]=!1);-1===b.inArray(!0,l)&&(l[0]=!0);return l},_classLogic:function(){var a=this,c=this.c.breakpoints,d=this.s.dt,f=d.columns().eq(0).map(function(h){var e=this.column(h),r=e.header().className;h=d.settings()[0].aoColumns[h].responsivePriority;
        e=e.header().getAttribute("data-priority");h===n&&(h=e===n||null===e?1E4:1*e);return{className:r,includeIn:[],auto:!1,control:!1,never:r.match(/\bnever\b/)?!0:!1,priority:h}}),g=function(h,e){h=f[h].includeIn;-1===b.inArray(e,h)&&h.push(e)},l=function(h,e,r,q){if(!r)f[h].includeIn.push(e);else if("max-"===r)for(q=a._find(e).width,e=0,r=c.length;e<r;e++)c[e].width<=q&&g(h,c[e].name);else if("min-"===r)for(q=a._find(e).width,e=0,r=c.length;e<r;e++)c[e].width>=q&&g(h,c[e].name);else if("not-"===r)for(e=
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   0,r=c.length;e<r;e++)-1===c[e].name.indexOf(q)&&g(h,c[e].name)};f.each(function(h,e){for(var r=h.className.split(" "),q=!1,t=0,v=r.length;t<v;t++){var B=r[t].trim();if("all"===B){q=!0;h.includeIn=b.map(c,function(w){return w.name});return}if("none"===B||h.never){q=!0;return}if("control"===B||"dtr-control"===B){q=!0;h.control=!0;return}b.each(c,function(w,D){w=D.name.split("-");var x=B.match(new RegExp("(min\\-|max\\-|not\\-)?("+w[0]+")(\\-[_a-zA-Z0-9])?"));x&&(q=!0,x[2]===w[0]&&x[3]==="-"+w[1]?l(e,
        D.name,x[1],x[2]+x[3]):x[2]!==w[0]||x[3]||l(e,D.name,x[1],x[2]))})}q||(h.auto=!0)});this.s.columns=f},_controlClass:function(){if("inline"===this.c.details.type){var a=this.s.dt,c=b.inArray(!0,this.s.current);a.cells(null,function(d){return d!==c},{page:"current"}).nodes().to$().filter(".dtr-control").removeClass("dtr-control");a.cells(null,c,{page:"current"}).nodes().to$().addClass("dtr-control")}},_detailsDisplay:function(a,c){var d=this,f=this.s.dt,g=this.c.details;if(g&&!1!==g.type){var l=g.display(a,
        c,function(){return g.renderer(f,a[0],d._detailsObj(a[0]))});!0!==l&&!1!==l||b(f.table().node()).triggerHandler("responsive-display.dt",[f,a,l,c])}},_detailsInit:function(){var a=this,c=this.s.dt,d=this.c.details;"inline"===d.type&&(d.target="td.dtr-control, th.dtr-control");c.on("draw.dtr",function(){a._tabIndexes()});a._tabIndexes();b(c.table().body()).on("keyup.dtr","td, th",function(g){13===g.keyCode&&b(this).data("dtr-keyboard")&&b(this).click()});var f=d.target;d="string"===typeof f?f:"td, th";
        if(f!==n||null!==f)b(c.table().body()).on("click.dtr mousedown.dtr mouseup.dtr",d,function(g){if(b(c.table().node()).hasClass("collapsed")&&-1!==b.inArray(b(this).closest("tr").get(0),c.rows().nodes().toArray())){if("number"===typeof f){var l=0>f?c.columns().eq(0).length+f:f;if(c.cell(this).index().column!==l)return}l=c.row(b(this).closest("tr"));"click"===g.type?a._detailsDisplay(l,!1):"mousedown"===g.type?b(this).css("outline","none"):"mouseup"===g.type&&b(this).trigger("blur").css("outline","")}})},
    _detailsObj:function(a){var c=this,d=this.s.dt;return b.map(this.s.columns,function(f,g){if(!f.never&&!f.control)return f=d.settings()[0].aoColumns[g],{className:f.sClass,columnIndex:g,data:d.cell(a,g).render(c.c.orthogonal),hidden:d.column(g).visible()&&!c.s.current[g],rowIndex:a,title:null!==f.sTitle?f.sTitle:b(d.column(g).header()).text()}})},_find:function(a){for(var c=this.c.breakpoints,d=0,f=c.length;d<f;d++)if(c[d].name===a)return c[d]},_redrawChildren:function(){var a=this,c=this.s.dt;c.rows({page:"current"}).iterator("row",
        function(d,f){c.row(f);a._detailsDisplay(c.row(f),!0)})},_resize:function(a){var c=this,d=this.s.dt,f=b(k).innerWidth(),g=this.c.breakpoints,l=g[0].name,h=this.s.columns,e,r=this.s.current.slice();for(e=g.length-1;0<=e;e--)if(f<=g[e].width){l=g[e].name;break}var q=this._columnsVisiblity(l);this.s.current=q;g=!1;e=0;for(f=h.length;e<f;e++)if(!1===q[e]&&!h[e].never&&!h[e].control&&!1===!d.column(e).visible()){g=!0;break}b(d.table().node()).toggleClass("collapsed",g);var t=!1,v=0;d.columns().eq(0).each(function(B,
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          w){!0===q[w]&&v++;if(a||q[w]!==r[w])t=!0,c._setColumnVis(B,q[w])});t&&(this._redrawChildren(),b(d.table().node()).trigger("responsive-resize.dt",[d,this.s.current]),0===d.page.info().recordsDisplay&&b("td",d.table().body()).eq(0).attr("colspan",v));c._controlClass()},_resizeAuto:function(){var a=this.s.dt,c=this.s.columns;if(this.c.auto&&-1!==b.inArray(!0,b.map(c,function(e){return e.auto}))){b.isEmptyObject(A)||b.each(A,function(e){e=e.split("-");y(a,1*e[0],1*e[1])});a.table().node();var d=a.table().node().cloneNode(!1),
        f=b(a.table().header().cloneNode(!1)).appendTo(d),g=b(a.table().body()).clone(!1,!1).empty().appendTo(d);d.style.width="auto";var l=a.columns().header().filter(function(e){return a.column(e).visible()}).to$().clone(!1).css("display","table-cell").css("width","auto").css("min-width",0);b(g).append(b(a.rows({page:"current"}).nodes()).clone(!1)).find("th, td").css("display","");if(g=a.table().footer()){g=b(g.cloneNode(!1)).appendTo(d);var h=a.columns().footer().filter(function(e){return a.column(e).visible()}).to$().clone(!1).css("display",
        "table-cell");b("<tr/>").append(h).appendTo(g)}b("<tr/>").append(l).appendTo(f);"inline"===this.c.details.type&&b(d).addClass("dtr-inline collapsed");b(d).find("[name]").removeAttr("name");b(d).css("position","relative");d=b("<div/>").css({width:1,height:1,overflow:"hidden",clear:"both"}).append(d);d.insertBefore(a.table().node());l.each(function(e){e=a.column.index("fromVisible",e);c[e].minWidth=this.offsetWidth||0});d.remove()}},_responsiveOnlyHidden:function(){var a=this.s.dt;return b.map(this.s.current,
        function(c,d){return!1===a.column(d).visible()?!0:c})},_setColumnVis:function(a,c){var d=this.s.dt;c=c?"":"none";b(d.column(a).header()).css("display",c);b(d.column(a).footer()).css("display",c);d.column(a).nodes().to$().css("display",c);b.isEmptyObject(A)||d.cells(null,a).indexes().each(function(f){y(d,f.row,f.column)})},_tabIndexes:function(){var a=this.s.dt,c=a.cells({page:"current"}).nodes().to$(),d=a.settings()[0],f=this.c.details.target;c.filter("[data-dtr-keyboard]").removeData("[data-dtr-keyboard]");
        "number"===typeof f?a.cells(null,f,{page:"current"}).nodes().to$().attr("tabIndex",d.iTabIndex).data("dtr-keyboard",1):("td:first-child, th:first-child"===f&&(f=">td:first-child, >th:first-child"),b(f,a.rows({page:"current"}).nodes()).attr("tabIndex",d.iTabIndex).data("dtr-keyboard",1))}});u.breakpoints=[{name:"desktop",width:Infinity},{name:"tablet-l",width:1024},{name:"tablet-p",width:768},{name:"mobile-l",width:480},{name:"mobile-p",width:320}];u.display={childRow:function(a,c,d){if(c){if(b(a.node()).hasClass("parent"))return a.child(d(),
        "child").show(),!0}else{if(a.child.isShown())return a.child(!1),b(a.node()).removeClass("parent"),!1;a.child(d(),"child").show();b(a.node()).addClass("parent");return!0}},childRowImmediate:function(a,c,d){if(!c&&a.child.isShown()||!a.responsive.hasHidden())return a.child(!1),b(a.node()).removeClass("parent"),!1;a.child(d(),"child").show();b(a.node()).addClass("parent");return!0},modal:function(a){return function(c,d,f){if(d)b("div.dtr-modal-content").empty().append(f());else{var g=function(){l.remove();
        b(m).off("keypress.dtr")},l=b('<div class="dtr-modal"/>').append(b('<div class="dtr-modal-display"/>').append(b('<div class="dtr-modal-content"/>').append(f())).append(b('<div class="dtr-modal-close">&times;</div>').click(function(){g()}))).append(b('<div class="dtr-modal-background"/>').click(function(){g()})).appendTo("body");b(m).on("keyup.dtr",function(h){27===h.keyCode&&(h.stopPropagation(),g())})}a&&a.header&&b("div.dtr-modal-content").prepend("<h2>"+a.header(c)+"</h2>")}}};var A={};u.renderer=
    {listHiddenNodes:function(){return function(a,c,d){var f=b('<ul data-dtr-index="'+c+'" class="dtr-details"/>'),g=!1;b.each(d,function(l,h){h.hidden&&(b("<li "+(h.className?'class="'+h.className+'"':"")+' data-dtr-index="'+h.columnIndex+'" data-dt-row="'+h.rowIndex+'" data-dt-column="'+h.columnIndex+'"><span class="dtr-title">'+h.title+"</span> </li>").append(b('<span class="dtr-data"/>').append(p(a,h.rowIndex,h.columnIndex))).appendTo(f),g=!0)});return g?f:!1}},listHidden:function(){return function(a,
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            c,d){return(a=b.map(d,function(f){var g=f.className?'class="'+f.className+'"':"";return f.hidden?"<li "+g+' data-dtr-index="'+f.columnIndex+'" data-dt-row="'+f.rowIndex+'" data-dt-column="'+f.columnIndex+'"><span class="dtr-title">'+f.title+'</span> <span class="dtr-data">'+f.data+"</span></li>":""}).join(""))?b('<ul data-dtr-index="'+c+'" class="dtr-details"/>').append(a):!1}},tableAll:function(a){a=b.extend({tableClass:""},a);return function(c,d,f){c=b.map(f,function(g){return"<tr "+(g.className?
            'class="'+g.className+'"':"")+' data-dt-row="'+g.rowIndex+'" data-dt-column="'+g.columnIndex+'"><td>'+g.title+":</td> <td>"+g.data+"</td></tr>"}).join("");return b('<table class="'+a.tableClass+' dtr-details" width="100%"/>').append(c)}}};u.defaults={breakpoints:u.breakpoints,auto:!0,details:{display:u.display.childRow,renderer:u.renderer.listHidden(),target:0,type:"inline"},orthogonal:"display"};var C=b.fn.dataTable.Api;C.register("responsive()",function(){return this});C.register("responsive.index()",
    function(a){a=b(a);return{column:a.data("dtr-index"),row:a.parent().data("dtr-index")}});C.register("responsive.rebuild()",function(){return this.iterator("table",function(a){a._responsive&&a._responsive._classLogic()})});C.register("responsive.recalc()",function(){return this.iterator("table",function(a){a._responsive&&(a._responsive._resizeAuto(),a._responsive._resize())})});C.register("responsive.hasHidden()",function(){var a=this.context[0];return a._responsive?-1!==b.inArray(!1,a._responsive._responsiveOnlyHidden()):
    !1});C.registerPlural("columns().responsiveHidden()","column().responsiveHidden()",function(){return this.iterator("column",function(a,c){return a._responsive?a._responsive._responsiveOnlyHidden()[c]:!1},1)});u.version="2.2.9";b.fn.dataTable.Responsive=u;b.fn.DataTable.Responsive=u;b(m).on("preInit.dt.dtr",function(a,c,d){"dt"===a.namespace&&(b(c.nTable).hasClass("responsive")||b(c.nTable).hasClass("dt-responsive")||c.oInit.responsive||z.defaults.responsive)&&(a=c.oInit.responsive,!1!==a&&new u(c,
    b.isPlainObject(a)?a:{}))});return u});

/* flatpickr v4.6.13,, @license MIT */
!function(e,n){"object"==typeof exports&&"undefined"!=typeof module?module.exports=n():"function"==typeof define&&define.amd?define(n):(e="undefined"!=typeof globalThis?globalThis:e||self).flatpickr=n()}(this,(function(){"use strict";var e=function(){return(e=Object.assign||function(e){for(var n,t=1,a=arguments.length;t<a;t++)for(var i in n=arguments[t])Object.prototype.hasOwnProperty.call(n,i)&&(e[i]=n[i]);return e}).apply(this,arguments)};function n(){for(var e=0,n=0,t=arguments.length;n<t;n++)e+=arguments[n].length;var a=Array(e),i=0;for(n=0;n<t;n++)for(var o=arguments[n],r=0,l=o.length;r<l;r++,i++)a[i]=o[r];return a}var t=["onChange","onClose","onDayCreate","onDestroy","onKeyDown","onMonthChange","onOpen","onParseConfig","onReady","onValueUpdate","onYearChange","onPreCalendarPosition"],a={_disable:[],allowInput:!1,allowInvalidPreload:!1,altFormat:"F j, Y",altInput:!1,altInputClass:"form-control input",animate:"object"==typeof window&&-1===window.navigator.userAgent.indexOf("MSIE"),ariaDateFormat:"F j, Y",autoFillDefaultTime:!0,clickOpens:!0,closeOnSelect:!0,conjunction:", ",dateFormat:"Y-m-d",defaultHour:12,defaultMinute:0,defaultSeconds:0,disable:[],disableMobile:!1,enableSeconds:!1,enableTime:!1,errorHandler:function(e){return"undefined"!=typeof console&&console.warn(e)},getWeek:function(e){var n=new Date(e.getTime());n.setHours(0,0,0,0),n.setDate(n.getDate()+3-(n.getDay()+6)%7);var t=new Date(n.getFullYear(),0,4);return 1+Math.round(((n.getTime()-t.getTime())/864e5-3+(t.getDay()+6)%7)/7)},hourIncrement:1,ignoredFocusElements:[],inline:!1,locale:"default",minuteIncrement:5,mode:"single",monthSelectorType:"dropdown",nextArrow:"<svg version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' viewBox='0 0 17 17'><g></g><path d='M13.207 8.472l-7.854 7.854-0.707-0.707 7.146-7.146-7.146-7.148 0.707-0.707 7.854 7.854z' /></svg>",noCalendar:!1,now:new Date,onChange:[],onClose:[],onDayCreate:[],onDestroy:[],onKeyDown:[],onMonthChange:[],onOpen:[],onParseConfig:[],onReady:[],onValueUpdate:[],onYearChange:[],onPreCalendarPosition:[],plugins:[],position:"auto",positionElement:void 0,prevArrow:"<svg version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' viewBox='0 0 17 17'><g></g><path d='M5.207 8.471l7.146 7.147-0.707 0.707-7.853-7.854 7.854-7.853 0.707 0.707-7.147 7.146z' /></svg>",shorthandCurrentMonth:!1,showMonths:1,static:!1,time_24hr:!1,weekNumbers:!1,wrap:!1},i={weekdays:{shorthand:["Sun","Mon","Tue","Wed","Thu","Fri","Sat"],longhand:["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]},months:{shorthand:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],longhand:["January","February","March","April","May","June","July","August","September","October","November","December"]},daysInMonth:[31,28,31,30,31,30,31,31,30,31,30,31],firstDayOfWeek:0,ordinal:function(e){var n=e%100;if(n>3&&n<21)return"th";switch(n%10){case 1:return"st";case 2:return"nd";case 3:return"rd";default:return"th"}},rangeSeparator:" to ",weekAbbreviation:"Wk",scrollTitle:"Scroll to increment",toggleTitle:"Click to toggle",amPM:["AM","PM"],yearAriaLabel:"Year",monthAriaLabel:"Month",hourAriaLabel:"Hour",minuteAriaLabel:"Minute",time_24hr:!1},o=function(e,n){return void 0===n&&(n=2),("000"+e).slice(-1*n)},r=function(e){return!0===e?1:0};function l(e,n){var t;return function(){var a=this,i=arguments;clearTimeout(t),t=setTimeout((function(){return e.apply(a,i)}),n)}}var c=function(e){return e instanceof Array?e:[e]};function s(e,n,t){if(!0===t)return e.classList.add(n);e.classList.remove(n)}function d(e,n,t){var a=window.document.createElement(e);return n=n||"",t=t||"",a.className=n,void 0!==t&&(a.textContent=t),a}function u(e){for(;e.firstChild;)e.removeChild(e.firstChild)}function f(e,n){return n(e)?e:e.parentNode?f(e.parentNode,n):void 0}function m(e,n){var t=d("div","numInputWrapper"),a=d("input","numInput "+e),i=d("span","arrowUp"),o=d("span","arrowDown");if(-1===navigator.userAgent.indexOf("MSIE 9.0")?a.type="number":(a.type="text",a.pattern="\\d*"),void 0!==n)for(var r in n)a.setAttribute(r,n[r]);return t.appendChild(a),t.appendChild(i),t.appendChild(o),t}function g(e){try{return"function"==typeof e.composedPath?e.composedPath()[0]:e.target}catch(n){return e.target}}var p=function(){},h=function(e,n,t){return t.months[n?"shorthand":"longhand"][e]},v={D:p,F:function(e,n,t){e.setMonth(t.months.longhand.indexOf(n))},G:function(e,n){e.setHours((e.getHours()>=12?12:0)+parseFloat(n))},H:function(e,n){e.setHours(parseFloat(n))},J:function(e,n){e.setDate(parseFloat(n))},K:function(e,n,t){e.setHours(e.getHours()%12+12*r(new RegExp(t.amPM[1],"i").test(n)))},M:function(e,n,t){e.setMonth(t.months.shorthand.indexOf(n))},S:function(e,n){e.setSeconds(parseFloat(n))},U:function(e,n){return new Date(1e3*parseFloat(n))},W:function(e,n,t){var a=parseInt(n),i=new Date(e.getFullYear(),0,2+7*(a-1),0,0,0,0);return i.setDate(i.getDate()-i.getDay()+t.firstDayOfWeek),i},Y:function(e,n){e.setFullYear(parseFloat(n))},Z:function(e,n){return new Date(n)},d:function(e,n){e.setDate(parseFloat(n))},h:function(e,n){e.setHours((e.getHours()>=12?12:0)+parseFloat(n))},i:function(e,n){e.setMinutes(parseFloat(n))},j:function(e,n){e.setDate(parseFloat(n))},l:p,m:function(e,n){e.setMonth(parseFloat(n)-1)},n:function(e,n){e.setMonth(parseFloat(n)-1)},s:function(e,n){e.setSeconds(parseFloat(n))},u:function(e,n){return new Date(parseFloat(n))},w:p,y:function(e,n){e.setFullYear(2e3+parseFloat(n))}},D={D:"",F:"",G:"(\\d\\d|\\d)",H:"(\\d\\d|\\d)",J:"(\\d\\d|\\d)\\w+",K:"",M:"",S:"(\\d\\d|\\d)",U:"(.+)",W:"(\\d\\d|\\d)",Y:"(\\d{4})",Z:"(.+)",d:"(\\d\\d|\\d)",h:"(\\d\\d|\\d)",i:"(\\d\\d|\\d)",j:"(\\d\\d|\\d)",l:"",m:"(\\d\\d|\\d)",n:"(\\d\\d|\\d)",s:"(\\d\\d|\\d)",u:"(.+)",w:"(\\d\\d|\\d)",y:"(\\d{2})"},w={Z:function(e){return e.toISOString()},D:function(e,n,t){return n.weekdays.shorthand[w.w(e,n,t)]},F:function(e,n,t){return h(w.n(e,n,t)-1,!1,n)},G:function(e,n,t){return o(w.h(e,n,t))},H:function(e){return o(e.getHours())},J:function(e,n){return void 0!==n.ordinal?e.getDate()+n.ordinal(e.getDate()):e.getDate()},K:function(e,n){return n.amPM[r(e.getHours()>11)]},M:function(e,n){return h(e.getMonth(),!0,n)},S:function(e){return o(e.getSeconds())},U:function(e){return e.getTime()/1e3},W:function(e,n,t){return t.getWeek(e)},Y:function(e){return o(e.getFullYear(),4)},d:function(e){return o(e.getDate())},h:function(e){return e.getHours()%12?e.getHours()%12:12},i:function(e){return o(e.getMinutes())},j:function(e){return e.getDate()},l:function(e,n){return n.weekdays.longhand[e.getDay()]},m:function(e){return o(e.getMonth()+1)},n:function(e){return e.getMonth()+1},s:function(e){return e.getSeconds()},u:function(e){return e.getTime()},w:function(e){return e.getDay()},y:function(e){return String(e.getFullYear()).substring(2)}},b=function(e){var n=e.config,t=void 0===n?a:n,o=e.l10n,r=void 0===o?i:o,l=e.isMobile,c=void 0!==l&&l;return function(e,n,a){var i=a||r;return void 0===t.formatDate||c?n.split("").map((function(n,a,o){return w[n]&&"\\"!==o[a-1]?w[n](e,i,t):"\\"!==n?n:""})).join(""):t.formatDate(e,n,i)}},C=function(e){var n=e.config,t=void 0===n?a:n,o=e.l10n,r=void 0===o?i:o;return function(e,n,i,o){if(0===e||e){var l,c=o||r,s=e;if(e instanceof Date)l=new Date(e.getTime());else if("string"!=typeof e&&void 0!==e.toFixed)l=new Date(e);else if("string"==typeof e){var d=n||(t||a).dateFormat,u=String(e).trim();if("today"===u)l=new Date,i=!0;else if(t&&t.parseDate)l=t.parseDate(e,d);else if(/Z$/.test(u)||/GMT$/.test(u))l=new Date(e);else{for(var f=void 0,m=[],g=0,p=0,h="";g<d.length;g++){var w=d[g],b="\\"===w,C="\\"===d[g-1]||b;if(D[w]&&!C){h+=D[w];var M=new RegExp(h).exec(e);M&&(f=!0)&&m["Y"!==w?"push":"unshift"]({fn:v[w],val:M[++p]})}else b||(h+=".")}l=t&&t.noCalendar?new Date((new Date).setHours(0,0,0,0)):new Date((new Date).getFullYear(),0,1,0,0,0,0),m.forEach((function(e){var n=e.fn,t=e.val;return l=n(l,t,c)||l})),l=f?l:void 0}}if(l instanceof Date&&!isNaN(l.getTime()))return!0===i&&l.setHours(0,0,0,0),l;t.errorHandler(new Error("Invalid date provided: "+s))}}};function M(e,n,t){return void 0===t&&(t=!0),!1!==t?new Date(e.getTime()).setHours(0,0,0,0)-new Date(n.getTime()).setHours(0,0,0,0):e.getTime()-n.getTime()}var y=function(e,n,t){return 3600*e+60*n+t},x=864e5;function E(e){var n=e.defaultHour,t=e.defaultMinute,a=e.defaultSeconds;if(void 0!==e.minDate){var i=e.minDate.getHours(),o=e.minDate.getMinutes(),r=e.minDate.getSeconds();n<i&&(n=i),n===i&&t<o&&(t=o),n===i&&t===o&&a<r&&(a=e.minDate.getSeconds())}if(void 0!==e.maxDate){var l=e.maxDate.getHours(),c=e.maxDate.getMinutes();(n=Math.min(n,l))===l&&(t=Math.min(c,t)),n===l&&t===c&&(a=e.maxDate.getSeconds())}return{hours:n,minutes:t,seconds:a}}"function"!=typeof Object.assign&&(Object.assign=function(e){for(var n=[],t=1;t<arguments.length;t++)n[t-1]=arguments[t];if(!e)throw TypeError("Cannot convert undefined or null to object");for(var a=function(n){n&&Object.keys(n).forEach((function(t){return e[t]=n[t]}))},i=0,o=n;i<o.length;i++){var r=o[i];a(r)}return e});function k(p,v){var w={config:e(e({},a),I.defaultConfig),l10n:i};function k(){var e;return(null===(e=w.calendarContainer)||void 0===e?void 0:e.getRootNode()).activeElement||document.activeElement}function T(e){return e.bind(w)}function S(){var e=w.config;!1===e.weekNumbers&&1===e.showMonths||!0!==e.noCalendar&&window.requestAnimationFrame((function(){if(void 0!==w.calendarContainer&&(w.calendarContainer.style.visibility="hidden",w.calendarContainer.style.display="block"),void 0!==w.daysContainer){var n=(w.days.offsetWidth+1)*e.showMonths;w.daysContainer.style.width=n+"px",w.calendarContainer.style.width=n+(void 0!==w.weekWrapper?w.weekWrapper.offsetWidth:0)+"px",w.calendarContainer.style.removeProperty("visibility"),w.calendarContainer.style.removeProperty("display")}}))}function _(e){if(0===w.selectedDates.length){var n=void 0===w.config.minDate||M(new Date,w.config.minDate)>=0?new Date:new Date(w.config.minDate.getTime()),t=E(w.config);n.setHours(t.hours,t.minutes,t.seconds,n.getMilliseconds()),w.selectedDates=[n],w.latestSelectedDateObj=n}void 0!==e&&"blur"!==e.type&&function(e){e.preventDefault();var n="keydown"===e.type,t=g(e),a=t;void 0!==w.amPM&&t===w.amPM&&(w.amPM.textContent=w.l10n.amPM[r(w.amPM.textContent===w.l10n.amPM[0])]);var i=parseFloat(a.getAttribute("min")),l=parseFloat(a.getAttribute("max")),c=parseFloat(a.getAttribute("step")),s=parseInt(a.value,10),d=e.delta||(n?38===e.which?1:-1:0),u=s+c*d;if(void 0!==a.value&&2===a.value.length){var f=a===w.hourElement,m=a===w.minuteElement;u<i?(u=l+u+r(!f)+(r(f)&&r(!w.amPM)),m&&L(void 0,-1,w.hourElement)):u>l&&(u=a===w.hourElement?u-l-r(!w.amPM):i,m&&L(void 0,1,w.hourElement)),w.amPM&&f&&(1===c?u+s===23:Math.abs(u-s)>c)&&(w.amPM.textContent=w.l10n.amPM[r(w.amPM.textContent===w.l10n.amPM[0])]),a.value=o(u)}}(e);var a=w._input.value;O(),ye(),w._input.value!==a&&w._debouncedChange()}function O(){if(void 0!==w.hourElement&&void 0!==w.minuteElement){var e,n,t=(parseInt(w.hourElement.value.slice(-2),10)||0)%24,a=(parseInt(w.minuteElement.value,10)||0)%60,i=void 0!==w.secondElement?(parseInt(w.secondElement.value,10)||0)%60:0;void 0!==w.amPM&&(e=t,n=w.amPM.textContent,t=e%12+12*r(n===w.l10n.amPM[1]));var o=void 0!==w.config.minTime||w.config.minDate&&w.minDateHasTime&&w.latestSelectedDateObj&&0===M(w.latestSelectedDateObj,w.config.minDate,!0),l=void 0!==w.config.maxTime||w.config.maxDate&&w.maxDateHasTime&&w.latestSelectedDateObj&&0===M(w.latestSelectedDateObj,w.config.maxDate,!0);if(void 0!==w.config.maxTime&&void 0!==w.config.minTime&&w.config.minTime>w.config.maxTime){var c=y(w.config.minTime.getHours(),w.config.minTime.getMinutes(),w.config.minTime.getSeconds()),s=y(w.config.maxTime.getHours(),w.config.maxTime.getMinutes(),w.config.maxTime.getSeconds()),d=y(t,a,i);if(d>s&&d<c){var u=function(e){var n=Math.floor(e/3600),t=(e-3600*n)/60;return[n,t,e-3600*n-60*t]}(c);t=u[0],a=u[1],i=u[2]}}else{if(l){var f=void 0!==w.config.maxTime?w.config.maxTime:w.config.maxDate;(t=Math.min(t,f.getHours()))===f.getHours()&&(a=Math.min(a,f.getMinutes())),a===f.getMinutes()&&(i=Math.min(i,f.getSeconds()))}if(o){var m=void 0!==w.config.minTime?w.config.minTime:w.config.minDate;(t=Math.max(t,m.getHours()))===m.getHours()&&a<m.getMinutes()&&(a=m.getMinutes()),a===m.getMinutes()&&(i=Math.max(i,m.getSeconds()))}}A(t,a,i)}}function F(e){var n=e||w.latestSelectedDateObj;n&&n instanceof Date&&A(n.getHours(),n.getMinutes(),n.getSeconds())}function A(e,n,t){void 0!==w.latestSelectedDateObj&&w.latestSelectedDateObj.setHours(e%24,n,t||0,0),w.hourElement&&w.minuteElement&&!w.isMobile&&(w.hourElement.value=o(w.config.time_24hr?e:(12+e)%12+12*r(e%12==0)),w.minuteElement.value=o(n),void 0!==w.amPM&&(w.amPM.textContent=w.l10n.amPM[r(e>=12)]),void 0!==w.secondElement&&(w.secondElement.value=o(t)))}function N(e){var n=g(e),t=parseInt(n.value)+(e.delta||0);(t/1e3>1||"Enter"===e.key&&!/[^\d]/.test(t.toString()))&&ee(t)}function P(e,n,t,a){return n instanceof Array?n.forEach((function(n){return P(e,n,t,a)})):e instanceof Array?e.forEach((function(e){return P(e,n,t,a)})):(e.addEventListener(n,t,a),void w._handlers.push({remove:function(){return e.removeEventListener(n,t,a)}}))}function Y(){De("onChange")}function j(e,n){var t=void 0!==e?w.parseDate(e):w.latestSelectedDateObj||(w.config.minDate&&w.config.minDate>w.now?w.config.minDate:w.config.maxDate&&w.config.maxDate<w.now?w.config.maxDate:w.now),a=w.currentYear,i=w.currentMonth;try{void 0!==t&&(w.currentYear=t.getFullYear(),w.currentMonth=t.getMonth())}catch(e){e.message="Invalid date supplied: "+t,w.config.errorHandler(e)}n&&w.currentYear!==a&&(De("onYearChange"),q()),!n||w.currentYear===a&&w.currentMonth===i||De("onMonthChange"),w.redraw()}function H(e){var n=g(e);~n.className.indexOf("arrow")&&L(e,n.classList.contains("arrowUp")?1:-1)}function L(e,n,t){var a=e&&g(e),i=t||a&&a.parentNode&&a.parentNode.firstChild,o=we("increment");o.delta=n,i&&i.dispatchEvent(o)}function R(e,n,t,a){var i=ne(n,!0),o=d("span",e,n.getDate().toString());return o.dateObj=n,o.$i=a,o.setAttribute("aria-label",w.formatDate(n,w.config.ariaDateFormat)),-1===e.indexOf("hidden")&&0===M(n,w.now)&&(w.todayDateElem=o,o.classList.add("today"),o.setAttribute("aria-current","date")),i?(o.tabIndex=-1,be(n)&&(o.classList.add("selected"),w.selectedDateElem=o,"range"===w.config.mode&&(s(o,"startRange",w.selectedDates[0]&&0===M(n,w.selectedDates[0],!0)),s(o,"endRange",w.selectedDates[1]&&0===M(n,w.selectedDates[1],!0)),"nextMonthDay"===e&&o.classList.add("inRange")))):o.classList.add("flatpickr-disabled"),"range"===w.config.mode&&function(e){return!("range"!==w.config.mode||w.selectedDates.length<2)&&(M(e,w.selectedDates[0])>=0&&M(e,w.selectedDates[1])<=0)}(n)&&!be(n)&&o.classList.add("inRange"),w.weekNumbers&&1===w.config.showMonths&&"prevMonthDay"!==e&&a%7==6&&w.weekNumbers.insertAdjacentHTML("beforeend","<span class='flatpickr-day'>"+w.config.getWeek(n)+"</span>"),De("onDayCreate",o),o}function W(e){e.focus(),"range"===w.config.mode&&oe(e)}function B(e){for(var n=e>0?0:w.config.showMonths-1,t=e>0?w.config.showMonths:-1,a=n;a!=t;a+=e)for(var i=w.daysContainer.children[a],o=e>0?0:i.children.length-1,r=e>0?i.children.length:-1,l=o;l!=r;l+=e){var c=i.children[l];if(-1===c.className.indexOf("hidden")&&ne(c.dateObj))return c}}function J(e,n){var t=k(),a=te(t||document.body),i=void 0!==e?e:a?t:void 0!==w.selectedDateElem&&te(w.selectedDateElem)?w.selectedDateElem:void 0!==w.todayDateElem&&te(w.todayDateElem)?w.todayDateElem:B(n>0?1:-1);void 0===i?w._input.focus():a?function(e,n){for(var t=-1===e.className.indexOf("Month")?e.dateObj.getMonth():w.currentMonth,a=n>0?w.config.showMonths:-1,i=n>0?1:-1,o=t-w.currentMonth;o!=a;o+=i)for(var r=w.daysContainer.children[o],l=t-w.currentMonth===o?e.$i+n:n<0?r.children.length-1:0,c=r.children.length,s=l;s>=0&&s<c&&s!=(n>0?c:-1);s+=i){var d=r.children[s];if(-1===d.className.indexOf("hidden")&&ne(d.dateObj)&&Math.abs(e.$i-s)>=Math.abs(n))return W(d)}w.changeMonth(i),J(B(i),0)}(i,n):W(i)}function K(e,n){for(var t=(new Date(e,n,1).getDay()-w.l10n.firstDayOfWeek+7)%7,a=w.utils.getDaysInMonth((n-1+12)%12,e),i=w.utils.getDaysInMonth(n,e),o=window.document.createDocumentFragment(),r=w.config.showMonths>1,l=r?"prevMonthDay hidden":"prevMonthDay",c=r?"nextMonthDay hidden":"nextMonthDay",s=a+1-t,u=0;s<=a;s++,u++)o.appendChild(R("flatpickr-day "+l,new Date(e,n-1,s),0,u));for(s=1;s<=i;s++,u++)o.appendChild(R("flatpickr-day",new Date(e,n,s),0,u));for(var f=i+1;f<=42-t&&(1===w.config.showMonths||u%7!=0);f++,u++)o.appendChild(R("flatpickr-day "+c,new Date(e,n+1,f%i),0,u));var m=d("div","dayContainer");return m.appendChild(o),m}function U(){if(void 0!==w.daysContainer){u(w.daysContainer),w.weekNumbers&&u(w.weekNumbers);for(var e=document.createDocumentFragment(),n=0;n<w.config.showMonths;n++){var t=new Date(w.currentYear,w.currentMonth,1);t.setMonth(w.currentMonth+n),e.appendChild(K(t.getFullYear(),t.getMonth()))}w.daysContainer.appendChild(e),w.days=w.daysContainer.firstChild,"range"===w.config.mode&&1===w.selectedDates.length&&oe()}}function q(){if(!(w.config.showMonths>1||"dropdown"!==w.config.monthSelectorType)){var e=function(e){return!(void 0!==w.config.minDate&&w.currentYear===w.config.minDate.getFullYear()&&e<w.config.minDate.getMonth())&&!(void 0!==w.config.maxDate&&w.currentYear===w.config.maxDate.getFullYear()&&e>w.config.maxDate.getMonth())};w.monthsDropdownContainer.tabIndex=-1,w.monthsDropdownContainer.innerHTML="";for(var n=0;n<12;n++)if(e(n)){var t=d("option","flatpickr-monthDropdown-month");t.value=new Date(w.currentYear,n).getMonth().toString(),t.textContent=h(n,w.config.shorthandCurrentMonth,w.l10n),t.tabIndex=-1,w.currentMonth===n&&(t.selected=!0),w.monthsDropdownContainer.appendChild(t)}}}function $(){var e,n=d("div","flatpickr-month"),t=window.document.createDocumentFragment();w.config.showMonths>1||"static"===w.config.monthSelectorType?e=d("span","cur-month"):(w.monthsDropdownContainer=d("select","flatpickr-monthDropdown-months"),w.monthsDropdownContainer.setAttribute("aria-label",w.l10n.monthAriaLabel),P(w.monthsDropdownContainer,"change",(function(e){var n=g(e),t=parseInt(n.value,10);w.changeMonth(t-w.currentMonth),De("onMonthChange")})),q(),e=w.monthsDropdownContainer);var a=m("cur-year",{tabindex:"-1"}),i=a.getElementsByTagName("input")[0];i.setAttribute("aria-label",w.l10n.yearAriaLabel),w.config.minDate&&i.setAttribute("min",w.config.minDate.getFullYear().toString()),w.config.maxDate&&(i.setAttribute("max",w.config.maxDate.getFullYear().toString()),i.disabled=!!w.config.minDate&&w.config.minDate.getFullYear()===w.config.maxDate.getFullYear());var o=d("div","flatpickr-current-month");return o.appendChild(e),o.appendChild(a),t.appendChild(o),n.appendChild(t),{container:n,yearElement:i,monthElement:e}}function V(){u(w.monthNav),w.monthNav.appendChild(w.prevMonthNav),w.config.showMonths&&(w.yearElements=[],w.monthElements=[]);for(var e=w.config.showMonths;e--;){var n=$();w.yearElements.push(n.yearElement),w.monthElements.push(n.monthElement),w.monthNav.appendChild(n.container)}w.monthNav.appendChild(w.nextMonthNav)}function z(){w.weekdayContainer?u(w.weekdayContainer):w.weekdayContainer=d("div","flatpickr-weekdays");for(var e=w.config.showMonths;e--;){var n=d("div","flatpickr-weekdaycontainer");w.weekdayContainer.appendChild(n)}return G(),w.weekdayContainer}function G(){if(w.weekdayContainer){var e=w.l10n.firstDayOfWeek,t=n(w.l10n.weekdays.shorthand);e>0&&e<t.length&&(t=n(t.splice(e,t.length),t.splice(0,e)));for(var a=w.config.showMonths;a--;)w.weekdayContainer.children[a].innerHTML="\n      <span class='flatpickr-weekday'>\n        "+t.join("</span><span class='flatpickr-weekday'>")+"\n      </span>\n      "}}function Z(e,n){void 0===n&&(n=!0);var t=n?e:e-w.currentMonth;t<0&&!0===w._hidePrevMonthArrow||t>0&&!0===w._hideNextMonthArrow||(w.currentMonth+=t,(w.currentMonth<0||w.currentMonth>11)&&(w.currentYear+=w.currentMonth>11?1:-1,w.currentMonth=(w.currentMonth+12)%12,De("onYearChange"),q()),U(),De("onMonthChange"),Ce())}function Q(e){return w.calendarContainer.contains(e)}function X(e){if(w.isOpen&&!w.config.inline){var n=g(e),t=Q(n),a=!(n===w.input||n===w.altInput||w.element.contains(n)||e.path&&e.path.indexOf&&(~e.path.indexOf(w.input)||~e.path.indexOf(w.altInput)))&&!t&&!Q(e.relatedTarget),i=!w.config.ignoredFocusElements.some((function(e){return e.contains(n)}));a&&i&&(w.config.allowInput&&w.setDate(w._input.value,!1,w.config.altInput?w.config.altFormat:w.config.dateFormat),void 0!==w.timeContainer&&void 0!==w.minuteElement&&void 0!==w.hourElement&&""!==w.input.value&&void 0!==w.input.value&&_(),w.close(),w.config&&"range"===w.config.mode&&1===w.selectedDates.length&&w.clear(!1))}}function ee(e){if(!(!e||w.config.minDate&&e<w.config.minDate.getFullYear()||w.config.maxDate&&e>w.config.maxDate.getFullYear())){var n=e,t=w.currentYear!==n;w.currentYear=n||w.currentYear,w.config.maxDate&&w.currentYear===w.config.maxDate.getFullYear()?w.currentMonth=Math.min(w.config.maxDate.getMonth(),w.currentMonth):w.config.minDate&&w.currentYear===w.config.minDate.getFullYear()&&(w.currentMonth=Math.max(w.config.minDate.getMonth(),w.currentMonth)),t&&(w.redraw(),De("onYearChange"),q())}}function ne(e,n){var t;void 0===n&&(n=!0);var a=w.parseDate(e,void 0,n);if(w.config.minDate&&a&&M(a,w.config.minDate,void 0!==n?n:!w.minDateHasTime)<0||w.config.maxDate&&a&&M(a,w.config.maxDate,void 0!==n?n:!w.maxDateHasTime)>0)return!1;if(!w.config.enable&&0===w.config.disable.length)return!0;if(void 0===a)return!1;for(var i=!!w.config.enable,o=null!==(t=w.config.enable)&&void 0!==t?t:w.config.disable,r=0,l=void 0;r<o.length;r++){if("function"==typeof(l=o[r])&&l(a))return i;if(l instanceof Date&&void 0!==a&&l.getTime()===a.getTime())return i;if("string"==typeof l){var c=w.parseDate(l,void 0,!0);return c&&c.getTime()===a.getTime()?i:!i}if("object"==typeof l&&void 0!==a&&l.from&&l.to&&a.getTime()>=l.from.getTime()&&a.getTime()<=l.to.getTime())return i}return!i}function te(e){return void 0!==w.daysContainer&&(-1===e.className.indexOf("hidden")&&-1===e.className.indexOf("flatpickr-disabled")&&w.daysContainer.contains(e))}function ae(e){var n=e.target===w._input,t=w._input.value.trimEnd()!==Me();!n||!t||e.relatedTarget&&Q(e.relatedTarget)||w.setDate(w._input.value,!0,e.target===w.altInput?w.config.altFormat:w.config.dateFormat)}function ie(e){var n=g(e),t=w.config.wrap?p.contains(n):n===w._input,a=w.config.allowInput,i=w.isOpen&&(!a||!t),o=w.config.inline&&t&&!a;if(13===e.keyCode&&t){if(a)return w.setDate(w._input.value,!0,n===w.altInput?w.config.altFormat:w.config.dateFormat),w.close(),n.blur();w.open()}else if(Q(n)||i||o){var r=!!w.timeContainer&&w.timeContainer.contains(n);switch(e.keyCode){case 13:r?(e.preventDefault(),_(),fe()):me(e);break;case 27:e.preventDefault(),fe();break;case 8:case 46:t&&!w.config.allowInput&&(e.preventDefault(),w.clear());break;case 37:case 39:if(r||t)w.hourElement&&w.hourElement.focus();else{e.preventDefault();var l=k();if(void 0!==w.daysContainer&&(!1===a||l&&te(l))){var c=39===e.keyCode?1:-1;e.ctrlKey?(e.stopPropagation(),Z(c),J(B(1),0)):J(void 0,c)}}break;case 38:case 40:e.preventDefault();var s=40===e.keyCode?1:-1;w.daysContainer&&void 0!==n.$i||n===w.input||n===w.altInput?e.ctrlKey?(e.stopPropagation(),ee(w.currentYear-s),J(B(1),0)):r||J(void 0,7*s):n===w.currentYearElement?ee(w.currentYear-s):w.config.enableTime&&(!r&&w.hourElement&&w.hourElement.focus(),_(e),w._debouncedChange());break;case 9:if(r){var d=[w.hourElement,w.minuteElement,w.secondElement,w.amPM].concat(w.pluginElements).filter((function(e){return e})),u=d.indexOf(n);if(-1!==u){var f=d[u+(e.shiftKey?-1:1)];e.preventDefault(),(f||w._input).focus()}}else!w.config.noCalendar&&w.daysContainer&&w.daysContainer.contains(n)&&e.shiftKey&&(e.preventDefault(),w._input.focus())}}if(void 0!==w.amPM&&n===w.amPM)switch(e.key){case w.l10n.amPM[0].charAt(0):case w.l10n.amPM[0].charAt(0).toLowerCase():w.amPM.textContent=w.l10n.amPM[0],O(),ye();break;case w.l10n.amPM[1].charAt(0):case w.l10n.amPM[1].charAt(0).toLowerCase():w.amPM.textContent=w.l10n.amPM[1],O(),ye()}(t||Q(n))&&De("onKeyDown",e)}function oe(e,n){if(void 0===n&&(n="flatpickr-day"),1===w.selectedDates.length&&(!e||e.classList.contains(n)&&!e.classList.contains("flatpickr-disabled"))){for(var t=e?e.dateObj.getTime():w.days.firstElementChild.dateObj.getTime(),a=w.parseDate(w.selectedDates[0],void 0,!0).getTime(),i=Math.min(t,w.selectedDates[0].getTime()),o=Math.max(t,w.selectedDates[0].getTime()),r=!1,l=0,c=0,s=i;s<o;s+=x)ne(new Date(s),!0)||(r=r||s>i&&s<o,s<a&&(!l||s>l)?l=s:s>a&&(!c||s<c)&&(c=s));Array.from(w.rContainer.querySelectorAll("*:nth-child(-n+"+w.config.showMonths+") > ."+n)).forEach((function(n){var i,o,s,d=n.dateObj.getTime(),u=l>0&&d<l||c>0&&d>c;if(u)return n.classList.add("notAllowed"),void["inRange","startRange","endRange"].forEach((function(e){n.classList.remove(e)}));r&&!u||(["startRange","inRange","endRange","notAllowed"].forEach((function(e){n.classList.remove(e)})),void 0!==e&&(e.classList.add(t<=w.selectedDates[0].getTime()?"startRange":"endRange"),a<t&&d===a?n.classList.add("startRange"):a>t&&d===a&&n.classList.add("endRange"),d>=l&&(0===c||d<=c)&&(o=a,s=t,(i=d)>Math.min(o,s)&&i<Math.max(o,s))&&n.classList.add("inRange")))}))}}function re(){!w.isOpen||w.config.static||w.config.inline||de()}function le(e){return function(n){var t=w.config["_"+e+"Date"]=w.parseDate(n,w.config.dateFormat),a=w.config["_"+("min"===e?"max":"min")+"Date"];void 0!==t&&(w["min"===e?"minDateHasTime":"maxDateHasTime"]=t.getHours()>0||t.getMinutes()>0||t.getSeconds()>0),w.selectedDates&&(w.selectedDates=w.selectedDates.filter((function(e){return ne(e)})),w.selectedDates.length||"min"!==e||F(t),ye()),w.daysContainer&&(ue(),void 0!==t?w.currentYearElement[e]=t.getFullYear().toString():w.currentYearElement.removeAttribute(e),w.currentYearElement.disabled=!!a&&void 0!==t&&a.getFullYear()===t.getFullYear())}}function ce(){return w.config.wrap?p.querySelector("[data-input]"):p}function se(){"object"!=typeof w.config.locale&&void 0===I.l10ns[w.config.locale]&&w.config.errorHandler(new Error("flatpickr: invalid locale "+w.config.locale)),w.l10n=e(e({},I.l10ns.default),"object"==typeof w.config.locale?w.config.locale:"default"!==w.config.locale?I.l10ns[w.config.locale]:void 0),D.D="("+w.l10n.weekdays.shorthand.join("|")+")",D.l="("+w.l10n.weekdays.longhand.join("|")+")",D.M="("+w.l10n.months.shorthand.join("|")+")",D.F="("+w.l10n.months.longhand.join("|")+")",D.K="("+w.l10n.amPM[0]+"|"+w.l10n.amPM[1]+"|"+w.l10n.amPM[0].toLowerCase()+"|"+w.l10n.amPM[1].toLowerCase()+")",void 0===e(e({},v),JSON.parse(JSON.stringify(p.dataset||{}))).time_24hr&&void 0===I.defaultConfig.time_24hr&&(w.config.time_24hr=w.l10n.time_24hr),w.formatDate=b(w),w.parseDate=C({config:w.config,l10n:w.l10n})}function de(e){if("function"!=typeof w.config.position){if(void 0!==w.calendarContainer){De("onPreCalendarPosition");var n=e||w._positionElement,t=Array.prototype.reduce.call(w.calendarContainer.children,(function(e,n){return e+n.offsetHeight}),0),a=w.calendarContainer.offsetWidth,i=w.config.position.split(" "),o=i[0],r=i.length>1?i[1]:null,l=n.getBoundingClientRect(),c=window.innerHeight-l.bottom,d="above"===o||"below"!==o&&c<t&&l.top>t,u=window.pageYOffset+l.top+(d?-t-2:n.offsetHeight+2);if(s(w.calendarContainer,"arrowTop",!d),s(w.calendarContainer,"arrowBottom",d),!w.config.inline){var f=window.pageXOffset+l.left,m=!1,g=!1;"center"===r?(f-=(a-l.width)/2,m=!0):"right"===r&&(f-=a-l.width,g=!0),s(w.calendarContainer,"arrowLeft",!m&&!g),s(w.calendarContainer,"arrowCenter",m),s(w.calendarContainer,"arrowRight",g);var p=window.document.body.offsetWidth-(window.pageXOffset+l.right),h=f+a>window.document.body.offsetWidth,v=p+a>window.document.body.offsetWidth;if(s(w.calendarContainer,"rightMost",h),!w.config.static)if(w.calendarContainer.style.top=u+"px",h)if(v){var D=function(){for(var e=null,n=0;n<document.styleSheets.length;n++){var t=document.styleSheets[n];if(t.cssRules){try{t.cssRules}catch(e){continue}e=t;break}}return null!=e?e:(a=document.createElement("style"),document.head.appendChild(a),a.sheet);var a}();if(void 0===D)return;var b=window.document.body.offsetWidth,C=Math.max(0,b/2-a/2),M=D.cssRules.length,y="{left:"+l.left+"px;right:auto;}";s(w.calendarContainer,"rightMost",!1),s(w.calendarContainer,"centerMost",!0),D.insertRule(".flatpickr-calendar.centerMost:before,.flatpickr-calendar.centerMost:after"+y,M),w.calendarContainer.style.left=C+"px",w.calendarContainer.style.right="auto"}else w.calendarContainer.style.left="auto",w.calendarContainer.style.right=p+"px";else w.calendarContainer.style.left=f+"px",w.calendarContainer.style.right="auto"}}}else w.config.position(w,e)}function ue(){w.config.noCalendar||w.isMobile||(q(),Ce(),U())}function fe(){w._input.focus(),-1!==window.navigator.userAgent.indexOf("MSIE")||void 0!==navigator.msMaxTouchPoints?setTimeout(w.close,0):w.close()}function me(e){e.preventDefault(),e.stopPropagation();var n=f(g(e),(function(e){return e.classList&&e.classList.contains("flatpickr-day")&&!e.classList.contains("flatpickr-disabled")&&!e.classList.contains("notAllowed")}));if(void 0!==n){var t=n,a=w.latestSelectedDateObj=new Date(t.dateObj.getTime()),i=(a.getMonth()<w.currentMonth||a.getMonth()>w.currentMonth+w.config.showMonths-1)&&"range"!==w.config.mode;if(w.selectedDateElem=t,"single"===w.config.mode)w.selectedDates=[a];else if("multiple"===w.config.mode){var o=be(a);o?w.selectedDates.splice(parseInt(o),1):w.selectedDates.push(a)}else"range"===w.config.mode&&(2===w.selectedDates.length&&w.clear(!1,!1),w.latestSelectedDateObj=a,w.selectedDates.push(a),0!==M(a,w.selectedDates[0],!0)&&w.selectedDates.sort((function(e,n){return e.getTime()-n.getTime()})));if(O(),i){var r=w.currentYear!==a.getFullYear();w.currentYear=a.getFullYear(),w.currentMonth=a.getMonth(),r&&(De("onYearChange"),q()),De("onMonthChange")}if(Ce(),U(),ye(),i||"range"===w.config.mode||1!==w.config.showMonths?void 0!==w.selectedDateElem&&void 0===w.hourElement&&w.selectedDateElem&&w.selectedDateElem.focus():W(t),void 0!==w.hourElement&&void 0!==w.hourElement&&w.hourElement.focus(),w.config.closeOnSelect){var l="single"===w.config.mode&&!w.config.enableTime,c="range"===w.config.mode&&2===w.selectedDates.length&&!w.config.enableTime;(l||c)&&fe()}Y()}}w.parseDate=C({config:w.config,l10n:w.l10n}),w._handlers=[],w.pluginElements=[],w.loadedPlugins=[],w._bind=P,w._setHoursFromDate=F,w._positionCalendar=de,w.changeMonth=Z,w.changeYear=ee,w.clear=function(e,n){void 0===e&&(e=!0);void 0===n&&(n=!0);w.input.value="",void 0!==w.altInput&&(w.altInput.value="");void 0!==w.mobileInput&&(w.mobileInput.value="");w.selectedDates=[],w.latestSelectedDateObj=void 0,!0===n&&(w.currentYear=w._initialDate.getFullYear(),w.currentMonth=w._initialDate.getMonth());if(!0===w.config.enableTime){var t=E(w.config),a=t.hours,i=t.minutes,o=t.seconds;A(a,i,o)}w.redraw(),e&&De("onChange")},w.close=function(){w.isOpen=!1,w.isMobile||(void 0!==w.calendarContainer&&w.calendarContainer.classList.remove("open"),void 0!==w._input&&w._input.classList.remove("active"));De("onClose")},w.onMouseOver=oe,w._createElement=d,w.createDay=R,w.destroy=function(){void 0!==w.config&&De("onDestroy");for(var e=w._handlers.length;e--;)w._handlers[e].remove();if(w._handlers=[],w.mobileInput)w.mobileInput.parentNode&&w.mobileInput.parentNode.removeChild(w.mobileInput),w.mobileInput=void 0;else if(w.calendarContainer&&w.calendarContainer.parentNode)if(w.config.static&&w.calendarContainer.parentNode){var n=w.calendarContainer.parentNode;if(n.lastChild&&n.removeChild(n.lastChild),n.parentNode){for(;n.firstChild;)n.parentNode.insertBefore(n.firstChild,n);n.parentNode.removeChild(n)}}else w.calendarContainer.parentNode.removeChild(w.calendarContainer);w.altInput&&(w.input.type="text",w.altInput.parentNode&&w.altInput.parentNode.removeChild(w.altInput),delete w.altInput);w.input&&(w.input.type=w.input._type,w.input.classList.remove("flatpickr-input"),w.input.removeAttribute("readonly"));["_showTimeInput","latestSelectedDateObj","_hideNextMonthArrow","_hidePrevMonthArrow","__hideNextMonthArrow","__hidePrevMonthArrow","isMobile","isOpen","selectedDateElem","minDateHasTime","maxDateHasTime","days","daysContainer","_input","_positionElement","innerContainer","rContainer","monthNav","todayDateElem","calendarContainer","weekdayContainer","prevMonthNav","nextMonthNav","monthsDropdownContainer","currentMonthElement","currentYearElement","navigationCurrentMonth","selectedDateElem","config"].forEach((function(e){try{delete w[e]}catch(e){}}))},w.isEnabled=ne,w.jumpToDate=j,w.updateValue=ye,w.open=function(e,n){void 0===n&&(n=w._positionElement);if(!0===w.isMobile){if(e){e.preventDefault();var t=g(e);t&&t.blur()}return void 0!==w.mobileInput&&(w.mobileInput.focus(),w.mobileInput.click()),void De("onOpen")}if(w._input.disabled||w.config.inline)return;var a=w.isOpen;w.isOpen=!0,a||(w.calendarContainer.classList.add("open"),w._input.classList.add("active"),De("onOpen"),de(n));!0===w.config.enableTime&&!0===w.config.noCalendar&&(!1!==w.config.allowInput||void 0!==e&&w.timeContainer.contains(e.relatedTarget)||setTimeout((function(){return w.hourElement.select()}),50))},w.redraw=ue,w.set=function(e,n){if(null!==e&&"object"==typeof e)for(var a in Object.assign(w.config,e),e)void 0!==ge[a]&&ge[a].forEach((function(e){return e()}));else w.config[e]=n,void 0!==ge[e]?ge[e].forEach((function(e){return e()})):t.indexOf(e)>-1&&(w.config[e]=c(n));w.redraw(),ye(!0)},w.setDate=function(e,n,t){void 0===n&&(n=!1);void 0===t&&(t=w.config.dateFormat);if(0!==e&&!e||e instanceof Array&&0===e.length)return w.clear(n);pe(e,t),w.latestSelectedDateObj=w.selectedDates[w.selectedDates.length-1],w.redraw(),j(void 0,n),F(),0===w.selectedDates.length&&w.clear(!1);ye(n),n&&De("onChange")},w.toggle=function(e){if(!0===w.isOpen)return w.close();w.open(e)};var ge={locale:[se,G],showMonths:[V,S,z],minDate:[j],maxDate:[j],positionElement:[ve],clickOpens:[function(){!0===w.config.clickOpens?(P(w._input,"focus",w.open),P(w._input,"click",w.open)):(w._input.removeEventListener("focus",w.open),w._input.removeEventListener("click",w.open))}]};function pe(e,n){var t=[];if(e instanceof Array)t=e.map((function(e){return w.parseDate(e,n)}));else if(e instanceof Date||"number"==typeof e)t=[w.parseDate(e,n)];else if("string"==typeof e)switch(w.config.mode){case"single":case"time":t=[w.parseDate(e,n)];break;case"multiple":t=e.split(w.config.conjunction).map((function(e){return w.parseDate(e,n)}));break;case"range":t=e.split(w.l10n.rangeSeparator).map((function(e){return w.parseDate(e,n)}))}else w.config.errorHandler(new Error("Invalid date supplied: "+JSON.stringify(e)));w.selectedDates=w.config.allowInvalidPreload?t:t.filter((function(e){return e instanceof Date&&ne(e,!1)})),"range"===w.config.mode&&w.selectedDates.sort((function(e,n){return e.getTime()-n.getTime()}))}function he(e){return e.slice().map((function(e){return"string"==typeof e||"number"==typeof e||e instanceof Date?w.parseDate(e,void 0,!0):e&&"object"==typeof e&&e.from&&e.to?{from:w.parseDate(e.from,void 0),to:w.parseDate(e.to,void 0)}:e})).filter((function(e){return e}))}function ve(){w._positionElement=w.config.positionElement||w._input}function De(e,n){if(void 0!==w.config){var t=w.config[e];if(void 0!==t&&t.length>0)for(var a=0;t[a]&&a<t.length;a++)t[a](w.selectedDates,w.input.value,w,n);"onChange"===e&&(w.input.dispatchEvent(we("change")),w.input.dispatchEvent(we("input")))}}function we(e){var n=document.createEvent("Event");return n.initEvent(e,!0,!0),n}function be(e){for(var n=0;n<w.selectedDates.length;n++){var t=w.selectedDates[n];if(t instanceof Date&&0===M(t,e))return""+n}return!1}function Ce(){w.config.noCalendar||w.isMobile||!w.monthNav||(w.yearElements.forEach((function(e,n){var t=new Date(w.currentYear,w.currentMonth,1);t.setMonth(w.currentMonth+n),w.config.showMonths>1||"static"===w.config.monthSelectorType?w.monthElements[n].textContent=h(t.getMonth(),w.config.shorthandCurrentMonth,w.l10n)+" ":w.monthsDropdownContainer.value=t.getMonth().toString(),e.value=t.getFullYear().toString()})),w._hidePrevMonthArrow=void 0!==w.config.minDate&&(w.currentYear===w.config.minDate.getFullYear()?w.currentMonth<=w.config.minDate.getMonth():w.currentYear<w.config.minDate.getFullYear()),w._hideNextMonthArrow=void 0!==w.config.maxDate&&(w.currentYear===w.config.maxDate.getFullYear()?w.currentMonth+1>w.config.maxDate.getMonth():w.currentYear>w.config.maxDate.getFullYear()))}function Me(e){var n=e||(w.config.altInput?w.config.altFormat:w.config.dateFormat);return w.selectedDates.map((function(e){return w.formatDate(e,n)})).filter((function(e,n,t){return"range"!==w.config.mode||w.config.enableTime||t.indexOf(e)===n})).join("range"!==w.config.mode?w.config.conjunction:w.l10n.rangeSeparator)}function ye(e){void 0===e&&(e=!0),void 0!==w.mobileInput&&w.mobileFormatStr&&(w.mobileInput.value=void 0!==w.latestSelectedDateObj?w.formatDate(w.latestSelectedDateObj,w.mobileFormatStr):""),w.input.value=Me(w.config.dateFormat),void 0!==w.altInput&&(w.altInput.value=Me(w.config.altFormat)),!1!==e&&De("onValueUpdate")}function xe(e){var n=g(e),t=w.prevMonthNav.contains(n),a=w.nextMonthNav.contains(n);t||a?Z(t?-1:1):w.yearElements.indexOf(n)>=0?n.select():n.classList.contains("arrowUp")?w.changeYear(w.currentYear+1):n.classList.contains("arrowDown")&&w.changeYear(w.currentYear-1)}return function(){w.element=w.input=p,w.isOpen=!1,function(){var n=["wrap","weekNumbers","allowInput","allowInvalidPreload","clickOpens","time_24hr","enableTime","noCalendar","altInput","shorthandCurrentMonth","inline","static","enableSeconds","disableMobile"],i=e(e({},JSON.parse(JSON.stringify(p.dataset||{}))),v),o={};w.config.parseDate=i.parseDate,w.config.formatDate=i.formatDate,Object.defineProperty(w.config,"enable",{get:function(){return w.config._enable},set:function(e){w.config._enable=he(e)}}),Object.defineProperty(w.config,"disable",{get:function(){return w.config._disable},set:function(e){w.config._disable=he(e)}});var r="time"===i.mode;if(!i.dateFormat&&(i.enableTime||r)){var l=I.defaultConfig.dateFormat||a.dateFormat;o.dateFormat=i.noCalendar||r?"H:i"+(i.enableSeconds?":S":""):l+" H:i"+(i.enableSeconds?":S":"")}if(i.altInput&&(i.enableTime||r)&&!i.altFormat){var s=I.defaultConfig.altFormat||a.altFormat;o.altFormat=i.noCalendar||r?"h:i"+(i.enableSeconds?":S K":" K"):s+" h:i"+(i.enableSeconds?":S":"")+" K"}Object.defineProperty(w.config,"minDate",{get:function(){return w.config._minDate},set:le("min")}),Object.defineProperty(w.config,"maxDate",{get:function(){return w.config._maxDate},set:le("max")});var d=function(e){return function(n){w.config["min"===e?"_minTime":"_maxTime"]=w.parseDate(n,"H:i:S")}};Object.defineProperty(w.config,"minTime",{get:function(){return w.config._minTime},set:d("min")}),Object.defineProperty(w.config,"maxTime",{get:function(){return w.config._maxTime},set:d("max")}),"time"===i.mode&&(w.config.noCalendar=!0,w.config.enableTime=!0);Object.assign(w.config,o,i);for(var u=0;u<n.length;u++)w.config[n[u]]=!0===w.config[n[u]]||"true"===w.config[n[u]];t.filter((function(e){return void 0!==w.config[e]})).forEach((function(e){w.config[e]=c(w.config[e]||[]).map(T)})),w.isMobile=!w.config.disableMobile&&!w.config.inline&&"single"===w.config.mode&&!w.config.disable.length&&!w.config.enable&&!w.config.weekNumbers&&/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);for(u=0;u<w.config.plugins.length;u++){var f=w.config.plugins[u](w)||{};for(var m in f)t.indexOf(m)>-1?w.config[m]=c(f[m]).map(T).concat(w.config[m]):void 0===i[m]&&(w.config[m]=f[m])}i.altInputClass||(w.config.altInputClass=ce().className+" "+w.config.altInputClass);De("onParseConfig")}(),se(),function(){if(w.input=ce(),!w.input)return void w.config.errorHandler(new Error("Invalid input element specified"));w.input._type=w.input.type,w.input.type="text",w.input.classList.add("flatpickr-input"),w._input=w.input,w.config.altInput&&(w.altInput=d(w.input.nodeName,w.config.altInputClass),w._input=w.altInput,w.altInput.placeholder=w.input.placeholder,w.altInput.disabled=w.input.disabled,w.altInput.required=w.input.required,w.altInput.tabIndex=w.input.tabIndex,w.altInput.type="text",w.input.setAttribute("type","hidden"),!w.config.static&&w.input.parentNode&&w.input.parentNode.insertBefore(w.altInput,w.input.nextSibling));w.config.allowInput||w._input.setAttribute("readonly","readonly");ve()}(),function(){w.selectedDates=[],w.now=w.parseDate(w.config.now)||new Date;var e=w.config.defaultDate||("INPUT"!==w.input.nodeName&&"TEXTAREA"!==w.input.nodeName||!w.input.placeholder||w.input.value!==w.input.placeholder?w.input.value:null);e&&pe(e,w.config.dateFormat);w._initialDate=w.selectedDates.length>0?w.selectedDates[0]:w.config.minDate&&w.config.minDate.getTime()>w.now.getTime()?w.config.minDate:w.config.maxDate&&w.config.maxDate.getTime()<w.now.getTime()?w.config.maxDate:w.now,w.currentYear=w._initialDate.getFullYear(),w.currentMonth=w._initialDate.getMonth(),w.selectedDates.length>0&&(w.latestSelectedDateObj=w.selectedDates[0]);void 0!==w.config.minTime&&(w.config.minTime=w.parseDate(w.config.minTime,"H:i"));void 0!==w.config.maxTime&&(w.config.maxTime=w.parseDate(w.config.maxTime,"H:i"));w.minDateHasTime=!!w.config.minDate&&(w.config.minDate.getHours()>0||w.config.minDate.getMinutes()>0||w.config.minDate.getSeconds()>0),w.maxDateHasTime=!!w.config.maxDate&&(w.config.maxDate.getHours()>0||w.config.maxDate.getMinutes()>0||w.config.maxDate.getSeconds()>0)}(),w.utils={getDaysInMonth:function(e,n){return void 0===e&&(e=w.currentMonth),void 0===n&&(n=w.currentYear),1===e&&(n%4==0&&n%100!=0||n%400==0)?29:w.l10n.daysInMonth[e]}},w.isMobile||function(){var e=window.document.createDocumentFragment();if(w.calendarContainer=d("div","flatpickr-calendar"),w.calendarContainer.tabIndex=-1,!w.config.noCalendar){if(e.appendChild((w.monthNav=d("div","flatpickr-months"),w.yearElements=[],w.monthElements=[],w.prevMonthNav=d("span","flatpickr-prev-month"),w.prevMonthNav.innerHTML=w.config.prevArrow,w.nextMonthNav=d("span","flatpickr-next-month"),w.nextMonthNav.innerHTML=w.config.nextArrow,V(),Object.defineProperty(w,"_hidePrevMonthArrow",{get:function(){return w.__hidePrevMonthArrow},set:function(e){w.__hidePrevMonthArrow!==e&&(s(w.prevMonthNav,"flatpickr-disabled",e),w.__hidePrevMonthArrow=e)}}),Object.defineProperty(w,"_hideNextMonthArrow",{get:function(){return w.__hideNextMonthArrow},set:function(e){w.__hideNextMonthArrow!==e&&(s(w.nextMonthNav,"flatpickr-disabled",e),w.__hideNextMonthArrow=e)}}),w.currentYearElement=w.yearElements[0],Ce(),w.monthNav)),w.innerContainer=d("div","flatpickr-innerContainer"),w.config.weekNumbers){var n=function(){w.calendarContainer.classList.add("hasWeeks");var e=d("div","flatpickr-weekwrapper");e.appendChild(d("span","flatpickr-weekday",w.l10n.weekAbbreviation));var n=d("div","flatpickr-weeks");return e.appendChild(n),{weekWrapper:e,weekNumbers:n}}(),t=n.weekWrapper,a=n.weekNumbers;w.innerContainer.appendChild(t),w.weekNumbers=a,w.weekWrapper=t}w.rContainer=d("div","flatpickr-rContainer"),w.rContainer.appendChild(z()),w.daysContainer||(w.daysContainer=d("div","flatpickr-days"),w.daysContainer.tabIndex=-1),U(),w.rContainer.appendChild(w.daysContainer),w.innerContainer.appendChild(w.rContainer),e.appendChild(w.innerContainer)}w.config.enableTime&&e.appendChild(function(){w.calendarContainer.classList.add("hasTime"),w.config.noCalendar&&w.calendarContainer.classList.add("noCalendar");var e=E(w.config);w.timeContainer=d("div","flatpickr-time"),w.timeContainer.tabIndex=-1;var n=d("span","flatpickr-time-separator",":"),t=m("flatpickr-hour",{"aria-label":w.l10n.hourAriaLabel});w.hourElement=t.getElementsByTagName("input")[0];var a=m("flatpickr-minute",{"aria-label":w.l10n.minuteAriaLabel});w.minuteElement=a.getElementsByTagName("input")[0],w.hourElement.tabIndex=w.minuteElement.tabIndex=-1,w.hourElement.value=o(w.latestSelectedDateObj?w.latestSelectedDateObj.getHours():w.config.time_24hr?e.hours:function(e){switch(e%24){case 0:case 12:return 12;default:return e%12}}(e.hours)),w.minuteElement.value=o(w.latestSelectedDateObj?w.latestSelectedDateObj.getMinutes():e.minutes),w.hourElement.setAttribute("step",w.config.hourIncrement.toString()),w.minuteElement.setAttribute("step",w.config.minuteIncrement.toString()),w.hourElement.setAttribute("min",w.config.time_24hr?"0":"1"),w.hourElement.setAttribute("max",w.config.time_24hr?"23":"12"),w.hourElement.setAttribute("maxlength","2"),w.minuteElement.setAttribute("min","0"),w.minuteElement.setAttribute("max","59"),w.minuteElement.setAttribute("maxlength","2"),w.timeContainer.appendChild(t),w.timeContainer.appendChild(n),w.timeContainer.appendChild(a),w.config.time_24hr&&w.timeContainer.classList.add("time24hr");if(w.config.enableSeconds){w.timeContainer.classList.add("hasSeconds");var i=m("flatpickr-second");w.secondElement=i.getElementsByTagName("input")[0],w.secondElement.value=o(w.latestSelectedDateObj?w.latestSelectedDateObj.getSeconds():e.seconds),w.secondElement.setAttribute("step",w.minuteElement.getAttribute("step")),w.secondElement.setAttribute("min","0"),w.secondElement.setAttribute("max","59"),w.secondElement.setAttribute("maxlength","2"),w.timeContainer.appendChild(d("span","flatpickr-time-separator",":")),w.timeContainer.appendChild(i)}w.config.time_24hr||(w.amPM=d("span","flatpickr-am-pm",w.l10n.amPM[r((w.latestSelectedDateObj?w.hourElement.value:w.config.defaultHour)>11)]),w.amPM.title=w.l10n.toggleTitle,w.amPM.tabIndex=-1,w.timeContainer.appendChild(w.amPM));return w.timeContainer}());s(w.calendarContainer,"rangeMode","range"===w.config.mode),s(w.calendarContainer,"animate",!0===w.config.animate),s(w.calendarContainer,"multiMonth",w.config.showMonths>1),w.calendarContainer.appendChild(e);var i=void 0!==w.config.appendTo&&void 0!==w.config.appendTo.nodeType;if((w.config.inline||w.config.static)&&(w.calendarContainer.classList.add(w.config.inline?"inline":"static"),w.config.inline&&(!i&&w.element.parentNode?w.element.parentNode.insertBefore(w.calendarContainer,w._input.nextSibling):void 0!==w.config.appendTo&&w.config.appendTo.appendChild(w.calendarContainer)),w.config.static)){var l=d("div","flatpickr-wrapper");w.element.parentNode&&w.element.parentNode.insertBefore(l,w.element),l.appendChild(w.element),w.altInput&&l.appendChild(w.altInput),l.appendChild(w.calendarContainer)}w.config.static||w.config.inline||(void 0!==w.config.appendTo?w.config.appendTo:window.document.body).appendChild(w.calendarContainer)}(),function(){w.config.wrap&&["open","close","toggle","clear"].forEach((function(e){Array.prototype.forEach.call(w.element.querySelectorAll("[data-"+e+"]"),(function(n){return P(n,"click",w[e])}))}));if(w.isMobile)return void function(){var e=w.config.enableTime?w.config.noCalendar?"time":"datetime-local":"date";w.mobileInput=d("input",w.input.className+" flatpickr-mobile"),w.mobileInput.tabIndex=1,w.mobileInput.type=e,w.mobileInput.disabled=w.input.disabled,w.mobileInput.required=w.input.required,w.mobileInput.placeholder=w.input.placeholder,w.mobileFormatStr="datetime-local"===e?"Y-m-d\\TH:i:S":"date"===e?"Y-m-d":"H:i:S",w.selectedDates.length>0&&(w.mobileInput.defaultValue=w.mobileInput.value=w.formatDate(w.selectedDates[0],w.mobileFormatStr));w.config.minDate&&(w.mobileInput.min=w.formatDate(w.config.minDate,"Y-m-d"));w.config.maxDate&&(w.mobileInput.max=w.formatDate(w.config.maxDate,"Y-m-d"));w.input.getAttribute("step")&&(w.mobileInput.step=String(w.input.getAttribute("step")));w.input.type="hidden",void 0!==w.altInput&&(w.altInput.type="hidden");try{w.input.parentNode&&w.input.parentNode.insertBefore(w.mobileInput,w.input.nextSibling)}catch(e){}P(w.mobileInput,"change",(function(e){w.setDate(g(e).value,!1,w.mobileFormatStr),De("onChange"),De("onClose")}))}();var e=l(re,50);w._debouncedChange=l(Y,300),w.daysContainer&&!/iPhone|iPad|iPod/i.test(navigator.userAgent)&&P(w.daysContainer,"mouseover",(function(e){"range"===w.config.mode&&oe(g(e))}));P(w._input,"keydown",ie),void 0!==w.calendarContainer&&P(w.calendarContainer,"keydown",ie);w.config.inline||w.config.static||P(window,"resize",e);void 0!==window.ontouchstart?P(window.document,"touchstart",X):P(window.document,"mousedown",X);P(window.document,"focus",X,{capture:!0}),!0===w.config.clickOpens&&(P(w._input,"focus",w.open),P(w._input,"click",w.open));void 0!==w.daysContainer&&(P(w.monthNav,"click",xe),P(w.monthNav,["keyup","increment"],N),P(w.daysContainer,"click",me));if(void 0!==w.timeContainer&&void 0!==w.minuteElement&&void 0!==w.hourElement){var n=function(e){return g(e).select()};P(w.timeContainer,["increment"],_),P(w.timeContainer,"blur",_,{capture:!0}),P(w.timeContainer,"click",H),P([w.hourElement,w.minuteElement],["focus","click"],n),void 0!==w.secondElement&&P(w.secondElement,"focus",(function(){return w.secondElement&&w.secondElement.select()})),void 0!==w.amPM&&P(w.amPM,"click",(function(e){_(e)}))}w.config.allowInput&&P(w._input,"blur",ae)}(),(w.selectedDates.length||w.config.noCalendar)&&(w.config.enableTime&&F(w.config.noCalendar?w.latestSelectedDateObj:void 0),ye(!1)),S();var n=/^((?!chrome|android).)*safari/i.test(navigator.userAgent);!w.isMobile&&n&&de(),De("onReady")}(),w}function T(e,n){for(var t=Array.prototype.slice.call(e).filter((function(e){return e instanceof HTMLElement})),a=[],i=0;i<t.length;i++){var o=t[i];try{if(null!==o.getAttribute("data-fp-omit"))continue;void 0!==o._flatpickr&&(o._flatpickr.destroy(),o._flatpickr=void 0),o._flatpickr=k(o,n||{}),a.push(o._flatpickr)}catch(e){console.error(e)}}return 1===a.length?a[0]:a}"undefined"!=typeof HTMLElement&&"undefined"!=typeof HTMLCollection&&"undefined"!=typeof NodeList&&(HTMLCollection.prototype.flatpickr=NodeList.prototype.flatpickr=function(e){return T(this,e)},HTMLElement.prototype.flatpickr=function(e){return T([this],e)});var I=function(e,n){return"string"==typeof e?T(window.document.querySelectorAll(e),n):e instanceof Node?T([e],n):T(e,n)};return I.defaultConfig={},I.l10ns={en:e({},i),default:e({},i)},I.localize=function(n){I.l10ns.default=e(e({},I.l10ns.default),n)},I.setDefaults=function(n){I.defaultConfig=e(e({},I.defaultConfig),n)},I.parseDate=C({}),I.formatDate=b({}),I.compareDates=M,"undefined"!=typeof jQuery&&void 0!==jQuery.fn&&(jQuery.fn.flatpickr=function(e){return T(this,e)}),Date.prototype.fp_incr=function(e){return new Date(this.getFullYear(),this.getMonth(),this.getDate()+("string"==typeof e?parseInt(e,10):e))},"undefined"!=typeof window&&(window.flatpickr=I),I}));
