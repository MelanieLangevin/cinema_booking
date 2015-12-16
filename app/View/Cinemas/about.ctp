<?php
echo __('<p>Name : ');
echo ('Mélanie Langevin');
echo __('<br/> For the course : ');
echo ('420-267 MO Développer un site Web et une application pour Internet. <br/> Automne 2015, Collège Montmorency.');
echo __('<p>Option : <br/>');
echo __('<li>Enable upload Image : <b>Poster</b> for the table <b>Movie</b></li>');
echo __('<li>Dynamic Selectbox : <b>Movie</b> depends of <b>Rating</b> in <b>Showing</b></li>');
echo __('<li>Autocomplete : <b>Studio</b> for Add/Edit for <b>Movie</b></li></p>');
echo __("<p>When you're not activated you can't : </p>");
echo __("<p>For an <b>admin</b> :");
echo __('<li>Add new User</li></p>');
echo __("<p>For an <b>gerant</b> :");
echo __("<li>Add/Edit/Delete Showing</li>");
echo __("<li>Add/Edit/Delete Movies</li>");

echo __('<p><br/>Schema of the database : ');
echo __($this->Html->link('Click here for the original ', 'http://www.databaseanswers.org/data_models/cinema_bookings/index.htm'));
echo('<br/></p>');
echo $this->Html->image('modelbd.gif');
?>

