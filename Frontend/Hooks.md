# useState
- Component được re-render sau khi set State
- Init state chỉ được sử dụng lần đầu
- Set State với callback
- Init state với callback

# useEffect
# Steps:
- Cập nhật state
- Cập nhật Dom (Muted Dom)
- Render lại UI
- Gọi Cleanup nếu deps thay đổi
- Gọi Callback
# All
- Callback luôn được gọi sau khi Component được mount
- Cleanup luôn được gọi trước khi Component bị unmount
- Cleanup luôn được gọi trước khi Callback được gọi (Trừ lần Component được mount lần đầu tiên)
# 1/ useEffect(callback)
- Gọi Callback mỗi khi Component re-render
- Gọi Callback sau khi Component thêm element vào DOM
# 2/ useEffect(callback, [])
- Chỉ gọi 1 lần khi Component được mount
# 3/ useEffect(callback, [deps])
- Callback sẽ được gọi lại khi deps thay đổi

# useLayoutEffect
# Steps:
- Cập nhật state
- Cập nhật Dom (Muted Dom)
- Gọi Cleanup nếu deps thay đổi (sync)
- Gọi Callback (sync)
- Render lại UI

# useRef
- Chỉ lấy giá trị khởi tạo ở lần đầu khi Component được mount
- Truy xuất data thông qua thuộc tính: current
- Có thể lấy ra được DOM thật của element thông qua thuộc tính ref
# VD: 
# h1Ref = useRef();
# <h1 ref={h1Ref}></h1>

# React.memo / memo (HoC)
- Giúp ghi nhớ lại các props của các Component xem có cần re-render hay không

# useCallback
- Giúp ghi nhớ lại các tham chiếu của các hàm khi truyền từ Component Cha -> Con
- Thường chỉ được sử dụng khi Component Con có sử dụng HoC memo.

# useMemo
- Giúp tránh thực hiện lại logic nào đó không cần thiết

# Context - useContext
- Là khái niệm giúp đơn giãn hóa việc truyền dữ liệu từ Component Cha -> Con mà không cần sử dụng tới props