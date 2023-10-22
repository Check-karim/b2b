import Link from 'next/link';
import { useState, useEffect } from 'react';

import { userService } from 'services';

export default Home;

function Home() {
    const [business, setBusiness] = useState('');
    const [selectBusiness, setSelectBusiness] = useState('');
    const [selectOrderStatus, setSelectOrderStatus] = useState('');

    useEffect(() => {
        userService.getAll().then(x => {
            setBusiness(x)
        });
    }, []);

    // console.log(business);
    
    return (
        <div className="p-4">
            <div className="container">
                <h1>Hi {userService.userValue?.firstName}!</h1>
                <hr/>
                <div className="row">
                    <h6>Filter Search</h6>
                    <div className="col">
                        <select 
                        value={selectBusiness}
                        onChange={(e) => {setSelectBusiness(e.target.value)}}
                        className="form-select" aria-label="Default select example">
                            <option value=''>Select Business</option>
                            {business && business.map(user => 
                                <option key={user.id} value={user.id}>{user.username}</option>
                            )}
                            {business && !business.length &&
                                <tr>
                                    <td colSpan="4" className="text-center">
                                        <div className="p-2">No Business To Display</div>
                                    </td>
                                </tr>
                            }
                        </select>
                    </div>

                    <div className="col">
                        <select 
                        value={selectOrderStatus}
                        onChange={(e) => {setSelectOrderStatus(e.target.value)}}
                        className="form-select" aria-label="Default select example">
                            <option value=''>Select Order Status</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>

                </div>
            </div>
        </div>
    );
}
