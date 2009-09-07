Event.observe(window, 'load', mailer_modifyconfig_init, false);

function mailer_modifyconfig_init()
{
     Event.observe('mailer_queuetype', 'change', mailer_queue_onchange, false);
     mailer_queue_onchange();
}

function mailer_queue_onchange()
{
    var queue = $('mailer_queuetype')

    if ( queue.value == '1') {
        $('mailer_queue_frequency').hide();
        $('mailer_queue_settings').hide();
    } else {
        $('mailer_queue_settings').show();
        $('mailer_queue_frequency').show();
    }
    if ( queue.value == '2') {
        $('mailer_queue_cronpwd').show();
    } else {
        $('mailer_queue_cronpwd').hide();
    }
}
