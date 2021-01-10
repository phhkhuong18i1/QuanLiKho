<thead style="background:#EFEFEF;">
                                                <tr>
                                                    <th>Mã VT</th>
                                                    <th>Tên VT</th>
                                                    <th>ĐVT</th>
                                                    <th width="100px">Số lượng</th>
                                                    <th>Đơn giá</th>
                                                    <th>Thành tiền</th>
                                                    <th class="span1"></th>
                                                    <th class="span1"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($chitiet as $val)
                                                <tr>
                                                <?php 
                                                      $vt = DB::table('vattu')->where('id',$val->vt_id)->first(); 
                                                    $dvt = DB::table('donvitinh')->where('id',$vt->donvitinh_id)->first();
                                                ?>
                                                        <td>{!! $val->vt_id !!}</td>
                                                        <td>{!! $vt->vt_ten !!}</td>
                                                        <td>{!! $dvt->dvt_ten !!}</td>
                                                        <td> <input id="quanty-item-{{$vt->id}}" class="form-control" required type="number" value="{{$val->ctnk_soluong}}" min="0" onkeypress="return isNumberKey(event)" />
                                                        <input type="hidden" name="" value="{{ $nhapkho->id }}" class="nkID">
                                                        <input type="hidden" value="{{$val->kho_id}}" class="khoid"></td>
                                                        <td>{!!  number_format($vt->giatien) !!}vnd</td>
                                                        <td>{!! number_format($val->ctnk_thanhtien)  !!} vnd</td>
                                                        <td><i class="fa fa-times" onclick="DeleteListItemCart({{$vt->id}})"></i></td>
                                                    <td>  <i class="fa fa-save" onclick="SaveListItemCart1({{$vt->id}})"></i></td>
                                                    </tr>
                                                @endforeach
                                            <tr>
                                                    <td colspan="5" align="right"><b><i>Tổng tiền</i></b></td>
                                                    <td>{!! number_format($nhapkho->tongtien)  !!} vnđ</td>
                                                </tr>
                                            </tbody>