<a name="SvgLogo">
    <svg id="SVG-Circus-47720dea-0a34-9e2c-01b6-abb8198857ae" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid meet">
        <rect id="actor_3" x="34.5" y="34.5" width="31" height="31" opacity="1" fill="rgba(140,143,143,1)" fill-opacity="1" stroke="rgba(140,143,143,1)" stroke-width="18" stroke-opacity="1" stroke-dasharray="4 3"></rect>
        <circle id="actor_2" cx="50" cy="50" r="25" opacity="1" fill="rgba(0,0,0,0)" fill-opacity="1" stroke="rgba(82,82,82,1)" stroke-width="7" stroke-opacity="1" stroke-dasharray="22 30"></circle>
        <circle id="actor_1" cx="50" cy="50" r="12.5" opacity="1" fill="rgba(0,0,0,0)" fill-opacity="1" stroke="rgba(209,209,209,1)" stroke-width="7" stroke-opacity="1" stroke-dasharray="13 13"></circle>
        <text id="actor_4" x="44" y="56.5" font-family="Broadway" font-size="20px" fill="black">3</text>
        <text  x="0" y="20" font-family="Broadway" font-size="15px" fill="black">Cinema-</text>
        <text  x="40" y="90" font-family="Broadway" font-size="15px" fill="black">menic</text>
        <script type="text/ecmascript">
            <![CDATA[(function(){
            var actors={};
            actors.actor_1={node:document.getElementById("SVG-Circus-47720dea-0a34-9e2c-01b6-abb8198857ae").getElementById("actor_1"),type:"circle",cx:50,cy:50,dx:25,dy:22,opacity:1};
            actors.actor_2={node:document.getElementById("SVG-Circus-47720dea-0a34-9e2c-01b6-abb8198857ae").getElementById("actor_2"),type:"circle",cx:50,cy:50,dx:50,dy:22,opacity:1};
            actors.actor_3={node:document.getElementById("SVG-Circus-47720dea-0a34-9e2c-01b6-abb8198857ae").getElementById("actor_3"),type:"square",cx:50,cy:50,dx:31,dy:14,opacity:1};
            actors.actor_4={node:document.getElementById("SVG-Circus-47720dea-0a34-9e2c-01b6-abb8198857ae").getElementById("actor_4"),type:"square",cx:50,cy:50,dx:31,dy:14,opacity:1};

            var tricks={};
            tricks.trick_1=(function(t,a){a=(function(n){return n})(a)%1,a=a*1%1,a=0>a?1+a:a;
            var M=a*1*360*Math.PI/180,i=t._tMatrix,_=Math.cos(M),c=Math.sin(M),x=-Math.sin(M),s=Math.cos(M),h=-t.cx*Math.cos(M)+t.cy*Math.sin(M)+t.cx,n=-t.cx*Math.sin(M)-t.cy*Math.cos(M)+t.cy,r=i[0]*_+i[2]*c,o=i[1]*_+i[3]*c,y=i[0]*x+i[2]*s,f=i[1]*x+i[3]*s,d=i[0]*h+i[2]*n+i[4],e=i[1]*h+i[3]*n+i[5];
            t._tMatrix[0]=r,t._tMatrix[1]=o,t._tMatrix[2]=y,t._tMatrix[3]=f,t._tMatrix[4]=d,t._tMatrix[5]=e});

            tricks.trick_2=(function(t,a){a=(function(n){return n})(a)%1,a=a*1%1,a=0>a?1+a:a;   
            var M=a*-1*360*Math.PI/180,i=t._tMatrix,_=Math.cos(M),c=Math.sin(M),x=-Math.sin(M),s=Math.cos(M),h=-t.cx*Math.cos(M)+t.cy*Math.sin(M)+t.cx,n=-t.cx*Math.sin(M)-t.cy*Math.cos(M)+t.cy,r=i[0]*_+i[2]*c,o=i[1]*_+i[3]*c,y=i[0]*x+i[2]*s,f=i[1]*x+i[3]*s,d=i[0]*h+i[2]*n+i[4],e=i[1]*h+i[3]*n+i[5];
            t._tMatrix[0]=r,t._tMatrix[1]=o,t._tMatrix[2]=y,t._tMatrix[3]=f,t._tMatrix[4]=d,t._tMatrix[5]=e});

            tricks.trick_3=(function(t,i){i=(function(n){return.5>n?2*n*n:-1+(4-2*n)*n})(i)%1,i=0>i?1+i:i; 
            var _=t.node;0.20>=i?_.setAttribute("opacity",i*(t.opacity/0.20)):i>=0.89?_.setAttribute("opacity",t.opacity-(i-0.89)*(t.opacity/(1-0.89))):_.setAttribute("opacity",t.opacity)});

            tricks.trick_4=(function(_,t){t=(function(n){return.5>n?2*n*n:-1+(4-2*n)*n})(t)%1,t=0>t?1+t:t;
            var i;i=0.1>=t?1+(1.2-1)/0.1*t:t>=0.9?1.2-(t-0.9)*((1.2-1)/(1-0.9)):1.2;
            var a=_._tMatrix,r=-_.cx*i+_.cx,x=-_.cy*i+_.cy,c=a[0]*i,n=a[1]*i,M=a[2]*i,f=a[3]*i,g=a[0]*r+a[2]*x+a[4],m=a[1]*r+a[3]*x+a[5];
            _._tMatrix[0]=c,_._tMatrix[1]=n,_._tMatrix[2]=M,_._tMatrix[3]=f,_._tMatrix[4]=g,_._tMatrix[5]=m});

            var scenarios={};
            scenarios.scenario_1={actors: ["actor_1"],tricks: [{trick: "trick_2",start:0,end:1}],startAfter:0,duration:1000,actorDelay:0,repeat:0,repeatDelay:0};
            scenarios.scenario_2={actors: ["actor_2"],tricks: [{trick: "trick_1",start:0,end:1}],startAfter:0,duration:1000,actorDelay:0,repeat:0,repeatDelay:0};
            scenarios.scenario_3={actors: ["actor_3", "actor_4"],tricks: [{trick: "trick_3",start:0,end:1.00},{trick: "trick_4",start:0.00,end:1.00}],startAfter:0,duration:1000,actorDelay:0,repeat:0,repeatDelay:0};

            var _reqAnimFrame=window.requestAnimationFrame||window.mozRequestAnimationFrame||window.webkitRequestAnimationFrame||window.oRequestAnimationFrame,fnTick=function(t){var r,a,i,e,n,o,s,c,m,f,d,k,w;for(c in actors)actors[c]._tMatrix=[1,0,0,1,0,0];for(s in scenarios)for(o=scenarios[s],m=t-o.startAfter,r=0,a=o.actors.length;a>r;r++){if(i=actors[o.actors[r]],i&&i.node&&i._tMatrix)for(f=0,m>=0&&(d=o.duration+o.repeatDelay,o.repeat>0&&m>d*o.repeat&&(f=1),f+=m%d/o.duration),e=0,n=o.tricks.length;n>e;e++)k=o.tricks[e],w=(f-k.start)*(1/(k.end-k.start)),tricks[k.trick]&&tricks[k.trick](i,Math.max(0,Math.min(1,w)));m-=o.actorDelay}for(c in actors)i=actors[c],i&&i.node&&i._tMatrix&&i.node.setAttribute("transform","matrix("+i._tMatrix.join()+")");_reqAnimFrame(fnTick)};_reqAnimFrame(fnTick);})()]]>
        </script>
    </svg>
</a>