
<div id="gjs"></div>

<script type="text/javascript">
window.editor = grapesjs.init({
    container : '#gjs',
    noticeOnUnload: false,
    storageManager: {
        autoload: false,
        autosave: false
    },
    styleManager: {
        textNoElement: '<?= phpb_trans('pagebuilder.style-no-element-selected') ?>'
    },
    traitManager: {
        textNoElement: '<?= phpb_trans('pagebuilder.trait-no-element-selected') ?>'
    },
    panels: {
        defaults: [
            {
                id: 'views',
                buttons: [
                    {
                        id: 'open-blocks',
                        className: 'fa fa-th-large',
                        command: 'open-blocks',
                        togglable: 0,
                        attributes: {title: 'Open Blocks'},
                        active: true,
                    },
                    {
                        id: 'open-tm',
                        className: 'fa fa-cog',
                        command: 'open-tm',
                        togglable: 0,
                        attributes: {title: 'Settings'}
                    },
                    {
                        id: 'open-sm',
                        className: 'fa fa-paint-brush',
                        command: 'open-sm',
                        togglable: 0,
                        attributes: {title: 'Open Style Manager'}
                    }
                ]
            },
        ]
    },
    canvas: {
        scripts: [
            '<?= phpb_asset('pagebuilder/page-injection.js') ?>',
        ]
    }
});

editor.DomComponents.getWrapper().set('name', '<?= phpb_trans('pagebuilder.page') ?>');

editor.setComponents(<?= json_encode($pageRenderer->render()) ?>);

<?php
foreach ($blocks as $block):
?>
editor.BlockManager.add(<?= json_encode($block->getId()) ?>, <?= json_encode($block->getBlockManagerArray()) ?>);
<?php
endforeach;
?>
</script>
