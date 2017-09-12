(function() {
    var stickynav = new Headroom(document.querySelector("#stickynav"), {
        tolerance: 5,
        offset : 505,
        classes: {
          initial: "animated",
          pinned: "slideDown",
          unpinned: "slideUp"
        }
    });
    stickynav.init();

}());