/* i18n FR/EN + horloge Goma + détails — vanilla, pas de dépendance */
(function(){
  "use strict";

  var I18N = {
    fr: {
      "nav.about":"Profil","nav.work":"Travaux","nav.services":"Services","nav.stack":"Outils","nav.path":"Parcours","nav.contact":"Contact",
      "menu":"Menu",
      "kicker":"N°001 — Goma, RDC — Ouvert aux missions",
      "hero.title":"David Maene — développeur <em>logiciel</em>, à Goma.",
      "hero.lede":"Je construis des <strong>API, des sites qui chargent vite et des outils métiers</strong> qui tiennent avec une connexion moyenne et des coupures. Ingénieur électro-informaticien de formation, je travaille surtout en <strong>JavaScript / Node, PHP et Java</strong>.",
      "hero.cta1":"Voir les travaux","hero.cta2":"Télécharger le CV",
      "m.email":"E-mail","m.phone":"Tél.","m.base":"Base","m.base.v":"Goma (RDC) — 1,68°S, 29,22°E","m.else":"Aussi","m.else.v":"FR / EN / SW — je réponds en 24–48h",
      "about.k":"01 — Profil","about.t":"Pas un studio, une personne.",
      "about.p1":"Je m'appelle David Maene. Je vis à Goma et je fais du logiciel depuis mes études d'ingénierie : d'abord l'électrique, puis l'informatique, puis le web parce qu'il fallait bien mettre les deux ensemble.",
      "about.p2":"Concrètement : je fais des back-ends Node qui n'ont pas besoin de 32 Go de RAM, des sites PHP/JS sobres, des petites applis Java quand il faut, et je dépanne ce qui existe déjà. Je documente, je teste l'essentiel, et je laisse un code qu'un autre dev peut reprendre.",
      "about.p3":"Je travaille avec des écoles, des petites boîtes et des ONG autour des Grands Lacs. Devis écrit, délais dits franchement, pas de jargon si vous n'en voulez pas.",
      "fiche.t":"Fiche rapide",
      "f.loc":"Lieu","f.loc.v":"Goma, Nord-Kivu — RDC",
      "f.exp":"Depuis","f.exp.v":"2018 — dev, 2021 diplômé génie info",
      "f.lang":"Langues","f.lang.v":"Français, anglais, swahili",
      "f.now":"En ce moment","f.now.v":"API Node pour un site universitaire (ULPGL), maintenance PHP/JS",
      "f.contact":"Contact direct","f.contact.v":"davidmened@gmail.com — +243 970 284 772",
      "work.k":"02 — Travaux choisis","work.t":"Six chantiers, pas des mockups.",
      "work.s":"Du code réel, sur mon GitHub. Certains projets sont des briques (lib, ORM), d'autres des applis complètes. Demandez-moi une visite guidée, je montre volontiers l'intérieur.",
      "w1.d":"API REST du site de l'ULPGL à Goma. Contenus, news, endpoints sobres pensés pour un hébergement modeste.",
      "w2.d":"Petite librairie TypeScript pour fouiller un tableau d'objets côté client. Zéro dépendance, testée sur données sales.",
      "w3.d":"Mini ORM en PHP : Singleton, Strategy, Observer. Fait pour comprendre, puis réutilisé sur des petits projets.",
      "w4.d":"Base d'une plateforme B2B en Java. Catalogue, commandes, rôles — posée proprement, à reprendre.",
      "w5.d":"Gestion de bibliothèque en Java. Prêts, retours, recherche — un classique bien rangé.",
      "w6.d":"Landing + déploiement pour Soko Mukulima (agri). Pages légères, images compressées, pensée 3G.",
      "work.view":"Code ↗","work.more":"Tout voir sur GitHub — github.com/davmaene",
      "serv.k":"03 — Services","serv.t":"Ce que je fais vraiment.",
      "s1.t":"API & back-ends","s1.d":"Endpoints Node/PHP clairs, auth simple, exports CSV, webhooks. Avec un README qui dit comment lancer.",
      "s2.t":"Sites rapides","s2.d":"Vitrines et sites d'écoles/ONG : HTML soigné, peu de JS, qui s'ouvrent à Goma comme à Bruxelles.",
      "s3.t":"Applis & outils","s3.d":"Petites applis Java/JS, scripts d'import, tableaux de bord sobres. Pas d'usine à gaz.",
      "s4.t":"Reprise & formation","s4.d":"Je relis votre code existant, je corrige, je forme votre équipe à le tenir sans moi.",
      "serv.note":"Je ne fais pas : logos à 5 $, promesses \"IA révolutionnaire\", ni apps qui exigent la 5G et un iPhone 16. Si votre besoin dépasse mes mains, je vous le dis et je redirige.",
      "stack.k":"04 — Outils","stack.t":"Une table de travail, pas un nuage de tags.",
      "st1":"Tous les jours","st2":"Souvent","st3":"Déjà croisé",
      "path.k":"05 — Parcours","path.t":"Court et vérifiable.",
      "e1.t":"Licence (Bac+3) — génie informatique","e1.d":"Diplômé en 2021. Web, bases de données, data-mining, projets Node/PHP.",
      "e2.t":"Double cursus — électrotechnique + informatique","e2.d":"2018–2019. Les deux en même temps : réseaux élec le matin, code l'après-midi.",
      "e3.t":"Depuis — missions et maintenance","e3.d":"Sites d'universités, commerces, petites applis. Beaucoup de maintenance : c'est là qu'on apprend.",
      "contact.k":"06 — Contact","contact.t":"Écrivez comme vous parlez.",
      "contact.s":"Un paragraphe suffit : qui vous êtes, ce qu'il faut construire, et pour quand. Je réponds avec un créneau d'appel et des questions précises.",
      "c.addr":"Adresse","c.addr.v":"13, Uvira — Q. Murara, Goma — RDC",
      "fl.name":"Votre nom","fl.email":"Votre e-mail","fl.subj":"Objet en une ligne","fl.msg":"Le besoin, en clair","fl.send":"Préparer l'e-mail","fl.hint":"Ouvre votre messagerie avec le message déjà rempli — rien n'est envoyé sans vous.",
      "foot":"Fait à la main à Goma — HTML/CSS/JS, sans template. Photo : mars 2020, Canon EOS 60D.",
      "top":"Haut ↑"
    },
    en: {
      "nav.about":"About","nav.work":"Work","nav.services":"Services","nav.stack":"Stack","nav.path":"Background","nav.contact":"Contact",
      "menu":"Menu",
      "kicker":"N°001 — Goma, DRC — Open for work",
      "hero.title":"David Maene — <em>software</em> developer, in Goma.",
      "hero.lede":"I build <strong>APIs, fast-loading sites and small business tools</strong> that survive average bandwidth and power cuts. Electrical + computer engineer by training, mostly <strong>JavaScript / Node, PHP and Java</strong>.",
      "hero.cta1":"See selected work","hero.cta2":"Download CV",
      "m.email":"Email","m.phone":"Phone","m.base":"Based","m.base.v":"Goma (DRC) — 1.68°S, 29.22°E","m.else":"Also","m.else.v":"FR / EN / SW — I reply within 24–48h",
      "about.k":"01 — About","about.t":"Not a studio, a person.",
      "about.p1":"I'm David Maene. I live in Goma and I've been doing software since engineering school: first electrical, then computing, then the web — because the two had to meet somewhere.",
      "about.p2":"Concretely: Node back-ends that don't need 32GB of RAM, plain PHP/JS sites, small Java apps when needed, and I fix what's already there. I document, test the essentials, and leave code another dev can pick up.",
      "about.p3":"I work with schools, small businesses and NGOs around the Great Lakes. Written quotes, honest timelines, no jargon unless you want it.",
      "fiche.t":"Quick file",
      "f.loc":"Place","f.loc.v":"Goma, North Kivu — DRC",
      "f.exp":"Since","f.exp.v":"2018 writing code, 2021 CS engineering grad",
      "f.lang":"Languages","f.lang.v":"French, English, Swahili",
      "f.now":"Right now","f.now.v":"Node API for a university site (ULPGL), PHP/JS maintenance",
      "f.contact":"Direct","f.contact.v":"davidmened@gmail.com — +243 970 284 772",
      "work.k":"02 — Selected work","work.t":"Six real jobs, not mockups.",
      "work.s":"Real code on my GitHub. Some are bricks (lib, ORM), some are full apps. Ask for a walkthrough — happy to show the inside.",
      "w1.d":"REST API for the ULPGL university site in Goma. Content, news, lean endpoints for modest hosting.",
      "w2.d":"Tiny TypeScript helper to search arrays of objects client-side. Zero deps, tested on messy data.",
      "w3.d":"Mini ORM in PHP: Singleton, Strategy, Observer. Built to learn, then reused on small jobs.",
      "w4.d":"Seed of a B2B platform in Java. Catalog, orders, roles — laid out cleanly, ready to extend.",
      "w5.d":"Library manager in Java. Loans, returns, search — a tidy classic.",
      "w6.d":"Landing + deploy for Soko Mukulima (agri). Light pages, squeezed images, built for 3G.",
      "work.view":"Code ↗","work.more":"Everything on GitHub — github.com/davmaene",
      "serv.k":"03 — Services","serv.t":"What I actually do.",
      "s1.t":"APIs & back-ends","s1.d":"Clear Node/PHP endpoints, simple auth, CSV exports, webhooks. With a README that says how to run it.",
      "s2.t":"Fast sites","s2.d":"Brochure and school/NGO sites: careful HTML, little JS, opening in Goma as in Brussels.",
      "s3.t":"Apps & tools","s3.d":"Small Java/JS apps, import scripts, plain dashboards. No over-engineering.",
      "s4.t":"Takeover & training","s4.d":"I review your existing code, fix it, and train your team to run it without me.",
      "serv.note":"I don't do: $5 logos, \"revolutionary AI\" promises, or apps requiring 5G and an iPhone 16. If it's beyond me, I'll say so and point you on.",
      "stack.k":"04 — Toolbox","stack.t":"A workbench, not a tag cloud.",
      "st1":"Daily","st2":"Often","st3":"Touched before",
      "path.k":"05 — Background","path.t":"Short and checkable.",
      "e1.t":"Bachelor (3y) — computer engineering","e1.d":"Graduated 2021. Web, databases, data mining, Node/PHP projects.",
      "e2.t":"Double track — electrical + computing","e2.d":"2018–2019. Both at once: power grids in the morning, code in the afternoon.",
      "e3.t":"Since — gigs and maintenance","e3.d":"University sites, shops, small apps. Lots of maintenance — that's where you learn.",
      "contact.k":"06 — Contact","contact.t":"Write like you talk.",
      "contact.s":"One paragraph is enough: who you are, what needs building, and by when. I'll reply with a call slot and sharp questions.",
      "c.addr":"Address","c.addr.v":"13, Uvira — Q. Murara, Goma — DRC",
      "fl.name":"Your name","fl.email":"Your email","fl.subj":"Subject in one line","fl.msg":"The need, plainly","fl.send":"Compose email","fl.hint":"Opens your mail app with everything prefilled — nothing sends without you.",
      "foot":"Handmade in Goma — HTML/CSS/JS, no template. Photo: March 2020, Canon EOS 60D.",
      "top":"Top ↑"
    }
  };

  var lang = localStorage.getItem("dm-lang") || "fr";

  function applyLang(l){
    lang = l;
    localStorage.setItem("dm-lang", l);
    document.documentElement.lang = l;
    document.querySelectorAll("[data-i18n]").forEach(function(el){
      var k = el.getAttribute("data-i18n");
      var v = (I18N[l] && I18N[l][k]) || (I18N.fr[k]) || null;
      if(v !== null) el.innerHTML = v;
    });
    document.querySelectorAll("[data-i18n-ph]").forEach(function(el){
      var k = el.getAttribute("data-i18n-ph");
      var v = (I18N[l] && I18N[l][k]) || null;
      if(v) el.setAttribute("placeholder", v);
    });
    document.querySelectorAll(".lang button").forEach(function(b){
      b.setAttribute("aria-pressed", b.dataset.lang === l ? "true" : "false");
    });
    document.title = l === "fr" ? "David Maene — développeur logiciel à Goma" : "David Maene — software developer in Goma";
  }

  document.querySelectorAll(".lang button").forEach(function(b){
    b.addEventListener("click", function(){ applyLang(b.dataset.lang); });
  });

  // Horloge Goma (Africa/Goma, UTC+2)
  function tick(){
    try{
      var t = new Intl.DateTimeFormat(lang === "fr" ? "fr-FR" : "en-GB",{
        timeZone:"Africa/Goma",hour:"2-digit",minute:"2-digit",day:"2-digit",month:"short"
      }).format(new Date());
      var el = document.getElementById("goma-time");
      if(el) el.textContent = "Goma " + t;
    }catch(e){}
  }

  // Nav mobile + active + reveal
  var burger = document.getElementById("burger");
  var nav = document.getElementById("mainnav");
  if(burger && nav) burger.addEventListener("click", function(){ nav.classList.toggle("open"); });

  if(nav) nav.addEventListener("click", function(e){
    if(e.target.tagName === "A") nav.classList.remove("open");
  });

  var secs = document.querySelectorAll("section[data-sec]");
  var links = document.querySelectorAll("#mainnav a");
  if("IntersectionObserver" in window && secs.length){
    var io = new IntersectionObserver(function(entries){
      entries.forEach(function(en){
        if(en.isIntersecting){
          var id = en.target.getAttribute("id");
          links.forEach(function(a){
            a.classList.toggle("active", a.getAttribute("href") === "#" + id);
          });
        }
      });
    },{rootMargin:"-40% 0px -55% 0px"});
    secs.forEach(function(s){ io.observe(s); });

    var rio = new IntersectionObserver(function(entries){
      entries.forEach(function(en){
        if(en.isIntersecting){ en.target.classList.add("on"); rio.unobserve(en.target); }
      });
    },{threshold:.08});
    document.querySelectorAll(".rv").forEach(function(el){ rio.observe(el); });
  } else {
    document.querySelectorAll(".rv").forEach(function(el){ el.classList.add("on"); });
  }

  // Formulaire -> mailto pré-rempli (pas de PHP sur du statique)
  var form = document.getElementById("cform");
  if(form) form.addEventListener("submit", function(e){
    e.preventDefault();
    var n = document.getElementById("cf-name").value.trim();
    var f = document.getElementById("cf-from").value.trim();
    var s = document.getElementById("cf-subj").value.trim();
    var m = document.getElementById("cf-msg").value.trim();
    var subject = encodeURIComponent((s || "Mission") + " — " + n);
    var body = encodeURIComponent(m + "\n\n— " + n + " (" + f + ")");
    window.location.href = "mailto:davidmened@gmail.com?subject=" + subject + "&body=" + body;
  });

  var y = document.getElementById("year");
  if(y) y.textContent = new Date().getFullYear();

  applyLang(lang);
  tick(); setInterval(tick, 30000);
})();
