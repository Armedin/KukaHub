
var animationEffects = {};
animationEffects.effects = {
    'zoomIn': {
        animeOpts: {
            duration: function(t,i) {
                return  i*150;
            },
            easing: 'easeOutExpo',
            delay: function(t,i) {
                return 100 + i*100;
            },
            opacity: {
                value: [0,1],
                easing: 'linear'
            },
            scale: [0,1]
        }
    },
    'slideUp': {
        // Sort target elements function.
        animeOpts: {
            duration: function(t,i) {
                return 700 + i*50;
            },
            easing: 'easeOutExpo',
            delay: function(t,i) {
                return i * 100;
            },
            opacity: {
                value: [0,1],
                duration: function(t,i) {
                    return 250 + i*50;
                },
                easing: 'linear'
            },
            translateY: [400,0]
        }
    },
    'slideRight': {
        sortTargetsFn: function(a,b) {
            return b.getBoundingClientRect().left - a.getBoundingClientRect().left;
        },
        animeOpts: {
            duration: 1500,
            easing: [0.1,1,0.3,1],
            delay: function(t,i) {
                return 400+ i * 40;
            },
            opacity: {
                value: [0,1],
                duration: 600,
                easing: 'linear'
            },
            translateX: [1000,0],
        }
    }
};
