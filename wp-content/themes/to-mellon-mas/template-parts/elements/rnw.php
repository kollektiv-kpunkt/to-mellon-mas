<div id="donation-widget" class="mt-8"></div>

<script type="text/javascript" src="<?= $_ENV["RNWSRC"] ?>"></script>
<script type="text/javascript">
window.rnw.tamaro.runWidget('#donation-widget',{
    language:'<?= pll_current_language() ?>',
    testMode:false,
    purposes: ['p1'],
    translations: {
        de: {
            purposes: {
                p1: 'Kampagne für unsere Zukunft',
            },
        },
        fr: {
            purposes: {
                p1: 'Campagne pour notre avenir',
            },
        },
        it: {
            purposes: {
                p1: 'Campagne per il nostro futuro',
            },
        },
    },
    amounts:[20,50,100,200],
    paymentFormPrefill: {
        stored_campaign_name: "Zukunftsinitiative",
        stored_campaign_language: <?= pll_current_language() ?>,
    }
});
</script>