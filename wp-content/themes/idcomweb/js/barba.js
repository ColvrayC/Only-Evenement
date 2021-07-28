/**
 * Load Gutenberg's blocks js functions
 */
function getGutenberJS(){
    
    var $idcomfunc = document.querySelectorAll('[data-idcom-js]');
            
    $idcomfunc.forEach(function(element, index){

        if(element.dataset.idcomJs != ''){
                        
            if(typeof element.dataset.idcomJs != 'undefined'){
                                
                window[element.dataset.idcomJs]();
                
            }

        }

    });
            
}

/**
 * Add "self" to a links on Woocommerce pages
 */
function preserveWoo(){
    
    if(jQuery('.woocommerce').length){
                
        jQuery('.woocommerce a').each(function(){

            jQuery(this).attr('data-barba-prevent','self');

        });

    }
    
}

/**
* BARBA JS / pages transitions
*/
function idcom_trackingGtag(path, title, href){

    if(typeof gtag != 'undefined'){

        gtag('config', jQuery('main').attr('data-gtag'), {
            page_path:      path,
            page_title:     title,
            page_location:  href
        });

    }

}

function idcom_leave_animate(){

    var tl = gsap.timeline();

    /* Header transition */
    tl.to('.main-header', {
        duration:           0.25,
        scaleX:             1,
        scaleY:             1,
        translateX:         0,
        translateY:         -100,
//        rotation:           360,
        opacity:            0,
        ease:               'power1.inOut'
    });

    /* Main transition */
    tl.to('.main', {
        duration:           1,
        scaleX:             1,
        scaleY:             1,
        translateX:         0,
        translateY:         0,
//        rotation:           360,
        opacity:            0,
        ease:               'power4.inOut'
    });
    
    /* Footer transition */
    tl.to('footer', {
        duration:           0.25,
        scaleX:             1,
        scaleY:             1,
        translateX:         0,
        translateY:         100,
//         rotation:           360,
        opacity:            0,
        ease:               'power2.inOut'
    });

}

function idcom_enter_animate(){

    var tl = gsap.timeline();

    /* Header transition */
    tl.from('.main-header', {
        duration:           0.5,
        scaleX:             1.5,
        scaleY:             1.5,
        translateX:         0,
        translateY:         -100,
        opacity:            0,
        ease:               'expo.in'
    });

    /* Main transition */
    tl.from('.main', {
        duration:           0.4,
        scaleX:             1.5,
        scaleY:             1.5,
        translateX:         0,
        translateY:         100,
//        rotation:           -180,
        opacity:            0,
        ease:               'expo.inOut'
    });
    
    /* Footer transition */
    tl.from('footer', {
        duration:           0.5,
        scaleX:             1.5,
        scaleY:             1.5,
        translateX:         0,
        translateY:         300,
        rotation:           0,
        opacity:            0,
        ease:               'bounce.in'
    });

}

function idcom_delay($n){

   return new Promise(done => {

       setTimeout(() => {

           done();

       }, $n);

   });

}

/**
 * Transitions in and out
 */

var slideshow, timeout1;

