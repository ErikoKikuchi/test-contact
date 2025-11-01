
<div>
    <button class="detail-button" wire:click="openModal" type="button" >
        詳細
    </button>
    @if($showModal)
    <div class="modal-backdrop" wire:click="closeModal">
        <div class="modal__content" wire:click.stop>
            <button class="modal-close" wire:click="closeModal">×</button>
            @if($selectedContact)
            <table class="modal__inner">
                <tr class="modal-table__row">
                    <th class="modal-table__header">お名前</th>
                    <td class="modal-table__item">{{ $selectedContact->last_name }} {{ $selectedContact->first_name }}</td>
                </tr>
                <tr class="modal-table__row">
                    <th class="modal-table__header">性別</th>
                    <td class="modal-table__item">{{ $selectedContact->gender_text }}</td>
                </tr>
                <tr class="modal-table__row">
                    <th class="modal-table__header">メールアドレス</th>
                    <td class="modal-table__item">{{ $selectedContact->email }}</td>
                </tr>
                <tr class="modal-table__row">
                    <th class="modal-table__header">電話番号</th>
                    <td class="modal-table__item">{{ $selectedContact->tel }}</td>
                </tr>
                <tr class="modal-table__row">
                    <th class="modal-table__header">住所</th>
                    <td class="modal-table__item">{{ $selectedContact->address }}</td>
                </tr>
                <tr class="modal-table__row">
                    <th class="modal-table__header">建物名</th>
                    <td class="modal-table__item">{{ $selectedContact->building }}</td>
                </tr>
                <tr class="modal-table__row">
                    <th class="modal-table__header">お問い合わせの種類</th>
                    <td class="modal-table__item">{{ $selectedContact->category_id_text }}</td>
                </tr>
                <tr class="modal-table__row">
                    <th class="modal-table__header">お問い合わせの内容</th>
                    <td class="modal-table__item">{{ $selectedContact->detail }}</td>
                </tr>
            </table>
            @endif
            <button class="delete-button" wire:click="deleteContact">削除</button>
        </div>
    </div>
    @endif

</div>

<style>
/* モーダル用のスタイル */
.modal-backdrop {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    width: 100vw;
    height: 100vh;
    background-color: rgba(0, 0, 0, 0.7);
    z-index: 9999;
    display: flex;
    align-items: center;
    justify-content: center;
}

.modal__content {
    position: relative;
    background: white;
    padding: 40px;
    border-radius: 10px;
    max-width: 800px;
    width: 90%;
    max-height: 90vh;
    overflow-y: auto;

}

.modal-close {
    position: absolute;
    top: 15px;
    right: 20px;
    font-size: 32px;
    border: none;
    background: none;
    cursor: pointer;
    color: rgb(104, 68, 39);
    line-height: 1;
    padding: 0;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    border:#666 1px solid;
}

.modal-close:hover {
    color:  rgb(104, 68, 39);
}

.modal-title {
    margin-top: 0;
    margin-bottom: 20px;
    font-size: 24px;
    color:  rgb(104, 68, 39);
}

.modal-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

.modal-table tr {
    border-bottom: 1px solid #e0e0e0;
}

.modal-table__header{
    padding: 15px;
    text-align: left;
    font-weight: bold;
    width: 200px;
    color: #333;
}

.modal-table td {
    padding: 15px;
    color: #666;
}

.detail-button {
    padding: 8px 16px;
    background-color: #e0e0e0;
    color: rgb(104, 68, 39);
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.detail-button:hover {
    background-color: #cecbcbff;
}

.delete-button {
    padding: 10px 30px;
    background-color: #dc3545;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    margin-left:300px;
    margin-top:10px;
}

.delete-button:hover {
    background-color: #c82333;
}
</style>