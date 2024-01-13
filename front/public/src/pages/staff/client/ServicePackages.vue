<template>
    <div class="block">
        <div class="block_back"></div>
        <div class="block_content">
            <div class="container">
                <div class="staff_title">{{ $t('servicepackages.title') }}</div>
                <div class="servicepackages_text">{{ $t('servicepackages.text1') }}</div>
                <div>{{ $t('servicepackages.text2') }}</div>
            </div>
            <div class="servicepackages_block">
                <div class="servicepackages_block_inner">
                    <div class="servicepackages_start">
                        <div class="servicepackages_title">{{ $t('servicepackages.item1') }}</div>
                        <ul>
                            <li>{{ $t('servicepackages.subitem1') }}</li>
                            <li>{{ $t('servicepackages.subitem2') }}</li>
                            <li>{{ $t('servicepackages.subitem3') }}</li>
                            <li>{{ $t('servicepackages.subitem4') }}</li>
                        </ul>
                    </div>
                    <div class="servicepackages_end">
                        <div class="servicepackages_title">{{ $t('servicepackages.item2') }}</div>
                        <ul>
                            <li>{{ $t('servicepackages.subitem5') }}</li>
                            <li>{{ $t('servicepackages.subitem6') }}</li>
                            <li>{{ $t('servicepackages.subitem7') }}</li>
                            <li>{{ $t('servicepackages.subitem8') }}</li>
                            <li>{{ $t('servicepackages.subitem9') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="container">
                <div @click.prevent="contract" class="btn servicepackages">{{ $t('servicepackages.button') }}</div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ServicePackages",
    methods: {
        contract() { this.$router.push({ name: "Contract" }) }
    },
}

</script>

<style>
.servicepackages_text {
    margin: 48px 0px 20px 0px;
}

.servicepackages_block {
    margin: 64px 0px;
    background: rgba(30, 21, 16, 0.08);
}

.servicepackages_block_inner {
    display: flex;
    justify-content: space-between;
}

.servicepackages_title {
    font-size: 24px;
    font-weight: 300;
}

.servicepackages_block_inner ul {
    padding-inline-start: 30px;
    font-size: 16px;
}

.servicepackages_start {
    width: 50%;
    padding: 40px 64px 40px 40px;
}

.servicepackages_end {
    width: 50%;
    padding: 40px 40px 40px 64px;
    color: #FFF0D2;
    z-index: 3;
    background: #5C4538;
}

.servicepackages {
    width: 300px;
    font-size: 14px;
    font-weight: 500;
}

@media (max-width: 992px) {
    .servicepackages_text {
        margin-top: 20px;
    }

    .servicepackages_block {
        margin: 32px 0;
    }

    .servicepackages_start {
        padding: 20px 20px 20px 30px;
    }

    .servicepackages_end {
        padding: 20px 30px 20px 20px;
    }
}

@media (max-width: 576px) {
    .servicepackages_text {
        margin-top: 10px;
    }

    .servicepackages_block {
        margin: 16px 0;
    }

    .servicepackages {
        width: 200px;
    }

    .servicepackages_block_inner {
        flex-direction: column;
    }

    .servicepackages_start,
    .servicepackages_end {
        width: 100%;
        padding: 20px;
    }

    .servicepackages_title {
        font-size: 18px;
        text-align: center;
    }

    .servicepackages_start ul,
    .servicepackages_end ul {
        margin-bottom: 0;
        margin-top: 10px;
        padding-left: 20px;
    }
}
</style>