import dayjs from "dayjs";

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
