!function(e){var t={};function n(r){if(t[r])return t[r].exports;var o=t[r]={i:r,l:!1,exports:{}};return e[r].call(o.exports,o,o.exports,n),o.l=!0,o.exports}n.m=e,n.c=t,n.d=function(e,t,r){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var r=Object.create(null);if(n.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var o in e)n.d(r,o,function(t){return e[t]}.bind(null,o));return r},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=14)}([function(e,t){!function(){e.exports=this.wp.element}()},function(e,t){!function(){e.exports=this.wp.components}()},function(e,t){!function(){e.exports=this.wp.i18n}()},function(e,t,n){var r=n(18),o=n(19),l=n(20);e.exports=function(e,t){return r(e)||o(e,t)||l()}},function(e,t){!function(){e.exports=this.wp.data}()},function(e,t){!function(){e.exports=this.wp.editPost}()},function(e,t){e.exports=function(e,t,n){return t in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e}},function(e,t){e.exports=function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}},function(e,t){function n(e,t){for(var n=0;n<t.length;n++){var r=t[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}e.exports=function(e,t,r){return t&&n(e.prototype,t),r&&n(e,r),e}},function(e,t,n){var r=n(15),o=n(16);e.exports=function(e,t){return!t||"object"!==r(t)&&"function"!=typeof t?o(e):t}},function(e,t){function n(t){return e.exports=n=Object.setPrototypeOf?Object.getPrototypeOf:function(e){return e.__proto__||Object.getPrototypeOf(e)},n(t)}e.exports=n},function(e,t,n){var r=n(17);e.exports=function(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function");e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,writable:!0,configurable:!0}}),t&&r(e,t)}},function(e,t){!function(){e.exports=this.wp.plugins}()},function(e,t){!function(){e.exports=this.wp.compose}()},function(e,t,n){"use strict";n.r(t);var r=n(6),o=n.n(r),l=n(7),c=n.n(l),a=n(8),i=n.n(a),s=n(9),u=n.n(s),p=n(10),b=n.n(p),m=n(11),f=n.n(m),O=n(3),j=n.n(O),d=n(0),h=n(1),y=n(12),_=n(5),v=n(2),E=n(4),w=n(13),g=wp.element.createElement("svg",{width:20,height:20},wp.element.createElement("path",{d:"M5.644 20.665 C6.207 20.545 6.612 20.029 6.574 19.438 6.469 17.784 6.492 16.554 6.617 15.602 L7.388 19.228 C7.454 19.538 7.576 19.815 7.737 20.058 7.742 20.12 7.749 20.181 7.763 20.243 L8.444 23.384 C10.112 23.233 11.311 22.775 11.214 23.077 L10.82 21.227 C10.875 21.218 10.929 21.211 10.984 21.199 10.995 21.197 11.004 21.193 11.015 21.191 L11.35 22.766 C11.571 22.305 13.613 22.092 14.187 21.891 L13.42 19.11 C13.529 18.742 13.553 18.346 13.466 17.936 L12.445 13.134 C12.535 13.088 12.62 13.03 12.698 12.959 12.737 12.929 12.786 12.899 12.84 12.864 13.25 12.596 14.097 12.042 14.433 10.839 L20.429 12.98 C20.642 13.056 20.862 13.067 21.069 13.023 21.456 12.941 21.792 12.667 21.934 12.267 22.154 11.655 21.835 10.981 21.222 10.763 L14.393 8.324 C14.385 8.291 14.379 8.26 14.37 8.226 14.212 7.595 13.573 7.212 12.94 7.372 12.887 7.385 12.838 7.402 12.789 7.422 12.873 6.845 12.859 6.245 12.731 5.643 12.145 2.884 9.422 1.118 6.661 1.705 3.901 2.292 2.132 5.012 2.718 7.771 3.304 10.529 6.027 12.295 8.788 11.708 10.041 11.442 11.088 10.735 11.805 9.786 11.917 9.894 12.05 9.981 12.203 10.04 12.148 10.37 11.997 10.56 11.811 10.71 10.72 11.467 10.238 11.826 9.318 12.07 L8.678 12.167 C7.581 12.344 6.407 12.307 5.457 11.871 4.141 13.689 3.972 15.683 4.221 19.589 4.263 20.238 4.823 20.73 5.473 20.688 5.531 20.685 5.589 20.677 5.644 20.665 Z M8.568 10.67 C6.38 11.135 4.222 9.735 3.758 7.55 3.293 5.364 4.695 3.208 6.883 2.743 9.07 2.278 11.229 3.677 11.693 5.863 12.158 8.049 10.755 10.205 8.568 10.67 Z"}),wp.element.createElement("path",{d:"M8.009 5.745 C7.25 5.906 6.576 5.754 6.502 5.406 6.496 5.377 6.496 5.348 6.498 5.318 6.012 5.752 5.765 6.429 5.911 7.115 6.127 8.132 7.122 8.783 8.132 8.568 9.142 8.353 9.786 7.354 9.57 6.338 9.483 5.928 9.269 5.58 8.98 5.323 8.755 5.503 8.411 5.66 8.009 5.745 Z"})),x=wp.element.Fragment;Object(y.registerPlugin)("relevanssi-premium",{render:function(){var e=Object(d.useState)([]),t=j()(e,2),n=t[0],r=t[1],l=Object(d.useState)([]),a=j()(l,2),s=a[0],p=a[1],m=Object(d.useState)([]),O=j()(m,2),y=O[0],P=O[1],C=Object(d.useState)([]),S=j()(C,2),k=S[0],R=S[1],K=Object(h.withFocusOutside)(function(e){function t(){return c()(this,t),u()(this,b()(t).apply(this,arguments))}return f()(t,e),i()(t,[{key:"handleFocusOutside",value:function(){!function(e,t,n){n||(n="0"),wp.apiFetch({path:"/relevanssi/v1/regeneraterelatedposts/".concat(e,"/").concat(t,"/").concat(n)}).then((function(e){p(L(e))}))}(wp.data.select("core/editor").getCurrentPostId(),this.props.metaKey,wp.data.select("core/editor").getEditedPostAttribute("meta")[this.props.metaKey])}},{key:"render",value:function(){return Object(d.createElement)(M,{control:this.props.control,title:this.props.title,metaKey:this.props.metaKey})}}]),t}(React.Component)),M=Object(w.compose)(Object(E.withDispatch)((function(e,t){return{setMetaValue:function(n){e("core/editor").editPost({meta:o()({},t.metaKey,n)})}}})),Object(E.withSelect)((function(e,t){var n=e("core/editor").getEditedPostAttribute("meta")[t.metaKey];return"0"===n&&(n=""),{metaValue:n}})))((function(e){var t={label:e.title,value:e.metaValue,onChange:function(t){e.setMetaValue(t)}};if(e.control==h.CheckboxControl){var n="on"==e.metaValue;t.value="",t.checked=n,t.onChange=function(t){t=t?"on":"off",e.setMetaValue(t)}}return wp.element.createElement(e.control,t)})),A=Object(E.select)("core/editor").getCurrentPostId();Object(d.useEffect)((function(){wp.apiFetch({path:"/relevanssi/v1/sees/".concat(A)}).then((function(e){r(e)}))}),[A]);var L=function(e){return e.map((function(e){return Object(d.createElement)("li",{key:e.id},Object(d.createElement)("a",{href:e.link},e.title)," ",Object(d.createElement)(h.Button,{onClick:function(){return function(e,t){wp.apiFetch({path:"/relevanssi/v1/excluderelatedpost/".concat(e,"/").concat(t)}).then((function(e){R(e)}))}(e.id,A)}},"(",Object(v.__)("not this","relevanssi"),")"))}))};return Object(d.useEffect)((function(){wp.apiFetch({path:"/relevanssi/v1/listrelated/".concat(A)}).then((function(e){p(L(e))}))}),[A,k]),Object(d.useEffect)((function(){wp.apiFetch({path:"/relevanssi/v1/listexcluded/".concat(A)}).then((function(e){var t=e.map((function(e){return Object(d.createElement)("li",{key:e.id},Object(d.createElement)("a",{href:e.link},e.title),Object(d.createElement)(h.Button,{onClick:function(){return function(e,t){wp.apiFetch({path:"/relevanssi/v1/unexcluderelatedpost/".concat(e,"/").concat(t)}).then((function(e){R(e)}))}(e.id,A)}},"(",Object(v.__)("use this","relevanssi"),")"))}));P(t)}))}),[A,k]),Object(d.createElement)(x,null,Object(d.createElement)(_.PluginSidebarMoreMenuItem,{target:"relevanssi-premium",icon:g},"Relevanssi Premium"),Object(d.createElement)(_.PluginSidebar,{name:"relevanssi-premium",icon:g,title:"Relevanssi Premium"},Object(d.createElement)(h.Panel,null,Object(d.createElement)(h.PanelBody,{initialOpen:!1,title:Object(v.__)("How Relevanssi sees this post","relevanssi")},n.title&&Object(d.createElement)("p",null,Object(d.createElement)("strong",null,Object(v.__)("Title:","relevanssi")),Object(d.createElement)("br",null),n.title),n.content&&Object(d.createElement)("p",null,Object(d.createElement)("strong",null,Object(v.__)("Content:","relevanssi")),Object(d.createElement)("br",null),n.content),n.author&&Object(d.createElement)("p",null,Object(d.createElement)("strong",null,Object(v.__)("Author:","relevanssi")),Object(d.createElement)("br",null),n.author),n.category&&Object(d.createElement)("p",null,Object(d.createElement)("strong",null,Object(v.__)("Categories:","relevanssi")),Object(d.createElement)("br",null),n.category),n.tag&&Object(d.createElement)("p",null,Object(d.createElement)("strong",null,Object(v.__)("Tags:","relevanssi")),Object(d.createElement)("br",null),n.tag),n.taxonomy&&Object(d.createElement)("p",null,Object(d.createElement)("strong",null,Object(v.__)("Other taxonomies:","relevanssi")),Object(d.createElement)("br",null),n.taxonomy),n.comment&&Object(d.createElement)("p",null,Object(d.createElement)("strong",null,Object(v.__)("Comments:","relevanssi")),Object(d.createElement)("br",null),n.comment),n.customfield&&Object(d.createElement)("p",null,Object(d.createElement)("strong",null,Object(v.__)("Custom fields:","relevanssi")),Object(d.createElement)("br",null),n.customfield),n.excerpt&&Object(d.createElement)("p",null,Object(d.createElement)("strong",null,Object(v.__)("Excerpt:","relevanssi")),Object(d.createElement)("br",null),n.excerpt),n.link&&Object(d.createElement)("p",null,Object(d.createElement)("strong",null,Object(v.__)("Links to this post:","relevanssi")),Object(d.createElement)("br",null),n.link),n.mysql&&Object(d.createElement)("p",null,Object(d.createElement)("strong",null,Object(v.__)("MySQL columns:","relevanssi")),Object(d.createElement)("br",null),n.mysql))),Object(d.createElement)(h.Panel,null,Object(d.createElement)(h.PanelBody,{initialOpen:!1,title:Object(v.__)("Pinning","relevanssi")},Object(d.createElement)(h.PanelRow,null,Object(d.createElement)(M,{control:h.CheckboxControl,title:Object(v.__)("Pin this post for all searches it appears in.","relevanssi"),metaKey:"_relevanssi_pin_for_all"})),Object(d.createElement)(h.PanelRow,null,Object(d.createElement)(M,{control:h.TextareaControl,title:Object(v.__)("A comma-separated list of single word keywords or multi-word phrases. If any of these keywords are present in the search query, this post will be moved on top of the search results.","relevanssi"),metaKey:"_relevanssi_pin_keywords"}))),Object(d.createElement)(h.PanelBody,{initialOpen:!1,title:Object(v.__)("Exclusion","relevanssi")},Object(d.createElement)(h.PanelRow,null,Object(d.createElement)(M,{control:h.CheckboxControl,title:Object(v.__)("Exclude this post or page from the index.","relevanssi"),metaKey:"_relevanssi_hide_post"})),Object(d.createElement)(h.PanelRow,null,Object(d.createElement)(M,{control:h.TextareaControl,title:Object(v.__)("A comma-separated list of single word keywords or multi-word phrases. If any of these keywords are present in the search query, this post will be removed from the search results.","relevanssi"),metaKey:"_relevanssi_unpin_keywords"})))),Object(d.createElement)(h.Panel,null,Object(d.createElement)(h.PanelBody,{initialOpen:!1,title:Object(v.__)("Related posts","relevanssi")},Object(d.createElement)(h.PanelRow,null,Object(d.createElement)(M,{control:h.CheckboxControl,title:Object(v.__)("Don't append the related posts to this page.","relevanssi"),metaKey:"_relevanssi_related_no_append"})),Object(d.createElement)(h.PanelRow,null,Object(d.createElement)(M,{control:h.CheckboxControl,title:Object(v.__)("Don't show this as a related post for any post.","relevanssi"),metaKey:"_relevanssi_related_not_related"})),Object(d.createElement)(h.PanelRow,null,Object(d.createElement)(K,{control:h.TextareaControl,title:Object(v.__)("A comma-separated list of keywords to use for the Related Posts feature. Anything entered here will used when searching for related posts. Using phrases with quotes is allowed, but will restrict the related posts to posts including that phrase.","relevanssi"),metaKey:"_relevanssi_related_keywords"})),Object(d.createElement)(h.PanelRow,null,Object(d.createElement)(K,{control:h.TextControl,title:Object(v.__)("A comma-separated list of post IDs to use as related posts for this post","relevanssi"),metaKey:"_relevanssi_related_include_ids"})),Object(d.createElement)("p",null,Object(v.__)("Related posts for this post:","relevanssi")),Object(d.createElement)("ol",null,s),Object(d.createElement)("p",null,Object(v.__)("Excluded posts for this post:","relevanssi")),Object(d.createElement)("ol",null,y)))))}})},function(e,t){function n(e){return(n="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}function r(t){return"function"==typeof Symbol&&"symbol"===n(Symbol.iterator)?e.exports=r=function(e){return n(e)}:e.exports=r=function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":n(e)},r(t)}e.exports=r},function(e,t){e.exports=function(e){if(void 0===e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return e}},function(e,t){function n(t,r){return e.exports=n=Object.setPrototypeOf||function(e,t){return e.__proto__=t,e},n(t,r)}e.exports=n},function(e,t){e.exports=function(e){if(Array.isArray(e))return e}},function(e,t){e.exports=function(e,t){if(Symbol.iterator in Object(e)||"[object Arguments]"===Object.prototype.toString.call(e)){var n=[],r=!0,o=!1,l=void 0;try{for(var c,a=e[Symbol.iterator]();!(r=(c=a.next()).done)&&(n.push(c.value),!t||n.length!==t);r=!0);}catch(e){o=!0,l=e}finally{try{r||null==a.return||a.return()}finally{if(o)throw l}}return n}}},function(e,t){e.exports=function(){throw new TypeError("Invalid attempt to destructure non-iterable instance")}}]);