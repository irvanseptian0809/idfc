!function(a,b){"function"==typeof define&&define.amd?define([],b):"object"==typeof exports?module.exports=b():b()}(this,function(){function a(a){if(null===p){for(var b=a.length,c=0,d=document.getElementById(f),e="<ul>";b>c;)e+="<li>"+a[c]+"</li>",c++;d.innerHTML=e+"</ul>"}else p(a)}function b(a){return a.replace(/<b[^>]*>(.*?)<\/b>/gi,function(a,b){return b}).replace(/class="(?!(tco-hidden|tco-display|tco-ellipsis))+.*?"|data-query-source=".*?"|dir=".*?"|rel=".*?"/gi,"")}function c(a){a=a.getElementsByTagName("a");for(var b=a.length-1;b>=0;b--)a[b].setAttribute("target","_blank")}function d(a,b){for(var c=[],d=new RegExp("(^| )"+b+"( |$)"),e=a.getElementsByTagName("*"),f=0,g=e.length;g>f;f++)d.test(e[f].className)&&c.push(e[f]);return c}function e(a){return void 0!==a&&0<=a.innerHTML.indexOf("data-srcset")?(a=a.innerHTML.match(/data-srcset="([A-z0-9%_\.-]+)/i)[0],decodeURIComponent(a).split('"')[1]):void 0}var f="",g=20,h=!0,i=[],j=!1,k=!0,l=!0,m=null,n=!0,o=!0,p=null,q=!0,r=!1,s=!0,t=!0,u=!1,v=null,w={fetch:function(a){if(void 0===a.maxTweets&&(a.maxTweets=20),void 0===a.enableLinks&&(a.enableLinks=!0),void 0===a.showUser&&(a.showUser=!0),void 0===a.showTime&&(a.showTime=!0),void 0===a.dateFunction&&(a.dateFunction="default"),void 0===a.showRetweet&&(a.showRetweet=!0),void 0===a.customCallback&&(a.customCallback=null),void 0===a.showInteraction&&(a.showInteraction=!0),void 0===a.showImages&&(a.showImages=!1),void 0===a.linksInNewWindow&&(a.linksInNewWindow=!0),void 0===a.showPermalinks&&(a.showPermalinks=!0),void 0===a.dataOnly&&(a.dataOnly=!1),j)i.push(a);else{j=!0,f=a.domId,g=a.maxTweets,h=a.enableLinks,l=a.showUser,k=a.showTime,o=a.showRetweet,m=a.dateFunction,p=a.customCallback,q=a.showInteraction,r=a.showImages,s=a.linksInNewWindow,t=a.showPermalinks,u=a.dataOnly;var b=document.getElementsByTagName("head")[0];null!==v&&b.removeChild(v),v=document.createElement("script"),v.type="text/javascript",v.src="https://cdn.syndication.twimg.com/widgets/timelines/"+a.id+"?&lang="+(a.lang||"en")+"&callback=twitterFetcher.callback&suppress_response_codes=true&rnd="+Math.random(),b.appendChild(v)}},callback:function(f){function p(a){var b=a.getElementsByTagName("img")[0];return b.src=b.getAttribute("data-src-2x"),a}var v=document.createElement("div");v.innerHTML=f.body,"undefined"==typeof v.getElementsByClassName&&(n=!1),f=[];var x=[],y=[],z=[],A=[],B=[],C=[],D=0;if(n)for(v=v.getElementsByClassName("timeline-Tweet");D<v.length;)0<v[D].getElementsByClassName("timeline-Tweet-retweetCredit").length?A.push(!0):A.push(!1),(!A[D]||A[D]&&o)&&(f.push(v[D].getElementsByClassName("timeline-Tweet-text")[0]),B.push(v[D].getAttribute("data-tweet-id")),x.push(p(v[D].getElementsByClassName("timeline-Tweet-author")[0])),y.push(v[D].getElementsByClassName("dt-updated")[0]),C.push(v[D].getElementsByClassName("timeline-Tweet-timestamp")[0]),void 0!==v[D].getElementsByClassName("timeline-Tweet-media")[0]?z.push(v[D].getElementsByClassName("timeline-Tweet-media")[0]):z.push(void 0)),D++;else for(v=d(v,"timeline-Tweet");D<v.length;)0<d(v[D],"timeline-Tweet-retweetCredit").length?A.push(!0):A.push(!1),(!A[D]||A[D]&&o)&&(f.push(d(v[D],"timeline-Tweet-text")[0]),B.push(v[D].getAttribute("data-tweet-id")),x.push(p(d(v[D],"timeline-Tweet-author")[0])),y.push(d(v[D],"dt-updated")[0]),C.push(d(v[D],"timeline-Tweet-timestamp")[0]),void 0!==d(v[D],"timeline-Tweet-media")[0]?z.push(d(v[D],"timeline-Tweet-media")[0]):z.push(void 0)),D++;f.length>g&&(f.splice(g,f.length-g),x.splice(g,x.length-g),y.splice(g,y.length-g),A.splice(g,A.length-g),z.splice(g,z.length-g),C.splice(g,C.length-g));var v=[],D=f.length,E=0;if(u)for(;D>E;)v.push({tweet:f[E].innerHTML,author:x[E].innerHTML,time:y[E].textContent,image:e(z[E]),rt:A[E],tid:B[E],permalinkURL:void 0===C[E]?"":C[E].href}),E++;else for(;D>E;){if("string"!=typeof m){var A=y[E].getAttribute("datetime"),F=new Date(y[E].getAttribute("datetime").replace(/-/g,"/").replace("T"," ").split("+")[0]),A=m(F,A);if(y[E].setAttribute("aria-label",A),f[E].textContent)if(n)y[E].textContent=A;else{var F=document.createElement("p"),G=document.createTextNode(A);F.appendChild(G),F.setAttribute("aria-label",A),y[E]=F}else y[E].textContent=A}A="",h?(s&&(c(f[E]),l&&c(x[E])),l&&(A+='<div class="user">'+b(x[E].innerHTML)+"</div>"),A+='<p class="tweet">'+b(f[E].innerHTML)+"</p>",k&&(A=t?A+('<p class="timePosted"><a href="'+C[E]+'">'+y[E].getAttribute("aria-label")+"</a></p>"):A+('<p class="timePosted">'+y[E].getAttribute("aria-label")+"</p>"))):(l&&(A+='<p class="user">'+x[E].textContent+"</p>"),A+='<p class="tweet">'+f[E].textContent+"</p>",k&&(A+='<p class="timePosted">'+y[E].textContent+"</p>")),q&&(A+='<p class="interact"><a href="https://twitter.com/intent/tweet?in_reply_to='+B[E]+'" class="twitter_reply_icon"'+(s?' target="_blank">':">")+'Reply</a><a href="https://twitter.com/intent/retweet?tweet_id='+B[E]+'" class="twitter_retweet_icon"'+(s?' target="_blank">':">")+'Retweet</a><a href="https://twitter.com/intent/favorite?tweet_id='+B[E]+'" class="twitter_fav_icon"'+(s?' target="_blank">':">")+"Favorite</a></p>"),r&&void 0!==z[E]&&(A+='<div class="media"><img src="'+e(z[E])+'" alt="Image from tweet" /></div>'),v.push(A),E++}a(v),j=!1,0<i.length&&(w.fetch(i[0]),i.splice(0,1))}};return window.twitterFetcher=w});