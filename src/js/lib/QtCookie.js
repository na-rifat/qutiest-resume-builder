export function setCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
}
export function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(";");
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == " ") c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}
export function eraseCookie(name) {
    document.cookie =
        name + "=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;";
}

export function setData(name, value) {
    localStorage.setItem(name, value);
}

export function getData(name) {
    return localStorage.getItem(name);
}

export function setObject(name, obj) {
    let str = JSON.stringify(obj);

    setData(name, str);
}

export function getObject(name) {
    let obj = {};

    try {
        obj = JSON.parse(getData(name));
    } catch (error) {
        return obj;
    }

    if (obj == null) {
        return {};
    }
    return obj;
}

export function setArray(name, arr) {
    let str = JSON.stringify(arr);

    setCookie(name, str, 365);
}
export function getArray(name) {
    let arr = [];

    try {
        arr = JSON.parse(getCookie(name));
    } catch (error) {
        return arr;
    }

    if (arr == null) {
        return [];
    }
    return arr;
}
