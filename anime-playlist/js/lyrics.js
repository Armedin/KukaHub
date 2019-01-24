class Lyrics {
    constructor(e) {
        this.element = e[0],
        this.element.classList.contains("kuka-lyrics--enabled") || (this.element.classList.add("kuka-lyrics"),
        this.mediaElement = this.findMediaElementBefore(this.element),
        this.viewMode = "default",
        this.element.classList.add("kuka-lyrics--" + this.viewMode),
        this.scrollerIntervalDuration = 200, this.scrollerIntervalStep = 10, this.lineElements = [],
        this.setStatus = this.setStatus.bind(this),
        this.synchronize = this.synchronize.bind(this),
        this.scroll = this.scroll.bind(this), this.parseLyrics(),  this.enableLyrics())
    }
    findMediaElementBefore(e) {
        if (!e) return null;
        let t = e.previousElementSibling;
        for (; t;) {
            if ("audio" === t.tagName.toLowerCase() || "video" === t.tagName.toLowerCase()) return t; {
                const e = t.querySelector("audio, video");
                if (e) return e[e.length - 1]
            }
            t = t.previousElementSibling
        }
        return e.parentElement ? this.findMediaElementBefore(e.parentElement) : null
    }
    parseLyrics() {

        if (!this.element) return this;
        let e = this.element.textContent.trim().split("\n");
        this.element.textContent = "";
        let t = 0,
            n = [];
        for (let i = 0; i < e.length; i++) {
            let r = document.createElement("div");
            r.className = "kuka-lyrics__line", this.element.appendChild(r), this.lineElements.push(r);
            let s = e[i].trim(),
                o = s.match(/\[\d+:\d+\.\d+\]/g) || [],
                a = s.match(/^\[\d+:\d+\.\d+\]/g) || [],
                l = s.match(/\[\d+:\d+\.\d+\]$/g) || [];
            o.length && n.length && (n.forEach(function(e) {
                e.dataset.end = this.decodeTimeStamp(o[0])
            }, this), n = []), a.length > 0 ? (r.dataset.start = this.decodeTimeStamp(a[0]), t = this.decodeTimeStamp(a[0])) : r.dataset.start = t, l.length > 0 ? (r.dataset.end = this.decodeTimeStamp(l[0]), t = this.decodeTimeStamp(l[0])) : (r.dataset.end = 1 / 0, n.push(r)), (s = s.replace(/\[\d+:\d+\.\d+\]/g, "")) || (s = "&nbsp;"), r.innerHTML = s
        }
        return this
    }
    enableLyrics() {
        return this.mediaElement ? (this.element.scrollTop = 0, this.mediaElement.ontimeupdate = this.synchronize, this.mediaElement.onplay = this.setStatus, this.mediaElement.onplaying = this.setStatus, this.mediaElement.onpause = this.setStatus, this.mediaElement.onwaiting = this.setStatus, this.mediaElement.onended = this.setStatus, this.element.classList.add("kuka-lyrics--enabled"), this) : this
    }
    setStatus(e) {
        let t;
        switch (e.type) {
            case "play":
            case "playing":
                t = "playing";
                break;
            case "pause":
                t = "paused";
                break;
            case "waiting":
                t = "waiting";
                break;
            case "ended":
                t = "ended"
        }
        this.element.classList.remove("kuka-lyrics--playing", "kuka-lyrics--paused", "kuka-lyrics--waiting", "kuka-lyrics--ended"), t && this.element.classList.add("kuka-lyrics--" + t)
    }
    synchronize() {
      //n[0] is causing troubles --> Being 0 when it should be 85 smh It is nor reading its offset n[0].offsetTop=0
        let e = this.mediaElement.currentTime,
            t = !1,
            n = [];

        if (this.lineElements.forEach(i => {

                e >= i.dataset.start && e <= i.dataset.end ? (i.classList.contains("kuka-lyrics__line--active") || (t = !0, i.classList.add("kuka-lyrics__line--active")), n.push(i)) : i.classList.contains("kuka-lyrics__line--active") && (t = !0, i.classList.remove("kuka-lyrics__line--active"))
            }), t && n.length > 0) {
            //n[0].offsetTop gives 0 ...
            //n[0].offsetTop = n[n.length - 1].offsetTop;
            let e = (n[n.length - 1].offsetTop + n[n.length - 1].offsetTop + n[n.length - 1].offsetHeight) / 2;
            this.scrollTop = e - this.element.clientHeight / 2, clearInterval(this.scrollerInterval), this.scrollerTimer = this.scrollerIntervalDuration, this.scrollerInterval = setInterval(this.scroll, this.scrollerIntervalStep)
        }
    }
    scroll() {

        if (this.scrollerTimer <= 0) return void clearInterval(this.scrollerInterval);
        let e = (this.scrollTop - this.element.scrollTop) * this.scrollerIntervalStep / this.scrollerTimer;
        this.element.scrollTop += e, this.scrollerTimer -= this.scrollerIntervalStep
    }
    decodeTimeStamp(e) {
        if (!e || "string" != typeof e) return 0;
        let t;
        return (t = e.match(/\[(\d+):(\d+):(\d+\.\d+)\]/)) && 4 === t.length ? 60 * parseInt(t[1]) * 60 + 60 * parseInt(t[2]) + parseFloat(t[3]) : (t = e.match(/\[(\d+):(\d+\.\d+)\]/)) && 3 === t.length ? 60 * parseInt(t[1]) + parseFloat(t[2]) : 0
    }

}
