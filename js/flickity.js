/*!
 * Flickity PACKAGED v2.0.5
 * Touch, responsive, flickable carousels
 *
 * Licensed GPLv3 for open source use
 * or Flickity Commercial License for commercial use
 *
 * http://flickity.metafizzy.co
 * Copyright 2016 Metafizzy
 */

/**
 * Bridget makes jQuery widgets
 * v2.0.1
 * MIT license
 */

/* jshint browser: true, strict: true, undef: true, unused: true */

!(function(t, e) {
  "function" == typeof define && define.amd
    ? define("jquery-bridget/jquery-bridget", ["jquery"], function(i) {
        return e(t, i);
      })
    : "object" == typeof module && module.exports
      ? (module.exports = e(t, require("jquery")))
      : (t.jQueryBridget = e(t, t.jQuery));
})(window, function t(e, i) {
  "use strict";
  function n(t, n, $) {
    function r(e, i, n) {
      var s,
        o = "$()." + t + '("' + i + '")';
      return (
        e.each(function(e, r) {
          var l = $.data(r, t);
          if (!l) return void a(t + " not initialized. Cannot call methods, i.e. " + o);
          var h = l[i];
          if (!h || "_" == i.charAt(0)) return void a(o + " is not a valid method");
          var c = h.apply(l, n);
          s = void 0 === s ? c : s;
        }),
        void 0 !== s ? s : e
      );
    }
    function l(e, i) {
      e.each(function(e, s) {
        var o = $.data(s, t);
        o ? (o.option(i), o._init()) : ((o = new n(s, i)), $.data(s, t, o));
      });
    }
    ($ = $ || i || e.jQuery) &&
      (n.prototype.option ||
        (n.prototype.option = function(t) {
          $.isPlainObject(t) && (this.options = $.extend(!0, this.options, t));
        }),
      ($.fn[t] = function(t) {
        if ("string" == typeof t) {
          return r(this, t, o.call(arguments, 1));
        }
        return l(this, t), this;
      }),
      s($));
  }
  function s($) {
    !$ || ($ && $.bridget) || ($.bridget = n);
  }
  var o = Array.prototype.slice,
    r = e.console,
    a =
      void 0 === r
        ? function() {}
        : function(t) {
            r.error(t);
          };
  return s(i || e.jQuery), n;
}),
  (function(t, e) {
    "function" == typeof define && define.amd
      ? define("ev-emitter/ev-emitter", e)
      : "object" == typeof module && module.exports ? (module.exports = e()) : (t.EvEmitter = e());
  })("undefined" != typeof window ? window : this, function() {
    function t() {}
    var e = t.prototype;
    return (
      (e.on = function(t, e) {
        if (t && e) {
          var i = (this._events = this._events || {}),
            n = (i[t] = i[t] || []);
          return -1 == n.indexOf(e) && n.push(e), this;
        }
      }),
      (e.once = function(t, e) {
        if (t && e) {
          this.on(t, e);
          var i = (this._onceEvents = this._onceEvents || {});
          return ((i[t] = i[t] || {})[e] = !0), this;
        }
      }),
      (e.off = function(t, e) {
        var i = this._events && this._events[t];
        if (i && i.length) {
          var n = i.indexOf(e);
          return -1 != n && i.splice(n, 1), this;
        }
      }),
      (e.emitEvent = function(t, e) {
        var i = this._events && this._events[t];
        if (i && i.length) {
          var n = 0,
            s = i[n];
          e = e || [];
          for (var o = this._onceEvents && this._onceEvents[t]; s; ) {
            var r = o && o[s];
            r && (this.off(t, s), delete o[s]), s.apply(this, e), (n += r ? 0 : 1), (s = i[n]);
          }
          return this;
        }
      }),
      t
    );
  }),
  (function(t, e) {
    "use strict";
    "function" == typeof define && define.amd
      ? define("get-size/get-size", [], function() {
          return e();
        })
      : "object" == typeof module && module.exports ? (module.exports = e()) : (t.getSize = e());
  })(window, function t() {
    "use strict";
    function e(t) {
      var e = parseFloat(t);
      return -1 == t.indexOf("%") && !isNaN(e) && e;
    }
    function i() {}
    function n() {
      for (
        var t = { width: 0, height: 0, innerWidth: 0, innerHeight: 0, outerWidth: 0, outerHeight: 0 }, e = 0;
        e < h;
        e++
      ) {
        t[l[e]] = 0;
      }
      return t;
    }
    function s(t) {
      var e = getComputedStyle(t);
      return (
        e ||
          a(
            "Style returned " +
              e +
              ". Are you running this code in a hidden iframe on Firefox? See http://bit.ly/getsizebug1"
          ),
        e
      );
    }
    function o() {
      if (!c) {
        c = !0;
        var t = document.createElement("div");
        (t.style.width = "200px"),
          (t.style.padding = "1px 2px 3px 4px"),
          (t.style.borderStyle = "solid"),
          (t.style.borderWidth = "1px 2px 3px 4px"),
          (t.style.boxSizing = "border-box");
        var i = document.body || document.documentElement;
        i.appendChild(t);
        var n = s(t);
        (r.isBoxSizeOuter = d = 200 == e(n.width)), i.removeChild(t);
      }
    }
    function r(t) {
      if ((o(), "string" == typeof t && (t = document.querySelector(t)), t && "object" == typeof t && t.nodeType)) {
        var i = s(t);
        if ("none" == i.display) return n();
        var r = {};
        (r.width = t.offsetWidth), (r.height = t.offsetHeight);
        for (var a = (r.isBorderBox = "border-box" == i.boxSizing), c = 0; c < h; c++) {
          var u = l[c],
            f = i[u],
            p = parseFloat(f);
          r[u] = isNaN(p) ? 0 : p;
        }
        var v = r.paddingLeft + r.paddingRight,
          g = r.paddingTop + r.paddingBottom,
          m = r.marginLeft + r.marginRight,
          y = r.marginTop + r.marginBottom,
          S = r.borderLeftWidth + r.borderRightWidth,
          E = r.borderTopWidth + r.borderBottomWidth,
          b = a && d,
          x = e(i.width);
        !1 !== x && (r.width = x + (b ? 0 : v + S));
        var C = e(i.height);
        return (
          !1 !== C && (r.height = C + (b ? 0 : g + E)),
          (r.innerWidth = r.width - (v + S)),
          (r.innerHeight = r.height - (g + E)),
          (r.outerWidth = r.width + m),
          (r.outerHeight = r.height + y),
          r
        );
      }
    }
    var a =
        "undefined" == typeof console
          ? i
          : function(t) {
              console.error(t);
            },
      l = [
        "paddingLeft",
        "paddingRight",
        "paddingTop",
        "paddingBottom",
        "marginLeft",
        "marginRight",
        "marginTop",
        "marginBottom",
        "borderLeftWidth",
        "borderRightWidth",
        "borderTopWidth",
        "borderBottomWidth"
      ],
      h = l.length,
      c = !1,
      d;
    return r;
  }),
  (function(t, e) {
    "use strict";
    "function" == typeof define && define.amd
      ? define("desandro-matches-selector/matches-selector", e)
      : "object" == typeof module && module.exports ? (module.exports = e()) : (t.matchesSelector = e());
  })(window, function t() {
    "use strict";
    var e = (function() {
      var t = Element.prototype;
      if (t.matches) return "matches";
      if (t.matchesSelector) return "matchesSelector";
      for (var e = ["webkit", "moz", "ms", "o"], i = 0; i < e.length; i++) {
        var n = e[i],
          s = n + "MatchesSelector";
        if (t[s]) return s;
      }
    })();
    return function t(i, n) {
      return i[e](n);
    };
  }),
  (function(t, e) {
    "function" == typeof define && define.amd
      ? define("fizzy-ui-utils/utils", ["desandro-matches-selector/matches-selector"], function(i) {
          return e(t, i);
        })
      : "object" == typeof module && module.exports
        ? (module.exports = e(t, require("desandro-matches-selector")))
        : (t.fizzyUIUtils = e(t, t.matchesSelector));
  })(window, function t(e, i) {
    var n = {};
    (n.extend = function(t, e) {
      for (var i in e) t[i] = e[i];
      return t;
    }),
      (n.modulo = function(t, e) {
        return (t % e + e) % e;
      }),
      (n.makeArray = function(t) {
        var e = [];
        if (Array.isArray(t)) e = t;
        else if (t && "number" == typeof t.length) for (var i = 0; i < t.length; i++) e.push(t[i]);
        else e.push(t);
        return e;
      }),
      (n.removeFrom = function(t, e) {
        var i = t.indexOf(e);
        -1 != i && t.splice(i, 1);
      }),
      (n.getParent = function(t, e) {
        for (; t != document.body; ) if (((t = t.parentNode), i(t, e))) return t;
      }),
      (n.getQueryElement = function(t) {
        return "string" == typeof t ? document.querySelector(t) : t;
      }),
      (n.handleEvent = function(t) {
        var e = "on" + t.type;
        this[e] && this[e](t);
      }),
      (n.filterFindElements = function(t, e) {
        t = n.makeArray(t);
        var s = [];
        return (
          t.forEach(function(t) {
            if (t instanceof HTMLElement) {
              if (!e) return void s.push(t);
              i(t, e) && s.push(t);
              for (var n = t.querySelectorAll(e), o = 0; o < n.length; o++) s.push(n[o]);
            }
          }),
          s
        );
      }),
      (n.debounceMethod = function(t, e, i) {
        var n = t.prototype[e],
          s = e + "Timeout";
        t.prototype[e] = function() {
          var t = this[s];
          t && clearTimeout(t);
          var e = arguments,
            o = this;
          this[s] = setTimeout(function() {
            n.apply(o, e), delete o[s];
          }, i || 100);
        };
      }),
      (n.docReady = function(t) {
        var e = document.readyState;
        "complete" == e || "interactive" == e ? setTimeout(t) : document.addEventListener("DOMContentLoaded", t);
      }),
      (n.toDashed = function(t) {
        return t
          .replace(/(.)([A-Z])/g, function(t, e, i) {
            return e + "-" + i;
          })
          .toLowerCase();
      });
    var s = e.console;
    return (
      (n.htmlInit = function(t, i) {
        n.docReady(function() {
          var o = n.toDashed(i),
            r = "data-" + o,
            a = document.querySelectorAll("[" + r + "]"),
            l = document.querySelectorAll(".js-" + o),
            h = n.makeArray(a).concat(n.makeArray(l)),
            c = r + "-options",
            d = e.jQuery;
          h.forEach(function(e) {
            var n = e.getAttribute(r) || e.getAttribute(c),
              o;
            try {
              o = n && JSON.parse(n);
            } catch (t) {
              return void (s && s.error("Error parsing " + r + " on " + e.className + ": " + t));
            }
            var a = new t(e, o);
            d && d.data(e, i, a);
          });
        });
      }),
      n
    );
  }),
  (function(t, e) {
    "function" == typeof define && define.amd
      ? define("flickity/js/cell", ["get-size/get-size"], function(i) {
          return e(t, i);
        })
      : "object" == typeof module && module.exports
        ? (module.exports = e(t, require("get-size")))
        : ((t.Flickity = t.Flickity || {}), (t.Flickity.Cell = e(t, t.getSize)));
  })(window, function t(e, i) {
    function n(t, e) {
      (this.element = t), (this.parent = e), this.create();
    }
    var s = n.prototype;
    return (
      (s.create = function() {
        (this.element.style.position = "absolute"), (this.x = 0), (this.shift = 0);
      }),
      (s.destroy = function() {
        this.element.style.position = "";
        var t = this.parent.originSide;
        this.element.style[t] = "";
      }),
      (s.getSize = function() {
        this.size = i(this.element);
      }),
      (s.setPosition = function(t) {
        (this.x = t), this.updateTarget(), this.renderPosition(t);
      }),
      (s.updateTarget = s.setDefaultTarget = function() {
        var t = "left" == this.parent.originSide ? "marginLeft" : "marginRight";
        this.target = this.x + this.size[t] + this.size.width * this.parent.cellAlign;
      }),
      (s.renderPosition = function(t) {
        var e = this.parent.originSide;
        this.element.style[e] = this.parent.getPositionValue(t);
      }),
      (s.wrapShift = function(t) {
        (this.shift = t), this.renderPosition(this.x + this.parent.slideableWidth * t);
      }),
      (s.remove = function() {
        this.element.parentNode.removeChild(this.element);
      }),
      n
    );
  }),
  (function(t, e) {
    "function" == typeof define && define.amd
      ? define("flickity/js/slide", e)
      : "object" == typeof module && module.exports
        ? (module.exports = e())
        : ((t.Flickity = t.Flickity || {}), (t.Flickity.Slide = e()));
  })(window, function t() {
    "use strict";
    function e(t) {
      (this.parent = t),
        (this.isOriginLeft = "left" == t.originSide),
        (this.cells = []),
        (this.outerWidth = 0),
        (this.height = 0);
    }
    var i = e.prototype;
    return (
      (i.addCell = function(t) {
        if (
          (this.cells.push(t),
          (this.outerWidth += t.size.outerWidth),
          (this.height = Math.max(t.size.outerHeight, this.height)),
          1 == this.cells.length)
        ) {
          this.x = t.x;
          var e = this.isOriginLeft ? "marginLeft" : "marginRight";
          this.firstMargin = t.size[e];
        }
      }),
      (i.updateTarget = function() {
        var t = this.isOriginLeft ? "marginRight" : "marginLeft",
          e = this.getLastCell(),
          i = e ? e.size[t] : 0,
          n = this.outerWidth - (this.firstMargin + i);
        this.target = this.x + this.firstMargin + n * this.parent.cellAlign;
      }),
      (i.getLastCell = function() {
        return this.cells[this.cells.length - 1];
      }),
      (i.select = function() {
        this.changeSelectedClass("add");
      }),
      (i.unselect = function() {
        this.changeSelectedClass("remove");
      }),
      (i.changeSelectedClass = function(t) {
        this.cells.forEach(function(e) {
          e.element.classList[t]("is-selected");
        });
      }),
      (i.getCellElements = function() {
        return this.cells.map(function(t) {
          return t.element;
        });
      }),
      e
    );
  }),
  (function(t, e) {
    "function" == typeof define && define.amd
      ? define("flickity/js/animate", ["fizzy-ui-utils/utils"], function(i) {
          return e(t, i);
        })
      : "object" == typeof module && module.exports
        ? (module.exports = e(t, require("fizzy-ui-utils")))
        : ((t.Flickity = t.Flickity || {}), (t.Flickity.animatePrototype = e(t, t.fizzyUIUtils)));
  })(window, function t(e, i) {
    var n = e.requestAnimationFrame || e.webkitRequestAnimationFrame,
      s = 0;
    n ||
      (n = function(t) {
        var e = new Date().getTime(),
          i = Math.max(0, 16 - (e - s)),
          n = setTimeout(t, i);
        return (s = e + i), n;
      });
    var o = {};
    (o.startAnimation = function() {
      this.isAnimating || ((this.isAnimating = !0), (this.restingFrames = 0), this.animate());
    }),
      (o.animate = function() {
        this.applyDragForce(), this.applySelectedAttraction();
        var t = this.x;
        if ((this.integratePhysics(), this.positionSlider(), this.settle(t), this.isAnimating)) {
          var e = this;
          n(function t() {
            e.animate();
          });
        }
      });
    var r = (function() {
      return "string" == typeof document.documentElement.style.transform ? "transform" : "WebkitTransform";
    })();
    return (
      (o.positionSlider = function() {
        var t = this.x;
        this.options.wrapAround &&
          this.cells.length > 1 &&
          ((t = i.modulo(t, this.slideableWidth)), (t -= this.slideableWidth), this.shiftWrapCells(t)),
          (t += this.cursorPosition),
          (t = this.options.rightToLeft && r ? -t : t);
        var e = this.getPositionValue(t);
        this.slider.style[r] = this.isAnimating ? "translate3d(" + e + ",0,0)" : "translateX(" + e + ")";
        var n = this.slides[0];
        if (n) {
          var s = -this.x - n.target,
            o = s / this.slidesWidth;
          this.dispatchEvent("scroll", null, [o, s]);
        }
      }),
      (o.positionSliderAtSelected = function() {
        this.cells.length && ((this.x = -this.selectedSlide.target), this.positionSlider());
      }),
      (o.getPositionValue = function(t) {
        return this.options.percentPosition
          ? 0.01 * Math.round(t / this.size.innerWidth * 1e4) + "%"
          : Math.round(t) + "px";
      }),
      (o.settle = function(t) {
        this.isPointerDown || Math.round(100 * this.x) != Math.round(100 * t) || this.restingFrames++,
          this.restingFrames > 2 &&
            ((this.isAnimating = !1), delete this.isFreeScrolling, this.positionSlider(), this.dispatchEvent("settle"));
      }),
      (o.shiftWrapCells = function(t) {
        var e = this.cursorPosition + t;
        this._shiftCells(this.beforeShiftCells, e, -1);
        var i = this.size.innerWidth - (t + this.slideableWidth + this.cursorPosition);
        this._shiftCells(this.afterShiftCells, i, 1);
      }),
      (o._shiftCells = function(t, e, i) {
        for (var n = 0; n < t.length; n++) {
          var s = t[n],
            o = e > 0 ? i : 0;
          s.wrapShift(o), (e -= s.size.outerWidth);
        }
      }),
      (o._unshiftCells = function(t) {
        if (t && t.length) for (var e = 0; e < t.length; e++) t[e].wrapShift(0);
      }),
      (o.integratePhysics = function() {
        (this.x += this.velocity), (this.velocity *= this.getFrictionFactor());
      }),
      (o.applyForce = function(t) {
        this.velocity += t;
      }),
      (o.getFrictionFactor = function() {
        return 1 - this.options[this.isFreeScrolling ? "freeScrollFriction" : "friction"];
      }),
      (o.getRestingPosition = function() {
        return this.x + this.velocity / (1 - this.getFrictionFactor());
      }),
      (o.applyDragForce = function() {
        if (this.isPointerDown) {
          var t = this.dragX - this.x,
            e = t - this.velocity;
          this.applyForce(e);
        }
      }),
      (o.applySelectedAttraction = function() {
        if (!this.isPointerDown && !this.isFreeScrolling && this.cells.length) {
          var t = -1 * this.selectedSlide.target - this.x,
            e = t * this.options.selectedAttraction;
          this.applyForce(e);
        }
      }),
      o
    );
  }),
  (function(t, e) {
    if ("function" == typeof define && define.amd)
      define(
        "flickity/js/flickity",
        ["ev-emitter/ev-emitter", "get-size/get-size", "fizzy-ui-utils/utils", "./cell", "./slide", "./animate"],
        function(i, n, s, o, r, a) {
          return e(t, i, n, s, o, r, a);
        }
      );
    else if ("object" == typeof module && module.exports)
      module.exports = e(
        t,
        require("ev-emitter"),
        require("get-size"),
        require("fizzy-ui-utils"),
        require("./cell"),
        require("./slide"),
        require("./animate")
      );
    else {
      var i = t.Flickity;
      t.Flickity = e(t, t.EvEmitter, t.getSize, t.fizzyUIUtils, i.Cell, i.Slide, i.animatePrototype);
    }
  })(window, function t(e, i, n, s, o, r, a) {
    function l(t, e) {
      for (t = s.makeArray(t); t.length; ) e.appendChild(t.shift());
    }
    function h(t, e) {
      var i = s.getQueryElement(t);
      if (!i) return void (u && u.error("Bad element for Flickity: " + (i || t)));
      if (((this.element = i), this.element.flickityGUID)) {
        var n = p[this.element.flickityGUID];
        return n.option(e), n;
      }
      c && (this.$element = c(this.element)),
        (this.options = s.extend({}, this.constructor.defaults)),
        this.option(e),
        this._create();
    }
    var c = e.jQuery,
      d = e.getComputedStyle,
      u = e.console,
      f = 0,
      p = {};
    (h.defaults = {
      accessibility: !0,
      cellAlign: "center",
      freeScrollFriction: 0.075,
      friction: 0.28,
      namespaceJQueryEvents: !0,
      percentPosition: !0,
      resize: !0,
      selectedAttraction: 0.025,
      setGallerySize: !0
    }),
      (h.createMethods = []);
    var v = h.prototype;
    s.extend(v, i.prototype),
      (v._create = function() {
        var t = (this.guid = ++f);
        (this.element.flickityGUID = t),
          (p[t] = this),
          (this.selectedIndex = 0),
          (this.restingFrames = 0),
          (this.x = 0),
          (this.velocity = 0),
          (this.originSide = this.options.rightToLeft ? "right" : "left"),
          (this.viewport = document.createElement("div")),
          (this.viewport.className = "flickity-viewport"),
          this._createSlider(),
          (this.options.resize || this.options.watchCSS) && e.addEventListener("resize", this),
          h.createMethods.forEach(function(t) {
            this[t]();
          }, this),
          this.options.watchCSS ? this.watchCSS() : this.activate();
      }),
      (v.option = function(t) {
        s.extend(this.options, t);
      }),
      (v.activate = function() {
        if (!this.isActive) {
          (this.isActive = !0),
            this.element.classList.add("flickity-enabled"),
            this.options.rightToLeft && this.element.classList.add("flickity-rtl"),
            this.getSize();
          l(this._filterFindCellElements(this.element.children), this.slider),
            this.viewport.appendChild(this.slider),
            this.element.appendChild(this.viewport),
            this.reloadCells(),
            this.options.accessibility && ((this.element.tabIndex = 0), this.element.addEventListener("keydown", this)),
            this.emitEvent("activate");
          var t,
            e = this.options.initialIndex;
          (t = this.isInitActivated ? this.selectedIndex : void 0 !== e && this.cells[e] ? e : 0),
            this.select(t, !1, !0),
            (this.isInitActivated = !0);
        }
      }),
      (v._createSlider = function() {
        var t = document.createElement("div");
        (t.className = "flickity-slider"), (t.style[this.originSide] = 0), (this.slider = t);
      }),
      (v._filterFindCellElements = function(t) {
        return s.filterFindElements(t, this.options.cellSelector);
      }),
      (v.reloadCells = function() {
        (this.cells = this._makeCells(this.slider.children)),
          this.positionCells(),
          this._getWrapShiftCells(),
          this.setGallerySize();
      }),
      (v._makeCells = function(t) {
        return this._filterFindCellElements(t).map(function(t) {
          return new o(t, this);
        }, this);
      }),
      (v.getLastCell = function() {
        return this.cells[this.cells.length - 1];
      }),
      (v.getLastSlide = function() {
        return this.slides[this.slides.length - 1];
      }),
      (v.positionCells = function() {
        this._sizeCells(this.cells), this._positionCells(0);
      }),
      (v._positionCells = function(t) {
        (t = t || 0), (this.maxCellHeight = t ? this.maxCellHeight || 0 : 0);
        var e = 0;
        if (t > 0) {
          var i = this.cells[t - 1];
          e = i.x + i.size.outerWidth;
        }
        for (var n = this.cells.length, s = t; s < n; s++) {
          var o = this.cells[s];
          o.setPosition(e),
            (e += o.size.outerWidth),
            (this.maxCellHeight = Math.max(o.size.outerHeight, this.maxCellHeight));
        }
        (this.slideableWidth = e),
          this.updateSlides(),
          this._containSlides(),
          (this.slidesWidth = n ? this.getLastSlide().target - this.slides[0].target : 0);
      }),
      (v._sizeCells = function(t) {
        t.forEach(function(t) {
          t.getSize();
        });
      }),
      (v.updateSlides = function() {
        if (((this.slides = []), this.cells.length)) {
          var t = new r(this);
          this.slides.push(t);
          var e = "left" == this.originSide,
            i = e ? "marginRight" : "marginLeft",
            n = this._getCanCellFit();
          this.cells.forEach(function(e, s) {
            if (!t.cells.length) return void t.addCell(e);
            var o = t.outerWidth - t.firstMargin + (e.size.outerWidth - e.size[i]);
            n.call(this, s, o)
              ? t.addCell(e)
              : (t.updateTarget(), (t = new r(this)), this.slides.push(t), t.addCell(e));
          }, this),
            t.updateTarget(),
            this.updateSelectedSlide();
        }
      }),
      (v._getCanCellFit = function() {
        var t = this.options.groupCells;
        if (!t)
          return function() {
            return !1;
          };
        if ("number" == typeof t) {
          var e = parseInt(t, 10);
          return function(t) {
            return t % e != 0;
          };
        }
        var i = "string" == typeof t && t.match(/^(\d+)%$/),
          n = i ? parseInt(i[1], 10) / 100 : 1;
        return function(t, e) {
          return e <= (this.size.innerWidth + 1) * n;
        };
      }),
      (v._init = v.reposition = function() {
        this.positionCells(), this.positionSliderAtSelected();
      }),
      (v.getSize = function() {
        (this.size = n(this.element)),
          this.setCellAlign(),
          (this.cursorPosition = this.size.innerWidth * this.cellAlign);
      });
    var g = { center: { left: 0.5, right: 0.5 }, left: { left: 0, right: 1 }, right: { right: 0, left: 1 } };
    return (
      (v.setCellAlign = function() {
        var t = g[this.options.cellAlign];
        this.cellAlign = t ? t[this.originSide] : this.options.cellAlign;
      }),
      (v.setGallerySize = function() {
        if (this.options.setGallerySize) {
          var t = this.options.adaptiveHeight && this.selectedSlide ? this.selectedSlide.height : this.maxCellHeight;
          this.viewport.style.height = t + "px";
        }
      }),
      (v._getWrapShiftCells = function() {
        if (this.options.wrapAround) {
          this._unshiftCells(this.beforeShiftCells), this._unshiftCells(this.afterShiftCells);
          var t = this.cursorPosition,
            e = this.cells.length - 1;
          (this.beforeShiftCells = this._getGapCells(t, e, -1)),
            (t = this.size.innerWidth - this.cursorPosition),
            (this.afterShiftCells = this._getGapCells(t, 0, 1));
        }
      }),
      (v._getGapCells = function(t, e, i) {
        for (var n = []; t > 0; ) {
          var s = this.cells[e];
          if (!s) break;
          n.push(s), (e += i), (t -= s.size.outerWidth);
        }
        return n;
      }),
      (v._containSlides = function() {
        if (this.options.contain && !this.options.wrapAround && this.cells.length) {
          var t = this.options.rightToLeft,
            e = t ? "marginRight" : "marginLeft",
            i = t ? "marginLeft" : "marginRight",
            n = this.slideableWidth - this.getLastCell().size[i],
            s = n < this.size.innerWidth,
            o = this.cursorPosition + this.cells[0].size[e],
            r = n - this.size.innerWidth * (1 - this.cellAlign);
          this.slides.forEach(function(t) {
            s
              ? (t.target = n * this.cellAlign)
              : ((t.target = Math.max(t.target, o)), (t.target = Math.min(t.target, r)));
          }, this);
        }
      }),
      (v.dispatchEvent = function(t, e, i) {
        var n = e ? [e].concat(i) : i;
        if ((this.emitEvent(t, n), c && this.$element)) {
          t += this.options.namespaceJQueryEvents ? ".flickity" : "";
          var s = t;
          if (e) {
            var o = c.Event(e);
            (o.type = t), (s = o);
          }
          this.$element.trigger(s, i);
        }
      }),
      (v.select = function(t, e, i) {
        this.isActive &&
          ((t = parseInt(t, 10)),
          this._wrapSelect(t),
          (this.options.wrapAround || e) && (t = s.modulo(t, this.slides.length)),
          this.slides[t] &&
            ((this.selectedIndex = t),
            this.updateSelectedSlide(),
            i ? this.positionSliderAtSelected() : this.startAnimation(),
            this.options.adaptiveHeight && this.setGallerySize(),
            this.dispatchEvent("select"),
            this.dispatchEvent("cellSelect")));
      }),
      (v._wrapSelect = function(t) {
        var e = this.slides.length;
        if (!(this.options.wrapAround && e > 1)) return t;
        var i = s.modulo(t, e),
          n = Math.abs(i - this.selectedIndex),
          o = Math.abs(i + e - this.selectedIndex),
          r = Math.abs(i - e - this.selectedIndex);
        !this.isDragSelect && o < n ? (t += e) : !this.isDragSelect && r < n && (t -= e),
          t < 0 ? (this.x -= this.slideableWidth) : t >= e && (this.x += this.slideableWidth);
      }),
      (v.previous = function(t, e) {
        this.select(this.selectedIndex - 1, t, e);
      }),
      (v.next = function(t, e) {
        this.select(this.selectedIndex + 1, t, e);
      }),
      (v.updateSelectedSlide = function() {
        var t = this.slides[this.selectedIndex];
        t &&
          (this.unselectSelectedSlide(),
          (this.selectedSlide = t),
          t.select(),
          (this.selectedCells = t.cells),
          (this.selectedElements = t.getCellElements()),
          (this.selectedCell = t.cells[0]),
          (this.selectedElement = this.selectedElements[0]));
      }),
      (v.unselectSelectedSlide = function() {
        this.selectedSlide && this.selectedSlide.unselect();
      }),
      (v.selectCell = function(t, e, i) {
        var n;
        "number" == typeof t
          ? (n = this.cells[t])
          : ("string" == typeof t && (t = this.element.querySelector(t)), (n = this.getCell(t)));
        for (var s = 0; n && s < this.slides.length; s++) {
          if (-1 != this.slides[s].cells.indexOf(n)) return void this.select(s, e, i);
        }
      }),
      (v.getCell = function(t) {
        for (var e = 0; e < this.cells.length; e++) {
          var i = this.cells[e];
          if (i.element == t) return i;
        }
      }),
      (v.getCells = function(t) {
        t = s.makeArray(t);
        var e = [];
        return (
          t.forEach(function(t) {
            var i = this.getCell(t);
            i && e.push(i);
          }, this),
          e
        );
      }),
      (v.getCellElements = function() {
        return this.cells.map(function(t) {
          return t.element;
        });
      }),
      (v.getParentCell = function(t) {
        var e = this.getCell(t);
        return e || ((t = s.getParent(t, ".flickity-slider > *")), this.getCell(t));
      }),
      (v.getAdjacentCellElements = function(t, e) {
        if (!t) return this.selectedSlide.getCellElements();
        e = void 0 === e ? this.selectedIndex : e;
        var i = this.slides.length;
        if (1 + 2 * t >= i) return this.getCellElements();
        for (var n = [], o = e - t; o <= e + t; o++) {
          var r = this.options.wrapAround ? s.modulo(o, i) : o,
            a = this.slides[r];
          a && (n = n.concat(a.getCellElements()));
        }
        return n;
      }),
      (v.uiChange = function() {
        this.emitEvent("uiChange");
      }),
      (v.childUIPointerDown = function(t) {
        this.emitEvent("childUIPointerDown", [t]);
      }),
      (v.onresize = function() {
        this.watchCSS(), this.resize();
      }),
      s.debounceMethod(h, "onresize", 150),
      (v.resize = function() {
        if (this.isActive) {
          this.getSize(),
            this.options.wrapAround && (this.x = s.modulo(this.x, this.slideableWidth)),
            this.positionCells(),
            this._getWrapShiftCells(),
            this.setGallerySize(),
            this.emitEvent("resize");
          var t = this.selectedElements && this.selectedElements[0];
          this.selectCell(t, !1, !0);
        }
      }),
      (v.watchCSS = function() {
        this.options.watchCSS &&
          (-1 != d(this.element, ":after").content.indexOf("flickity") ? this.activate() : this.deactivate());
      }),
      (v.onkeydown = function(t) {
        if (this.options.accessibility && (!document.activeElement || document.activeElement == this.element))
          if (37 == t.keyCode) {
            var e = this.options.rightToLeft ? "next" : "previous";
            this.uiChange(), this[e]();
          } else if (39 == t.keyCode) {
            var i = this.options.rightToLeft ? "previous" : "next";
            this.uiChange(), this[i]();
          }
      }),
      (v.deactivate = function() {
        this.isActive &&
          (this.element.classList.remove("flickity-enabled"),
          this.element.classList.remove("flickity-rtl"),
          this.cells.forEach(function(t) {
            t.destroy();
          }),
          this.unselectSelectedSlide(),
          this.element.removeChild(this.viewport),
          l(this.slider.children, this.element),
          this.options.accessibility &&
            (this.element.removeAttribute("tabIndex"), this.element.removeEventListener("keydown", this)),
          (this.isActive = !1),
          this.emitEvent("deactivate"));
      }),
      (v.destroy = function() {
        this.deactivate(),
          e.removeEventListener("resize", this),
          this.emitEvent("destroy"),
          c && this.$element && c.removeData(this.element, "flickity"),
          delete this.element.flickityGUID,
          delete p[this.guid];
      }),
      s.extend(v, a),
      (h.data = function(t) {
        t = s.getQueryElement(t);
        var e = t && t.flickityGUID;
        return e && p[e];
      }),
      s.htmlInit(h, "flickity"),
      c && c.bridget && c.bridget("flickity", h),
      (h.Cell = o),
      h
    );
  }),
  (function(t, e) {
    "function" == typeof define && define.amd
      ? define("unipointer/unipointer", ["ev-emitter/ev-emitter"], function(i) {
          return e(t, i);
        })
      : "object" == typeof module && module.exports
        ? (module.exports = e(t, require("ev-emitter")))
        : (t.Unipointer = e(t, t.EvEmitter));
  })(window, function t(e, i) {
    function n() {}
    function s() {}
    var o = (s.prototype = Object.create(i.prototype));
    (o.bindStartEvent = function(t) {
      this._bindStartEvent(t, !0);
    }),
      (o.unbindStartEvent = function(t) {
        this._bindStartEvent(t, !1);
      }),
      (o._bindStartEvent = function(t, i) {
        i = void 0 === i || !!i;
        var n = i ? "addEventListener" : "removeEventListener";
        e.navigator.pointerEnabled
          ? t[n]("pointerdown", this)
          : e.navigator.msPointerEnabled
            ? t[n]("MSPointerDown", this)
            : (t[n]("mousedown", this), t[n]("touchstart", this));
      }),
      (o.handleEvent = function(t) {
        var e = "on" + t.type;
        this[e] && this[e](t);
      }),
      (o.getTouch = function(t) {
        for (var e = 0; e < t.length; e++) {
          var i = t[e];
          if (i.identifier == this.pointerIdentifier) return i;
        }
      }),
      (o.onmousedown = function(t) {
        var e = t.button;
        (e && 0 !== e && 1 !== e) || this._pointerDown(t, t);
      }),
      (o.ontouchstart = function(t) {
        this._pointerDown(t, t.changedTouches[0]);
      }),
      (o.onMSPointerDown = o.onpointerdown = function(t) {
        this._pointerDown(t, t);
      }),
      (o._pointerDown = function(t, e) {
        this.isPointerDown ||
          ((this.isPointerDown = !0),
          (this.pointerIdentifier = void 0 !== e.pointerId ? e.pointerId : e.identifier),
          this.pointerDown(t, e));
      }),
      (o.pointerDown = function(t, e) {
        this._bindPostStartEvents(t), this.emitEvent("pointerDown", [t, e]);
      });
    var r = {
      mousedown: ["mousemove", "mouseup"],
      touchstart: ["touchmove", "touchend", "touchcancel"],
      pointerdown: ["pointermove", "pointerup", "pointercancel"],
      MSPointerDown: ["MSPointerMove", "MSPointerUp", "MSPointerCancel"]
    };
    return (
      (o._bindPostStartEvents = function(t) {
        if (t) {
          var i = r[t.type];
          i.forEach(function(t) {
            e.addEventListener(t, this);
          }, this),
            (this._boundPointerEvents = i);
        }
      }),
      (o._unbindPostStartEvents = function() {
        this._boundPointerEvents &&
          (this._boundPointerEvents.forEach(function(t) {
            e.removeEventListener(t, this);
          }, this),
          delete this._boundPointerEvents);
      }),
      (o.onmousemove = function(t) {
        this._pointerMove(t, t);
      }),
      (o.onMSPointerMove = o.onpointermove = function(t) {
        t.pointerId == this.pointerIdentifier && this._pointerMove(t, t);
      }),
      (o.ontouchmove = function(t) {
        var e = this.getTouch(t.changedTouches);
        e && this._pointerMove(t, e);
      }),
      (o._pointerMove = function(t, e) {
        this.pointerMove(t, e);
      }),
      (o.pointerMove = function(t, e) {
        this.emitEvent("pointerMove", [t, e]);
      }),
      (o.onmouseup = function(t) {
        this._pointerUp(t, t);
      }),
      (o.onMSPointerUp = o.onpointerup = function(t) {
        t.pointerId == this.pointerIdentifier && this._pointerUp(t, t);
      }),
      (o.ontouchend = function(t) {
        var e = this.getTouch(t.changedTouches);
        e && this._pointerUp(t, e);
      }),
      (o._pointerUp = function(t, e) {
        this._pointerDone(), this.pointerUp(t, e);
      }),
      (o.pointerUp = function(t, e) {
        this.emitEvent("pointerUp", [t, e]);
      }),
      (o._pointerDone = function() {
        (this.isPointerDown = !1), delete this.pointerIdentifier, this._unbindPostStartEvents(), this.pointerDone();
      }),
      (o.pointerDone = n),
      (o.onMSPointerCancel = o.onpointercancel = function(t) {
        t.pointerId == this.pointerIdentifier && this._pointerCancel(t, t);
      }),
      (o.ontouchcancel = function(t) {
        var e = this.getTouch(t.changedTouches);
        e && this._pointerCancel(t, e);
      }),
      (o._pointerCancel = function(t, e) {
        this._pointerDone(), this.pointerCancel(t, e);
      }),
      (o.pointerCancel = function(t, e) {
        this.emitEvent("pointerCancel", [t, e]);
      }),
      (s.getPointerPoint = function(t) {
        return { x: t.pageX, y: t.pageY };
      }),
      s
    );
  }),
  (function(t, e) {
    "function" == typeof define && define.amd
      ? define("unidragger/unidragger", ["unipointer/unipointer"], function(i) {
          return e(t, i);
        })
      : "object" == typeof module && module.exports
        ? (module.exports = e(t, require("unipointer")))
        : (t.Unidragger = e(t, t.Unipointer));
  })(window, function t(e, i) {
    function n() {}
    function s() {}
    var o = (s.prototype = Object.create(i.prototype));
    (o.bindHandles = function() {
      this._bindHandles(!0);
    }),
      (o.unbindHandles = function() {
        this._bindHandles(!1);
      });
    var r = e.navigator;
    return (
      (o._bindHandles = function(t) {
        t = void 0 === t || !!t;
        var e;
        e = r.pointerEnabled
          ? function(e) {
              e.style.touchAction = t ? "none" : "";
            }
          : r.msPointerEnabled
            ? function(e) {
                e.style.msTouchAction = t ? "none" : "";
              }
            : n;
        for (var i = t ? "addEventListener" : "removeEventListener", s = 0; s < this.handles.length; s++) {
          var o = this.handles[s];
          this._bindStartEvent(o, t), e(o), o[i]("click", this);
        }
      }),
      (o.pointerDown = function(t, e) {
        if ("INPUT" == t.target.nodeName && "range" == t.target.type)
          return (this.isPointerDown = !1), void delete this.pointerIdentifier;
        this._dragPointerDown(t, e);
        var i = document.activeElement;
        i && i.blur && i.blur(), this._bindPostStartEvents(t), this.emitEvent("pointerDown", [t, e]);
      }),
      (o._dragPointerDown = function(t, e) {
        (this.pointerDownPoint = i.getPointerPoint(e)), this.canPreventDefaultOnPointerDown(t, e) && t.preventDefault();
      }),
      (o.canPreventDefaultOnPointerDown = function(t) {
        return "SELECT" != t.target.nodeName;
      }),
      (o.pointerMove = function(t, e) {
        var i = this._dragPointerMove(t, e);
        this.emitEvent("pointerMove", [t, e, i]), this._dragMove(t, e, i);
      }),
      (o._dragPointerMove = function(t, e) {
        var n = i.getPointerPoint(e),
          s = { x: n.x - this.pointerDownPoint.x, y: n.y - this.pointerDownPoint.y };
        return !this.isDragging && this.hasDragStarted(s) && this._dragStart(t, e), s;
      }),
      (o.hasDragStarted = function(t) {
        return Math.abs(t.x) > 3 || Math.abs(t.y) > 3;
      }),
      (o.pointerUp = function(t, e) {
        this.emitEvent("pointerUp", [t, e]), this._dragPointerUp(t, e);
      }),
      (o._dragPointerUp = function(t, e) {
        this.isDragging ? this._dragEnd(t, e) : this._staticClick(t, e);
      }),
      (o._dragStart = function(t, e) {
        (this.isDragging = !0),
          (this.dragStartPoint = i.getPointerPoint(e)),
          (this.isPreventingClicks = !0),
          this.dragStart(t, e);
      }),
      (o.dragStart = function(t, e) {
        this.emitEvent("dragStart", [t, e]);
      }),
      (o._dragMove = function(t, e, i) {
        this.isDragging && this.dragMove(t, e, i);
      }),
      (o.dragMove = function(t, e, i) {
        t.preventDefault(), this.emitEvent("dragMove", [t, e, i]);
      }),
      (o._dragEnd = function(t, e) {
        (this.isDragging = !1),
          setTimeout(
            function() {
              delete this.isPreventingClicks;
            }.bind(this)
          ),
          this.dragEnd(t, e);
      }),
      (o.dragEnd = function(t, e) {
        this.emitEvent("dragEnd", [t, e]);
      }),
      (o.onclick = function(t) {
        this.isPreventingClicks && t.preventDefault();
      }),
      (o._staticClick = function(t, e) {
        if (!this.isIgnoringMouseUp || "mouseup" != t.type) {
          var i = t.target.nodeName;
          ("INPUT" != i && "TEXTAREA" != i) || t.target.focus(),
            this.staticClick(t, e),
            "mouseup" != t.type &&
              ((this.isIgnoringMouseUp = !0),
              setTimeout(
                function() {
                  delete this.isIgnoringMouseUp;
                }.bind(this),
                400
              ));
        }
      }),
      (o.staticClick = function(t, e) {
        this.emitEvent("staticClick", [t, e]);
      }),
      (s.getPointerPoint = i.getPointerPoint),
      s
    );
  }),
  (function(t, e) {
    "function" == typeof define && define.amd
      ? define("flickity/js/drag", ["./flickity", "unidragger/unidragger", "fizzy-ui-utils/utils"], function(i, n, s) {
          return e(t, i, n, s);
        })
      : "object" == typeof module && module.exports
        ? (module.exports = e(t, require("./flickity"), require("unidragger"), require("fizzy-ui-utils")))
        : (t.Flickity = e(t, t.Flickity, t.Unidragger, t.fizzyUIUtils));
  })(window, function t(e, i, n, s) {
    function o() {
      return { x: e.pageXOffset, y: e.pageYOffset };
    }
    s.extend(i.defaults, { draggable: !0, dragThreshold: 3 }), i.createMethods.push("_createDrag");
    var r = i.prototype;
    s.extend(r, n.prototype);
    var a = "createTouch" in document,
      l = !1;
    (r._createDrag = function() {
      this.on("activate", this.bindDrag),
        this.on("uiChange", this._uiChangeDrag),
        this.on("childUIPointerDown", this._childUIPointerDownDrag),
        this.on("deactivate", this.unbindDrag),
        a && !l && (e.addEventListener("touchmove", function() {}), (l = !0));
    }),
      (r.bindDrag = function() {
        this.options.draggable &&
          !this.isDragBound &&
          (this.element.classList.add("is-draggable"),
          (this.handles = [this.viewport]),
          this.bindHandles(),
          (this.isDragBound = !0));
      }),
      (r.unbindDrag = function() {
        this.isDragBound &&
          (this.element.classList.remove("is-draggable"), this.unbindHandles(), delete this.isDragBound);
      }),
      (r._uiChangeDrag = function() {
        delete this.isFreeScrolling;
      }),
      (r._childUIPointerDownDrag = function(t) {
        t.preventDefault(), this.pointerDownFocus(t);
      });
    var h = { TEXTAREA: !0, INPUT: !0, OPTION: !0 },
      c = { radio: !0, checkbox: !0, button: !0, submit: !0, image: !0, file: !0 };
    r.pointerDown = function(t, i) {
      if (h[t.target.nodeName] && !c[t.target.type])
        return (this.isPointerDown = !1), void delete this.pointerIdentifier;
      this._dragPointerDown(t, i);
      var n = document.activeElement;
      n && n.blur && n != this.element && n != document.body && n.blur(),
        this.pointerDownFocus(t),
        (this.dragX = this.x),
        this.viewport.classList.add("is-pointer-down"),
        this._bindPostStartEvents(t),
        (this.pointerDownScroll = o()),
        e.addEventListener("scroll", this),
        this.dispatchEvent("pointerDown", t, [i]);
    };
    var d = { touchstart: !0, MSPointerDown: !0 },
      u = { INPUT: !0, SELECT: !0 };
    return (
      (r.pointerDownFocus = function(t) {
        if (this.options.accessibility && !d[t.type] && !u[t.target.nodeName]) {
          var i = e.pageYOffset;
          this.element.focus(), e.pageYOffset != i && e.scrollTo(e.pageXOffset, i);
        }
      }),
      (r.canPreventDefaultOnPointerDown = function(t) {
        var e = "touchstart" == t.type,
          i = t.target.nodeName;
        return !e && "SELECT" != i;
      }),
      (r.hasDragStarted = function(t) {
        return Math.abs(t.x) > this.options.dragThreshold;
      }),
      (r.pointerUp = function(t, e) {
        delete this.isTouchScrolling,
          this.viewport.classList.remove("is-pointer-down"),
          this.dispatchEvent("pointerUp", t, [e]),
          this._dragPointerUp(t, e);
      }),
      (r.pointerDone = function() {
        e.removeEventListener("scroll", this), delete this.pointerDownScroll;
      }),
      (r.dragStart = function(t, i) {
        (this.dragStartPosition = this.x),
          this.startAnimation(),
          e.removeEventListener("scroll", this),
          this.dispatchEvent("dragStart", t, [i]);
      }),
      (r.pointerMove = function(t, e) {
        var i = this._dragPointerMove(t, e);
        this.dispatchEvent("pointerMove", t, [e, i]), this._dragMove(t, e, i);
      }),
      (r.dragMove = function(t, e, i) {
        t.preventDefault(), (this.previousDragX = this.dragX);
        var n = this.options.rightToLeft ? -1 : 1,
          s = this.dragStartPosition + i.x * n;
        if (!this.options.wrapAround && this.slides.length) {
          var o = Math.max(-this.slides[0].target, this.dragStartPosition);
          s = s > o ? 0.5 * (s + o) : s;
          var r = Math.min(-this.getLastSlide().target, this.dragStartPosition);
          s = s < r ? 0.5 * (s + r) : s;
        }
        (this.dragX = s), (this.dragMoveTime = new Date()), this.dispatchEvent("dragMove", t, [e, i]);
      }),
      (r.dragEnd = function(t, e) {
        this.options.freeScroll && (this.isFreeScrolling = !0);
        var i = this.dragEndRestingSelect();
        if (this.options.freeScroll && !this.options.wrapAround) {
          var n = this.getRestingPosition();
          this.isFreeScrolling = -n > this.slides[0].target && -n < this.getLastSlide().target;
        } else this.options.freeScroll || i != this.selectedIndex || (i += this.dragEndBoostSelect());
        delete this.previousDragX,
          (this.isDragSelect = this.options.wrapAround),
          this.select(i),
          delete this.isDragSelect,
          this.dispatchEvent("dragEnd", t, [e]);
      }),
      (r.dragEndRestingSelect = function() {
        var t = this.getRestingPosition(),
          e = Math.abs(this.getSlideDistance(-t, this.selectedIndex)),
          i = this._getClosestResting(t, e, 1),
          n = this._getClosestResting(t, e, -1);
        return i.distance < n.distance ? i.index : n.index;
      }),
      (r._getClosestResting = function(t, e, i) {
        for (
          var n = this.selectedIndex,
            s = 1 / 0,
            o =
              this.options.contain && !this.options.wrapAround
                ? function(t, e) {
                    return t <= e;
                  }
                : function(t, e) {
                    return t < e;
                  };
          o(e, s) && ((n += i), (s = e), null !== (e = this.getSlideDistance(-t, n)));

        )
          e = Math.abs(e);
        return { distance: s, index: n - i };
      }),
      (r.getSlideDistance = function(t, e) {
        var i = this.slides.length,
          n = this.options.wrapAround && i > 1,
          o = n ? s.modulo(e, i) : e,
          r = this.slides[o];
        if (!r) return null;
        var a = n ? this.slideableWidth * Math.floor(e / i) : 0;
        return t - (r.target + a);
      }),
      (r.dragEndBoostSelect = function() {
        if (void 0 === this.previousDragX || !this.dragMoveTime || new Date() - this.dragMoveTime > 100) return 0;
        var t = this.getSlideDistance(-this.dragX, this.selectedIndex),
          e = this.previousDragX - this.dragX;
        return t > 0 && e > 0 ? 1 : t < 0 && e < 0 ? -1 : 0;
      }),
      (r.staticClick = function(t, e) {
        var i = this.getParentCell(t.target),
          n = i && i.element,
          s = i && this.cells.indexOf(i);
        this.dispatchEvent("staticClick", t, [e, n, s]);
      }),
      (r.onscroll = function() {
        var t = o(),
          e = this.pointerDownScroll.x - t.x,
          i = this.pointerDownScroll.y - t.y;
        (Math.abs(e) > 3 || Math.abs(i) > 3) && this._pointerDone();
      }),
      i
    );
  }),
  (function(t, e) {
    "function" == typeof define && define.amd
      ? define("tap-listener/tap-listener", ["unipointer/unipointer"], function(i) {
          return e(t, i);
        })
      : "object" == typeof module && module.exports
        ? (module.exports = e(t, require("unipointer")))
        : (t.TapListener = e(t, t.Unipointer));
  })(window, function t(e, i) {
    function n(t) {
      this.bindTap(t);
    }
    var s = (n.prototype = Object.create(i.prototype));
    return (
      (s.bindTap = function(t) {
        t && (this.unbindTap(), (this.tapElement = t), this._bindStartEvent(t, !0));
      }),
      (s.unbindTap = function() {
        this.tapElement && (this._bindStartEvent(this.tapElement, !0), delete this.tapElement);
      }),
      (s.pointerUp = function(t, n) {
        if (!this.isIgnoringMouseUp || "mouseup" != t.type) {
          var s = i.getPointerPoint(n),
            o = this.tapElement.getBoundingClientRect(),
            r = e.pageXOffset,
            a = e.pageYOffset;
          if (
            (s.x >= o.left + r &&
              s.x <= o.right + r &&
              s.y >= o.top + a &&
              s.y <= o.bottom + a &&
              this.emitEvent("tap", [t, n]),
            "mouseup" != t.type)
          ) {
            this.isIgnoringMouseUp = !0;
            var l = this;
            setTimeout(function() {
              delete l.isIgnoringMouseUp;
            }, 400);
          }
        }
      }),
      (s.destroy = function() {
        this.pointerDone(), this.unbindTap();
      }),
      n
    );
  }),
  (function(t, e) {
    "function" == typeof define && define.amd
      ? define(
          "flickity/js/prev-next-button",
          ["./flickity", "tap-listener/tap-listener", "fizzy-ui-utils/utils"],
          function(i, n, s) {
            return e(t, i, n, s);
          }
        )
      : "object" == typeof module && module.exports
        ? (module.exports = e(t, require("./flickity"), require("tap-listener"), require("fizzy-ui-utils")))
        : e(t, t.Flickity, t.TapListener, t.fizzyUIUtils);
  })(window, function t(e, i, n, s) {
    "use strict";
    function o(t, e) {
      (this.direction = t), (this.parent = e), this._create();
    }
    function r(t) {
      return "string" == typeof t
        ? t
        : "M " +
            t.x0 +
            ",50 L " +
            t.x1 +
            "," +
            (t.y1 + 50) +
            " L " +
            t.x2 +
            "," +
            (t.y2 + 50) +
            " L " +
            t.x3 +
            ",50  L " +
            t.x2 +
            "," +
            (50 - t.y2) +
            " L " +
            t.x1 +
            "," +
            (50 - t.y1) +
            " Z";
    }
    var a = "http://www.w3.org/2000/svg";
    (o.prototype = new n()),
      (o.prototype._create = function() {
        (this.isEnabled = !0), (this.isPrevious = -1 == this.direction);
        var t = this.parent.options.rightToLeft ? 1 : -1;
        this.isLeft = this.direction == t;
        var e = (this.element = document.createElement("button"));
        (e.className = "flickity-prev-next-button"),
          (e.className += this.isPrevious ? " previous" : " next"),
          e.setAttribute("type", "button"),
          this.disable(),
          e.setAttribute("aria-label", this.isPrevious ? "previous" : "next");
        var i = this.createSVG();
        e.appendChild(i),
          this.on("tap", this.onTap),
          this.parent.on("select", this.update.bind(this)),
          this.on("pointerDown", this.parent.childUIPointerDown.bind(this.parent));
      }),
      (o.prototype.activate = function() {
        this.bindTap(this.element),
          this.element.addEventListener("click", this),
          this.parent.element.appendChild(this.element);
      }),
      (o.prototype.deactivate = function() {
        this.parent.element.removeChild(this.element),
          n.prototype.destroy.call(this),
          this.element.removeEventListener("click", this);
      }),
      (o.prototype.createSVG = function() {
        var t = document.createElementNS(a, "svg");
        t.setAttribute("viewBox", "0 0 100 100");
        var e = document.createElementNS(a, "path"),
          i = r(this.parent.options.arrowShape);
        return (
          e.setAttribute("d", i),
          e.setAttribute("class", "arrow"),
          this.isLeft || e.setAttribute("transform", "translate(100, 100) rotate(180) "),
          t.appendChild(e),
          t
        );
      }),
      (o.prototype.onTap = function() {
        if (this.isEnabled) {
          this.parent.uiChange();
          var t = this.isPrevious ? "previous" : "next";
          this.parent[t]();
        }
      }),
      (o.prototype.handleEvent = s.handleEvent),
      (o.prototype.onclick = function() {
        var t = document.activeElement;
        t && t == this.element && this.onTap();
      }),
      (o.prototype.enable = function() {
        this.isEnabled || ((this.element.disabled = !1), (this.isEnabled = !0));
      }),
      (o.prototype.disable = function() {
        this.isEnabled && ((this.element.disabled = !0), (this.isEnabled = !1));
      }),
      (o.prototype.update = function() {
        var t = this.parent.slides;
        if (this.parent.options.wrapAround && t.length > 1) return void this.enable();
        var e = t.length ? t.length - 1 : 0,
          i = this.isPrevious ? 0 : e;
        this[this.parent.selectedIndex == i ? "disable" : "enable"]();
      }),
      (o.prototype.destroy = function() {
        this.deactivate();
      }),
      s.extend(i.defaults, { prevNextButtons: !0, arrowShape: { x0: 10, x1: 60, y1: 50, x2: 70, y2: 40, x3: 30 } }),
      i.createMethods.push("_createPrevNextButtons");
    var l = i.prototype;
    return (
      (l._createPrevNextButtons = function() {
        this.options.prevNextButtons &&
          ((this.prevButton = new o(-1, this)),
          (this.nextButton = new o(1, this)),
          this.on("activate", this.activatePrevNextButtons));
      }),
      (l.activatePrevNextButtons = function() {
        this.prevButton.activate(), this.nextButton.activate(), this.on("deactivate", this.deactivatePrevNextButtons);
      }),
      (l.deactivatePrevNextButtons = function() {
        this.prevButton.deactivate(),
          this.nextButton.deactivate(),
          this.off("deactivate", this.deactivatePrevNextButtons);
      }),
      (i.PrevNextButton = o),
      i
    );
  }),
  (function(t, e) {
    "function" == typeof define && define.amd
      ? define("flickity/js/page-dots", ["./flickity", "tap-listener/tap-listener", "fizzy-ui-utils/utils"], function(
          i,
          n,
          s
        ) {
          return e(t, i, n, s);
        })
      : "object" == typeof module && module.exports
        ? (module.exports = e(t, require("./flickity"), require("tap-listener"), require("fizzy-ui-utils")))
        : e(t, t.Flickity, t.TapListener, t.fizzyUIUtils);
  })(window, function t(e, i, n, s) {
    function o(t) {
      (this.parent = t), this._create();
    }
    (o.prototype = new n()),
      (o.prototype._create = function() {
        (this.holder = document.createElement("ol")),
          (this.holder.className = "flickity-page-dots"),
          (this.dots = []),
          this.on("tap", this.onTap),
          this.on("pointerDown", this.parent.childUIPointerDown.bind(this.parent));
      }),
      (o.prototype.activate = function() {
        this.setDots(), this.bindTap(this.holder), this.parent.element.appendChild(this.holder);
      }),
      (o.prototype.deactivate = function() {
        this.parent.element.removeChild(this.holder), n.prototype.destroy.call(this);
      }),
      (o.prototype.setDots = function() {
        var t = this.parent.slides.length - this.dots.length;
        t > 0 ? this.addDots(t) : t < 0 && this.removeDots(-t);
      }),
      (o.prototype.addDots = function(t) {
        for (var e = document.createDocumentFragment(), i = []; t; ) {
          var n = document.createElement("li");
          (n.className = "dot"), e.appendChild(n), i.push(n), t--;
        }
        this.holder.appendChild(e), (this.dots = this.dots.concat(i));
      }),
      (o.prototype.removeDots = function(t) {
        this.dots.splice(this.dots.length - t, t).forEach(function(t) {
          this.holder.removeChild(t);
        }, this);
      }),
      (o.prototype.updateSelected = function() {
        this.selectedDot && (this.selectedDot.className = "dot"),
          this.dots.length &&
            ((this.selectedDot = this.dots[this.parent.selectedIndex]),
            (this.selectedDot.className = "dot is-selected"));
      }),
      (o.prototype.onTap = function(t) {
        var e = t.target;
        if ("LI" == e.nodeName) {
          this.parent.uiChange();
          var i = this.dots.indexOf(e);
          this.parent.select(i);
        }
      }),
      (o.prototype.destroy = function() {
        this.deactivate();
      }),
      (i.PageDots = o),
      s.extend(i.defaults, { pageDots: !0 }),
      i.createMethods.push("_createPageDots");
    var r = i.prototype;
    return (
      (r._createPageDots = function() {
        this.options.pageDots &&
          ((this.pageDots = new o(this)),
          this.on("activate", this.activatePageDots),
          this.on("select", this.updateSelectedPageDots),
          this.on("cellChange", this.updatePageDots),
          this.on("resize", this.updatePageDots),
          this.on("deactivate", this.deactivatePageDots));
      }),
      (r.activatePageDots = function() {
        this.pageDots.activate();
      }),
      (r.updateSelectedPageDots = function() {
        this.pageDots.updateSelected();
      }),
      (r.updatePageDots = function() {
        this.pageDots.setDots();
      }),
      (r.deactivatePageDots = function() {
        this.pageDots.deactivate();
      }),
      (i.PageDots = o),
      i
    );
  }),
  (function(t, e) {
    "function" == typeof define && define.amd
      ? define("flickity/js/player", ["ev-emitter/ev-emitter", "fizzy-ui-utils/utils", "./flickity"], function(
          t,
          i,
          n
        ) {
          return e(t, i, n);
        })
      : "object" == typeof module && module.exports
        ? (module.exports = e(require("ev-emitter"), require("fizzy-ui-utils"), require("./flickity")))
        : e(t.EvEmitter, t.fizzyUIUtils, t.Flickity);
  })(window, function t(e, i, n) {
    function s(t) {
      (this.parent = t),
        (this.state = "stopped"),
        r &&
          ((this.onVisibilityChange = function() {
            this.visibilityChange();
          }.bind(this)),
          (this.onVisibilityPlay = function() {
            this.visibilityPlay();
          }.bind(this)));
    }
    var o, r;
    "hidden" in document
      ? ((o = "hidden"), (r = "visibilitychange"))
      : "webkitHidden" in document && ((o = "webkitHidden"), (r = "webkitvisibilitychange")),
      (s.prototype = Object.create(e.prototype)),
      (s.prototype.play = function() {
        if ("playing" != this.state) {
          var t = document[o];
          if (r && t) return void document.addEventListener(r, this.onVisibilityPlay);
          (this.state = "playing"), r && document.addEventListener(r, this.onVisibilityChange), this.tick();
        }
      }),
      (s.prototype.tick = function() {
        if ("playing" == this.state) {
          var t = this.parent.options.autoPlay;
          t = "number" == typeof t ? t : 3e3;
          var e = this;
          this.clear(),
            (this.timeout = setTimeout(function() {
              e.parent.next(!0), e.tick();
            }, t));
        }
      }),
      (s.prototype.stop = function() {
        (this.state = "stopped"), this.clear(), r && document.removeEventListener(r, this.onVisibilityChange);
      }),
      (s.prototype.clear = function() {
        clearTimeout(this.timeout);
      }),
      (s.prototype.pause = function() {
        "playing" == this.state && ((this.state = "paused"), this.clear());
      }),
      (s.prototype.unpause = function() {
        "paused" == this.state && this.play();
      }),
      (s.prototype.visibilityChange = function() {
        this[document[o] ? "pause" : "unpause"]();
      }),
      (s.prototype.visibilityPlay = function() {
        this.play(), document.removeEventListener(r, this.onVisibilityPlay);
      }),
      i.extend(n.defaults, { pauseAutoPlayOnHover: !0 }),
      n.createMethods.push("_createPlayer");
    var a = n.prototype;
    return (
      (a._createPlayer = function() {
        (this.player = new s(this)),
          this.on("activate", this.activatePlayer),
          this.on("uiChange", this.stopPlayer),
          this.on("pointerDown", this.stopPlayer),
          this.on("deactivate", this.deactivatePlayer);
      }),
      (a.activatePlayer = function() {
        this.options.autoPlay && (this.player.play(), this.element.addEventListener("mouseenter", this));
      }),
      (a.playPlayer = function() {
        this.player.play();
      }),
      (a.stopPlayer = function() {
        this.player.stop();
      }),
      (a.pausePlayer = function() {
        this.player.pause();
      }),
      (a.unpausePlayer = function() {
        this.player.unpause();
      }),
      (a.deactivatePlayer = function() {
        this.player.stop(), this.element.removeEventListener("mouseenter", this);
      }),
      (a.onmouseenter = function() {
        this.options.pauseAutoPlayOnHover && (this.player.pause(), this.element.addEventListener("mouseleave", this));
      }),
      (a.onmouseleave = function() {
        this.player.unpause(), this.element.removeEventListener("mouseleave", this);
      }),
      (n.Player = s),
      n
    );
  }),
  (function(t, e) {
    "function" == typeof define && define.amd
      ? define("flickity/js/add-remove-cell", ["./flickity", "fizzy-ui-utils/utils"], function(i, n) {
          return e(t, i, n);
        })
      : "object" == typeof module && module.exports
        ? (module.exports = e(t, require("./flickity"), require("fizzy-ui-utils")))
        : e(t, t.Flickity, t.fizzyUIUtils);
  })(window, function t(e, i, n) {
    function s(t) {
      var e = document.createDocumentFragment();
      return (
        t.forEach(function(t) {
          e.appendChild(t.element);
        }),
        e
      );
    }
    var o = i.prototype;
    return (
      (o.insert = function(t, e) {
        var i = this._makeCells(t);
        if (i && i.length) {
          var n = this.cells.length;
          e = void 0 === e ? n : e;
          var o = s(i),
            r = e == n;
          if (r) this.slider.appendChild(o);
          else {
            var a = this.cells[e].element;
            this.slider.insertBefore(o, a);
          }
          if (0 === e) this.cells = i.concat(this.cells);
          else if (r) this.cells = this.cells.concat(i);
          else {
            var l = this.cells.splice(e, n - e);
            this.cells = this.cells.concat(i).concat(l);
          }
          this._sizeCells(i);
          var h = e > this.selectedIndex ? 0 : i.length;
          this._cellAddedRemoved(e, h);
        }
      }),
      (o.append = function(t) {
        this.insert(t, this.cells.length);
      }),
      (o.prepend = function(t) {
        this.insert(t, 0);
      }),
      (o.remove = function(t) {
        var e = this.getCells(t),
          i = 0,
          s = e.length,
          o,
          r;
        for (o = 0; o < s; o++) {
          r = e[o];
          i -= this.cells.indexOf(r) < this.selectedIndex ? 1 : 0;
        }
        for (o = 0; o < s; o++) (r = e[o]), r.remove(), n.removeFrom(this.cells, r);
        e.length && this._cellAddedRemoved(0, i);
      }),
      (o._cellAddedRemoved = function(t, e) {
        (e = e || 0),
          (this.selectedIndex += e),
          (this.selectedIndex = Math.max(0, Math.min(this.slides.length - 1, this.selectedIndex))),
          this.cellChange(t, !0),
          this.emitEvent("cellAddedRemoved", [t, e]);
      }),
      (o.cellSizeChange = function(t) {
        var e = this.getCell(t);
        if (e) {
          e.getSize();
          var i = this.cells.indexOf(e);
          this.cellChange(i);
        }
      }),
      (o.cellChange = function(t, e) {
        var i = this.slideableWidth;
        if (
          (this._positionCells(t),
          this._getWrapShiftCells(),
          this.setGallerySize(),
          this.emitEvent("cellChange", [t]),
          this.options.freeScroll)
        ) {
          var n = i - this.slideableWidth;
          (this.x += n * this.cellAlign), this.positionSlider();
        } else e && this.positionSliderAtSelected(), this.select(this.selectedIndex);
      }),
      i
    );
  }),
  (function(t, e) {
    "function" == typeof define && define.amd
      ? define("flickity/js/lazyload", ["./flickity", "fizzy-ui-utils/utils"], function(i, n) {
          return e(t, i, n);
        })
      : "object" == typeof module && module.exports
        ? (module.exports = e(t, require("./flickity"), require("fizzy-ui-utils")))
        : e(t, t.Flickity, t.fizzyUIUtils);
  })(window, function t(e, i, n) {
    "use strict";
    function s(t) {
      if ("IMG" == t.nodeName && t.getAttribute("data-flickity-lazyload")) return [t];
      var e = t.querySelectorAll("img[data-flickity-lazyload]");
      return n.makeArray(e);
    }
    function o(t, e) {
      (this.img = t), (this.flickity = e), this.load();
    }
    i.createMethods.push("_createLazyload");
    var r = i.prototype;
    return (
      (r._createLazyload = function() {
        this.on("select", this.lazyLoad);
      }),
      (r.lazyLoad = function() {
        var t = this.options.lazyLoad;
        if (t) {
          var e = "number" == typeof t ? t : 0,
            i = this.getAdjacentCellElements(e),
            n = [];
          i.forEach(function(t) {
            var e = s(t);
            n = n.concat(e);
          }),
            n.forEach(function(t) {
              new o(t, this);
            }, this);
        }
      }),
      (o.prototype.handleEvent = n.handleEvent),
      (o.prototype.load = function() {
        this.img.addEventListener("load", this),
          this.img.addEventListener("error", this),
          (this.img.src = this.img.getAttribute("data-flickity-lazyload")),
          this.img.removeAttribute("data-flickity-lazyload");
      }),
      (o.prototype.onload = function(t) {
        this.complete(t, "flickity-lazyloaded");
      }),
      (o.prototype.onerror = function(t) {
        this.complete(t, "flickity-lazyerror");
      }),
      (o.prototype.complete = function(t, e) {
        this.img.removeEventListener("load", this), this.img.removeEventListener("error", this);
        var i = this.flickity.getParentCell(this.img),
          n = i && i.element;
        this.flickity.cellSizeChange(n), this.img.classList.add(e), this.flickity.dispatchEvent("lazyLoad", t, n);
      }),
      (i.LazyLoader = o),
      i
    );
  }),
  (function(t, e) {
    "function" == typeof define && define.amd
      ? define(
          "flickity/js/index",
          ["./flickity", "./drag", "./prev-next-button", "./page-dots", "./player", "./add-remove-cell", "./lazyload"],
          e
        )
      : "object" == typeof module &&
        module.exports &&
        (module.exports = e(
          require("./flickity"),
          require("./drag"),
          require("./prev-next-button"),
          require("./page-dots"),
          require("./player"),
          require("./add-remove-cell"),
          require("./lazyload")
        ));
  })(window, function t(e) {
    return e;
  }),
  (function(t, e) {
    "function" == typeof define && define.amd
      ? define("flickity-as-nav-for/as-nav-for", ["flickity/js/index", "fizzy-ui-utils/utils"], e)
      : "object" == typeof module && module.exports
        ? (module.exports = e(require("flickity"), require("fizzy-ui-utils")))
        : (t.Flickity = e(t.Flickity, t.fizzyUIUtils));
  })(window, function t(e, i) {
    function n(t, e, i) {
      return (e - t) * i + t;
    }
    e.createMethods.push("_createAsNavFor");
    var s = e.prototype;
    return (
      (s._createAsNavFor = function() {
        this.on("activate", this.activateAsNavFor),
          this.on("deactivate", this.deactivateAsNavFor),
          this.on("destroy", this.destroyAsNavFor);
        var t = this.options.asNavFor;
        if (t) {
          var e = this;
          setTimeout(function i() {
            e.setNavCompanion(t);
          });
        }
      }),
      (s.setNavCompanion = function(t) {
        t = i.getQueryElement(t);
        var n = e.data(t);
        if (n && n != this) {
          this.navCompanion = n;
          var s = this;
          (this.onNavCompanionSelect = function() {
            s.navCompanionSelect();
          }),
            n.on("select", this.onNavCompanionSelect),
            this.on("staticClick", this.onNavStaticClick),
            this.navCompanionSelect(!0);
        }
      }),
      (s.navCompanionSelect = function(t) {
        if (this.navCompanion) {
          var e = this.navCompanion.selectedCells[0],
            i = this.navCompanion.cells.indexOf(e),
            s = i + this.navCompanion.selectedCells.length - 1,
            o = Math.floor(n(i, s, this.navCompanion.cellAlign));
          if ((this.selectCell(o, !1, t), this.removeNavSelectedElements(), !(o >= this.cells.length))) {
            var r = this.cells.slice(i, s + 1);
            (this.navSelectedElements = r.map(function(t) {
              return t.element;
            })),
              this.changeNavSelectedClass("add");
          }
        }
      }),
      (s.changeNavSelectedClass = function(t) {
        this.navSelectedElements.forEach(function(e) {
          e.classList[t]("is-nav-selected");
        });
      }),
      (s.activateAsNavFor = function() {
        this.navCompanionSelect(!0);
      }),
      (s.removeNavSelectedElements = function() {
        this.navSelectedElements && (this.changeNavSelectedClass("remove"), delete this.navSelectedElements);
      }),
      (s.onNavStaticClick = function(t, e, i, n) {
        "number" == typeof n && this.navCompanion.selectCell(n);
      }),
      (s.deactivateAsNavFor = function() {
        this.removeNavSelectedElements();
      }),
      (s.destroyAsNavFor = function() {
        this.navCompanion &&
          (this.navCompanion.off("select", this.onNavCompanionSelect),
          this.off("staticClick", this.onNavStaticClick),
          delete this.navCompanion);
      }),
      e
    );
  }),
  (function(t, e) {
    "use strict";
    "function" == typeof define && define.amd
      ? define("imagesloaded/imagesloaded", ["ev-emitter/ev-emitter"], function(i) {
          return e(t, i);
        })
      : "object" == typeof module && module.exports
        ? (module.exports = e(t, require("ev-emitter")))
        : (t.imagesLoaded = e(t, t.EvEmitter));
  })(window, function t(e, i) {
    function n(t, e) {
      for (var i in e) t[i] = e[i];
      return t;
    }
    function s(t) {
      var e = [];
      if (Array.isArray(t)) e = t;
      else if ("number" == typeof t.length) for (var i = 0; i < t.length; i++) e.push(t[i]);
      else e.push(t);
      return e;
    }
    function o(t, e, i) {
      if (!(this instanceof o)) return new o(t, e, i);
      "string" == typeof t && (t = document.querySelectorAll(t)),
        (this.elements = s(t)),
        (this.options = n({}, this.options)),
        "function" == typeof e ? (i = e) : n(this.options, e),
        i && this.on("always", i),
        this.getImages(),
        $ && (this.jqDeferred = new $.Deferred()),
        setTimeout(
          function() {
            this.check();
          }.bind(this)
        );
    }
    function r(t) {
      this.img = t;
    }
    function a(t, e) {
      (this.url = t), (this.element = e), (this.img = new Image());
    }
    var $ = e.jQuery,
      l = e.console;
    (o.prototype = Object.create(i.prototype)),
      (o.prototype.options = {}),
      (o.prototype.getImages = function() {
        (this.images = []), this.elements.forEach(this.addElementImages, this);
      }),
      (o.prototype.addElementImages = function(t) {
        "IMG" == t.nodeName && this.addImage(t), !0 === this.options.background && this.addElementBackgroundImages(t);
        var e = t.nodeType;
        if (e && h[e]) {
          for (var i = t.querySelectorAll("img"), n = 0; n < i.length; n++) {
            var s = i[n];
            this.addImage(s);
          }
          if ("string" == typeof this.options.background) {
            var o = t.querySelectorAll(this.options.background);
            for (n = 0; n < o.length; n++) {
              var r = o[n];
              this.addElementBackgroundImages(r);
            }
          }
        }
      });
    var h = { 1: !0, 9: !0, 11: !0 };
    return (
      (o.prototype.addElementBackgroundImages = function(t) {
        var e = getComputedStyle(t);
        if (e)
          for (var i = /url\((['"])?(.*?)\1\)/gi, n = i.exec(e.backgroundImage); null !== n; ) {
            var s = n && n[2];
            s && this.addBackground(s, t), (n = i.exec(e.backgroundImage));
          }
      }),
      (o.prototype.addImage = function(t) {
        var e = new r(t);
        this.images.push(e);
      }),
      (o.prototype.addBackground = function(t, e) {
        var i = new a(t, e);
        this.images.push(i);
      }),
      (o.prototype.check = function() {
        function t(t, i, n) {
          setTimeout(function() {
            e.progress(t, i, n);
          });
        }
        var e = this;
        if (((this.progressedCount = 0), (this.hasAnyBroken = !1), !this.images.length)) return void this.complete();
        this.images.forEach(function(e) {
          e.once("progress", t), e.check();
        });
      }),
      (o.prototype.progress = function(t, e, i) {
        this.progressedCount++,
          (this.hasAnyBroken = this.hasAnyBroken || !t.isLoaded),
          this.emitEvent("progress", [this, t, e]),
          this.jqDeferred && this.jqDeferred.notify && this.jqDeferred.notify(this, t),
          this.progressedCount == this.images.length && this.complete(),
          this.options.debug && l && l.log("progress: " + i, t, e);
      }),
      (o.prototype.complete = function() {
        var t = this.hasAnyBroken ? "fail" : "done";
        if (((this.isComplete = !0), this.emitEvent(t, [this]), this.emitEvent("always", [this]), this.jqDeferred)) {
          var e = this.hasAnyBroken ? "reject" : "resolve";
          this.jqDeferred[e](this);
        }
      }),
      (r.prototype = Object.create(i.prototype)),
      (r.prototype.check = function() {
        if (this.getIsImageComplete()) return void this.confirm(0 !== this.img.naturalWidth, "naturalWidth");
        (this.proxyImage = new Image()),
          this.proxyImage.addEventListener("load", this),
          this.proxyImage.addEventListener("error", this),
          this.img.addEventListener("load", this),
          this.img.addEventListener("error", this),
          (this.proxyImage.src = this.img.src);
      }),
      (r.prototype.getIsImageComplete = function() {
        return this.img.complete && void 0 !== this.img.naturalWidth;
      }),
      (r.prototype.confirm = function(t, e) {
        (this.isLoaded = t), this.emitEvent("progress", [this, this.img, e]);
      }),
      (r.prototype.handleEvent = function(t) {
        var e = "on" + t.type;
        this[e] && this[e](t);
      }),
      (r.prototype.onload = function() {
        this.confirm(!0, "onload"), this.unbindEvents();
      }),
      (r.prototype.onerror = function() {
        this.confirm(!1, "onerror"), this.unbindEvents();
      }),
      (r.prototype.unbindEvents = function() {
        this.proxyImage.removeEventListener("load", this),
          this.proxyImage.removeEventListener("error", this),
          this.img.removeEventListener("load", this),
          this.img.removeEventListener("error", this);
      }),
      (a.prototype = Object.create(r.prototype)),
      (a.prototype.check = function() {
        this.img.addEventListener("load", this),
          this.img.addEventListener("error", this),
          (this.img.src = this.url),
          this.getIsImageComplete() && (this.confirm(0 !== this.img.naturalWidth, "naturalWidth"), this.unbindEvents());
      }),
      (a.prototype.unbindEvents = function() {
        this.img.removeEventListener("load", this), this.img.removeEventListener("error", this);
      }),
      (a.prototype.confirm = function(t, e) {
        (this.isLoaded = t), this.emitEvent("progress", [this, this.element, e]);
      }),
      (o.makeJQueryPlugin = function(t) {
        (t = t || e.jQuery) &&
          (($ = t),
          ($.fn.imagesLoaded = function(t, e) {
            return new o(this, t, e).jqDeferred.promise($(this));
          }));
      }),
      o.makeJQueryPlugin(),
      o
    );
  }),
  (function(t, e) {
    "function" == typeof define && define.amd
      ? define(["flickity/js/index", "imagesloaded/imagesloaded"], function(i, n) {
          return e(t, i, n);
        })
      : "object" == typeof module && module.exports
        ? (module.exports = e(t, require("flickity"), require("imagesloaded")))
        : (t.Flickity = e(t, t.Flickity, t.imagesLoaded));
  })(window, function t(e, i, n) {
    "use strict";
    i.createMethods.push("_createImagesLoaded");
    var s = i.prototype;
    return (
      (s._createImagesLoaded = function() {
        this.on("activate", this.imagesLoaded);
      }),
      (s.imagesLoaded = function() {
        function t(t, i) {
          var n = e.getParentCell(i.img);
          e.cellSizeChange(n && n.element), e.options.freeScroll || e.positionSliderAtSelected();
        }
        if (this.options.imagesLoaded) {
          var e = this;
          n(this.slider).on("progress", t);
        }
      }),
      i
    );
  });
