export function changeObjectForVSelect(constantObj) {
    return Object.entries(constantObj).map(([key, value]) => {
        return { id: key, label: value };
    });
}

export function getKeyByValue(object, value) {
    if(Number(value) === NaN) {
        const key = Object.keys(object).find(key => object[key] === value);
        return key !== undefined ? Number(key) : undefined;
    }
    else {
        return Number(value)
    }
}

export function removeAlreadyExistQa(existNumberArray, QaList) {
    const newObj = { ...QaList };

    // 配列の各要素に対してループ
    existNumberArray.forEach(keyNumber => {
        // オブジェクトにキーが存在するかチェック
        if (newObj.hasOwnProperty(keyNumber)) {
        // キーが存在する場合、削除する
        delete newObj[keyNumber];
        }
    });

    return newObj;
} 