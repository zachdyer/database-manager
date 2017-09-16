var dbm = dbm || {};

dbm.general = {
    init: function() {
        this.get_db_table();
    },
    get_db_table: function() {
        $.ajax("../ajax/ajax.dashboard.php").done(function(data) {
            $(".loader").remove();
            $("#databases").html(data);
        });
    },
    delete: function() {
        var get = "?";
        $(".db-checkbox").each( function(index, value){
            if(value.checked) {
                get += "checkboxes[]=" + value.value + "&";
            }
        });
        $.ajax("../ajax/ajax.delete.php" + get).done(function(data){
            console.log("done");
            dbm.general.get_db_table();
            dbm.general.get_db_menu();
        });
    },
    get_db_menu: function() {
        $.ajax("../ajax/ajax.menu.php").done(function(data) {
            $("#db-menu").html(data);
        });
    }
};

dbm.general.init();