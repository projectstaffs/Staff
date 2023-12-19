<template>
    <div class="block">
        <div class="block_back"></div>
        <div class="block_content">
            <div class="container">
                <div class="staff_title">{{ $t('contract.title') }}</div>
                <div class="contract_inner">
                    <div class="contract_top">
                        <div class="contract_top_start">
                            <div class="contract_top_item">{{ $t('contract.top_item1') }}</div>
                            <div class="contract_top_item">{{ $t('contract.top_item2') }}</div>
                            <div class="contract_top_item">{{ $t('contract.top_item3') }}</div>
                        </div>
                        <div class="contract_top_end">{{ $t('contract.top_item4') }}</div>
                    </div>
                    <div class="contract_item">{{ $t('contract.item1') }}</div>
                    <div class="contract_item">{{ $t('contract.item2') }}</div>
                    <div class="contract_item">
                        <div class="contract_subitem">{{ $t('contract.subitem1') }}</div>
                        <div class="contract_subitem">{{ $t('contract.subitem2') }}</div>
                        <div class="contract_subitem">{{ $t('contract.subitem3') }}</div>
                        <div class="contract_subitem">{{ $t('contract.subitem4') }}</div>
                        <div class="contract_subitem">{{ $t('contract.subitem5') }}</div>
                        <div class="contract_subitem">{{ $t('contract.subitem6') }}</div>
                        <div class="contract_subitem">{{ $t('contract.subitem7') }}</div>
                    </div>
                    <div class="contract_item">{{ $t('contract.item3') }}</div>
                    <div class="contract_item">
                        <div class="contract_subitem">{{ $t('contract.subitem8') }}</div>
                        <div class="contract_subitem">{{ $t('contract.subitem9') }}</div>
                    </div>
                    <div class="contract_item">{{ $t('contract.item4') }}</div>
                    <div class="contract_item">{{ $t('contract.item5') }}</div>
                    <div class="contract_item">{{ $t('contract.item6') }}</div>
                    <div class="contract_item">
                        <div class="contract_subitem">{{ $t('contract.subitem10') }}</div>
                        <div class="contract_subitem">{{ $t('contract.subitem11') }}</div>
                        <div class="contract_subitem">{{ $t('contract.subitem12') }}</div>
                        <div class="contract_subitem">{{ $t('contract.subitem13') }}</div>
                        <div class="contract_subitem">{{ $t('contract.subitem14') }}</div>
                    </div>
                    <div class="contract_item">{{ $t('contract.item7') }}</div>
                    <div class="contract_item">
                        <div class="contract_subitem">{{ $t('contract.subitem15') }}</div>
                        <div class="contract_subitem">{{ $t('contract.subitem16') }}</div>
                    </div>
                    <div class="contract_item">{{ $t('contract.item8') }}</div>
                    <div class="contract_item">{{ $t('contract.item9') }}</div>
                    <div class="contract_item">{{ $t('contract.item10') }}</div>
                    <div class="contract_item">
                        <div class="contract_subitem">{{ $t('contract.subitem17') }}</div>
                        <div class="contract_subitem">{{ $t('contract.subitem18') }}</div>
                        <div class="contract_subitem">{{ $t('contract.subitem19') }}</div>
                        <div class="contract_subitem">{{ $t('contract.subitem20') }}</div>
                        <div class="contract_subitem">{{ $t('contract.subitem21') }}</div>
                        <div class="contract_subitem">{{ $t('contract.subitem22') }}</div>
                    </div>
                    <div class="contract_item">{{ $t('contract.item11') }}</div>
                    <div class="contract_item">{{ $t('contract.item12') }}</div>
                    <div class="contract_item">{{ $t('contract.item13') }}</div>
                    <div class="contract_item">
                        <div class="contract_subitem">{{ $t('contract.subitem23') }}</div>
                        <div class="contract_subitem">{{ $t('contract.subitem24') }}</div>
                    </div>
                    <div class="contract_subitem">{{ $t('contract.bottom_item1') }}</div>
                    <div class="contract_subitem">{{ $t('contract.bottom_item2') }}</div>
                    <div class="contract_subitem">{{ $t('contract.bottom_item3') }}</div>
                    <div class="contract_subitem">{{ $t('contract.bottom_item4') }}</div>
                    <div class="contract_subitem">{{ $t('contract.bottom_item5') }}</div>
                    <div class="contract_subitem">{{ $t('contract.bottom_item6') }}</div>
                    <div class="contract_subitem">{{ $t('contract.bottom_item7') }}</div>
                    <div class="contract_subitem">{{ $t('contract.bottom_item8') }}</div>
                    <div class="contract_subitem">{{ $t('contract.bottom_item9') }}</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Contract",
}
</script>

<style>
.contract_inner {
    margin-top: 48px;
}

.contract_top {
    display: flex;
    justify-content: space-between;
    margin-bottom: 30px;
}

.contract_top_end {
    margin-top: auto;
}

.contract_item {
    margin-bottom: 20px;
}
</style>