document.addEventListener('readystatechange', function(e){
        
    if(document.readyState === 'complete'){
        
        if(jQuery('#bb-loader').attr('data-transition') == 'page-flip'){
                        
            const uniforms = {
                
            };

            const shader = `
            const float MIN_AMOUNT = -0.16;
const float MAX_AMOUNT = 1.5;
float amount = progress * (MAX_AMOUNT - MIN_AMOUNT) + MIN_AMOUNT;

const float PI = 3.141592653589793;

const float scale = 512.0;
const float sharpness = 3.0;

float cylinderCenter = amount;
// 360 degrees * amount
float cylinderAngle = 2.0 * PI * amount;

const float cylinderRadius = 1.0 / PI / 2.0;

vec3 hitPoint(float hitAngle, float yc, vec3 point, mat3 rrotation)
{
        float hitPoint = hitAngle / (2.0 * PI);
        point.y = hitPoint;
        return rrotation * point;
}

vec4 antiAlias(vec4 color1, vec4 color2, float distanc)
{
        distanc *= scale;
        if (distanc < 0.0) return color2;
        if (distanc > 2.0) return color1;
        float dd = pow(1.0 - distanc / 2.0, sharpness);
        return ((color2 - color1) * dd) + color1;
}

float distanceToEdge(vec3 point)
{
        float dx = abs(point.x > 0.5 ? 1.0 - point.x : point.x);
        float dy = abs(point.y > 0.5 ? 1.0 - point.y : point.y);
        if (point.x < 0.0) dx = -point.x;
        if (point.x > 1.0) dx = point.x - 1.0;
        if (point.y < 0.0) dy = -point.y;
        if (point.y > 1.0) dy = point.y - 1.0;
        if ((point.x < 0.0 || point.x > 1.0) && (point.y < 0.0 || point.y > 1.0)) return sqrt(dx * dx + dy * dy);
        return min(dx, dy);
}

vec4 seeThrough(float yc, vec2 p, mat3 rotation, mat3 rrotation)
{
        float hitAngle = PI - (acos(yc / cylinderRadius) - cylinderAngle);
        vec3 point = hitPoint(hitAngle, yc, rotation * vec3(p, 1.0), rrotation);
        if (yc <= 0.0 && (point.x < 0.0 || point.y < 0.0 || point.x > 1.0 || point.y > 1.0))
        {
            return getToColor(p);
        }

        if (yc > 0.0) return getFromColor(p);

        vec4 color = getFromColor(point.xy);
        vec4 tcolor = vec4(0.0);

        return antiAlias(color, tcolor, distanceToEdge(point));
}

vec4 seeThroughWithShadow(float yc, vec2 p, vec3 point, mat3 rotation, mat3 rrotation)
{
        float shadow = distanceToEdge(point) * 30.0;
        shadow = (1.0 - shadow) / 3.0;

        if (shadow < 0.0) shadow = 0.0; else shadow *= amount;

        vec4 shadowColor = seeThrough(yc, p, rotation, rrotation);
        shadowColor.r -= shadow;
        shadowColor.g -= shadow;
        shadowColor.b -= shadow;

        return shadowColor;
}

vec4 backside(float yc, vec3 point)
{
        vec4 color = getFromColor(point.xy);
        float gray = (color.r + color.b + color.g) / 15.0;
        gray += (8.0 / 10.0) * (pow(1.0 - abs(yc / cylinderRadius), 2.0 / 10.0) / 2.0 + (5.0 / 10.0));
        color.rgb = vec3(gray);
        return color;
}

vec4 behindSurface(vec2 p, float yc, vec3 point, mat3 rrotation)
{
        float shado = (1.0 - ((-cylinderRadius - yc) / amount * 7.0)) / 6.0;
        shado *= 1.0 - abs(point.x - 0.5);

        yc = (-cylinderRadius - cylinderRadius - yc);

        float hitAngle = (acos(yc / cylinderRadius) + cylinderAngle) - PI;
        point = hitPoint(hitAngle, yc, point, rrotation);

        if (yc < 0.0 && point.x >= 0.0 && point.y >= 0.0 && point.x <= 1.0 && point.y <= 1.0 && (hitAngle < PI || amount > 0.5))
        {
                shado = 1.0 - (sqrt(pow(point.x - 0.5, 2.0) + pow(point.y - 0.5, 2.0)) / (71.0 / 100.0));
                shado *= pow(-yc / cylinderRadius, 3.0);
                shado *= 0.5;
        }
        else
        {
                shado = 0.0;
        }
        return vec4(getToColor(p).rgb - shado, 1.0);
}

vec4 transition(vec2 p) {

  const float angle = 100.0 * PI / 180.0;
        float c = cos(-angle);
        float s = sin(-angle);

        mat3 rotation = mat3( c, s, 0,
                                                                -s, c, 0,
                                                                -0.801, 0.8900, 1
                                                                );
        c = cos(angle);
        s = sin(angle);

        mat3 rrotation = mat3(	c, s, 0,
                                                                        -s, c, 0,
                                                                        0.98500, 0.985, 1
                                                                );

        vec3 point = rotation * vec3(p, 1.0);

        float yc = point.y - cylinderCenter;

        if (yc < -cylinderRadius)
        {
                // Behind surface
                return behindSurface(p,yc, point, rrotation);
        }

        if (yc > cylinderRadius)
        {
                // Flat surface
                return getFromColor(p);
        }

        float hitAngle = (acos(yc / cylinderRadius) + cylinderAngle) - PI;

        float hitAngleMod = mod(hitAngle, 2.0 * PI);
        if ((hitAngleMod > PI && amount < 0.5) || (hitAngleMod > PI/2.0 && amount < 0.0))
        {
                return seeThrough(yc, p, rotation, rrotation);
        }

        point = hitPoint(hitAngle, yc, point, rrotation);

        if (point.x < 0.0 || point.y < 0.0 || point.x > 1.0 || point.y > 1.0)
        {
                return seeThroughWithShadow(yc, p, point, rotation, rrotation);
        }

        vec4 color = backside(yc, point);

        vec4 otherColor;
        if (yc < 0.0)
        {
                float shado = 1.0 - (sqrt(pow(point.x - 0.5, 2.0) + pow(point.y - 0.5, 2.0)) / 0.71);
                shado *= pow(-yc / cylinderRadius, 3.0);
                shado *= 0.5;
                otherColor = vec4(0.0, 0.0, 0.0, shado);
        }
        else
        {
                otherColor = getFromColor(p);
        }

        color = antiAlias(color, otherColor, cylinderRadius - abs(yc));

        vec4 cl = seeThroughWithShadow(yc, p, point, rotation, rrotation);
        float dist = distanceToEdge(point);

        return antiAlias(color, cl, dist);
}
            `;
            
            GLSlideshow.addShader('myShader', shader, uniforms);
            
        }else if(jQuery('#bb-loader').attr('data-transition') == 'glitch-memories'){
            
            const uniforms = {
                
            };

            const shader = `
            vec4 transition(vec2 p) {
    vec2 block = floor(p.xy / vec2(16));
    vec2 uv_noise = block / vec2(64);
    uv_noise += floor(vec2(progress) * vec2(1200.0, 3500.0)) / vec2(64);
    vec2 dist = progress > 0.0 ? (fract(uv_noise) - 0.5) * 0.3 *(1.0 -progress) : vec2(0.0);
    vec2 red = p + dist * 0.2;
    vec2 green = p + dist * .3;
    vec2 blue = p + dist * .5;

    return vec4(mix(getFromColor(red), getToColor(red), progress).r,mix(getFromColor(green), getToColor(green), progress).g,mix(getFromColor(blue), getToColor(blue), progress).b,1.0);
}
            `;
            
            GLSlideshow.addShader('myShader', shader, uniforms);
            
        }else if(jQuery('#bb-loader').attr('data-transition') == 'simple-zoom'){
            
            const uniforms = {
                zoom_quickness:     0.8
            };

            const shader = `
            uniform float zoom_quickness;
float nQuick = clamp(zoom_quickness,0.2,1.0);

vec2 zoom(vec2 uv, float amount) {
  return 0.5 + ((uv - 0.5) * (1.0-amount));	
}

vec4 transition (vec2 uv) {
  return mix(
    getFromColor(zoom(uv, smoothstep(0.0, nQuick, progress))),
    getToColor(uv),
   smoothstep(nQuick-0.2, 1.0, progress)
  );
}
            `;
            
            GLSlideshow.addShader('myShader', shader, uniforms);
            
        }else if(jQuery('#bb-loader').attr('data-transition') == 'blur'){
            
            const uniforms = {
                intensity:      0.1
            };

            const shader = `
            uniform float intensity;
const int passes = 6;

vec4 transition(vec2 uv) {
    vec4 c1 = vec4(0.0);
    vec4 c2 = vec4(0.0);

    float disp = intensity*(0.5-distance(0.5, progress));
    for (int xi=0; xi<passes; xi++)
    {
        float x = float(xi) / float(passes) - 0.5;
        for (int yi=0; yi<passes; yi++)
        {
            float y = float(yi) / float(passes) - 0.5;
            vec2 v = vec2(x,y);
            float d = disp;
            c1 += getFromColor( uv + d*v);
            c2 += getToColor( uv + d*v);
        }
    }
    c1 /= float(passes*passes);
    c2 /= float(passes*passes);
    return mix(c1, c2, progress);
}
            `;
            
            GLSlideshow.addShader('myShader', shader, uniforms);
            
        }else if(jQuery('#bb-loader').attr('data-transition') == 'window-slice'){
            
            const uniforms = {
                count:          10.0,
                smoothness:     0.5
            };

            const shader = `
            uniform float count;
uniform float smoothness;

vec4 transition (vec2 p) {
  float pr = smoothstep(-smoothness, 0.0, p.x - progress * (1.0 + smoothness));
  float s = step(pr, fract(count * p.x));
  return mix(getFromColor(p), getToColor(p), s);
}
            `;
            
            GLSlideshow.addShader('myShader', shader, uniforms);
            
        }else if(jQuery('#bb-loader').attr('data-transition') == 'morphing'){
            
            const uniforms = {
                strenght:       0.1
            };

            const shader = `
            uniform float strength;

vec4 transition(vec2 p) {
  vec4 ca = getFromColor(p);
  vec4 cb = getToColor(p);

  vec2 oa = (((ca.rg+ca.b)*0.5)*2.0-1.0);
  vec2 ob = (((cb.rg+cb.b)*0.5)*2.0-1.0);
  vec2 oc = mix(oa,ob,0.5)*strength;

  float w0 = progress;
  float w1 = 1.0-w0;
  return mix(getFromColor(p+oc*w0), getToColor(p-oc*w1), progress);
}
            `;
            
            GLSlideshow.addShader('myShader', shader, uniforms);
            
        }else if(jQuery('#bb-loader').attr('data-transition') == 'wipe-right'){
            
            const uniforms = {
                
            };

            const shader = `
            vec4 transition(vec2 uv) {
    vec2 p=uv.xy/vec2(1.0).xy;
    vec4 a=getFromColor(p);
    vec4 b=getToColor(p);
    return mix(a, b, step(0.0+p.x,progress));
}
            `;
            
            GLSlideshow.addShader('myShader', shader, uniforms);
            
        }else if(jQuery('#bb-loader').attr('data-transition') == 'dreamy'){
            
            const uniforms = {
                
            };

            const shader = `
            vec2 offset(float progress, float x, float theta) {
    float phase = progress*progress + progress + theta;
    float shifty = 0.03*progress*cos(10.0*(progress+x));
    return vec2(0, shifty);
}
vec4 transition(vec2 p) {
    return mix(getFromColor(p + offset(progress, p.x, 0.0)), getToColor(p + offset(1.0-progress, p.x, 3.14)), progress);
}
            `;
            
            GLSlideshow.addShader('myShader', shader, uniforms);
            
        }else if(jQuery('#bb-loader').attr('data-transition') == 'cross-zoom'){
            
            const uniforms = {
                strength:       .4
            };

            const shader = `
            uniform float strength;

const float PI = 3.141592653589793;

float Linear_ease(in float begin, in float change, in float duration, in float time) {
    return change * time / duration + begin;
}

float Exponential_easeInOut(in float begin, in float change, in float duration, in float time) {
    if (time == 0.0)
        return begin;
    else if (time == duration)
        return begin + change;
    time = time / (duration / 2.0);
    if (time < 1.0)
        return change / 2.0 * pow(2.0, 10.0 * (time - 1.0)) + begin;
    return change / 2.0 * (-pow(2.0, -10.0 * (time - 1.0)) + 2.0) + begin;
}

float Sinusoidal_easeInOut(in float begin, in float change, in float duration, in float time) {
    return -change / 2.0 * (cos(PI * time / duration) - 1.0) + begin;
}

float rand (vec2 co) {
  return fract(sin(dot(co.xy ,vec2(12.9898,78.233))) * 43758.5453);
}

vec3 crossFade(in vec2 uv, in float dissolve) {
    return mix(getFromColor(uv).rgb, getToColor(uv).rgb, dissolve);
}

vec4 transition(vec2 uv) {
    vec2 texCoord = uv.xy / vec2(1.0).xy;

    // Linear interpolate center across center half of the image
    vec2 center = vec2(Linear_ease(0.25, 0.5, 1.0, progress), 0.5);
    float dissolve = Exponential_easeInOut(0.0, 1.0, 1.0, progress);

    // Mirrored sinusoidal loop. 0->strength then strength->0
    float strength = Sinusoidal_easeInOut(0.0, strength, 0.5, progress);

    vec3 color = vec3(0.0);
    float total = 0.0;
    vec2 toCenter = center - texCoord;

    /* randomize the lookup values to hide the fixed number of samples */
    float offset = rand(uv);

    for (float t = 0.0; t <= 40.0; t++) {
        float percent = (t + offset) / 40.0;
        float weight = 4.0 * (percent - percent * percent);
        color += crossFade(texCoord + toCenter * percent * strength, dissolve) * weight;
        total += weight;
    }
    return vec4(color / total, 1.0);
}
            `;
            
            GLSlideshow.addShader('myShader', shader, uniforms);
            
        }else if(jQuery('#bb-loader').attr('data-transition') == 'window-blinds'){
            
            const uniforms = {
                
            };

            const shader = `
            vec4 transition (vec2 uv) {
    float t = progress;

    if (mod(floor(uv.y*100.*progress),2.)==0.)
      t*=2.-.5;

    return mix(
      getFromColor(uv),
      getToColor(uv),
      mix(t, progress, smoothstep(0.8, 1.0, progress))
    );
}
            `;
            
            GLSlideshow.addShader('myShader', shader, uniforms);
            
        }else if(jQuery('#bb-loader').attr('data-transition') == 'ripple'){
            
            const uniforms = {
                amplitude:      100,
                speed:          .35
            };

            const shader = `
            uniform float amplitude;
uniform float speed;

vec4 transition (vec2 uv) {
  vec2 dir = uv - vec2(.5);
  float dist = length(dir);
  vec2 offset = dir * (sin(progress * dist * amplitude - progress * speed) + .5) / 30.;
  return mix(
    getFromColor(uv + offset),
    getToColor(uv),
    smoothstep(0.2, 1.0, progress)
  );
}
            `;
            
            GLSlideshow.addShader('myShader', shader, uniforms);
            
        }else if(jQuery('#bb-loader').attr('data-transition') == 'cross-warp'){
            
            const uniforms = {
                
            };

            const shader = `
            vec4 transition(vec2 p) {
    float x = progress;
    x=smoothstep(.0,1.0,(x*2.0+p.x-1.0));
    return mix(getFromColor((p-.5)*(1.-x)+.5), getToColor((p-.5)*x+.5), x);
}
            `;
            
            GLSlideshow.addShader('myShader', shader, uniforms);
            
        }else if(jQuery('#bb-loader').attr('data-transition') == 'grayscale'){
            
            const uniforms = {
                intensity:      0.3
            };

            const shader = `
            uniform float intensity;
vec3 grayscale (vec3 color) {
  return vec3(0.2126*color.r + 0.7152*color.g + 0.0722*color.b);
}

vec4 transition (vec2 uv) {
  vec4 fc = getFromColor(uv);
  vec4 tc = getToColor(uv);
  return mix(
    mix(vec4(grayscale(fc.rgb), 1.0), fc, smoothstep(1.0-intensity, 0.0, progress)),
    mix(vec4(grayscale(tc.rgb), 1.0), tc, smoothstep(    intensity, 1.0, progress)),
    progress);
}
            `;
            
            GLSlideshow.addShader('myShader', shader, uniforms);
            
        }else if(jQuery('#bb-loader').attr('data-transition') == 'texture'){
            
            const uniforms = {
                center: 0.5,
                threshold: 3.0,
                fadeEdge: 0.1
            };

            const shader = `
            uniform vec2 center;
    uniform float threshold;
    uniform float fadeEdge;

    float rand(vec2 co) {
      return fract(sin(dot(co.xy ,vec2(12.9898,78.233))) * 43758.5453);
    }
    vec4 transition(vec2 p) {
      float dist = distance(center, p) / threshold;
      float r = progress - min(rand(vec2(p.y, 0.0)), rand(vec2(0.0, p.x)));
      return mix(getFromColor(p), getToColor(p), mix(0.0, mix(step(dist, r), 1.0, smoothstep(1.0-fadeEdge, 1.0, progress)), smoothstep(0.0, fadeEdge, progress)));    
    }
            `;
            
            GLSlideshow.addShader('myShader', shader, uniforms);
            
        }else if(jQuery('#bb-loader').attr('data-transition') == '3d-cube-rotation'){
            
            const uniforms = {
                persp:          0.7,
                unzoom:         0.3,
                reflection:     0.4,
                floating:       3.0
            };

            const shader = `
            uniform float persp;
uniform float unzoom;
uniform float reflection;
uniform float floating;
vec2 project (vec2 p) {
  return p * vec2(1.0, -1.2) + vec2(0.0, -floating/100.);
}
bool inBounds (vec2 p) {
  return all(lessThan(vec2(0.0), p)) && all(lessThan(p, vec2(1.0)));
}
vec4 bgColor (vec2 p, vec2 pfr, vec2 pto) {
  vec4 c = vec4(0.0, 0.0, 0.0, 1.0);
  pfr = project(pfr);
  if (inBounds(pfr)) {
    c += mix(vec4(0.0), getFromColor(pfr), reflection * mix(1.0, 0.0, pfr.y));
  }
  pto = project(pto);
  if (inBounds(pto)) {
    c += mix(vec4(0.0), getToColor(pto), reflection * mix(1.0, 0.0, pto.y));
  }
  return c;
}
vec2 xskew (vec2 p, float persp, float center) {
  float x = mix(p.x, 1.0-p.x, center);
  return (
    (
      vec2( x, (p.y - 0.5*(1.0-persp) * x) / (1.0+(persp-1.0)*x) )
      - vec2(0.5-distance(center, 0.5), 0.0)
    )
    * vec2(0.5 / distance(center, 0.5) * (center<0.5 ? 1.0 : -1.0), 1.0)
    + vec2(center<0.5 ? 0.0 : 1.0, 0.0)
  );
}
vec4 transition(vec2 op) {
  float uz = unzoom * 2.0*(0.5-distance(0.5, progress));
  vec2 p = -uz*0.5+(1.0+uz) * op;
  vec2 fromP = xskew(
    (p - vec2(progress, 0.0)) / vec2(1.0-progress, 1.0),
    1.0-mix(progress, 0.0, persp),
    0.0
  );
  vec2 toP = xskew(
    p / vec2(progress, 1.0),
    mix(pow(progress, 2.0), 1.0, persp),
    1.0
  );
  if (inBounds(fromP)) {
    return getFromColor(fromP);
  }
  else if (inBounds(toP)) {
    return getToColor(toP);
  }
  return bgColor(op, fromP, toP);
}
            `;
            
            GLSlideshow.addShader('myShader', shader, uniforms);
            
        }
                        
        // GLSlideshow.addShader('myShader', shader, uniforms);
        
        var imageWidth  = 1920;
        var imageHeight = 1080;
        var imageAspect = imageWidth / imageHeight;
        
        slideshow = new GLSlideshow(
            [jQuery('#bb-loader').attr('data-img1'), jQuery('#bb-loader').attr('data-img2')],
            {
                canvas:         document.getElementById('myCanvas'),
                width:          window.innerWidth,
                height:         window.innerHeight,
                imageAspect:    imageAspect,
                duration:       parseInt(jQuery('#bb-loader').attr('data-transition')),
                interval:       parseInt(jQuery('#bb-loader').attr('data-interval')),
                effect:         'myShader'
            }
        );

        window.addEventListener('resize', function (){

            const width     = window.innerWidth;
            
            const height    = window.innerHeight;
            
            slideshow.setSize(width, height);

        });
        
    }
    
});

