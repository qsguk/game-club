(function () {
    var qualities = document.querySelectorAll('.quality');
    var prices = document.querySelectorAll('.price-table');
    var titles = document.querySelectorAll('.title');
    var work_steps = document.querySelectorAll('.work-step')
  
    var observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (typeof getCurrentAnimationPreference === 'function' && !getCurrentAnimationPreference()) {
          return;
        }
        
        if (entry.isIntersecting) {
          if (entry.target.classList.contains("quality-right")) {
            entry.target.classList.add('quality-animation-right');
          } else if (entry.target.classList.contains("quality-left")) {
            entry.target.classList.add('quality-animation-left');
          }
        }
      });
    });
    
    qualities.forEach(quality => observer.observe(quality));
    prices.forEach(price => observer.observe(price));
    titles.forEach(title => observer.observe(title));
    work_steps.forEach(work_step => observer.observe(work_step));
  })();