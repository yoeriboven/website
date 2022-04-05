import dayjs from 'dayjs'

export function formatDate(date, format) {
    return dayjs(date).format(format);
}
