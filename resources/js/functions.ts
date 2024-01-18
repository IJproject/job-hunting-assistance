// v-selectコンポーネント用にデータを整形する関数
export function changeObjectForVSelect(constantObj) {
    return Object.entries(constantObj).map(([key, value]) => {
        return { id: key, label: value };
    });
}

// 値からキーを取得する関数
export function getKeyByValue(object, value) {
    if(Number(value) === NaN) {
        const key = Object.keys(object).find(key => object[key] === value);
        return key !== undefined ? Number(key) : undefined;
    }
    else {
        return Number(value)
    }
}

// 既に回答済みの質問を除外する関数
export function removeAlreadyExistQa(existNumberArray, QaList) {
    const newObj = { ...QaList };
    existNumberArray.forEach(keyNumber => {
        if (newObj.hasOwnProperty(keyNumber)) {
        delete newObj[keyNumber];
        }
    });
    return newObj;
} 