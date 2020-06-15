import { ProdutoModel } from '../cruds/models/produto-model.model';

export class ClientCart {
    private static _items: Array<ProdutoModel> = [];

    private static _show = false;
    public static get show(): boolean {
        return this._show && this._items.length !== 0;
    }

    public static set show(val: boolean) {
        this._show = val;
    }

    public static get items(): Array<ProdutoModel> {
        return this._items;
    }
    
    public static addItem(produto: ProdutoModel) {
        this._items.push(produto);
    }

    public static clear() {
        this._items = [];
    }
}