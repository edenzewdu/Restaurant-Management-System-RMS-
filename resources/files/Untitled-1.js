      let counter = document.getElementById('buttons');
      let Count = 0;
      counter.addEventListener('click', () => {
       
          Count += 1;
          setCartCounter(Count);
      })
      function setCartCounter(totalCount) {
          // cart-item-number
          document.querySelector(".fasfa-shopping-cart").innerText = totalCount;
      }
      let counter = document.getElementById('buttons');
      let Count = 0;
      counter.addEventListener('click', () => {
       
          Count += 1;
          setCartCounter(Count);
      })
      function setCartCounter(totalCount) {
          // cart-item-number
          document.querySelector("#val").innerText = totalCount;
      }
      