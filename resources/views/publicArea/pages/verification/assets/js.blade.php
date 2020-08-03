<script>
    var form = $("#configurationform");

    $('#jquery-steps').steps({
        headerTag: "h3",
        bodyTag: "section",
        onStepChanging: function (event, currentIndex, newIndex) {
            if (newIndex < currentIndex) {
                return true;
            }
            if (form.length == 1) {
                form.validate().settings.ignore = ":disabled,:hidden";
                return form.valid();
            }
            return true;
        },
        onFinishing: function (event, currentIndex) {
            if (form.length == 1) {
                form.validate().settings.ignore = ":disabled";
                return
                form.valid();
            }
            return true;
        },
        onFinished: function (event, currentIndex) {
            $('#loader').show();
            $("#configurationform").submit();
        }
    });

</script>
