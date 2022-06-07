import dayjs from "dayjs";
import { inject, ref } from "vue";
import { getActiveLanguage } from "laravel-vue-i18n";

export function formatDate(date, format) {
    return dayjs(date).format(format);
}

export function projectColors(type) {
    if (type === 'pr') {
        return 'bg-sky-200';
    }

    if (type === 'package') {
        return 'bg-violet-200';
    }

    if (type === 'project') {
        return 'bg-orange-200';
    }
}

export function getCurrentLanguage() {
    const currentLanguage = ref(getActiveLanguage());

    inject('emitter').on('changedLanguage', (value) => {
        currentLanguage.value = value.lang;
    });

    return currentLanguage;
}