// var barba;

barba.init({

    debug:      true,
    sync:       false,
    timeout:    5000,

    transitions: [{

        async leave(data){
            
            /* Barba transition */
            clearTimeout(timeout1);
            
            slideshow.pause();
            
            slideshow.to(0);
            
            slideshow.play();
            
            gsap.fromTo('#bb-loader',{autoAlpha:0}, {autoAlpha:1, duration:0.3, onComplete:function(){
                    
                slideshow.play();
                
                timeout1 = setTimeout(function(){
                    
                    gsap.fromTo('#bb-loader',{autoAlpha:1}, {autoAlpha:0, duration:0.3, onComplete:function(){
                        
                        slideshow.to(0);
                        
                    }});
                
                },2400);
                
            }});

            // const done = this.async();
            
            idcom_leave_animate();

            await idcom_delay(2400);

            // done();

        },

        async enter(data){
            
            /**
             * Contact form 7
             */
            if(jQuery('.wpcf7').length){

                document.querySelectorAll('.wpcf7 > form').forEach(function(e){

                    return wpcf7.init(e);

                });

            }
                        
            idcomInit();
                        
            idcom_enter_animate();
            
        },

        async once(data){
                        
            idcomInit();
                                    
            idcom_enter_animate();

        },

    }]

});

barba.hooks.enter(() => {
    
    window.scrollTo(0, 0);
  
});

barba.hooks.afterEnter((data) => {

    (function(){
        
        preserveWoo();

        getGutenberJS(data.next.container.querySelectorAll('[data-idcom-js]'));
                    
    })();

});

barba.hooks.after((data) => {

    idcom_trackingGtag(jQuery('main').attr('data-path'), jQuery('main').attr('data-title'), jQuery('main').attr('data-location'));
    
});