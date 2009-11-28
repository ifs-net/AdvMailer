Event.observe(window, 'load', mailer_modifyconfig_init);

function mailer_modifyconfig_init()
{
     $('mailer_queuetype').observe('change', mailer_queue_onchange);
     mailer_queue_onchange();
}

function mailer_queue_onchange()
{
    var queueValue = $F('mailer_queuetype')

    if (queueValue == '1') {
        $('mailer_queue_frequency').hide();
        $('mailer_queue_settings').hide();
    } else {
        $('mailer_queue_settings').show();
        $('mailer_queue_frequency').show();
    }

    if (queueValue == '2') {
        $('mailer_queue_cronpwd').show();
    } else {
        $('mailer_queue_cronpwd').hide();
    }
}
