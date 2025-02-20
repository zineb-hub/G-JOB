document.addEventListener("DOMContentLoaded" , function(){
    const textElement = document.querySelector('.changing_p');
    const words = ["solution... ", "website... " , "innovation... "];

    let wordIndex = 0;
    let letterIndex = 0;

    function type() {
      if (letterIndex < words[wordIndex].length) {
        textElement.innerHTML += words[wordIndex].charAt(letterIndex);
        letterIndex++;
        setTimeout(type, 100);
      } else {
        setTimeout(erase, 500);
      }

    }
    function erase() {
        if (letterIndex > 0) {
          textElement.innerHTML = words[wordIndex].substring(0, letterIndex - 1);
          letterIndex--;
          setTimeout(erase, 100);
        } else {
          wordIndex = (wordIndex + 1) % words.length;
          setTimeout(type, 300);
        }
      }
  
      type(); 
    
    });
