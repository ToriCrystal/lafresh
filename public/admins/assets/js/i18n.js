// i18n.js
import viTrans from '../lang/vi.js';
import enTrans from '../lang/en.js';


class Translator {
    constructor(language = 'en', translations = {}) {
      this.language = language;
      this.translations = translations;
    }
  
    setLanguage(language) {
      this.language = language;
    }
  
    translate(key) {
      if (this.translations[this.language] && this.translations[this.language][key]) {
        return this.translations[this.language][key];
      }
      // Trả về key ban đầu nếu không tìm thấy dịch
      return key;
    }
}

// Tạo một instance của Translator
const _trans = new Translator(document.documentElement.getAttribute("lang"), {
    vi: viTrans,
    en: enTrans,
});

function __trans(text){
    return _trans.translate(text);
}

window.__trans = __trans;
  