function setupDoctorTable(url, params)
 {
     //console.log(params);
     /**Step 1 - set title for the table */
     setupTitle(params);
 
 
     /**Step 2 - call AJAX */
     $.ajax({
       type: "GET",
       url: url,
       data: params,
       dataType: "JSON",
       success: function(resp) {
           if(resp.result == 1)// result = 1
           {
                //console.log(resp);
                 createDoctorTable(resp);
                 //pagination(url, resp.quantity, resp.data.length);
           }
           else// result = 0
           {
                 showMessageWithButton('error','Thất bại', resp.msg);
           }
       },
       error: function(err) {
            console.log(err.responseText);
            showMessageWithButton('error','Thất bại', err);
       }
     })//end AJAX
 }

 function pagination(url, totalRecord, currentRecord)
 {
     let buttonPrevious = $("ul#pagination li#button-previous");
     let buttonNext = $("ul#pagination li#button-next");
     let page = $("ul#pagination li#current-page");
     buttonNext.removeClass("disabled");
     buttonPrevious.removeClass("disabled");
 
     let currentPage = 1;
     let quantityOnePage = DEFAULT_LENGTH;
     let totalPage = Math.ceil(totalRecord / quantityOnePage);
     let start = 0;
 
     // console.log("=====================================");
     // console.log("totalRecord: " + totalRecord);
     // console.log("currentRecord: " + currentRecord);
     // console.log("totalPage: " + totalPage);
     if( totalPage == 1 )
     {
         buttonNext.addClass("disabled");
         buttonPrevious.addClass("disabled");
         page.text(1);
     }
     // if( currentPage == totalPage && totalPage > 1 )
     // {
     //     buttonNext.addClass("disabled");
     //     buttonPrevious.removeClass("disabled");
     // }
 
     /***********BUTTON PREVIOUS***********/
     buttonPrevious.click(function(){
         if( currentPage == 1)
         {
             buttonPrevious.addClass("disabled");
         }
         else
         {
             currentPage--;
             page.text(currentPage);
             if( currentPage < totalPage && currentPage > 1)/**Case 1 - total page == 3 & current page == 2 => enable */
             {
                 buttonNext.removeClass("disabled");
             }
             
             if( currentPage == 1 && totalPage != 1 )/**Case 2 - total page == currentPage == 1 => disable*/
             {
                 buttonPrevious.addClass("disabled");
                 buttonNext.removeClass("disabled");
             }
             
             if( currentPage > 1)/**Case 3 - current page > 1 */
             {
                 buttonPrevious.removeClass("disabled");
             }
             
             /**query */
             start = quantityOnePage*(currentPage-1);
             let params = getFilteringCondition();
             params["start"] = start;
             params["length"] = quantityOnePage;
 
             /**Step 1 - get filter values */
             $.ajax({
                 type: "GET",
                 url: url,
                 data: params,
                 dataType: "JSON",
                 success: function(resp) {
                     if(resp.result == 1)// result = 1
                     {
                         createDoctorTable(resp);
                     }
                     else// result = 0
                     {
                         console.log(resp.msg);
                     }
                 },
                 error: function(err) {
                     console.log(err);
                 }
             })
         }
     });
 
 
 
     /*************BUTTON NEXT************/
     buttonNext.click(function(){
         if( totalPage == currentPage )
         {
             buttonNext.addClass("disabled");
         }
         else
         {
             currentPage++;
             page.text(currentPage);
             /**Case 1 - total page == 2 && next current page == 2 => disable NEXT , enable PREVIOUS */
             if( totalPage > 1 && currentPage == totalPage)
             {
                 buttonNext.addClass("disabled");
                 buttonPrevious.removeClass("disabled");
             }
             /**Case 2 - total page == 3 && next current page == 2 => enable both buttons */
             if( totalPage > 1 && currentPage < totalPage)
             {
                 buttonNext.removeClass("disabled");
                 buttonPrevious.removeClass("disabled");
             }
             /**Step 3 - set up start where query begin returns the result for us */
             if(currentRecord == quantityOnePage && currentPage == 1)
             {
                 start = quantityOnePage;
             }
             if(currentRecord == quantityOnePage && currentPage != 1)
             {
                 start = quantityOnePage*(currentPage-1);
             }
             
             let params = getFilteringCondition();
             params["start"] = start;
             // console.log("===next button");
             // console.log("currentPage: " + currentPage);
             // console.log("start: " + start);
             // console.log(params);
             /**Step 2 - call AJAX */
             $.ajax({
                 type: "GET",
                 url: url,
                 data: params,
                 dataType: "JSON",
                 success: function(resp) {
                     if(resp.result == 1)// result = 1
                     {
                        
                         createDoctorTable(resp);
                     }
                     else// result = 0
                     {
                         console.log(resp.msg);
                     }
                 },
                 error: function(err) {
                     console.log(err);
                 }
             })//end AJAX
         }
     })
 }