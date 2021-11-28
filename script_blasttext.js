var p = document.querySelector('p');
p.innerHTML = p.innerHTML.replace(/(^|<\/?[^>]+>|\s+)([^\s<]+)/g, '$1<span>$2</span>');