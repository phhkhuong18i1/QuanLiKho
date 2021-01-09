<thead style="background:#EFEFEF;">
                                                <tr>
                                                    <th>Mã VT</th>
                                                    <th>Tên VT</th>
                                                    <th>ĐVT</th>
                                                    <th>Số lượng</th>
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
                                                      $vt = DB::table('vattu')->where('id',$val->vattu_id)->first(); 
                                                    $dvt = DB::table('donvitinh')->where('id',$vt->donvitinh_id)->first();
                                                    $vtkho = DB::table('vattukho')->where('vattu_id',$vt->id)
                                                    ->where('kho_id',$val->kho_id)->first();
                                                ?>
                                                        <td>{!! $val->vattu_id !!}</td>
                                                        <td>{!! $vt->vt_ten !!}</td>
                                                        <td>{!! $dvt->dvt_ten !!}</td>
                                                        <td>
                                                        <input id="quanty-item-{{$vt->id}}"  required type="number" value="{{$val->ctxk_soluong}}"  />
                                                        <input type="hidden" name="" value="{{ $xuatkho->id }}" class="xkID">
                                                        <input type="hidden" value="{{$val->kho_id}}" id="khoid-{{$val->kho_id}}">
                                                            </td>
                                                        <td>{!!  number_format($vt->giatien) !!}vnd</td>
                                                        <td>{!! number_format($val->ctxk_thanhtien)  !!} vnd</td>
                                                        <td><i class="fa fa-times" onclick="DeleteListItemCart({{$val->vattu_id }},{{$val->kho_id}})"></i></td>
                                                    <td>  <i class="fa fa-save" onclick="SaveListItemCart1({{$val->vattu_id }},{{$val->kho_id}},{{$vtkho->soluong_ton+$val->ctxk_soluong}})"></i></td>
                                                    </tr>
                                                @endforeach
                                            <tr>
                                                    <td colspan="5" align="right"><b><i>Tổng tiền</i></b></td>
                                                    <td>{!! number_format($xuatkho->xk_tongtien)  !!} vnđ</td>
                                                </tr>
                                            </tbody>