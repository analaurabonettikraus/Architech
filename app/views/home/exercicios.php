<style>
  .exercise-page{position:relative;z-index:1;display:flex;flex:1;flex-direction:column;padding:30px 28px 10px;}
  .exercise-heading{display:flex;justify-content:center;margin:0 0 58px;}
  .exercise-heading h1{margin:0;border-radius:22px;padding:11px 38px 12px;background:#022a56;box-shadow:0 10px 0 rgba(0,0,0,.15),0 5px 10px rgba(0,0,0,.24);font-family:'Pixelify Sans',monospace;font-size:29px;font-weight:600;letter-spacing:1px;color:#fff;}
  .exercise-grid{width:100%;max-width:1050px;margin:0 auto;display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:78px 28px;align-items:start;}
  .exercise-card{display:flex;flex-direction:column;align-items:center;gap:12px;text-decoration:none;cursor:pointer;transition:transform .22s ease;}
  .exercise-card:hover{transform:translateY(-7px);}
  .exercise-card__visual{position:relative;width:100%;height:190px;overflow:hidden;border-radius:38px;box-shadow:0 12px 18px rgba(0,0,0,.22),inset 0 1px 0 rgba(255,255,255,.28);}
  .exercise-card__label{font-family:'Urbanist',sans-serif;font-size:23px;font-weight:700;color:#fff;text-shadow:0 3px 4px rgba(0,0,0,.28);text-align:center;}
  .framework-card{background:linear-gradient(135deg,#f9feff,#c2edf8);padding:13px 19px;}
  .framework-card__title{display:flex;justify-content:center;align-items:center;gap:6px;color:#0b51c6;font-family:'Urbanist',sans-serif;font-size:21px;font-weight:800;margin-bottom:11px;}
  .framework-card__title span{font-size:19px;border:2px solid #0b51c6;border-radius:4px;line-height:15px;padding:0 2px;}
  .framework-list{display:grid;grid-template-columns:repeat(4,1fr);gap:12px 10px;}
  .framework{display:flex;flex-direction:column;align-items:center;gap:3px;min-width:0;}
  .framework__logo{width:34px;height:34px;border-radius:50%;background:#fff;display:grid;place-items:center;box-shadow:0 2px 4px rgba(0,0,0,.1);font-family:'Urbanist',sans-serif;font-size:19px;font-weight:800;}
  .framework__name{width:100%;border-radius:6px;padding:2px 1px;background:#022a7b;font-family:'Urbanist',sans-serif;font-size:7px;font-weight:800;color:#fff;text-align:center;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;}
  .bootstrap{color:#7a3ce1;}.tailwind{color:#35bfd3;font-size:24px;}.foundation{color:#71d6d8;}.bulma{color:#11c4a2;}.skeleton{color:#242424;}.uikit{color:#3185df;}.materialize{color:#ef6d89;}.pure{color:#1474ba;}
  .responsive-card{background:#fff;padding:10px;display:flex;align-items:center;justify-content:center;}
  .desktop{position:relative;width:72%;height:137px;border:7px solid #202020;border-radius:9px;background:#edf6f8;box-shadow:inset 0 0 0 3px #ddd;}
  .desktop:before{content:'';position:absolute;left:3px;right:3px;top:3px;height:13px;background:#4f185d;border-radius:2px;box-shadow:0 21px 0 #6ac7ce,0 51px 0 #8ddb3b;}
  .desktop:after{content:'';position:absolute;left:28%;bottom:-21px;width:44%;height:16px;border-radius:0 0 5px 5px;background:#d6d6d6;box-shadow:0 16px 0 -7px #9b9b9b;}
  .responsive-sidebar{position:absolute;top:30px;left:7px;width:17px;height:92px;background:#dce8ea;}
  .responsive-blocks{position:absolute;left:32%;right:8px;top:30px;display:grid;grid-template-columns:repeat(2,1fr);gap:6px;}
  .responsive-blocks i{height:31px;background:#67c8ce;}.responsive-blocks i:nth-child(3),.responsive-blocks i:nth-child(4){background:#91db3b;}
  .phone{position:absolute;right:9%;bottom:-1px;width:57px;height:120px;border:5px solid #242424;border-radius:10px;background:#f4f9fa;box-shadow:0 4px 8px rgba(0,0,0,.36);z-index:3;}
  .phone:before{content:'LOGO';position:absolute;top:13px;left:5px;right:5px;color:#240b39;font:700 7px Arial;text-align:center;border-bottom:5px solid #64216c;padding-bottom:4px;}.phone:after{content:'';position:absolute;left:7px;right:7px;top:35px;height:31px;background:#69cbd0;box-shadow:0 36px 0 #90da3b;}
  .tags-card{display:grid;place-items:center;background:linear-gradient(135deg,#0257ff,#0239f5);}
  .css-mark{display:flex;align-items:center;justify-content:center;gap:3px;transform:rotate(-5deg);font-family:'Urbanist',sans-serif;font-weight:800;}
  .css-mark__shield{width:92px;height:119px;background:#020205;clip-path:polygon(8% 8%,92% 1%,92% 74%,50% 96%,8% 75%);display:grid;place-items:center;color:#1364ff;font-size:37px;}.css-mark__braces{width:66px;height:104px;margin-left:-18px;border:6px solid #040405;border-left:0;border-radius:0 10px 10px 0;display:grid;place-items:center;color:#020205;font-size:49px;line-height:.8;}
  .transition-card{background:#fff;display:flex;align-items:center;justify-content:center;gap:20px;}
  .transition-card i{width:58px;height:58px;border-radius:10px;display:block;box-shadow:8px 7px 0 rgba(24,160,240,.74),16px 14px 0 rgba(24,160,240,.36);}.transition-card i:first-child{background:#18a0f0;}.transition-card i:nth-child(2){background:#fa36a8;transform:rotate(45deg);box-shadow:7px -7px 0 rgba(250,54,168,.45);}.transition-card i:nth-child(3){background:#18bd00;box-shadow:0 0 0 7px rgba(24,189,0,.3);}
  .animation-card{background:#201f20;border:4px solid transparent;border-radius:38px;background-image:linear-gradient(#201f20,#201f20),linear-gradient(100deg,#8f43fb,#f87685,#ffad59);background-origin:border-box;background-clip:padding-box,border-box;padding:18px;}
  .animation-card__headline{font-family:'Urbanist',sans-serif;font-size:30px;line-height:.9;font-weight:800;color:#ff966e;}.animation-card__headline b{color:#fff;}.animation-card__diagram{display:flex;align-items:center;justify-content:space-between;margin-top:30px;color:#fff;font-family:'Urbanist',sans-serif;font-size:9px;}.animation-card__diagram i{width:82px;height:40px;border-radius:8px;background:#7c51bf;box-shadow:inset 0 0 0 2px rgba(255,255,255,.18);}.animation-card__diagram i:last-child{background:linear-gradient(90deg,#8c4aed,#5de8ed);}.animation-card__diagram span{font-size:19px;color:#b9b9b9;}
  .exercise-decoration{position:absolute;pointer-events:none;opacity:.12;z-index:-1;}
  .exercise-decoration--html{right:7%;top:355px;width:76px;transform:rotate(15deg);}.exercise-decoration--js{right:6%;bottom:205px;width:70px;transform:rotate(-12deg);}.exercise-decoration--poly{left:35%;bottom:183px;width:72px;transform:rotate(-18deg);}
  .exercise-bottom-row{grid-column:1/-1;width:min(690px,100%);margin:0 auto;display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:28px;}
  .exercise-types{display:none;flex:1;flex-direction:column;align-items:center;padding:4px 10px 26px;}
  .exercise-types__toolbar{width:100%;max-width:900px;display:grid;grid-template-columns:170px 1fr 170px;align-items:center;margin:0 auto 48px;}
  .exercise-back{justify-self:start;border:0;border-radius:25px;padding:12px 28px;background:#022a56;box-shadow:0 8px 0 rgba(0,0,0,.14),0 4px 9px rgba(0,0,0,.2);color:#fff;font-family:'Urbanist',sans-serif;font-size:22px;font-weight:700;cursor:pointer;transition:transform .2s;}.exercise-back:hover{transform:translateY(-2px);}
  .exercise-types__title{justify-self:center;margin:0;border-radius:22px;padding:12px 42px;background:#022a56;box-shadow:0 10px 0 rgba(0,0,0,.15),0 5px 10px rgba(0,0,0,.24);font-family:'Pixelify Sans',monospace;font-size:27px;font-weight:600;letter-spacing:1px;color:#fff;text-align:center;}
  .type-grid{width:100%;max-width:780px;display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:66px 96px;align-items:center;}
  .type-grid__last{grid-column:1/-1;justify-self:center;width:calc(50% - 48px);}
  .type-card{width:100%;min-height:180px;display:grid;grid-template-columns:46% 54%;border:0;padding:0;border-radius:25px;overflow:hidden;background:#174f80;box-shadow:0 9px 15px rgba(0,0,0,.2);cursor:pointer;transition:transform .22s ease;text-align:left;}.type-card:hover{transform:translateY(-6px);}
  .type-card__illustration{display:grid;place-items:center;background:#d9f0fa;border-radius:25px;box-shadow:8px 0 0 rgba(0,0,0,.06);}.type-card__name{display:grid;place-items:center;padding:18px;color:#fff;font-family:'Urbanist',sans-serif;font-size:22px;font-weight:800;text-align:center;line-height:1.05;}
  .box-numbers{display:grid;grid-template-columns:repeat(3,31px);gap:5px;align-items:end;}.box-numbers i{height:34px;border-radius:4px;background:#12a8f6;color:#fff;display:grid;place-items:center;font:700 20px Arial;font-style:normal;}.box-numbers i:nth-child(2){transform:translateY(-16px);}.box-numbers i:nth-child(2):after{content:'★';position:absolute;top:-20px;color:#ff4b6d;font-size:22px;}.box-numbers i:nth-child(3){grid-column:1;}.box-numbers i:nth-child(4){grid-column:2;}.box-numbers i:nth-child(5){grid-column:3;}
  .quiz-paper{width:105px;height:135px;border:1px solid #9bb1b5;border-radius:8px;background:#fff;padding:19px 15px;box-shadow:7px 7px 0 rgba(0,0,0,.05);}.quiz-paper:before{content:'';display:block;width:77px;height:8px;border-radius:5px;background:#d5e6e9;box-shadow:0 15px 0 #d5e6e9;}.quiz-cells{display:grid;grid-template-columns:repeat(2,1fr);margin-top:21px;border:1px solid #aabec1;}.quiz-cells i{height:30px;border-right:1px solid #aabec1;border-bottom:1px solid #aabec1;display:grid;place-items:center;font-style:normal;font:700 20px Arial;color:#fd546b;}.quiz-cells i:nth-child(2){color:#12a8f6;}.quiz-cells i:nth-child(2):after{content:'✓';}.quiz-cells i:nth-child(2){font-size:0;}.quiz-cells i:nth-child(3):after,.quiz-cells i:nth-child(4):after{content:'×';}
  .flash-stack{position:relative;width:115px;height:118px;}.flash-stack i{position:absolute;width:91px;height:71px;border:1px solid #a5bbc0;border-radius:8px;background:#fff;left:13px;top:25px;}.flash-stack i:first-child{left:1px;top:7px;}.flash-stack i:nth-child(2){left:7px;top:16px;}.flash-stack i:after{content:'';position:absolute;left:15px;right:15px;top:20px;height:8px;border-radius:5px;background:#d5e6e9;box-shadow:0 16px 0 #d5e6e9;}.flash-stack b{position:absolute;right:0;bottom:2px;color:#12a8f6;font:bold 22px Arial;z-index:2;}.flash-stack b:before{content:'×';color:#ff5a71;margin-right:13px;}
  .phrase-card{position:relative;width:124px;height:112px;border:1px solid #c7dce1;border-radius:8px;background:#fff;}.phrase-card:before{content:'thank';position:absolute;top:15px;left:12px;padding:6px 8px;border-radius:5px;background:#18a9f6;color:#fff;font:700 13px Arial;box-shadow:58px 0 0 #ff526d,58px 0 0 1px #ff526d;}.phrase-card:after{content:'you!';position:absolute;right:13px;bottom:19px;color:#6a8a91;font:700 14px Arial;}.phrase-line{position:absolute;left:15px;bottom:24px;width:56px;height:28px;border:1px dashed #40b7df;border-radius:5px;}.phrase-arrow{position:absolute;left:-8px;top:47px;width:29px;height:29px;border:3px solid #28aee2;border-left-color:transparent;border-bottom-color:transparent;border-radius:50%;transform:rotate(80deg);}
  .association{display:flex;gap:11px;padding:11px;border:1px solid #bccfd2;border-radius:5px;background:#fff;}.association i{display:grid;grid-template-rows:repeat(3,25px);gap:7px;padding:8px;border:1px solid #20a8ed;border-radius:3px;}.association i:last-child{border-color:#ff6a85;}.association b{background:#20a8ed;border-radius:3px;display:block;}.association i:last-child b{background:#ff4d70;}
  .quiz-screen{display:none;flex:1;flex-direction:column;width:min(1080px,100%);margin:0 auto 40px;}.quiz-toolbar{display:grid;grid-template-columns:170px 1fr 170px;align-items:center;margin:4px 0 42px;}.quiz-toolbar__title{justify-self:center;margin:0;border-radius:22px;padding:12px 38px;background:#022a56;box-shadow:0 10px 0 rgba(0,0,0,.15),0 5px 10px rgba(0,0,0,.24);font-family:'Pixelify Sans',monospace;font-size:27px;font-weight:600;letter-spacing:1px;color:#fff;text-align:center;}.quiz-game{position:relative;min-height:570px;border-radius:42px;background:linear-gradient(135deg,#0e4e87,#063b75);box-shadow:0 12px 18px rgba(0,0,0,.22),inset 0 1px 0 rgba(255,255,255,.11);padding:20px 38px 30px;overflow:hidden;}.quiz-status{display:grid;grid-template-columns:92px 1fr 92px;align-items:center;gap:16px;color:#94b4ca;font-family:'Urbanist',sans-serif;font-weight:800;}.quiz-time,.quiz-score{font-size:34px;letter-spacing:-1px;}.quiz-score{text-align:right;}.quiz-progress{height:6px;border-radius:999px;background:rgba(217,237,246,.42);overflow:hidden;}.quiz-progress__bar{height:100%;width:0;background:#e2f4fc;transition:width .35s ease;}.quiz-content{min-height:455px;display:flex;flex-direction:column;align-items:center;justify-content:center;padding:30px 0 12px;}.quiz-question{max-width:830px;width:100%;border-radius:19px;background:rgba(1,42,81,.65);padding:24px 28px;color:#dce9f0;font-family:'Urbanist',sans-serif;font-size:28px;font-weight:800;text-align:center;line-height:1.18;}.quiz-options{width:min(760px,100%);display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:32px 140px;margin-top:52px;}.quiz-option{min-height:100px;border:0;border-radius:22px;padding:16px 20px;background:#6297b0;color:#042d58;box-shadow:0 8px 0 rgba(0,0,0,.13),inset 0 1px 0 rgba(255,255,255,.25);font-family:'Urbanist',sans-serif;font-size:23px;font-weight:800;cursor:pointer;transition:transform .18s,background .18s;}.quiz-option:hover:not(:disabled){transform:translateY(-4px);background:#83b4ca;}.quiz-option:disabled{cursor:default;}.quiz-option.is-correct{background:#5fc488;color:#062c20;}.quiz-option.is-wrong{background:#ed7782;color:#510610;}.quiz-feedback{min-height:28px;margin-top:23px;color:#fff;font-family:'Urbanist',sans-serif;font-size:18px;font-weight:800;text-align:center;}.quiz-start,.quiz-result{position:absolute;inset:0;z-index:5;display:flex;flex-direction:column;align-items:center;justify-content:center;padding:30px;text-align:center;background:rgba(4,56,108,.25);backdrop-filter:blur(1px);}.quiz-start__eyebrow,.quiz-result__eyebrow{margin:0 0 8px;color:#fff;font-family:'Urbanist',sans-serif;font-size:34px;font-weight:800;}.quiz-start__topic,.quiz-result__topic{margin:0;color:#fff;font-family:'Urbanist',sans-serif;font-size:52px;font-weight:800;text-shadow:0 5px 3px rgba(0,0,0,.27);}.quiz-start__button,.quiz-result__button{margin-top:20px;border:0;border-radius:22px;padding:14px 46px;background:#022a56;color:#fff;box-shadow:0 8px 0 rgba(0,0,0,.16),0 4px 10px rgba(0,0,0,.24);font-family:'Urbanist',sans-serif;font-size:31px;font-weight:800;cursor:pointer;transition:transform .18s;}.quiz-start__button:hover,.quiz-result__button:hover{transform:translateY(-3px);}.quiz-bottom-hint{position:absolute;bottom:19px;left:32px;color:rgba(223,239,248,.68);font:25px Arial;letter-spacing:3px;}.quiz-sound{position:absolute;right:31px;bottom:20px;color:rgba(223,239,248,.68);font:25px Arial;letter-spacing:5px;}

  .flash-screen{display:none;flex:1;flex-direction:column;width:min(1080px,100%);margin:0 auto 40px;}.flash-toolbar{display:grid;grid-template-columns:170px 1fr 170px;align-items:center;margin:4px 0 42px;}.flash-toolbar__title{justify-self:center;margin:0;border-radius:22px;padding:12px 38px;background:#022a56;box-shadow:0 10px 0 rgba(0,0,0,.15),0 5px 10px rgba(0,0,0,.24);font-family:'Pixelify Sans',monospace;font-size:27px;font-weight:600;letter-spacing:1px;color:#fff;text-align:center;}.flash-game{position:relative;min-height:570px;border-radius:42px;background:linear-gradient(135deg,#0e4e87,#063b75);box-shadow:0 12px 18px rgba(0,0,0,.22),inset 0 1px 0 rgba(255,255,255,.11);padding:20px 38px 30px;overflow:hidden;}.flash-status{display:grid;grid-template-columns:92px 1fr 92px;align-items:center;gap:16px;color:#94b4ca;font-family:'Urbanist',sans-serif;font-weight:800;}.flash-time,.flash-score{font-size:34px;letter-spacing:-1px;}.flash-score{text-align:right;}.flash-progress{height:6px;border-radius:999px;background:rgba(217,237,246,.42);overflow:hidden;}.flash-progress__bar{height:100%;width:0;background:#e2f4fc;transition:width .35s ease;}.flash-content{min-height:465px;display:flex;flex-direction:column;align-items:center;justify-content:center;padding:16px 0 12px;}.flash-scene{width:min(900px,100%);height:360px;perspective:1500px;cursor:pointer;}.flash-card{position:relative;width:100%;height:100%;transform-style:preserve-3d;transition:transform .65s cubic-bezier(.2,.7,.25,1);}.flash-card.is-flipped{transform:rotateY(180deg);}.flash-face{position:absolute;inset:0;display:flex;flex-direction:column;align-items:center;justify-content:center;border-radius:22px;padding:38px 55px;backface-visibility:hidden;background:#083866;box-shadow:0 12px 20px rgba(0,0,0,.2),inset 0 1px 0 rgba(255,255,255,.07);color:#dce9f0;text-align:center;}.flash-face--back{background:linear-gradient(135deg,#0a497f,#0b3868);transform:rotateY(180deg);}.flash-face__tag{margin:0 0 16px;color:#90b4cc;font-family:'Urbanist',sans-serif;font-size:19px;font-weight:800;letter-spacing:.6px;text-transform:uppercase;}.flash-face__text{margin:0;max-width:760px;color:#e3eef3;font-family:'Urbanist',sans-serif;font-size:42px;line-height:1.15;font-weight:800;}.flash-face--back .flash-face__text{font-size:37px;color:#fff;}.flash-face__hint{margin:24px 0 0;color:#91aec0;font-family:'Urbanist',sans-serif;font-size:17px;font-weight:700;}.flash-controls{display:flex;align-items:center;justify-content:center;gap:20px;margin-top:22px;}.flash-turn{border:0;border-radius:22px;padding:13px 46px;background:#6297b0;color:#082e58;box-shadow:0 8px 0 rgba(0,0,0,.13),inset 0 1px 0 rgba(255,255,255,.25);font-family:'Urbanist',sans-serif;font-size:30px;font-weight:800;cursor:pointer;transition:transform .18s,background .18s;}.flash-turn:hover{transform:translateY(-3px);background:#82b3c9;}.flash-next{position:absolute;right:28px;bottom:17px;border:0;background:transparent;color:#fff;font-family:Arial,sans-serif;font-size:54px;font-weight:700;line-height:1;cursor:pointer;transition:transform .18s;}.flash-next:hover{transform:translateX(6px);}.flash-start,.flash-result{position:absolute;inset:0;z-index:6;display:flex;flex-direction:column;align-items:center;justify-content:center;padding:30px;text-align:center;background:rgba(4,56,108,.27);backdrop-filter:blur(1px);}.flash-start__eyebrow,.flash-result__eyebrow{margin:0 0 8px;color:#fff;font-family:'Urbanist',sans-serif;font-size:34px;font-weight:800;}.flash-start__topic,.flash-result__topic{margin:0;color:#fff;font-family:'Urbanist',sans-serif;font-size:52px;font-weight:800;text-shadow:0 5px 3px rgba(0,0,0,.27);}.flash-start__button,.flash-result__button{margin-top:20px;border:0;border-radius:22px;padding:14px 46px;background:#022a56;color:#fff;box-shadow:0 8px 0 rgba(0,0,0,.16),0 4px 10px rgba(0,0,0,.24);font-family:'Urbanist',sans-serif;font-size:31px;font-weight:800;cursor:pointer;transition:transform .18s;}.flash-start__button:hover,.flash-result__button:hover{transform:translateY(-3px);}.flash-bottom-hint{position:absolute;bottom:19px;left:32px;color:rgba(223,239,248,.68);font:25px Arial;letter-spacing:3px;}.flash-sound{position:absolute;right:93px;bottom:20px;color:rgba(223,239,248,.68);font:25px Arial;letter-spacing:5px;}
  .box-screen{display:none;flex:1;flex-direction:column;width:min(1080px,100%);margin:0 auto 40px;}.box-toolbar{display:grid;grid-template-columns:170px 1fr 170px;align-items:center;margin:4px 0 42px;}.box-toolbar__title{justify-self:center;margin:0;border-radius:22px;padding:12px 38px;background:#022a56;box-shadow:0 10px 0 rgba(0,0,0,.15),0 5px 10px rgba(0,0,0,.24);font-family:'Pixelify Sans',monospace;font-size:27px;font-weight:600;letter-spacing:1px;color:#fff;text-align:center;}.box-game{position:relative;min-height:570px;border-radius:42px;background:linear-gradient(135deg,#0e4e87,#063b75);box-shadow:0 12px 18px rgba(0,0,0,.22),inset 0 1px 0 rgba(255,255,255,.11);padding:20px 38px 30px;overflow:hidden;}.box-status{display:grid;grid-template-columns:92px 1fr 92px;align-items:center;gap:16px;color:#94b4ca;font-family:'Urbanist',sans-serif;font-weight:800;}.box-time,.box-score{font-size:34px;letter-spacing:-1px;}.box-score{text-align:right;}.box-progress{height:6px;border-radius:999px;background:rgba(217,237,246,.42);overflow:hidden;}.box-progress__bar{height:100%;width:0;background:#e2f4fc;transition:width .35s ease;}.box-content{min-height:455px;display:flex;align-items:center;justify-content:center;padding:15px 0;}.box-grid-game{width:min(690px,100%);display:grid;grid-template-columns:repeat(3,1fr);justify-items:center;gap:28px 48px;}.number-box{width:154px;height:178px;border:0;border-radius:25px;background:#7197b0;color:#062d58;box-shadow:0 9px 0 rgba(0,0,0,.14),inset 0 1px 0 rgba(255,255,255,.3);font-family:'Urbanist',sans-serif;font-size:62px;font-weight:800;cursor:pointer;transition:transform .2s,filter .2s,background .2s;}.number-box:hover:not(:disabled){transform:translateY(-8px) scale(1.03);filter:brightness(1.13);}.number-box:nth-child(1){box-shadow:0 9px 0 rgba(0,0,0,.14),inset 0 0 0 9px rgba(242,108,130,.32);}.number-box:nth-child(2){box-shadow:0 9px 0 rgba(0,0,0,.14),inset 0 0 0 9px rgba(218,198,92,.32);}.number-box:nth-child(3){box-shadow:0 9px 0 rgba(0,0,0,.14),inset 0 0 0 9px rgba(73,180,121,.32);}.number-box:nth-child(4){grid-column:1/3;justify-self:end;box-shadow:0 9px 0 rgba(0,0,0,.14),inset 0 0 0 9px rgba(83,183,223,.32);}.number-box:nth-child(5){grid-column:2/4;justify-self:start;box-shadow:0 9px 0 rgba(0,0,0,.14),inset 0 0 0 9px rgba(176,112,218,.32);}.number-box.is-open{background:#4c748d;color:#dff0f8;filter:saturate(.4);}.number-box.is-correct{background:#55b47d;color:#062d20;}.number-box.is-wrong{background:#cd6672;color:#510610;}.box-challenge{position:absolute;inset:82px 34px 36px;z-index:4;display:none;align-items:center;justify-content:center;padding:28px;border-radius:28px;background:rgba(2,45,87,.94);box-shadow:0 12px 30px rgba(0,0,0,.28);}.box-challenge__card{width:min(730px,100%);text-align:center;}.box-challenge__eyebrow{margin:0 0 14px;color:#91b6cf;font-family:'Urbanist',sans-serif;font-size:19px;font-weight:800;text-transform:uppercase;letter-spacing:.7px;}.box-challenge__question{margin:0;color:#e3eff4;font-family:'Urbanist',sans-serif;font-size:32px;font-weight:800;line-height:1.16;}.box-challenge__options{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:17px 30px;margin-top:35px;}.box-answer{min-height:72px;border:0;border-radius:17px;padding:12px;background:#6297b0;color:#082e58;box-shadow:0 6px 0 rgba(0,0,0,.13),inset 0 1px 0 rgba(255,255,255,.26);font-family:'Urbanist',sans-serif;font-size:18px;font-weight:800;cursor:pointer;transition:transform .18s,background .18s;}.box-answer:hover:not(:disabled){transform:translateY(-3px);background:#83b4ca;}.box-answer:disabled{cursor:default;}.box-answer.is-correct{background:#5fc488;color:#062c20;}.box-answer.is-wrong{background:#ed7782;color:#510610;}.box-challenge__feedback{min-height:26px;margin:22px 0 0;color:#fff;font-family:'Urbanist',sans-serif;font-size:17px;font-weight:800;}.box-start,.box-result{position:absolute;inset:0;z-index:6;display:flex;flex-direction:column;align-items:center;justify-content:center;padding:30px;text-align:center;background:rgba(4,56,108,.27);backdrop-filter:blur(1px);}.box-start__eyebrow,.box-result__eyebrow{margin:0 0 8px;color:#fff;font-family:'Urbanist',sans-serif;font-size:34px;font-weight:800;}.box-start__topic,.box-result__topic{margin:0;color:#fff;font-family:'Urbanist',sans-serif;font-size:52px;font-weight:800;text-shadow:0 5px 3px rgba(0,0,0,.27);}.box-start__button,.box-result__button{margin-top:20px;border:0;border-radius:22px;padding:14px 46px;background:#022a56;color:#fff;box-shadow:0 8px 0 rgba(0,0,0,.16),0 4px 10px rgba(0,0,0,.24);font-family:'Urbanist',sans-serif;font-size:31px;font-weight:800;cursor:pointer;transition:transform .18s;}.box-start__button:hover,.box-result__button:hover{transform:translateY(-3px);}.box-bottom-hint{position:absolute;bottom:19px;left:32px;color:rgba(223,239,248,.68);font:25px Arial;letter-spacing:3px;}.box-sound{position:absolute;right:31px;bottom:20px;color:rgba(223,239,248,.68);font:25px Arial;letter-spacing:5px;}
  /* As caixas inferiores ocupam as colunas centrais, mantendo o conjunto em perfeito equilíbrio. */
  .box-grid-game{grid-template-columns:repeat(6,minmax(0,1fr));}.number-box:nth-child(1){grid-column:1/span 2;justify-self:center;}.number-box:nth-child(2){grid-column:3/span 2;justify-self:center;}.number-box:nth-child(3){grid-column:5/span 2;justify-self:center;}.number-box:nth-child(4){grid-column:2/span 2;justify-self:center;}.number-box:nth-child(5){grid-column:4/span 2;justify-self:center;}
  .phrase-screen{display:none;flex:1;flex-direction:column;width:min(1080px,100%);margin:0 auto 40px;}.phrase-toolbar{display:grid;grid-template-columns:170px 1fr 170px;align-items:center;margin:4px 0 42px;}.phrase-toolbar__title{justify-self:center;margin:0;border-radius:22px;padding:12px 38px;background:#022a56;box-shadow:0 10px 0 rgba(0,0,0,.15),0 5px 10px rgba(0,0,0,.24);font-family:'Pixelify Sans',monospace;font-size:27px;font-weight:600;letter-spacing:1px;color:#fff;text-align:center;}.phrase-game{position:relative;min-height:570px;border-radius:42px;background:linear-gradient(135deg,#0e4e87,#063b75);box-shadow:0 12px 18px rgba(0,0,0,.22),inset 0 1px 0 rgba(255,255,255,.11);padding:20px 38px 30px;overflow:hidden;}.phrase-status{display:grid;grid-template-columns:92px 1fr 92px;align-items:center;gap:16px;color:#94b4ca;font-family:'Urbanist',sans-serif;font-weight:800;}.phrase-time,.phrase-score{font-size:34px;letter-spacing:-1px;}.phrase-score{text-align:right;}.phrase-progress{height:6px;border-radius:999px;background:rgba(217,237,246,.42);overflow:hidden;}.phrase-progress__bar{height:100%;width:0;background:#e2f4fc;transition:width .35s ease;}.phrase-content{min-height:455px;display:flex;flex-direction:column;align-items:center;justify-content:center;padding:22px 0 15px;text-align:center;}.phrase-content__title{margin:0 0 64px;color:#a2c0d2;font-family:'Urbanist',sans-serif;font-size:36px;font-weight:800;}.phrase-sentence{max-width:920px;margin:0;color:#adc7d5;font-family:'Urbanist',sans-serif;font-size:34px;font-weight:800;line-height:1.55;}.phrase-blank{display:inline-block;min-width:178px;margin:0 8px;padding:0 10px;border-bottom:4px solid #d9eaf0;color:#fff;line-height:1.1;vertical-align:baseline;}.phrase-options{display:flex;justify-content:center;gap:44px;margin-top:62px;}.phrase-option{min-width:215px;min-height:83px;border:0;border-radius:20px;padding:12px 26px;background:#244494;color:#dcebf1;box-shadow:0 8px 0 rgba(0,0,0,.13),inset 0 1px 0 rgba(255,255,255,.17);font-family:'Urbanist',sans-serif;font-size:26px;font-weight:800;cursor:pointer;transition:transform .18s,background .18s;}.phrase-option:first-child{background:#72415c;}.phrase-option:hover:not(:disabled){transform:translateY(-4px);filter:brightness(1.15);}.phrase-option:disabled{cursor:default;}.phrase-option.is-correct{background:#5fc488;color:#062c20;}.phrase-option.is-wrong{background:#ed7782;color:#510610;}.phrase-feedback{min-height:28px;margin:24px 0 0;color:#fff;font-family:'Urbanist',sans-serif;font-size:18px;font-weight:800;}.phrase-start,.phrase-result{position:absolute;inset:0;z-index:6;display:flex;flex-direction:column;align-items:center;justify-content:center;padding:30px;text-align:center;background:rgba(4,56,108,.27);backdrop-filter:blur(1px);}.phrase-start__eyebrow,.phrase-result__eyebrow{margin:0 0 8px;color:#fff;font-family:'Urbanist',sans-serif;font-size:34px;font-weight:800;}.phrase-start__topic,.phrase-result__topic{margin:0;color:#fff;font-family:'Urbanist',sans-serif;font-size:52px;font-weight:800;text-shadow:0 5px 3px rgba(0,0,0,.27);}.phrase-start__button,.phrase-result__button{margin-top:20px;border:0;border-radius:22px;padding:14px 46px;background:#022a56;color:#fff;box-shadow:0 8px 0 rgba(0,0,0,.16),0 4px 10px rgba(0,0,0,.24);font-family:'Urbanist',sans-serif;font-size:31px;font-weight:800;cursor:pointer;transition:transform .18s;}.phrase-start__button:hover,.phrase-result__button:hover{transform:translateY(-3px);}.phrase-bottom-hint{position:absolute;bottom:19px;left:32px;color:rgba(223,239,248,.68);font:25px Arial;letter-spacing:3px;}.phrase-sound{position:absolute;right:31px;bottom:20px;color:rgba(223,239,248,.68);font:25px Arial;letter-spacing:5px;}
  @media(max-width:950px){.exercise-grid{grid-template-columns:repeat(2,minmax(0,1fr));}.exercise-page{padding-left:10px;padding-right:10px;}.exercise-bottom-row{grid-column:1/-1;}.exercise-types__toolbar{grid-template-columns:145px 1fr 145px;}.type-grid{gap:38px;}.quiz-toolbar{grid-template-columns:145px 1fr 145px;}.quiz-options{gap:24px 56px;}.flash-toolbar{grid-template-columns:145px 1fr 145px;}.box-toolbar{grid-template-columns:145px 1fr 145px;}.box-grid-game{gap:25px 32px;}.phrase-toolbar{grid-template-columns:145px 1fr 145px;}}
  @media(max-width:640px){.exercise-grid{grid-template-columns:1fr;max-width:360px;}.exercise-heading{margin-bottom:34px;}.exercise-card__visual{height:205px;}.exercise-card__label{font-size:20px;}.exercise-bottom-row{grid-column:auto;width:100%;grid-template-columns:1fr;}.exercise-types__toolbar{grid-template-columns:1fr;gap:20px;margin-bottom:30px;}.exercise-back,.exercise-types__title{justify-self:center;}.type-grid{grid-template-columns:1fr;gap:25px;}.type-grid__last{grid-column:auto;justify-self:stretch;width:100%;}.type-card{min-height:150px;}.type-card__name{font-size:20px;}.quiz-toolbar{grid-template-columns:1fr;gap:20px;margin-bottom:28px;}.quiz-toolbar__title{font-size:21px;padding:11px 20px;}.quiz-game{min-height:620px;padding:16px 18px 27px;border-radius:28px;}.quiz-status{grid-template-columns:58px 1fr 58px;gap:10px;}.quiz-time,.quiz-score{font-size:24px;}.quiz-question{font-size:21px;padding:19px;}.quiz-options{grid-template-columns:1fr;gap:18px;margin-top:32px;}.quiz-option{min-height:72px;font-size:19px;}.quiz-start__eyebrow,.quiz-result__eyebrow{font-size:27px;}.quiz-start__topic,.quiz-result__topic{font-size:36px;}.quiz-start__button,.quiz-result__button{font-size:25px;padding:12px 32px;}.flash-toolbar{grid-template-columns:1fr;gap:20px;margin-bottom:28px;}.flash-toolbar__title{font-size:21px;padding:11px 20px;}.flash-game{min-height:610px;padding:16px 18px 27px;border-radius:28px;}.flash-status{grid-template-columns:58px 1fr 58px;gap:10px;}.flash-time,.flash-score{font-size:24px;}.flash-scene{height:365px;}.flash-face{padding:25px 20px;}.flash-face__text{font-size:29px;}.flash-face--back .flash-face__text{font-size:26px;}.flash-turn{font-size:24px;padding:11px 32px;}.flash-start__eyebrow,.flash-result__eyebrow{font-size:27px;}.flash-start__topic,.flash-result__topic{font-size:36px;}.flash-start__button,.flash-result__button{font-size:25px;padding:12px 32px;}}
  @media(max-width:640px){.box-toolbar,.phrase-toolbar{grid-template-columns:1fr;gap:20px;margin-bottom:28px;}.box-toolbar__title,.phrase-toolbar__title{font-size:21px;padding:11px 20px;}.box-game,.phrase-game{min-height:620px;padding:16px 18px 27px;border-radius:28px;}.box-status,.phrase-status{grid-template-columns:58px 1fr 58px;gap:10px;}.box-time,.box-score,.phrase-time,.phrase-score{font-size:24px;}.box-grid-game{grid-template-columns:repeat(2,minmax(0,1fr));gap:28px 22px;}.number-box,.number-box:nth-child(n){grid-column:auto;justify-self:center;width:126px;height:148px;font-size:50px;}.box-challenge{inset:70px 12px 24px;padding:18px;}.box-challenge__question{font-size:23px;}.box-challenge__options{grid-template-columns:1fr;gap:13px;margin-top:24px;}.box-start__eyebrow,.box-result__eyebrow,.phrase-start__eyebrow,.phrase-result__eyebrow{font-size:27px;}.box-start__topic,.box-result__topic,.phrase-start__topic,.phrase-result__topic{font-size:36px;}.box-start__button,.box-result__button,.phrase-start__button,.phrase-result__button{font-size:25px;padding:12px 32px;}.phrase-content{min-height:470px;padding:15px 0;}.phrase-content__title{margin-bottom:38px;font-size:27px;}.phrase-sentence{font-size:25px;line-height:1.55;}.phrase-blank{min-width:115px;}.phrase-options{flex-direction:column;width:min(280px,100%);gap:18px;margin-top:40px;}.phrase-option{min-height:65px;font-size:22px;}}
</style>

<section class="exercise-page">
  <img class="exercise-decoration exercise-decoration--html" src="<?= ASSETS ?>/images/flowbite-html-solid.svg" alt=""/>
  <img class="exercise-decoration exercise-decoration--js" src="<?= ASSETS ?>/images/akar-icons-javascript-fill.png" alt=""/>
  <img class="exercise-decoration exercise-decoration--poly" src="<?= ASSETS ?>/images/polygon-1.svg" alt=""/>

  <div class="exercise-heading anim-title"><h1>Exercícios</h1></div>

  <div class="exercise-grid">
    <a href="#" onclick="return openExerciseTypes(event, 'CSS Frameworks')" class="exercise-card" aria-label="Exercício: Aprenda Frameworks">
      <div class="exercise-card__visual framework-card">
        <div class="framework-card__title"><span>▣</span> CSS Frameworks</div>
        <div class="framework-list">
          <div class="framework"><div class="framework__logo bootstrap">B</div><small class="framework__name">Bootstrap</small></div>
          <div class="framework"><div class="framework__logo tailwind">≈</div><small class="framework__name">Tailwind CSS</small></div>
          <div class="framework"><div class="framework__logo foundation">♘</div><small class="framework__name">Foundation</small></div>
          <div class="framework"><div class="framework__logo bulma">◆</div><small class="framework__name">Bulma</small></div>
          <div class="framework"><div class="framework__logo skeleton">S</div><small class="framework__name">Skeleton</small></div>
          <div class="framework"><div class="framework__logo uikit">◈</div><small class="framework__name">UI Kit</small></div>
          <div class="framework"><div class="framework__logo materialize">M</div><small class="framework__name">Materialize CSS</small></div>
          <div class="framework"><div class="framework__logo pure">P</div><small class="framework__name">Pure</small></div>
        </div>
      </div>
      <span class="exercise-card__label">Aprenda Frameworks</span>
    </a>

    <a href="#" onclick="return openExerciseTypes(event, 'Responsividade')" class="exercise-card" aria-label="Exercício: Responsividade">
      <div class="exercise-card__visual responsive-card">
        <div class="desktop"><div class="responsive-sidebar"></div><div class="responsive-blocks"><i></i><i></i><i></i><i></i></div></div>
        <div class="phone"></div>
      </div>
      <span class="exercise-card__label">Responsividade</span>
    </a>

    <a href="#" onclick="return openExerciseTypes(event, 'Decore as tags')" class="exercise-card" aria-label="Exercício: Decore as tags">
      <div class="exercise-card__visual tags-card"><div class="css-mark"><div class="css-mark__shield">CSS</div><div class="css-mark__braces">{ }</div></div></div>
      <span class="exercise-card__label">Decore as tags!</span>
    </a>

    <div class="exercise-bottom-row">
      <a href="#" onclick="return openExerciseTypes(event, 'Transições')" class="exercise-card" aria-label="Exercício: Transições">
        <div class="exercise-card__visual transition-card"><i></i><i></i><i></i></div>
        <span class="exercise-card__label">Transições</span>
      </a>
      <a href="#" onclick="return openExerciseTypes(event, 'Animações')" class="exercise-card" aria-label="Exercício: Animações">
        <div class="exercise-card__visual animation-card"><div class="animation-card__headline">CSS Animations<br><b>na prática</b> ⏱</div><div class="animation-card__diagram"><small>0,0s</small><span>→</span><i></i><span>→</span><i></i><small>0,3s</small></div></div>
        <span class="exercise-card__label">Animações</span>
      </a>
    </div>
  </div>

  <section id="exercise-types" class="exercise-types" aria-live="polite">
    <div class="exercise-types__toolbar">
      <button type="button" onclick="showExerciseCatalog()" class="exercise-back">‹&nbsp; Voltar</button>
      <h2 class="exercise-types__title">Exercícios › <span id="exercise-topic">Tipo de exercício</span></h2>
      <span></span>
    </div>

    <div class="type-grid">
      <button type="button" onclick="openBoxes()" class="type-card" aria-label="Tipo de exercício: Abra a Caixa">
        <span class="type-card__illustration"><span class="box-numbers"><i>1</i><i>2</i><i>3</i><i>4</i><i>5</i></span></span>
        <span class="type-card__name">Abra<br>a<br>Caixa</span>
      </button>
      <button type="button" onclick="openQuiz()" class="type-card" aria-label="Tipo de exercício: Questionário">
        <span class="type-card__illustration"><span class="quiz-paper"><span class="quiz-cells"><i></i><i></i><i></i><i></i></span></span></span>
        <span class="type-card__name">Questionário</span>
      </button>
      <button type="button" onclick="openFlashcards()" class="type-card" aria-label="Tipo de exercício: Flash Cards">
        <span class="type-card__illustration"><span class="flash-stack"><i></i><i></i><i></i><b>✓</b></span></span>
        <span class="type-card__name">Flash<br>Cards</span>
      </button>
      <button type="button" onclick="openPhrases()" class="type-card" aria-label="Tipo de exercício: Complete a frase">
        <span class="type-card__illustration"><span class="phrase-card"><i class="phrase-arrow"></i><i class="phrase-line"></i></span></span>
        <span class="type-card__name">Complete<br>a<br>frase</span>
      </button>
      <button type="button" class="type-card type-grid__last" aria-label="Tipo de exercício: Associação">
        <span class="type-card__illustration"><span class="association"><i><b></b><b></b><b></b></i><i><b></b><b></b><b></b></i></span></span>
        <span class="type-card__name">Associação</span>
      </button>
    </div>
  </section>

  <section id="quiz-screen" class="quiz-screen" aria-live="polite">
    <div class="quiz-toolbar">
      <button type="button" onclick="backToExerciseTypes()" class="exercise-back">‹&nbsp; Voltar</button>
      <h2 class="quiz-toolbar__title">Tipo de exercício › Questionário</h2>
      <span></span>
    </div>
    <div class="quiz-game">
      <div class="quiz-status"><span id="quiz-time" class="quiz-time">1:30</span><div class="quiz-progress"><div id="quiz-progress-bar" class="quiz-progress__bar"></div></div><span id="quiz-score" class="quiz-score">✓0</span></div>
      <div class="quiz-content">
        <div id="quiz-question" class="quiz-question"></div>
        <div id="quiz-options" class="quiz-options"></div>
        <div id="quiz-feedback" class="quiz-feedback" role="status"></div>
      </div>
      <div id="quiz-start" class="quiz-start"><p class="quiz-start__eyebrow">Questionário</p><h3 id="quiz-start-topic" class="quiz-start__topic">Aprenda Frameworks</h3><button type="button" onclick="startQuiz()" class="quiz-start__button">Começar</button></div>
      <div id="quiz-result" class="quiz-result" style="display:none;"><p class="quiz-result__eyebrow">Resultado</p><h3 id="quiz-result-topic" class="quiz-result__topic"></h3><p id="quiz-result-text" class="quiz-feedback"></p><button type="button" onclick="startQuiz()" class="quiz-result__button">Jogar novamente</button></div>
      <span class="quiz-bottom-hint">☰</span><span class="quiz-sound">♬ ⛶</span>
    </div>
  </section>

  <section id="flash-screen" class="flash-screen" aria-live="polite">
    <div class="flash-toolbar">
      <button type="button" onclick="backToExerciseTypesFromFlash()" class="exercise-back">‹&nbsp; Voltar</button>
      <h2 class="flash-toolbar__title">Tipo de exercício › Flashcards</h2>
      <span></span>
    </div>
    <div class="flash-game">
      <div class="flash-status"><span id="flash-time" class="flash-time">1:30</span><div class="flash-progress"><div id="flash-progress-bar" class="flash-progress__bar"></div></div><span id="flash-score" class="flash-score">✓0</span></div>
      <div class="flash-content">
        <div id="flash-scene" class="flash-scene" onclick="flipFlashcard()"><div id="flash-card" class="flash-card"><article class="flash-face"><p class="flash-face__tag">Pergunta</p><p id="flash-front-text" class="flash-face__text"></p><p class="flash-face__hint">Clique no cartão para virar</p></article><article class="flash-face flash-face--back"><p class="flash-face__tag">Resposta</p><p id="flash-back-text" class="flash-face__text"></p><p class="flash-face__hint">Use a seta para o próximo cartão</p></article></div></div>
        <div class="flash-controls"><button type="button" onclick="flipFlashcard()" class="flash-turn">Virar</button></div>
      </div>
      <div id="flash-start" class="flash-start"><p class="flash-start__eyebrow">Flashcards</p><h3 id="flash-start-topic" class="flash-start__topic">Aprenda Frameworks</h3><button type="button" onclick="startFlashcards()" class="flash-start__button">Começar</button></div>
      <div id="flash-result" class="flash-result" style="display:none;"><p class="flash-result__eyebrow">Cartões concluídos</p><h3 id="flash-result-topic" class="flash-result__topic"></h3><p id="flash-result-text" class="quiz-feedback"></p><button type="button" onclick="startFlashcards()" class="flash-result__button">Recomeçar</button></div>
      <button type="button" onclick="nextFlashcard()" class="flash-next" aria-label="Próximo cartão">→</button><span class="flash-bottom-hint">☰</span><span class="flash-sound">♬ ⛶</span>
    </div>
  </section>

  <section id="box-screen" class="box-screen" aria-live="polite">
    <div class="box-toolbar">
      <button type="button" onclick="backToExerciseTypesFromBoxes()" class="exercise-back">‹&nbsp; Voltar</button>
      <h2 class="box-toolbar__title">Tipo de exercício › Abra a caixa</h2>
      <span></span>
    </div>
    <div class="box-game">
      <div class="box-status"><span id="box-time" class="box-time">1:30</span><div class="box-progress"><div id="box-progress-bar" class="box-progress__bar"></div></div><span id="box-score" class="box-score">✓0</span></div>
      <div class="box-content"><div id="box-grid-game" class="box-grid-game"></div></div>
      <div id="box-challenge" class="box-challenge"><div class="box-challenge__card"><p class="box-challenge__eyebrow">Desafio da caixa <span id="box-challenge-number"></span></p><h3 id="box-challenge-question" class="box-challenge__question"></h3><div id="box-challenge-options" class="box-challenge__options"></div><p id="box-challenge-feedback" class="box-challenge__feedback"></p></div></div>
      <div id="box-start" class="box-start"><p class="box-start__eyebrow">Abra a caixa</p><h3 id="box-start-topic" class="box-start__topic">Aprenda Frameworks</h3><button type="button" onclick="startBoxes()" class="box-start__button">Começar</button></div>
      <div id="box-result" class="box-result" style="display:none;"><p class="box-result__eyebrow">Caixas concluídas</p><h3 id="box-result-topic" class="box-result__topic"></h3><p id="box-result-text" class="quiz-feedback"></p><button type="button" onclick="startBoxes()" class="box-result__button">Jogar novamente</button></div>
      <span class="box-bottom-hint">☰</span><span class="box-sound">♬ ⛶</span>
    </div>
  </section>

  <section id="phrase-screen" class="phrase-screen" aria-live="polite">
    <div class="phrase-toolbar">
      <button type="button" onclick="backToExerciseTypesFromPhrases()" class="exercise-back">‹&nbsp; Voltar</button>
      <h2 class="phrase-toolbar__title">Tipo de exercício › Complete a Frase</h2>
      <span></span>
    </div>
    <div class="phrase-game">
      <div class="phrase-status"><span id="phrase-time" class="phrase-time">1:30</span><div class="phrase-progress"><div id="phrase-progress-bar" class="phrase-progress__bar"></div></div><span id="phrase-score" class="phrase-score">✓0</span></div>
      <div class="phrase-content"><h3 class="phrase-content__title">Complete a frase</h3><p id="phrase-sentence" class="phrase-sentence"></p><div id="phrase-options" class="phrase-options"></div><p id="phrase-feedback" class="phrase-feedback"></p></div>
      <div id="phrase-start" class="phrase-start"><p class="phrase-start__eyebrow">Complete a frase</p><h3 id="phrase-start-topic" class="phrase-start__topic">Aprenda Frameworks</h3><button type="button" onclick="startPhrases()" class="phrase-start__button">Começar</button></div>
      <div id="phrase-result" class="phrase-result" style="display:none;"><p class="phrase-result__eyebrow">Frases concluídas</p><h3 id="phrase-result-topic" class="phrase-result__topic"></h3><p id="phrase-result-text" class="phrase-feedback"></p><button type="button" onclick="startPhrases()" class="phrase-result__button">Jogar novamente</button></div>
      <span class="phrase-bottom-hint">☰</span><span class="phrase-sound">♬ ⛶</span>
    </div>
  </section>
</section>

<script>
  function openExerciseTypes(event, topic) {
    if (event) event.preventDefault();
    document.querySelector('.exercise-heading').style.display = 'none';
    document.querySelector('.exercise-grid').style.display = 'none';
    window.activeExerciseTopic = topic || 'Aprenda Frameworks';
    document.getElementById('exercise-topic').textContent = window.activeExerciseTopic;
    document.getElementById('exercise-types').style.display = 'flex';
    window.scrollTo({ top: 0, behavior: 'smooth' });
    return false;
  }

  function showExerciseCatalog() {
    document.getElementById('exercise-types').style.display = 'none';
    document.querySelector('.exercise-heading').style.display = 'flex';
    document.querySelector('.exercise-grid').style.display = 'grid';
    window.scrollTo({ top: 0, behavior: 'smooth' });
  }
</script>
<script src="<?= ASSETS ?>/js/exercises-quiz.js"></script>
<script src="<?= ASSETS ?>/js/exercises-flashcards.js"></script>
<script src="<?= ASSETS ?>/js/exercises-boxes.js"></script>
<script src="<?= ASSETS ?>/js/exercises-phrases.js"></script>

<footer class="page-footer anim-footer">
  <div class="footer-card">
    <div class="footer-grid">
      <div style="display:flex;flex-direction:column;align-items:center;">
        <img style="width:92px;height:92px;object-fit:cover;" src="<?= ASSETS ?>/images/c244a778-6383-491d-b2f6-58d02d819c9e-1.png" alt="Architech"/>
        <span class="font-pixelify" style="margin-top:4px;font-size:20px;font-weight:600;letter-spacing:2.2px;color:#fff;white-space:nowrap;text-shadow:0 4px 4px #00000040;">ARCHITECH</span>
      </div>
      <img style="width:9px;height:118px;align-self:center;" src="<?= ASSETS ?>/images/line-1.svg" alt=""/>
      <div style="display:flex;flex-direction:column;align-items:center;gap:12px;">
        <div style="display:flex;align-items:center;border-radius:20px;padding:12px 24px;background:#ffffff1a;box-shadow:0 4px 4px #00000033;">
          <a href="<?= BASE_URL ?>/" class="nav-btn">Principal</a>
          <a href="<?= BASE_URL ?>/exercicios" class="nav-btn active">Exercícios</a>
          <a href="<?= BASE_URL ?>/sobre" class="nav-btn">Sobre</a>
        </div>
        <p class="font-urbanist" style="font-size:14px;font-weight:700;letter-spacing:1.54px;color:#fff;text-shadow:0 4px 4px #00000040;">© Architech. Todos os direitos reservados.</p>
      </div>
      <div style="display:flex;flex-direction:column;gap:8px;">
        <div style="display:flex;align-items:center;gap:28px;">
          <a href="#" class="social-link"><img style="width:47px;height:47px;" src="<?= ASSETS ?>/images/mdi-twitter.svg" alt="Twitter"/></a>
          <a href="#" class="social-link"><img style="width:47px;height:50px;" src="<?= ASSETS ?>/images/formkit-instagram.svg" alt="Instagram"/></a>
          <a href="#" class="social-link"><img style="width:45px;height:48px;" src="<?= ASSETS ?>/images/mdi-github.svg" alt="GitHub"/></a>
        </div>
        <p class="font-urbanist" style="font-size:14px;font-weight:700;letter-spacing:1.54px;color:#fff;text-shadow:0 4px 4px #00000040;">Suporte: architech.dev@gmail.com</p>
      </div>
    </div>
  </div>
</footer>
