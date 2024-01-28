export interface GetUser {
    id: number;
    name: string;
    email: string;
    email_verified_at: string;
    created_at: string;
    updated_at: string;
    user_company?: UserCompany;
};

export interface GetUserCompany {
    id: number;
    company_name: string;
    company_number: string;
    job: string;
    status_number: number;
    memo: string;
    salary: string;
    created_at: date;
    updated_at: date;
    user_company_selection?: UserCompanySelection;
};

export interface GetUserCompanyListItem {
    id: number;
    company_name: string;
    status_number: number;
    memo: string;
};

export interface GetUserCompanySelection {
    
};

// 削除する時などの特殊な処理を行う際にはまた新しい型を作成する必要があるかと思われる。
