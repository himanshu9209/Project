$(function() {
			$("#dlgDetails").dialog({

				autoOpen: false,
				 width: 630,
				position: { my: 'top', at: 'top+150' },
				modal: true,
				resizable: false,
				closeOnEscape: true

			})
		});
		
		
		$(function() {
     
        $("#jsGrid").jsGrid({
            height: "auto",
            width: "100%",
     
            sorting: true,
            paging: true,
            autoload: true,
     
            controller: {
                loadData: function() {
                    var d = $.Deferred();
     
                    $.ajax({
                        url: "datagrid_feeder.php",
                        dataType: "json"
                    }).done(function(response) {
                        d.resolve(response.Repositoriess);
                    });
     
                    return d.promise();
                }
            },
			
			rowClick: function(e) {
				//alert(e.item.Url);
				$("#RepositoryId").text(e.item.RepositoryId);
				 $("#name").text(e.item.Name);
        		 $("#description").text(e.item.Description);
				 $("#url").text(e.item.Url);
				 $("#stars").text(e.item.Stars);
				 $("#CreatedDate").text(e.item.CreatedDate);
				 $("#LastPushDate").text(e.item.LastPushDate);
        		 $("#dlgDetails").dialog("open");
		},
     
            fields: [
                { name: "RepositoryId", title: "ID", width: 70,type: "text" },
                { name: "Name", type: "textarea", width: 100 },
                { name: "Url", type: "text", width: 150,align: "center"},
                { name: "CreatedDate", title: "Created" ,type: "date", width: 50, align: "center"},
				{ name: "LastPushDate", title: "Last Pushed", type: "date",width: 50,  align: "center"},
				{ name: "Stars", type: "number", width: 50, align: "center"}
				
              
                
            ]
        });
     
    });