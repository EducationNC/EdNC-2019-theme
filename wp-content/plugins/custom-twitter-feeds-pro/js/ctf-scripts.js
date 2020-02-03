var ctf_js_exists = (typeof ctf_js_exists !== 'undefined') ? true : false;

if(!ctf_js_exists){

    (function ($) {
        var ctfIntentsIncluded = false;
        $('.ctf').each(function() {
            if (!ctfIntentsIncluded && typeof $(this).attr('data-ctfintents') !== 'undefined') {
                ctfIntentsIncluded = true;
                Function&&Function.prototype&&Function.prototype.bind&&(/MSIE ([6789]|10)/.test(navigator.userAgent)||(window.__twttr&&window.__twttr.widgets&&window.__twttr.widgets.loaded&&window.twttr.widgets.load&&window.twttr.widgets.load(),window.__twttr&&window.__twttr.widgets&&window.__twttr.widgets.init||function(t){function e(e){for(var n,i,o=e[0],s=e[1],a=0,c=[];a<o.length;a++)i=o[a],r[i]&&c.push(r[i][0]),r[i]=0;for(n in s)Object.prototype.hasOwnProperty.call(s,n)&&(t[n]=s[n]);for(u&&u(e);c.length;)c.shift()()}var n={},r={1:0};function i(e){if(n[e])return n[e].exports;var r=n[e]={i:e,l:!1,exports:{}};return t[e].call(r.exports,r,r.exports,i),r.l=!0,r.exports}i.e=function(t){var e=[],n=r[t];if(0!==n)if(n)e.push(n[2]);else{var o=new Promise(function(e,i){n=r[t]=[e,i]});e.push(n[2]=o);var s,a=document.getElementsByTagName("head")[0],u=document.createElement("script");u.charset="utf-8",u.timeout=120,i.nc&&u.setAttribute("nonce",i.nc),u.src=function(t){return i.p+"js/"+({0:"moment~timeline~tweet",2:"dm_button",3:"button",4:"moment",5:"periscope_on_air",6:"timeline",7:"tweet"}[t]||t)+"."+{0:"ec04a6cb5ba879d0e0db41f211639fdf",2:"6542a7407a2eccac51f5c5e0fac5bb80",3:"d941c9a422e2e3faf474b82a1f39e936",4:"0a3cc02317b85399478995c763a1296c",5:"d26526abe761c4d8d8d71cf0ec565649",6:"0a7b4db67eacd23e35c5ce02e6ea3470",7:"b2d749028be81f16d9cb4994d9692feb"}[t]+".js"}(t),s=function(e){u.onerror=u.onload=null,clearTimeout(c);var n=r[t];if(0!==n){if(n){var i=e&&("load"===e.type?"missing":e.type),o=e&&e.target&&e.target.src,s=new Error("Loading chunk "+t+" failed.\n("+i+": "+o+")");s.type=i,s.request=o,n[1](s)}r[t]=void 0}};var c=setTimeout(function(){s({type:"timeout",target:u})},12e4);u.onerror=u.onload=s,a.appendChild(u)}return Promise.all(e)},i.m=t,i.c=n,i.d=function(t,e,n){i.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:n})},i.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},i.t=function(t,e){if(1&e&&(t=i(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var n=Object.create(null);if(i.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var r in t)i.d(n,r,function(e){return t[e]}.bind(null,r));return n},i.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return i.d(e,"a",e),e},i.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},i.p="https://platform.twitter.com/",i.oe=function(t){throw console.error(t),t};var o=window.__twttrll=window.__twttrll||[],s=o.push.bind(o);o.push=e,o=o.slice();for(var a=0;a<o.length;a++)e(o[a]);var u=s;i(i.s=94)}([function(t,e,n){var r=n(1);function i(t,e){var n;for(n in t)t.hasOwnProperty&&!t.hasOwnProperty(n)||e(n,t[n]);return t}function o(t){return{}.toString.call(t).match(/\s([a-zA-Z]+)/)[1].toLowerCase()}function s(t){return t===Object(t)}function a(t){var e;if(!s(t))return!1;if(Object.keys)return!Object.keys(t).length;for(e in t)if(t.hasOwnProperty(e))return!1;return!0}function u(t){return t?Array.prototype.slice.call(t):[]}t.exports={aug:function(t){return u(arguments).slice(1).forEach(function(e){i(e,function(e,n){t[e]=n})}),t},async:function(t,e){r.setTimeout(function(){t.call(e||null)},0)},compact:function t(e){return i(e,function(n,r){s(r)&&(t(r),a(r)&&delete e[n]),void 0!==r&&null!==r&&""!==r||delete e[n]}),e},contains:function(t,e){return!(!t||!t.indexOf)&&t.indexOf(e)>-1},forIn:i,isObject:s,isEmptyObject:a,toType:o,isType:function(t,e){return t==o(e)},toRealArray:u}},function(t,e){t.exports=window},function(t,e,n){var r=n(6);t.exports=function(){var t=this;this.promise=new r(function(e,n){t.resolve=e,t.reject=n})}},function(t,e,n){var r=n(11),i=/(?:^|(?:https?:)?\/\/(?:www\.)?twitter\.com(?::\d+)?(?:\/intent\/(?:follow|user)\/?\?screen_name=|(?:\/#!)?\/))@?([\w]+)(?:\?|&|$)/i,o=/(?:^|(?:https?:)?\/\/(?:www\.)?twitter\.com(?::\d+)?\/(?:#!\/)?[\w_]+\/status(?:es)?\/)(\d+)/i,s=/^http(s?):\/\/(\w+\.)*twitter\.com([:/]|$)/i,a=/^http(s?):\/\/pbs\.twimg\.com\//,u=/^#?([^.,<>!\s/#\-()'"]+)$/,c=/twitter\.com(?::\d{2,4})?\/intent\/(\w+)/,d=/^https?:\/\/(?:www\.)?twitter\.com\/\w+\/timelines\/(\d+)/i,l=/^https?:\/\/(?:www\.)?twitter\.com\/i\/moments\/(\d+)/i,f=/^https?:\/\/(?:www\.)?twitter\.com\/(\w+)\/(?:likes|favorites)/i,h=/^https?:\/\/(?:www\.)?twitter\.com\/(\w+)\/lists\/([\w-%]+)/i,p=/^https?:\/\/(?:www\.)?twitter\.com\/i\/live\/(\d+)/i,m=/^https?:\/\/syndication\.twitter\.com\/settings/i,v=/^https?:\/\/(localhost|platform)\.twitter\.com(?::\d+)?\/widgets\/widget_iframe\.(.+)/i,g=/^https?:\/\/(?:www\.)?twitter\.com\/search\?q=(\w+)/i;function w(t){return"string"==typeof t&&i.test(t)&&RegExp.$1.length<=20}function y(t){if(w(t))return RegExp.$1}function b(t,e){var n=r.decodeURL(t);if(e=e||!1,n.screen_name=y(t),n.screen_name)return r.url("https://twitter.com/intent/"+(e?"follow":"user"),n)}function _(t){return"string"==typeof t&&u.test(t)}function E(t){return"string"==typeof t&&o.test(t)}t.exports={isHashTag:_,hashTag:function(t,e){if(e=void 0===e||e,_(t))return(e?"#":"")+RegExp.$1},isScreenName:w,screenName:y,isStatus:E,status:function(t){return E(t)&&RegExp.$1},intentForProfileURL:b,intentForFollowURL:function(t){return b(t,!0)},isTwitterURL:function(t){return s.test(t)},isTwimgURL:function(t){return a.test(t)},isIntentURL:function(t){return c.test(t)},isSettingsURL:function(t){return m.test(t)},isWidgetIframeURL:function(t){return v.test(t)},isSearchUrl:function(t){return g.test(t)},regexen:{profile:i},momentId:function(t){return l.test(t)&&RegExp.$1},collectionId:function(t){return d.test(t)&&RegExp.$1},intentType:function(t){return c.test(t)&&RegExp.$1},likesScreenName:function(t){return f.test(t)&&RegExp.$1},listScreenNameAndSlug:function(t){var e,n,r;if(h.test(t)){e=RegExp.$1,n=RegExp.$2;try{r=decodeURIComponent(n)}catch(t){}return{ownerScreenName:e,slug:r||n}}return!1},eventId:function(t){return p.test(t)&&RegExp.$1}}},function(t,e){t.exports=document},function(t,e,n){var r=n(0),i=[!0,1,"1","on","ON","true","TRUE","yes","YES"],o=[!1,0,"0","off","OFF","false","FALSE","no","NO"];function s(t){return void 0!==t&&null!==t&&""!==t}function a(t){return c(t)&&t%1==0}function u(t){return c(t)&&!a(t)}function c(t){return s(t)&&!isNaN(t)}function d(t){return r.contains(o,t)}function l(t){return r.contains(i,t)}t.exports={hasValue:s,isInt:a,isFloat:u,isNumber:c,isString:function(t){return"string"===r.toType(t)},isArray:function(t){return s(t)&&"array"==r.toType(t)},isTruthValue:l,isFalseValue:d,asInt:function(t){if(a(t))return parseInt(t,10)},asFloat:function(t){if(u(t))return t},asNumber:function(t){if(c(t))return t},asBoolean:function(t){return!(!s(t)||!l(t)&&(d(t)||!t))}}},function(t,e,n){var r=n(1),i=n(21),o=n(48);i.hasPromiseSupport()||(r.Promise=o),t.exports=r.Promise},function(t,e,n){var r=n(0);t.exports=function(t,e){var n=Array.prototype.slice.call(arguments,2);return function(){var i=r.toRealArray(arguments);return t.apply(e,n.concat(i))}}},function(t,e){t.exports=location},function(t,e,n){var r=n(50);t.exports=new r("__twttr")},function(t,e,n){var r=n(0),i=/\b([\w-_]+)\b/g;function o(t){return new RegExp("\\b"+t+"\\b","g")}function s(t,e){t.classList?t.classList.add(e):o(e).test(t.className)||(t.className+=" "+e)}function a(t,e){t.classList?t.classList.remove(e):t.className=t.className.replace(o(e)," ")}function u(t,e){return t.classList?t.classList.contains(e):r.contains(c(t),e)}function c(t){return r.toRealArray(t.classList?t.classList:t.className.match(i))}t.exports={add:s,remove:a,replace:function(t,e,n){if(t.classList&&u(t,e))return a(t,e),void s(t,n);t.className=t.className.replace(o(e),n)},toggle:function(t,e,n){return void 0===n&&t.classList&&t.classList.toggle?t.classList.toggle(e,n):(n?s(t,e):a(t,e),n)},present:u,list:c}},function(t,e,n){var r=n(5),i=n(0);function o(t){return encodeURIComponent(t).replace(/\+/g,"%2B").replace(/'/g,"%27")}function s(t){return decodeURIComponent(t)}function a(t){var e=[];return i.forIn(t,function(t,n){var s=o(t);i.isType("array",n)||(n=[n]),n.forEach(function(t){r.hasValue(t)&&e.push(s+"="+o(t))})}),e.sort().join("&")}function u(t){var e={};return t?(t.split("&").forEach(function(t){var n=t.split("="),r=s(n[0]),o=s(n[1]);if(2==n.length){if(!i.isType("array",e[r]))return r in e?(e[r]=[e[r]],void e[r].push(o)):void(e[r]=o);e[r].push(o)}}),e):{}}t.exports={url:function(t,e){return a(e).length>0?i.contains(t,"?")?t+"&"+a(e):t+"?"+a(e):t},decodeURL:function(t){var e=t&&t.split("?");return 2==e.length?u(e[1]):{}},decode:u,encode:a,encodePart:o,decodePart:s}},function(t,e,n){var r=n(8),i=n(1),o=n(0),s={},a=o.contains(r.href,"tw_debug=true");function u(){}function c(){}function d(){return i.performance&&+i.performance.now()||+new Date}function l(t,e){if(i.console&&i.console[t])switch(e.length){case 1:i.console[t](e[0]);break;case 2:i.console[t](e[0],e[1]);break;case 3:i.console[t](e[0],e[1],e[2]);break;case 4:i.console[t](e[0],e[1],e[2],e[3]);break;case 5:i.console[t](e[0],e[1],e[2],e[3],e[4]);break;default:0!==e.length&&i.console.warn&&i.console.warn("too many params passed to logger."+t)}}t.exports={devError:u,devInfo:c,devObject:function(t,e){},publicError:function(){l("error",o.toRealArray(arguments))},publicLog:function(){l("info",o.toRealArray(arguments))},time:function(t){a&&(s[t]=d())},timeEnd:function(t){a&&s[t]&&(d(),s[t])}}},function(t,e,n){var r=n(20),i=n(5),o=n(11),s=n(0),a=n(119);t.exports=function(t){var e=t.href&&t.href.split("?")[1],n=e?o.decode(e):{},u={lang:a(t),width:t.getAttribute("data-width")||t.getAttribute("width"),height:t.getAttribute("data-height")||t.getAttribute("height"),related:t.getAttribute("data-related"),partner:t.getAttribute("data-partner")};return i.asBoolean(t.getAttribute("data-dnt"))&&r.setOn(),s.forIn(u,function(t,e){var r=n[t];n[t]=i.hasValue(r)?r:e}),s.compact(n)}},function(t,e,n){var r=n(81),i=n(23);t.exports=function(){var t="data-twitter-extracted-"+i.generate();return function(e,n){return r(e,n).filter(function(e){return!e.hasAttribute(t)}).map(function(e){return e.setAttribute(t,"true"),e})}}},function(t,e){function n(t,e,n,r,i,o,s){this.factory=t,this.Sandbox=e,this.srcEl=o,this.targetEl=i,this.parameters=r,this.className=n,this.options=s}n.prototype.destroy=function(){this.srcEl=this.targetEl=null},t.exports=n},function(t,e){t.exports={DM_BUTTON:"twitter-dm-button",FOLLOW_BUTTON:"twitter-follow-button",HASHTAG_BUTTON:"twitter-hashtag-button",MENTION_BUTTON:"twitter-mention-button",MOMENT:"twitter-moment",PERISCOPE:"periscope-on-air",SHARE_BUTTON:"twitter-share-button",TIMELINE:"twitter-timeline",TWEET:"twitter-tweet"}},function(t,e,n){var r=n(6),i=n(20),o=n(53),s=n(52),a=n(35),u=n(5),c=n(0);t.exports=function(t,e,n){var d;return t=t||[],e=e||{},d="ƒ("+t.join(", ")+", target, [options]);",function(){var l,f,h,p,m=Array.prototype.slice.apply(arguments,[0,t.length]),v=Array.prototype.slice.apply(arguments,[t.length]);return v.forEach(function(t){t&&(t.nodeType!==Node.ELEMENT_NODE?c.isType("function",t)?l=t:c.isType("object",t)&&(f=t):h=t)}),m.length!==t.length||0===v.length?(l&&c.async(function(){l(!1)}),r.reject(new Error("Not enough parameters. Expected: "+d))):h?(f=c.aug({},f||{},e),t.forEach(function(t){f[t]=m.shift()}),u.asBoolean(f.dnt)&&i.setOn(),p=a.getExperiments().then(function(t){return o.addWidget(n(f,h,void 0,s.isHorizonTweetEnabled(t)))}),l&&p.then(l,function(){l(!1)}),p):(l&&c.async(function(){l(!1)}),r.reject(new Error("No target element specified. Expected: "+d)))}}},function(t,e,n){var r=n(102),i=n(2),o=n(0);function s(t,e){return function(){try{e.resolve(t.call(this))}catch(t){e.reject(t)}}}t.exports={sync:function(t,e){t.call(e)},read:function(t,e){var n=new i;return r.read(s(t,n),e),n.promise},write:function(t,e){var n=new i;return r.write(s(t,n),e),n.promise},defer:function(t,e,n){var a=new i;return o.isType("function",t)&&(n=e,e=t,t=1),r.defer(t,s(e,a),n),a.promise}}},function(t,e,n){var r=n(9),i=["https://syndication.twitter.com","https://cdn.syndication.twimg.com","https://localhost.twitter.com:8444"],o=["https://syndication.twitter.com","https://localhost.twitter.com:8445"],s=["https://platform.twitter.com/embed/index.html","https://localhost.twitter.com:8080",/https:\/\/ton\.smf1\.twitter\.com\/syndication-internal\/embed-iframe\/[0-9A-Za-z_-]+\/app\/index\.html/],a=function(t,e){return t.some(function(t){return t instanceof RegExp?t.test(e):t===e})},u=function(){var t=r.get("backendHost");return t&&a(i,t)?t:"https://cdn.syndication.twimg.com"},c=function(){var t=r.get("settingsSvcHost");return t&&a(o,t)?t:"https://syndication.twitter.com"},d=function(){var t=r.get("embedIframeURL");return t&&a(s,t)?t:"https://platform.twitter.com/embed/index.html"};function l(t,e){var n=[t];return e.forEach(function(t){n.push(function(t){var e=(t||"").toString(),n="/"===e.slice(0,1)?1:0,r=function(t){return"/"===t.slice(-1)}(e)?-1:void 0;return e.slice(n,r)}(t))}),n.join("/")}t.exports={cookieConsent:function(t){var e=t||[];return e.unshift("cookie/consent"),l(c(),e)},embedIframe:function(){return d()},eventVideo:function(t){var e=t||[];return e.unshift("video/event"),l(u(),e)},grid:function(t){var e=t||[];return e.unshift("grid/collection"),l(u(),e)},moment:function(t){var e=t||[];return e.unshift("moments"),l(u(),e)},settings:function(t){var e=t||[];return e.unshift("settings"),l(c(),e)},timeline:function(t){var e=t||[];return e.unshift("timeline"),l(u(),e)},tweetBatch:function(t){var e=t||[];return e.unshift("tweets.json"),l(u(),e)},video:function(t){var e=t||[];return e.unshift("widgets/video"),l(u(),e)}}},function(t,e,n){var r=n(4),i=n(8),o=n(38),s=n(79),a=n(5),u=n(33),c=!1,d=/https?:\/\/([^/]+).*/i;t.exports={setOn:function(){c=!0},enabled:function(t,e){return!!(c||a.asBoolean(u.val("dnt"))||s.isUrlSensitive(e||i.host)||o.isFramed()&&s.isUrlSensitive(o.rootDocumentLocation())||(t=d.test(t||r.referrer)&&RegExp.$1)&&s.isUrlSensitive(t))}}},function(t,e,n){var r=n(4),i=n(12),o=n(95),s=n(1),a=n(0),u=o.userAgent;function c(t){return/(Trident|MSIE|Edge[/ ]?\d)/.test(t=t||u)}t.exports={retina:function(t){return(t=t||s).devicePixelRatio?t.devicePixelRatio>=1.5:!!t.matchMedia&&t.matchMedia("only screen and (min-resolution: 144dpi)").matches},anyIE:c,ie9:function(t){return/MSIE 9/.test(t=t||u)},ie10:function(t){return/MSIE 10/.test(t=t||u)},ios:function(t){return/(iPad|iPhone|iPod)/.test(t=t||u)},android:function(t){return/^Mozilla\/5\.0 \(Linux; (U; )?Android/.test(t=t||u)},canPostMessage:function(t,e){return t=t||s,e=e||u,t.postMessage&&!(c(e)&&t.opener)},touch:function(t,e,n){return t=t||s,e=e||o,n=n||u,"ontouchstart"in t||/Opera Mini/.test(n)||e.msMaxTouchPoints>0},cssTransitions:function(){var t=r.body.style;return void 0!==t.transition||void 0!==t.webkitTransition||void 0!==t.mozTransition||void 0!==t.oTransition||void 0!==t.msTransition},hasPromiseSupport:function(){return!!(s.Promise&&s.Promise.resolve&&s.Promise.reject&&s.Promise.all&&s.Promise.race&&(new s.Promise(function(e){t=e}),a.isType("function",t)));var t},hasIntersectionObserverSupport:function(){return!!s.IntersectionObserver},hasPerformanceInformation:function(){return s.performance&&s.performance.getEntriesByType},hasLocalStorageSupport:function(){try{return s.localStorage.setItem("local_storage_support_test","true"),void 0!==s.localStorage}catch(t){return i.devError("window.localStorage is not supported:",t),!1}}}},function(t,e,n){var r=n(6),i=n(2);function o(t,e){return t.then(e,e)}function s(t){return t instanceof r}t.exports={always:o,allResolved:function(t){var e;return void 0===t?r.reject(new Error("undefined is not an object")):Array.isArray(t)?(e=t.length)?new r(function(n,r){var i=0,o=[];function a(){(i+=1)===e&&(0===o.length?r():n(o))}function u(t){o.push(t),a()}t.forEach(function(t){s(t)?t.then(u,a):u(t)})}):r.resolve([]):r.reject(new Error("Type error"))},some:function(t){var e;return e=(t=t||[]).length,t=t.filter(s),e?e!==t.length?r.reject("non-Promise passed to .some"):new r(function(e,n){var r=0;function i(){(r+=1)===t.length&&n()}t.forEach(function(t){t.then(e,i)})}):r.reject("no promises passed to .some")},isPromise:s,allSettled:function(t){function e(){}return r.all((t||[]).map(function(t){return o(t,e)}))},timeout:function(t,e){var n=new i;return setTimeout(function(){n.reject(new Error("Promise timed out"))},e),t.then(function(t){n.resolve(t)},function(t){n.reject(t)}),n.promise}}},function(t,e){var n="i",r=0,i=0;t.exports={generate:function(){return n+String(+new Date)+Math.floor(1e5*Math.random())+r++},deterministic:function(){return n+String(i++)}}},function(t,e,n){var r=n(49),i=n(51),o=n(0);t.exports=o.aug(r.get("events")||{},i.Emitter)},function(t,e,n){var r=n(26),i=n(110);t.exports=r.build([i])},function(t,e,n){var r=n(40),i=n(107),o=n(7);(r=Object.create(r)).build=o(r.build,null,i),t.exports=r},function(t,e,n){var r=n(40),i=n(41),o=n(7);(r=Object.create(r)).build=o(r.build,null,i),t.exports=r},function(t,e,n){var r=n(83),i=n(75),o=n(84),s=n(8),a=n(71),u=n(74),c=n(20),d=n(5),l=n(23),f=n(0);function h(t){if(!t||!t.headers)throw new Error("unexpected response schema");return{html:t.body,config:t.config,pollInterval:1e3*parseInt(t.headers.xPolling,10)||null,maxCursorPosition:t.headers.maxPosition,minCursorPosition:t.headers.minPosition}}function p(t){if(t&&t.headers)throw new Error(t.headers.status);throw t instanceof Error?t:new Error(t)}t.exports=function(t){t.params({instanceId:{required:!0,fallback:l.deterministic},lang:{required:!0,transform:a.matchLanguage,fallback:"en"},tweetLimit:{transform:d.asInt}}),t.defineProperty("endpoint",{get:function(){throw new Error("endpoint not specified")}}),t.defineProperty("pollEndpoint",{get:function(){return this.endpoint}}),t.define("cbId",function(t){var e=t?"_new":"_old";return"tl_"+this.params.instanceId+"_"+this.id+e}),t.define("queryParams",function(){return{lang:this.params.lang,tz:u.getTimezoneOffset(),t:r(),domain:s.host,tweet_limit:this.params.tweetLimit,dnt:c.enabled()}}),t.define("fetch",function(){return i.fetch(this.endpoint,this.queryParams(),o,this.cbId()).then(h,p)}),t.define("poll",function(t,e){var n,r;return n={since_id:(t=t||{}).sinceId,max_id:t.maxId,min_position:t.minPosition,max_position:t.maxPosition},r=f.aug(this.queryParams(),n),i.fetch(this.pollEndpoint,r,o,this.cbId(e)).then(h,p)})}},function(t,e,n){var r=n(51).makeEmitter();t.exports={emitter:r,START:"start",ALL_WIDGETS_RENDER_START:"all_widgets_render_start",ALL_WIDGETS_RENDER_END:"all_widgets_render_end",ALL_WIDGETS_AND_IMAGES_LOADED:"all_widgets_and_images_loaded"}},function(t,e,n){var r=n(4),i=n(0);t.exports=function(t,e,n){var o;if(n=n||r,t=t||{},e=e||{},t.name){try{o=n.createElement('<iframe name="'+t.name+'"></iframe>')}catch(e){(o=n.createElement("iframe")).name=t.name}delete t.name}else o=n.createElement("iframe");return t.id&&(o.id=t.id,delete t.id),o.allowtransparency="true",o.scrolling="no",o.setAttribute("frameBorder",0),o.setAttribute("allowTransparency",!0),i.forIn(t,function(t,e){o.setAttribute(t,e)}),i.forIn(e,function(t,e){o.style[t]=e}),o}},function(t,e,n){var r=n(1).JSON;t.exports={stringify:r.stringify||r.encode,parse:r.parse||r.decode}},function(t,e,n){var r=n(0),i=n(43);t.exports={closest:function t(e,n,o){var s;if(n)return o=o||n&&n.ownerDocument,s=r.isType("function",e)?e:function(t){return function(e){return!!e.tagName&&i(e,t)}}(e),n===o?s(n)?n:void 0:s(n)?n:t(s,n.parentNode,o)}}},function(t,e,n){var r,i=n(4);function o(t){var e,n,o,s=0;for(r={},e=(t=t||i).getElementsByTagName("meta");e[s];s++){if(n=e[s],/^twitter:/.test(n.getAttribute("name")))o=n.getAttribute("name").replace(/^twitter:/,"");else{if(!/^twitter:/.test(n.getAttribute("property")))continue;o=n.getAttribute("property").replace(/^twitter:/,"")}r[o]=n.getAttribute("content")||n.getAttribute("value")}}o(),t.exports={init:o,val:function(t){return r[t]}}},function(t,e,n){var r=n(4),i=n(31),o=n(20),s=n(0),a=n(44),u=n(9),c=n(3),d=n(32),l=a.version,f=u.get("clientEventEndpoint")||"https://syndication.twitter.com/i/jot",h=1;function p(t){return s.aug({client:"tfw"},t||{})}function m(t,e,n){return e=e||{},s.aug({},e,{_category_:t,triggered_on:e.triggered_on||+new Date,dnt:o.enabled(n)})}t.exports={extractTermsFromDOM:function t(e,n){var r;return n=n||{},e&&e.nodeType===Node.ELEMENT_NODE?((r=e.getAttribute("data-scribe"))&&r.split(" ").forEach(function(t){var e=t.trim().split(":"),r=e[0],i=e[1];r&&i&&!n[r]&&(n[r]=i)}),t(e.parentNode,n)):n},clickEventElement:function(t){var e=d.closest("[data-expanded-url]",t),n=e&&e.getAttribute("data-expanded-url");return n&&c.isTwitterURL(n)?"twitter_url":"url"},flattenClientEventPayload:function(t,e){return s.aug({},e,{event_namespace:t})},formatGenericEventData:m,formatClientEventData:function(t,e,n){var i=t&&t.widget_origin||r.referrer;return(t=m("tfw_client_event",t,i)).client_version=l,t.format_version=void 0!==n?n:1,e||(t.widget_origin=i),t},formatClientEventNamespace:p,formatTweetAssociation:function(t,e){var n={};return(e=e||{}).association_namespace=p(t),n[h]=e,n},noticeSeen:function(t){return"notice"===t.element&&"seen"===t.action},splitLogEntry:function(t){var e,n,r,i,o;return t.item_ids&&t.item_ids.length>1?(e=Math.floor(t.item_ids.length/2),n=t.item_ids.slice(0,e),r={},i=t.item_ids.slice(e),o={},n.forEach(function(e){r[e]=t.item_details[e]}),i.forEach(function(e){o[e]=t.item_details[e]}),[s.aug({},t,{item_ids:n,item_details:r}),s.aug({},t,{item_ids:i,item_details:o})]):[t]},stringify:function(t){var e,n=Array.prototype.toJSON;return delete Array.prototype.toJSON,e=i.stringify(t),n&&(Array.prototype.toJSON=n),e},AUDIENCE_ENDPOINT:"https://syndication.twitter.com/i/jot/syndication",CLIENT_EVENT_ENDPOINT:f,RUFOUS_REDIRECT:"https://platform.twitter.com/jot.html"}},function(t,e,n){var r=n(113),i=n(116);function o(t){return r.settingsLoaded().then(function(e){return e[t]})}function s(){return o("experiments")}t.exports={shouldObtainCookieConsent:function(){return o("shouldObtainCookieConsent")},getExperiments:s,getExperiment:function(t){return s().then(function(e){if(!e[t])throw new Error("Experiment not found");return e[t]})},getActiveExperimentDataString:function(){return s().then(function(t){var e=Object.keys(t).reduce(function(e,n){var r;return t[n].version&&(r=n.split("_").slice(-1)[0],e.push(r+";"+t[n].bucket)),e},[]);return i(e.join(","))})},getExperimentKeys:function(){return s().then(function(t){return Object.keys(t)})},load:function(){r.load()}}},function(t,e,n){var r=n(10),i={},o=-1,s={};function a(t){var e=t.getAttribute("data-twitter-event-id");return e||(t.setAttribute("data-twitter-event-id",++o),o)}function u(t,e,n){var r=0,i=t&&t.length||0;for(r=0;r<i;r++)if(t[r].call(e,n,e),n.ceaseImmediately)return!1}function c(t,e,n){for(var i=n||t.target||t.srcElement,o=r.list(i).map(function(t){return"."+t}).concat(i.tagName),s=0,a=o.length;s<a;s++)if(!1===u(e[o[s]],i,t))return;t.cease||i!==this&&c.call(this,t,e,i.parentElement||i.parentNode)}function d(t,e,n,r){function i(r){c.call(t,r,n[e])}!function(t,e,n,r){t.id&&(s[t.id]=s[t.id]||[],s[t.id].push({el:t,listener:e,type:n,rootId:r}))}(t,i,e,r),t.addEventListener(e,i,!1)}function l(t){t&&t.preventDefault?t.preventDefault():t.returnValue=!1}function f(t){t&&(t.cease=!0)&&t.stopPropagation?t.stopPropagation():t.cancelBubble=!0}t.exports={stop:function(t){return f(t),l(t),!1},stopPropagation:f,stopImmediatePropagation:function(t){t&&(t.ceaseImmediately=!0,f(t),t.stopImmediatePropagation())},preventDefault:l,delegate:function(t,e,n,r){var o=a(t);i[o]=i[o]||{},i[o][e]||(i[o][e]={},d(t,e,i[o],o)),i[o][e][n]=i[o][e][n]||[],i[o][e][n].push(r)},simulate:function(t,e,n){var r=a(e),o=i[r]&&i[r];c.call(e,{target:n},o[t])},removeDelegatesForWidget:function(t){var e=s[t];e&&(e.forEach(function(t){t.el.removeEventListener(t.type,t.listener,!1),delete i[t.rootId]}),delete s[t])}}},function(t,e,n){var r=n(26),i=n(125);t.exports=r.build([i])},function(t,e,n){var r=n(8),i=n(78),o=n(0),s=i.getCanonicalURL()||r.href,a=s;t.exports={isFramed:function(){return s!==a},rootDocumentLocation:function(t){return t&&o.isType("string",t)&&(s=t),s},currentDocumentLocation:function(){return a}}},function(t,e,n){var r=n(77),i=n(104),o=n(80),s=n(34),a=new(n(112))(function(t){var e,n,a;if(0!==t.length){if(u(t))return c(t);e=r(t,function(t){return s.noticeSeen(t.input.namespace)}),n=e.true,a=e.false,n&&n.length>0&&(n=n.slice(0,1),o.canFlushOneItem(n[0])||(n[0].input.data.message=""),c(n)),a&&(u(a)?c:function(t){i.init(),t.forEach(function(t){var e=t.input.namespace,n=t.input.data,r=t.input.offsite,o=t.input.version;i.clientEvent(e,n,r,o)}),i.flush().then(function(){t.forEach(function(t){t.taskDoneDeferred.resolve()})},function(){t.forEach(function(t){t.taskDoneDeferred.reject()})})})(a)}});function u(t){return 1===t.length&&o.canFlushOneItem(t[0])}function c(t){t.forEach(function(t){var e=t.input.namespace,n=t.input.data,r=t.input.offsite,i=t.input.version;o.clientEvent(e,n,r,i),t.taskDoneDeferred.resolve()})}t.exports={scribe:function(t,e,n,r){return a.add({namespace:t,data:e,offsite:n,version:r})},pause:function(){a.pause()},resume:function(){a.resume()}}},function(t,e,n){var r=n(105),i=n(106),o=n(0);t.exports={couple:function(){return o.toRealArray(arguments)},build:function(t,e,n){var o=new t;return(e=i(r(e||[]))).forEach(function(t){t.call(null,o)}),o.build(n)}}},function(t,e,n){var r=n(108),i=n(0),o=n(42);function s(){this.Component=this.factory(),this._adviceArgs=[],this._lastArgs=[]}i.aug(s.prototype,{factory:o,build:function(t){var e=this;return this.Component,i.aug(this.Component.prototype.boundParams,t),this._adviceArgs.concat(this._lastArgs).forEach(function(t){(function(t,e,n){var r=this[e];if(!r)throw new Error(e+" does not exist");this[e]=t(r,n)}).apply(e.Component.prototype,t)}),delete this._lastArgs,delete this._adviceArgs,this.Component},params:function(t){var e=this.Component.prototype.paramConfigs;t=t||{},this.Component.prototype.paramConfigs=i.aug({},t,e)},define:function(t,e){if(t in this.Component.prototype)throw new Error(t+" has previously been defined");this.override(t,e)},defineStatic:function(t,e){this.Component[t]=e},override:function(t,e){this.Component.prototype[t]=e},defineProperty:function(t,e){if(t in this.Component.prototype)throw new Error(t+" has previously been defined");this.overrideProperty(t,e)},overrideProperty:function(t,e){var n=i.aug({configurable:!0},e);Object.defineProperty(this.Component.prototype,t,n)},before:function(t,e){this._adviceArgs.push([r.before,t,e])},after:function(t,e){this._adviceArgs.push([r.after,t,e])},around:function(t,e){this._adviceArgs.push([r.around,t,e])},last:function(t,e){this._lastArgs.push([r.after,t,e])}}),t.exports=s},function(t,e,n){var r=n(0);function i(){return!0}function o(t){return t}t.exports=function(){function t(t){var e=this;t=t||{},this.params=Object.keys(this.paramConfigs).reduce(function(n,s){var a=[],u=e.boundParams,c=e.paramConfigs[s],d=c.validate||i,l=c.transform||o;if(s in u&&a.push(u[s]),s in t&&a.push(t[s]),a="fallback"in c?a.concat(c.fallback):a,n[s]=function(t,e,n){var i=null;return t.some(function(t){if(t=r.isType("function",t)?t():t,e(t))return i=n(t),!0}),i}(a,d,l),c.required&&null==n[s])throw new Error(s+" is a required parameter");return n},{}),this.initialize()}return r.aug(t.prototype,{paramConfigs:{},boundParams:{},initialize:function(){}}),t}},function(t,e,n){var r=n(1).HTMLElement,i=r.prototype.matches||r.prototype.matchesSelector||r.prototype.webkitMatchesSelector||r.prototype.mozMatchesSelector||r.prototype.msMatchesSelector||r.prototype.oMatchesSelector;t.exports=function(t,e){if(i)return i.call(t,e)}},function(t){t.exports={version:"2a81c84:1568701398616"}},function(t,e,n){var r,i=n(10),o=n(4),s=n(1),a=n(33),u=n(54),c=n(5),d=n(23),l="csptest";t.exports={inlineStyle:function(){var t=l+d.generate(),e=o.createElement("div"),n=o.createElement("style"),f="."+t+" { visibility: hidden; }";return!!o.body&&(c.asBoolean(a.val("widgets:csp"))&&(r=!1),void 0!==r?r:(e.style.display="none",i.add(e,t),n.type="text/css",n.appendChild(o.createTextNode(f)),o.body.appendChild(n),o.body.appendChild(e),r="hidden"===s.getComputedStyle(e).visibility,u(e),u(n),r))}}},function(t,e,n){var r=n(1);t.exports=function(t,e,n){var i,o=0;return n=n||null,function s(){var a=n||this,u=arguments,c=+new Date;if(r.clearTimeout(i),c-o>e)return o=c,void t.apply(a,u);i=r.setTimeout(function(){s.apply(a,u)},e)}}},function(t,e){t.exports=function(t){var e=t.getBoundingClientRect();return{width:e.width,height:e.height}}},function(t,e,n){
                    /*!
                     * @overview es6-promise - a tiny implementation of Promises/A+.
                     * @copyright Copyright (c) 2014 Yehuda Katz, Tom Dale, Stefan Penner and contributors (Conversion to ES6 API by Jake Archibald)
                     * @license   Licensed under MIT license
                     *            See https://raw.githubusercontent.com/stefanpenner/es6-promise/master/LICENSE
                     * @version   v4.2.5+7f2b526d
                     */var r;r=function(){"use strict";function t(t){return"function"==typeof t}var e=Array.isArray?Array.isArray:function(t){return"[object Array]"===Object.prototype.toString.call(t)},n=0,r=void 0,i=void 0,o=function(t,e){f[n]=t,f[n+1]=e,2===(n+=2)&&(i?i(h):w())},s="undefined"!=typeof window?window:void 0,a=s||{},u=a.MutationObserver||a.WebKitMutationObserver,c="undefined"==typeof self&&"undefined"!=typeof process&&"[object process]"==={}.toString.call(process),d="undefined"!=typeof Uint8ClampedArray&&"undefined"!=typeof importScripts&&"undefined"!=typeof MessageChannel;function l(){var t=setTimeout;return function(){return t(h,1)}}var f=new Array(1e3);function h(){for(var t=0;t<n;t+=2)(0,f[t])(f[t+1]),f[t]=void 0,f[t+1]=void 0;n=0}var p,m,v,g,w=void 0;function y(t,e){var n=this,r=new this.constructor(E);void 0===r[_]&&k(r);var i=n._state;if(i){var s=arguments[i-1];o(function(){return D(i,r,s,n._result)})}else I(n,r,t,e);return r}function b(t){if(t&&"object"==typeof t&&t.constructor===this)return t;var e=new this(E);return C(e,t),e}c?w=function(){return process.nextTick(h)}:u?(m=0,v=new u(h),g=document.createTextNode(""),v.observe(g,{characterData:!0}),w=function(){g.data=m=++m%2}):d?((p=new MessageChannel).port1.onmessage=h,w=function(){return p.port2.postMessage(0)}):w=void 0===s?function(){try{var t=Function("return this")().require("vertx");return void 0!==(r=t.runOnLoop||t.runOnContext)?function(){r(h)}:l()}catch(t){return l()}}():l();var _=Math.random().toString(36).substring(2);function E(){}var x=void 0,T=1,A=2,S={error:null};function R(t){try{return t.then}catch(t){return S.error=t,S}}function N(e,n,r){n.constructor===e.constructor&&r===y&&n.constructor.resolve===b?function(t,e){e._state===T?L(t,e._result):e._state===A?j(t,e._result):I(e,void 0,function(e){return C(t,e)},function(e){return j(t,e)})}(e,n):r===S?(j(e,S.error),S.error=null):void 0===r?L(e,n):t(r)?function(t,e,n){o(function(t){var r=!1,i=function(t,e,n,r){try{t.call(e,n,r)}catch(t){return t}}(n,e,function(n){r||(r=!0,e!==n?C(t,n):L(t,n))},function(e){r||(r=!0,j(t,e))},t._label);!r&&i&&(r=!0,j(t,i))},t)}(e,n,r):L(e,n)}function C(t,e){var n,r;t===e?j(t,new TypeError("You cannot resolve a promise with itself")):(r=typeof(n=e),null===n||"object"!==r&&"function"!==r?L(t,e):N(t,e,R(e)))}function P(t){t._onerror&&t._onerror(t._result),O(t)}function L(t,e){t._state===x&&(t._result=e,t._state=T,0!==t._subscribers.length&&o(O,t))}function j(t,e){t._state===x&&(t._state=A,t._result=e,o(P,t))}function I(t,e,n,r){var i=t._subscribers,s=i.length;t._onerror=null,i[s]=e,i[s+T]=n,i[s+A]=r,0===s&&t._state&&o(O,t)}function O(t){var e=t._subscribers,n=t._state;if(0!==e.length){for(var r=void 0,i=void 0,o=t._result,s=0;s<e.length;s+=3)r=e[s],i=e[s+n],r?D(n,r,i,o):i(o);t._subscribers.length=0}}function D(e,n,r,i){var o=t(r),s=void 0,a=void 0,u=void 0,c=void 0;if(o){if((s=function(t,e){try{return t(e)}catch(t){return S.error=t,S}}(r,i))===S?(c=!0,a=s.error,s.error=null):u=!0,n===s)return void j(n,new TypeError("A promises callback cannot return that same promise."))}else s=i,u=!0;n._state!==x||(o&&u?C(n,s):c?j(n,a):e===T?L(n,s):e===A&&j(n,s))}var z=0;function k(t){t[_]=z++,t._state=void 0,t._result=void 0,t._subscribers=[]}var M=function(){function t(t,n){this._instanceConstructor=t,this.promise=new t(E),this.promise[_]||k(this.promise),e(n)?(this.length=n.length,this._remaining=n.length,this._result=new Array(this.length),0===this.length?L(this.promise,this._result):(this.length=this.length||0,this._enumerate(n),0===this._remaining&&L(this.promise,this._result))):j(this.promise,new Error("Array Methods must be provided an Array"))}return t.prototype._enumerate=function(t){for(var e=0;this._state===x&&e<t.length;e++)this._eachEntry(t[e],e)},t.prototype._eachEntry=function(t,e){var n=this._instanceConstructor,r=n.resolve;if(r===b){var i=R(t);if(i===y&&t._state!==x)this._settledAt(t._state,e,t._result);else if("function"!=typeof i)this._remaining--,this._result[e]=t;else if(n===U){var o=new n(E);N(o,t,i),this._willSettleAt(o,e)}else this._willSettleAt(new n(function(e){return e(t)}),e)}else this._willSettleAt(r(t),e)},t.prototype._settledAt=function(t,e,n){var r=this.promise;r._state===x&&(this._remaining--,t===A?j(r,n):this._result[e]=n),0===this._remaining&&L(r,this._result)},t.prototype._willSettleAt=function(t,e){var n=this;I(t,void 0,function(t){return n._settledAt(T,e,t)},function(t){return n._settledAt(A,e,t)})},t}(),U=function(){function e(t){this[_]=z++,this._result=this._state=void 0,this._subscribers=[],E!==t&&("function"!=typeof t&&function(){throw new TypeError("You must pass a resolver function as the first argument to the promise constructor")}(),this instanceof e?function(t,e){try{e(function(e){C(t,e)},function(e){j(t,e)})}catch(e){j(t,e)}}(this,t):function(){throw new TypeError("Failed to construct 'Promise': Please use the 'new' operator, this object constructor cannot be called as a function.")}())}return e.prototype.catch=function(t){return this.then(null,t)},e.prototype.finally=function(e){var n=this.constructor;return t(e)?this.then(function(t){return n.resolve(e()).then(function(){return t})},function(t){return n.resolve(e()).then(function(){throw t})}):this.then(e,e)},e}();return U.prototype.then=y,U.all=function(t){return new M(this,t).promise},U.race=function(t){var n=this;return e(t)?new n(function(e,r){for(var i=t.length,o=0;o<i;o++)n.resolve(t[o]).then(e,r)}):new n(function(t,e){return e(new TypeError("You must pass an array to race."))})},U.resolve=b,U.reject=function(t){var e=new this(E);return j(e,t),e},U._setScheduler=function(t){i=t},U._setAsap=function(t){o=t},U._asap=o,U.polyfill=function(){var t=void 0;if("undefined"!=typeof global)t=global;else if("undefined"!=typeof self)t=self;else try{t=Function("return this")()}catch(t){throw new Error("polyfill failed because global object is unavailable in this environment")}var e=t.Promise;if(e){var n=null;try{n=Object.prototype.toString.call(e.resolve())}catch(t){}if("[object Promise]"===n&&!e.cast)return}t.Promise=U},U.Promise=U,U},t.exports=r()},function(t,e,n){var r=n(50);t.exports=new r("twttr")},function(t,e,n){var r=n(1),i=n(0);function o(t){return i.isType("string",t)?t.split("."):i.isType("array",t)?t:[]}function s(t,e){(e=e||r)[t]=e[t]||{},Object.defineProperty(this,"base",{value:e[t]}),Object.defineProperty(this,"name",{value:t})}i.aug(s.prototype,{get:function(t){return o(t).reduce(function(t,e){if(i.isObject(t))return t[e]},this.base)},set:function(t,e,n){var r=o(t),s=function(t,e){var n=o(e).slice(0,-1);return n.reduce(function(t,e,r){if(t[e]=t[e]||{},!i.isObject(t[e]))throw new Error(n.slice(0,r+1).join(".")+" is already defined with a value.");return t[e]},t)}(this.base,t),a=r.slice(-1);return n&&a in s?s[a]:s[a]=e},init:function(t,e){return this.set(t,e,!0)},unset:function(t){var e=o(t),n=this.get(e.slice(0,-1));n&&delete n[e.slice(-1)]},aug:function(t){var e=this.get(t),n=i.toRealArray(arguments).slice(1);if(e=void 0!==e?e:{},n.unshift(e),!n.every(i.isObject))throw new Error("Cannot augment non-object.");return this.set(t,i.aug.apply(null,n))},call:function(t){var e=this.get(t),n=i.toRealArray(arguments).slice(1);if(!i.isType("function",e))throw new Error("Function "+t+"does not exist.");return e.apply(null,n)},fullPath:function(t){var e=o(t);return e.unshift(this.name),e.join(".")}}),t.exports=s},function(t,e,n){var r=n(0),i=n(7),o={bind:function(t,e){return this._handlers=this._handlers||{},this._handlers[t]=this._handlers[t]||[],this._handlers[t].push(e)},unbind:function(t,e){var n;this._handlers&&this._handlers[t]&&(e?(n=this._handlers[t].indexOf(e))>=0&&this._handlers[t].splice(n,1):this._handlers[t]=[])},trigger:function(t,e){var n=this._handlers&&this._handlers[t];(e=e||{}).type=t,n&&n.forEach(function(t){r.async(i(t,this,e))})}};t.exports={Emitter:o,makeEmitter:function(){return r.aug(function(){},o)}}},function(t,e){var n="tfw_horizon_tweet_embed_9555";t.exports={isHorizonTweetEnabled:function(t){return!(!t||!t[n]||"hte"!==t[n].bucket)}}},function(t,e,n){var r=n(101),i=n(76),o=n(6),s=n(22),a=n(7),u=n(0),c=new i(function(t){var e=function(t){return t.reduce(function(t,e){return t[e._className]=t[e._className]||[],t[e._className].push(e),t},{})}(t.map(r.fromRawTask));u.forIn(e,function(t,e){s.allSettled(e.map(function(t){return t.initialize()})).then(function(){e.forEach(function(t){o.all([t.hydrate(),t.insertIntoDom()]).then(a(t.render,t)).then(a(t.success,t),a(t.fail,t))})})})});t.exports={addWidget:function(t){return c.add(t)}}},function(t,e,n){var r=n(18);t.exports=function(t){return r.write(function(){t&&t.parentNode&&t.parentNode.removeChild(t)})}},function(t,e,n){n(12),t.exports={log:function(t,e){}}},function(t,e,n){var r=n(1);function i(t){return(t=t||r).getSelection&&t.getSelection()}t.exports={getSelection:i,getSelectedText:function(t){var e=i(t);return e?e.toString():""}}},function(t,e,n){var r=n(4),i=n(1),o=n(2),s=2e4;t.exports=function(t){var e=new o,n=r.createElement("img");return n.onload=n.onerror=function(){i.setTimeout(e.resolve,50)},n.src=t,i.setTimeout(e.reject,s),e.promise}},function(t,e,n){var r=n(111);t.exports=function(t){t.define("createElement",r),t.define("createFragment",r),t.define("htmlToElement",r),t.define("hasSelectedText",r),t.define("addRootClass",r),t.define("removeRootClass",r),t.define("hasRootClass",r),t.define("prependStyleSheet",r),t.define("appendStyleSheet",r),t.define("prependCss",r),t.define("appendCss",r),t.define("makeVisible",r),t.define("injectWidgetEl",r),t.define("matchHeightToContent",r),t.define("matchWidthToContent",r)}},function(t,e){t.exports=function(t){var e,n=!1;return function(){return n?e:(n=!0,e=t.apply(this,arguments))}}},function(t,e,n){var r=n(15),i=n(120),o=n(61),s=n(16);t.exports=function(t,e,n){return new r(i,o,s.DM_BUTTON,t,e,n)}},function(t,e,n){var r=n(62),i=n(25);t.exports=r.isSupported()?r:i},function(t,e,n){var r=n(26),i=n(121);t.exports=r.build([i])},function(t,e,n){var r=n(15),i=n(124),o=n(37),s=n(16);t.exports=function(t,e,n){return new r(i,o,s.FOLLOW_BUTTON,t,e,n)}},function(t,e,n){var r=n(15),i=n(132),o=n(25),s=n(16);t.exports=function(t,e,n){return new r(i,o,s.MOMENT,t,e,n)}},function(t,e,n){var r=n(15),i=n(134),o=n(25),s=n(16);t.exports=function(t,e,n){return new r(i,o,s.PERISCOPE,t,e,n)}},function(t,e,n){var r=n(82),i=n(136),o=n(140),s=n(142),a=n(144),u=n(146),c={collection:i,event:o,likes:s,list:a,profile:u,url:l},d=[u,s,i,a,o];function l(t){return r(d,function(e){try{return new e(t)}catch(t){}})}t.exports=function(t){return t?function(t){var e,n;return e=(t.sourceType+"").toLowerCase(),(n=c[e])?new n(t):null}(t)||l(t):null}},function(t,e,n){var r=n(15),i=n(148),o=n(25),s=n(16);t.exports=function(t,e,n){return new r(i,o,s.TIMELINE,t,e,n)}},function(t,e,n){var r=n(15),i=n(4),o=n(37),s=n(150),a=n(61),u=n(151),c=n(16);t.exports=function(t,e,n,d){var l;return d?(l=i.createElement("div"),new r(s,o,c.TWEET,t,e,n,{sandboxWrapperEl:l})):new r(u,a,c.TWEET,t,e,n)}},function(t,e,n){var r=n(15),i=n(153),o=n(37),s=n(16);t.exports=function(t,e,n){var a=t&&t.type||"share",u="hashtag"==a?s.HASHTAG_BUTTON:"mention"==a?s.MENTION_BUTTON:s.SHARE_BUTTON;return new r(i,o,u,t,e,n)}},function(t,e,n){var r=n(39),i=n(38),o=n(0);t.exports=function(t){var e={widget_origin:i.rootDocumentLocation(),widget_frame:i.isFramed()?i.currentDocumentLocation():null,duration_ms:t.duration,item_ids:t.widgetIds||[]},n=o.aug(t.namespace,{page:"page",component:"performance"});r.scribe(n,e)}},function(t,e,n){var r=n(0),i=n(137),o=["ar","fa","he","ur"];t.exports={isRtlLang:function(t){return t=String(t).toLowerCase(),r.contains(o,t)},matchLanguage:function(t){return t=(t=(t||"").toLowerCase()).replace("_","-"),i(t)?t:(t=t.replace(/-.*/,""),i(t)?t:"en")}}},function(t){t.exports={tweetButtonHtmlPath:"/widgets/tweet_button.d6364fae9340b0be5f13818370141fd0.{{lang}}.html",followButtonHtmlPath:"/widgets/follow_button.d6364fae9340b0be5f13818370141fd0.{{lang}}.html",hubHtmlPath:"/widgets/hub.html",widgetIframeHtmlPath:"/widgets/widget_iframe.d6364fae9340b0be5f13818370141fd0.html",resourceBaseUrl:"https://platform.twitter.com"}},function(t,e,n){var r=n(3),i=n(98),o=n(24),s=n(11),a={favorite:["favorite","like"],follow:["follow"],like:["favorite","like"],retweet:["retweet"],tweet:["tweet"]};function u(t){this.srcEl=[],this.element=t}u.open=function(t,e,n){var u=(r.intentType(t)||"").toLowerCase();r.isTwitterURL(t)&&(function(t,e){i.open(t,{},e)}(t,n),e&&o.trigger("click",{target:e,region:"intent",type:"click",data:{}}),e&&a[u]&&a[u].forEach(function(n){o.trigger(n,{target:e,region:"intent",type:n,data:function(t,e){var n=s.decodeURL(e);switch(t){case"favorite":case"like":return{tweet_id:n.tweet_id};case"follow":return{screen_name:n.screen_name,user_id:n.user_id};case"retweet":return{source_tweet_id:n.tweet_id};default:return{}}}(u,t)})}))},t.exports=u},function(t,e){t.exports={getTimezoneOffset:function(){var t=(new Date).toString().match(/(GMT[+-]?\d+)/);return t&&t[0]||"GMT"}}},function(t,e,n){var r=n(4),i=n(9),o=n(2),s=n(0),a=n(11),u="cb",c=0;t.exports={fetch:function(t,e,n,d){var l,f,h;return d=function(t){if(t)return t.replace(/[^\w$]/g,"_")}(d||u+c++),l=i.fullPath(["callbacks",d]),f=r.createElement("script"),h=new o,e=s.aug({},e,{callback:l,suppress_response_codes:!0}),i.set(["callbacks",d],function(t){var e;t=(e=n(t||!1)).resp,e.success?h.resolve(t):h.reject(t),f.onload=f.onreadystatechange=null,f.parentNode&&f.parentNode.removeChild(f),i.unset(["callbacks",d])}),f.onerror=function(){h.reject(new Error("failed to fetch "+f.src))},f.src=a.url(t,e),f.async="async",r.body.appendChild(f),h.promise}}},function(t,e,n){var r=n(2),i=n(103),o=n(7);function s(t){this._inputsQueue=[],this._task=t,this._hasFlushBeenScheduled=!1}s.prototype.add=function(t){var e=new r;return this._inputsQueue.push({input:t,taskDoneDeferred:e}),this._hasFlushBeenScheduled||(this._hasFlushBeenScheduled=!0,i(o(this._flush,this))),e.promise},s.prototype._flush=function(){try{this._task.call(null,this._inputsQueue)}catch(t){this._inputsQueue.forEach(function(e){e.taskDoneDeferred.reject(t)})}this._inputsQueue=[],this._hasFlushBeenScheduled=!1},t.exports=s},function(t,e){t.exports=function(t,e){return t.reduce(function(t,n){var r=e(n);return t[r]=t[r]||[],t[r].push(n),t},{})}},function(t,e,n){var r=n(4),i=n(8),o=n(3);function s(t,e){var n,r;return e=e||i,/^https?:\/\//.test(t)?t:/^\/\//.test(t)?e.protocol+t:(n=e.host+(e.port.length?":"+e.port:""),0!==t.indexOf("/")&&((r=e.pathname.split("/")).pop(),r.push(t),t="/"+r.join("/")),[e.protocol,"//",n,t].join(""))}t.exports={absolutize:s,getCanonicalURL:function(){for(var t,e=r.getElementsByTagName("link"),n=0;e[n];n++)if("canonical"==(t=e[n]).rel)return s(t.href)},getScreenNameFromPage:function(){for(var t,e,n,i=[r.getElementsByTagName("a"),r.getElementsByTagName("link")],s=0,a=0,u=/\bme\b/;t=i[s];s++)for(a=0;e=t[a];a++)if(u.test(e.rel)&&(n=o.screenName(e.href)))return n}}},function(t,e,n){var r=n(8),i=/^[^#?]*\.(gov|mil)(:\d+)?([#?].*)?$/i,o={};function s(t){return t in o?o[t]:o[t]=i.test(t)}t.exports={isUrlSensitive:s,isHostPageSensitive:function(){return s(r.host)}}},function(t,e,n){var r=n(20),i=n(55),o=n(11),s=n(34),a=n(0),u=n(9).get("scribeCallback"),c=2083,d=[],l=o.url(s.CLIENT_EVENT_ENDPOINT,{dnt:0,l:""}),f=encodeURIComponent(l).length;function h(t,e,n,r){var i=!a.isObject(t),o=!!e&&!a.isObject(e);i||o||(u&&u(arguments),p(s.formatClientEventNamespace(t),s.formatClientEventData(e,n,r),s.CLIENT_EVENT_ENDPOINT))}function p(t,e,n){var r,u;n&&a.isObject(t)&&a.isObject(e)&&(i.log(t,e),r=s.flattenClientEventPayload(t,e),u={l:s.stringify(r)},s.noticeSeen(t)&&(u.notice_seen=!0),r.dnt&&(u.dnt=1),w(o.url(n,u)))}function m(t,e,n,r){var i=!a.isObject(t),o=!!e&&!a.isObject(e);if(!i&&!o)return v(s.flattenClientEventPayload(s.formatClientEventNamespace(t),s.formatClientEventData(e,n,r)))}function v(t){return d.push(t),d}function g(t){return encodeURIComponent(t).length+3}function w(t){return(new Image).src=t}t.exports={canFlushOneItem:function(t){var e=g(s.stringify(t));return f+e<c},_enqueueRawObject:v,scribe:p,clientEvent:h,clientEvent2:function(t,e,n){return h(t,e,n,2)},enqueueClientEvent:m,flushClientEvents:function(){var t;return d.length>1&&m({page:"widgets_js",component:"scribe_pixel",action:"batch_log"},{}),t=d,d=[],t.reduce(function(e,n,r){var i=e.length,o=i&&e[i-1];return r+1==t.length&&n.event_namespace&&"batch_log"==n.event_namespace.action&&(n.message=["entries:"+r,"requests:"+i].join("/")),function t(e){return Array.isArray(e)||(e=[e]),e.reduce(function(e,n){var r,i=s.stringify(n),o=g(i);return f+o<c?e=e.concat(i):(r=s.splitLogEntry(n)).length>1&&(e=e.concat(t(r))),e},[])}(n).forEach(function(t){var n=g(t);(!o||o.urlLength+n>c)&&(o={urlLength:f,items:[]},e.push(o)),o.urlLength+=n,o.items.push(t)}),e},[]).map(function(t){var e={l:t.items};return r.enabled()&&(e.dnt=1),w(o.url(s.CLIENT_EVENT_ENDPOINT,e))})},interaction:function(t,e,n,r){var i=s.extractTermsFromDOM(t.target||t.srcElement);i.action=r||"click",h(i,e,n)}}},function(t,e,n){var r=n(0),i=n(43);t.exports=function(t,e){return i(t,e)?[t]:r.toRealArray(t.querySelectorAll(e))}},function(t,e){t.exports=function(t,e,n){for(var r,i=0;i<t.length;i++)if(r=e.call(n,t[i],i,t))return r}},function(t,e){t.exports=function(){return Math.floor(+new Date/9e5)}},function(t,e,n){var r=n(12);t.exports=function(t){var e,n;return e=t.headers&&t.headers.status,!(n=t&&!t.error&&200===e)&&t.headers&&t.headers.message&&r.publicError(t.headers.message),{success:n,resp:t}}},function(t,e,n){var r,i=n(29),o=0;function s(){r&&r.length===o&&(i.emitter.trigger(i.ALL_WIDGETS_AND_IMAGES_LOADED,r),r=null)}i.emitter.bind(i.ALL_WIDGETS_RENDER_END,function(t){r=t.widgets,s()}),t.exports={reportImagesLoadForAWidget:function(){o++,s()}}},,,,,,,,,function(t,e,n){var r,i=n(2),o=n(4),s=n(96),a=n(49),u=n(9),c=n(97),d=n(24),l=n(100),f=n(154),h=n(162),p=n(163),m=n(29),v=n(35);n(164),m.emitter.trigger(m.START),u.set("widgets.init",!0),a.set("init",!0),p(),r=new i,s.exposeReadyPromise(r.promise,a.base,"_e"),a.set("widgets",f),a.set("widgets.load",l.load),a.set("events",d),h(function(){v.load(),r.resolve(a.base),c.attachTo(o),l.loadPage()})},function(t,e){t.exports=navigator},function(t,e,n){var r=n(7);t.exports={exposeReadyPromise:function(t,e,n){e.ready=r(t.then,t),n&&Array.isArray(e[n])&&(e[n].forEach(r(t.then,t)),delete e[n])}}},function(t,e,n){var r=n(8),i=n(36),o=n(32),s=n(73),a=n(3);function u(t){var e,n,u;t.altKey||t.metaKey||t.shiftKey||(e=o.closest(function(t){return"A"===t.tagName||"AREA"===t.tagName},t.target))&&a.isIntentURL(e.href)&&(n=(n=(n=[u=e.href,"original_referer="+r.href].join(-1==u.indexOf("?")?"?":"&")).replace(/^http[:]/,"https:")).replace(/^\/\//,"https://"),s.open(n,e),i.preventDefault(t))}t.exports={attachTo:function(t){t.addEventListener("click",u,!1)}}},function(t,e,n){var r,i=n(1),o=n(99),s=n(36),a=n(32),u=n(21),c=n(3),d=n(23),l=n(0),f="intent_",h=i.screen.width,p=i.screen.height;function m(t,e){function n(t){return Math.round(t/2)}return t>e?{coordinate:0,size:e}:{coordinate:n(e)-n(t),size:t}}function v(t,e,n){var i,o;e=r.parse(e),n=n||{},i=m(e.width,n.width||h),e.left=i.coordinate,e.width=i.size,o=m(e.height,n.height||p),e.top=o.coordinate,e.height=o.size,this.win=t,this.features=function(t){var e=[];return l.forIn(t,function(t,n){e.push(t+"="+n)}),e.join(",")}(e)}r=(new o).defaults({width:550,height:520,personalbar:"0",toolbar:"0",location:"1",scrollbars:"1",resizable:"1"}),v.prototype.open=function(t,e){var n=e&&"click"==e.type&&a.closest("a",e.target),r=e&&(e.altKey||e.metaKey||e.shiftKey),i=n&&(u.ios()||u.android());if(c.isTwitterURL(t))return r||i?this:(this.name=f+d.generate(),this.popup=this.win.open(t,this.name,this.features),e&&s.preventDefault(e),this)},v.open=function(t,e,n){return new v(i,e).open(t,n)},t.exports=v},function(t,e,n){var r=n(5),i=n(0);function o(){this.assertions=[],this._defaults={}}o.prototype.assert=function(t,e){return this.assertions.push({fn:t,msg:e||"assertion failed"}),this},o.prototype.defaults=function(t){return this._defaults=t||this._defaults,this},o.prototype.require=function(t){var e=this;return(t=Array.isArray(t)?t:i.toRealArray(arguments)).forEach(function(t){e.assert(function(t){return function(e){return r.hasValue(e[t])}}(t),"required: "+t)}),this},o.prototype.parse=function(t){var e,n;if(e=i.aug({},this._defaults,t||{}),(n=this.assertions.reduce(function(t,n){return n.fn(e)||t.push(n.msg),t},[])).length>0)throw new Error(n.join("\n"));return e},t.exports=o},function(t,e,n){var r=n(4),i=n(52),o=n(6),s=n(22),a=n(53),u=n(33),c=n(9),d=n(39),l=n(24),f=n(5),h=n(0),p=n(35),m=n(117),v=n(29);function g(){var t=u.val("widgets:autoload")||!0;return!f.isFalseValue(t)&&(f.isTruthValue(t)?r.body:r.querySelectorAll(t))}function w(t,e){var n,i;return t=(t=t||r.body).length?h.toRealArray(t):[t],d.pause(),i=function(t,e){return t.reduce(function(t,n){return t.concat(m.reduce(function(t,r){return t.concat(r(n,e))},[]))},[])}(t,e),v.emitter.trigger(v.ALL_WIDGETS_RENDER_START,{widgets:i}),n=s.allResolved(i.map(function(t){return a.addWidget(t)})).then(function(t){l.trigger("loaded",{widgets:t}),t&&t.length&&v.emitter.trigger(v.ALL_WIDGETS_RENDER_END,{widgets:t})}),s.always(n,function(){d.resume()}),n}function y(t){return p.getExperiments().then(function(e){return w(t,i.isHorizonTweetEnabled(e))})}t.exports={load:y,loadPage:function(){var t=g();return!1===t?o.resolve():(c.set("widgets.loaded",!0),y(t))},_getPageLoadTarget:g}},function(t,e,n){var r=n(10),i=n(18),o=n(24),s=n(54),a=n(6),u=n(22);function c(t,e){this._widget=null,this._sandbox=null,this._hydrated=!1,this._insertedIntoDom=!1,this._Sandbox=t.Sandbox,this._factory=t.factory,this._widgetParams=t.parameters,this._resolve=e,this._className=t.className,this._renderedClassName=t.className+"-rendered",this._errorClassName=t.className+"-error",this._srcEl=t.srcEl,this._targetGlobal=function(t){return(t.srcEl||t.targetEl).ownerDocument.defaultView}(t),this._sandboxWrapperEl=t.options?t.options.sandboxWrapperEl:null,this._insertionStrategy=function(e){var n,r=t.srcEl,i=t.targetEl,o=t.options?t.options.sandboxWrapperEl:null;o?(o.appendChild(e),n=o):n=e,r?i.insertBefore(n,r):i.appendChild(n)}}c.fromRawTask=function(t){return new c(t.input,t.taskDoneDeferred.resolve)},c.prototype.initialize=function(){var t=this,e=new this._Sandbox(this._targetGlobal);return this._factory(this._widgetParams,e).then(function(n){return t._widget=n,t._sandbox=e,n._sandboxWrapperEl=t._sandboxWrapperEl,n})},c.prototype.insertIntoDom=function(){var t=this;return this._widget?this._sandbox.insert(this._widget.id,{class:[this._className,this._renderedClassName].join(" ")},null,this._insertionStrategy).then(function(){t._insertedIntoDom=!0}):a.reject(new Error("cannot insert widget into DOM before it is initialized"))},c.prototype.hydrate=function(){var t=this;return this._widget?this._widget.hydrate().then(function(){t._hydrated=!0}):a.reject(new Error("cannot hydrate widget before it is initialized"))},c.prototype.render=function(){var t=this;function e(e){return s(t._sandbox.sandboxEl).then(function(){return a.reject(e)})}return this._hydrated?this._insertedIntoDom?t._widget.render(t._sandbox).then(function(){return t._sandbox.onResize(function(){return t._widget.resize().then(function(){o.trigger("resize",{target:t._sandbox.sandboxEl})})}),t._widget.show()}).then(function(){return s(t._srcEl).then(function(){return t._sandbox.sandboxEl})},e):e(new Error("cannot render widget before DOM insertion")):e(new Error("cannot render widget before hydration"))},c.prototype.fail=function(){var t=this;return this._srcEl?u.always(i.write(function(){r.add(t._srcEl,t._errorClassName)}),function(){o.trigger("rendered",{target:t._srcEl}),t._resolve(t._srcEl)}):(t._resolve(),a.resolve())},c.prototype.success=function(){o.trigger("rendered",{target:this._sandbox.sandboxEl}),this._resolve(this._sandbox.sandboxEl)},t.exports=c},function(t,e,n){var r;!function(){"use strict";var i=window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||window.msRequestAnimationFrame||function(t){return window.setTimeout(t,1e3/60)};function o(){this.frames=[],this.lastId=0,this.raf=i,this.batch={hash:{},read:[],write:[],mode:null}}o.prototype.read=function(t,e){var n=this.add("read",t,e),r=n.id;return this.batch.read.push(n.id),"reading"===this.batch.mode||this.batch.scheduled?r:(this.scheduleBatch(),r)},o.prototype.write=function(t,e){var n=this.add("write",t,e),r=this.batch.mode,i=n.id;return this.batch.write.push(n.id),"writing"===r||"reading"===r||this.batch.scheduled?i:(this.scheduleBatch(),i)},o.prototype.defer=function(t,e,n){"function"==typeof t&&(n=e,e=t,t=1);var r=this,i=t-1;return this.schedule(i,function(){r.run({fn:e,ctx:n})})},o.prototype.clear=function(t){if("function"==typeof t)return this.clearFrame(t);t=Number(t);var e=this.batch.hash[t];if(e){var n=this.batch[e.type],r=n.indexOf(t);delete this.batch.hash[t],~r&&n.splice(r,1)}},o.prototype.clearFrame=function(t){var e=this.frames.indexOf(t);~e&&this.frames.splice(e,1)},o.prototype.scheduleBatch=function(){var t=this;this.schedule(0,function(){t.batch.scheduled=!1,t.runBatch()}),this.batch.scheduled=!0},o.prototype.uniqueId=function(){return++this.lastId},o.prototype.flush=function(t){for(var e;e=t.shift();)this.run(this.batch.hash[e])},o.prototype.runBatch=function(){try{this.batch.mode="reading",this.flush(this.batch.read),this.batch.mode="writing",this.flush(this.batch.write),this.batch.mode=null}catch(t){throw this.runBatch(),t}},o.prototype.add=function(t,e,n){var r=this.uniqueId();return this.batch.hash[r]={id:r,fn:e,ctx:n,type:t}},o.prototype.run=function(t){var e=t.ctx||this,n=t.fn;if(delete this.batch.hash[t.id],!this.onError)return n.call(e);try{n.call(e)}catch(t){this.onError(t)}},o.prototype.loop=function(){var t,e=this,n=this.raf,r=!1;function i(){var t=e.frames.shift();e.frames.length?n(i):e.looping=!1,t&&t()}this.looping||(t=setTimeout(function(){r=!0,i()},500),n(function(){r||(clearTimeout(t),i())}),this.looping=!0)},o.prototype.schedule=function(t,e){return this.frames[t]?this.schedule(t+1,e):(this.loop(),this.frames[t]=e)};var s=new o;void 0!==t&&t.exports?t.exports=s:void 0===(r=function(){return s}.call(e,n,e,t))||(t.exports=r)}()},function(t,e,n){var r=n(48).Promise;t.exports=r._asap},function(t,e,n){var r,i,o,s=n(4),a=n(1),u=n(30),c=n(20),d=n(2),l=n(6),f=n(55),h=n(34),p=n(0),m=n(25),v=n(9).get("scribeCallback"),g=Math.floor(1e3*Math.random())+"_",w="rufous-frame-"+g+"-",y="rufous-form-"+g+"-",b=0,_=!1,E=new d;function x(){var t=o.createElement("form"),e=o.createElement("input"),n=o.createElement("input");return b++,t.action=h.CLIENT_EVENT_ENDPOINT,t.method="POST",t.target=w+b,t.id=y+b,e.type="hidden",e.name="dnt",e.value=c.enabled(),n.type="hidden",n.name="tfw_redirect",n.value=h.RUFOUS_REDIRECT,t.appendChild(e),t.appendChild(n),t}function T(){var t=w+b;return u({id:t,name:t,width:0,height:0,border:0},{display:"none"},o.doc)}t.exports={clientEvent:function(t,e,n,i){(function(t,e){var n=!p.isObject(t),r=!!e&&!p.isObject(e),i=n||r;return i})(t,e)||(v&&v(arguments),E.promise.then(function(){!function(t,e){var n,i,s;p.isObject(t)&&p.isObject(e)&&(f.log(t,e),s=h.flattenClientEventPayload(t,e),(n=r.firstChild).value=+(+n.value||s.dnt||0),(i=o.createElement("input")).type="hidden",i.name="l",i.value=h.stringify(s),r.appendChild(i))}(h.formatClientEventNamespace(t),h.formatClientEventData(e,n,i))}))},flush:function(){return E.promise.then(function(){var t;return r.children.length<=2?l.reject():(t=l.all([o.doc.body.appendChild(r),o.doc.body.appendChild(i)]).then(function(t){var e=t[0],n=t[1];return n.addEventListener("load",function(){!function(t,e){return function(){var n=t.parentNode;n&&(n.removeChild(t),n.removeChild(e))}}(e,n)()}),e.submit(),t}),r=x(),i=T(),t)})},init:function(){return _?E.promise:((o=new m(a)).insert("rufous-sandbox",null,{display:"none"},function(t){s.body.appendChild(t)}).then(function(){o.setTitle("Twitter analytics iframe"),r=x(),i=T(),E.resolve([r,i])}),_=!0,E.promise)}}},function(t,e,n){var r=n(0);t.exports=function t(e){var n=[];return e.forEach(function(e){var i=r.isType("array",e)?t(e):[e];n=n.concat(i)}),n}},function(t,e){t.exports=function(t){return t.filter(function(e,n){return t.indexOf(e)===n})}},function(t,e,n){var r=n(41),i=n(0),o=n(109);function s(){r.apply(this,arguments)}s.prototype=Object.create(r.prototype),i.aug(s.prototype,{factory:o}),t.exports=s},function(t,e,n){var r=n(22),i=n(0),o=n(7);t.exports={before:function(t,e){return function(){var n,i=this,o=arguments;return n=e.apply(this,arguments),r.isPromise(n)?n.then(function(){return t.apply(i,o)}):t.apply(this,arguments)}},after:function(t,e){return function(){var n,i=this,o=arguments;function s(t,e){return r.isPromise(e)?e.then(function(){return t}):t}return n=t.apply(this,arguments),r.isPromise(n)?n.then(function(t){return s(t,e.apply(i,o))}):s(n,e.apply(this,arguments))}},around:function(t,e){return function(){var n=i.toRealArray(arguments);return n.unshift(o(t,this)),e.apply(this,n)}}}},function(t,e,n){var r=n(10),i=n(18),o=n(42),s=n(6),a=n(0);t.exports=function(){var t=o();function e(e){t.apply(this,arguments),Object.defineProperty(this,"targetGlobal",{value:e})}return e.prototype=Object.create(t.prototype),a.aug(e.prototype,{id:null,initialized:!1,width:0,height:0,sandboxEl:null,insert:function(){return s.reject()},onResize:function(){},addClass:function(t){var e=this.sandboxEl;return t=Array.isArray(t)?t:[t],i.write(function(){t.forEach(function(t){r.add(e,t)})})},removeClass:function(t){var e=this.sandboxEl;return t=Array.isArray(t)?t:[t],i.write(function(){t.forEach(function(t){r.remove(e,t)})})},styleSelf:function(t){var e=this;return i.write(function(){a.forIn(t,function(t,n){e.sandboxEl.style[t]=n})})}}),e}},function(t,e,n){var r=n(4),i=n(10),o=n(18),s=n(56),a=n(26),u=n(57),c=n(45),d=n(46),l=n(30),f=n(12),h=n(47),p=n(2),m=n(6),v=n(0),g=n(9),w=n(23),y=n(7),b={allowfullscreen:"true"},_={position:"absolute",visibility:"hidden",display:"block",width:"0px",height:"0px",padding:"0",border:"none"},E={position:"static",visibility:"visible"},x="SandboxRoot",T=".SandboxRoot { display: none; }",A=50;function S(t,e,n,r){return e=v.aug({id:t},b,e),n=v.aug({},_,n),l(e,n,r)}function R(t,e,n,i,s){var a=new p,u=w.generate(),c=S(t,e,n,s);return g.set(["sandbox",u],function(){var t=c.contentWindow.document;o.write(function(){t.write("<!DOCTYPE html><html><head></head><body></body></html>")}).then(function(){t.close(),a.resolve(c)})}),c.src=["javascript:",'document.write("");',"try { window.parent.document; }",'catch (e) { document.domain="'+r.domain+'"; }',"window.parent."+g.fullPath(["sandbox",u])+"();"].join(""),c.addEventListener("error",a.reject,!1),o.write(function(){i.parentNode.replaceChild(c,i)}),a.promise}t.exports=a.couple(n(58),function(t){t.overrideProperty("id",{get:function(){return this.sandboxEl&&this.sandboxEl.id}}),t.overrideProperty("initialized",{get:function(){return!!this.win}}),t.overrideProperty("width",{get:function(){return this._width}}),t.overrideProperty("height",{get:function(){return this._height}}),t.overrideProperty("sandboxEl",{get:function(){return this.iframeEl}}),t.defineProperty("iframeEl",{get:function(){return this._iframe}}),t.defineProperty("rootEl",{get:function(){return this.doc&&this.doc.documentElement}}),t.defineProperty("widgetEl",{get:function(){return this.doc&&this.doc.body.firstElementChild}}),t.defineProperty("win",{get:function(){return this.iframeEl&&this.iframeEl.contentWindow}}),t.defineProperty("doc",{get:function(){return this.win&&this.win.document}}),t.define("_updateCachedDimensions",function(){var t=this;return o.read(function(){var e,n=h(t.sandboxEl);"visible"==t.sandboxEl.style.visibility?t._width=n.width:(e=h(t.sandboxEl.parentElement).width,t._width=Math.min(n.width,e)),t._height=n.height})}),t.define("_setTargetToBlank",function(){var t=this.createElement("base");t.target="_blank",this.doc.head.appendChild(t)}),t.define("_didResize",function(){var t=this,e=this._resizeHandlers.slice(0);return this._updateCachedDimensions().then(function(){e.forEach(function(e){e(t)})})}),t.define("setTitle",function(t){this.iframeEl.title=t}),t.override("createElement",function(t){return this.doc.createElement(t)}),t.override("createFragment",function(){return this.doc.createDocumentFragment()}),t.override("htmlToElement",function(t){var e;return(e=this.createElement("div")).innerHTML=t,e.firstElementChild}),t.override("hasSelectedText",function(){return!!s.getSelectedText(this.win)}),t.override("addRootClass",function(t){var e=this.rootEl;return t=Array.isArray(t)?t:[t],this.initialized?o.write(function(){t.forEach(function(t){i.add(e,t)})}):m.reject(new Error("sandbox not initialized"))}),t.override("removeRootClass",function(t){var e=this.rootEl;return t=Array.isArray(t)?t:[t],this.initialized?o.write(function(){t.forEach(function(t){i.remove(e,t)})}):m.reject(new Error("sandbox not initialized"))}),t.override("hasRootClass",function(t){return i.present(this.rootEl,t)}),t.define("addStyleSheet",function(t,e){var n,r=new p;return this.initialized?((n=this.createElement("link")).type="text/css",n.rel="stylesheet",n.href=t,n.addEventListener("load",r.resolve,!1),n.addEventListener("error",r.reject,!1),o.write(y(e,null,n)).then(function(){return u(t).then(r.resolve,r.reject),r.promise})):m.reject(new Error("sandbox not initialized"))}),t.override("prependStyleSheet",function(t){var e=this.doc;return this.addStyleSheet(t,function(t){var n=e.head.firstElementChild;return n?e.head.insertBefore(t,n):e.head.appendChild(t)})}),t.override("appendStyleSheet",function(t){var e=this.doc;return this.addStyleSheet(t,function(t){return e.head.appendChild(t)})}),t.define("addCss",function(t,e){var n;return c.inlineStyle()?((n=this.createElement("style")).type="text/css",n.appendChild(this.doc.createTextNode(t)),o.write(y(e,null,n))):(f.devError("CSP enabled; cannot embed inline styles"),m.resolve())}),t.override("prependCss",function(t){var e=this.doc;return this.addCss(t,function(t){var n=e.head.firstElementChild;return n?e.head.insertBefore(t,n):e.head.appendChild(t)})}),t.override("appendCss",function(t){var e=this.doc;return this.addCss(t,function(t){return e.head.appendChild(t)})}),t.override("makeVisible",function(){var t=this;return this.styleSelf(E).then(function(){t._updateCachedDimensions()})}),t.override("injectWidgetEl",function(t){var e=this;return this.initialized?this.widgetEl?m.reject(new Error("widget already injected")):o.write(function(){e.doc.body.appendChild(t)}):m.reject(new Error("sandbox not initialized"))}),t.override("matchHeightToContent",function(){var t,e=this;return o.read(function(){t=e.widgetEl?h(e.widgetEl).height:0}),o.write(function(){e.sandboxEl.style.height=t+"px"}).then(function(){return e._updateCachedDimensions()})}),t.override("matchWidthToContent",function(){var t,e=this;return o.read(function(){t=e.widgetEl?h(e.widgetEl).width:0}),o.write(function(){e.sandboxEl.style.width=t+"px"}).then(function(){return e._updateCachedDimensions()})}),t.after("initialize",function(){this._iframe=null,this._width=this._height=0,this._resizeHandlers=[]}),t.override("insert",function(t,e,n,r){var i=this,s=new p,a=this.targetGlobal.document,u=S(t,e,n,a);return o.write(y(r,null,u)),u.addEventListener("load",function(){(function(t){try{t.contentWindow.document}catch(t){return m.reject(t)}return m.resolve(t)})(u).then(null,y(R,null,t,e,n,u,a)).then(s.resolve,s.reject)},!1),u.addEventListener("error",s.reject,!1),s.promise.then(function(t){var e=d(i._didResize,A,i);return i._iframe=t,i.win.addEventListener("resize",e,!1),m.all([i._setTargetToBlank(),i.addRootClass(x),i.prependCss(T)])})}),t.override("onResize",function(t){this._resizeHandlers.push(t)}),t.after("styleSelf",function(){return this._updateCachedDimensions()})})},function(t,e){t.exports=function(){throw new Error("unimplemented method")}},function(t,e,n){var r=n(2),i=n(7),o=100,s=3e3;function a(t,e){this._inputsQueue=[],this._task=t,this._isPaused=!1,this._flushDelay=e&&e.flushDelay||o,this._pauseLength=e&&e.pauseLength||s,this._flushTimeout=void 0}a.prototype.add=function(t){var e=new r;return this._inputsQueue.push({input:t,taskDoneDeferred:e}),this._scheduleFlush(),e.promise},a.prototype._scheduleFlush=function(){this._isPaused||(clearTimeout(this._flushTimeout),this._flushTimeout=setTimeout(i(this._flush,this),this._flushDelay))},a.prototype._flush=function(){try{this._task.call(null,this._inputsQueue)}catch(t){this._inputsQueue.forEach(function(e){e.taskDoneDeferred.reject(t)})}this._inputsQueue=[],this._flushTimeout=void 0},a.prototype.pause=function(t){clearTimeout(this._flushTimeout),this._isPaused=!0,!t&&this._pauseLength&&setTimeout(i(this.resume,this),this._pauseLength)},a.prototype.resume=function(){this._isPaused=!1,this._scheduleFlush()},t.exports=a},function(t,e,n){var r,i=n(72),o=n(30),s=n(2),a=n(4),u=n(19),c=n(21),d=n(31),l=n(8),f=n(12),h=n(114),p=n(59),m=n(9),v=n(11),g=n(115),w=n(3),y=n(0),b=n(1),_=p(function(){return new s});function E(t){var e=t||{should_obtain_cookie_consent:!0,experiments:{}};return new g(e.should_obtain_cookie_consent,e.experiments)}t.exports={load:function(){var t,e,n,s;if(c.ie9()||c.ie10()||"http:"!==l.protocol&&"https:"!==l.protocol)return f.devError("Using default settings due to unsupported browser or protocol."),r=E(),void _().resolve();t={origin:l.origin},u.settings().indexOf("localhost")>-1&&(t.localSettings=!0),e=v.url(i.resourceBaseUrl+i.widgetIframeHtmlPath,t),n=function(t){var n;if(e.substr(0,t.origin.length)===t.origin&&w.isTwitterURL(t.origin))try{(n="string"==typeof t.data?d.parse(t.data):t.data).namespace===h.settings&&(r=E(n.settings),_().resolve())}catch(t){f.devError(t)}},b.addEventListener("message",n),s=o({src:e,title:"Twitter settings iframe"},{display:"none"}),a.body.appendChild(s)},settingsLoaded:function(){var t,e,n;return t=new s,e=m.get("experimentOverride"),_().promise.then(function(){e&&e.name&&e.assignment&&((n={})[e.name]={bucket:e.assignment},r.experiments=y.aug(r.experiments,n)),t.resolve(r)}).catch(function(e){t.reject(e)}),t.promise}}},function(t,e){t.exports={settings:"twttr.settings"}},function(t,e){t.exports=function(t,e){this.shouldObtainCookieConsent=t,this.experiments=e||{}}},function(t,e){t.exports=function(t){return t.split("").map(function(t){return t.charCodeAt(0).toString(16)}).join("")}},function(t,e,n){t.exports=[n(118),n(123),n(131),n(133),n(135),n(149),n(152)]},function(t,e,n){var r=n(11),i=n(5),o=n(0),s=n(13),a=n(14)(),u=n(60),c="a.twitter-dm-button";t.exports=function(t){return a(t,c).map(function(t){return u(function(t){var e=t.getAttribute("data-show-screen-name"),n=s(t),a=t.getAttribute("href"),u=t.getAttribute("data-screen-name"),c=e?i.asBoolean(e):null,d=t.getAttribute("data-size"),l=r.decodeURL(a),f=l.recipient_id,h=t.getAttribute("data-text")||l.text,p=t.getAttribute("data-welcome-message-id")||l.welcomeMessageId;return o.aug(n,{screenName:u,showScreenName:c,size:d,text:h,userId:f,welcomeMessageId:p})}(t),t.parentNode,t)})}},function(t,e,n){var r=n(0);t.exports=function t(e){var n;if(e)return n=e.lang||e.getAttribute("data-lang"),r.isType("string",n)?n:t(e.parentElement)}},function(t,e,n){var r=n(2);t.exports=function(t,e){var i=new r;return n.e(2).then(function(r){var o;try{o=n(86),i.resolve(new o(t,e))}catch(t){i.reject(t)}}.bind(null,n)).catch(function(t){i.reject(t)}),i.promise}},function(t,e,n){var r=n(122),i=n(1),o=n(10),s=n(36),a=n(18),u=n(56),c=n(26),d=n(57),l=n(45),f=n(47),h=n(7),p=n(46),m=n(6),v=n(0),g=50,w={position:"absolute",visibility:"hidden",display:"block",transform:"rotate(0deg)"},y={position:"static",visibility:"visible"},b="twitter-widget",_="open",E="SandboxRoot",x=".SandboxRoot { display: none; max-height: 10000px; }";t.exports=c.couple(n(58),function(t){t.defineStatic("isSupported",function(){return!!i.HTMLElement.prototype.attachShadow&&l.inlineStyle()}),t.overrideProperty("id",{get:function(){return this.sandboxEl&&this.sandboxEl.id}}),t.overrideProperty("initialized",{get:function(){return!!this._shadowHost}}),t.overrideProperty("width",{get:function(){return this._width}}),t.overrideProperty("height",{get:function(){return this._height}}),t.overrideProperty("sandboxEl",{get:function(){return this._shadowHost}}),t.define("_updateCachedDimensions",function(){var t=this;return a.read(function(){var e,n=f(t.sandboxEl);"visible"==t.sandboxEl.style.visibility?t._width=n.width:(e=f(t.sandboxEl.parentElement).width,t._width=Math.min(n.width,e)),t._height=n.height})}),t.define("_didResize",function(){var t=this,e=this._resizeHandlers.slice(0);return this._updateCachedDimensions().then(function(){e.forEach(function(e){e(t)})})}),t.override("createElement",function(t){return this.targetGlobal.document.createElement(t)}),t.override("createFragment",function(){return this.targetGlobal.document.createDocumentFragment()}),t.override("htmlToElement",function(t){var e;return(e=this.createElement("div")).innerHTML=t,e.firstElementChild}),t.override("hasSelectedText",function(){return!!u.getSelectedText(this.targetGlobal)}),t.override("addRootClass",function(t){var e=this._shadowRootBody;return t=Array.isArray(t)?t:[t],this.initialized?a.write(function(){t.forEach(function(t){o.add(e,t)})}):m.reject(new Error("sandbox not initialized"))}),t.override("removeRootClass",function(t){var e=this._shadowRootBody;return t=Array.isArray(t)?t:[t],this.initialized?a.write(function(){t.forEach(function(t){o.remove(e,t)})}):m.reject(new Error("sandbox not initialized"))}),t.override("hasRootClass",function(t){return o.present(this._shadowRootBody,t)}),t.override("addStyleSheet",function(t,e){return this.addCss('@import url("'+t+'");',e).then(function(){return d(t)})}),t.override("prependStyleSheet",function(t){var e=this._shadowRoot;return this.addStyleSheet(t,function(t){var n=e.firstElementChild;return n?e.insertBefore(t,n):e.appendChild(t)})}),t.override("appendStyleSheet",function(t){var e=this._shadowRoot;return this.addStyleSheet(t,function(t){return e.appendChild(t)})}),t.override("addCss",function(t,e){var n;return this.initialized?l.inlineStyle()?((n=this.createElement("style")).type="text/css",n.appendChild(this.targetGlobal.document.createTextNode(t)),a.write(h(e,null,n))):m.resolve():m.reject(new Error("sandbox not initialized"))}),t.override("prependCss",function(t){var e=this._shadowRoot;return this.addCss(t,function(t){var n=e.firstElementChild;return n?e.insertBefore(t,n):e.appendChild(t)})}),t.override("appendCss",function(t){var e=this._shadowRoot;return this.addCss(t,function(t){return e.appendChild(t)})}),t.override("makeVisible",function(){return this.styleSelf(y)}),t.override("injectWidgetEl",function(t){var e=this;return this.initialized?this._shadowRootBody.firstElementChild?m.reject(new Error("widget already injected")):a.write(function(){e._shadowRootBody.appendChild(t)}).then(function(){return e._updateCachedDimensions()}).then(function(){var t=p(e._didResize,g,e);new r(e._shadowRootBody,t)}):m.reject(new Error("sandbox not initialized"))}),t.override("matchHeightToContent",function(){return m.resolve()}),t.override("matchWidthToContent",function(){return m.resolve()}),t.override("insert",function(t,e,n,r){var i=this.targetGlobal.document,o=this._shadowHost=i.createElement(b),u=this._shadowRoot=o.attachShadow({mode:_}),c=this._shadowRootBody=i.createElement("div");return v.forIn(e||{},function(t,e){o.setAttribute(t,e)}),o.id=t,u.appendChild(c),s.delegate(c,"click","A",function(t,e){e.hasAttribute("target")||e.setAttribute("target","_blank")}),m.all([this.styleSelf(w),this.addRootClass(E),this.prependCss(x),a.write(r.bind(null,o))])}),t.override("onResize",function(t){this._resizeHandlers.push(t)}),t.after("initialize",function(){this._shadowHost=this._shadowRoot=this._shadowRootBody=null,this._width=this._height=0,this._resizeHandlers=[]}),t.after("styleSelf",function(){return this._updateCachedDimensions()})})},function(t,e){var n;(n=function(t,e){function r(t,e){if(t.resizedAttached){if(t.resizedAttached)return void t.resizedAttached.add(e)}else t.resizedAttached=new function(){var t,e;this.q=[],this.add=function(t){this.q.push(t)},this.call=function(){for(t=0,e=this.q.length;t<e;t++)this.q[t].call()}},t.resizedAttached.add(e);t.resizeSensor=document.createElement("div"),t.resizeSensor.className="resize-sensor";var n="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;",r="position: absolute; left: 0; top: 0; transition: 0s;";t.resizeSensor.style.cssText=n,t.resizeSensor.innerHTML='<div class="resize-sensor-expand" style="'+n+'"><div style="'+r+'"></div></div><div class="resize-sensor-shrink" style="'+n+'"><div style="'+r+' width: 200%; height: 200%"></div></div>',t.appendChild(t.resizeSensor),{fixed:1,absolute:1}[function(t,e){return t.currentStyle?t.currentStyle[e]:window.getComputedStyle?window.getComputedStyle(t,null).getPropertyValue(e):t.style[e]}(t,"position")]||(t.style.position="relative");var i,o,s=t.resizeSensor.childNodes[0],a=s.childNodes[0],u=t.resizeSensor.childNodes[1],c=(u.childNodes[0],function(){a.style.width=s.offsetWidth+10+"px",a.style.height=s.offsetHeight+10+"px",s.scrollLeft=s.scrollWidth,s.scrollTop=s.scrollHeight,u.scrollLeft=u.scrollWidth,u.scrollTop=u.scrollHeight,i=t.offsetWidth,o=t.offsetHeight});c();var d=function(t,e,n){t.attachEvent?t.attachEvent("on"+e,n):t.addEventListener(e,n)},l=function(){t.offsetWidth==i&&t.offsetHeight==o||t.resizedAttached&&t.resizedAttached.call(),c()};d(s,"scroll",l),d(u,"scroll",l)}var i=Object.prototype.toString.call(t),o="[object Array]"===i||"[object NodeList]"===i||"[object HTMLCollection]"===i||"undefined"!=typeof jQuery&&t instanceof jQuery||"undefined"!=typeof Elements&&t instanceof Elements;if(o)for(var s=0,a=t.length;s<a;s++)r(t[s],e);else r(t,e);this.detach=function(){if(o)for(var e=0,r=t.length;e<r;e++)n.detach(t[e]);else n.detach(t)}}).detach=function(t){t.resizeSensor&&(t.removeChild(t.resizeSensor),delete t.resizeSensor,delete t.resizedAttached)},void 0!==t&&void 0!==t.exports?t.exports=n:window.ResizeSensor=n},function(t,e,n){var r=n(3),i=n(0),o=n(13),s=n(14)(),a=n(63),u=n(5),c="a.twitter-follow-button";t.exports=function(t){return s(t,c).map(function(t){return a(function(t){var e=o(t),n={screenName:r.screenName(t.href),showScreenName:"false"!==t.getAttribute("data-show-screen-name"),showCount:"false"!==t.getAttribute("data-show-count"),size:t.getAttribute("data-size"),count:t.getAttribute("data-count"),preview:t.getAttribute("data-preview")};return i.forIn(n,function(t,n){var r=e[t];e[t]=u.hasValue(r)?r:n}),e.screenName=e.screenName||e.screen_name,e}(t),t.parentNode,t)})}},function(t,e,n){var r=n(2);t.exports=function(t,e){var i=new r;return n.e(3).then(function(r){var o;try{o=n(87),i.resolve(new o(t,e))}catch(t){i.reject(t)}}.bind(null,n)).catch(function(t){i.reject(t)}),i.promise}},function(t,e,n){var r=n(18),i=n(126),o=n(59),s=n(30),a=n(2),u=n(6),c=n(7),d=n(0),l={position:"absolute",visibility:"hidden",width:"0px",height:"0px"},f={position:"static",visibility:"visible"},h={};i(function(t,e,n){var r=h[t];if(r)return e=e||1,n=n||1,r.styleSelf({width:e+"px",height:n+"px"}).then(function(){r.didResize()})}),t.exports=function(t){t.overrideProperty("id",{get:function(){return this.sandboxEl&&this.sandboxEl.id}}),t.overrideProperty("initialized",{get:function(){return!!this.iframeEl}}),t.overrideProperty("width",{get:function(){return this._width}}),t.overrideProperty("height",{get:function(){return this._height}}),t.overrideProperty("sandboxEl",{get:function(){return this.iframeEl}}),t.defineProperty("iframeEl",{get:function(){return this._iframe}}),t.define("updateCachedDimensions",function(){var t=this;return this.initialized?r.read(function(){t._width=t.sandboxEl.offsetWidth,t._height=t.sandboxEl.offsetHeight}):u.resolve()}),t.define("setTitle",function(t){this.iframeEl.title=t}),t.define("makeVisible",function(){return this.styleSelf(f)}),t.define("didResize",function(){var t=this,e=t._resizeHandlers.length>0;return this.updateCachedDimensions().then(function(){e&&t._resizeHandlers.forEach(function(e){e(t)})})}),t.define("loadDocument",function(t){var e=new a;return this.initialized?this.iframeEl.src?u.reject(new Error("widget already loaded")):(this.iframeEl.addEventListener("load",e.resolve,!1),this.iframeEl.addEventListener("error",e.reject,!1),this.iframeEl.src=t,e.promise):u.reject(new Error("sandbox not initialized"))}),t.after("initialize",function(){this._iframe=null,this._width=this._height=0,this._resizeHandlers=[]}),t.override("insert",function(t,e,n,i){var a=this;return e=d.aug({id:t},e),n=d.aug({},l,n),this._iframe=s(e,n),h[t]=this,this.onResize(o(function(){a.makeVisible()})),r.write(c(i,null,this._iframe))}),t.override("onResize",function(t){this._resizeHandlers.push(t)}),t.after("styleSelf",function(){return this.updateCachedDimensions()})}},function(t,e,n){var r=n(1),i=n(127),o=n(129),s=n(24),a=n(5),u=n(130);t.exports=function(t){function e(t,e){var n=u(this);s.trigger(t,{target:n,region:e,type:t,data:{}})}function n(e){var n=u(this),r=n&&n.id,i=a.asInt(e.width),o=a.asInt(e.height);r&&void 0!==i&&void 0!==o&&t(r,i,o)}(new i).attachReceiver(new o.Receiver(r,"twttr.button")).bind("twttr.private.trigger",e).bind("twttr.private.resizeButton",n),(new i).attachReceiver(new o.Receiver(r,"twttr.embed")).bind("twttr.private.trigger",e).bind("twttr.private.rendered",n).bind("twttr.private.resize",n)}},function(t,e,n){var r=n(31),i=n(128),o=n(0),s=n(6),a=n(22),u="2.0";function c(t){this.registry=t||{}}function d(t){var e,n;return e=o.isType("string",t),n=o.isType("number",t),e||n||null===t}function l(t,e){return{jsonrpc:u,id:d(t)?t:null,error:e}}c.prototype._invoke=function(t,e){var n,r,i;n=this.registry[t.method],r=t.params||[],r=o.isType("array",r)?r:[r];try{i=n.apply(e.source||null,r)}catch(t){i=s.reject(t.message)}return a.isPromise(i)?i:s.resolve(i)},c.prototype._processRequest=function(t,e){var n,r;return function(t){var e,n,r;return!!o.isObject(t)&&(e=t.jsonrpc===u,n=o.isType("string",t.method),r=!("id"in t)||d(t.id),e&&n&&r)}(t)?(n="params"in t&&(r=t.params,!o.isObject(r)||o.isType("function",r))?s.resolve(l(t.id,i.INVALID_PARAMS)):this.registry[t.method]?this._invoke(t,{source:e}).then(function(e){return n=t.id,{jsonrpc:u,id:n,result:e};var n},function(){return l(t.id,i.INTERNAL_ERROR)}):s.resolve(l(t.id,i.METHOD_NOT_FOUND)),null!=t.id?n:s.resolve()):s.resolve(l(t.id,i.INVALID_REQUEST))},c.prototype.attachReceiver=function(t){return t.attachTo(this),this},c.prototype.bind=function(t,e){return this.registry[t]=e,this},c.prototype.receive=function(t,e){var n,a,u,c=this;try{u=t,t=o.isType("string",u)?r.parse(u):u}catch(t){return s.resolve(l(null,i.PARSE_ERROR))}return e=e||null,a=((n=o.isType("array",t))?t:[t]).map(function(t){return c._processRequest(t,e)}),n?function(t){return s.all(t).then(function(t){return(t=t.filter(function(t){return void 0!==t})).length?t:void 0})}(a):a[0]},t.exports=c},function(t){t.exports={PARSE_ERROR:{code:-32700,message:"Parse error"},INVALID_REQUEST:{code:-32600,message:"Invalid Request"},INVALID_PARAMS:{code:-32602,message:"Invalid params"},METHOD_NOT_FOUND:{code:-32601,message:"Method not found"},INTERNAL_ERROR:{code:-32603,message:"Internal error"}}},function(t,e,n){var r=n(8),i=n(1),o=n(31),s=n(2),a=n(21),u=n(0),c=n(3),d=n(7),l=a.ie9();function f(t,e,n){var r;t&&t.postMessage&&(l?r=(n||"")+o.stringify(e):n?(r={})[n]=e:r=e,t.postMessage(r,"*"))}function h(t){return u.isType("string",t)?t:"JSONRPC"}function p(t,e){return e?u.isType("string",t)&&0===t.indexOf(e)?t.substring(e.length):t&&t[e]?t[e]:void 0:t}function m(t,e){var n=t.document;this.filter=h(e),this.server=null,this.isTwitterFrame=c.isTwitterURL(n.location.href),t.addEventListener("message",d(this._onMessage,this),!1)}function v(t,e){this.pending={},this.target=t,this.isTwitterHost=c.isTwitterURL(r.href),this.filter=h(e),i.addEventListener("message",d(this._onMessage,this),!1)}u.aug(m.prototype,{_onMessage:function(t){var e,n=this;this.server&&(this.isTwitterFrame&&!c.isTwitterURL(t.origin)||(e=p(t.data,this.filter))&&this.server.receive(e,t.source).then(function(e){e&&f(t.source,e,n.filter)}))},attachTo:function(t){this.server=t},detach:function(){this.server=null}}),u.aug(v.prototype,{_processResponse:function(t){var e=this.pending[t.id];e&&(e.resolve(t),delete this.pending[t.id])},_onMessage:function(t){var e;if((!this.isTwitterHost||c.isTwitterURL(t.origin))&&(e=p(t.data,this.filter))){if(u.isType("string",e))try{e=o.parse(e)}catch(t){return}(e=u.isType("array",e)?e:[e]).forEach(d(this._processResponse,this))}},send:function(t){var e=new s;return t.id?this.pending[t.id]=e:e.resolve(),f(this.target,t,this.filter),e.promise}}),t.exports={Receiver:m,Dispatcher:v,_stringifyPayload:function(t){return arguments.length>0&&(l=!!t),l}}},function(t,e,n){var r=n(4);t.exports=function(t){for(var e,n=r.getElementsByTagName("iframe"),i=0;n[i];i++)if((e=n[i]).contentWindow===t)return e}},function(t,e,n){var r=n(5),i=n(0),o=n(3),s=n(13),a=n(14)(),u=n(64),c="a.twitter-moment";t.exports=function(t){return a(t,c).map(function(t){return u(function(t){var e=s(t),n={momentId:o.momentId(t.href),chrome:t.getAttribute("data-chrome"),limit:t.getAttribute("data-limit")};return i.forIn(n,function(t,n){var i=e[t];e[t]=r.hasValue(i)?i:n}),e}(t),t.parentNode,t)})}},function(t,e,n){var r=n(2);t.exports=function(t,e){var i=new r;return Promise.all([n.e(0),n.e(4)]).then(function(r){var o;try{o=n(88),i.resolve(new o(t,e))}catch(t){i.reject(t)}}.bind(null,n)).catch(function(t){i.reject(t)}),i.promise}},function(t,e,n){var r=n(0),i=n(13),o=n(14)(),s=n(65),a="a.periscope-on-air",u=/^https?:\/\/(?:www\.)?(?:periscope|pscp)\.tv\/@?([a-zA-Z0-9_]+)\/?$/i;t.exports=function(t){return o(t,a).map(function(t){return s(function(t){var e=i(t),n=t.getAttribute("href"),o=t.getAttribute("data-size"),s=u.exec(n)[1];return r.aug(e,{username:s,size:o})}(t),t.parentNode,t)})}},function(t,e,n){var r=n(2);t.exports=function(t,e){var i=new r;return n.e(5).then(function(r){var o;try{o=n(89),i.resolve(new o(t,e))}catch(t){i.reject(t)}}.bind(null,n)).catch(function(t){i.reject(t)}),i.promise}},function(t,e,n){var r=n(5),i=n(0),o=n(66),s=n(13),a=n(14)(),u=n(67),c=n(3),d=n(12),l="a.twitter-timeline,div.twitter-timeline,a.twitter-grid",f="Embedded Search timelines have been deprecated. See https://twittercommunity.com/t/deprecating-widget-settings/102295.",h="You may have been affected by an update to settings in embedded timelines. See https://twittercommunity.com/t/deprecating-widget-settings/102295.",p="Embedded grids have been deprecated and will now render as timelines. Please update your embed code to use the twitter-timeline class. More info: https://twittercommunity.com/t/update-on-the-embedded-grid-display-type/119564.";t.exports=function(t){return a(t,l).map(function(t){return u(function(t){var e=s(t),n=t.getAttribute("data-show-replies"),a={isPreconfigured:!!t.getAttribute("data-widget-id"),chrome:t.getAttribute("data-chrome"),tweetLimit:t.getAttribute("data-tweet-limit")||t.getAttribute("data-limit"),ariaLive:t.getAttribute("data-aria-polite"),theme:t.getAttribute("data-theme"),linkColor:t.getAttribute("data-link-color"),borderColor:t.getAttribute("data-border-color"),showReplies:n?r.asBoolean(n):null,profileScreenName:t.getAttribute("data-screen-name"),profileUserId:t.getAttribute("data-user-id"),favoritesScreenName:t.getAttribute("data-favorites-screen-name"),favoritesUserId:t.getAttribute("data-favorites-user-id"),likesScreenName:t.getAttribute("data-likes-screen-name"),likesUserId:t.getAttribute("data-likes-user-id"),listOwnerScreenName:t.getAttribute("data-list-owner-screen-name"),listOwnerUserId:t.getAttribute("data-list-owner-id"),listId:t.getAttribute("data-list-id"),listSlug:t.getAttribute("data-list-slug"),customTimelineId:t.getAttribute("data-custom-timeline-id"),staticContent:t.getAttribute("data-static-content"),url:t.href};return a.isPreconfigured&&(c.isSearchUrl(a.url)?d.publicError(f,t):d.publicLog(h,t)),"twitter-grid"===t.className&&d.publicLog(p,t),(a=i.aug(a,e)).dataSource=o(a),a.id=a.dataSource&&a.dataSource.id,a}(t),t.parentNode,t)})}},function(t,e,n){var r=n(27);t.exports=r.build([n(28),n(139)])},function(t,e,n){var r=n(0),i=n(138);t.exports=function(t){return"en"===t||r.contains(i,t)}},function(t,e){t.exports=["hi","zh-cn","fr","zh-tw","msa","fil","fi","sv","pl","ja","ko","de","it","pt","es","ru","id","tr","da","no","nl","hu","fa","ar","ur","he","th","cs","uk","vi","ro","bn","el","en-gb","gu","kn","mr","ta","bg","ca","hr","sr","sk"]},function(t,e,n){var r=n(3),i=n(0),o=n(19),s="collection:";function a(t,e){return r.collectionId(t)||e}t.exports=function(t){t.params({id:{},url:{}}),t.overrideProperty("id",{get:function(){var t=a(this.params.url,this.params.id);return s+t}}),t.overrideProperty("endpoint",{get:function(){return o.timeline(["collection"])}}),t.around("queryParams",function(t){return i.aug(t(),{collection_id:a(this.params.url,this.params.id)})}),t.before("initialize",function(){if(!a(this.params.url,this.params.id))throw new Error("one of url or id is required")})}},function(t,e,n){var r=n(27);t.exports=r.build([n(28),n(141)])},function(t,e,n){var r=n(3),i=n(0),o=n(19),s="event:";function a(t,e){return r.eventId(t)||e}t.exports=function(t){t.params({id:{},url:{}}),t.overrideProperty("id",{get:function(){var t=a(this.params.url,this.params.id);return s+t}}),t.overrideProperty("endpoint",{get:function(){return o.timeline(["event"])}}),t.around("queryParams",function(t){return i.aug(t(),{event_id:a(this.params.url,this.params.id)})}),t.before("initialize",function(){if(!a(this.params.url,this.params.id))throw new Error("one of url or id is required")})}},function(t,e,n){var r=n(27);t.exports=r.build([n(28),n(143)])},function(t,e,n){var r=n(3),i=n(0),o=n(19),s="likes:";function a(t){return r.likesScreenName(t.url)||t.screenName}t.exports=function(t){t.params({screenName:{},userId:{},url:{}}),t.overrideProperty("id",{get:function(){var t=a(this.params)||this.params.userId;return s+t}}),t.overrideProperty("endpoint",{get:function(){return o.timeline(["likes"])}}),t.define("_getLikesQueryParam",function(){var t=a(this.params);return t?{screen_name:t}:{user_id:this.params.userId}}),t.around("queryParams",function(t){return i.aug(t(),this._getLikesQueryParam())}),t.before("initialize",function(){if(!a(this.params)&&!this.params.userId)throw new Error("screen name or user id is required")})}},function(t,e,n){var r=n(27);t.exports=r.build([n(28),n(145)])},function(t,e,n){var r=n(3),i=n(0),o=n(19),s="list:";function a(t){var e=r.listScreenNameAndSlug(t.url)||t;return i.compact({screen_name:e.ownerScreenName,user_id:e.ownerUserId,list_slug:e.slug})}t.exports=function(t){t.params({id:{},ownerScreenName:{},ownerUserId:{},slug:{},url:{}}),t.overrideProperty("id",{get:function(){var t,e,n;return this.params.id?s+this.params.id:(e=(t=a(this.params))&&t.list_slug.replace(/-/g,"_"),n=t&&(t.screen_name||t.user_id),s+(n+":")+e)}}),t.overrideProperty("endpoint",{get:function(){return o.timeline(["list"])}}),t.define("_getListQueryParam",function(){return this.params.id?{list_id:this.params.id}:a(this.params)}),t.around("queryParams",function(t){return i.aug(t(),this._getListQueryParam())}),t.before("initialize",function(){var t=a(this.params);if(i.isEmptyObject(t)&&!this.params.id)throw new Error("qualified slug or list id required")})}},function(t,e,n){var r=n(27);t.exports=r.build([n(28),n(147)])},function(t,e,n){var r=n(3),i=n(5),o=n(0),s=n(19),a="profile:";function u(t,e){return r.screenName(t)||e}t.exports=function(t){t.params({showReplies:{fallback:!1,transform:i.asBoolean},screenName:{},userId:{},url:{}}),t.overrideProperty("id",{get:function(){var t=u(this.params.url,this.params.screenName);return a+(t||this.params.userId)}}),t.overrideProperty("endpoint",{get:function(){return s.timeline(["profile"])}}),t.define("_getProfileQueryParam",function(){var t=u(this.params.url,this.params.screenName),e=t?{screen_name:t}:{user_id:this.params.userId};return o.aug(e,{with_replies:this.params.showReplies?"true":"false"})}),t.around("queryParams",function(t){return o.aug(t(),this._getProfileQueryParam())}),t.before("initialize",function(){if(!u(this.params.url,this.params.screenName)&&!this.params.userId)throw new Error("screen name or user id is required")})}},function(t,e,n){var r=n(2);t.exports=function(t,e){var i=new r;return Promise.all([n.e(0),n.e(6)]).then(function(r){var o;try{o=n(90),i.resolve(new o(t,e))}catch(t){i.reject(t)}}.bind(null,n)).catch(function(t){i.reject(t)}),i.promise}},function(t,e,n){var r=n(10),i=n(3),o=n(0),s=n(13),a=n(14)(),u=n(68),c="blockquote.twitter-tweet, blockquote.twitter-video",d=/\btw-align-(left|right|center)\b/;t.exports=function(t,e){return a(t,c).map(function(t){return u(function(t){var e=s(t),n=t.getElementsByTagName("A"),a=n&&n[n.length-1],u=a&&i.status(a.href),c=t.getAttribute("data-conversation"),l="none"==c||"hidden"==c||r.present(t,"tw-hide-thread"),f=t.getAttribute("data-cards"),h="none"==f||"hidden"==f||r.present(t,"tw-hide-media"),p=t.getAttribute("data-align")||t.getAttribute("align"),m=t.getAttribute("data-link-color"),v=t.getAttribute("data-theme");return!p&&d.test(t.className)&&(p=RegExp.$1),o.aug(e,{tweetId:u,hideThread:l,hideCard:h,align:p,linkColor:m,theme:v,id:u})}(t),t.parentNode,t,e)})}},function(t,e,n){var r=n(2);t.exports=function(t,e){var i=new r;return Promise.all([n.e(0),n.e(7)]).then(function(r){var o;try{o=n(91),i.resolve(new o(t,e))}catch(t){i.reject(t)}}.bind(null,n)).catch(function(t){i.reject(t)}),i.promise}},function(t,e,n){var r=n(2);t.exports=function(t,e){var i=new r;return Promise.all([n.e(0),n.e(7)]).then(function(r){var o;try{o=n(92),i.resolve(new o(t,e))}catch(t){i.reject(t)}}.bind(null,n)).catch(function(t){i.reject(t)}),i.promise}},function(t,e,n){var r=n(10),i=n(0),o=n(13),s=n(14)(),a=n(69),u=n(5),c="a.twitter-share-button, a.twitter-mention-button, a.twitter-hashtag-button",d="twitter-hashtag-button",l="twitter-mention-button";t.exports=function(t){return s(t,c).map(function(t){return a(function(t){var e=o(t),n={screenName:t.getAttribute("data-button-screen-name"),text:t.getAttribute("data-text"),type:t.getAttribute("data-type"),size:t.getAttribute("data-size"),url:t.getAttribute("data-url"),hashtags:t.getAttribute("data-hashtags"),via:t.getAttribute("data-via"),buttonHashtag:t.getAttribute("data-button-hashtag")};return i.forIn(n,function(t,n){var r=e[t];e[t]=u.hasValue(r)?r:n}),e.screenName=e.screenName||e.screen_name,e.buttonHashtag=e.buttonHashtag||e.button_hashtag||e.hashtag,r.present(t,d)&&(e.type="hashtag"),r.present(t,l)&&(e.type="mention"),e}(t),t.parentNode,t)})}},function(t,e,n){var r=n(2);t.exports=function(t,e){var i=new r;return n.e(3).then(function(r){var o;try{o=n(93),i.resolve(new o(t,e))}catch(t){i.reject(t)}}.bind(null,n)).catch(function(t){i.reject(t)}),i.promise}},function(t,e,n){var r=n(0);t.exports=r.aug({},n(155),n(156),n(157),n(158),n(159),n(160),n(161))},function(t,e,n){var r=n(60),i=n(17)(["userId"],{},r);t.exports={createDMButton:i}},function(t,e,n){var r=n(63),i=n(17)(["screenName"],{},r);t.exports={createFollowButton:i}},function(t,e,n){var r=n(64),i=n(17)(["momentId"],{},r);t.exports={createMoment:i}},function(t,e,n){var r=n(65),i=n(17)(["username"],{},r);t.exports={createPeriscopeOnAirButton:i}},function(t,e,n){var r=n(8),i=n(12),o=n(3),s=n(0),a=n(5),u=n(66),c=n(67),d=n(17)([],{},c),l=n(6),f="Embedded grids have been deprecated. Please use twttr.widgets.createTimeline instead. More info: https://twittercommunity.com/t/update-on-the-embedded-grid-display-type/119564.",h={createTimeline:p,createGridFromCollection:function(t){var e=s.toRealArray(arguments).slice(1),n={sourceType:"collection",id:t};return e.unshift(n),i.publicLog(f),p.apply(this,e)}};function p(t){var e,n=s.toRealArray(arguments).slice(1);return a.isString(t)||a.isNumber(t)?l.reject("Embedded timelines with widget settings have been deprecated. See https://twittercommunity.com/t/deprecating-widget-settings/102295."):s.isObject(t)?(t=t||{},n.forEach(function(t){s.isType("object",t)&&function(t){t.ariaLive=t.ariaPolite}(e=t)}),e||(e={},n.push(e)),t.lang=e.lang,t.tweetLimit=e.tweetLimit,t.showReplies=e.showReplies,e.dataSource=u(t),d.apply(this,n)):l.reject("data source must be an object.")}o.isTwitterURL(r.href)&&(h.createTimelinePreview=function(t,e,n){var r={previewParams:t,useLegacyDefaults:!0,isPreviewTimeline:!0};return r.dataSource=u(r),d(e,r,n)}),t.exports=h},function(t,e,n){var r,i=n(0),o=n(68),s=n(17),a=(r=s(["tweetId"],{},o),function(){return i.toRealArray(arguments).slice(1).forEach(function(t){i.isType("object",t)&&(t.hideCard="none"==t.cards||"hidden"==t.cards,t.hideThread="none"==t.conversation||"hidden"==t.conversation)}),r.apply(this,arguments)});t.exports={createTweet:a,createTweetEmbed:a,createVideo:a}},function(t,e,n){var r=n(0),i=n(69),o=n(17),s=o(["url"],{type:"share"},i),a=o(["buttonHashtag"],{type:"hashtag"},i),u=o(["screenName"],{type:"mention"},i);function c(t){return function(){return r.toRealArray(arguments).slice(1).forEach(function(t){r.isType("object",t)&&(t.screenName=t.screenName||t.screen_name,t.buttonHashtag=t.buttonHashtag||t.button_hashtag||t.hashtag)}),t.apply(this,arguments)}}t.exports={createShareButton:c(s),createHashtagButton:c(a),createMentionButton:c(u)}},function(t,e,n){var r,i,o,s=n(4),a=n(1),u=0,c=[],d=s.createElement("a");function l(){var t,e;for(u=1,t=0,e=c.length;t<e;t++)c[t]()}/^loade|c/.test(s.readyState)&&(u=1),s.addEventListener&&s.addEventListener("DOMContentLoaded",i=function(){s.removeEventListener("DOMContentLoaded",i,!1),l()},!1),d.doScroll&&s.attachEvent("onreadystatechange",r=function(){/^c/.test(s.readyState)&&(s.detachEvent("onreadystatechange",r),l())}),o=d.doScroll?function(t){a.self!=a.top?u?t():c.push(t):function(){try{d.doScroll("left")}catch(e){return setTimeout(function(){o(t)},50)}t()}()}:function(t){u?t():c.push(t)},t.exports=o},function(t,e,n){var r=n(44),i=n(9);t.exports=function(){i.set("buildVersion",r.version)}},function(t,e,n){n(165),n(85),n(168)},function(t,e,n){var r=n(166),i=n(29),o=n(70),s=new r,a=function(t){t.widgets&&1===t.widgets.length&&(s.start(),i.emitter.unbind(i.ALL_WIDGETS_RENDER_START,a))},u=function(t){var e;t.widgets&&1===t.widgets.length&&(e=t.widgets[0],s.end(),e.dataset&&e.dataset.tweetId&&o({duration:s.duration(),namespace:{element:"tweet",action:"render"},widgetIds:[e.dataset.tweetId]})),i.emitter.unbind(i.ALL_WIDGETS_RENDER_END,u)};i.emitter.bind(i.ALL_WIDGETS_RENDER_START,a),i.emitter.bind(i.ALL_WIDGETS_RENDER_END,u)},function(t,e,n){var r=n(167);function i(){}i.prototype.start=function(){this._startTime=r()},i.prototype.end=function(){this._duration=r()-this._startTime},i.prototype.duration=function(){return this._duration},t.exports=i},function(t,e,n){var r=n(1);t.exports=function(){return r.performance&&r.performance.now?r.performance.now():Date.now()}},function(t,e,n){var r=n(29),i=n(70),o=n(169),s=n(3),a=n(1),u=n(0),c=n(21),d=n(62);function l(t){return t.performance.getEntriesByType("resource").filter(function(t){return s.isTwimgURL(t.name)||s.isTwitterURL(t.name)}).reduce(function(t,e){return t[e.name]=e.duration,t},{})}r.emitter.bind(r.ALL_WIDGETS_AND_IMAGES_LOADED,function(t){var e,n,r=[];c.hasPerformanceInformation()&&(e=l(a),d.isSupported()||(r=function(t){return t.reduce(function(t,e){return u.aug(t,l(e.contentDocument.defaultView))},{})}(t)),n=u.aug({},e,r),Object.keys(o).forEach(function(t){!function(t,e,n){var r=Object.keys(t).reduce(function(e,r){return n(r)?e+t[r]:e},0);i({duration:r,namespace:{element:e,action:"resource"}})}(n,t,o[t])}))})},function(t,e,n){var r=n(3),i={all:function(){return!0},image:function(t){return r.isTwimgURL(t)},settings:function(t){return r.isSettingsURL(t)},widget_iframe:function(t){return r.isWidgetIframeURL(t)}};t.exports=i}])));
            }
        });

        var ctfFeeds = {};

        function ctfCreateFeed(ctfEl,checks) {
            var feed = {
                tcLinksToCheck : ctfEl.find('.ctf-check-link').length,
                element : ctfEl,
                checksRemaining : checks
            };
            return feed;
        }

        //Runs every time new tweets are loaded
        function ctfScripts($ctf) {

            var ctfIsMasonry = $ctf.hasClass('ctf-masonry'),
                imageCols = $ctf.attr('data-ctfimagecols'),
                feedWidth = parseInt($ctf.find('.ctf-tweet-media').innerWidth()),
                maxMedia = parseInt($ctf.attr('data-ctfmaxmedia'));


            //Loop through each newly loaded tweet
            $ctf.find('.ctf-item.ctf-new').each(function () {

                var $ctfItem = $(this),
                    $ctfText = $ctfItem.find('.ctf-tweet-text'),
                    ctfTextStr = ' ' + $ctfText.html(),
                    ctfLinkColor = $ctf.attr('data-ctflinktextcolor'),
                    ctfLinkColorHex = '',
                    numMedia = $(this).find('.ctf-tweet-media a').length,
                    visibleMedia = Math.min(numMedia, maxMedia);

                if ($ctfItem.find('.ctf-image img').length && $ctfItem.find('.ctf-image img').attr('data-ctfsizes') !== 'full' ) {
                    $ctfItem.find('.ctf-image img').each(function(index) {
                        $(this).attr('src', getImageSource(imageCols, $(this).attr('src'), visibleMedia, feedWidth, $(this).attr('data-ctfsizes'), index));
                    });
                }

                if (ctfLinkColor) ctfLinkColorHex = ctfLinkColor.replace(';', '').split("#")[1];

                //Link URLs
                window.ctfLinkify = (function () {
                    var k = "[a-z\\d.-]+://", h = "(?:(?:[0-9]|[1-9]\\d|1\\d{2}|2[0-4]\\d|25[0-5])\\.){3}(?:[0-9]|[1-9]\\d|1\\d{2}|2[0-4]\\d|25[0-5])", c = "(?:(?:[^\\s!@#$%^&*()_=+[\\]{}\\\\|;:'\",.<>/?]+)\\.)+", n = "(?:ac|ad|aero|ae|af|ag|ai|al|am|an|ao|aq|arpa|ar|asia|as|at|au|aw|ax|az|ba|bb|bd|be|bf|bg|bh|biz|bi|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|cat|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|coop|com|co|cr|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gg|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|im|info|int|in|io|iq|ir|is|it|je|jm|jobs|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|me|mg|mh|mil|mk|ml|mm|mn|mobi|mo|mp|mq|mr|ms|mt|museum|mu|mv|mw|mx|my|mz|name|na|nc|net|ne|nf|ng|ni|nl|no|np|nr|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pro|pr|ps|pt|pw|py|qa|re|ro|rs|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tel|tf|tg|th|tj|tk|tl|tm|tn|to|tp|travel|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|xn--0zwm56d|xn--11b5bs3a9aj6g|xn--80akhbyknj4f|xn--9t4b11yi5a|xn--deba0ad|xn--g6w251d|xn--hgbk6aj7f53bba|xn--hlcj6aya9esc7a|xn--jxalpdlp|xn--kgbechtv|xn--zckzah|ye|yt|yu|za|zm|zw)", f = "(?:" + c + n + "|" + h + ")", o = "(?:[;/][^#?<>\\s]*)?", e = "(?:\\?[^#<>\\s]*)?(?:#[^<>\\s]*)?", d = "\\b" + k + "[^<>\\s]+", a = "\\b" + f + o + e + "(?!\\w)", m = "mailto:", j = "(?:" + m + ")?[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@" + f + e + "(?!\\w)", l = new RegExp("(?:" + d + "|" + a + "|" + j + ")", "ig"), g = new RegExp("^" + k, "i"), b = {
                        "'": "`",
                        ">": "<",
                        ")": "(",
                        "]": "[",
                        "}": "{",
                        "B;": "B+",
                        "b:": "b9"
                    }, i = {
                        callback: function (q, p) {
                            return p ? '<a href="' + p + '" title="' + p + '" target="_blank">' + q + "</a>" : q
                        }, punct_regexp: /(?:[!?.,:;'"]|(?:&|&amp;)(?:lt|gt|quot|apos|raquo|laquo|rsaquo|lsaquo);)$/
                    };
                    return function (u, z) {
                        z = z || {};
                        var w, v, A, p, x = "", t = [], s, E, C, y, q, D, B, r;
                        for (v in i) {
                            if (z[v] === undefined) {
                                z[v] = i[v]
                            }
                        }
                        while (w = l.exec(u)) {
                            A = w[0];
                            E = l.lastIndex;
                            C = E - A.length;
                            if (/[\/:]/.test(u.charAt(C - 1))) {
                                continue
                            }
                            do {
                                y = A;
                                r = A.substr(-1);
                                B = b[r];
                                if (B) {
                                    q = A.match(new RegExp("\\" + B + "(?!$)", "g"));
                                    D = A.match(new RegExp("\\" + r, "g"));
                                    if ((q ? q.length : 0) < (D ? D.length : 0)) {
                                        A = A.substr(0, A.length - 1);
                                        E--
                                    }
                                }
                                if (z.punct_regexp) {
                                    A = A.replace(z.punct_regexp, function (F) {
                                        E -= F.length;
                                        return ""
                                    })
                                }
                            } while (A.length && A !== y);
                            p = A;
                            if (!g.test(p)) {
                                p = (p.indexOf("@") !== -1 ? (!p.indexOf(m) ? "" : m) : !p.indexOf("irc.") ? "irc://" : !p.indexOf("ftp.") ? "ftp://" : "http://") + p
                            }
                            if (s != C) {
                                t.push([u.slice(s, C)]);
                                s = E
                            }
                            t.push([A, p])
                        }
                        t.push([u.substr(s)]);
                        for (v = 0; v < t.length; v++) {
                            x += z.callback.apply(window, t[v])
                        }
                        return x || u
                    }
                })();
                ctfTextStr = ctfLinkify(ctfTextStr);

                //Link hashtags
                var ctfHashRegex = /(^|\s)#(\w*[\u0041-\u005A\u0061-\u007A\u00AA\u00B5\u00BA\u00C0-\u00D6\u00D8-\u00F6\u00F8-\u02C1\u02C6-\u02D1\u02E0-\u02E4\u02EC\u02EE\u0370-\u0374\u0376\u0377\u037A-\u037D\u0386\u0388-\u038A\u038C\u038E-\u03A1\u03A3-\u03F5\u03F7-\u0481\u048A-\u0527\u0531-\u0556\u0559\u0561-\u0587\u05D0-\u05EA\u05F0-\u05F2\u0620-\u064A\u066E\u066F\u0671-\u06D3\u06D5\u06E5\u06E6\u06EE\u06EF\u06FA-\u06FC\u06FF\u0710\u0712-\u072F\u074D-\u07A5\u07B1\u07CA-\u07EA\u07F4\u07F5\u07FA\u0800-\u0815\u081A\u0824\u0828\u0840-\u0858\u08A0\u08A2-\u08AC\u0904-\u0939\u093D\u0950\u0958-\u0961\u0971-\u0977\u0979-\u097F\u0985-\u098C\u098F\u0990\u0993-\u09A8\u09AA-\u09B0\u09B2\u09B6-\u09B9\u09BD\u09CE\u09DC\u09DD\u09DF-\u09E1\u09F0\u09F1\u0A05-\u0A0A\u0A0F\u0A10\u0A13-\u0A28\u0A2A-\u0A30\u0A32\u0A33\u0A35\u0A36\u0A38\u0A39\u0A59-\u0A5C\u0A5E\u0A72-\u0A74\u0A85-\u0A8D\u0A8F-\u0A91\u0A93-\u0AA8\u0AAA-\u0AB0\u0AB2\u0AB3\u0AB5-\u0AB9\u0ABD\u0AD0\u0AE0\u0AE1\u0B05-\u0B0C\u0B0F\u0B10\u0B13-\u0B28\u0B2A-\u0B30\u0B32\u0B33\u0B35-\u0B39\u0B3D\u0B5C\u0B5D\u0B5F-\u0B61\u0B71\u0B83\u0B85-\u0B8A\u0B8E-\u0B90\u0B92-\u0B95\u0B99\u0B9A\u0B9C\u0B9E\u0B9F\u0BA3\u0BA4\u0BA8-\u0BAA\u0BAE-\u0BB9\u0BD0\u0C05-\u0C0C\u0C0E-\u0C10\u0C12-\u0C28\u0C2A-\u0C33\u0C35-\u0C39\u0C3D\u0C58\u0C59\u0C60\u0C61\u0C85-\u0C8C\u0C8E-\u0C90\u0C92-\u0CA8\u0CAA-\u0CB3\u0CB5-\u0CB9\u0CBD\u0CDE\u0CE0\u0CE1\u0CF1\u0CF2\u0D05-\u0D0C\u0D0E-\u0D10\u0D12-\u0D3A\u0D3D\u0D4E\u0D60\u0D61\u0D7A-\u0D7F\u0D85-\u0D96\u0D9A-\u0DB1\u0DB3-\u0DBB\u0DBD\u0DC0-\u0DC6\u0E01-\u0E30\u0E32\u0E33\u0E40-\u0E46\u0E81\u0E82\u0E84\u0E87\u0E88\u0E8A\u0E8D\u0E94-\u0E97\u0E99-\u0E9F\u0EA1-\u0EA3\u0EA5\u0EA7\u0EAA\u0EAB\u0EAD-\u0EB0\u0EB2\u0EB3\u0EBD\u0EC0-\u0EC4\u0EC6\u0EDC-\u0EDF\u0F00\u0F40-\u0F47\u0F49-\u0F6C\u0F88-\u0F8C\u1000-\u102A\u103F\u1050-\u1055\u105A-\u105D\u1061\u1065\u1066\u106E-\u1070\u1075-\u1081\u108E\u10A0-\u10C5\u10C7\u10CD\u10D0-\u10FA\u10FC-\u1248\u124A-\u124D\u1250-\u1256\u1258\u125A-\u125D\u1260-\u1288\u128A-\u128D\u1290-\u12B0\u12B2-\u12B5\u12B8-\u12BE\u12C0\u12C2-\u12C5\u12C8-\u12D6\u12D8-\u1310\u1312-\u1315\u1318-\u135A\u1380-\u138F\u13A0-\u13F4\u1401-\u166C\u166F-\u167F\u1681-\u169A\u16A0-\u16EA\u1700-\u170C\u170E-\u1711\u1720-\u1731\u1740-\u1751\u1760-\u176C\u176E-\u1770\u1780-\u17B3\u17D7\u17DC\u1820-\u1877\u1880-\u18A8\u18AA\u18B0-\u18F5\u1900-\u191C\u1950-\u196D\u1970-\u1974\u1980-\u19AB\u19C1-\u19C7\u1A00-\u1A16\u1A20-\u1A54\u1AA7\u1B05-\u1B33\u1B45-\u1B4B\u1B83-\u1BA0\u1BAE\u1BAF\u1BBA-\u1BE5\u1C00-\u1C23\u1C4D-\u1C4F\u1C5A-\u1C7D\u1CE9-\u1CEC\u1CEE-\u1CF1\u1CF5\u1CF6\u1D00-\u1DBF\u1E00-\u1F15\u1F18-\u1F1D\u1F20-\u1F45\u1F48-\u1F4D\u1F50-\u1F57\u1F59\u1F5B\u1F5D\u1F5F-\u1F7D\u1F80-\u1FB4\u1FB6-\u1FBC\u1FBE\u1FC2-\u1FC4\u1FC6-\u1FCC\u1FD0-\u1FD3\u1FD6-\u1FDB\u1FE0-\u1FEC\u1FF2-\u1FF4\u1FF6-\u1FFC\u2071\u207F\u2090-\u209C\u2102\u2107\u210A-\u2113\u2115\u2119-\u211D\u2124\u2126\u2128\u212A-\u212D\u212F-\u2139\u213C-\u213F\u2145-\u2149\u214E\u2183\u2184\u2C00-\u2C2E\u2C30-\u2C5E\u2C60-\u2CE4\u2CEB-\u2CEE\u2CF2\u2CF3\u2D00-\u2D25\u2D27\u2D2D\u2D30-\u2D67\u2D6F\u2D80-\u2D96\u2DA0-\u2DA6\u2DA8-\u2DAE\u2DB0-\u2DB6\u2DB8-\u2DBE\u2DC0-\u2DC6\u2DC8-\u2DCE\u2DD0-\u2DD6\u2DD8-\u2DDE\u2E2F\u3005\u3006\u3031-\u3035\u303B\u303C\u3041-\u3096\u309D-\u309F\u30A1-\u30FA\u30FC-\u30FF\u3105-\u312D\u3131-\u318E\u31A0-\u31BA\u31F0-\u31FF\u3400-\u4DB5\u4E00-\u9FCC\uA000-\uA48C\uA4D0-\uA4FD\uA500-\uA60C\uA610-\uA61F\uA62A\uA62B\uA640-\uA66E\uA67F-\uA697\uA6A0-\uA6E5\uA717-\uA71F\uA722-\uA788\uA78B-\uA78E\uA790-\uA793\uA7A0-\uA7AA\uA7F8-\uA801\uA803-\uA805\uA807-\uA80A\uA80C-\uA822\uA840-\uA873\uA882-\uA8B3\uA8F2-\uA8F7\uA8FB\uA90A-\uA925\uA930-\uA946\uA960-\uA97C\uA984-\uA9B2\uA9CF\uAA00-\uAA28\uAA40-\uAA42\uAA44-\uAA4B\uAA60-\uAA76\uAA7A\uAA80-\uAAAF\uAAB1\uAAB5\uAAB6\uAAB9-\uAABD\uAAC0\uAAC2\uAADB-\uAADD\uAAE0-\uAAEA\uAAF2-\uAAF4\uAB01-\uAB06\uAB09-\uAB0E\uAB11-\uAB16\uAB20-\uAB26\uAB28-\uAB2E\uABC0-\uABE2\uAC00-\uD7A3\uD7B0-\uD7C6\uD7CB-\uD7FB\uF900-\uFA6D\uFA70-\uFAD9\uFB00-\uFB06\uFB13-\uFB17\uFB1D\uFB1F-\uFB28\uFB2A-\uFB36\uFB38-\uFB3C\uFB3E\uFB40\uFB41\uFB43\uFB44\uFB46-\uFBB1\uFBD3-\uFD3D\uFD50-\uFD8F\uFD92-\uFDC7\uFDF0-\uFDFB\uFE70-\uFE74\uFE76-\uFEFC\uFF21-\uFF3A\uFF41-\uFF5A\uFF66-\uFFBE\uFFC2-\uFFC7\uFFCA-\uFFCF\uFFD2-\uFFD7\uFFDA-\uFFDC]+\w*)/gi;

                function ctfHashReplacer(hash) {
                    //Remove white space at beginning of hash
                    var replacementString = jQuery.trim(hash);
                    //If the hash is a hex code then don't replace it with a link as it's likely in the style attr, eg: "color: #ff0000"
                    if (/^#[0-9A-F]{6}$/i.test(replacementString)) {
                        return replacementString;
                    } else {
                        return ' <a href="https://twitter.com/hashtag/' + replacementString.substring(1) + '" target="_blank" rel="nofollow">' + replacementString + '</a>';
                    }
                }

                //Link @tags
                function ctfReplaceTags(tag) {
                    var replacementString = jQuery.trim(tag.replace('(','')),
                        slash = tag.indexOf('(') > -1 ? '(' : '';
                    return ' '+slash+'<a href="https://twitter.com/' + replacementString.substring(1) + '" target="_blank" rel="nofollow">' + replacementString + '</a>';
                }

                //Only add links if not disabled in settings
                if ($ctf.attr('data-ctfdisablelinks') != 'true' && typeof ctfTextStr !== 'undefined'  && ! $ctf.find('.ctf-tweet-text-link').length ) {

                    //Replace hashtags in text
                    if (ctfTextStr.length > 0) {
                        //Add a space after all <br> tags so that #hashtags immediately after them are also converted to hashtag links. Without the space they aren't captured by the regex.
                        ctfTextStr = ctfTextStr.replace(/<br>/g, "<br> ");
                        ctfTextStr = ctfTextStr.replace(ctfHashRegex, ctfHashReplacer);
                    }

                    var tagRegex = /[\s|(][@]+[A-Za-z0-9-_]+/g;
                    ctfTextStr = ctfTextStr.replace(tagRegex, ctfReplaceTags);

                    //Replace text with linked version
                    $ctfText.html(ctfTextStr.trim());

                    //Add link color
                    $ctfText.find('a').css('color', '#' + ctfLinkColorHex);

                    //Set color of Twitter card text
                    $ctfItem.find('.ctf-twitter-card').css('color', $ctfText.css('color'));

                } // End "ctfdata-disablelinks" check

                // shorten long urls in twee
                $ctfItem.find('.ctf-tweet-text a').each(function() {
                    if (jQuery(this).text().indexOf('http') > -1 && jQuery(this).text().length > 63) {
                        jQuery(this).text(jQuery(this).text().substring(0,60)+'...');
                    }
                });

                //Fade in links on hover
                $ctfItem.find('.ctf-tweet-content:not(.ctf-disable-lightbox) .ctf-tweet-media a').on({
                    mouseenter: function () {
                        $(this).find('.ctf-photo-hover').fadeIn(150);
                    },
                    mouseleave: function () {
                        $(this).find('.ctf-photo-hover').stop().fadeOut(500);
                    }
                });

                //Append more masonry items
                if (ctfIsMasonry && $ctf.attr('data-ctf-masonry-init') == 'true') $ctf.find('.ctf-tweets').ctfmasonry('appended', $ctfItem);

            }); // End .ctfItem loop

            //Adds a class if the feed is in a narrow column or on mobile so we can make styling adjustments
            ctfNarrowClass($ctf);

            //Change color of retweet icon to match text
            // $ctf.find('.ctf-retweet-icon').css({'background' : $ctf.find('.ctf-tweet-text a').css('color')}); //This doesn't work well if the link color is set to white as the default color of the icon text is also white

            //Change colors of some items to match tweet text
            $ctf.find('.ctf-author-name, .ctf-tweet-date, .ctf-author-screenname, .ctf-twitterlink, .ctf-author-box-link, .ctf-quoted-tweet, .ctf-context a').css('color', $ctf.find('.ctf-tweet-text').css('color'));

            //Set the line height of the twitter link to match the icons so that it's centered vertically
            var $ctfIconFirst = $ctf.find('.ctf-tweet-actions a').first();
            $ctf.find('.ctf-twitterlink').css('line-height', $ctfIconFirst.height() + 'px');

            //Adjust icon number font size to be slightly smaller than the icon size
            if ($ctfIconFirst.length) {
                var ctfIconSize = parseInt($ctfIconFirst.css('font-size').replace('px', ''));
                $ctf.find('.ctf-action-count').css({
                    'display': 'block',
                    'font-size': (ctfIconSize - 4) + 'px',
                    'line-height': $ctfIconFirst.height() + 'px'
                });
            }

            //Header profile pic hover
            $ctf.find('.ctf-header .ctf-header-link').hover(function () {
                $ctf.find('.ctf-header .ctf-header-img-hover').fadeIn(200);
            }, function () {
                $ctf.find('.ctf-header .ctf-header-img-hover').stop().fadeOut(600);
            });

            //Lightbox hide photo function
            jQuery('.ctf_lightbox_action a').unbind().bind('click', function () {
                jQuery(this).parent().find('.ctf_lightbox_tooltip').toggle();
            });

            // very small delay to ensure other code has run, needs to be less than the timeout for masonry feeds
            setTimeout(function() {
                ctfAddTweetMediaMasonry($ctf);
            }, 1);
            // run additional time in case images are not displaying properly
            setTimeout(function() {
                ctfAddTweetMediaMasonry($ctf);
            }, 300);

            //Create masonry layout
            if (ctfIsMasonry) {

                // Conditionally applies the masonry script if the feed is wide enough or
                // if the user chose to keep the masonry style for small devices as well.
                function ctfAddMasonry($ctf) {
                    if ($(window).width() > 780 || $ctf.hasClass('masonry-2-mobile') ) {
                        $ctf.addClass('ctf-masonry');
                        if ($ctf.find('.ctf-item').length) {
                            $ctf.attr('data-ctf-masonry-init', true).find('.ctf-tweets').ctfmasonry({itemSelector: '.ctf-item, .ctf-out-of-tweets'});
                        }
                    } else {
                        $ctf.removeClass('ctf-masonry');
                    }
                }

                setTimeout(function () {
                    ctfAddMasonry($ctf);
                }, 2);

                //Reinitiates the masonry layout after images are loaded
                $ctf.find('.ctf-tweet-media img').bind('load', function () {
                    ctfAddMasonry($ctf);
                });

            } // End if( ctfIsMasonry )

            //Add class if feed/col is narrow
            function ctfNarrowClass($ctf) {
                var ctfItemWidth = $ctf.find('.ctf-item').first().width();
                if (ctfItemWidth <= 480) $ctf.addClass('ctf-narrow');
                if (ctfItemWidth <= 320) $ctf.addClass('ctf-super-narrow');
                if (ctfItemWidth > 480) $ctf.removeClass('ctf-narrow ctf-super-narrow');
            }

            // Resizing the window can affect the masonry feed so it is reset on resize
            window.addEventListener('resize', function (event) {
                ctfdelay(function () {
                    ctfNarrowClass($ctf);
                    ctfAddTweetMediaMasonry($ctf);
                    if (ctfIsMasonry) ctfAddMasonry($ctf);
                    ctfCropImages('.ctf-tc-image');
                }, 500);
            });
            //Only runs once resize event is over
            var ctfdelay = (function () {
                var ctftimer = 0;
                return function (ctfcallback, ctfms) {
                    clearTimeout(ctftimer);
                    ctftimer = setTimeout(ctfcallback, ctfms);
                };
            })();

            $ctf.find('.ctf_more').unbind('click').bind('click', function(e){
                e.preventDefault();
                $(this).hide().next('.ctf_remaining').show();
                setTimeout(function() {
                    ctfAddTweetMediaMasonry($ctf);
                    if (ctfIsMasonry) ctfAddMasonry($ctf);
                }, 1);
            });


            //Crop the Twitter card images
            ctfCropImages('.ctf-tc-image');

            // Call Custom JS if it exists
            setTimeout(function(){
                if (typeof ctf_custom_js == 'function') ctf_custom_js($);
            }, 400);

            ctfSVGify($ctf);
        } // end ctfScripts()

        //Masonry
        !function (t) {
            function e() {
            }

            function i(t) {
                function i(e) {
                    e.prototype.option || (e.prototype.option = function (e) {
                        t.isPlainObject(e) && (this.options = t.extend(!0, this.options, e))
                    })
                }

                function o(e, i) {
                    t.fn[e] = function (o) {
                        if ("string" == typeof o) {
                            for (var s = n.call(arguments, 1), a = 0, u = this.length; u > a; a++) {
                                var h = this[a], p = t.data(h, e);
                                if (p)if (t.isFunction(p[o]) && "_" !== o.charAt(0)) {
                                    var f = p[o].apply(p, s);
                                    if (void 0 !== f)return f
                                } else r("no such method '" + o + "' for " + e + " instance"); else r("cannot call methods on " + e + " prior to initialization; attempted to call '" + o + "'")
                            }
                            return this
                        }
                        return this.each(function () {
                            var n = t.data(this, e);
                            n ? (n.option(o), n._init()) : (n = new i(this, o), t.data(this, e, n))
                        })
                    }
                }

                if (t) {
                    var r = "undefined" == typeof console ? e : function (t) {
                        console.error(t)
                    };
                    return t.bridget = function (t, e) {
                        i(e), o(t, e)
                    }, t.bridget
                }
            }

            var n = Array.prototype.slice;
            "function" == typeof define && define.amd ? define("jquery-bridget/jquery.bridget", ["jquery"], i) : i("object" == typeof exports ? require("jquery") : t.jQuery)
        }(window), function (t) {
            function e(e) {
                var i = t.event;
                return i.target = i.target || i.srcElement || e, i
            }

            var i = document.documentElement, n = function () {
            };
            i.addEventListener ? n = function (t, e, i) {
                t.addEventListener(e, i, !1)
            } : i.attachEvent && (n = function (t, i, n) {
                t[i + n] = n.handleEvent ? function () {
                    var i = e(t);
                    n.handleEvent.call(n, i)
                } : function () {
                    var i = e(t);
                    n.call(t, i)
                }, t.attachEvent("on" + i, t[i + n])
            });
            var o = function () {
            };
            i.removeEventListener ? o = function (t, e, i) {
                t.removeEventListener(e, i, !1)
            } : i.detachEvent && (o = function (t, e, i) {
                t.detachEvent("on" + e, t[e + i]);
                try {
                    delete t[e + i]
                } catch (n) {
                    t[e + i] = void 0
                }
            });
            var r = {bind: n, unbind: o};
            "function" == typeof define && define.amd ? define("eventie/eventie", r) : "object" == typeof exports ? module.exports = r : t.eventie = r
        }(window), function () {
            function t() {
            }

            function e(t, e) {
                for (var i = t.length; i--;)if (t[i].listener === e)return i;
                return -1
            }

            function i(t) {
                return function () {
                    return this[t].apply(this, arguments)
                }
            }

            var n = t.prototype, o = this, r = o.EventEmitter;
            n.getListeners = function (t) {
                var e, i, n = this._getEvents();
                if (t instanceof RegExp) {
                    e = {};
                    for (i in n)n.hasOwnProperty(i) && t.test(i) && (e[i] = n[i])
                } else e = n[t] || (n[t] = []);
                return e
            }, n.flattenListeners = function (t) {
                var e, i = [];
                for (e = 0; e < t.length; e += 1)i.push(t[e].listener);
                return i
            }, n.getListenersAsObject = function (t) {
                var e, i = this.getListeners(t);
                return i instanceof Array && (e = {}, e[t] = i), e || i
            }, n.addListener = function (t, i) {
                var n, o = this.getListenersAsObject(t), r = "object" == typeof i;
                for (n in o)o.hasOwnProperty(n) && -1 === e(o[n], i) && o[n].push(r ? i : {listener: i, once: !1});
                return this
            }, n.on = i("addListener"), n.addOnceListener = function (t, e) {
                return this.addListener(t, {listener: e, once: !0})
            }, n.once = i("addOnceListener"), n.defineEvent = function (t) {
                return this.getListeners(t), this
            }, n.defineEvents = function (t) {
                for (var e = 0; e < t.length; e += 1)this.defineEvent(t[e]);
                return this
            }, n.removeListener = function (t, i) {
                var n, o, r = this.getListenersAsObject(t);
                for (o in r)r.hasOwnProperty(o) && (n = e(r[o], i), -1 !== n && r[o].splice(n, 1));
                return this
            }, n.off = i("removeListener"), n.addListeners = function (t, e) {
                return this.manipulateListeners(!1, t, e)
            }, n.removeListeners = function (t, e) {
                return this.manipulateListeners(!0, t, e)
            }, n.manipulateListeners = function (t, e, i) {
                var n, o, r = t ? this.removeListener : this.addListener, s = t ? this.removeListeners : this.addListeners;
                if ("object" != typeof e || e instanceof RegExp)for (n = i.length; n--;)r.call(this, e, i[n]); else for (n in e)e.hasOwnProperty(n) && (o = e[n]) && ("function" == typeof o ? r.call(this, n, o) : s.call(this, n, o));
                return this
            }, n.removeEvent = function (t) {
                var e, i = typeof t, n = this._getEvents();
                if ("string" === i)delete n[t]; else if (t instanceof RegExp)for (e in n)n.hasOwnProperty(e) && t.test(e) && delete n[e]; else delete this._events;
                return this
            }, n.removeAllListeners = i("removeEvent"), n.emitEvent = function (t, e) {
                var i, n, o, r, s = this.getListenersAsObject(t);
                for (o in s)if (s.hasOwnProperty(o))for (n = s[o].length; n--;)i = s[o][n], i.once === !0 && this.removeListener(t, i.listener), r = i.listener.apply(this, e || []), r === this._getOnceReturnValue() && this.removeListener(t, i.listener);
                return this
            }, n.trigger = i("emitEvent"), n.emit = function (t) {
                var e = Array.prototype.slice.call(arguments, 1);
                return this.emitEvent(t, e)
            }, n.setOnceReturnValue = function (t) {
                return this._onceReturnValue = t, this
            }, n._getOnceReturnValue = function () {
                return this.hasOwnProperty("_onceReturnValue") ? this._onceReturnValue : !0
            }, n._getEvents = function () {
                return this._events || (this._events = {})
            }, t.noConflict = function () {
                return o.EventEmitter = r, t
            }, "function" == typeof define && define.amd ? define("eventEmitter/EventEmitter", [], function () {
                return t
            }) : "object" == typeof module && module.exports ? module.exports = t : o.EventEmitter = t
        }.call(this), function (t) {
            function e(t) {
                if (t) {
                    if ("string" == typeof n[t])return t;
                    t = t.charAt(0).toUpperCase() + t.slice(1);
                    for (var e, o = 0, r = i.length; r > o; o++)if (e = i[o] + t, "string" == typeof n[e])return e
                }
            }

            var i = "Webkit Moz ms Ms O".split(" "), n = document.documentElement.style;
            "function" == typeof define && define.amd ? define("get-style-property/get-style-property", [], function () {
                return e
            }) : "object" == typeof exports ? module.exports = e : t.getStyleProperty = e
        }(window), function (t) {
            function e(t) {
                var e = parseFloat(t), i = -1 === t.indexOf("%") && !isNaN(e);
                return i && e
            }

            function i() {
            }

            function n() {
                for (var t = {
                    width: 0,
                    height: 0,
                    innerWidth: 0,
                    innerHeight: 0,
                    outerWidth: 0,
                    outerHeight: 0
                }, e = 0, i = s.length; i > e; e++) {
                    var n = s[e];
                    t[n] = 0
                }
                return t
            }

            function o(i) {
                function o() {
                    if (!d) {
                        d = !0;
                        var n = t.getComputedStyle;
                        if (h = function () {
                            var t = n ? function (t) {
                                return n(t, null)
                            } : function (t) {
                                return t.currentStyle
                            };
                            return function (e) {
                                var i = t(e);
                                return i || r("Style returned " + i + ". Are you running this code in a hidden iframe on Firefox? See http://bit.ly/getsizebug1"), i
                            }
                        }(), p = i("boxSizing")) {
                            var o = document.createElement("div");
                            o.style.width = "200px", o.style.padding = "1px 2px 3px 4px", o.style.borderStyle = "solid", o.style.borderWidth = "1px 2px 3px 4px", o.style[p] = "border-box";
                            var s = document.body || document.documentElement;
                            s.appendChild(o);
                            var a = h(o);
                            f = 200 === e(a.width), s.removeChild(o)
                        }
                    }
                }

                function a(t) {
                    if (o(), "string" == typeof t && (t = document.querySelector(t)), t && "object" == typeof t && t.nodeType) {
                        var i = h(t);
                        if ("none" === i.display)return n();
                        var r = {};
                        r.width = t.offsetWidth, r.height = t.offsetHeight;
                        for (var a = r.isBorderBox = !(!p || !i[p] || "border-box" !== i[p]), d = 0, l = s.length; l > d; d++) {
                            var c = s[d], m = i[c];
                            m = u(t, m);
                            var y = parseFloat(m);
                            r[c] = isNaN(y) ? 0 : y
                        }
                        var g = r.paddingLeft + r.paddingRight, v = r.paddingTop + r.paddingBottom, E = r.marginLeft + r.marginRight, b = r.marginTop + r.marginBottom, z = r.borderLeftWidth + r.borderRightWidth, _ = r.borderTopWidth + r.borderBottomWidth, x = a && f, L = e(i.width);
                        L !== !1 && (r.width = L + (x ? 0 : g + z));
                        var T = e(i.height);
                        return T !== !1 && (r.height = T + (x ? 0 : v + _)), r.innerWidth = r.width - (g + z), r.innerHeight = r.height - (v + _), r.outerWidth = r.width + E, r.outerHeight = r.height + b, r
                    }
                }

                function u(e, i) {
                    if (t.getComputedStyle || -1 === i.indexOf("%"))return i;
                    var n = e.style, o = n.left, r = e.runtimeStyle, s = r && r.left;
                    return s && (r.left = e.currentStyle.left), n.left = i, i = n.pixelLeft, n.left = o, s && (r.left = s), i
                }

                var h, p, f, d = !1;
                return a
            }

            var r = "undefined" == typeof console ? i : function (t) {
                console.error(t)
            }, s = ["paddingLeft", "paddingRight", "paddingTop", "paddingBottom", "marginLeft", "marginRight", "marginTop", "marginBottom", "borderLeftWidth", "borderRightWidth", "borderTopWidth", "borderBottomWidth"];
            "function" == typeof define && define.amd ? define("get-size/get-size", ["get-style-property/get-style-property"], o) : "object" == typeof exports ? module.exports = o(require("desandro-get-style-property")) : t.getSize = o(t.getStyleProperty)
        }(window), function (t) {
            function e(t) {
                "function" == typeof t && (e.isReady ? t() : s.push(t))
            }

            function i(t) {
                var i = "readystatechange" === t.type && "complete" !== r.readyState;
                e.isReady || i || n()
            }

            function n() {
                e.isReady = !0;
                for (var t = 0, i = s.length; i > t; t++) {
                    var n = s[t];
                    n()
                }
            }

            function o(o) {
                return "complete" === r.readyState ? n() : (o.bind(r, "DOMContentLoaded", i), o.bind(r, "readystatechange", i), o.bind(t, "load", i)), e
            }

            var r = t.document, s = [];
            e.isReady = !1, "function" == typeof define && define.amd ? define("doc-ready/doc-ready", ["eventie/eventie"], o) : "object" == typeof exports ? module.exports = o(require("eventie")) : t.docReady = o(t.eventie)
        }(window), function (t) {
            function e(t, e) {
                return t[s](e)
            }

            function i(t) {
                if (!t.parentNode) {
                    var e = document.createDocumentFragment();
                    e.appendChild(t)
                }
            }

            function n(t, e) {
                i(t);
                for (var n = t.parentNode.querySelectorAll(e), o = 0, r = n.length; r > o; o++)if (n[o] === t)return !0;
                return !1
            }

            function o(t, n) {
                return i(t), e(t, n)
            }

            var r, s = function () {
                if (t.matches)return "matches";
                if (t.matchesSelector)return "matchesSelector";
                for (var e = ["webkit", "moz", "ms", "o"], i = 0, n = e.length; n > i; i++) {
                    var o = e[i], r = o + "MatchesSelector";
                    if (t[r])return r
                }
            }();
            if (s) {
                var a = document.createElement("div"), u = e(a, "div");
                r = u ? e : o
            } else r = n;
            "function" == typeof define && define.amd ? define("matches-selector/matches-selector", [], function () {
                return r
            }) : "object" == typeof exports ? module.exports = r : window.matchesSelector = r
        }(Element.prototype), function (t, e) {
            "function" == typeof define && define.amd ? define("fizzy-ui-utils/utils", ["doc-ready/doc-ready", "matches-selector/matches-selector"], function (i, n) {
                return e(t, i, n)
            }) : "object" == typeof exports ? module.exports = e(t, require("doc-ready"), require("desandro-matches-selector")) : t.fizzyUIUtils = e(t, t.docReady, t.matchesSelector)
        }(window, function (t, e, i) {
            var n = {};
            n.extend = function (t, e) {
                for (var i in e)t[i] = e[i];
                return t
            }, n.modulo = function (t, e) {
                return (t % e + e) % e
            };
            var o = Object.prototype.toString;
            n.isArray = function (t) {
                return "[object Array]" == o.call(t)
            }, n.makeArray = function (t) {
                var e = [];
                if (n.isArray(t))e = t; else if (t && "number" == typeof t.length)for (var i = 0, o = t.length; o > i; i++)e.push(t[i]); else e.push(t);
                return e
            }, n.indexOf = Array.prototype.indexOf ? function (t, e) {
                return t.indexOf(e)
            } : function (t, e) {
                for (var i = 0, n = t.length; n > i; i++)if (t[i] === e)return i;
                return -1
            }, n.removeFrom = function (t, e) {
                var i = n.indexOf(t, e);
                -1 != i && t.splice(i, 1)
            }, n.isElement = "function" == typeof HTMLElement || "object" == typeof HTMLElement ? function (t) {
                return t instanceof HTMLElement
            } : function (t) {
                return t && "object" == typeof t && 1 == t.nodeType && "string" == typeof t.nodeName
            }, n.setText = function () {
                function t(t, i) {
                    e = e || (void 0 !== document.documentElement.textContent ? "textContent" : "innerText"), t[e] = i
                }

                var e;
                return t
            }(), n.getParent = function (t, e) {
                for (; t != document.body;)if (t = t.parentNode, i(t, e))return t
            }, n.getQueryElement = function (t) {
                return "string" == typeof t ? document.querySelector(t) : t
            }, n.handleEvent = function (t) {
                var e = "on" + t.type;
                this[e] && this[e](t)
            }, n.filterFindElements = function (t, e) {
                t = n.makeArray(t);
                for (var o = [], r = 0, s = t.length; s > r; r++) {
                    var a = t[r];
                    if (n.isElement(a))if (e) {
                        i(a, e) && o.push(a);
                        for (var u = a.querySelectorAll(e), h = 0, p = u.length; p > h; h++)o.push(u[h])
                    } else o.push(a)
                }
                return o
            }, n.debounceMethod = function (t, e, i) {
                var n = t.prototype[e], o = e + "Timeout";
                t.prototype[e] = function () {
                    var t = this[o];
                    t && clearTimeout(t);
                    var e = arguments, r = this;
                    this[o] = setTimeout(function () {
                        n.apply(r, e), delete r[o]
                    }, i || 100)
                }
            }, n.toDashed = function (t) {
                return t.replace(/(.)([A-Z])/g, function (t, e, i) {
                    return e + "-" + i
                }).toLowerCase()
            };
            var r = t.console;
            return n.htmlInit = function (i, o) {
                e(function () {
                    for (var e = n.toDashed(o), s = document.querySelectorAll(".js-" + e), a = "data-" + e + "-options", u = 0, h = s.length; h > u; u++) {
                        var p, f = s[u], d = f.getAttribute(a);
                        try {
                            p = d && JSON.parse(d)
                        } catch (l) {
                            r && r.error("Error parsing " + a + " on " + f.nodeName.toLowerCase() + (f.id ? "#" + f.id : "") + ": " + l);
                            continue
                        }
                        var c = new i(f, p), m = t.jQuery;
                        m && m.data(f, o, c)
                    }
                })
            }, n
        }), function (t, e) {
            "function" == typeof define && define.amd ? define("outlayer/item", ["eventEmitter/EventEmitter", "get-size/get-size", "get-style-property/get-style-property", "fizzy-ui-utils/utils"], function (i, n, o, r) {
                return e(t, i, n, o, r)
            }) : "object" == typeof exports ? module.exports = e(t, require("wolfy87-eventemitter"), require("get-size"), require("desandro-get-style-property"), require("fizzy-ui-utils")) : (t.Outlayer = {}, t.Outlayer.Item = e(t, t.EventEmitter, t.getSize, t.getStyleProperty, t.fizzyUIUtils))
        }(window, function (t, e, i, n, o) {
            function r(t) {
                for (var e in t)return !1;
                return e = null, !0
            }

            function s(t, e) {
                t && (this.element = t, this.layout = e, this.position = {x: 0, y: 0}, this._create())
            }

            var a = t.getComputedStyle, u = a ? function (t) {
                return a(t, null)
            } : function (t) {
                return t.currentStyle
            }, h = n("transition"), p = n("transform"), f = h && p, d = !!n("perspective"), l = {
                WebkitTransition: "webkitTransitionEnd",
                MozTransition: "transitionend",
                OTransition: "otransitionend",
                transition: "transitionend"
            }[h], c = ["transform", "transition", "transitionDuration", "transitionProperty"], m = function () {
                for (var t = {}, e = 0, i = c.length; i > e; e++) {
                    var o = c[e], r = n(o);
                    r && r !== o && (t[o] = r)
                }
                return t
            }();
            o.extend(s.prototype, e.prototype), s.prototype._create = function () {
                this._transn = {ingProperties: {}, clean: {}, onEnd: {}}, this.css({position: "absolute"})
            }, s.prototype.handleEvent = function (t) {
                var e = "on" + t.type;
                this[e] && this[e](t)
            }, s.prototype.getSize = function () {
                this.size = i(this.element)
            }, s.prototype.css = function (t) {
                var e = this.element.style;
                for (var i in t) {
                    var n = m[i] || i;
                    e[n] = t[i]
                }
            }, s.prototype.getPosition = function () {
                var t = u(this.element), e = this.layout.options, i = e.isOriginLeft, n = e.isOriginTop, o = parseInt(t[i ? "left" : "right"], 10), r = parseInt(t[n ? "top" : "bottom"], 10);
                o = isNaN(o) ? 0 : o, r = isNaN(r) ? 0 : r;
                var s = this.layout.size;
                o -= i ? s.paddingLeft : s.paddingRight, r -= n ? s.paddingTop : s.paddingBottom, this.position.x = o, this.position.y = r
            }, s.prototype.layoutPosition = function () {
                var t = this.layout.size, e = this.layout.options, i = {}, n = e.isOriginLeft ? "paddingLeft" : "paddingRight", o = e.isOriginLeft ? "left" : "right", r = e.isOriginLeft ? "right" : "left", s = this.position.x + t[n];
                s = e.percentPosition && !e.isHorizontal ? s / t.width * 100 + "%" : s + "px", i[o] = s, i[r] = "";
                var a = e.isOriginTop ? "paddingTop" : "paddingBottom", u = e.isOriginTop ? "top" : "bottom", h = e.isOriginTop ? "bottom" : "top", p = this.position.y + t[a];
                p = e.percentPosition && e.isHorizontal ? p / t.height * 100 + "%" : p + "px", i[u] = p, i[h] = "", this.css(i), this.emitEvent("layout", [this])
            };
            var y = d ? function (t, e) {
                return "translate3d(" + t + "px, " + e + "px, 0)"
            } : function (t, e) {
                return "translate(" + t + "px, " + e + "px)"
            };
            s.prototype._transitionTo = function (t, e) {
                this.getPosition();
                var i = this.position.x, n = this.position.y, o = parseInt(t, 10), r = parseInt(e, 10), s = o === this.position.x && r === this.position.y;
                if (this.setPosition(t, e), s && !this.isTransitioning)return void this.layoutPosition();
                var a = t - i, u = e - n, h = {}, p = this.layout.options;
                a = p.isOriginLeft ? a : -a, u = p.isOriginTop ? u : -u, h.transform = y(a, u), this.transition({
                    to: h,
                    onTransitionEnd: {transform: this.layoutPosition},
                    isCleaning: !0
                })
            }, s.prototype.goTo = function (t, e) {
                this.setPosition(t, e), this.layoutPosition()
            }, s.prototype.moveTo = f ? s.prototype._transitionTo : s.prototype.goTo, s.prototype.setPosition = function (t, e) {
                this.position.x = parseInt(t, 10), this.position.y = parseInt(e, 10)
            }, s.prototype._nonTransition = function (t) {
                this.css(t.to), t.isCleaning && this._removeStyles(t.to);
                for (var e in t.onTransitionEnd)t.onTransitionEnd[e].call(this)
            }, s.prototype._transition = function (t) {
                if (!parseFloat(this.layout.options.transitionDuration))return void this._nonTransition(t);
                var e = this._transn;
                for (var i in t.onTransitionEnd)e.onEnd[i] = t.onTransitionEnd[i];
                for (i in t.to)e.ingProperties[i] = !0, t.isCleaning && (e.clean[i] = !0);
                if (t.from) {
                    this.css(t.from);
                    var n = this.element.offsetHeight;
                    n = null
                }
                this.enableTransition(t.to), this.css(t.to), this.isTransitioning = !0
            };
            var g = p && o.toDashed(p) + ",opacity";
            s.prototype.enableTransition = function () {
                this.isTransitioning || (this.css({
                    transitionProperty: g,
                    transitionDuration: this.layout.options.transitionDuration
                }), this.element.addEventListener(l, this, !1))
            }, s.prototype.transition = s.prototype[h ? "_transition" : "_nonTransition"], s.prototype.onwebkitTransitionEnd = function (t) {
                this.ontransitionend(t)
            }, s.prototype.onotransitionend = function (t) {
                this.ontransitionend(t)
            };
            var v = {"-webkit-transform": "transform", "-moz-transform": "transform", "-o-transform": "transform"};
            s.prototype.ontransitionend = function (t) {
                if (t.target === this.element) {
                    var e = this._transn, i = v[t.propertyName] || t.propertyName;
                    if (delete e.ingProperties[i], r(e.ingProperties) && this.disableTransition(), i in e.clean && (this.element.style[t.propertyName] = "", delete e.clean[i]), i in e.onEnd) {
                        var n = e.onEnd[i];
                        n.call(this), delete e.onEnd[i]
                    }
                    this.emitEvent("transitionEnd", [this])
                }
            }, s.prototype.disableTransition = function () {
                this.removeTransitionStyles(), this.element.removeEventListener(l, this, !1), this.isTransitioning = !1
            }, s.prototype._removeStyles = function (t) {
                var e = {};
                for (var i in t)e[i] = "";
                this.css(e)
            };
            var E = {transitionProperty: "", transitionDuration: ""};
            return s.prototype.removeTransitionStyles = function () {
                this.css(E)
            }, s.prototype.removeElem = function () {
                this.element.parentNode.removeChild(this.element), this.css({display: ""}), this.emitEvent("remove", [this])
            }, s.prototype.remove = function () {
                if (!h || !parseFloat(this.layout.options.transitionDuration))return void this.removeElem();
                var t = this;
                this.once("transitionEnd", function () {
                    t.removeElem()
                }), this.hide()
            }, s.prototype.reveal = function () {
                delete this.isHidden, this.css({display: ""});
                var t = this.layout.options, e = {}, i = this.getHideRevealTransitionEndProperty("visibleStyle");
                e[i] = this.onRevealTransitionEnd, this.transition({
                    from: t.hiddenStyle,
                    to: t.visibleStyle,
                    isCleaning: !0,
                    onTransitionEnd: e
                })
            }, s.prototype.onRevealTransitionEnd = function () {
                this.isHidden || this.emitEvent("reveal")
            }, s.prototype.getHideRevealTransitionEndProperty = function (t) {
                var e = this.layout.options[t];
                if (e.opacity)return "opacity";
                for (var i in e)return i
            }, s.prototype.hide = function () {
                this.isHidden = !0, this.css({display: ""});
                var t = this.layout.options, e = {}, i = this.getHideRevealTransitionEndProperty("hiddenStyle");
                e[i] = this.onHideTransitionEnd, this.transition({
                    from: t.visibleStyle,
                    to: t.hiddenStyle,
                    isCleaning: !0,
                    onTransitionEnd: e
                })
            }, s.prototype.onHideTransitionEnd = function () {
                this.isHidden && (this.css({display: "none"}), this.emitEvent("hide"))
            }, s.prototype.destroy = function () {
                this.css({position: "", left: "", right: "", top: "", bottom: "", transition: "", transform: ""})
            }, s
        }), function (t, e) {
            "function" == typeof define && define.amd ? define("outlayer/outlayer", ["eventie/eventie", "eventEmitter/EventEmitter", "get-size/get-size", "fizzy-ui-utils/utils", "./item"], function (i, n, o, r, s) {
                return e(t, i, n, o, r, s)
            }) : "object" == typeof exports ? module.exports = e(t, require("eventie"), require("wolfy87-eventemitter"), require("get-size"), require("fizzy-ui-utils"), require("./item")) : t.Outlayer = e(t, t.eventie, t.EventEmitter, t.getSize, t.fizzyUIUtils, t.Outlayer.Item)
        }(window, function (t, e, i, n, o, r) {
            function s(t, e) {
                var i = o.getQueryElement(t);
                if (!i)return void(a && a.error("Bad element for " + this.constructor.namespace + ": " + (i || t)));
                this.element = i, u && (this.$element = u(this.element)), this.options = o.extend({}, this.constructor.defaults), this.option(e);
                var n = ++p;
                this.element.outlayerGUID = n, f[n] = this, this._create(), this.options.isInitLayout && this.layout()
            }

            var a = t.console, u = t.jQuery, h = function () {
            }, p = 0, f = {};
            return s.namespace = "outlayer", s.Item = r, s.defaults = {
                containerStyle: {position: "relative"},
                isInitLayout: !0,
                isOriginLeft: !0,
                isOriginTop: !0,
                isResizeBound: !0,
                isResizingContainer: !0,
                transitionDuration: "0.4s",
                hiddenStyle: {opacity: 0, transform: "scale(0.001)"},
                visibleStyle: {opacity: 1, transform: "scale(1)"}
            }, o.extend(s.prototype, i.prototype), s.prototype.option = function (t) {
                o.extend(this.options, t)
            }, s.prototype._create = function () {
                this.reloadItems(), this.stamps = [], this.stamp(this.options.stamp), o.extend(this.element.style, this.options.containerStyle), this.options.isResizeBound && this.bindResize()
            }, s.prototype.reloadItems = function () {
                this.items = this._itemize(this.element.children)
            }, s.prototype._itemize = function (t) {
                for (var e = this._filterFindItemElements(t), i = this.constructor.Item, n = [], o = 0, r = e.length; r > o; o++) {
                    var s = e[o], a = new i(s, this);
                    n.push(a)
                }
                return n
            }, s.prototype._filterFindItemElements = function (t) {
                return o.filterFindElements(t, this.options.itemSelector)
            }, s.prototype.getItemElements = function () {
                for (var t = [], e = 0, i = this.items.length; i > e; e++)t.push(this.items[e].element);
                return t
            }, s.prototype.layout = function () {
                this._resetLayout(), this._manageStamps();
                var t = void 0 !== this.options.isLayoutInstant ? this.options.isLayoutInstant : !this._isLayoutInited;
                this.layoutItems(this.items, t), this._isLayoutInited = !0
            }, s.prototype._init = s.prototype.layout, s.prototype._resetLayout = function () {
                this.getSize()
            }, s.prototype.getSize = function () {
                this.size = n(this.element)
            }, s.prototype._getMeasurement = function (t, e) {
                var i, r = this.options[t];
                r ? ("string" == typeof r ? i = this.element.querySelector(r) : o.isElement(r) && (i = r), this[t] = i ? n(i)[e] : r) : this[t] = 0
            }, s.prototype.layoutItems = function (t, e) {
                t = this._getItemsForLayout(t), this._layoutItems(t, e), this._postLayout()
            }, s.prototype._getItemsForLayout = function (t) {
                for (var e = [], i = 0, n = t.length; n > i; i++) {
                    var o = t[i];
                    o.isIgnored || e.push(o)
                }
                return e
            }, s.prototype._layoutItems = function (t, e) {
                if (this._emitCompleteOnItems("layout", t), t && t.length) {
                    for (var i = [], n = 0, o = t.length; o > n; n++) {
                        var r = t[n], s = this._getItemLayoutPosition(r);
                        s.item = r, s.isInstant = e || r.isLayoutInstant, i.push(s)
                    }
                    this._processLayoutQueue(i)
                }
            }, s.prototype._getItemLayoutPosition = function () {
                return {x: 0, y: 0}
            }, s.prototype._processLayoutQueue = function (t) {
                for (var e = 0, i = t.length; i > e; e++) {
                    var n = t[e];
                    this._positionItem(n.item, n.x, n.y, n.isInstant)
                }
            }, s.prototype._positionItem = function (t, e, i, n) {
                n ? t.goTo(e, i) : t.moveTo(e, i)
            }, s.prototype._postLayout = function () {
                this.resizeContainer()
            }, s.prototype.resizeContainer = function () {
                if (this.options.isResizingContainer) {
                    var t = this._getContainerSize();
                    t && (this._setContainerMeasure(t.width, !0), this._setContainerMeasure(t.height, !1))
                }
            }, s.prototype._getContainerSize = h, s.prototype._setContainerMeasure = function (t, e) {
                if (void 0 !== t) {
                    var i = this.size;
                    i.isBorderBox && (t += e ? i.paddingLeft + i.paddingRight + i.borderLeftWidth + i.borderRightWidth : i.paddingBottom + i.paddingTop + i.borderTopWidth + i.borderBottomWidth), t = Math.max(t, 0), this.element.style[e ? "width" : "height"] = t + "px"
                }
            }, s.prototype._emitCompleteOnItems = function (t, e) {
                function i() {
                    o.emitEvent(t + "Complete", [e])
                }

                function n() {
                    s++, s === r && i()
                }

                var o = this, r = e.length;
                if (!e || !r)return void i();
                for (var s = 0, a = 0, u = e.length; u > a; a++) {
                    var h = e[a];
                    h.once(t, n)
                }
            }, s.prototype.ignore = function (t) {
                var e = this.getItem(t);
                e && (e.isIgnored = !0)
            }, s.prototype.unignore = function (t) {
                var e = this.getItem(t);
                e && delete e.isIgnored
            }, s.prototype.stamp = function (t) {
                if (t = this._find(t)) {
                    this.stamps = this.stamps.concat(t);
                    for (var e = 0, i = t.length; i > e; e++) {
                        var n = t[e];
                        this.ignore(n)
                    }
                }
            }, s.prototype.unstamp = function (t) {
                if (t = this._find(t))for (var e = 0, i = t.length; i > e; e++) {
                    var n = t[e];
                    o.removeFrom(this.stamps, n), this.unignore(n)
                }
            }, s.prototype._find = function (t) {
                return t ? ("string" == typeof t && (t = this.element.querySelectorAll(t)), t = o.makeArray(t)) : void 0
            }, s.prototype._manageStamps = function () {
                if (this.stamps && this.stamps.length) {
                    this._getBoundingRect();
                    for (var t = 0, e = this.stamps.length; e > t; t++) {
                        var i = this.stamps[t];
                        this._manageStamp(i)
                    }
                }
            }, s.prototype._getBoundingRect = function () {
                var t = this.element.getBoundingClientRect(), e = this.size;
                this._boundingRect = {
                    left: t.left + e.paddingLeft + e.borderLeftWidth,
                    top: t.top + e.paddingTop + e.borderTopWidth,
                    right: t.right - (e.paddingRight + e.borderRightWidth),
                    bottom: t.bottom - (e.paddingBottom + e.borderBottomWidth)
                }
            }, s.prototype._manageStamp = h, s.prototype._getElementOffset = function (t) {
                var e = t.getBoundingClientRect(), i = this._boundingRect, o = n(t), r = {
                    left: e.left - i.left - o.marginLeft,
                    top: e.top - i.top - o.marginTop,
                    right: i.right - e.right - o.marginRight,
                    bottom: i.bottom - e.bottom - o.marginBottom
                };
                return r
            }, s.prototype.handleEvent = function (t) {
                var e = "on" + t.type;
                this[e] && this[e](t)
            }, s.prototype.bindResize = function () {
                this.isResizeBound || (e.bind(t, "resize", this), this.isResizeBound = !0)
            }, s.prototype.unbindResize = function () {
                this.isResizeBound && e.unbind(t, "resize", this), this.isResizeBound = !1
            }, s.prototype.onresize = function () {
                function t() {
                    e.resize(), delete e.resizeTimeout
                }

                this.resizeTimeout && clearTimeout(this.resizeTimeout);
                var e = this;
                this.resizeTimeout = setTimeout(t, 100)
            }, s.prototype.resize = function () {
                this.isResizeBound && this.needsResizeLayout() && this.layout()
            }, s.prototype.needsResizeLayout = function () {
                var t = n(this.element), e = this.size && t;
                return e && t.innerWidth !== this.size.innerWidth
            }, s.prototype.addItems = function (t) {
                var e = this._itemize(t);
                return e.length && (this.items = this.items.concat(e)), e
            }, s.prototype.appended = function (t) {
                var e = this.addItems(t);
                e.length && (this.layoutItems(e, !0), this.reveal(e))
            }, s.prototype.prepended = function (t) {
                var e = this._itemize(t);
                if (e.length) {
                    var i = this.items.slice(0);
                    this.items = e.concat(i), this._resetLayout(), this._manageStamps(), this.layoutItems(e, !0), this.reveal(e), this.layoutItems(i)
                }
            }, s.prototype.reveal = function (t) {
                this._emitCompleteOnItems("reveal", t);
                for (var e = t && t.length, i = 0; e && e > i; i++) {
                    var n = t[i];
                    n.reveal()
                }
            }, s.prototype.hide = function (t) {
                this._emitCompleteOnItems("hide", t);
                for (var e = t && t.length, i = 0; e && e > i; i++) {
                    var n = t[i];
                    n.hide()
                }
            }, s.prototype.revealItemElements = function (t) {
                var e = this.getItems(t);
                this.reveal(e)
            }, s.prototype.hideItemElements = function (t) {
                var e = this.getItems(t);
                this.hide(e)
            }, s.prototype.getItem = function (t) {
                for (var e = 0, i = this.items.length; i > e; e++) {
                    var n = this.items[e];
                    if (n.element === t)return n
                }
            }, s.prototype.getItems = function (t) {
                t = o.makeArray(t);
                for (var e = [], i = 0, n = t.length; n > i; i++) {
                    var r = t[i], s = this.getItem(r);
                    s && e.push(s)
                }
                return e
            }, s.prototype.remove = function (t) {
                var e = this.getItems(t);
                if (this._emitCompleteOnItems("remove", e), e && e.length)for (var i = 0, n = e.length; n > i; i++) {
                    var r = e[i];
                    r.remove(), o.removeFrom(this.items, r)
                }
            }, s.prototype.destroy = function () {
                var t = this.element.style;
                t.height = "", t.position = "", t.width = "";
                for (var e = 0, i = this.items.length; i > e; e++) {
                    var n = this.items[e];
                    n.destroy()
                }
                this.unbindResize();
                var o = this.element.outlayerGUID;
                delete f[o], delete this.element.outlayerGUID, u && u.removeData(this.element, this.constructor.namespace)
            }, s.data = function (t) {
                t = o.getQueryElement(t);
                var e = t && t.outlayerGUID;
                return e && f[e]
            }, s.create = function (t, e) {
                function i() {
                    s.apply(this, arguments)
                }

                return Object.create ? i.prototype = Object.create(s.prototype) : o.extend(i.prototype, s.prototype), i.prototype.constructor = i, i.defaults = o.extend({}, s.defaults), o.extend(i.defaults, e), i.prototype.settings = {}, i.namespace = t, i.data = s.data, i.Item = function () {
                    r.apply(this, arguments)
                }, i.Item.prototype = new r, o.htmlInit(i, t), u && u.bridget && u.bridget(t, i), i
            }, s.Item = r, s
        }), function (t, e) {
            "function" == typeof define && define.amd ? define(["outlayer/outlayer", "get-size/get-size", "fizzy-ui-utils/utils"], e) : "object" == typeof exports ? module.exports = e(require("outlayer"), require("get-size"), require("fizzy-ui-utils")) : t.Masonry = e(t.Outlayer, t.getSize, t.fizzyUIUtils)
        }(window, function (t, e, i) {
            var n = t.create("ctfmasonry");
            return n.prototype._resetLayout = function () {
                this.getSize(), this._getMeasurement("columnWidth", "outerWidth"), this._getMeasurement("gutter", "outerWidth"), this.measureColumns();
                var t = this.cols;
                for (this.colYs = []; t--;)this.colYs.push(0);
                this.maxY = 0
            }, n.prototype.measureColumns = function () {
                if (this.getContainerWidth(), !this.columnWidth) {
                    var t = this.items[0], i = t && t.element;
                    this.columnWidth = i && e(i).outerWidth || this.containerWidth
                }
                var n = this.columnWidth += this.gutter, o = this.containerWidth + this.gutter, r = o / n, s = n - o % n, a = s && 1 > s ? "round" : "floor";
                r = Math[a](r), this.cols = Math.max(r, 1)
            }, n.prototype.getContainerWidth = function () {
                var t = this.options.isFitWidth ? this.element.parentNode : this.element, i = e(t);
                this.containerWidth = i && i.innerWidth
            }, n.prototype._getItemLayoutPosition = function (t) {
                t.getSize();
                var e = t.size.outerWidth % this.columnWidth, n = e && 1 > e ? "round" : "ceil", o = Math[n](t.size.outerWidth / this.columnWidth);
                o = Math.min(o, this.cols);
                for (var r = this._getColGroup(o), s = Math.min.apply(Math, r), a = i.indexOf(r, s), u = {
                    x: this.columnWidth * a,
                    y: s
                }, h = s + t.size.outerHeight, p = this.cols + 1 - r.length, f = 0; p > f; f++)this.colYs[a + f] = h;
                return u
            }, n.prototype._getColGroup = function (t) {
                if (2 > t)return this.colYs;
                for (var e = [], i = this.cols + 1 - t, n = 0; i > n; n++) {
                    var o = this.colYs.slice(n, n + t);
                    e[n] = Math.max.apply(Math, o)
                }
                return e
            }, n.prototype._manageStamp = function (t) {
                var i = e(t), n = this._getElementOffset(t), o = this.options.isOriginLeft ? n.left : n.right, r = o + i.outerWidth, s = Math.floor(o / this.columnWidth);
                s = Math.max(0, s);
                var a = Math.floor(r / this.columnWidth);
                a -= r % this.columnWidth ? 0 : 1, a = Math.min(this.cols - 1, a);
                for (var u = (this.options.isOriginTop ? n.top : n.bottom) + i.outerHeight, h = s; a >= h; h++)this.colYs[h] = Math.max(u, this.colYs[h])
            }, n.prototype._getContainerSize = function () {
                this.maxY = Math.max.apply(Math, this.colYs);
                var t = {height: this.maxY};
                return this.options.isFitWidth && (t.width = this._getContainerFitWidth()), t
            }, n.prototype._getContainerFitWidth = function () {
                for (var t = 0, e = this.cols; --e && 0 === this.colYs[e];)t++;
                return (this.cols - t) * this.columnWidth - this.gutter
            }, n.prototype.needsResizeLayout = function () {
                var t = this.containerWidth;
                return this.getContainerWidth(), t !== this.containerWidth
            }, n
        });

        //Masonry layout for images when more than 1
        function ctfAddTweetMediaMasonry($ctf) {
            var $ctfTweetMediaMasonry = $ctf.find('.ctf-tweet-media-masonry'),
                mediaSelector = '.ctf-tweet-media-masonry a',
                imageCols = $ctf.attr('data-ctfimagecols');
            // change the target elements and selector to all media if image columns not "auto"
            if (imageCols !== 'auto' && !$ctf.hasClass('ctf-narrow')) {
                $ctfTweetMediaMasonry = $ctf.find('.ctf-tweet-media');
                mediaSelector = '.ctf-tweet-media a';
            }


            // only run the code if there are images
            if ($ctfTweetMediaMasonry.length) {
                var mediaWidth = parseInt($ctfTweetMediaMasonry.innerWidth()),
                    maxMedia = $ctf.attr('data-ctfmaxmedia'),
                    columnWidth = 50,
                    autoColumnWidth = false;

                if (typeof imageCols === 'undefined' || imageCols === 'auto') {
                    autoColumnWidth = true;
                } else {
                    columnWidth = 100 / imageCols;
                }

                $ctfTweetMediaMasonry.each(function(index) {
                    var $this = $(this),
                        numMedia = $this.find('a').length,
                        visibleMedia = Math.min(numMedia,maxMedia);

                    $this.find('a').slice(maxMedia).hide();

                    // auto column width is calculated here
                    if (autoColumnWidth) {
                        if (numMedia !== 2) {
                            var lessWidth = (numMedia - 1)/numMedia;
                            $this.find('a').css({
                                'width' : ((100/(numMedia-1))-lessWidth)+'%',
                                'margin' : '0 1% 0 0',
                            });
                            $this.find('a').first().css({
                                'width' : '100%',
                                'max-width' : '100%',
                                'margin' : '0 auto 1%',
                            });
                            if (numMedia > 2) {
                                $this.find('a').last().css({
                                    'width': ((100 / (numMedia - 1)) - 1) + '%',
                                    'margin': '0',
                                });
                                $this.find('img').css({
                                    'width' : '100%',
                                });
                                var sizes = $this.find('img').first().attr('data-ctfsizes').split(',');
                                if (sizes[sizes.length-1] < $this.find('a').first().width()){
                                    $this.find('img').first().css({
                                        'width' : 'auto',
                                        'float' : 'none',
                                        'margin' : 'auto',
                                        'box-shadow' : 'none',
                                        'display' : 'block'
                                    });
                                } else {
                                    $this.find('img').first().css({
                                        'width' : '100%',
                                    });
                                }

                                if (index > 0) {
                                    $this.find('a').each(function(newIndex) {
                                        if (newIndex > 0) {
                                            $(this).css('height',$this.find('a').last().width());
                                            $(this).imgLiquid({fill:true});
                                        }
                                    });
                                }
                            }
                        } else {
                            $this.find('a').css({
                                'width' : '49.5%',
                                'margin-right' : '0',
                            });
                            $this.find('a').first().css({
                                'width' : '49.5%',
                                'margin-right' : '1%',
                            });
                            $this.find('img').css({
                                'width' : '100%',
                            });
                        }

                    } else {
                        $this.find('a').css('max-width', columnWidth-1+'%').css('margin', '0 1% 0 0');

                        setTimeout(function() {
                            $this.ctfmasonry({itemSelector: mediaSelector});
                        },100);
                    }

                });
            }
        }

        function ctfLoadTweets(lastIDData, shortcodeData, $ctf, $ctfMore, numNeeded, persistentIndex, isInitial) {
            //Display loader
            $ctfMore.addClass('ctf-loading').append('<div class="ctf-loader"></div>');
            $ctfMore.find('.ctf-loader').css('background-color', $ctfMore.css('color'));

            var idsToRemove = [];

            if ($ctf.hasClass('ctf-no-duplicates')) {
                $ctf.find('.ctf-item').each(function () {
                    if ($(this).attr('data-ctfretweetid')) {
                        idsToRemove.push($(this).attr('data-ctfretweetid'));
                    } else {
                        var id = $(this).attr('id');
                        idsToRemove.push(id.replace('ctf_', ''));
                    }
                });
            }

            $.ajax({
                url: ctf.ajax_url,
                type: 'post',
                data: {
                    action: 'ctf_get_more_posts',
                    last_id_data: lastIDData,
                    shortcode_data: shortcodeData,
                    num_needed: numNeeded,
                    ids_to_remove: idsToRemove,
                    persistent_index: persistentIndex
                },
                success: function (data) {
                    if (lastIDData !== '') {

                        // destroys the carousel and removes extra elements, then reapplies carousel
                        if ($ctf.hasClass('ctf-carousel')) {
                            var carouselLoopType = $ctf.attr('data-ctf-loop'),
                                carouselCols = parseInt($ctf.attr('data-ctf-cols')),
                                carouselPos = 0 - carouselCols;


                            if (carouselLoopType === 'none'|| carouselLoopType === 'rewind' ) {
                                carouselPos = $ctf.find('.ctf-owl-item').index($ctf.find('.ctf-owl-item.active').last()) - carouselCols + 1;
                            } else if (carouselLoopType === 'infinite') {

                                carouselPos = ($ctf.find('.ctf-owl-item').index($ctf.find('.ctf-owl-item.cloned').last())-carouselCols + 1) / 2;
                                //If there's 2 cols then stay on the current Tweet, otherwise move to the next Tweet loaded
                                if( carouselCols === 1 ){
                                    carouselPos = carouselPos - 1;
                                } else if( carouselCols === 2 ) {
                                    carouselPos = carouselPos - 2;
                                }
                                carouselPos = Math.ceil(carouselPos);
                            }
                            $ctf.find('.ctf-tweets').ctfOwlCarousel('destroy');
                            $ctf.find('.ctf-carousel-more').remove();

                            if (isInitial) {
                                carouselPos = 0;
                            }
                        }
                        // appends the html echoed out in ctf_get_new_posts() to the last post element
                        if(data.indexOf('<meta charset') == -1) {
                            $ctf.find('.ctf-item').removeClass('ctf-new').last().after(data);
                        }

                        if ($ctf.find('.ctf-out-of-tweets').length) {
                            $ctfMore.hide();

                            //Fade in the no more tweets message
                            $ctf.find('.ctf-out-of-tweets p').eq(0).fadeIn().end().eq(1).delay(500).fadeIn();

                            $ctf.find('.ctf-tweets').after($ctf.find('.ctf-out-of-tweets'));

                            //If carousel then move out of tweets message into last item of carousel
                            if ($ctf.hasClass('ctf-carousel')) {
                                $ctf.find('.ctf-more').after( $ctf.find('.ctf-out-of-tweets') );
                            }
                        }
                    } else {
                        $ctf.find('.ctf-tweets').append(data);
                    }

                    $('.ctf').each(function(index) {
                        ctfFeeds[index] = ctfCreateFeed($(this),2);
                        ctfTwitterCardGenerator(index);
                    });

                    //Remove loader
                    $ctfMore.removeClass('ctf-loading').find('.ctf-loader').remove();

                    //Re-run JS code
                    ctfScripts($ctf);

                    if ($ctf.hasClass('ctf-carousel')) {

                        ctfInitCarousel($ctf, carouselPos);

                        // ctfNarrowClass($ctf);
                    } else if ($ctf.hasClass('ctf-autoscroll')) {
                        setTimeout(function () {
                            bindAutoScroll($ctf);
                            scrolled = 0;
                        }, 1500);
                    }
                    setTimeout(function() {
                        ctfAddTweetMediaMasonry($ctf);
                    }, 1000);
                    setTimeout(function() {
                        ctfAddTweetMediaMasonry($ctf);
                    }, 2000);
                }
            }); // ajax call
        }

        // set scrolled globally to avoid triggering load more more than once before
        // tweets are done loading on the page
        var scrolled = 0;

        function bindAutoScroll($ctf) {
            var scrollPosOffset = parseInt($ctf.attr('data-ctfscrolloffset'));

            //Scroll the container if it has a height
            if ($ctf.hasClass('ctf-fixed-height')) {
                $ctf.on('scroll.ctf', function () {

                    var yScrollPos = $ctf.scrollTop(),
                        windowSize = $ctf.innerHeight(),
                        bodyHeight = $ctf[0].scrollHeight,
                        triggerDistance = bodyHeight - scrollPosOffset - windowSize;

                    if (yScrollPos > triggerDistance) {
                        $ctf.unbind('scroll.ctf');

                        if (scrolled === 0) {
                            scrolled = 1;
                            // check to make sure there are still tweets available
                            if (!$ctf.find('.ctf-out-of-tweets').length) {
                                $ctf.find('.ctf-more').trigger('click');
                            }
                        }
                    }
                })
                //Scrolling the window
            } else {
                $(window).on('scroll.ctf', function () {
                    var yScrollPos = window.pageYOffset,
                        windowSize = window.innerHeight,
                        bodyHeight = document.body.offsetHeight,
                        triggerDistance = bodyHeight - scrollPosOffset - windowSize;

                    if (yScrollPos > triggerDistance) {
                        $(window).unbind('scroll.ctf');
                        if (scrolled === 0) {
                            scrolled = 1;
                            // check to make sure there are still tweets available
                            if (!$ctf.find('.ctf-out-of-tweets').length) {
                                $ctf.find('.ctf-more').trigger('click');
                            }
                        }
                    }
                });
            }

        }

        $('.ctf-autoscroll').each(function () {
            if(!$(this).hasClass('ctf-carousel')) {
                bindAutoScroll($(this));
            }
        }); // end .ctf each loop

        // Carousel
        !function(a,b,c,d){function e(b,c){this.settings=null,this.options=a.extend({},e.Defaults,c),this.$element=a(b),this._handlers={},this._plugins={},this._supress={},this._current=null,this._speed=null,this._coordinates=[],this._breakpoint=null,this._width=null,this._items=[],this._clones=[],this._mergers=[],this._widths=[],this._invalidated={},this._pipe=[],this._drag={time:null,target:null,pointer:null,stage:{start:null,current:null},direction:null},this._states={current:{},tags:{initializing:["busy"],animating:["busy"],dragging:["interacting"]}},a.each(["onResize","onThrottledResize"],a.proxy(function(b,c){this._handlers[c]=a.proxy(this[c],this)},this)),a.each(e.Plugins,a.proxy(function(a,b){this._plugins[a.charAt(0).toLowerCase()+a.slice(1)]=new b(this)},this)),a.each(e.Workers,a.proxy(function(b,c){this._pipe.push({filter:c.filter,run:a.proxy(c.run,this)})},this)),this.setup(),this.initialize()}e.Defaults={items:3,loop:!1,center:!1,rewind:!1,mouseDrag:!0,touchDrag:!0,pullDrag:!0,freeDrag:!1,margin:0,stagePadding:0,merge:!1,mergeFit:!0,autoWidth:!1,startPosition:0,rtl:!1,smartSpeed:250,fluidSpeed:!1,dragEndSpeed:!1,responsive:{},responsiveRefreshRate:200,responsiveBaseElement:b,fallbackEasing:"swing",info:!1,nestedItemSelector:!1,itemElement:"div",stageElement:"div",refreshClass:"ctf-owl-refresh",loadedClass:"ctf-owl-loaded",loadingClass:"ctf-owl-loading",rtlClass:"ctf-owl-rtl",responsiveClass:"ctf-owl-responsive",dragClass:"ctf-owl-drag",itemClass:"ctf-owl-item",stageClass:"ctf-owl-stage",stageOuterClass:"ctf-owl-stage-outer",grabClass:"ctf-owl-grab"},e.Width={Default:"default",Inner:"inner",Outer:"outer"},e.Type={Event:"event",State:"state"},e.Plugins={},e.Workers=[{filter:["width","settings"],run:function(){this._width=this.$element.width()}},{filter:["width","items","settings"],run:function(a){a.current=this._items&&this._items[this.relative(this._current)]}},{filter:["items","settings"],run:function(){this.$stage.children(".cloned").remove()}},{filter:["width","items","settings"],run:function(a){var b=this.settings.margin||"",c=!this.settings.autoWidth,d=this.settings.rtl,e={width:"auto","margin-left":d?b:"","margin-right":d?"":b};!c&&this.$stage.children().css(e),a.css=e}},{filter:["width","items","settings"],run:function(a){var b=(this.width()/this.settings.items).toFixed(3)-this.settings.margin,c=null,d=this._items.length,e=!this.settings.autoWidth,f=[];for(a.items={merge:!1,width:b};d--;)c=this._mergers[d],c=this.settings.mergeFit&&Math.min(c,this.settings.items)||c,a.items.merge=c>1||a.items.merge,f[d]=e?b*c:this._items[d].width();this._widths=f}},{filter:["items","settings"],run:function(){var b=[],c=this._items,d=this.settings,e=Math.max(2*d.items,4),f=2*Math.ceil(c.length/2),g=d.loop&&c.length?d.rewind?e:Math.max(e,f):0,h="",i="";for(g/=2;g--;)b.push(this.normalize(b.length/2,!0)),h+=c[b[b.length-1]][0].outerHTML,b.push(this.normalize(c.length-1-(b.length-1)/2,!0)),i=c[b[b.length-1]][0].outerHTML+i;this._clones=b,a(h).addClass("cloned").appendTo(this.$stage),a(i).addClass("cloned").prependTo(this.$stage)}},{filter:["width","items","settings"],run:function(){for(var a=this.settings.rtl?1:-1,b=this._clones.length+this._items.length,c=-1,d=0,e=0,f=[];++c<b;)d=f[c-1]||0,e=this._widths[this.relative(c)]+this.settings.margin,f.push(d+e*a);this._coordinates=f}},{filter:["width","items","settings"],run:function(){var a=this.settings.stagePadding,b=this._coordinates,c={width:Math.ceil(Math.abs(b[b.length-1]))+2*a,"padding-left":a||"","padding-right":a||""};this.$stage.css(c)}},{filter:["width","items","settings"],run:function(a){var b=this._coordinates.length,c=!this.settings.autoWidth,d=this.$stage.children();if(c&&a.items.merge)for(;b--;)a.css.width=this._widths[this.relative(b)],d.eq(b).css(a.css);else c&&(a.css.width=a.items.width,d.css(a.css))}},{filter:["items"],run:function(){this._coordinates.length<1&&this.$stage.removeAttr("style")}},{filter:["width","items","settings"],run:function(a){a.current=a.current?this.$stage.children().index(a.current):0,a.current=Math.max(this.minimum(),Math.min(this.maximum(),a.current)),this.reset(a.current)}},{filter:["position"],run:function(){this.animate(this.coordinates(this._current))}},{filter:["width","position","items","settings"],run:function(){var a,b,c,d,e=this.settings.rtl?1:-1,f=2*this.settings.stagePadding,g=this.coordinates(this.current())+f,h=g+this.width()*e,i=[];for(c=0,d=this._coordinates.length;c<d;c++)a=this._coordinates[c-1]||0,b=Math.abs(this._coordinates[c])+f*e,(this.op(a,"<=",g)&&this.op(a,">",h)||this.op(b,"<",g)&&this.op(b,">",h))&&i.push(c);this.$stage.children(".active").removeClass("active"),this.$stage.children(":eq("+i.join("), :eq(")+")").addClass("active"),this.settings.center&&(this.$stage.children(".center").removeClass("center"),this.$stage.children().eq(this.current()).addClass("center"))}}],e.prototype.initialize=function(){if(this.enter("initializing"),this.trigger("initialize"),this.$element.toggleClass(this.settings.rtlClass,this.settings.rtl),this.settings.autoWidth&&!this.is("pre-loading")){var b,c,e;b=this.$element.find("img"),c=this.settings.nestedItemSelector?"."+this.settings.nestedItemSelector:d,e=this.$element.children(c).width(),b.length&&e<=0&&this.preloadAutoWidthImages(b)}this.$element.addClass(this.options.loadingClass),this.$stage=a("<"+this.settings.stageElement+' class="'+this.settings.stageClass+'"/>').wrap('<div class="'+this.settings.stageOuterClass+'"/>'),this.$element.append(this.$stage.parent()),this.replace(this.$element.children().not(this.$stage.parent())),this.$element.is(":visible")?this.refresh():this.invalidate("width"),this.$element.removeClass(this.options.loadingClass).addClass(this.options.loadedClass),this.registerEventHandlers(),this.leave("initializing"),this.trigger("initialized")},e.prototype.setup=function(){var b=this.viewport(),c=this.options.responsive,d=-1,e=null;c?(a.each(c,function(a){a<=b&&a>d&&(d=Number(a))}),e=a.extend({},this.options,c[d]),"function"==typeof e.stagePadding&&(e.stagePadding=e.stagePadding()),delete e.responsive,e.responsiveClass&&this.$element.attr("class",this.$element.attr("class").replace(new RegExp("("+this.options.responsiveClass+"-)\\S+\\s","g"),"$1"+d))):e=a.extend({},this.options),this.trigger("change",{property:{name:"settings",value:e}}),this._breakpoint=d,this.settings=e,this.invalidate("settings"),this.trigger("changed",{property:{name:"settings",value:this.settings}})},e.prototype.optionsLogic=function(){this.settings.autoWidth&&(this.settings.stagePadding=!1,this.settings.merge=!1)},e.prototype.prepare=function(b){var c=this.trigger("prepare",{content:b});return c.data||(c.data=a("<"+this.settings.itemElement+"/>").addClass(this.options.itemClass).append(b)),this.trigger("prepared",{content:c.data}),c.data},e.prototype.update=function(){for(var b=0,c=this._pipe.length,d=a.proxy(function(a){return this[a]},this._invalidated),e={};b<c;)(this._invalidated.all||a.grep(this._pipe[b].filter,d).length>0)&&this._pipe[b].run(e),b++;this._invalidated={},!this.is("valid")&&this.enter("valid")},e.prototype.width=function(a){switch(a=a||e.Width.Default){case e.Width.Inner:case e.Width.Outer:return this._width;default:return this._width-2*this.settings.stagePadding+this.settings.margin}},e.prototype.refresh=function(){this.enter("refreshing"),this.trigger("refresh"),this.setup(),this.optionsLogic(),this.$element.addClass(this.options.refreshClass),this.update(),this.$element.removeClass(this.options.refreshClass),this.leave("refreshing"),this.trigger("refreshed")},e.prototype.onThrottledResize=function(){b.clearTimeout(this.resizeTimer),this.resizeTimer=b.setTimeout(this._handlers.onResize,this.settings.responsiveRefreshRate)},e.prototype.onResize=function(){return!!this._items.length&&(this._width!==this.$element.width()&&(!!this.$element.is(":visible")&&(this.enter("resizing"),this.trigger("resize").isDefaultPrevented()?(this.leave("resizing"),!1):(this.invalidate("width"),this.refresh(),this.leave("resizing"),void this.trigger("resized")))))},e.prototype.registerEventHandlers=function(){a.support.transition&&this.$stage.on(a.support.transition.end+".owl.core",a.proxy(this.onTransitionEnd,this)),this.settings.responsive!==!1&&this.on(b,"resize",this._handlers.onThrottledResize),this.settings.mouseDrag&&(this.$element.addClass(this.options.dragClass),this.$stage.on("mousedown.owl.core",a.proxy(this.onDragStart,this)),this.$stage.on("dragstart.owl.core selectstart.owl.core",function(){return!1})),this.settings.touchDrag&&(this.$stage.on("touchstart.owl.core",a.proxy(this.onDragStart,this)),this.$stage.on("touchcancel.owl.core",a.proxy(this.onDragEnd,this)))},e.prototype.onDragStart=function(b){var d=null;3!==b.which&&(a.support.transform?(d=this.$stage.css("transform").replace(/.*\(|\)| /g,"").split(","),d={x:d[16===d.length?12:4],y:d[16===d.length?13:5]}):(d=this.$stage.position(),d={x:this.settings.rtl?d.left+this.$stage.width()-this.width()+this.settings.margin:d.left,y:d.top}),this.is("animating")&&(a.support.transform?this.animate(d.x):this.$stage.stop(),this.invalidate("position")),this.$element.toggleClass(this.options.grabClass,"mousedown"===b.type),this.speed(0),this._drag.time=(new Date).getTime(),this._drag.target=a(b.target),this._drag.stage.start=d,this._drag.stage.current=d,this._drag.pointer=this.pointer(b),a(c).on("mouseup.owl.core touchend.owl.core",a.proxy(this.onDragEnd,this)),a(c).one("mousemove.owl.core touchmove.owl.core",a.proxy(function(b){var d=this.difference(this._drag.pointer,this.pointer(b));a(c).on("mousemove.owl.core touchmove.owl.core",a.proxy(this.onDragMove,this)),Math.abs(d.x)<Math.abs(d.y)&&this.is("valid")||(b.preventDefault(),this.enter("dragging"),this.trigger("drag"))},this)))},e.prototype.onDragMove=function(a){var b=null,c=null,d=null,e=this.difference(this._drag.pointer,this.pointer(a)),f=this.difference(this._drag.stage.start,e);this.is("dragging")&&(a.preventDefault(),this.settings.loop?(b=this.coordinates(this.minimum()),c=this.coordinates(this.maximum()+1)-b,f.x=((f.x-b)%c+c)%c+b):(b=this.settings.rtl?this.coordinates(this.maximum()):this.coordinates(this.minimum()),c=this.settings.rtl?this.coordinates(this.minimum()):this.coordinates(this.maximum()),d=this.settings.pullDrag?-1*e.x/5:0,f.x=Math.max(Math.min(f.x,b+d),c+d)),this._drag.stage.current=f,this.animate(f.x))},e.prototype.onDragEnd=function(b){var d=this.difference(this._drag.pointer,this.pointer(b)),e=this._drag.stage.current,f=d.x>0^this.settings.rtl?"left":"right";a(c).off(".owl.core"),this.$element.removeClass(this.options.grabClass),(0!==d.x&&this.is("dragging")||!this.is("valid"))&&(this.speed(this.settings.dragEndSpeed||this.settings.smartSpeed),this.current(this.closest(e.x,0!==d.x?f:this._drag.direction)),this.invalidate("position"),this.update(),this._drag.direction=f,(Math.abs(d.x)>3||(new Date).getTime()-this._drag.time>300)&&this._drag.target.one("click.owl.core",function(){return!1})),this.is("dragging")&&(this.leave("dragging"),this.trigger("dragged"))},e.prototype.closest=function(b,c){var d=-1,e=30,f=this.width(),g=this.coordinates();return this.settings.freeDrag||a.each(g,a.proxy(function(a,h){return"left"===c&&b>h-e&&b<h+e?d=a:"right"===c&&b>h-f-e&&b<h-f+e?d=a+1:this.op(b,"<",h)&&this.op(b,">",g[a+1]||h-f)&&(d="left"===c?a+1:a),d===-1},this)),this.settings.loop||(this.op(b,">",g[this.minimum()])?d=b=this.minimum():this.op(b,"<",g[this.maximum()])&&(d=b=this.maximum())),d},e.prototype.animate=function(b){var c=this.speed()>0;this.is("animating")&&this.onTransitionEnd(),c&&(this.enter("animating"),this.trigger("translate")),a.support.transform3d&&a.support.transition?this.$stage.css({transform:"translate3d("+b+"px,0px,0px)",transition:this.speed()/1e3+"s"}):c?this.$stage.animate({left:b+"px"},this.speed(),this.settings.fallbackEasing,a.proxy(this.onTransitionEnd,this)):this.$stage.css({left:b+"px"})},e.prototype.is=function(a){return this._states.current[a]&&this._states.current[a]>0},e.prototype.current=function(a){if(a===d)return this._current;if(0===this._items.length)return d;if(a=this.normalize(a),this._current!==a){var b=this.trigger("change",{property:{name:"position",value:a}});b.data!==d&&(a=this.normalize(b.data)),this._current=a,this.invalidate("position"),this.trigger("changed",{property:{name:"position",value:this._current}})}return this._current},e.prototype.invalidate=function(b){return"string"===a.type(b)&&(this._invalidated[b]=!0,this.is("valid")&&this.leave("valid")),a.map(this._invalidated,function(a,b){return b})},e.prototype.reset=function(a){a=this.normalize(a),a!==d&&(this._speed=0,this._current=a,this.suppress(["translate","translated"]),this.animate(this.coordinates(a)),this.release(["translate","translated"]))},e.prototype.normalize=function(a,b){var c=this._items.length,e=b?0:this._clones.length;return!this.isNumeric(a)||c<1?a=d:(a<0||a>=c+e)&&(a=((a-e/2)%c+c)%c+e/2),a},e.prototype.relative=function(a){return a-=this._clones.length/2,this.normalize(a,!0)},e.prototype.maximum=function(a){var b,c,d,e=this.settings,f=this._coordinates.length;if(e.loop)f=this._clones.length/2+this._items.length-1;else if(e.autoWidth||e.merge){for(b=this._items.length,c=this._items[--b].width(),d=this.$element.width();b--&&(c+=this._items[b].width()+this.settings.margin,!(c>d)););f=b+1}else f=e.center?this._items.length-1:this._items.length-e.items;return a&&(f-=this._clones.length/2),Math.max(f,0)},e.prototype.minimum=function(a){return a?0:this._clones.length/2},e.prototype.items=function(a){return a===d?this._items.slice():(a=this.normalize(a,!0),this._items[a])},e.prototype.mergers=function(a){return a===d?this._mergers.slice():(a=this.normalize(a,!0),this._mergers[a])},e.prototype.clones=function(b){var c=this._clones.length/2,e=c+this._items.length,f=function(a){return a%2===0?e+a/2:c-(a+1)/2};return b===d?a.map(this._clones,function(a,b){return f(b)}):a.map(this._clones,function(a,c){return a===b?f(c):null})},e.prototype.speed=function(a){return a!==d&&(this._speed=a),this._speed},e.prototype.coordinates=function(b){var c,e=1,f=b-1;return b===d?a.map(this._coordinates,a.proxy(function(a,b){return this.coordinates(b)},this)):(this.settings.center?(this.settings.rtl&&(e=-1,f=b+1),c=this._coordinates[b],c+=(this.width()-c+(this._coordinates[f]||0))/2*e):c=this._coordinates[f]||0,c=Math.ceil(c))},e.prototype.duration=function(a,b,c){return 0===c?0:Math.min(Math.max(Math.abs(b-a),1),6)*Math.abs(c||this.settings.smartSpeed)},e.prototype.to=function(a,b){var c=this.current(),d=null,e=a-this.relative(c),f=(e>0)-(e<0),g=this._items.length,h=this.minimum(),i=this.maximum();this.settings.loop?(!this.settings.rewind&&Math.abs(e)>g/2&&(e+=f*-1*g),a=c+e,d=((a-h)%g+g)%g+h,d!==a&&d-e<=i&&d-e>0&&(c=d-e,a=d,this.reset(c))):this.settings.rewind?(i+=1,a=(a%i+i)%i):a=Math.max(h,Math.min(i,a)),this.speed(this.duration(c,a,b)),this.current(a),this.$element.is(":visible")&&this.update()},e.prototype.next=function(a){a=a||!1,this.to(this.relative(this.current())+1,a)},e.prototype.prev=function(a){a=a||!1,this.to(this.relative(this.current())-1,a)},e.prototype.onTransitionEnd=function(a){if(a!==d&&(a.stopPropagation(),(a.target||a.srcElement||a.originalTarget)!==this.$stage.get(0)))return!1;this.leave("animating"),this.trigger("translated")},e.prototype.viewport=function(){var d;return this.options.responsiveBaseElement!==b?d=a(this.options.responsiveBaseElement).width():b.innerWidth?d=b.innerWidth:c.documentElement&&c.documentElement.clientWidth?d=c.documentElement.clientWidth:console.warn("Can not detect viewport width."),d},e.prototype.replace=function(b){this.$stage.empty(),this._items=[],b&&(b=b instanceof jQuery?b:a(b)),this.settings.nestedItemSelector&&(b=b.find("."+this.settings.nestedItemSelector)),b.filter(function(){return 1===this.nodeType}).each(a.proxy(function(a,b){b=this.prepare(b),this.$stage.append(b),this._items.push(b),this._mergers.push(1*b.find("[data-merge]").addBack("[data-merge]").attr("data-merge")||1)},this)),this.reset(this.isNumeric(this.settings.startPosition)?this.settings.startPosition:0),this.invalidate("items")},e.prototype.add=function(b,c){var e=this.relative(this._current);c=c===d?this._items.length:this.normalize(c,!0),b=b instanceof jQuery?b:a(b),this.trigger("add",{content:b,position:c}),b=this.prepare(b),0===this._items.length||c===this._items.length?(0===this._items.length&&this.$stage.append(b),0!==this._items.length&&this._items[c-1].after(b),this._items.push(b),this._mergers.push(1*b.find("[data-merge]").addBack("[data-merge]").attr("data-merge")||1)):(this._items[c].before(b),this._items.splice(c,0,b),this._mergers.splice(c,0,1*b.find("[data-merge]").addBack("[data-merge]").attr("data-merge")||1)),this._items[e]&&this.reset(this._items[e].index()),this.invalidate("items"),this.trigger("added",{content:b,position:c})},e.prototype.remove=function(a){a=this.normalize(a,!0),a!==d&&(this.trigger("remove",{content:this._items[a],position:a}),this._items[a].remove(),this._items.splice(a,1),this._mergers.splice(a,1),this.invalidate("items"),this.trigger("removed",{content:null,position:a}))},e.prototype.preloadAutoWidthImages=function(b){b.each(a.proxy(function(b,c){this.enter("pre-loading"),c=a(c),a(new Image).one("load",a.proxy(function(a){c.attr("src",a.target.src),c.css("opacity",1),this.leave("pre-loading"),!this.is("pre-loading")&&!this.is("initializing")&&this.refresh()},this)).attr("src",c.attr("src")||c.attr("data-src")||c.attr("data-src-retina"))},this))},e.prototype.destroy=function(){this.$element.off(".owl.core"),this.$stage.off(".owl.core"),a(c).off(".owl.core"),this.settings.responsive!==!1&&(b.clearTimeout(this.resizeTimer),this.off(b,"resize",this._handlers.onThrottledResize));for(var d in this._plugins)this._plugins[d].destroy();this.$stage.children(".cloned").remove(),this.$stage.unwrap(),this.$stage.children().contents().unwrap(),this.$stage.children().unwrap(),this.$element.removeClass(this.options.refreshClass).removeClass(this.options.loadingClass).removeClass(this.options.loadedClass).removeClass(this.options.rtlClass).removeClass(this.options.dragClass).removeClass(this.options.grabClass).attr("class",this.$element.attr("class").replace(new RegExp(this.options.responsiveClass+"-\\S+\\s","g"),"")).removeData("owl.carousel")},e.prototype.op=function(a,b,c){var d=this.settings.rtl;switch(b){case"<":return d?a>c:a<c;case">":return d?a<c:a>c;case">=":return d?a<=c:a>=c;case"<=":return d?a>=c:a<=c}},e.prototype.on=function(a,b,c,d){a.addEventListener?a.addEventListener(b,c,d):a.attachEvent&&a.attachEvent("on"+b,c)},e.prototype.off=function(a,b,c,d){a.removeEventListener?a.removeEventListener(b,c,d):a.detachEvent&&a.detachEvent("on"+b,c)},e.prototype.trigger=function(b,c,d,f,g){var h={item:{count:this._items.length,index:this.current()}},i=a.camelCase(a.grep(["on",b,d],function(a){return a}).join("-").toLowerCase()),j=a.Event([b,"owl",d||"carousel"].join(".").toLowerCase(),a.extend({relatedTarget:this},h,c));return this._supress[b]||(a.each(this._plugins,function(a,b){b.onTrigger&&b.onTrigger(j)}),this.register({type:e.Type.Event,name:b}),this.$element.trigger(j),this.settings&&"function"==typeof this.settings[i]&&this.settings[i].call(this,j)),j},e.prototype.enter=function(b){a.each([b].concat(this._states.tags[b]||[]),a.proxy(function(a,b){this._states.current[b]===d&&(this._states.current[b]=0),this._states.current[b]++},this))},e.prototype.leave=function(b){a.each([b].concat(this._states.tags[b]||[]),a.proxy(function(a,b){this._states.current[b]--},this))},e.prototype.register=function(b){if(b.type===e.Type.Event){if(a.event.special[b.name]||(a.event.special[b.name]={}),!a.event.special[b.name].owl){var c=a.event.special[b.name]._default;a.event.special[b.name]._default=function(a){return!c||!c.apply||a.namespace&&a.namespace.indexOf("owl")!==-1?a.namespace&&a.namespace.indexOf("owl")>-1:c.apply(this,arguments)},a.event.special[b.name].owl=!0}}else b.type===e.Type.State&&(this._states.tags[b.name]?this._states.tags[b.name]=this._states.tags[b.name].concat(b.tags):this._states.tags[b.name]=b.tags,this._states.tags[b.name]=a.grep(this._states.tags[b.name],a.proxy(function(c,d){return a.inArray(c,this._states.tags[b.name])===d},this)))},e.prototype.suppress=function(b){a.each(b,a.proxy(function(a,b){this._supress[b]=!0},this))},e.prototype.release=function(b){a.each(b,a.proxy(function(a,b){delete this._supress[b]},this))},e.prototype.pointer=function(a){var c={x:null,y:null};return a=a.originalEvent||a||b.event,a=a.touches&&a.touches.length?a.touches[0]:a.changedTouches&&a.changedTouches.length?a.changedTouches[0]:a,a.pageX?(c.x=a.pageX,c.y=a.pageY):(c.x=a.clientX,c.y=a.clientY),c},e.prototype.isNumeric=function(a){return!isNaN(parseFloat(a))},e.prototype.difference=function(a,b){return{x:a.x-b.x,y:a.y-b.y}},a.fn.ctfOwlCarousel=function(b){var c=Array.prototype.slice.call(arguments,1);return this.each(function(){var d=a(this),f=d.data("owl.carousel");f||(f=new e(this,"object"==typeof b&&b),d.data("owl.carousel",f),a.each(["next","prev","to","destroy","refresh","replace","add","remove"],function(b,c){f.register({type:e.Type.Event,name:c}),f.$element.on(c+".owl.carousel.core",a.proxy(function(a){a.namespace&&a.relatedTarget!==this&&(this.suppress([c]),f[c].apply(this,[].slice.call(arguments,1)),this.release([c]))},f))})),"string"==typeof b&&"_"!==b.charAt(0)&&f[b].apply(f,c)})},a.fn.ctfOwlCarousel.Constructor=e}(window.Zepto||window.jQuery,window,document),function(a,b,c,d){var e=function(b){this._core=b,this._interval=null,this._visible=null,this._handlers={"initialized.owl.carousel":a.proxy(function(a){a.namespace&&this._core.settings.autoRefresh&&this.watch()},this)},this._core.options=a.extend({},e.Defaults,this._core.options),this._core.$element.on(this._handlers)};e.Defaults={autoRefresh:!0,autoRefreshInterval:500},e.prototype.watch=function(){this._interval||(this._visible=this._core.$element.is(":visible"),this._interval=b.setInterval(a.proxy(this.refresh,this),this._core.settings.autoRefreshInterval))},e.prototype.refresh=function(){this._core.$element.is(":visible")!==this._visible&&(this._visible=!this._visible,this._core.$element.toggleClass("ctf-owl-hidden",!this._visible),this._visible&&this._core.invalidate("width")&&this._core.refresh())},e.prototype.destroy=function(){var a,c;b.clearInterval(this._interval);for(a in this._handlers)this._core.$element.off(a,this._handlers[a]);for(c in Object.getOwnPropertyNames(this))"function"!=typeof this[c]&&(this[c]=null)},a.fn.ctfOwlCarousel.Constructor.Plugins.AutoRefresh=e}(window.Zepto||window.jQuery,window,document),function(a,b,c,d){var e=function(b){this._core=b,this._loaded=[],this._handlers={"initialized.owl.carousel change.owl.carousel resized.owl.carousel":a.proxy(function(b){if(b.namespace&&this._core.settings&&this._core.settings.lazyLoad&&(b.property&&"position"==b.property.name||"initialized"==b.type))for(var c=this._core.settings,e=c.center&&Math.ceil(c.items/2)||c.items,f=c.center&&e*-1||0,g=(b.property&&b.property.value!==d?b.property.value:this._core.current())+f,h=this._core.clones().length,i=a.proxy(function(a,b){this.load(b)},this);f++<e;)this.load(h/2+this._core.relative(g)),h&&a.each(this._core.clones(this._core.relative(g)),i),g++},this)},this._core.options=a.extend({},e.Defaults,this._core.options),this._core.$element.on(this._handlers)};e.Defaults={lazyLoad:!1},e.prototype.load=function(c){var d=this._core.$stage.children().eq(c),e=d&&d.find(".ctf-owl-lazy");!e||a.inArray(d.get(0),this._loaded)>-1||(e.each(a.proxy(function(c,d){var e,f=a(d),g=b.devicePixelRatio>1&&f.attr("data-src-retina")||f.attr("data-src");this._core.trigger("load",{element:f,url:g},"lazy"),f.is("img")?f.one("load.owl.lazy",a.proxy(function(){f.css("opacity",1),this._core.trigger("loaded",{element:f,url:g},"lazy")},this)).attr("src",g):(e=new Image,e.onload=a.proxy(function(){f.css({"background-image":'url("'+g+'")',opacity:"1"}),this._core.trigger("loaded",{element:f,url:g},"lazy")},this),e.src=g)},this)),this._loaded.push(d.get(0)))},e.prototype.destroy=function(){var a,b;for(a in this.handlers)this._core.$element.off(a,this.handlers[a]);for(b in Object.getOwnPropertyNames(this))"function"!=typeof this[b]&&(this[b]=null)},a.fn.ctfOwlCarousel.Constructor.Plugins.Lazy=e}(window.Zepto||window.jQuery,window,document),function(a,b,c,d){var e=function(b){this._core=b,this._handlers={"initialized.owl.carousel refreshed.owl.carousel":a.proxy(function(a){a.namespace&&this._core.settings.autoHeight&&this.update()},this),"changed.owl.carousel":a.proxy(function(a){a.namespace&&this._core.settings.autoHeight&&"position"==a.property.name&&this.update()},this),"loaded.owl.lazy":a.proxy(function(a){a.namespace&&this._core.settings.autoHeight&&a.element.closest("."+this._core.settings.itemClass).index()===this._core.current()&&this.update()},this)},this._core.options=a.extend({},e.Defaults,this._core.options),this._core.$element.on(this._handlers)};e.Defaults={autoHeight:!1,autoHeightClass:"ctf-owl-height"},e.prototype.update=function(){var b=this._core._current,c=b+this._core.settings.items,d=this._core.$stage.children().toArray().slice(b,c),e=[],f=0;a.each(d,function(b,c){e.push(a(c).height())}),f=Math.max.apply(null,e),this._core.$stage.parent().height(f).addClass(this._core.settings.autoHeightClass)},e.prototype.destroy=function(){var a,b;for(a in this._handlers)this._core.$element.off(a,this._handlers[a]);for(b in Object.getOwnPropertyNames(this))"function"!=typeof this[b]&&(this[b]=null)},a.fn.ctfOwlCarousel.Constructor.Plugins.AutoHeight=e}(window.Zepto||window.jQuery,window,document),function(a,b,c,d){var e=function(b){this._core=b,this._videos={},this._playing=null,this._handlers={"initialized.owl.carousel":a.proxy(function(a){a.namespace&&this._core.register({type:"state",name:"playing",tags:["interacting"]})},this),"resize.owl.carousel":a.proxy(function(a){a.namespace&&this._core.settings.video&&this.isInFullScreen()&&a.preventDefault()},this),"refreshed.owl.carousel":a.proxy(function(a){a.namespace&&this._core.is("resizing")&&this._core.$stage.find(".cloned .ctf-owl-video-frame").remove()},this),"changed.owl.carousel":a.proxy(function(a){a.namespace&&"position"===a.property.name&&this._playing&&this.stop()},this),"prepared.owl.carousel":a.proxy(function(b){if(b.namespace){var c=a(b.content).find(".ctf-owl-video");c.length&&(c.css("display","none"),this.fetch(c,a(b.content)))}},this)},this._core.options=a.extend({},e.Defaults,this._core.options),this._core.$element.on(this._handlers),this._core.$element.on("click.owl.video",".ctf-owl-video-play-icon",a.proxy(function(a){this.play(a)},this))};e.Defaults={video:!1,videoHeight:!1,videoWidth:!1},e.prototype.fetch=function(a,b){var c=function(){return a.attr("data-vimeo-id")?"vimeo":a.attr("data-vzaar-id")?"vzaar":"youtube"}(),d=a.attr("data-vimeo-id")||a.attr("data-youtube-id")||a.attr("data-vzaar-id"),e=a.attr("data-width")||this._core.settings.videoWidth,f=a.attr("data-height")||this._core.settings.videoHeight,g=a.attr("href");if(!g)throw new Error("Missing video URL.");if(d=g.match(/(http:|https:|)\/\/(player.|www.|app.)?(vimeo\.com|youtu(be\.com|\.be|be\.googleapis\.com)|vzaar\.com)\/(video\/|videos\/|embed\/|channels\/.+\/|groups\/.+\/|watch\?v=|v\/)?([A-Za-z0-9._%-]*)(\&\S+)?/),d[3].indexOf("youtu")>-1)c="youtube";else if(d[3].indexOf("vimeo")>-1)c="vimeo";else{if(!(d[3].indexOf("vzaar")>-1))throw new Error("Video URL not supported.");c="vzaar"}d=d[6],this._videos[g]={type:c,id:d,width:e,height:f},b.attr("data-video",g),this.thumbnail(a,this._videos[g])},e.prototype.thumbnail=function(b,c){var d,e,f,g=c.width&&c.height?'style="width:'+c.width+"px;height:"+c.height+'px;"':"",h=b.find("img"),i="src",j="",k=this._core.settings,l=function(a){e='<div class="ctf-owl-video-play-icon"></div>',d=k.lazyLoad?'<div class="ctf-owl-video-tn '+j+'" '+i+'="'+a+'"></div>':'<div class="ctf-owl-video-tn" style="opacity:1;background-image:url('+a+')"></div>',b.after(d),b.after(e)};if(b.wrap('<div class="ctf-owl-video-wrapper"'+g+"></div>"),this._core.settings.lazyLoad&&(i="data-src",j="ctf-owl-lazy"),h.length)return l(h.attr(i)),h.remove(),!1;"youtube"===c.type?(f="//img.youtube.com/vi/"+c.id+"/hqdefault.jpg",l(f)):"vimeo"===c.type?a.ajax({type:"GET",url:"//vimeo.com/api/v2/video/"+c.id+".json",jsonp:"callback",dataType:"jsonp",success:function(a){f=a[0].thumbnail_large,l(f)}}):"vzaar"===c.type&&a.ajax({type:"GET",url:"//vzaar.com/api/videos/"+c.id+".json",jsonp:"callback",dataType:"jsonp",success:function(a){f=a.framegrab_url,l(f)}})},e.prototype.stop=function(){this._core.trigger("stop",null,"video"),this._playing.find(".ctf-owl-video-frame").remove(),this._playing.removeClass("ctf-owl-video-playing"),this._playing=null,this._core.leave("playing"),this._core.trigger("stopped",null,"video")},e.prototype.play=function(b){var c,d=a(b.target),e=d.closest("."+this._core.settings.itemClass),f=this._videos[e.attr("data-video")],g=f.width||"100%",h=f.height||this._core.$stage.height();this._playing||(this._core.enter("playing"),this._core.trigger("play",null,"video"),e=this._core.items(this._core.relative(e.index())),this._core.reset(e.index()),"youtube"===f.type?c='<iframe width="'+g+'" height="'+h+'" src="//www.youtube.com/embed/'+f.id+"?autoplay=1&rel=0&v="+f.id+'" frameborder="0" allowfullscreen></iframe>':"vimeo"===f.type?c='<iframe src="//player.vimeo.com/video/'+f.id+'?autoplay=1" width="'+g+'" height="'+h+'" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>':"vzaar"===f.type&&(c='<iframe height="'+h+'"width="'+g+'" allowfullscreen mozallowfullscreen webkitAllowFullScreen src="//view.vzaar.com/'+f.id+'/player?autoplay=true"></spanframe>'),a('<div class="ctf-owl-video-frame">'+c+"</div>").insertAfter(e.find(".ctf-owl-video")),this._playing=e.addClass("ctf-owl-video-playing"))},e.prototype.isInFullScreen=function(){var b=c.fullscreenElement||c.mozFullScreenElement||c.webkitFullscreenElement;return b&&a(b).parent().hasClass("ctf-owl-video-frame")},e.prototype.destroy=function(){var a,b;this._core.$element.off("click.owl.video");for(a in this._handlers)this._core.$element.off(a,this._handlers[a]);for(b in Object.getOwnPropertyNames(this))"function"!=typeof this[b]&&(this[b]=null)},a.fn.ctfOwlCarousel.Constructor.Plugins.Video=e}(window.Zepto||window.jQuery,window,document),function(a,b,c,d){var e=function(b){this.core=b,this.core.options=a.extend({},e.Defaults,this.core.options),this.swapping=!0,this.previous=d,this.next=d,this.handlers={"change.owl.carousel":a.proxy(function(a){a.namespace&&"position"==a.property.name&&(this.previous=this.core.current(),this.next=a.property.value)},this),"drag.owl.carousel dragged.owl.carousel translated.owl.carousel":a.proxy(function(a){a.namespace&&(this.swapping="translated"==a.type)},this),"translate.owl.carousel":a.proxy(function(a){a.namespace&&this.swapping&&(this.core.options.animateOut||this.core.options.animateIn)&&this.swap()},this)},this.core.$element.on(this.handlers)};e.Defaults={animateOut:!1,animateIn:!1},e.prototype.swap=function(){if(1===this.core.settings.items&&a.support.animation&&a.support.transition){this.core.speed(0);var b,c=a.proxy(this.clear,this),d=this.core.$stage.children().eq(this.previous),e=this.core.$stage.children().eq(this.next),f=this.core.settings.animateIn,g=this.core.settings.animateOut;this.core.current()!==this.previous&&(g&&(b=this.core.coordinates(this.previous)-this.core.coordinates(this.next),d.one(a.support.animation.end,c).css({left:b+"px"}).addClass("animated ctf-owl-animated-out").addClass(g)),f&&e.one(a.support.animation.end,c).addClass("animated ctf-owl-animated-in").addClass(f))}},e.prototype.clear=function(b){a(b.target).css({left:""}).removeClass("animated ctf-owl-animated-out ctf-owl-animated-in").removeClass(this.core.settings.animateIn).removeClass(this.core.settings.animateOut),this.core.onTransitionEnd()},e.prototype.destroy=function(){var a,b;for(a in this.handlers)this.core.$element.off(a,this.handlers[a]);for(b in Object.getOwnPropertyNames(this))"function"!=typeof this[b]&&(this[b]=null)},
            a.fn.ctfOwlCarousel.Constructor.Plugins.Animate=e}(window.Zepto||window.jQuery,window,document),function(a,b,c,d){var e=function(b){this._core=b,this._timeout=null,this._paused=!1,this._handlers={"changed.owl.carousel":a.proxy(function(a){a.namespace&&"settings"===a.property.name?this._core.settings.autoplay?this.play():this.stop():a.namespace&&"position"===a.property.name&&this._core.settings.autoplay&&this._setAutoPlayInterval()},this),"initialized.owl.carousel":a.proxy(function(a){a.namespace&&this._core.settings.autoplay&&this.play()},this),"play.owl.autoplay":a.proxy(function(a,b,c){a.namespace&&this.play(b,c)},this),"stop.owl.autoplay":a.proxy(function(a){a.namespace&&this.stop()},this),"mouseover.owl.autoplay":a.proxy(function(){this._core.settings.autoplayHoverPause&&this._core.is("rotating")&&this.pause()},this),"mouseleave.owl.autoplay":a.proxy(function(){this._core.settings.autoplayHoverPause&&this._core.is("rotating")&&this.play()},this),"touchstart.owl.core":a.proxy(function(){this._core.settings.autoplayHoverPause&&this._core.is("rotating")&&this.pause()},this),"touchend.owl.core":a.proxy(function(){this._core.settings.autoplayHoverPause&&this.play()},this)},this._core.$element.on(this._handlers),this._core.options=a.extend({},e.Defaults,this._core.options)};e.Defaults={autoplay:!1,autoplayTimeout:5e3,autoplayHoverPause:!1,autoplaySpeed:!1},e.prototype.play=function(a,b){this._paused=!1,this._core.is("rotating")||(this._core.enter("rotating"),this._setAutoPlayInterval())},e.prototype._getNextTimeout=function(d,e){return this._timeout&&b.clearTimeout(this._timeout),b.setTimeout(a.proxy(function(){this._paused||this._core.is("busy")||this._core.is("interacting")||c.hidden||this._core.next(e||this._core.settings.autoplaySpeed)},this),d||this._core.settings.autoplayTimeout)},e.prototype._setAutoPlayInterval=function(){this._timeout=this._getNextTimeout()},e.prototype.stop=function(){this._core.is("rotating")&&(b.clearTimeout(this._timeout),this._core.leave("rotating"))},e.prototype.pause=function(){this._core.is("rotating")&&(this._paused=!0)},e.prototype.destroy=function(){var a,b;this.stop();for(a in this._handlers)this._core.$element.off(a,this._handlers[a]);for(b in Object.getOwnPropertyNames(this))"function"!=typeof this[b]&&(this[b]=null)},a.fn.ctfOwlCarousel.Constructor.Plugins.autoplay=e}(window.Zepto||window.jQuery,window,document),function(a,b,c,d){"use strict";var e=function(b){this._core=b,this._initialized=!1,this._pages=[],this._controls={},this._templates=[],this.$element=this._core.$element,this._overrides={next:this._core.next,prev:this._core.prev,to:this._core.to},this._handlers={"prepared.owl.carousel":a.proxy(function(b){b.namespace&&this._core.settings.dotsData&&this._templates.push('<div class="'+this._core.settings.dotClass+'">'+a(b.content).find("[data-dot]").addBack("[data-dot]").attr("data-dot")+"</div>")},this),"added.owl.carousel":a.proxy(function(a){a.namespace&&this._core.settings.dotsData&&this._templates.splice(a.position,0,this._templates.pop())},this),"remove.owl.carousel":a.proxy(function(a){a.namespace&&this._core.settings.dotsData&&this._templates.splice(a.position,1)},this),"changed.owl.carousel":a.proxy(function(a){a.namespace&&"position"==a.property.name&&this.draw()},this),"initialized.owl.carousel":a.proxy(function(a){a.namespace&&!this._initialized&&(this._core.trigger("initialize",null,"navigation"),this.initialize(),this.update(),this.draw(),this._initialized=!0,this._core.trigger("initialized",null,"navigation"))},this),"refreshed.owl.carousel":a.proxy(function(a){a.namespace&&this._initialized&&(this._core.trigger("refresh",null,"navigation"),this.update(),this.draw(),this._core.trigger("refreshed",null,"navigation"))},this)},this._core.options=a.extend({},e.Defaults,this._core.options),this.$element.on(this._handlers)};e.Defaults={nav:!1,navText:["prev","next"],navSpeed:!1,navElement:"div",navContainer:!1,navContainerClass:"ctf-owl-nav",navClass:["ctf-owl-prev","ctf-owl-next"],slideBy:1,dotClass:"ctf-owl-dot",dotsClass:"ctf-owl-dots",dots:!0,dotsEach:!1,dotsData:!1,dotsSpeed:!1,dotsContainer:!1},e.prototype.initialize=function(){var b,c=this._core.settings;this._controls.$relative=(c.navContainer?a(c.navContainer):a("<div>").addClass(c.navContainerClass).appendTo(this.$element)).addClass("disabled"),this._controls.$previous=a("<"+c.navElement+">").addClass(c.navClass[0]).html(c.navText[0]).prependTo(this._controls.$relative).on("click",a.proxy(function(a){this.prev(c.navSpeed)},this)),this._controls.$next=a("<"+c.navElement+">").addClass(c.navClass[1]).html(c.navText[1]).appendTo(this._controls.$relative).on("click",a.proxy(function(a){this.next(c.navSpeed)},this)),c.dotsData||(this._templates=[a("<div>").addClass(c.dotClass).append(a("<span>")).prop("outerHTML")]),this._controls.$absolute=(c.dotsContainer?a(c.dotsContainer):a("<div>").addClass(c.dotsClass).appendTo(this.$element)).addClass("disabled"),this._controls.$absolute.on("click","div",a.proxy(function(b){var d=a(b.target).parent().is(this._controls.$absolute)?a(b.target).index():a(b.target).parent().index();b.preventDefault(),this.to(d,c.dotsSpeed)},this));for(b in this._overrides)this._core[b]=a.proxy(this[b],this)},e.prototype.destroy=function(){var a,b,c,d;for(a in this._handlers)this.$element.off(a,this._handlers[a]);for(b in this._controls)this._controls[b].remove();for(d in this.overides)this._core[d]=this._overrides[d];for(c in Object.getOwnPropertyNames(this))"function"!=typeof this[c]&&(this[c]=null)},e.prototype.update=function(){var a,b,c,d=this._core.clones().length/2,e=d+this._core.items().length,f=this._core.maximum(!0),g=this._core.settings,h=g.center||g.autoWidth||g.dotsData?1:g.dotsEach||g.items;if("page"!==g.slideBy&&(g.slideBy=Math.min(g.slideBy,g.items)),g.dots||"page"==g.slideBy)for(this._pages=[],a=d,b=0,c=0;a<e;a++){if(b>=h||0===b){if(this._pages.push({start:Math.min(f,a-d),end:a-d+h-1}),Math.min(f,a-d)===f)break;b=0,++c}b+=this._core.mergers(this._core.relative(a))}},e.prototype.draw=function(){var b,c=this._core.settings,d=this._core.items().length<=c.items,e=this._core.relative(this._core.current()),f=c.loop||c.rewind;this._controls.$relative.toggleClass("disabled",!c.nav||d),c.nav&&(this._controls.$previous.toggleClass("disabled",!f&&e<=this._core.minimum(!0)),this._controls.$next.toggleClass("disabled",!f&&e>=this._core.maximum(!0))),this._controls.$absolute.toggleClass("disabled",!c.dots||d),c.dots&&(b=this._pages.length-this._controls.$absolute.children().length,c.dotsData&&0!==b?this._controls.$absolute.html(this._templates.join("")):b>0?this._controls.$absolute.append(new Array(b+1).join(this._templates[0])):b<0&&this._controls.$absolute.children().slice(b).remove(),this._controls.$absolute.find(".active").removeClass("active"),this._controls.$absolute.children().eq(a.inArray(this.current(),this._pages)).addClass("active"))},e.prototype.onTrigger=function(b){var c=this._core.settings;b.page={index:a.inArray(this.current(),this._pages),count:this._pages.length,size:c&&(c.center||c.autoWidth||c.dotsData?1:c.dotsEach||c.items)}},e.prototype.current=function(){var b=this._core.relative(this._core.current());return a.grep(this._pages,a.proxy(function(a,c){return a.start<=b&&a.end>=b},this)).pop()},e.prototype.getPosition=function(b){var c,d,e=this._core.settings;return"page"==e.slideBy?(c=a.inArray(this.current(),this._pages),d=this._pages.length,b?++c:--c,c=this._pages[(c%d+d)%d].start):(c=this._core.relative(this._core.current()),d=this._core.items().length,b?c+=e.slideBy:c-=e.slideBy),c},e.prototype.next=function(b){a.proxy(this._overrides.to,this._core)(this.getPosition(!0),b)},e.prototype.prev=function(b){a.proxy(this._overrides.to,this._core)(this.getPosition(!1),b)},e.prototype.to=function(b,c,d){var e;!d&&this._pages.length?(e=this._pages.length,a.proxy(this._overrides.to,this._core)(this._pages[(b%e+e)%e].start,c)):a.proxy(this._overrides.to,this._core)(b,c)},a.fn.ctfOwlCarousel.Constructor.Plugins.Navigation=e}(window.Zepto||window.jQuery,window,document),function(a,b,c,d){"use strict";var e=function(c){this._core=c,this._hashes={},this.$element=this._core.$element,this._handlers={"initialized.owl.carousel":a.proxy(function(c){c.namespace&&"URLHash"===this._core.settings.startPosition&&a(b).trigger("hashchange.owl.navigation")},this),"prepared.owl.carousel":a.proxy(function(b){if(b.namespace){var c=a(b.content).find("[data-hash]").addBack("[data-hash]").attr("data-hash");if(!c)return;this._hashes[c]=b.content}},this),"changed.owl.carousel":a.proxy(function(c){if(c.namespace&&"position"===c.property.name){var d=this._core.items(this._core.relative(this._core.current())),e=a.map(this._hashes,function(a,b){return a===d?b:null}).join();if(!e||b.location.hash.slice(1)===e)return;b.location.hash=e}},this)},this._core.options=a.extend({},e.Defaults,this._core.options),this.$element.on(this._handlers),a(b).on("hashchange.owl.navigation",a.proxy(function(a){var c=b.location.hash.substring(1),e=this._core.$stage.children(),f=this._hashes[c]&&e.index(this._hashes[c]);f!==d&&f!==this._core.current()&&this._core.to(this._core.relative(f),!1,!0)},this))};e.Defaults={URLhashListener:!1},e.prototype.destroy=function(){var c,d;a(b).off("hashchange.owl.navigation");for(c in this._handlers)this._core.$element.off(c,this._handlers[c]);for(d in Object.getOwnPropertyNames(this))"function"!=typeof this[d]&&(this[d]=null)},a.fn.ctfOwlCarousel.Constructor.Plugins.Hash=e}(window.Zepto||window.jQuery,window,document),function(a,b,c,d){function e(b,c){var e=!1,f=b.charAt(0).toUpperCase()+b.slice(1);return a.each((b+" "+h.join(f+" ")+f).split(" "),function(a,b){if(g[b]!==d)return e=!c||b,!1}),e}function f(a){return e(a,!0)}var g=a("<support>").get(0).style,h="Webkit Moz O ms".split(" "),i={transition:{end:{WebkitTransition:"webkitTransitionEnd",MozTransition:"transitionend",OTransition:"oTransitionEnd",transition:"transitionend"}},animation:{end:{WebkitAnimation:"webkitAnimationEnd",MozAnimation:"animationend",OAnimation:"oAnimationEnd",animation:"animationend"}}},j={csstransforms:function(){return!!e("transform")},csstransforms3d:function(){return!!e("perspective")},csstransitions:function(){return!!e("transition")},cssanimations:function(){return!!e("animation")}};j.csstransitions()&&(a.support.transition=new String(f("transition")),a.support.transition.end=i.transition.end[a.support.transition]),j.cssanimations()&&(a.support.animation=new String(f("animation")),a.support.animation.end=i.animation.end[a.support.animation]),j.csstransforms()&&(a.support.transform=new String(f("transform")),a.support.transform3d=j.csstransforms3d())}(window.Zepto||window.jQuery,window,document);


        // Wrapper function for carousel code
        function ctfInitCarousel($ctf, startPos) {
            var minHeight,
                autoplay = false,
                autoplayTimeout = 5000,
                autoplaySpeed = 1500,
                items = $ctf.attr('data-ctf-cols'),
                itemsMobile = $ctf.attr('data-ctf-mobilecols'),
                pagination = ($ctf.attr('data-ctf-pag') === 'true'),
                arrows = $ctf.attr('data-ctf-arrows'),
                height = $ctf.attr('data-ctf-height'),
                autoHeight = false,
                afterUpdate = false,
                afterInit = ctfShowCarousel,
                lastID = $ctf.find('.ctf-item').last().attr('id'),
                startPosition = startPos,
                minHeight = 100;

            $ctf.find('.ctf-more').attr('data-ctf-last', lastID);
            $ctf.hide();

            if (typeof $ctf.attr('data-ctf-interval') !== 'undefined') {
                autoplayTimeout = parseInt($ctf.attr('data-ctf-interval'));
                autoplay = autoplayTimeout !== '' ? true : false;
            } else {
                autoplay = false;
            }

            var loop = false,
                rewind = false;
            if ($ctf.attr('data-ctf-loop') !== 'none') {
                loop = true;
                if ($ctf.attr('data-ctf-loop') === 'rewind') {
                    rewind = true;
                    loop = false;
                }
            }
            // force single item for autoheight
            if (height === 'auto') {
                autoHeight = true;
                items = 1;
                itemsMobile = 1;
            } else if (height === 'clickexpand') {
                afterUpdate = function () {
                    // delay seems to be needed
                    ctfShowCarousel($ctf);
                    setTimeout(function () {
                        ctfUpdateSize($ctf);
                        ctfClickExpandInit($ctf);
                    }, 750);
                };
                afterInit = function () {
                    // delay seems to be needed
                    ctfShowCarousel($ctf);
                    setTimeout(function () {
                        ctfUpdateSize($ctf);
                        ctfClickExpandInit($ctf);
                        ctfSVGify($ctf);
                        /*
                        if (autoplay) {
                            $ctf.on({
                                mouseenter: function () {
                                    $navElementsWrapper.fadeIn();
                                },
                                mouseleave: function () {
                                    $navElementsWrapper.fadeOut();
                                }
                            });
                        }
*/
                    }, 750);
                };

            }

            function ctfShowCarousel() {
                $ctf.show();
                $ctf.find('.ctf-item').each(function () {

                    var $ctfItem = $(this),
                        maxMedia = $ctf.attr('data-ctfmaxmedia'),
                        numMedia = $(this).find('.ctf-tweet-media a').length,
                        visibleMedia = Math.min(numMedia, maxMedia),
                        feedWidth = $ctfItem.innerWidth(),
                        imageCols = $ctf.attr('data-ctfimagecols');

                    // code also used in ctf-scripts
                    if ($ctfItem.find('.ctf-image img').length && $ctfItem.find('.ctf-image img').attr('data-ctfsizes') !== 'full') {
                        $ctfItem.find('.ctf-image img').each(function (index) {
                            $(this).attr('src', getImageSource(imageCols, $(this).attr('src'), visibleMedia, feedWidth, $(this).attr('data-ctfsizes'),index));
                        });
                    }

                    // code also used in ctf-scripts
                    var $ctfIconFirst = $ctf.find('.ctf-tweet-actions a').first();
                    $ctf.find('.ctf-twitterlink').css('line-height', $ctfIconFirst.height() + 'px');

                    //Adjust icon number font size to be slightly smaller than the icon size
                    if ($ctfIconFirst.length) {
                        var ctfIconSize = parseInt($ctfIconFirst.css('font-size').replace('px', ''));
                        $ctf.find('.ctf-action-count').css({
                            'display': 'block',
                            'font-size': (ctfIconSize - 4) + 'px',
                            'line-height': $ctfIconFirst.height() + 'px'
                        });
                    }
                });
                setTimeout( function() {
                    var areaLeft = parseInt($ctf.find('.ctf-owl-stage-outer').eq(0).outerHeight()) - parseInt($ctf.find('.ctf-more span').eq(0).outerHeight());
                    //$ctf.find('.ctf-more span').css('padding-top',areaLeft/2 + 'px').css('padding-bottom',areaLeft/2 + 'px');
                    $ctf.find('.ctf-more').css('padding-top',areaLeft/2 + 'px').css('padding-bottom',areaLeft/2 + 'px');
                    if( $ctf.is(":hover")) {
                        $ctf.find('.ctf-owl-nav').show();
                        $ctf.trigger('mouseenter').trigger('mouseover');
                    }
                },1000);
            }

            // function used to set feed height to the smallest post, then user can expand
            function ctfUpdateSize($ctf) {
                minHeight = parseInt($ctf.find('.ctf-owl-item').eq(0).outerHeight());
                $ctf.find('.ctf-owl-item').each(function () {
                    if(!$(this).find('.ctf-more').length) {
                        var thisHeight = parseInt($(this).outerHeight());
                        minHeight = (minHeight <= thisHeight ? minHeight : thisHeight);
                    }
                });
                $ctf.find('.ctf-owl-stage-outer').css('height', minHeight + 'px');
            }

            // gets the click expand functionality going
            function ctfClickExpandInit($ctf) {
                var moreClass = 'ctf-carousel-more',
                    lessClass = 'ctf-carousel-less',
                    moreText = '<span class="fa fa-plus" aria-hidden="true"></span>',
                    lessText = '<span class="fa fa-minus" aria-hidden="true"></span>',
                    moreHtml = '<a href="#" class="' + moreClass + '"><span>' + moreText + '</span></a>',
                    $owlStageOuter = $ctf.find('.ctf-owl-stage-outer');

                $owlStageOuter.after(moreHtml);
                $ctf.find('.ctf-carousel-more').on('click', function (e) {
                    e.preventDefault();
                    var $thisMoreButton = $(this);
                    if ($thisMoreButton.hasClass(lessClass)) {
                        ctfFeedHeightToggle(minHeight, $owlStageOuter);
                        $thisMoreButton.removeClass(lessClass).find('span').html(moreText);

                    } else {
                        // record the heights of all of the loaded posts
                        var elementHeights = $ctf.find('.ctf-owl-item').map(function () {
                                return $(this).height();
                            }).get(),
                            // record the greatest height of the loaded posts
                            maxHeight = Math.max.apply(null, elementHeights);
                        ctfFeedHeightToggle(maxHeight, $owlStageOuter);
                        $thisMoreButton.addClass(lessClass).find('span').html(lessText);
                    }
                });
            }

            // used to resize the feed after certain click events
            function ctfFeedHeightToggle(newHeight, $owlStageOuter ) {
                $owlStageOuter.animate({
                    height: newHeight + 'px'
                }, 400);
            }
            /*
            $ctf.find('.ctf-tweets').append($ctf.find('#ctf-more')).ctfOwlCarousel({
                loop: true
            });
*/
            var ctfBreakpoints = {};
            if (typeof $ctf.attr('data-ctf-breakpoints') !== 'undefined') {
                ctfBreakpoints = JSON.parse($ctf.attr('data-ctf-breakpoints'));
                var hasItem = false;
                for (var prop in ctfBreakpoints) {
                    if (typeof ctfBreakpoints[prop] !== 'object') {
                        ctfBreakpoints[prop] = {'items':ctfBreakpoints[prop]};
                    }
                }
            } else {
                ctfBreakpoints = {
                    0: {
                        items: itemsMobile
                    },
                    480: {
                        items: itemsMobile
                    },
                    640: {
                        items: items
                    }
                }
            }

            $ctf.find('.ctf-tweets').append($ctf.find('#ctf-more')).ctfOwlCarousel({
                loop: loop,
                rewind: rewind,
                autoplay: autoplay,
                autoplayTimeout: Math.max(autoplayTimeout,2000),
                autoplaySpeed: false,
                autoplayHoverPause: true,
                nav: true,
                navText: ['<span class="fa fa-chevron-left" aria-hidden="true"></span>', '<span class="fa fa-chevron-right" aria-hidden="true"></span>'],
                dots: pagination,
                autoHeight: autoHeight,
                items: items,
                responsive: ctfBreakpoints,
                onUpdate: afterUpdate,
                onInitialize: afterInit,
                startPosition: startPosition
            });

            var $navElementsWrapper = $ctf.find('.ctf-owl-nav');
            if (arrows === 'onhover') {
                $navElementsWrapper.addClass('onhover').hide();
                $ctf.on({
                    mouseenter: function () {
                        $navElementsWrapper.fadeIn();
                    },
                    mouseleave: function () {
                        $navElementsWrapper.fadeOut();
                    }
                });
            } else if (arrows === 'below') {
                var $dots = $ctf.find('.ctf-owl-dots'),
                    $prev = $ctf.find('.ctf-owl-prev'),
                    $next = $ctf.find('.ctf-owl-next'),
                    $nav = $ctf.find('.ctf-owl-nav'),
                    $dot = $ctf.find('.ctf-owl-dot'),
                    widthDots = $dot.length * $dot.innerWidth(),
                    maxWidth = $ctf.innerWidth();

                $prev.after($dots);

                $nav.css('position', 'relative');
                $next.css('position', 'absolute').css('top', '-6px').css('right', Math.max((.5 * $nav.innerWidth() - .5 * (widthDots) - $next.innerWidth() - 6), 0));
                $prev.css('position', 'absolute').css('top', '-6px').css('left', Math.max((.5 * $nav.innerWidth() - .5 * (widthDots) - $prev.innerWidth() - 6), 0));
            } else if (arrows === 'hide') {
                $navElementsWrapper.addClass('hide').hide();
            }
            setTimeout( function() {
                ctfSVGify($ctf);
            }, 100);

            var ctfItemWidth = $ctf.find('.ctf-item').first().width();
            if (ctfItemWidth <= 480) $ctf.addClass('ctf-narrow');
            if (ctfItemWidth <= 320) $ctf.addClass('ctf-super-narrow');
            if (ctfItemWidth > 480) $ctf.removeClass('ctf-narrow ctf-super-narrow');

        }

        var tcChecks = Math.min(Math.ceil(6/$('.ctf').length),3);

        //Loop through each feed on the page
        $('.ctf').each(function (index) {

            var $ctf = $(this),
                numNeeded = parseInt($ctf.attr('data-ctfneeded'));

            if (typeof ctfFeeds[index] === 'undefined') {
                ctfFeeds[index] = ctfCreateFeed($(this),tcChecks);
            }

            ctfScripts($ctf);

            // delay added to prevent strange issue with ajax themes returning the entire page
            setTimeout(function(){
                if(numNeeded > 0){
                    var $ctfMore = $ctf.find('.ctf-more'),
                        lastIDAttr = $ctf.find('.ctf-item').last().attr('id'),
                        lastIDData = lastIDAttr.replace('ctf_', ''),
                        shortcodeData = $ctf.attr('data-ctfshortcode');

                    ctfLoadTweets(lastIDData, shortcodeData , $ctf, $ctfMore, numNeeded, '', true);
                }
            },500);

            // add carousel if needed
            if ($ctf.hasClass('ctf-carousel')) {
                ctfInitCarousel($ctf, 0);

                //Resize load more button displayed within carousel
                $ctf.find('.ctf-more').css({
                    'padding-top': ( $ctf.find('.ctf-owl-stage-outer').height() - $ctf.find('.ctf-more span').height() - 40 ) / 2,
                    'padding-bottom': ( $ctf.find('.ctf-owl-stage-outer').height() - $ctf.find('.ctf-more span').height() - 40 ) / 2
                });

                // $ctf.find('.ctf-owl-stage').animate();
            }
            // add the load more button and input to simulate a dynamic json file call
            $ctf.find('.ctf-more').on('click', function () {

                // read the json that is in the ctf-shortcode-data that contains all of the shortcode arguments
                var $ctfMore = $(this),
                    lastIDAttr = $ctf.find('.ctf-item').last().attr('id'),
                    lastIDData = lastIDAttr.replace('ctf_', ''),
                    persistentIndex = $ctf.find('.ctf-item').length,
                    shortcodeData = $ctf.attr('data-ctfshortcode');

                if($ctf.hasClass('ctf-carousel')) {
                    lastIDData = $ctf.find('.ctf-more').attr('data-ctf-last').replace('ctf_', '');
                }

                ctfLoadTweets(lastIDData, shortcodeData, $ctf, $ctfMore, 0, persistentIndex, false);
            });
            // try twitter card generator
            ctfTwitterCardGenerator(index);

            $ctf.find('.ctf-author-box-link p:empty').remove();
        });

        // Twitter Cards
        function ctfTweetLinkRetriever(el,index) {
            var urls = [];
            el.find('.ctf-check-link').each(function(){
                if (!$(this).hasClass('ctf-tc-checked') && !$(this).find('.ctf-quoted-tweet').length) {
                    urls.push($(this).attr('data-ctflinkurl'));
                }
            });
            return urls;
        }

        function ctfTwitterCardGenerator(index) {
            var twitterCardUrls = ctfTweetLinkRetriever(ctfFeeds[index].element,index);
            ctfFeeds[index].checksRemaining--;
            if(twitterCardUrls.length > 0){

                jQuery.ajax({
                    url: ctf.ajax_url,
                    type: 'post',
                    data: {
                        action: 'ctf_twitter_cards',
                        ctf_urls: twitterCardUrls
                    },
                    success: function (data){
                        if(data.substring(0,1) !== '<' && data.substring(0,200).indexOf('<meta') === -1) {
                            var urlObject = jQuery.parseJSON(data);
                            if(urlObject && urlObject.hasOwnProperty('error')){
                                console.log(urlObject['error']);
                            } else {
                                var results = ctfAddTwitterCards(urlObject, index);
                                if (ctfFeeds[index].element.find('.ctf-check-link').length > 0 && ctfFeeds[index].checksRemaining > 0) ctfTwitterCardGenerator(index);
                                window.dispatchEvent(new Event('resize'));
                            }
                        }
                    }
                }); // ajax call

            }
        }

        function ctfAddTwitterCards(tcObj,index){
            var $ctfCheckLink = ctfFeeds[index].element.find('.ctf-check-link');
            $ctfCheckLink.each(function(){
                var $self = $(this),
                    link = $self.attr('data-ctflinkurl');
                ctfFeeds[index].tcLinksToCheck--;

                if(tcObj.hasOwnProperty(link) && !$self.find('.ctf-quoted-tweet').length){

                    //If it's an embedded video then don't show the Twitter card too
                    var youtube = (link.indexOf('youtube.com/watch') > -1) ? true : false,
                        youtu = (link.indexOf('youtu.be') > -1) ? true : false,
                        youtubeembed = (link.indexOf('youtube.com/embed') > -1) ? true : false,
                        vimeo = (link.indexOf('vimeo') > -1) ? true : false,
                        vine = (link.indexOf('vine.co') > -1) ? true : false,
                        soundcloud = (link.indexOf('soundcloud.com') > -1) ? true : false,
                        ctf_video_embed = false;
                    if(youtube || youtu || youtubeembed || vimeo || vine || soundcloud) ctf_video_embed = true;

                    if( (tcObj[link]['twitter:card'] === 'summary_large_image' || tcObj[link]['twitter:card'] === 'summary' || tcObj[link]['twitter:card'] === 'player') && !ctf_video_embed ) {

                        var imgHtml = '',
                            linkdomain = (typeof link !== 'undefined') ? link.replace(/^https?\:\/\//i, "").split('/')[0] : '';

                        if(tcObj[link].hasOwnProperty('twitter:image') && tcObj[link]['twitter:image'] !== '') {
                            imgHtml = '<div class="ctf-tc-image"><img src="'+tcObj[link]['twitter:image']+'" alt="'+tcObj[link]['twitter:image:alt']+'"></div>'
                        }

                        $self.find('.ctf-tweet-content').append('<a class="ctf-twitter-card ctf-tc-type-'+tcObj[link]['twitter:card']+'" href="'+link+'" target="_blank" style="color:'+$self.closest('.ctf').find('.ctf-tweet-text').css('color')+'">' +
                            imgHtml +
                            '<div class="ctf-tc-summary-info">' +
                            '<p class="ctf-tc-heading">'+tcObj[link]['twitter:title']+'</p>' +
                            '<p class="ctf-tc-desc">'+tcObj[link]['twitter:description'].substring(0,150)+'</p>' +
                            '<p class="ctf-tc-url">'+linkdomain+'</p>' +
                            '</div>' +
                            '</a>');

                    } else if(tcObj[link]['twitter:card'] === 'amplify') {

                        var ctf_card_html = '',
                            ctfsrc = tcObj[link]['twitter:amplify:media:ctfsrc'],
                            ctfposter = tcObj[link]['twitter:image:src'],
                            ctfTitle = tcObj[link]['twitter:title'];

                        //HTML5 video
                        if( typeof ctfsrc !== 'undefined' ){

                            var ctfSVG = $self.closest('.ctf') . hasClass('ctf-fontfile') ? '' : '<svg style="color: rgba(255,255,255,1)" class="svg-inline--fa fa-play fa-w-14 ctf_playbtn" aria-hidden="true" data-fa-processed="" data-prefix="fa" data-icon="play" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z"></path></svg>';

                            ctf_card_html += '<div class="ctf-tweet-media">';

                            if( $self.find('.ctf-tweet-content').hasClass('ctf-disable-lightbox') ){
                                ctf_card_html += '<a href="https://twitter.com/statuses/' + $self.attr('id').replace('ctf_','') + '" target="_blank">';
                            } else {
                                ctf_card_html += '<a href="'+ctfposter+'" data-ctf-lightbox="1" data-title="'+$self.find('.ctf-tweet-text').text()+'" data-user="'+$self.find('.ctf-author-box .ctf-author-screenname').text().substr(1)+'" data-name="'+$self.find('.ctf-author-box .ctf-author-name').text()+'" data-id="'+$self.attr('id')+'" data-url="'+$self.find('.ctf-tweet-actions .ctf-twitterlink').attr('href')+'" data-avatar="'+$self.find('.ctf-author-box .ctf-author-avatar img').attr('src')+'" data-date="'+$self.find('.ctf-tweet-meta .ctf-tweet-date').text()+'" data-video="" data-iframe="'+link+'" data-amplify="true" class="ctf-video">' +
                                    ctfSVG +
                                    '<div class="ctf-photo-hover"></div>';
                            }

                            ctf_card_html += '<img src="'+ctfposter+'" alt="'+ctfTitle+'"></a></div>';
                        }

                        $self.find('.ctf-tweet-content').append(ctf_card_html);

                        //Fade in links on hover for Amplify cards loaded via Ajax
                        $self.find('.ctf-tweet-content:not(.ctf-disable-lightbox) .ctf-tweet-media a').on({
                            mouseenter: function () {
                                $(this).find('.ctf-photo-hover').fadeIn(200);
                            },
                            mouseleave: function () {
                                $(this).find('.ctf-photo-hover').stop().fadeOut(600);
                            }
                        });

                    }

                    //Crop the Twitter card images
                    ctfCropImages('.ctf-tc-image');

                }
                $self.removeClass('ctf-check-link');
                $(this).addClass('ctf-tc-checked');
                // remove the url from the link if it now has a twitter card or embedded video
                if ($self.find('.ctf-iframe').length || $self.find('.ctf-video').length || $self.find('.ctf-twitter-card').length) {
                    if ($self.find('.ctf-tweet-text').find('a[href*="https://t.co/"], a[href*="http://t.co/"]').length) {
                        $self.find('.ctf-tweet-text').find('a[href*="https://t.co/"], a[href*="http://t.co/"]').last().hide().addClass('ctf-tc-hidden');
                    } else if ($self.find('.ctf-tweet-text').find('a[href="'+link+'"]').length) {
                        $self.find('.ctf-tweet-text').find('a[href="'+link+'"]').hide().addClass('ctf-tc-hidden');
                    }
                }

                return ctfFeeds[index].tcLinksToCheck;
            });

            var evt = jQuery.Event('ctfaftertcadded');
            evt.feed = ctfFeeds[index];
            jQuery(window).trigger(evt);
        }


        function ctfCropImages( selector ){
            if (typeof selector === 'undefined') {
                return;
            }
            // https://github.com/karacas/imgLiquid
            var imgLiquid = imgLiquid || {VER: '0.9.944'};
            imgLiquid.bgs_Available = false;
            imgLiquid.bgs_CheckRunned = false;
            imgLiquid.injectCss = selector + ' img {visibility:hidden}';

            !function(i){function t(){if(!imgLiquid.bgs_CheckRunned){imgLiquid.bgs_CheckRunned=!0;var t=i('<span style="background-size:cover" />');i("body").append(t),!function(){var i=t[0];if(i&&window.getComputedStyle){var e=window.getComputedStyle(i,null);e&&e.backgroundSize&&(imgLiquid.bgs_Available="cover"===e.backgroundSize)}}(),t.remove()}}i.fn.extend({imgLiquid:function(e){this.defaults={fill:!0,verticalAlign:"center",horizontalAlign:"center",useBackgroundSize:!0,useDataHtmlAttr:!0,responsive:!0,delay:0,fadeInTime:0,removeBoxBackground:!0,hardPixels:!0,responsiveCheckTime:500,timecheckvisibility:500,onStart:null,onFinish:null,onItemStart:null,onItemFinish:null,onItemError:null},t();var a=this;return this.options=e,this.settings=i.extend({},this.defaults,this.options),this.settings.onStart&&this.settings.onStart(),this.each(function(t){function e(){-1===u.css("background-image").indexOf(encodeURI(h.attr("src")))&&u.css({"background-image":'url("'+encodeURI(h.attr("src"))+'")'}),u.css({"background-size":g.fill?"cover":"contain","background-position":(g.horizontalAlign+" "+g.verticalAlign).toLowerCase(),"background-repeat":"no-repeat"}),i("a:first",u).css({display:"block",width:"100%",height:"100%"}),i("img",u).css({display:"none"}),g.onItemFinish&&g.onItemFinish(t,u,h),u.addClass("imgLiquid_bgSize"),u.addClass("imgLiquid_ready"),l()}function o(){function e(){h.data("imgLiquid_error")||h.data("imgLiquid_loaded")||h.data("imgLiquid_oldProcessed")||(u.is(":visible")&&h[0].complete&&h[0].width>0&&h[0].height>0?(h.data("imgLiquid_loaded",!0),setTimeout(r,t*g.delay)):setTimeout(e,g.timecheckvisibility))}if(h.data("oldSrc")&&h.data("oldSrc")!==h.attr("src")){var a=h.clone().removeAttr("style");return a.data("imgLiquid_settings",h.data("imgLiquid_settings")),h.parent().prepend(a),h.remove(),h=a,h[0].width=0,void setTimeout(o,10)}return h.data("imgLiquid_oldProcessed")?void r():(h.data("imgLiquid_oldProcessed",!1),h.data("oldSrc",h.attr("src")),i("img:not(:first)",u).css("display","none"),u.css({overflow:"hidden"}),h.fadeTo(0,0).removeAttr("width").removeAttr("height").css({visibility:"visible","max-width":"none","max-height":"none",width:"auto",height:"auto",display:"block"}),h.on("error",n),h[0].onerror=n,e(),void d())}function d(){(g.responsive||h.data("imgLiquid_oldProcessed"))&&h.data("imgLiquid_settings")&&(g=h.data("imgLiquid_settings"),u.actualSize=u.get(0).offsetWidth+u.get(0).offsetHeight/1e4,u.sizeOld&&u.actualSize!==u.sizeOld&&r(),u.sizeOld=u.actualSize,setTimeout(d,g.responsiveCheckTime))}function n(){h.data("imgLiquid_error",!0),u.addClass("imgLiquid_error"),g.onItemError&&g.onItemError(t,u,h),l()}function s(){var i={};if(a.settings.useDataHtmlAttr){var t=u.attr("data-imgLiquid-fill"),e=u.attr("data-imgLiquid-horizontalAlign"),o=u.attr("data-imgLiquid-verticalAlign");("true"===t||"false"===t)&&(i.fill=Boolean("true"===t)),void 0===e||"left"!==e&&"center"!==e&&"right"!==e&&-1===e.indexOf("%")||(i.horizontalAlign=e),void 0===o||"top"!==o&&"bottom"!==o&&"center"!==o&&-1===o.indexOf("%")||(i.verticalAlign=o)}return imgLiquid.isIE&&a.settings.ieFadeInDisabled&&(i.fadeInTime=0),i}function r(){var i,e,a,o,d,n,s,r,c=0,m=0,f=u.width(),v=u.height();void 0===h.data("owidth")&&h.data("owidth",h[0].width),void 0===h.data("oheight")&&h.data("oheight",h[0].height),g.fill===f/v>=h.data("owidth")/h.data("oheight")?(i="100%",e="auto",a=Math.floor(f),o=Math.floor(f*(h.data("oheight")/h.data("owidth")))):(i="auto",e="100%",a=Math.floor(v*(h.data("owidth")/h.data("oheight"))),o=Math.floor(v)),d=g.horizontalAlign.toLowerCase(),s=f-a,"left"===d&&(m=0),"center"===d&&(m=.5*s),"right"===d&&(m=s),-1!==d.indexOf("%")&&(d=parseInt(d.replace("%",""),10),d>0&&(m=s*d*.01)),n=g.verticalAlign.toLowerCase(),r=v-o,"left"===n&&(c=0),"center"===n&&(c=.5*r),"bottom"===n&&(c=r),-1!==n.indexOf("%")&&(n=parseInt(n.replace("%",""),10),n>0&&(c=r*n*.01)),g.hardPixels&&(i=a,e=o),h.css({width:i,height:e,"margin-left":Math.floor(m),"margin-top":Math.floor(c)}),h.data("imgLiquid_oldProcessed")||(h.fadeTo(g.fadeInTime,1),h.data("imgLiquid_oldProcessed",!0),g.removeBoxBackground&&u.css("background-image","none"),u.addClass("imgLiquid_nobgSize"),u.addClass("imgLiquid_ready")),g.onItemFinish&&g.onItemFinish(t,u,h),l()}function l(){t===a.length-1&&a.settings.onFinish&&a.settings.onFinish()}var g=a.settings,u=i(this),h=i("img:first",u);return h.length?(h.data("imgLiquid_settings")?(u.removeClass("imgLiquid_error").removeClass("imgLiquid_ready"),g=i.extend({},h.data("imgLiquid_settings"),a.options)):g=i.extend({},a.settings,s()),h.data("imgLiquid_settings",g),g.onItemStart&&g.onItemStart(t,u,h),void(imgLiquid.bgs_Available&&g.useBackgroundSize?e():o())):void n()})}})}(jQuery);

            // Inject css styles ______________________________________________________
            !function () {
                var css = imgLiquid.injectCss,
                    head = document.getElementsByTagName('head')[0],
                    style = document.createElement('style');
                style.type = 'text/css';
                if (style.styleSheet) {
                    style.styleSheet.cssText = css;
                } else {
                    style.appendChild(document.createTextNode(css));
                }
                head.appendChild(style);
            }();
            jQuery( selector ).imgLiquid({fill:true});


            setTimeout(function(){
                $( selector ).each(function(){
                    var $selector = $(this),
                        $container = $selector.closest('.ctf');

                    //If narrow set it to the height of the container
                    $selector.css({'display':'block', 'height': $selector.parent().innerHeight()});

                    //If narrow then set it to the height of the text section as it's used to set the height of the image for the full-width card layout
                    if( $container.hasClass( 'ctf-narrow' ) ) $selector.css({'display':'block', 'height': $selector.width(), 'max-height' : '260px'});

                    //Adjust the masonry layout after Twitter cards are loaded
                    if( $container.hasClass( 'ctf-masonry' ) ) $container.find('.ctf-tweets').ctfmasonry({itemSelector: '.ctf-item'});
                    if (selector === '.ctf-tc-image') {
                        if (typeof $selector.attr('data-bg') !== 'undefined' && 'url("'+$selector.attr('data-bg')+'"' !== $selector.css('background-image')) {
                            $selector.css('background-image','url("'+$selector.attr('data-bg')+'"').find('img').attr('src',$selector.attr('data-bg'));
                        }
                    }
                });

            }, 200);

        }

        //switch( this.getAttribute('data-res') ) {
        function getImageSource(imageCols, rawImageUrl, numMedia, feedWidth, rawImageSizes,index) {

            var newImgUrl = rawImageUrl,
                sizesArr = '',
                imageWidth = feedWidth;
            if (typeof rawImageSizes !== 'undefined') {
                sizesArr = rawImageSizes.split(',');
            } else {
                sizesArr = 'default';
            }
            if (imageCols !== 'auto' && typeof imageCols !== 'undefined') {
                imageWidth = feedWidth / imageCols;
            } else {
                if (numMedia == 2) {
                    imageWidth = .5 * feedWidth;
                } else if (index === 0) {
                    imageWidth = feedWidth;
                } else {
                    if (feedWidth / numMedia > 125) {
                        imageWidth = (1 / numMedia) * feedWidth;
                    } else {
                        imageWidth = .5 * feedWidth;
                    }
                }
            }

            if (sizesArr !== 'default') {
                var i = 0;
                while (sizesArr[i] < imageWidth && i < 3) {
                    i++;
                }
                switch (i) {
                    case 1:
                        newImgUrl = rawImageUrl.replace( ':thumb', ':small' );
                        break;
                    case 2:
                        newImgUrl = rawImageUrl.replace( ':thumb', '' );
                        break;
                    case 3:
                        newImgUrl = rawImageUrl.replace( ':thumb', ':large' );
                        break;
                }
            } else {
                newImgUrl = rawImageUrl.replace( ':thumb', '' );
            }

            return newImgUrl;
        }


        /* Lightbox v2.7.1 by Lokesh Dhakar - http://lokeshdhakar.com/projects/lightbox2/ - Heavily modified specifically for this plugin */
        (function() {
            var a = jQuery,
                b = function() {
                    function a() {
                        this.fadeDuration = 500, this.fitImagesInViewport = !0, this.resizeDuration = 700, this.positionFromTop = 50, this.showImageNumberLabel = !0, this.alwaysShowNavOnTouchDevices = !1, this.wrapAround = !1
                    }
                    return a.prototype.albumLabel = function(a, b) {
                        return a + " / " + b
                    }, a
                }(),
                c = function() {
                    function b(a) {
                        this.options = a, this.album = [], this.currentImageIndex = void 0, this.init()
                    }
                    return b.prototype.init = function() {
                        this.enable(), this.build()
                    }, b.prototype.enable = function() {
                        var b = this;
                        a("body").on("click", "a[data-ctf-lightbox]", function(c) {
                            return b.start(a(c.currentTarget)), !1
                        })
                    }, b.prototype.build = function() {
                        var b = this;
                        a(""+
                            "<div id='ctf_lightboxOverlay' class='ctf_lightboxOverlay'></div>"+
                            "<div id='ctf_lightbox' class='ctf_lightbox'>"+
                            "<div class='ctf_lb-outerContainer'>"+
                            "<div class='ctf_lb-container'>"+
                            "<video class='ctf_video' src='' poster='' controls autoplay></video>"+
                            "<iframe title='Placeholder for videos in the lightbox' type='text/html' src='' allowfullscreen webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>"+
                            "<img class='ctf_lb-image' alt='Lightbox image placeholder' src='' />"+
                            "<div class='ctf_lb-nav'><a class='ctf_lb-prev' href='#' ><p class='ctf-screenreader'>Previous Slide</p></a><a class='ctf_lb-next' href='#' ><p class='ctf-screenreader'>Next Slide</p></a></div>"+
                            "<div class='ctf_lb-loader'><a class='ctf_lb-cancel'></a></div>"+
                            "</div>"+
                            "</div>"+
                            "<div class='ctf_lb-dataContainer'>"+
                            "<div class='ctf_lb-data'>"+
                            "<div class='ctf_lb-details'>"+
                            "<div class='ctf_lb-caption'></div>"+
                            "<div class='ctf_lb-info'>"+
                            "<div class='ctf_lb-number'></div>"+
                            "<div class='ctf_lightbox_action ctf_share'>"+
                            "<a href='JavaScript:void(0);'><span class='fa fa-share' aria-hidden='true'></span>Share</a>"+
                            "<p class='ctf_lightbox_tooltip ctf_tooltip_social'>"+
                            "<a href='' target='_blank' id='ctf_facebook_icon'><span class='ctf-screenreader'>Facebook Share</span><span class='fa fa-facebook-square' aria-hidden='true'></span></a><a href='' target='_blank' id='ctf_twitter_icon'><span class='ctf-screenreader'>Twitter Share</span><span class='fa fa-twitter'></span></a><a href='' target='_blank' id='ctf_google_icon'><span class='ctf-screenreader'>Google Plus Share</span><span class='fa fa-google-plus'></span></a><a href='' target='_blank' id='ctf_linkedin_icon'><span class='ctf-screenreader'>Linkedin Share</span><span class='fa fa-linkedin'></span></a><a href='' id='ctf_pinterest_icon' target='_blank'><span class='ctf-screenreader'>Pinterest Share</span><span class='fa fa-pinterest'></span></a><a href='' id='ctf_email_icon' target='_blank'><span class='ctf-screenreader'>Email Share</span><span class='fa fa-envelope'></span></a><span class='fa fa-play fa-rotate-90'></span>"+
                            "</p>"+
                            "</div>"+
                            "<div class='ctf_lightbox_action ctf_instagram'><a href='http://instagram.com/' target='_blank'><span class='ctf-screenreader'>Twitter</span><span class='fa fa-twitter' aria-hidden='true'></span>Twitter</a></div>"+
                            "<div id='ctf_mod_link' class='ctf_lightbox_action'>"+
                            "<a href='JavaScript:void(0);'><span class='fa fa-times' aria-hidden='true'></span>Hide Tweet (admin)</a>"+
                            "<p id='ctf_mod_box' class='ctf_lightbox_tooltip'>Add this ID to the plugin's <strong>Hide Specific Tweets</strong> setting: <span id='ctf_photo_id'></span><span class='fa fa-play fa-rotate-90' aria-hidden='true'></span></p>"+
                            "</div>"+
                            "</div>"+
                            "</div>"+
                            "<div class='ctf_lb-closeContainer'><a class='ctf_lb-close'></a></div>"+
                            "</div>"+
                            "</div>"+
                            "</div>").appendTo(a("body")), this.$lightbox = a("#ctf_lightbox"), this.$overlay = a("#ctf_lightboxOverlay"), this.$outerContainer = this.$lightbox.find(".ctf_lb-outerContainer"), this.$container = this.$lightbox.find(".ctf_lb-container"), this.containerTopPadding = parseInt(this.$container.css("padding-top"), 10), this.containerRightPadding = parseInt(this.$container.css("padding-right"), 10), this.containerBottomPadding = parseInt(this.$container.css("padding-bottom"), 10), this.containerLeftPadding = parseInt(this.$container.css("padding-left"), 10), this.$overlay.hide().on("click", function() {
                            return b.end(), !1
                        }), jQuery(document).on('click', function(event, b, c) {
                            //Fade out the lightbox if click anywhere outside of the two elements defined below
                            if (!jQuery(event.target).closest('.ctf_lb-outerContainer').length) {
                                if (!jQuery(event.target).closest('.ctf_lb-dataContainer').length) {
                                    //Fade out lightbox
                                    jQuery('#ctf_lightboxOverlay, #ctf_lightbox').fadeOut();
                                    //Pause video
                                    if( ctf_supports_video() ) jQuery('#ctf_lightbox video.ctf_video')[0].pause();
                                    jQuery('#ctf_lightbox iframe').attr('src', '');
                                }
                            }
                        }), this.$lightbox.hide(),
                            jQuery('#ctf_lightboxOverlay').on("click", function(c) {
                                if( ctf_supports_video() ) jQuery('#ctf_lightbox video.ctf_video')[0].pause();
                                jQuery('#ctf_lightbox iframe').attr('src', '');
                                return "ctf_lightbox" === a(c.target).attr("id") && b.end(), !1
                            }), this.$lightbox.find(".ctf_lb-prev").on("click", function() {
                            if( ctf_supports_video() ) jQuery('#ctf_lightbox video.ctf_video')[0].pause();
                            jQuery('#ctf_lightbox iframe').attr('src', '');
                            return b.changeImage(0 === b.currentImageIndex ? b.album.length - 1 : b.currentImageIndex - 1), !1
                        }), this.$lightbox.find(".ctf_lb-container").on("swiperight", function() {
                            if( ctf_supports_video() ) jQuery('#ctf_lightbox video.ctf_video')[0].pause();
                            jQuery('#ctf_lightbox iframe').attr('src', '');
                            return b.changeImage(0 === b.currentImageIndex ? b.album.length - 1 : b.currentImageIndex - 1), !1
                        }), this.$lightbox.find(".ctf_lb-next").on("click", function() {
                            if( ctf_supports_video() ) jQuery('#ctf_lightbox video.ctf_video')[0].pause();
                            jQuery('#ctf_lightbox iframe').attr('src', '');
                            return b.changeImage(b.currentImageIndex === b.album.length - 1 ? 0 : b.currentImageIndex + 1), !1
                        }), this.$lightbox.find(".ctf_lb-container").on("swipeleft", function() {
                            if( ctf_supports_video() ) jQuery('#ctf_lightbox video.ctf_video')[0].pause();
                            jQuery('#ctf_lightbox iframe').attr('src', '');
                            return b.changeImage(b.currentImageIndex === b.album.length - 1 ? 0 : b.currentImageIndex + 1), !1
                        }), this.$lightbox.find(".ctf_lb-loader, .ctf_lb-close").on("click", function() {
                            if( ctf_supports_video() ) jQuery('#ctf_lightbox video.ctf_video')[0].pause();
                            jQuery('#ctf_lightbox iframe').attr('src', '');
                            return b.end(), !1
                        })
                    }, b.prototype.start = function(b) {
                        function c(a) {
                            d.album.push({
                                link: a.attr("href"),
                                title: a.attr("data-title") || a.attr("title"),
                                video: a.attr("data-video"),
                                iframe: a.attr('data-iframe'),
                                audioiframe: a.closest('.ctf-if-type-audio').length,
                                amplify: a.attr('data-amplify'),
                                id: a.attr("data-id"),
                                url: a.attr("data-url"),
                                user: a.attr("data-user"),
                                avatar: a.attr("data-avatar"),
                                name: a.attr("data-name"),
                                date: a.attr("data-date")
                            })
                        }
                        var d = this,
                            e = a(window);
                        e.on("resize", a.proxy(this.sizeOverlay, this)), a("select, object, embed").css({
                            visibility: "hidden"
                        }), this.sizeOverlay(), this.album = [];
                        var f, g = 0,
                            h = b.attr("data-ctf-lightbox");
                        if (h) {
                            f = a(b.prop("tagName") + '[data-ctf-lightbox="' + h + '"]');
                            for (var i = 0; i < f.length; i = ++i) c(a(f[i])), f[i] === b[0] && (g = i)
                        } else if ("lightbox" === b.attr("rel")) c(b);
                        else {
                            f = a(b.prop("tagName") + '[rel="' + b.attr("rel") + '"]');
                            for (var j = 0; j < f.length; j = ++j) c(a(f[j])), f[j] === b[0] && (g = j)
                        }
                        var k = e.scrollTop() + this.options.positionFromTop,
                            l = e.scrollLeft();
                        this.$lightbox.css({
                            top: k + "px",
                            left: l + "px"
                        }).fadeIn(this.options.fadeDuration), this.changeImage(g)
                    }, b.prototype.changeImage = function(b) {
                        var c = this;
                        this.disableKeyboardNav();
                        var d = this.$lightbox.find(".ctf_lb-image");
                        // console.log(c);
                        // console.log(d);
                        // return;
                        this.$overlay.fadeIn(this.options.fadeDuration), a(".ctf_lb-loader").fadeIn("slow"), this.$lightbox.find(".ctf_lb-image, .ctf_lb-nav, .ctf_lb-prev, .ctf_lb-next, .ctf_lb-dataContainer, .ctf_lb-numbers, .ctf_lb-caption").hide(), this.$outerContainer.addClass("animating");
                        var e = new Image;
                        e.onload = function() {
                            var f, g, h, i, j, k, l;
                            d.attr("src", c.album[b].link), f = a(e), d.width(e.width), d.height(e.height), c.options.fitImagesInViewport && (l = a(window).width(), k = a(window).height(), j = l - c.containerLeftPadding - c.containerRightPadding - 20, i = k - c.containerTopPadding - c.containerBottomPadding - 150, (e.width > j || e.height > i) && (e.width / j > e.height / i ? (h = j, g = parseInt(e.height / (e.width / h), 10), d.width(h), d.height(g)) : (g = i, h = parseInt(e.width / (e.height / g), 10), d.width(h), d.height(g)))), c.sizeContainer(d.width(), d.height())
                        }, e.src = this.album[b].link, this.currentImageIndex = b
                    }, b.prototype.sizeOverlay = function() {
                        this.$overlay.width(a(window).width()).height(a(document).height())
                    }, b.prototype.sizeContainer = function(a, b) {
                        function c() {
                            d.$lightbox.find(".ctf_lb-dataContainer").width(g), d.$lightbox.find(".ctf_lb-prevLink").height(h), d.$lightbox.find(".ctf_lb-nextLink").height(h), d.showImage()
                        }
                        var d = this,
                            e = this.$outerContainer.outerWidth(),
                            f = this.$outerContainer.outerHeight(),
                            g = a + this.containerLeftPadding + this.containerRightPadding,
                            h = b + this.containerTopPadding + this.containerBottomPadding;
                        e !== g || f !== h ? this.$outerContainer.animate({
                            width: g,
                            height: h
                        }, this.options.resizeDuration, "swing", function() {
                            c()
                        }) : c()
                    }, b.prototype.showImage = function() {
                        this.$lightbox.find(".ctf_lb-loader").hide(), this.$lightbox.find(".ctf_lb-image").fadeIn("slow"), this.updateNav(), this.updateDetails(), this.preloadNeighboringImages(), this.enableKeyboardNav()
                    }, b.prototype.updateNav = function() {
                        var a = !1;
                        try {
                            document.createEvent("TouchEvent"), a = this.options.alwaysShowNavOnTouchDevices ? !0 : !1
                        } catch (b) {}
                        this.$lightbox.find(".ctf_lb-nav").show(), this.album.length > 1 && (this.options.wrapAround ? (a && this.$lightbox.find(".ctf_lb-prev, .ctf_lb-next").css("opacity", "1"), this.$lightbox.find(".ctf_lb-prev, .ctf_lb-next").show()) : (this.currentImageIndex > 0 && (this.$lightbox.find(".ctf_lb-prev").show(), a && this.$lightbox.find(".ctf_lb-prev").css("opacity", "1")), this.currentImageIndex < this.album.length - 1 && (this.$lightbox.find(".ctf_lb-next").show(), a && this.$lightbox.find(".ctf_lb-next").css("opacity", "1"))))
                    }, b.prototype.updateDetails = function() {
                        var b = this;

                        /** NEW PHOTO ACTION **/
                        //Switch video when either a new popup or navigating to new one
                        if( ctf_supports_video() ){
                            jQuery('#ctf_lightbox').removeClass('ctf_video_lightbox');
                            if( this.album[this.currentImageIndex].video.length ){
                                jQuery('#ctf_lightbox').addClass('ctf_video_lightbox');
                                jQuery('video.ctf_video').attr({
                                    'src' : this.album[this.currentImageIndex].video,
                                    'poster' : this.album[this.currentImageIndex].link,
                                    'autoplay' : 'true'
                                });
                            }
                        }
                        //If it's an Amplify card then add a class so we can reposition it
                        if( typeof this.album[this.currentImageIndex].amplify !== 'undefined' ) $('#ctf_lightbox').addClass('ctf-amplify');

                        $('#ctf_lightbox').removeClass('ctf-has-iframe');
                        if( this.album[this.currentImageIndex].iframe.length ){
                            var videoURL = this.album[this.currentImageIndex].iframe;
                            $('#ctf_lightbox').removeClass('ctf_video_lightbox').addClass('ctf-has-iframe');

                            //If it's a swf then don't add the autoplay parameter. This is only for embedded videos like YouTube or Vimeo.
                            if( videoURL.indexOf(".swf") > -1 ){
                                var autoplayParam = '';
                            } else {
                                var autoplayParam = '?autoplay=1';
                            }

                            //Add a slight delay before adding the URL else it doesn't autoplay on Firefox
                            var vInt = setTimeout(function() {
                                $('#ctf_lightbox iframe').attr({
                                    'src' : videoURL + autoplayParam
                                });
                            }, 500);
                        }
                        if (parseInt(this.album[this.currentImageIndex].audioiframe) === 1) {
                            $('#ctf_lightbox').addClass('ctf-audio-iframe');
                        } else {
                            $('#ctf_lightbox').removeClass('ctf-audio-iframe');
                        }

                        jQuery('#ctf_lightbox .ctf_instagram a').attr('href', this.album[this.currentImageIndex].url);
                        jQuery('#ctf_lightbox .ctf_lightbox_tooltip').hide();
                        jQuery('#ctf_lightbox #ctf_mod_box').find('#ctf_photo_id').text( this.album[this.currentImageIndex].id );
                        //Change social media sharing links on the fly
                        jQuery('#ctf_lightbox #ctf_facebook_icon').attr('href', 'https://www.facebook.com/sharer/sharer.php?u=' + this.album[this.currentImageIndex].url+'&t=Text');
                        jQuery('#ctf_lightbox #ctf_twitter_icon').attr('href', 'https://twitter.com/home?status='+this.album[this.currentImageIndex].url+' ' + this.album[this.currentImageIndex].title);
                        jQuery('#ctf_lightbox #ctf_google_icon').attr('href', 'https://plus.google.com/share?url='+this.album[this.currentImageIndex].url);
                        jQuery('#ctf_lightbox #ctf_linkedin_icon').attr('href', 'https://www.linkedin.com/shareArticle?mini=true&url='+this.album[this.currentImageIndex].url+'&title='+this.album[this.currentImageIndex].title);
                        jQuery('#ctf_lightbox #ctf_pinterest_icon').attr('href', 'https://pinterest.com/pin/create/button/?url='+this.album[this.currentImageIndex].url+'&media='+this.album[this.currentImageIndex].link+'&description='+this.album[this.currentImageIndex].title);
                        jQuery('#ctf_lightbox #ctf_email_icon').attr('href', 'mailto:?subject=Instagram&body='+this.album[this.currentImageIndex].title+' '+this.album[this.currentImageIndex].url);

                        //Add links to the caption
                        var ctfLightboxCaption = this.album[this.currentImageIndex].title,
                            hashRegex = /(^|\s)#(\w[\u0041-\u005A\u0061-\u007A\u00AA\u00B5\u00BA\u00C0-\u00D6\u00D8-\u00F6\u00F8-\u02C1\u02C6-\u02D1\u02E0-\u02E4\u02EC\u02EE\u0370-\u0374\u0376\u0377\u037A-\u037D\u0386\u0388-\u038A\u038C\u038E-\u03A1\u03A3-\u03F5\u03F7-\u0481\u048A-\u0527\u0531-\u0556\u0559\u0561-\u0587\u05D0-\u05EA\u05F0-\u05F2\u0620-\u064A\u066E\u066F\u0671-\u06D3\u06D5\u06E5\u06E6\u06EE\u06EF\u06FA-\u06FC\u06FF\u0710\u0712-\u072F\u074D-\u07A5\u07B1\u07CA-\u07EA\u07F4\u07F5\u07FA\u0800-\u0815\u081A\u0824\u0828\u0840-\u0858\u08A0\u08A2-\u08AC\u0904-\u0939\u093D\u0950\u0958-\u0961\u0971-\u0977\u0979-\u097F\u0985-\u098C\u098F\u0990\u0993-\u09A8\u09AA-\u09B0\u09B2\u09B6-\u09B9\u09BD\u09CE\u09DC\u09DD\u09DF-\u09E1\u09F0\u09F1\u0A05-\u0A0A\u0A0F\u0A10\u0A13-\u0A28\u0A2A-\u0A30\u0A32\u0A33\u0A35\u0A36\u0A38\u0A39\u0A59-\u0A5C\u0A5E\u0A72-\u0A74\u0A85-\u0A8D\u0A8F-\u0A91\u0A93-\u0AA8\u0AAA-\u0AB0\u0AB2\u0AB3\u0AB5-\u0AB9\u0ABD\u0AD0\u0AE0\u0AE1\u0B05-\u0B0C\u0B0F\u0B10\u0B13-\u0B28\u0B2A-\u0B30\u0B32\u0B33\u0B35-\u0B39\u0B3D\u0B5C\u0B5D\u0B5F-\u0B61\u0B71\u0B83\u0B85-\u0B8A\u0B8E-\u0B90\u0B92-\u0B95\u0B99\u0B9A\u0B9C\u0B9E\u0B9F\u0BA3\u0BA4\u0BA8-\u0BAA\u0BAE-\u0BB9\u0BD0\u0C05-\u0C0C\u0C0E-\u0C10\u0C12-\u0C28\u0C2A-\u0C33\u0C35-\u0C39\u0C3D\u0C58\u0C59\u0C60\u0C61\u0C85-\u0C8C\u0C8E-\u0C90\u0C92-\u0CA8\u0CAA-\u0CB3\u0CB5-\u0CB9\u0CBD\u0CDE\u0CE0\u0CE1\u0CF1\u0CF2\u0D05-\u0D0C\u0D0E-\u0D10\u0D12-\u0D3A\u0D3D\u0D4E\u0D60\u0D61\u0D7A-\u0D7F\u0D85-\u0D96\u0D9A-\u0DB1\u0DB3-\u0DBB\u0DBD\u0DC0-\u0DC6\u0E01-\u0E30\u0E32\u0E33\u0E40-\u0E46\u0E81\u0E82\u0E84\u0E87\u0E88\u0E8A\u0E8D\u0E94-\u0E97\u0E99-\u0E9F\u0EA1-\u0EA3\u0EA5\u0EA7\u0EAA\u0EAB\u0EAD-\u0EB0\u0EB2\u0EB3\u0EBD\u0EC0-\u0EC4\u0EC6\u0EDC-\u0EDF\u0F00\u0F40-\u0F47\u0F49-\u0F6C\u0F88-\u0F8C\u1000-\u102A\u103F\u1050-\u1055\u105A-\u105D\u1061\u1065\u1066\u106E-\u1070\u1075-\u1081\u108E\u10A0-\u10C5\u10C7\u10CD\u10D0-\u10FA\u10FC-\u1248\u124A-\u124D\u1250-\u1256\u1258\u125A-\u125D\u1260-\u1288\u128A-\u128D\u1290-\u12B0\u12B2-\u12B5\u12B8-\u12BE\u12C0\u12C2-\u12C5\u12C8-\u12D6\u12D8-\u1310\u1312-\u1315\u1318-\u135A\u1380-\u138F\u13A0-\u13F4\u1401-\u166C\u166F-\u167F\u1681-\u169A\u16A0-\u16EA\u1700-\u170C\u170E-\u1711\u1720-\u1731\u1740-\u1751\u1760-\u176C\u176E-\u1770\u1780-\u17B3\u17D7\u17DC\u1820-\u1877\u1880-\u18A8\u18AA\u18B0-\u18F5\u1900-\u191C\u1950-\u196D\u1970-\u1974\u1980-\u19AB\u19C1-\u19C7\u1A00-\u1A16\u1A20-\u1A54\u1AA7\u1B05-\u1B33\u1B45-\u1B4B\u1B83-\u1BA0\u1BAE\u1BAF\u1BBA-\u1BE5\u1C00-\u1C23\u1C4D-\u1C4F\u1C5A-\u1C7D\u1CE9-\u1CEC\u1CEE-\u1CF1\u1CF5\u1CF6\u1D00-\u1DBF\u1E00-\u1F15\u1F18-\u1F1D\u1F20-\u1F45\u1F48-\u1F4D\u1F50-\u1F57\u1F59\u1F5B\u1F5D\u1F5F-\u1F7D\u1F80-\u1FB4\u1FB6-\u1FBC\u1FBE\u1FC2-\u1FC4\u1FC6-\u1FCC\u1FD0-\u1FD3\u1FD6-\u1FDB\u1FE0-\u1FEC\u1FF2-\u1FF4\u1FF6-\u1FFC\u2071\u207F\u2090-\u209C\u2102\u2107\u210A-\u2113\u2115\u2119-\u211D\u2124\u2126\u2128\u212A-\u212D\u212F-\u2139\u213C-\u213F\u2145-\u2149\u214E\u2183\u2184\u2C00-\u2C2E\u2C30-\u2C5E\u2C60-\u2CE4\u2CEB-\u2CEE\u2CF2\u2CF3\u2D00-\u2D25\u2D27\u2D2D\u2D30-\u2D67\u2D6F\u2D80-\u2D96\u2DA0-\u2DA6\u2DA8-\u2DAE\u2DB0-\u2DB6\u2DB8-\u2DBE\u2DC0-\u2DC6\u2DC8-\u2DCE\u2DD0-\u2DD6\u2DD8-\u2DDE\u2E2F\u3005\u3006\u3031-\u3035\u303B\u303C\u3041-\u3096\u309D-\u309F\u30A1-\u30FA\u30FC-\u30FF\u3105-\u312D\u3131-\u318E\u31A0-\u31BA\u31F0-\u31FF\u3400-\u4DB5\u4E00-\u9FCC\uA000-\uA48C\uA4D0-\uA4FD\uA500-\uA60C\uA610-\uA61F\uA62A\uA62B\uA640-\uA66E\uA67F-\uA697\uA6A0-\uA6E5\uA717-\uA71F\uA722-\uA788\uA78B-\uA78E\uA790-\uA793\uA7A0-\uA7AA\uA7F8-\uA801\uA803-\uA805\uA807-\uA80A\uA80C-\uA822\uA840-\uA873\uA882-\uA8B3\uA8F2-\uA8F7\uA8FB\uA90A-\uA925\uA930-\uA946\uA960-\uA97C\uA984-\uA9B2\uA9CF\uAA00-\uAA28\uAA40-\uAA42\uAA44-\uAA4B\uAA60-\uAA76\uAA7A\uAA80-\uAAAF\uAAB1\uAAB5\uAAB6\uAAB9-\uAABD\uAAC0\uAAC2\uAADB-\uAADD\uAAE0-\uAAEA\uAAF2-\uAAF4\uAB01-\uAB06\uAB09-\uAB0E\uAB11-\uAB16\uAB20-\uAB26\uAB28-\uAB2E\uABC0-\uABE2\uAC00-\uD7A3\uD7B0-\uD7C6\uD7CB-\uD7FB\uF900-\uFA6D\uFA70-\uFAD9\uFB00-\uFB06\uFB13-\uFB17\uFB1D\uFB1F-\uFB28\uFB2A-\uFB36\uFB38-\uFB3C\uFB3E\uFB40\uFB41\uFB43\uFB44\uFB46-\uFBB1\uFBD3-\uFD3D\uFD50-\uFD8F\uFD92-\uFDC7\uFDF0-\uFDFB\uFE70-\uFE74\uFE76-\uFEFC\uFF21-\uFF3A\uFF41-\uFF5A\uFF66-\uFFBE\uFFC2-\uFFC7\uFFCA-\uFFCF\uFFD2-\uFFD7\uFFDA-\uFFDC+0-9]+\w)/gi,
                            tagRegex = /[@]+[A-Za-z0-9-_]+/g;

                        (ctfLightboxCaption) ? ctfLightboxCaption = ctfLinkify(ctfLightboxCaption) : ctfLightboxCaption = '';

                        //Link #hashtags
                        function ctfReplaceHashtags(hash){
                            //Remove white space at beginning of hash
                            var replacementString = jQuery.trim(hash);
                            //If the hash is a hex code then don't replace it with a link as it's likely in the style attr, eg: "color: #ff0000"
                            if ( /^#[0-9A-F]{6}$/i.test( replacementString ) ){
                                return replacementString;
                            } else {
                                return ' <a href="https://twitter.com/hashtag/'+ replacementString.substring(1) +'" target="_blank" rel="nofollow">' + replacementString + '</a>';
                            }
                        }
                        ctfLightboxCaption = ctfLightboxCaption.replace( hashRegex , ctfReplaceHashtags );

                        //Link @tags
                        function ctfReplaceTags(tag){
                            var replacementString = jQuery.trim(tag.replace('(',''));
                            return ' <a href="https://twitter.com/'+ replacementString.substring(1) +'" target="_blank" rel="nofollow">' + replacementString + '</a>';
                        }
                        ctfLightboxCaption = ctfLightboxCaption.replace( tagRegex , ctfReplaceTags );

                        //Create author and add caption to bottom of lightbox
                        "undefined" != typeof ctfLightboxCaption && "" !== ctfLightboxCaption && this.$lightbox.find(".ctf_lb-caption")
                            .html('<div class="ctf-author-box">' +
                                '<div class="ctf-author-box-link" target="_blank">' +
                                '<a href="https://twitter.com/'+this.album[this.currentImageIndex].user+'" class="ctf-author-avatar" target="_blank" style="">' +
                                '<img src="'+this.album[this.currentImageIndex].avatar+'" width="48" height="48">' +
                                '</a>' +
                                '<a href="https://twitter.com/'+this.album[this.currentImageIndex].user+'" target="_blank" class="ctf-author-name">'+this.album[this.currentImageIndex].name+'</a>' +
                                '<a href="https://twitter.com/'+this.album[this.currentImageIndex].user+'" class="ctf-author-screenname" target="_blank">@'+this.album[this.currentImageIndex].user+'</a>' +
                                '<span class="ctf-screename-sep">·</span>' +
                                '<div class="ctf-tweet-meta">' +
                                '<a href="https://twitter.com/statuses/'+this.album[this.currentImageIndex].id+'" class="ctf-tweet-date" target="_blank">'+this.album[this.currentImageIndex].date+'</a>' +
                                '</div>' +
                                '</div> <!-- end .ctf-author-box-link -->' +
                                '</div><div class="ctf-caption-text">' + ctfLightboxCaption + '</div>')
                            .fadeIn("fast"), this.$lightbox.find(".ctf_lb-number").text(this.options.albumLabel(this.currentImageIndex + 1, this.album.length)).fadeIn("fast"), this.$outerContainer.removeClass("animating"), this.$lightbox.find(".ctf_lb-dataContainer").fadeIn(this.options.resizeDuration, function() {
                            return b.sizeOverlay()
                        });
                        ctfSVGify($('#ctf_lightbox'));
                        if (typeof window.ctfLightboxAction === 'function') {
                            setTimeout(function() {
                                window.ctfLightboxAction();
                            },100);
                        }
                    }, b.prototype.preloadNeighboringImages = function() {
                        if (this.album.length > this.currentImageIndex + 1) {
                            var a = new Image;
                            a.src = this.album[this.currentImageIndex + 1].link
                        }
                        if (this.currentImageIndex > 0) {
                            var b = new Image;
                            b.src = this.album[this.currentImageIndex - 1].link
                        }
                    }, b.prototype.enableKeyboardNav = function() {
                        a(document).on("keyup.keyboard", a.proxy(this.keyboardAction, this))
                    }, b.prototype.disableKeyboardNav = function() {
                        a(document).off(".keyboard")
                    }, b.prototype.keyboardAction = function(a) {

                        var KEYCODE_ESC        = 27;
                        var KEYCODE_LEFTARROW  = 37;
                        var KEYCODE_RIGHTARROW = 39;

                        var keycode = event.keyCode;
                        var key     = String.fromCharCode(keycode).toLowerCase();
                        if (keycode === KEYCODE_ESC || key.match(/x|o|c/)) {
                            if( ctf_supports_video() ) $('#ctf_lightbox video.ctf_video')[0].pause();
                            $('#ctf_lightbox iframe').attr('src', '');
                            this.end();
                        } else if (key === 'p' || keycode === KEYCODE_LEFTARROW) {
                            if (this.currentImageIndex !== 0) {
                                this.changeImage(this.currentImageIndex - 1);
                            } else if (this.options.wrapAround && this.album.length > 1) {
                                this.changeImage(this.album.length - 1);
                            }

                            if( ctf_supports_video() ) $('#ctf_lightbox video.ctf_video')[0].pause();
                            $('#ctf_lightbox iframe').attr('src', '');

                        } else if (key === 'n' || keycode === KEYCODE_RIGHTARROW) {
                            if (this.currentImageIndex !== this.album.length - 1) {
                                this.changeImage(this.currentImageIndex + 1);
                            } else if (this.options.wrapAround && this.album.length > 1) {
                                this.changeImage(0);
                            }

                            if( ctf_supports_video() ) $('#ctf_lightbox video.ctf_video')[0].pause();
                            jQuery('#ctf_lightbox iframe').attr('src', '');

                        }

                    }, b.prototype.end = function() {
                        this.disableKeyboardNav(), a(window).off("resize", this.sizeOverlay), this.$lightbox.fadeOut(this.options.fadeDuration), this.$overlay.fadeOut(this.options.fadeDuration), a("select, object, embed").css({
                            visibility: "visible"
                        })
                    }, b
                }();
            a(function() {
                {
                    var a = new b;
                    new c(a)

                    //Lightbox hide photo function
                    $('.ctf_lightbox_action a').unbind().bind('click', function(){
                        $(this).parent().find('.ctf_lightbox_tooltip').toggle();
                    });
                }
            })
        }).call(this);
        //Checks whether browser support HTML5 video element
        function ctf_supports_video() {
            return !!document.createElement('video').canPlayType;
        }

        /* Font Awesome SVG implementation */
        var ctfIconSVG = {
            'fa-clock' : 'class="svg-inline--fa fa-clock fa-w-16" aria-hidden="true" data-fa-processed="" data-prefix="far" data-icon="clock" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z"></path></svg>',
            'fa-play' : 'class="svg-inline--fa fa-play fa-w-14 sbi_playbtn" aria-hidden="true" data-fa-processed="" data-prefix="fa" data-icon="play" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z"></path></svg>',
            'fa-image' : 'class="svg-inline--fa fa-image fa-w-16" aria-hidden="true" data-fa-processed="" data-prefix="far" data-icon="image" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M464 64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V112c0-26.51-21.49-48-48-48zm-6 336H54a6 6 0 0 1-6-6V118a6 6 0 0 1 6-6h404a6 6 0 0 1 6 6v276a6 6 0 0 1-6 6zM128 152c-22.091 0-40 17.909-40 40s17.909 40 40 40 40-17.909 40-40-17.909-40-40-40zM96 352h320v-80l-87.515-87.515c-4.686-4.686-12.284-4.686-16.971 0L192 304l-39.515-39.515c-4.686-4.686-12.284-4.686-16.971 0L96 304v48z"></path></svg>',
            'fa-user' : 'class="svg-inline--fa fa-user fa-w-16" style="margin-right: 3px;" aria-hidden="true" data-fa-processed="" data-prefix="fa" data-icon="user" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M96 160C96 71.634 167.635 0 256 0s160 71.634 160 160-71.635 160-160 160S96 248.366 96 160zm304 192h-28.556c-71.006 42.713-159.912 42.695-230.888 0H112C50.144 352 0 402.144 0 464v24c0 13.255 10.745 24 24 24h464c13.255 0 24-10.745 24-24v-24c0-61.856-50.144-112-112-112z"></path></svg>',
            'fa-comment' : 'class="svg-inline--fa fa-comment fa-w-18" aria-hidden="true" data-fa-processed="" data-prefix="fa" data-icon="comment" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M576 240c0 115-129 208-288 208-48.3 0-93.9-8.6-133.9-23.8-40.3 31.2-89.8 50.3-142.4 55.7-5.2.6-10.2-2.8-11.5-7.7-1.3-5 2.7-8.1 6.6-11.8 19.3-18.4 42.7-32.8 51.9-94.6C21.9 330.9 0 287.3 0 240 0 125.1 129 32 288 32s288 93.1 288 208z"></path></svg>',
            'fa-heart' : 'class="svg-inline--fa fa-heart fa-w-18" aria-hidden="true" data-fa-processed="" data-prefix="fa" data-icon="heart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M414.9 24C361.8 24 312 65.7 288 89.3 264 65.7 214.2 24 161.1 24 70.3 24 16 76.9 16 165.5c0 72.6 66.8 133.3 69.2 135.4l187 180.8c8.8 8.5 22.8 8.5 31.6 0l186.7-180.2c2.7-2.7 69.5-63.5 69.5-136C560 76.9 505.7 24 414.9 24z"></path></svg>',
            'fa-check' : 'class="svg-inline--fa fa-check fa-w-16" aria-hidden="true" data-fa-processed="" data-prefix="fa" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path></svg>',
            'fa-exclamation-circle' : 'class="svg-inline--fa fa-exclamation-circle fa-w-16" aria-hidden="true" data-fa-processed="" data-prefix="fa" data-icon="exclamation-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M504 256c0 136.997-111.043 248-248 248S8 392.997 8 256C8 119.083 119.043 8 256 8s248 111.083 248 248zm-248 50c-25.405 0-46 20.595-46 46s20.595 46 46 46 46-20.595 46-46-20.595-46-46-46zm-43.673-165.346l7.418 136c.347 6.364 5.609 11.346 11.982 11.346h48.546c6.373 0 11.635-4.982 11.982-11.346l7.418-136c.375-6.874-5.098-12.654-11.982-12.654h-63.383c-6.884 0-12.356 5.78-11.981 12.654z"></path></svg>',
            'fa-map-marker' : 'class="svg-inline--fa fa-map-marker fa-w-12" aria-hidden="true" data-fa-processed="" data-prefix="fa" data-icon="map-marker" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0z"></path></svg>',
            'fa-clone' : 'class="svg-inline--fa fa-clone fa-w-16 sbi_lightbox_carousel_icon" aria-hidden="true" data-fa-processed="" data-prefix="far" data-icon="clone" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M464 0H144c-26.51 0-48 21.49-48 48v48H48c-26.51 0-48 21.49-48 48v320c0 26.51 21.49 48 48 48h320c26.51 0 48-21.49 48-48v-48h48c26.51 0 48-21.49 48-48V48c0-26.51-21.49-48-48-48zM362 464H54a6 6 0 0 1-6-6V150a6 6 0 0 1 6-6h42v224c0 26.51 21.49 48 48 48h224v42a6 6 0 0 1-6 6zm96-96H150a6 6 0 0 1-6-6V54a6 6 0 0 1 6-6h308a6 6 0 0 1 6 6v308a6 6 0 0 1-6 6z"></path></svg>',
            'fa-chevron-right' : 'class="svg-inline--fa fa-chevron-right fa-w-10" aria-hidden="true" data-fa-processed="" data-prefix="fa" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"></path></svg>',
            'fa-chevron-left' : 'class="svg-inline--fa fa-chevron-left fa-w-10" aria-hidden="true" data-fa-processed="" data-prefix="fa" data-icon="chevron-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M34.52 239.03L228.87 44.69c9.37-9.37 24.57-9.37 33.94 0l22.67 22.67c9.36 9.36 9.37 24.52.04 33.9L131.49 256l154.02 154.75c9.34 9.38 9.32 24.54-.04 33.9l-22.67 22.67c-9.37 9.37-24.57 9.37-33.94 0L34.52 272.97c-9.37-9.37-9.37-24.57 0-33.94z"></path></svg>',
            'fa-share' : 'class="svg-inline--fa fa-share fa-w-16" aria-hidden="true" data-fa-processed="" data-prefix="fa" data-icon="share" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M503.691 189.836L327.687 37.851C312.281 24.546 288 35.347 288 56.015v80.053C127.371 137.907 0 170.1 0 322.326c0 61.441 39.581 122.309 83.333 154.132 13.653 9.931 33.111-2.533 28.077-18.631C66.066 312.814 132.917 274.316 288 272.085V360c0 20.7 24.3 31.453 39.687 18.164l176.004-152c11.071-9.562 11.086-26.753 0-36.328z"></path></svg>',
            'fa-times' : 'class="svg-inline--fa fa-times fa-w-12" aria-hidden="true" data-fa-processed="" data-prefix="fa" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M323.1 441l53.9-53.9c9.4-9.4 9.4-24.5 0-33.9L279.8 256l97.2-97.2c9.4-9.4 9.4-24.5 0-33.9L323.1 71c-9.4-9.4-24.5-9.4-33.9 0L192 168.2 94.8 71c-9.4-9.4-24.5-9.4-33.9 0L7 124.9c-9.4 9.4-9.4 24.5 0 33.9l97.2 97.2L7 353.2c-9.4 9.4-9.4 24.5 0 33.9L60.9 441c9.4 9.4 24.5 9.4 33.9 0l97.2-97.2 97.2 97.2c9.3 9.3 24.5 9.3 33.9 0z"></path></svg>',
            'fa-envelope' : 'class="svg-inline--fa fa-envelope fa-w-16" aria-hidden="true" data-fa-processed="" data-prefix="fa" data-icon="envelope" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"></path></svg>',
            'fa-edit' : 'class="svg-inline--fa fa-edit fa-w-18" aria-hidden="true" data-fa-processed="" data-prefix="far" data-icon="edit" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M402.3 344.9l32-32c5-5 13.7-1.5 13.7 5.7V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h273.5c7.1 0 10.7 8.6 5.7 13.7l-32 32c-1.5 1.5-3.5 2.3-5.7 2.3H48v352h352V350.5c0-2.1.8-4.1 2.3-5.6zm156.6-201.8L296.3 405.7l-90.4 10c-26.2 2.9-48.5-19.2-45.6-45.6l10-90.4L432.9 17.1c22.9-22.9 59.9-22.9 82.7 0l43.2 43.2c22.9 22.9 22.9 60 .1 82.8zM460.1 174L402 115.9 216.2 301.8l-7.3 65.3 65.3-7.3L460.1 174zm64.8-79.7l-43.2-43.2c-4.1-4.1-10.8-4.1-14.8 0L436 82l58.1 58.1 30.9-30.9c4-4.2 4-10.8-.1-14.9z"></path></svg>',
            'fa-arrows-alt' : 'class="svg-inline--fa fa-arrows-alt fa-w-16" aria-hidden="true" data-fa-processed="" data-prefix="fa" data-icon="arrows-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M352.201 425.775l-79.196 79.196c-9.373 9.373-24.568 9.373-33.941 0l-79.196-79.196c-15.119-15.119-4.411-40.971 16.971-40.97h51.162L228 284H127.196v51.162c0 21.382-25.851 32.09-40.971 16.971L7.029 272.937c-9.373-9.373-9.373-24.569 0-33.941L86.225 159.8c15.119-15.119 40.971-4.411 40.971 16.971V228H228V127.196h-51.23c-21.382 0-32.09-25.851-16.971-40.971l79.196-79.196c9.373-9.373 24.568-9.373 33.941 0l79.196 79.196c15.119 15.119 4.411 40.971-16.971 40.971h-51.162V228h100.804v-51.162c0-21.382 25.851-32.09 40.97-16.971l79.196 79.196c9.373 9.373 9.373 24.569 0 33.941L425.773 352.2c-15.119 15.119-40.971 4.411-40.97-16.971V284H284v100.804h51.23c21.382 0 32.09 25.851 16.971 40.971z"></path></svg>',
            'fa-check-circle' : 'class="svg-inline--fa fa-check-circle fa-w-16" aria-hidden="true" data-fa-processed="" data-prefix="fa" data-icon="check-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path></svg>',
            'fa-ban' : 'class="svg-inline--fa fa-ban fa-w-16" aria-hidden="true" data-fa-processed="" data-prefix="fa" data-icon="ban" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 8C119.034 8 8 119.033 8 256s111.034 248 248 248 248-111.034 248-248S392.967 8 256 8zm130.108 117.892c65.448 65.448 70 165.481 20.677 235.637L150.47 105.216c70.204-49.356 170.226-44.735 235.638 20.676zM125.892 386.108c-65.448-65.448-70-165.481-20.677-235.637L361.53 406.784c-70.203 49.356-170.226 44.736-235.638-20.676z"></path></svg>',
            'fa-facebook-square' : 'class="svg-inline--fa fa-facebook-square fa-w-14" aria-hidden="true" data-fa-processed="" data-prefix="fab" data-icon="facebook-square" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M448 80v352c0 26.5-21.5 48-48 48h-85.3V302.8h60.6l8.7-67.6h-69.3V192c0-19.6 5.4-32.9 33.5-32.9H384V98.7c-6.2-.8-27.4-2.7-52.2-2.7-51.6 0-87 31.5-87 89.4v49.9H184v67.6h60.9V480H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48z"></path></svg>',
            'fa-twitter' : 'class="svg-inline--fa fa-twitter fa-w-16" aria-hidden="true" data-fa-processed="" data-prefix="fab" data-icon="twitter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path></svg>',
            'fa-google-plus' : 'class="svg-inline--fa fa-google-plus fa-w-16" aria-hidden="true" data-fa-processed="" data-prefix="fab" data-icon="google-plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512"><path fill="currentColor" d="M248 8C111.1 8 0 119.1 0 256s111.1 248 248 248 248-111.1 248-248S384.9 8 248 8zm-70.7 372c-68.8 0-124-55.5-124-124s55.2-124 124-124c31.3 0 60.1 11 83 32.3l-33.6 32.6c-13.2-12.9-31.3-19.1-49.4-19.1-42.9 0-77.2 35.5-77.2 78.1s34.2 78.1 77.2 78.1c32.6 0 64.9-19.1 70.1-53.3h-70.1v-42.6h116.9c1.3 6.8 1.9 13.6 1.9 20.7 0 70.8-47.5 121.2-118.8 121.2zm230.2-106.2v35.5H372v-35.5h-35.5v-35.5H372v-35.5h35.5v35.5h35.2v35.5h-35.2z"></path></svg>',
            'fa-instagram' : 'class="svg-inline--fa fa-instagram fa-w-14" aria-hidden="true" data-fa-processed="" data-prefix="fab" data-icon="instagram" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path></svg>',
            'fa-linkedin' : 'class="svg-inline--fa fa-linkedin fa-w-14" aria-hidden="true" data-fa-processed="" data-prefix="fab" data-icon="linkedin" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"></path></svg>',
            'fa-pinterest' : 'class="svg-inline--fa fa-pinterest fa-w-16" aria-hidden="true" data-fa-processed="" data-prefix="fab" data-icon="pinterest" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512"><path fill="currentColor" d="M496 256c0 137-111 248-248 248-25.6 0-50.2-3.9-73.4-11.1 10.1-16.5 25.2-43.5 30.8-65 3-11.6 15.4-59 15.4-59 8.1 15.4 31.7 28.5 56.8 28.5 74.8 0 128.7-68.8 128.7-154.3 0-81.9-66.9-143.2-152.9-143.2-107 0-163.9 71.8-163.9 150.1 0 36.4 19.4 81.7 50.3 96.1 4.7 2.2 7.2 1.2 8.3-3.3.8-3.4 5-20.3 6.9-28.1.6-2.5.3-4.7-1.7-7.1-10.1-12.5-18.3-35.3-18.3-56.6 0-54.7 41.4-107.6 112-107.6 60.9 0 103.6 41.5 103.6 100.9 0 67.1-33.9 113.6-78 113.6-24.3 0-42.6-20.1-36.7-44.8 7-29.5 20.5-61.3 20.5-82.6 0-19-10.2-34.9-31.4-34.9-24.9 0-44.9 25.7-44.9 60.2 0 22 7.4 36.8 7.4 36.8s-24.5 103.8-29 123.2c-5 21.4-3 51.6-.9 71.2C65.4 450.9 0 361.1 0 256 0 119 111 8 248 8s248 111 248 248z"></path></svg>',
            'fa-spinner' : 'class="svg-inline--fa fa-spinner fa-w-16 fa-pulse" aria-hidden="true" data-fa-processed="" data-prefix="fa" data-icon="spinner" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M304 48c0 26.51-21.49 48-48 48s-48-21.49-48-48 21.49-48 48-48 48 21.49 48 48zm-48 368c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48zm208-208c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48zM96 256c0-26.51-21.49-48-48-48S0 229.49 0 256s21.49 48 48 48 48-21.49 48-48zm12.922 99.078c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48c0-26.509-21.491-48-48-48zm294.156 0c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48c0-26.509-21.49-48-48-48zM108.922 60.922c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.491-48-48-48z"></path></svg>',
            'fa-spin' : 'class="svg-inline--fa fa-spin fa-w-16 fa-pulse" aria-hidden="true" data-fa-processed="" data-prefix="fa" data-icon="spinner" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M304 48c0 26.51-21.49 48-48 48s-48-21.49-48-48 21.49-48 48-48 48 21.49 48 48zm-48 368c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48zm208-208c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48zM96 256c0-26.51-21.49-48-48-48S0 229.49 0 256s21.49 48 48 48 48-21.49 48-48zm12.922 99.078c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48c0-26.509-21.491-48-48-48zm294.156 0c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48c0-26.509-21.49-48-48-48zM108.922 60.922c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.491-48-48-48z"></path></svg>',
            'fa-plus' : 'class="svg-inline--fa fa-plus fa-w-14" aria-hidden="true" data-fa-processed="" data-prefix="fa" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M448 294.2v-76.4c0-13.3-10.7-24-24-24H286.2V56c0-13.3-10.7-24-24-24h-76.4c-13.3 0-24 10.7-24 24v137.8H24c-13.3 0-24 10.7-24 24v76.4c0 13.3 10.7 24 24 24h137.8V456c0 13.3 10.7 24 24 24h76.4c13.3 0 24-10.7 24-24V318.2H424c13.3 0 24-10.7 24-24z"></path></svg>',
            'fa-minus' : 'class="svg-inline--fa fa-minus fa-w-14" aria-hidden="true" data-fa-processed="" data-prefix="fa" data-icon="minus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M424 318.2c13.3 0 24-10.7 24-24v-76.4c0-13.3-10.7-24-24-24H24c-13.3 0-24 10.7-24 24v76.4c0 13.3 10.7 24 24 24h400z"></path></svg>'
        };

        function ctfSVGify(elem) {
            if (ctf.font_method != 'fontfile') {

                if (typeof elem === 'undefined') {
                    elem = jQuery('.sbi');
                }

                elem.each(function() {
                    jQuery(this).find('span.fa').each(function() {
                        var faClass = jQuery(this).attr('class').match(/fa-[a-z-]+/),
                            styles = jQuery(this).attr('style');
                        if (faClass && typeof ctfIconSVG[faClass[0]] !== 'undefined') {
                            var theStyle = typeof styles !== 'undefined' ? 'style="'+styles+'" ' : '';
                            jQuery(this).replaceWith('<svg '+theStyle+ctfIconSVG[faClass[0]]);
                        } else {
                            console.log(faClass,'missing');
                        }
                    })
                });
            }
        }


    })(jQuery);

} //End ctf_js_exists check