<thead style="background:#EFEFEF;">
                                        <tr align="center">
                                            <th >Id</th>
                                            <th >Ngày</th>
                                            <th >Số lượng vật tư</th>
                                            <th>Số đơn hàng</th>
                                            <th >Tổng tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($doanhthu as $val)
                                        <tr align="center">
                                            <td>{!! $val->id !!}</td>
                                            <td>{!! $val->date !!}</td>
                                            <td>{!! $val->SoLuong !!}</td>
                                            <td>{!! $val->SoDon !!}</td>
                                            <td>{!! $val->TongTien !!} VNĐ</td>
                            
                                        </tr>
                                          @endforeach  
                                      
                                    </tbody>