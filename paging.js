function pagination(path=null,currentpage=null,prevpage=null,nextpage=null,firstpage=null,lastpage=null,total=null,perpage=null){
    /*paging*/
     var delta = 2;
     var range = [];
     var rangeWithDots = [];
     var l;

     path = (path) ? path : "";
     currentpage = (currentpage) ? currentpage : 1;

      //navigation
      var button = ``;
      button +=`
              <li class="page-item">
                  <button class="page-link nav-btn" data-page="${prevpage}" aria-label="Sebelumnya" id="prev-btn">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Sebelumnya</span>
                  </button>
                </li>
              `;
      var active = '';

      for (let i = 1; i <= Math.ceil(total/perpage); i++) {
          if (i == 1 || i == Math.ceil(total/perpage) || i >= currentpage-delta && i < currentpage+delta+1) {
              range.push(i);
          }
      }

      for (let i of range) {
          if (l) {
              if (i - l === 2) {
                  rangeWithDots.push(l + 1);
              } else if (i - l !== 1) {
                  rangeWithDots.push('...');
              }
          }
          rangeWithDots.push(i);
          l = i;
      }

      $.each(rangeWithDots, function( i, v ) {
        active = (v == currentpage) ? "active" : '';
        dataPage = ($.isNumeric(v)) ? `data-page="${v}"` : '';
        button +=`<li class="page-item ${active}"><button class="page-link nav-btn" ${dataPage}>${v}</button></li>`;
      });

      button +=`<li class="page-item">
                    <button class="page-link nav-btn" data-page="${nextpage}" aria-label="Selanjutnya" id="next-btn">
                      <span aria-hidden="true">&raquo;</span>
                      <span class="sr-only">Selanjutnya</span>
                    </button>
                  </li>`;
      /* navigation */

      $("#navigation-result").html(button);
  }