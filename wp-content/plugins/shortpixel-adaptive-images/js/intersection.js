/**
 * Created by simon on 01.11.2018.
 */

window.IntersectionObserver || (window.IntersectionObserver = function(callback, options){
    this.callback = callback;
    this.options = options;
    this.observed = {};
    this.eventHandler = false;
    this.addEventListener = function(evt, fn) {
        window.addEventListener
            ? window.addEventListener(evt, fn, false)
            : (window.attachEvent)
            ? window.attachEvent('on' + evt, fn)
            : window['on' + evt] = fn;
    }
    var thisIOWFB = this;
    this.observe = function(target){
        this.observed[ShortPixelAI.xpath(target)] = target;
        if(!this.eventHandler) {
            this.addEventListener("scroll", function(){
                var currentScroll = jQuery(window).scrollTop();
                if(Math.abs(thisIOWFB.lastHandledScroll - currentScroll) > parseInt(thisIOWFB.options.rootMargin) / 2) {
                    thisIOWFB.lastHandledScroll = currentScroll;
                    var currentlyVisible = new Array();
                    for (var item in thisIOWFB.observed) {
                        if (ShortPixelAI.elementInViewport(thisIOWFB.observed[item], parseInt(thisIOWFB.options.rootMargin))) {
                            currentlyVisible.push({target: thisIOWFB.observed[item], isIntersecting: true});
                        }
                    }
                    if(currentlyVisible.length) {
                        thisIOWFB.callback(currentlyVisible, thisIOWFB);
                    }
                }
            });
            this.eventHandler = true;
        }
    }
    this.lastHandledScroll = 0;
    this.unobserve = function(target) {
        delete this.observed[ShortPixelAI.xpath(target)]
    }
    return this;
});

Array.prototype.indexOf || (Array.prototype.indexOf = function(d, e) {
    var a;
    if (null == this) throw new TypeError('"this" is null or not defined');
    var c = Object(this),
        b = c.length >>> 0;
    if (0 === b) return -1;
    a = +e || 0;
    Infinity === Math.abs(a) && (a = 0);
    if (a >= b) return -1;
    for (a = Math.max(0 <= a ? a : b - Math.abs(a), 0); a < b;) {
        if (a in c && c[a] === d) return a;
        a++
    }
    return -1
});
