import "vanilla-cookieconsent";
import "vanilla-cookieconsent/dist/cookieconsent.css";
import "./cookie-custom.css";

const cookieconsent = initCookieConsent();
const lang = document.querySelector("body").getAttribute("data-current-lang");

cookieconsent.run({
  current_lang: "juso_" + lang,
  autoclear_cookies: true, // default: false
  page_scripts: true, // default: false

  mode: "opt-in",
  delay: 0,
  revision: 1, // default: 0

  onFirstAction: function (user_preferences, cookie) {
    if (cookie.level.includes("analytics")) {
      _paq.push(["rememberConsentGiven"]);
    }
  },

  onChange: function (cookie, changed_preferences) {
    if (cookie.level.includes("analytics")) {
      _paq.push(["rememberConsentGiven"]);
    } else {
      _paq.push(["forgetConsentGiven"]);
    }
  },

  gui_options: {
    consent_modal: {
      layout: "box", // box/cloud/bar
      position: "bottom right", // bottom/middle/top + left/right/center
      transition: "slide", // zoom/slide
      swap_buttons: true, // enable to invert buttons
    },
    settings_modal: {
      layout: "bar", // box/bar
      // position: 'left',           // left/right
      transition: "zoom", // zoom/slide
    },
  },

  languages: {
    juso_de: {
      consent_modal: {
        title: "Wir verwenden Cookies!",
        description:
          "Diese Webseite verwendet essentielle Cookies, welche das optimale Funktionieren der Seite garantieren und Ihr Verhalten auf unserer Webseite aufzeichnen. Letztere werden erst mit Ihrer Zustimmung gesetzt.",
        primary_btn: {
          text: "Alle akzeptieren",
          role: "accept_all",
        },
        secondary_btn: {
          text: "Einstellungen",
          role: "settings",
        },
      },
      settings_modal: {
        title: "Cookie Einstellungen",
        save_settings_btn: "Speichern",
        accept_all_btn: "Alle akzeptieren",
        reject_all_btn: "Alle ablehnen",
        close_btn_label: "Schliessen",
        cookie_table_headers: [
          { col1: "Name" },
          { col2: "Domain" },
          { col3: "Gültigkeit" },
          { col4: "Beschreibung" },
        ],
        blocks: [
          {
            title: "Verwendung von Cookies 📢",
            description:
              'Wir verwenden Cookies um Ihren Aufenthalt auf der Webseite zu verbessern und Ihr Verhalten auf unserer Webseite aufzuzeichnen. Sie können Ihre Einstellungen jederzeit anpassen. Mehr Informationen zu sensiblen Daten finden Sie <a href="/datenschutz" class="cc-link">in unseren Datenschutzbestimmungen.</a>',
          },
          {
            title: "Erforderliche Cookies",
            description:
              "Diese Cookies sind erforderlich, damit diese Webseite richtig funktioniert. Ohne sie würde die Seite nicht funktionieren.",
            toggle: {
              value: "necessary",
              enabled: true,
              readonly: true,
            },
          },
          {
            title: "Tracking und Analyse Cookies",
            description:
              "Diese Cookies erlauben es uns, Ihr Verhalten auf unserer Webseite zu analysieren und zu verfolgen.",
            toggle: {
              value: "analytics",
              enabled: false,
              readonly: false,
            },
            cookie_table: [
              {
                col1: "_pk_ses",
                col2: "analytics.zukunft-initiative.ch",
                col3: "30 Minuten",
                col4: "Session-ID für Matomo Analytics",
              },
              {
                col1: "_pk_id",
                col2: "analytics.zukunft-initiative.ch",
                col3: "1 Jahr",
                col4: "User-ID für Matomo Analytics",
              },
              {
                col1: "mtm_consent",
                col2: "analytics.zukunft-initiative.ch",
                col3: "30 Jahre",
                col4: "Zustimmungserklärung zum Tracking durch Matomo Analytics",
              },
            ],
          },
          {
            title: "Mehr Informationen",
            description:
              'Für irgendwelche weiteren Fragen betreffend unserer Cookie Verwendungen, <a href="mailto: info@juso.ch" class="cc-link">kontaktiere uns bitte.</a>',
          },
        ],
      },
    },
    juso_fr: {
      consent_modal: {
        title: "Nous utilisons des cookies !",
        description:
          "Ce site web utilise des cookies essentiels qui garantissent le fonctionnement optimal du site et enregistrent votre comportement sur notre site web. Ces derniers ne sont installés qu'avec votre consentement.",
        primary_btn: {
          text: "Accepter tous",
          role: "accept_all",
        },
        secondary_btn: {
          text: "Réglages",
          role: "settings",
        },
      },
      settings_modal: {
        title: "Paramètres des cookies",
        save_settings_btn: "Enregistrer",
        accept_all_btn: "Accepter tous",
        reject_all_btn: "Refuser tout",
        close_btn_label: "Fermer",
        cookie_table_headers: [
          { col1: "Nom" },
          { col2: "Domaine" },
          { col3: "Validité" },
          { col4: "Description" },
        ],
        blocks: [
          {
            title: "Utilisation des cookies 📢",
            description:
              "Nous utilisons des cookies pour améliorer votre expérience sur le site et pour enregistrer votre comportement sur notre site. Vous pouvez adapter vos paramètres à tout moment. Vous trouverez plus d'informations sur les données sensibles <a href='/protection-des-données' class='cc-link'>dans notre politique de confidentialité.</a>",
          },
          {
            title: "Cookies nécessaires",
            description:
              "Ces cookies sont nécessaires au bon fonctionnement du site. Sans eux, le site ne fonctionnerait pas.",
            toggle: {
              value: "necessary",
              enabled: true,
              readonly: true,
            },
          },
          {
            title: "Cookies de suivi et d'analyse",
            description:
              "Ces cookies nous permettent d'analyser et de suivre votre comportement sur notre site web.",
            toggle: {
              value: "analytics",
              enabled: false,
              readonly: false,
            },
            cookie_table: [
              {
                col1: "_pk_ses",
                col2: "analytics.zukunft-initiative.ch",
                col3: "30 Minutes",
                col4: "ID de session pour Matomo Analytics",
              },
              {
                col1: "_pk_id",
                col2: "analytics.zukunft-initiative.ch",
                col3: "1 an",
                col4: "ID utilisateur pour Matomo Analytics",
              },
              {
                col1: "mtm_consent",
                col2: "analytics.zukunft-initiative.ch",
                col3: "30 ans",
                col4: "Déclaration de consentement au tracking par Matomo Analytics",
              },
            ],
          },
          {
            title: "Plus d'informations",
            description:
              "Pour toute autre question concernant notre utilisation des cookies, <a href='mailto:info@juso.ch' class='cc-link'>contactez-nous s'il vous plaît.</a>",
          },
        ],
      },
    },
    juso_it: {
      consent_modal: {
        title: "Utilizziamo i cookie!",
        description:
          "Questo sito web utilizza cookie essenziali che garantiscono il funzionamento ottimale del sito e registrano il vostro comportamento sul nostro sito web. Questi ultimi vengono impostati solo con il vostro consenso.",
        primary_btn: {
          text: "Tutti accettano",
          role: "accept_all",
        },
        secondary_btn: {
          text: "Impostazioni",
          role: "settings",
        },
      },
      settings_modal: {
        title: "Impostazioni dei cookie",
        save_settings_btn: "Risparmiare",
        accept_all_btn: "Tutti accettano",
        reject_all_btn: "Rifiutare tutti",
        close_btn_label: "Chiudere",
        cookie_table_headers: [
          { col1: "Nome" },
          { col2: "Dominio" },
          { col3: "Validità" },
          { col4: "Descrizione" },
        ],
        blocks: [
          {
            title: "Utilizzo dei cookie 📢",
            description:
              'Utilizziamo i cookie per migliorare la vostra esperienza sul sito web e per registrare il vostro comportamento sul nostro sito web. È possibile modificare le impostazioni in qualsiasi momento. Potete trovare ulteriori informazioni sui dati sensibili <a href="/protezione-dei-dati" class="cc-link">nella nostra politica sulla privacy.</a>',
          },
          {
            title: "Cookie necessari",
            description:
              "Questi cookie sono necessari per il corretto funzionamento di questo sito web. Senza di loro, il sito non potrebbe funzionare.",
            toggle: {
              value: "necessary",
              enabled: true,
              readonly: true,
            },
          },
          {
            title: "Cookie di tracciamento e analisi",
            description:
              "Questi cookie ci permettono di analizzare e tracciare il vostro comportamento sul nostro sito web.",
            toggle: {
              value: "analytics",
              enabled: false,
              readonly: false,
            },
            cookie_table: [
              {
                col1: "_pk_ses",
                col2: "analytics.zukunft-initiative.ch",
                col3: "30 minuti",
                col4: "ID di sessione per Matomo Analytics",
              },
              {
                col1: "_pk_id",
                col2: "analytics.zukunft-initiative.ch",
                col3: "1 anno",
                col4: "ID utente per Matomo Analytics",
              },
              {
                col1: "mtm_consent",
                col2: "analytics.zukunft-initiative.ch",
                col3: "30 anni",
                col4: "Dichiarazione di consenso al tracciamento da parte di Matomo Analytics",
              },
            ],
          },
          {
            title: "Ulteriori informazioni",
            description:
              "Per ulteriori domande sull'utilizzo dei cookie, <a href='mailto:info@juso.ch' class='cc-link'>contattateci.</a>",
          },
        ],
      },
    },
  },
});
