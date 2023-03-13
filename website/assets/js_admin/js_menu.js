$( window ).load(function() {
   var updateOutput = function(e)
    {
        var list   = e.length ? e : $(e.target),
            output = list.data('output');
        if (window.JSON) {
            output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
        } else {
            output.val('JSON browser support required for this demo.');
        }
    };

    $('#nestable-menu').on('click', function(e)
    {
        var target = $(e.target),
            action = target.data('action');
        if (action === 'expand-all') {
            $('.dd').nestable('expandAll');
        }
        if (action === 'collapse-all') {
            $('.dd').nestable('collapseAll');
        }
    });

    // activate Nestable for list 1
    $('#nestable').nestable({
        group: 1
    }).on('change', updateOutput);
    // output initial serialised data
    updateOutput($('#nestable').data('output', $('#nestable-output-main')));

  // activate Nestable for list top
    $('#nestable_top').nestable({
        group: 1
    }).on('change', updateOutput);
    // output initial serialised data top
    updateOutput($('#nestable_top').data('output', $('#nestable-output-top')));

    // activate Nestable for list left
    $('#nestable_left').nestable({
        group: 1
    }).on('change', updateOutput);
    // output initial serialised data left
    updateOutput($('#nestable_left').data('output', $('#nestable-output-left')));

    // activate Nestable for list right
    $('#nestable_right').nestable({
        group: 1
    }).on('change', updateOutput);
    // output initial serialised data left
    updateOutput($('#nestable_right').data('output', $('#nestable-output-right')));

    // activate Nestable for list right
    $('#nestable_bottom').nestable({
        group: 1
    }).on('change', updateOutput);
    // output initial serialised data left
    updateOutput($('#nestable_bottom').data('output', $('#nestable-output-bottom')));
    //top cate
    $('#nestable_tag').nestable({
        group: 1
    }).on('change', updateOutput);
    // output initial serialised data left
    updateOutput($('#nestable_tag').data('output', $('#nestable-output-tag')));
    //prosame
    $('#nestable_prosame').nestable({
        group: 1
    }).on('change', updateOutput);
    // output initial serialised data left
    updateOutput($('#nestable_prosame').data('output', $('#nestable-output-prosame')));
    //store
    $('#nestable_store').nestable({
        group: 1
    }).on('change', updateOutput);
    // output initial serialised data left
    updateOutput($('#nestable_store').data('output', $('#nestable-output-store')));

//    $('#nestable3').nestable();

});
