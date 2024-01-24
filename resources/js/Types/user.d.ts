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
    company_number: string;
    job: string;
    status_number: number;
    memo: string;
    salary: string;
    user_company_selection?: UserCompanySelection;
};

export interface GetUserCompanySelection {
    
};

// 削除する時などの特殊な処理を行う際にはまた新しい型を作成する必要があるかと思われる。
