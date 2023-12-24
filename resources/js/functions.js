export function changeObjectForVSelect(constantObj) {
    return Object.entries(constantObj).map(([key, value]) => {
      return { id: key, label: value };
    });
}