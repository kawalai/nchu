window.addEventListener('scroll', function () {
	console.log(document.documentElement.scrollTop);
});

window.onload = function () {
    lax.init()

    // Add a driver that we use to control our animations
    lax.addDriver('scrollY', function () {
        return window.scrollY
    })

    // Add animation bindings to elements
    lax.addElements('.star', {
        scrollY: {
            translateX: [
                ["elInY + screenHeight/2", "elOutY"],
                [-500, 'screenWidth/2 + 500'],
            ],
            translateY: [
                ["elInY + screenHeight/2", "elOutY"],
                [0, "screenHeight/2"],
            ],
            rotate: [
                ["elInY", "elCenterY", "elOutY"],
                [0, 360, 720]
            ],
            scale: [
                ["elInY + screenHeight", "elInY + screenHeight + 500"],
                [1, 25]
            ],
            opacity: [
                [1780, 2800],
                [1, 0]
            ]
        }
    })
    lax.addElements('.sub-img', {
        scrollY: {
            opacity: [
                [1721, 1737],
                [0, 1]
            ]
        }
    })
}