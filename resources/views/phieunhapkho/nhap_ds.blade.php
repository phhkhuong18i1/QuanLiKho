<thead style="background:#EFEFEF;">
                                                <tr>
                                                    <th>Mã VT</th>
                                                    <th>Tên VT</th>
                                                    <th>Kho</th>
                                                    <th>ĐVT</th>
                                                    <th width="100px">Số lượng</th>
                                                    <th>Đơn giá</th>
                                                    <th>Thành tiền</th>
                                                    <th class="span1">Xóa</th>
                                                    <th class="span1">Cập nhật</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($content1 as $item)
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->options->kho }}</td>
                                                    <td>{{ $item->weight }}</td>
                                                    <td> <input id="quanty-item-{{$item->rowId}}" class="form-control" onkeypress="return isNumberKey(event)"  required type="number" value="{{$item->qty}}" min="0"  /></td>
                                                    <td>{{ number_format($item->price,0,",",".") }} vnđ</td>
                                                    <td>{{ number_format($item->qty*$item->price,0,",",".") }}vnđ</td>
                                                    <td><i class="fa fa-times" onclick="DeleteListItemCart('{{$item->rowId}}')"></i></td>
                                                    <td>  <i class="fa fa-save" onclick="SaveListItemCart('{{$item->rowId}}')"></i></td>
                                                </tr>
                                                @endforeach
                                            
                                            </tbody>